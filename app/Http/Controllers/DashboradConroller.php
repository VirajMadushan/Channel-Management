<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Reservation;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ── Stat Cards ──────────────────────────────
        $totalBookings = Reservation::count();
        $occupancyRate = 78; // calculate from rooms/reservations
        $totalRevenue = Reservation::where('status', '!=', 'cancelled')->sum('total_amount');
        $activeChannels = Channel::where('status', 'active')->count();

        // ── Recent Reservations ──────────────────────
        $recentReservations = Reservation::with(['room', 'channel', 'property'])
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // ── Channel Status ───────────────────────────
        $channels = Channel::with('property')
            ->orderBy('status')
            ->get();

        // ── Today's Check-ins ────────────────────────
        $checkIns = Reservation::with(['room', 'channel'])
            ->whereDate('check_in', Carbon::today())
            ->where('status', '!=', 'cancelled')
            ->get();

        // ── Today's Check-outs ───────────────────────
        $checkOuts = Reservation::with(['room', 'channel'])
            ->whereDate('check_out', Carbon::today())
            ->where('status', '!=', 'cancelled')
            ->get();

        return view('pages.dashboard', compact(
            'totalBookings',
            'occupancyRate',
            'totalRevenue',
            'activeChannels',
            'recentReservations',
            'channels',
            'checkIns',
            'checkOuts'
        ));
    }
}
