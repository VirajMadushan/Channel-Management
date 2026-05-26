@extends('public.layouts.app')

@section('title', 'Reservations')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Reservations</h4>
                    <p class="mb-0">Manage all hotel bookings</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a href="{{ route('booking') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-plus me-2"></i> New Booking
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

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mx-3">
                <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Stats Row --}}
        <div class="row mb-4">
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-primary">{{ $reservations->total() }}</h3>
                        <p class="mb-0 text-muted">Total Bookings</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-warning">
                            {{ $reservations->getCollection()->where('status','pending')->count() }}
                        </h3>
                        <p class="mb-0 text-muted">Pending</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-info">
                            {{ $reservations->getCollection()->where('status','checked_in')->count() }}
                        </h3>
                        <p class="mb-0 text-muted">Checked In</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-success">
                            {{ $reservations->getCollection()->where('status','confirmed')->count() }}
                        </h3>
                        <p class="mb-0 text-muted">Confirmed</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Reservations Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Reservations</h4>
                    </div>
                    <div class="card-body">
                        @if($reservations->isEmpty())
                            <div class="text-center py-5">
                                <i class="fa fa-calendar fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No reservations yet</h5>
                                <p class="text-muted">Create your first booking</p>
                                <a href="{{ route('booking') }}" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i> New Booking
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Guest</th>
                                            <th>Room</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Nights</th>
                                            <th>Source</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reservations as $res)
                                        <tr>
                                            <td>
                                                <strong class="text-primary">
                                                    {{ $res->booking_id }}
                                                </strong>
                                                @if($res->ota_booking_id)
                                                    <br>
                                                    <small class="text-muted">
                                                        OTA: {{ $res->ota_booking_id }}
                                                    </small>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>{{ $res->guest_name }}</strong>
                                                    @if($res->guest_email)
                                                        <br>
                                                        <small class="text-muted">
                                                            {{ $res->guest_email }}
                                                        </small>
                                                    @endif
                                                    @if($res->guest_country)
                                                        <br>
                                                        <small class="text-muted">
                                                            🌍 {{ $res->guest_country }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <strong>{{ $res->room->name ?? 'N/A' }}</strong>
                                                    <br>
                                                    <small class="text-muted">
                                                        {{ $res->property->name ?? '' }}
                                                    </small>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $res->check_in->format('d M Y') }}
                                            </td>
                                            <td>
                                                {{ $res->check_out->format('d M Y') }}
                                            </td>
                                            <td>
                                                <span class="badge badge-light">
                                                    {{ $res->nights }} nights
                                                </span>
                                                <br>
                                                <small class="text-muted">
                                                    {{ $res->adults }} adults
                                                    @if($res->children > 0)
                                                        , {{ $res->children }} children
                                                    @endif
                                                </small>
                                            </td>
                                            <td>
                                                @if($res->channel)
                                                    <span class="badge badge-info">
                                                        {{ $res->channel->display_name }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">
                                                        Direct
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <strong class="text-success">
                                                    {{ $res->currency }}
                                                    {{ number_format($res->net_amount, 2) }}
                                                </strong>
                                                @if($res->commission_amount > 0)
                                                    <br>
                                                    <small class="text-danger">
                                                        -{{ $res->currency }}
                                                        {{ number_format($res->commission_amount, 2) }}
                                                        commission
                                                    </small>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $res->statusColor() }}">
                                                    {{ ucfirst(str_replace('_', ' ', $res->status)) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column gap-1">

                                                    {{-- Update Status --}}
                                                    <form action="{{ route('reservations.update', $res->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status"
                                                            class="form-control form-control-sm mb-1"
                                                            onchange="this.form.submit()">
                                                            @foreach(['pending','confirmed','checked_in','checked_out','cancelled','no_show'] as $status)
                                                                <option value="{{ $status }}"
                                                                    {{ $res->status === $status ? 'selected' : '' }}>
                                                                    {{ ucfirst(str_replace('_',' ',$status)) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>

                                                    {{-- Delete --}}
                                                    <form action="{{ route('reservations.delete', $res->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Delete booking {{ $res->booking_id }}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-xs w-100">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center mt-3">
                                {{ $reservations->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection