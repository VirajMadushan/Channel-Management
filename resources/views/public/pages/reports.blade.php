@extends('public.layouts.app')

@section('title', 'Reports')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Reports</h4>
                    <p class="mb-0">Revenue and booking analytics — {{ date('Y') }}</p>
                </div>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             SUMMARY STAT CARDS
        ════════════════════════════════════════════════ --}}
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">Total Revenue</p>
                        <h3 class="text-success">
                            ${{ number_format($report['total_revenue'], 2) }}
                        </h3>
                        <small class="text-muted">Net after commissions</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">Total Bookings</p>
                        <h3 class="text-primary">
                            {{ $report['total_bookings'] }}
                        </h3>
                        <small class="text-muted">All time</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">Avg Stay</p>
                        <h3 class="text-info">
                            {{ $report['avg_nights'] }}
                        </h3>
                        <small class="text-muted">nights per booking</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">Occupancy Rate</p>
                        <h3 class="text-warning">
                            {{ $report['occupancy_rate'] }}%
                        </h3>
                        <small class="text-muted">Currently checked in</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             MONTHLY REVENUE CHART
        ════════════════════════════════════════════════ --}}
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Monthly Revenue & Bookings — {{ date('Y') }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyChart" height="100"></canvas>
                    </div>
                </div>
            </div>

            {{-- Booking Status Pie Chart --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bookings by Status</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="statusChart" height="200"></canvas>
                        <div class="mt-3">
                            @foreach($report['by_status'] as $status => $count)
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted text-capitalize">
                                    {{ str_replace('_', ' ', $status) }}
                                </span>
                                <span class="badge badge-primary">{{ $count }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             REVENUE BY CHANNEL + TOP ROOMS
        ════════════════════════════════════════════════ --}}
        <div class="row">

            {{-- Revenue by Channel --}}
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Revenue by Channel</h4>
                    </div>
                    <div class="card-body">
                        @if($report['by_channel']->isEmpty())
                            <p class="text-muted text-center py-3">
                                No channel data yet
                            </p>
                        @else
                            <canvas id="channelChart" height="150"></canvas>
                            <div class="table-responsive mt-3">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Channel</th>
                                            <th>Bookings</th>
                                            <th>Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($report['by_channel'] as $row)
                                        <tr>
                                            <td>
                                                @if($row->channel)
                                                    {{ $row->channel->otaLogo() }}
                                                    {{ $row->channel->display_name }}
                                                @else
                                                    🏨 Direct Booking
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    {{ $row->total }}
                                                </span>
                                            </td>
                                            <td class="text-success">
                                                ${{ number_format($row->revenue, 2) }}
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

            {{-- Top Rooms --}}
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Top Performing Rooms</h4>
                    </div>
                    <div class="card-body">
                        @if($report['top_rooms']->isEmpty())
                            <p class="text-muted text-center py-3">
                                No room data yet
                            </p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>Room</th>
                                            <th>Bookings</th>
                                            <th>Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($report['top_rooms'] as $index => $row)
                                        <tr>
                                            <td>
                                                @if($index === 0) 🥇
                                                @elseif($index === 1) 🥈
                                                @elseif($index === 2) 🥉
                                                @else {{ $index + 1 }}
                                                @endif
                                            </td>
                                            <td>
                                                <strong>
                                                    {{ $row->room->name ?? 'N/A' }}
                                                </strong>
                                            </td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ $row->bookings }}
                                                </span>
                                            </td>
                                            <td class="text-success">
                                                ${{ number_format($row->revenue, 2) }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
const months = ['Jan','Feb','Mar','Apr','May','Jun',
                 'Jul','Aug','Sep','Oct','Nov','Dec'];

// ── Monthly Revenue Chart ─────────────────────────────
const revenueData  = @json(
    collect(range(1,12))->map(fn($m) =>
        $report['monthly']->get($m)?->revenue ?? 0
    )
);
const bookingsData = @json(
    collect(range(1,12))->map(fn($m) =>
        $report['monthly']->get($m)?->bookings ?? 0
    )
);

new Chart(document.getElementById('monthlyChart'), {
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
                position: 'left',
                ticks: { color: '#9da0b3' },
                grid:  { color: '#2d3153' },
                title: { display: true, text: 'Revenue ($)', color: '#9da0b3' }
            },
            y1: {
                position: 'right',
                ticks: { color: '#9da0b3' },
                grid:  { drawOnChartArea: false },
                title: { display: true, text: 'Bookings', color: '#9da0b3' }
            }
        }
    }
});

// ── Status Pie Chart ──────────────────────────────────
const statusLabels = @json($report['by_status']->keys()->map(fn($s) => ucfirst(str_replace('_',' ',$s))));
const statusValues = @json($report['by_status']->values());

new Chart(document.getElementById('statusChart'), {
    type: 'doughnut',
    data: {
        labels: statusLabels,
        datasets: [{
            data: statusValues,
            backgroundColor: [
                '#f6c23e','#1cc88a','#36b9cc',
                '#858796','#e74a3b','#2d3153'
            ],
            borderWidth: 0,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: { color: '#9da0b3', padding: 10 }
            }
        }
    }
});

// ── Channel Bar Chart ─────────────────────────────────
@if(!$report['by_channel']->isEmpty())
const channelLabels  = @json($report['by_channel']->map(fn($r) => $r->channel?->display_name ?? 'Direct'));
const channelRevenue = @json($report['by_channel']->map(fn($r) => $r->revenue));

new Chart(document.getElementById('channelChart'), {
    type: 'bar',
    data: {
        labels: channelLabels,
        datasets: [{
            label: 'Revenue ($)',
            data: channelRevenue,
            backgroundColor: [
                'rgba(99,102,241,0.7)',
                'rgba(28,200,138,0.7)',
                'rgba(246,194,62,0.7)',
                'rgba(54,185,204,0.7)',
                'rgba(231,74,59,0.7)',
            ],
            borderWidth: 0,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            x: { ticks: { color: '#9da0b3' }, grid: { color: '#2d3153' } },
            y: { ticks: { color: '#9da0b3' }, grid: { color: '#2d3153' } }
        }
    }
});
@endif
</script>
@endsection