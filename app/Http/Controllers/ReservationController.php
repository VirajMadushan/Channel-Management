<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Property;
use App\Models\Room;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    // GET /reservations
    public function index(Request $request)
    {
        $query = Reservation::with(['property', 'room', 'channel'])
            ->orderBy('created_at', 'desc');

        // Filters
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('guest_name', 'like', '%'.$request->search.'%')
                  ->orWhere('booking_id', 'like', '%'.$request->search.'%')
                  ->orWhere('guest_email', 'like', '%'.$request->search.'%');
            });
        }
        if ($request->status)   $query->where('status', $request->status);
        if ($request->channel)  $query->whereHas('channel', fn($q) => $q->where('ota_name', $request->channel));
        if ($request->property) $query->where('property_id', $request->property);
        if ($request->date_from) $query->whereDate('check_in', '>=', $request->date_from);
        if ($request->date_to)   $query->whereDate('check_in', '<=', $request->date_to);

        $reservations = $query->paginate(15);

        // Stats
        $stats = [
            'total'     => Reservation::count(),
            'confirmed' => Reservation::where('status', 'confirmed')->count(),
            'pending'   => Reservation::where('status', 'pending')->count(),
            'cancelled' => Reservation::where('status', 'cancelled')->count(),
        ];

        $properties = Property::all();
        $channels   = Channel::select('ota_name')->distinct()->get();

        return view('pages.reservations', compact(
            'reservations', 'stats', 'properties', 'channels'
        ));
    }

    // GET /reservations/create
    public function create()
    {
        $properties = Property::all();
        $rooms      = Room::all();
        $channels   = Channel::all();
        return view('pages.add_reservation', compact('properties', 'rooms', 'channels'));
    }

    // POST /reservations
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'room_id'     => 'required|exists:rooms,id',
            'guest_name'  => 'required|string',
            'guest_email' => 'required|email',
            'check_in'    => 'required|date',
            'check_out'   => 'required|date|after:check_in',
            'adults'      => 'required|integer|min:1',
            'room_rate'   => 'required|numeric',
            'total_amount'=> 'required|numeric',
        ]);

        $nights = \Carbon\Carbon::parse($request->check_in)
            ->diffInDays($request->check_out);

        $commission = ($request->total_amount * ($request->commission_rate ?? 0)) / 100;

        Reservation::create([
            'booking_id'        => '#BK-' . strtoupper(Str::random(6)),
            'property_id'       => $request->property_id,
            'room_id'           => $request->room_id,
            'channel_id'        => $request->channel_id,
            'guest_name'        => $request->guest_name,
            'guest_email'       => $request->guest_email,
            'guest_phone'       => $request->guest_phone,
            'guest_country'     => $request->guest_country,
            'check_in'          => $request->check_in,
            'check_out'         => $request->check_out,
            'nights'            => $nights,
            'adults'            => $request->adults,
            'children'          => $request->children ?? 0,
            'room_rate'         => $request->room_rate,
            'total_amount'      => $request->total_amount,
            'commission_amount' => $commission,
            'net_amount'        => $request->total_amount - $commission,
            'currency'          => $request->currency ?? 'USD',
            'status'            => 'confirmed',
            'special_requests'  => $request->special_requests,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully!');
    }

    // GET /reservations/{id}
    public function show($id)
    {
        $reservation = Reservation::with(['property', 'room', 'channel'])
            ->findOrFail($id);
        return view('pages.reservation_detail', compact('reservation'));
    }

    // GET /reservations/{id}/edit
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $properties  = Property::all();
        $rooms       = Room::all();
        $channels    = Channel::all();
        return view('pages.edit_reservation', compact('reservation', 'properties', 'rooms', 'channels'));
    }

    // PUT /reservations/{id}
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('reservations.index')
            ->with('success', 'Reservation updated!');
    }

    // DELETE /reservations/{id}
    public function destroy($id)
    {
        Reservation::findOrFail($id)->delete();
        return redirect()->route('reservations.index')
            ->with('success', 'Reservation deleted!');
    }

    // PUT /reservations/{id}/checkin
    public function checkIn($id)
    {
        Reservation::findOrFail($id)->update(['status' => 'checked_in']);
        return back()->with('success', 'Guest checked in!');
    }

    // PUT /reservations/{id}/checkout
    public function checkOut($id)
    {
        Reservation::findOrFail($id)->update(['status' => 'checked_out']);
        return back()->with('success', 'Guest checked out!');
    }

    // PUT /reservations/{id}/cancel
    public function cancel($id)
    {
        Reservation::findOrFail($id)->update(['status' => 'cancelled']);
        return back()->with('success', 'Reservation cancelled.');
    }

    // POST /webhook/booking  ← Booking.com sends reservations here
    public function webhookBooking(Request $request)
    {
        // TODO in Phase 3: parse Booking.com XML/JSON payload
        // and create reservation automatically
        \Log::info('Booking.com webhook received', $request->all());
        return response()->json(['status' => 'received'], 200);
    }

    // POST /webhook/expedia
    public function webhookExpedia(Request $request)
    {
        \Log::info('Expedia webhook received', $request->all());
        return response()->json(['status' => 'received'], 200);
    }
}