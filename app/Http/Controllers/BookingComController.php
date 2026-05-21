<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BookingComController extends Controller
{
    private string $baseUrl;
    private string $username;
    private string $password;
    private string $hotelId;

    public function __construct()
    {
        $this->baseUrl  = 'https://supply-xml.booking.com/hotels/ota';
        $this->username = config('services.booking.username', '');
        $this->password = config('services.booking.password', '');
        $this->hotelId  = config('services.booking.hotel_id', '');
    }

    // ══════════════════════════════════════════════════════
    // WEBHOOK
    // Booking.com calls this URL when a new reservation is made
    // Give this URL to Booking.com: yourdomain.com/api/booking/webhook
    // ══════════════════════════════════════════════════════
    public function webhook(Request $request)
    {
        Log::info('Booking.com webhook received', [
            'body' => $request->all()
        ]);

        try {
            $data = $request->all();

            // Find the booking.com channel in your DB
            $channel = Channel::where('ota_name', 'booking_com')
                ->where('status', 'active')
                ->first();

            if (!$channel) {
                Log::error('No active Booking.com channel found');
                return response()->json(['status' => 'error', 'message' => 'Channel not found'], 404);
            }

            // Find matching room
            $room = Room::where('property_id', $channel->property_id)
                ->where('status', 'active')
                ->first();

            if (!$room) {
                Log::error('No active room found for property');
                return response()->json(['status' => 'error', 'message' => 'Room not found'], 404);
            }

            // Prevent duplicate reservations
            $otaBookingId = $data['reservation_id'] ?? $data['id'] ?? null;

            if ($otaBookingId && Reservation::where('ota_booking_id', $otaBookingId)->exists()) {
                return response()->json(['status' => 'duplicate', 'message' => 'Already saved'], 200);
            }

            // Calculate nights and financials
            $checkIn  = \Carbon\Carbon::parse($data['checkin']  ?? now());
            $checkOut = \Carbon\Carbon::parse($data['checkout'] ?? now()->addDay());
            $nights   = $checkIn->diffInDays($checkOut);
            $rate     = $data['total_price'] ?? ($room->base_rate * $nights);
            $commission = round($rate * $channel->commission_rate / 100, 2);

            // Generate booking ID
            $count     = Reservation::count() + 1;
            $bookingId = 'BK-' . date('Y') . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);

            // Save reservation
            Reservation::create([
                'booking_id'        => $bookingId,
                'property_id'       => $channel->property_id,
                'room_id'           => $room->id,
                'channel_id'        => $channel->id,
                'guest_name'        => $data['guest']['name']           ?? 'Booking.com Guest',
                'guest_email'       => $data['guest']['email']          ?? null,
                'guest_phone'       => $data['guest']['phone']          ?? null,
                'guest_country'     => $data['guest']['country']        ?? null,
                'check_in'          => $checkIn->toDateString(),
                'check_out'         => $checkOut->toDateString(),
                'nights'            => $nights,
                'adults'            => $data['guests']['adults']        ?? 1,
                'children'          => $data['guests']['children']      ?? 0,
                'room_rate'         => $room->base_rate,
                'total_amount'      => $rate,
                'commission_amount' => $commission,
                'net_amount'        => $rate - $commission,
                'currency'          => $data['currency']                ?? 'USD',
                'status'            => 'confirmed',
                'special_requests'  => $data['special_requests']        ?? null,
                'ota_booking_id'    => $otaBookingId,
            ]);

            Log::info('Booking.com reservation saved', ['booking_id' => $bookingId]);
            return response()->json(['status' => 'success'], 200);

        } catch (\Exception $e) {
            Log::error('Booking.com webhook error: ' . $e->getMessage());
            return response()->json(['status' => 'error'], 500);
        }
    }

    // ══════════════════════════════════════════════════════
    // PULL RESERVATIONS
    // Manually fetch new reservations from Booking.com
    // ══════════════════════════════════════════════════════
    public function pullReservations(Request $request)
    {
        if (empty($this->username) || empty($this->hotelId)) {
            return back()->with('error', 'Booking.com API credentials not configured in .env');
        }

        try {
            $response = Http::withBasicAuth($this->username, $this->password)
                ->get($this->baseUrl . '/reservations', [
                    'hotel_id' => $this->hotelId,
                    'status'   => 'new',
                ]);

            if ($response->failed()) {
                Log::error('Booking.com pull failed', ['status' => $response->status()]);
                return back()->with('error', 'Failed to connect to Booking.com API.');
            }

            $reservations = $response->json('reservations') ?? [];
            $saved = 0;

            foreach ($reservations as $res) {
                $otaId = $res['id'] ?? null;
                if (!$otaId) continue;

                // Skip if already saved
                if (Reservation::where('ota_booking_id', $otaId)->exists()) continue;

                $channel  = Channel::where('ota_name', 'booking_com')->first();
                $room     = Room::where('property_id', $channel?->property_id)->first();
                $checkIn  = \Carbon\Carbon::parse($res['checkin']);
                $checkOut = \Carbon\Carbon::parse($res['checkout']);
                $nights   = $checkIn->diffInDays($checkOut);
                $total    = $res['total_price'] ?? 0;
                $commission = round($total * ($channel?->commission_rate ?? 0) / 100, 2);

                $count     = Reservation::count() + 1;
                $bookingId = 'BK-' . date('Y') . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);

                Reservation::create([
                    'booking_id'        => $bookingId,
                    'property_id'       => $channel?->property_id,
                    'room_id'           => $room?->id,
                    'channel_id'        => $channel?->id,
                    'guest_name'        => $res['guest']['name']     ?? 'Guest',
                    'guest_email'       => $res['guest']['email']    ?? null,
                    'guest_phone'       => $res['guest']['phone']    ?? null,
                    'guest_country'     => $res['guest']['country']  ?? null,
                    'check_in'          => $checkIn->toDateString(),
                    'check_out'         => $checkOut->toDateString(),
                    'nights'            => $nights,
                    'adults'            => $res['guests']['adults']  ?? 1,
                    'children'          => $res['guests']['children']?? 0,
                    'room_rate'         => $room?->base_rate ?? 0,
                    'total_amount'      => $total,
                    'commission_amount' => $commission,
                    'net_amount'        => $total - $commission,
                    'currency'          => $res['currency']          ?? 'USD',
                    'status'            => 'confirmed',
                    'special_requests'  => $res['special_requests']  ?? null,
                    'ota_booking_id'    => $otaId,
                ]);

                $saved++;
            }

            return back()->with('success', "{$saved} reservations pulled from Booking.com!");

        } catch (\Exception $e) {
            Log::error('Pull reservations error: ' . $e->getMessage());
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // ══════════════════════════════════════════════════════
    // PUSH RATES
    // Send your rates to Booking.com
    // ══════════════════════════════════════════════════════
    public function pushRates(Request $request)
    {
        if (empty($this->username) || empty($this->hotelId)) {
            return back()->with('error', 'Booking.com API credentials not configured in .env');
        }

        $channel = Channel::where('ota_name', 'booking_com')
            ->where('status', 'active')
            ->first();

        if (!$channel) {
            return back()->with('error', 'No active Booking.com channel found. Connect it first.');
        }

        $rates = Rate::where('channel_id', $channel->id)
            ->where('date', '>=', now()->toDateString())
            ->with('room')
            ->get();

        if ($rates->isEmpty()) {
            return back()->with('error', 'No rates found to push.');
        }

        $pushed = 0;
        $errors = 0;

        foreach ($rates as $rate) {
            try {
                $response = Http::withBasicAuth($this->username, $this->password)
                    ->post($this->baseUrl . '/rates', [
                        'hotel_id'        => $this->hotelId,
                        'room_type_id'    => $rate->room->name,
                        'date_from'       => $rate->date,
                        'date_to'         => $rate->date,
                        'price'           => $rate->rate,
                        'available_rooms' => $rate->available_rooms,
                        'closed'          => $rate->is_closed ? 1 : 0,
                        'min_stay'        => $rate->min_stay,
                    ]);

                if ($response->successful()) {
                    $pushed++;
                } else {
                    $errors++;
                    Log::warning('Rate push failed', [
                        'date'   => $rate->date,
                        'room'   => $rate->room->name,
                        'status' => $response->status(),
                    ]);
                }
            } catch (\Exception $e) {
                $errors++;
                Log::error('Rate push error: ' . $e->getMessage());
            }
        }

        $message = "Pushed {$pushed} rates to Booking.com.";
        if ($errors > 0) $message .= " {$errors} failed — check logs.";

        return back()->with('success', $message);
    }

    // ══════════════════════════════════════════════════════
    // PUSH AVAILABILITY
    // Send room availability to Booking.com
    // ══════════════════════════════════════════════════════
    public function pushAvailability(Request $request)
    {
        if (empty($this->username) || empty($this->hotelId)) {
            return back()->with('error', 'Booking.com API credentials not configured in .env');
        }

        $channel = Channel::where('ota_name', 'booking_com')
            ->where('status', 'active')
            ->first();

        if (!$channel) {
            return back()->with('error', 'No active Booking.com channel found.');
        }

        $rooms   = Room::where('property_id', $channel->property_id)
            ->where('status', 'active')
            ->get();

        $pushed = 0;
        $errors = 0;

        foreach ($rooms as $room) {
            // Count how many are currently checked in
            $occupied = Reservation::where('room_id', $room->id)
                ->where('status', 'checked_in')
                ->count();

            $available = max(0, $room->total_rooms - $occupied);

            try {
                $response = Http::withBasicAuth($this->username, $this->password)
                    ->post($this->baseUrl . '/availability', [
                        'hotel_id'        => $this->hotelId,
                        'room_type_id'    => $room->name,
                        'date_from'       => now()->toDateString(),
                        'date_to'         => now()->addDays(30)->toDateString(),
                        'available_rooms' => $available,
                    ]);

                if ($response->successful()) {
                    $pushed++;
                } else {
                    $errors++;
                    Log::warning('Availability push failed', [
                        'room'   => $room->name,
                        'status' => $response->status(),
                    ]);
                }
            } catch (\Exception $e) {
                $errors++;
                Log::error('Availability push error: ' . $e->getMessage());
            }
        }

        $message = "Pushed availability for {$pushed} rooms to Booking.com.";
        if ($errors > 0) $message .= " {$errors} failed — check logs.";

        return back()->with('success', $message);
    }
}