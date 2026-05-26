@extends('public.layouts.app')

@section('title', 'Rates & Availability')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Rates & Availability</h4>
                    <p class="mb-0">Manage room rates and availability per channel</p>
                </div>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mx-3">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mx-3">
                <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">

            {{-- ═══════════════════════════════════════════
                 ADD / UPDATE RATE FORM
            ════════════════════════════════════════════ --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fa fa-plus me-2"></i> Set Rate
                        </h4>
                    </div>
                    <div class="card-body">

                        @if($rooms->isEmpty())
                            <div class="text-center py-3">
                                <p class="text-muted">No rooms found.</p>
                                <a href="{{ route('add_room') }}" class="btn btn-primary btn-sm">
                                    Add Room First
                                </a>
                            </div>
                        @else
                            <form method="POST" action="{{ route('rates.store') }}">
                                @csrf

                                {{-- Room --}}
                                <div class="mb-3">
                                    <label class="form-label">
                                        Room <span class="text-danger">*</span>
                                    </label>
                                    <select name="room_id" class="form-control" required>
                                        <option value="">-- Select Room --</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}">
                                                {{ $room->name }}
                                                ({{ $room->property->name ?? '' }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Channel --}}
                                <div class="mb-3">
                                    <label class="form-label">Channel (OTA)</label>
                                    <select name="channel_id" class="form-control">
                                        <option value="">All Channels / Base Rate</option>
                                        @foreach($channels as $channel)
                                            <option value="{{ $channel->id }}">
                                                {{ $channel->otaLogo() }}
                                                {{ $channel->display_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">
                                        Leave blank to set base rate for all channels
                                    </small>
                                </div>

                                {{-- Date --}}
                                <div class="mb-3">
                                    <label class="form-label">
                                        Date <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" name="date" class="form-control"
                                        min="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>

                                {{-- Rate --}}
                                <div class="mb-3">
                                    <label class="form-label">
                                        Rate (per night) <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="rate" class="form-control"
                                        step="0.01" min="0"
                                        placeholder="150.00" required>
                                </div>

                                {{-- Available Rooms --}}
                                <div class="mb-3">
                                    <label class="form-label">
                                        Available Rooms <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" name="available_rooms"
                                        class="form-control"
                                        min="0" placeholder="5" required>
                                </div>

                                {{-- Min Stay --}}
                                <div class="mb-3">
                                    <label class="form-label">Min Stay (nights)</label>
                                    <input type="number" name="min_stay" class="form-control"
                                        min="1" value="1">
                                </div>

                                {{-- Stop Sell --}}
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="is_closed" value="1" id="is_closed">
                                        <label class="form-check-label" for="is_closed">
                                            Stop Sell (close this date)
                                        </label>
                                    </div>
                                    <small class="text-muted">
                                        Tick this to block bookings for this date
                                    </small>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fa fa-save me-2"></i> Save Rate
                                </button>

                            </form>
                        @endif
                    </div>
                </div>

                {{-- Bulk Rate Form --}}
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fa fa-calendar me-2"></i> Bulk Rate Update
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rates.store') }}"
                            id="bulkRateForm">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Room</label>
                                <select name="room_id" class="form-control" required>
                                    <option value="">-- Select Room --</option>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">
                                            {{ $room->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Channel</label>
                                <select name="channel_id" class="form-control">
                                    <option value="">All Channels</option>
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}">
                                            {{ $channel->display_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">From Date</label>
                                    <input type="date" name="date_from"
                                        id="bulk_from"
                                        class="form-control"
                                        min="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">To Date</label>
                                    <input type="date" name="date_to"
                                        id="bulk_to"
                                        class="form-control"
                                        min="{{ date('Y-m-d') }}"
                                        value="{{ date('Y-m-d', strtotime('+7 days')) }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Rate Per Night</label>
                                <input type="number" name="rate" class="form-control"
                                    step="0.01" min="0"
                                    placeholder="150.00" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Available Rooms</label>
                                <input type="number" name="available_rooms"
                                    class="form-control"
                                    min="0" placeholder="5" required>
                            </div>

                            <button type="button" class="btn btn-warning w-100"
                                onclick="submitBulkRates()">
                                <i class="fa fa-calendar me-2"></i> Apply to Date Range
                            </button>

                        </form>
                    </div>
                </div>

            </div>

            {{-- ═══════════════════════════════════════════
                 RATES TABLE
            ════════════════════════════════════════════ --}}
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">
                            Rates — Next 30 Days
                        </h4>
                        <div class="d-flex gap-2">
                            <form action="{{ route('booking.push.rates') }}" method="POST">
                                @csrf
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-upload me-1"></i> Push to OTAs
                                </button>
                            </form>
                            <form action="{{ route('booking.push.availability') }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm">
                                    <i class="fa fa-refresh me-1"></i> Push Availability
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($rates->isEmpty())
                            <div class="text-center py-5">
                                <i class="fa fa-calendar fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No rates set yet</h5>
                                <p class="text-muted">
                                    Use the form on the left to set rates for your rooms
                                </p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Room</th>
                                            <th>Channel</th>
                                            <th>Rate</th>
                                            <th>Available</th>
                                            <th>Min Stay</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rates as $rate)
                                        <tr class="{{ $rate->is_closed ? 'table-danger' : '' }}">
                                            <td>
                                                <strong>
                                                    {{ $rate->date->format('d M Y') }}
                                                </strong>
                                                <br>
                                                <small class="text-muted">
                                                    {{ $rate->date->format('l') }}
                                                </small>
                                            </td>
                                            <td>
                                                <strong>
                                                    {{ $rate->room->name ?? 'N/A' }}
                                                </strong>
                                            </td>
                                            <td>
                                                @if($rate->channel)
                                                    <span class="badge badge-info">
                                                        {{ $rate->channel->otaLogo() }}
                                                        {{ $rate->channel->display_name }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">
                                                        All Channels
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <strong class="text-success">
                                                    ${{ number_format($rate->rate, 2) }}
                                                </strong>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{
                                                    $rate->available_rooms > 3 ? 'success' :
                                                    ($rate->available_rooms > 0 ? 'warning' : 'danger')
                                                }}">
                                                    {{ $rate->available_rooms }} rooms
                                                </span>
                                            </td>
                                            <td>
                                                {{ $rate->min_stay }} night(s)
                                            </td>
                                            <td>
                                                @if($rate->is_closed)
                                                    <span class="badge badge-danger">
                                                        Stop Sell
                                                    </span>
                                                @else
                                                    <span class="badge badge-success">
                                                        Open
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- Quick toggle stop sell --}}
                                                <form action="{{ route('rates.update', $rate->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="rate"
                                                        value="{{ $rate->rate }}">
                                                    <input type="hidden" name="available_rooms"
                                                        value="{{ $rate->available_rooms }}">
                                                    <input type="hidden" name="min_stay"
                                                        value="{{ $rate->min_stay }}">
                                                    <input type="hidden" name="is_closed"
                                                        value="{{ $rate->is_closed ? 0 : 1 }}">
                                                    <button type="submit"
                                                        class="btn btn-{{
                                                            $rate->is_closed ? 'success' : 'warning'
                                                        }} btn-xs">
                                                        {{ $rate->is_closed ? 'Open' : 'Stop Sell' }}
                                                    </button>
                                                </form>
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

<script>
// Submit bulk rates — loops through each date in range
function submitBulkRates() {
    const from  = new Date(document.getElementById('bulk_from').value);
    const to    = new Date(document.getElementById('bulk_to').value);
    const form  = document.getElementById('bulkRateForm');

    if (!from || !to || from > to) {
        alert('Please select a valid date range.');
        return;
    }

    if (!confirm('Apply this rate to all dates from '
        + from.toDateString() + ' to ' + to.toDateString() + '?')) {
        return;
    }

    // Submit once per date in the range
    let current = new Date(from);
    let count   = 0;

    function submitNext() {
        if (current > to) {
            alert('Done! Rates applied for ' + count + ' dates.');
            window.location.reload();
            return;
        }

        // Set the date input and submit
        const dateStr = current.toISOString().split('T')[0];
        let dateInput = form.querySelector('input[name="date"]');

        if (!dateInput) {
            dateInput = document.createElement('input');
            dateInput.type = 'hidden';
            dateInput.name = 'date';
            form.appendChild(dateInput);
        }

        dateInput.value = dateStr;

        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
        }).then(() => {
            count++;
            current.setDate(current.getDate() + 1);
            submitNext();
        }).catch(err => {
            console.error(err);
            current.setDate(current.getDate() + 1);
            submitNext();
        });
    }

    submitNext();
}
</script>
@endsection