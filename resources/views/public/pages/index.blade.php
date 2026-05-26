@extends('public.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Dashboard</h4>
                    <p class="mb-0">Welcome back, {{ auth()->user()->name }} 👋</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex align-items-center gap-2">
                <a href="{{ route('booking') }}" class="btn btn-primary btn-rounded btn-sm">
                    <i class="fa fa-plus me-1"></i> New Booking
                </a>
                <a href="{{ route('booking.pull') }}" class="btn btn-info btn-rounded btn-sm">
                    <i class="fa fa-refresh me-1"></i> Sync OTAs
                </a>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mx-3">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ═══════════════════════════════════════════════
             STAT CARDS ROW 1
        ════════════════════════════════════════════════ --}}
        <div class="row">

            {{-- Total Revenue --}}
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Total Revenue</p>
                                <h3 class="text-success mb-0">
                                    ${{ number_format($stats['total_revenue'], 2) }}
                                </h3>
                            </div>
                            <div class="rounded-circle bg-success d-flex align-items-center justify-content-center"
                                style="width:56px;height:56px;opacity:0.15;position:absolute;right:20px;">
                            </div>
                            <div style="font-size:28px;">💰</div>
                        </div>
                        <p class="mb-0 mt-2 text-muted" style="font-size:12px;">
                            Net after commissions
                        </p>
                    </div>
                </div>
            </div>

            {{-- Total Reservations --}}
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Total Bookings</p>
                                <h3 class="text-primary mb-0">
                                    {{ $stats['total_reservations'] }}
                                </h3>
                            </div>
                            <div style="font-size:28px;">📋</div>
                        </div>
                        <p class="mb-0 mt-2 text-muted" style="font-size:12px;">
                            <span class="text-warning">{{ $stats['pending'] }} pending</span>
                            · <span class="text-info">{{ $stats['checked_in'] }} checked in</span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Total Properties --}}
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Properties</p>
                                <h3 class="text-info mb-0">
                                    {{ $stats['total_properties'] }}
                                </h3>
                            </div>
                            <div style="font-size:28px;">🏨</div>
                        </div>
                        <p class="mb-0 mt-2 text-muted" style="font-size:12px;">
                            {{ $stats['total_rooms'] }} total rooms
                        </p>
                    </div>
                </div>
            </div>

            {{-- Active Channels --}}
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Active Channels</p>
                                <h3 class="text-warning mb-0">
                                    {{ $stats['active_channels'] }}
                                </h3>
                            </div>
                            <div style="font-size:28px;">🌐</div>
                        </div>
                        <p class="mb-0 mt-2 text-muted" style="font-size:12px;">
                            OTA channels connected
                        </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- ═══════════════════════════════════════════════
             STAT CARDS ROW 2 — Booking Status
        ════════════════════════════════════════════════ --}}
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card" style="border-left: 4px solid #f6c23e;">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-0" style="font-size:12px;">PENDING</p>
                                <h4 class="text-warning mb-0">{{ $stats['pending'] }}</h4>
                            </div>
                            <span style="font-size:24px;">⏳</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card" style="border-left: 4px solid #1cc88a;">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-0" style="font-size:12px;">CONFIRMED</p>
                                <h4 class="text-success mb-0">{{ $stats['confirmed'] }}</h4>
                            </div>
                            <span style="font-size:24px;">✅</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card" style="border-left: 4px solid #36b9cc;">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-0" style="font-size:12px;">CHECKED IN</p>
                                <h4 class="text-info mb-0">{{ $stats['checked_in'] }}</h4>
                            </div>
                            <span style="font-size:24px;">🏠</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card" style="border-left: 4px solid #e74a3b;">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-0" style="font-size:12px;">CANCELLED</p>
                                <h4 class="text-danger mb-0">{{ $stats['cancelled'] }}</h4>
                            </div>
                            <span style="font-size:24px;">❌</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             MONTHLY REVENUE CHART + RECENT BOOKINGS
        ════════════════════════════════════════════════ --}}
        <div class="row">

            {{-- Monthly Revenue Chart --}}
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Revenue — {{ date('Y') }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart" height="100"></canvas>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quick Actions</h4>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <a href="{{ route('booking') }}" class="btn btn-primary w-100 text-start">
                            <i class="fa fa-plus me-2"></i> New Manual Booking
                        </a>
                        <a href="{{ route('add_property') }}" class="btn btn-info w-100 text-start">
                            <i class="fa fa-building me-2"></i> Add Property
                        </a>
                        <a href="{{ route('add_room') }}" class="btn btn-success w-100 text-start">
                            <i class="fa fa-bed me-2"></i> Add Room
                        </a>
                        <a href="{{ route('connect_channel') }}" class="btn btn-warning w-100 text-start">
                            <i class="fa fa-plug me-2"></i> Connect OTA Channel
                        </a>
                        <a href="{{ route('rates') }}" class="btn btn-secondary w-100 text-start">
                            <i class="fa fa-calendar me-2"></i> Manage Rates
                        </a>
                        <a href="{{ route('reports') }}" class="btn btn-dark w-100 text-start">
                            <i class="fa fa-bar-chart me-2"></i> View Reports
                        </a>
                        <hr>
                        <a href="{{ route('booking.pull') }}" class="btn btn-outline-info w-100 text-start">
                            <i class="fa fa-refresh me-2"></i> Sync from Booking.com
                        </a>
                        <form action="{{ route('booking.push.rates') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-warning w-100 text-start">
                                <i class="fa fa-upload me-2"></i> Push Rates to OTAs
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        {{-- ═══════════════════════════════════════════════
             RECENT RESERVATIONS TABLE
        ════════════════════════════════════════════════ --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Recent Reservations</h4>
                        <a href="{{ route('reservations') }}" class="btn btn-sm btn-primary">
                            View All
                        </a>
                    </div>
                    <div class="card-body">
                        @if($recent_reservations->isEmpty())
                            <div class="text-center py-4">
                                <p class="text-muted">No reservations yet.</p>
                                <a href="{{ route('booking') }}" class="btn btn-primary btn-sm">
                                    Create First Booking
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Guest</th>
                                            <th>Room</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Source</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recent_reservations as $res)
                                        <tr>
                                            <td>
                                                <strong class="text-primary">
                                                    {{ $res->booking_id }}
                                                </strong>
                                            </td>
                                            <td>{{ $res->guest_name }}</td>
                                            <td>{{ $res->room->name ?? 'N/A' }}</td>
                                            <td>{{ $res->check_in->format('d M Y') }}</td>
                                            <td>{{ $res->check_out->format('d M Y') }}</td>
                                            <td>
                                                @if($res->channel)
                                                    <span class="badge badge-info">
                                                        {{ $res->channel->display_name }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">Direct</span>
                                                @endif
                                            </td>
                                            <td>
                                                <strong class="text-success">
                                                    {{ $res->currency }}
                                                    {{ number_format($res->net_amount, 2) }}
                                                </strong>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $res->statusColor() }}">
                                                    {{ ucfirst(str_replace('_',' ',$res->status)) }}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Chart JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

// Build revenue data from Laravel
const revenueData = @json(
    collect(range(1,12))->map(function($m) use ($monthly_revenue) {
        return $monthly_revenue->get($m)?->revenue ?? 0;
    })
);

const bookingsData = @json(
    collect(range(1,12))->map(function($m) use ($monthly_revenue) {
        return $monthly_revenue->get($m)?->bookings ?? 0;
    })
);

const ctx = document.getElementById('revenueChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: months,
        datasets: [
            {
                label: 'Revenue ($)',
                data: revenueData,
                backgroundColor: 'rgba(99,102,241,0.7)',
                borderColor: 'rgba(99,102,241,1)',
                borderWidth: 1,
                yAxisID: 'y',
            },
            {
                label: 'Bookings',
                data: bookingsData,
                type: 'line',
                borderColor: '#1cc88a',
                backgroundColor: 'rgba(28,200,138,0.1)',
                borderWidth: 2,
                pointRadius: 4,
                tension: 0.4,
                yAxisID: 'y1',
            }
        ]
    },
    options: {
        responsive: true,
        interaction: { mode: 'index', intersect: false },
        plugins: { legend: { labels: { color: '#9da0b3' } } },
        scales: {
            x:  { ticks: { color: '#9da0b3' }, grid: { color: '#2d3153' } },
            y:  {
                ticks: { color: '#9da0b3' },
                grid:  { color: '#2d3153' },
                position: 'left',
                title: { display: true, text: 'Revenue ($)', color: '#9da0b3' }
            },
            y1: {
                ticks: { color: '#9da0b3' },
                grid:  { drawOnChartArea: false },
                position: 'right',
                title: { display: true, text: 'Bookings', color: '#9da0b3' }
            }
        }
    }
});
</script>
@endsection