<?php

// ══════════════════════════════════════════════════════════════════════════════
// FILE:  app/Http/Controllers/HomeController.php
// ACTION: REPLACE your entire current HomeController.php with this file
// ══════════════════════════════════════════════════════════════════════════════

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Property;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // ══════════════════════════════════════════════════════════════════════════
    // DASHBOARD  →  route('dashboard')  →  GET /
    // ══════════════════════════════════════════════════════════════════════════
    public function index()
    {
        // ── Stat cards ────────────────────────────────────────────────────────
        $stats = [
            'total_reservations' => Reservation::count(),
            'total_properties' => Property::count(),
            'total_rooms' => Room::count(),
            'active_channels' => Channel::where('status', 'active')->count(),
            'pending' => Reservation::where('status', 'pending')->count(),
            'confirmed' => Reservation::where('status', 'confirmed')->count(),
            'checked_in' => Reservation::where('status', 'checked_in')->count(),
            'cancelled' => Reservation::where('status', 'cancelled')->count(),
            'total_revenue' => Reservation::whereIn('status', ['confirmed', 'checked_in', 'checked_out'])
                ->sum('net_amount'),
        ];

        // ── Latest 8 reservations for the table on dashboard ─────────────────
        $recent_reservations = Reservation::with(['room', 'channel', 'property'])
            ->latest()
            ->take(8)
            ->get();

        // ── Monthly revenue for the chart (current year) ─────────────────────
        $monthly_revenue = Reservation::selectRaw(
            'MONTH(check_in) as month, SUM(net_amount) as revenue, COUNT(*) as bookings'
        )
            ->whereYear('check_in', date('Y'))
            ->whereIn('status', ['confirmed', 'checked_in', 'checked_out'])
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');          // so blade can do $monthly_revenue[1] = Jan

        return view('public.pages.index', compact(
            'stats',
            'recent_reservations',
            'monthly_revenue'
        ));
    }

    // ══════════════════════════════════════════════════════════════════════════
    // PROPERTIES
    // ══════════════════════════════════════════════════════════════════════════

    // GET /properties
    public function properties()
    {
        $properties = Property::withCount(['rooms', 'reservations', 'channels'])
            ->latest()
            ->get();

        return view('public.pages.properties', compact('properties'));
    }

    // GET /properties/add
    public function add_property()
    {
        // Pass old property if editing (edit route reuses this view)
        $property = null;

        return view('public.pages.add_property', compact('property'));
    }

    // POST /properties
    public function store_property(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:hotel,resort,villa,guesthouse,hostel,apartment',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'address' => 'required|string',
            'star_rating' => 'required|integer|between:1,5',
            'currency' => 'required|string|size:3',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
        ]);

        $data = $request->except(['_token', 'amenities']);
        $data['amenities'] = $request->input('amenities', []);

        Property::create($data);

        return redirect()->route('properties')
            ->with('success', 'Property added successfully!');
    }

    // GET /properties/{id}/edit
    public function edit_property($id)
    {
        $property = Property::findOrFail($id);

        return view('public.pages.add_property', compact('property'));
    }

    // PUT /properties/{id}
    public function update_property(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $data = $request->except(['_token', '_method', 'amenities']);
        $data['amenities'] = $request->input('amenities', []);

        $property->update($data);

        return redirect()->route('properties')
            ->with('success', 'Property updated successfully!');
    }

    // DELETE /properties/{id}
    public function delete_property($id)
    {
        Property::findOrFail($id)->delete();

        return redirect()->route('properties')
            ->with('success', 'Property deleted.');
    }

    // ══════════════════════════════════════════════════════════════════════════
    // ROOMS
    // ══════════════════════════════════════════════════════════════════════════

    // GET /rooms
    public function rooms()
    {
        $rooms = Room::with('property')
            ->latest()
            ->get();

        return view('public.pages.rooms', compact('rooms'));
    }

    // GET /rooms/add
    public function add_room()
    {
        $properties = Property::where('status', 'active')->get();
        $room = null;

        return view('public.pages.add_room', compact('properties', 'room'));
    }

    // POST /rooms
    public function store_room(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|string|max:255',
            'category' => 'required|in:standard,deluxe,suite,villa,dormitory',
            'bed_type' => 'required|in:single,double,queen,king,twin,bunk',
            'total_rooms' => 'required|integer|min:1',
            'base_rate' => 'required|numeric|min:0',
            'max_adults' => 'required|integer|min:1',
        ]);

        $data = $request->except(['_token', 'amenities']);
        $data['amenities'] = $request->input('amenities', []);

        Room::create($data);

        return redirect()->route('rooms')
            ->with('success', 'Room added successfully!');
    }

    // GET /rooms/{id}/edit
    public function edit_room($id)
    {
        $room = Room::findOrFail($id);
        $properties = Property::where('status', 'active')->get();

        return view('public.pages.add_room', compact('room', 'properties'));
    }

    // PUT /rooms/{id}
    public function update_room(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $data = $request->except(['_token', '_method', 'amenities']);
        $data['amenities'] = $request->input('amenities', []);
        $room->update($data);

        return redirect()->route('rooms')
            ->with('success', 'Room updated successfully!');
    }

    // DELETE /rooms/{id}
    public function delete_room($id)
    {
        Room::findOrFail($id)->delete();

        return redirect()->route('rooms')
            ->with('success', 'Room deleted.');
    }

    // ══════════════════════════════════════════════════════════════════════════
    // CHANNELS  (OTAs — Booking.com, Expedia, Airbnb …)
    // ══════════════════════════════════════════════════════════════════════════

    // GET /channels
    public function channels()
    {
        $channels = Channel::with('property')->latest()->get();

        // Decrypt API keys for display (masked)
        foreach ($channels as $ch) {
            try {
                $raw = decrypt($ch->getRawOriginal('api_key') ?? '');
                $ch->api_key_display = substr($raw, 0, 6).'••••••••';
            } catch (\Exception $e) {
                $ch->api_key_display = '••••••••';
            }
        }

        return view('public.pages.channels', compact('channels'));
    }

    // GET /channels/connect
    public function connect_channel()
    {
        $properties = Property::where('status', 'active')->get();

        return view('public.pages.connect_channel', compact('properties'));
    }

    // POST /channels
    public function store_channel(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'ota_name' => 'required|in:booking_com,expedia,airbnb,agoda,hotels_com,trivago,direct',
            'display_name' => 'required|string|max:100',
            'commission_rate' => 'required|numeric|min:0|max:100',
            'hotel_id' => 'nullable|string|max:100',
            'api_key' => 'nullable|string',
        ]);

        $data = $request->except(['_token']);

        // Encrypt the API key before storing
        if (! empty($data['api_key'])) {
            $data['api_key'] = encrypt($data['api_key']);
        }

        Channel::create($data);

        return redirect()->route('channels')
            ->with('success', 'Channel connected successfully!');
    }

    // PUT /channels/{id}
    public function update_channel(Request $request, $id)
    {
        $channel = Channel::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        // Only update API key if a new one was typed
        if (! empty($data['api_key'])) {
            $data['api_key'] = encrypt($data['api_key']);
        } else {
            unset($data['api_key']);          // keep old encrypted key untouched
        }

        $channel->update($data);

        return redirect()->route('channels')
            ->with('success', 'Channel updated successfully!');
    }

    // DELETE /channels/{id}
    public function delete_channel($id)
    {
        Channel::findOrFail($id)->delete();

        return redirect()->route('channels')
            ->with('success', 'Channel removed.');
    }

    // ══════════════════════════════════════════════════════════════════════════
    // RATES & AVAILABILITY
    // ══════════════════════════════════════════════════════════════════════════

    // GET /rates
    public function rates()
    {
        $rooms = Room::with('property')->where('status', 'active')->get();
        $channels = Channel::where('status', 'active')->get();

        // Show next 30 days of rates
        $rates = Rate::with(['room.property', 'channel'])
            ->where('date', '>=', now()->toDateString())
            ->where('date', '<=', now()->addDays(30)->toDateString())
            ->orderBy('date')
            ->get();

        return view('public.pages.rates', compact('rooms', 'channels', 'rates'));
    }

    // POST /rates
    public function store_rate(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'rate' => 'required|numeric|min:0',
            'available_rooms' => 'required|integer|min:0',
        ]);

        // updateOrCreate prevents duplicate for same room+channel+date
        Rate::updateOrCreate(
            [
                'room_id' => $request->room_id,
                'channel_id' => $request->channel_id ?: null,
                'date' => $request->date,
            ],
            [
                'rate' => $request->rate,
                'available_rooms' => $request->available_rooms,
                'is_closed' => $request->boolean('is_closed'),
                'min_stay' => $request->input('min_stay', 1),
            ]
        );

        return back()->with('success', 'Rate saved successfully!');
    }

    // PUT /rates/{id}
    public function update_rate(Request $request, $id)
    {
        $rate = Rate::findOrFail($id);
        $rate->update($request->only(['rate', 'available_rooms', 'is_closed', 'min_stay']));

        return back()->with('success', 'Rate updated!');
    }

    // ══════════════════════════════════════════════════════════════════════════
    // RESERVATIONS
    // ══════════════════════════════════════════════════════════════════════════

    // GET /reservations
    public function reservations()
    {
        $reservations = Reservation::with(['property', 'room', 'channel'])
            ->latest()
            ->paginate(20);

        return view('public.pages.reservations', compact('reservations'));
    }

    // GET /booking   (new manual booking form)
    public function booking()
    {
        $properties = Property::where('status', 'active')->get();
        $rooms = Room::where('status', 'active')->with('property')->get();
        $channels = Channel::where('status', 'active')->get();

        return view('public.pages.booking', compact('properties', 'rooms', 'channels'));
    }

    // POST /reservations
    public function store_reservation(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'room_id' => 'required|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'nullable|email',
            'guest_phone' => 'nullable|string|max:20',
            'guest_country' => 'nullable|string|max:100',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'room_rate' => 'required|numeric|min:0',
        ]);

        // Calculate nights and financials
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $nights = $checkIn->diffInDays($checkOut);
        $total = $nights * $request->room_rate;

        $commission = 0;
        if ($request->channel_id) {
            $channel = Channel::find($request->channel_id);
            $commission = $channel ? round($total * $channel->commission_rate / 100, 2) : 0;
        }

        // Generate unique booking ID  e.g. RES-2026-00042
        $count = Reservation::count() + 1;
        $bookingId = 'RES-'.date('Y').'-'.str_pad($count, 5, '0', STR_PAD_LEFT);

        Reservation::create([
            'booking_id' => $bookingId,
            'property_id' => $request->property_id,
            'room_id' => $request->room_id,
            'channel_id' => $request->channel_id ?: null,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'guest_country' => $request->guest_country,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'nights' => $nights,
            'adults' => $request->adults,
            'children' => $request->input('children', 0),
            'room_rate' => $request->room_rate,
            'total_amount' => $total,
            'commission_amount' => $commission,
            'net_amount' => $total - $commission,
            'currency' => $request->input('currency', 'USD'),
            'status' => 'confirmed',
            'special_requests' => $request->special_requests,
            'ota_booking_id' => $request->ota_booking_id,
        ]);

        return redirect()->route('reservations')
            ->with('success', "Booking {$bookingId} created successfully!");
    }

    // PUT /reservations/{id}
    public function update_reservation(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,checked_in,checked_out,cancelled,no_show',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->only(['status', 'special_requests']));

        return back()->with('success', 'Reservation updated!');
    }

    // DELETE /reservations/{id}
    public function delete_reservation($id)
    {
        Reservation::findOrFail($id)->delete();

        return redirect()->route('reservations')
            ->with('success', 'Reservation deleted.');
    }

    // ══════════════════════════════════════════════════════════════════════════
    // REPORTS
    // ══════════════════════════════════════════════════════════════════════════

    // GET /reports
    public function reports()
    {
        $report = [
            // Overall totals
            'total_revenue' => Reservation::whereIn('status', ['confirmed', 'checked_in', 'checked_out'])
                ->sum('net_amount'),
            'total_bookings' => Reservation::count(),
            'avg_nights' => round(Reservation::avg('nights'), 1),
            'occupancy_rate' => $this->occupancyRate(),

            // Breakdown by OTA channel
            'by_channel' => Reservation::selectRaw(
                'channel_id, COUNT(*) as total, SUM(net_amount) as revenue'
            )
                ->groupBy('channel_id')
                ->with('channel')
                ->get(),

            // Breakdown by status
            'by_status' => Reservation::selectRaw('status, COUNT(*) as total')
                ->groupBy('status')
                ->pluck('total', 'status'),

            // Monthly revenue this year
            'monthly' => Reservation::selectRaw(
                'MONTH(check_in) as month,
                                     COUNT(*) as bookings,
                                     SUM(net_amount) as revenue'
            )
                ->whereYear('check_in', date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->keyBy('month'),

            // Top 5 rooms by revenue
            'top_rooms' => Reservation::selectRaw(
                'room_id, COUNT(*) as bookings, SUM(net_amount) as revenue'
            )
                ->groupBy('room_id')
                ->with('room')
                ->orderByDesc('revenue')
                ->take(5)
                ->get(),
        ];

        return view('public.pages.reports', compact('report'));
    }

    // Helper — simple occupancy rate %
    private function occupancyRate(): float
    {
        $totalRooms = Room::sum('total_rooms');
        if ($totalRooms === 0) {
            return 0;
        }

        $checkedIn = Reservation::where('status', 'checked_in')->count();

        return round(($checkedIn / $totalRooms) * 100, 1);
    }

    // ══════════════════════════════════════════════════════════════════════════
    // SETTINGS
    // ══════════════════════════════════════════════════════════════════════════

    // GET /settings
    public function settings()
    {
        return view('public.pages.settings');
    }

    // POST /settings
    public function update_settings(Request $request)
    {
        // You can store settings in a config table or .env later
        return back()->with('success', 'Settings saved successfully!');
    }
}
