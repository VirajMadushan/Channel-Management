@extends('public.layouts.app')

@section('title', 'Channels')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Channels (OTAs)</h4>
                    <p class="mb-0">Manage your connected booking channels</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a href="{{ route('connect_channel') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-plus me-2"></i> Connect Channel
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

        {{-- OTA Cards --}}
        @if($channels->isEmpty())
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="fa fa-globe fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No channels connected yet</h5>
                            <p class="text-muted">Connect your first OTA channel to start receiving bookings</p>
                            <a href="{{ route('connect_channel') }}" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i> Connect Channel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else

            {{-- Stats Row --}}
            <div class="row mb-4">
                <div class="col-md-3 col-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-primary">{{ $channels->count() }}</h3>
                            <p class="mb-0 text-muted">Total Channels</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-success">{{ $channels->where('status','active')->count() }}</h3>
                            <p class="mb-0 text-muted">Active</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-warning">{{ $channels->where('status','pending')->count() }}</h3>
                            <p class="mb-0 text-muted">Pending</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-danger">{{ $channels->where('status','inactive')->count() }}</h3>
                            <p class="mb-0 text-muted">Inactive</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Channels Table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Connected Channels</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Channel</th>
                                            <th>Property</th>
                                            <th>Hotel ID</th>
                                            <th>Commission</th>
                                            <th>Sync Settings</th>
                                            <th>Last Synced</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($channels as $index => $channel)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2" style="font-size:24px;">
                                                        {{ $channel->otaLogo() }}
                                                    </span>
                                                    <div>
                                                        <strong>{{ $channel->display_name }}</strong>
                                                        <br>
                                                        <small class="text-muted">
                                                            {{ $channel->api_key_display ?? '••••••••' }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $channel->property->name ?? 'N/A' }}</td>
                                            <td>
                                                <code>{{ $channel->hotel_id ?? 'Not set' }}</code>
                                            </td>
                                            <td>
                                                <span class="text-warning fw-bold">
                                                    {{ $channel->commission_rate }}%
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column gap-1">
                                                    <span class="badge badge-{{ $channel->sync_availability ? 'success' : 'secondary' }}">
                                                        {{ $channel->sync_availability ? '✓' : '✗' }} Availability
                                                    </span>
                                                    <span class="badge badge-{{ $channel->sync_rates ? 'success' : 'secondary' }}">
                                                        {{ $channel->sync_rates ? '✓' : '✗' }} Rates
                                                    </span>
                                                    <span class="badge badge-{{ $channel->receive_reservations ? 'success' : 'secondary' }}">
                                                        {{ $channel->receive_reservations ? '✓' : '✗' }} Reservations
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                @if($channel->last_synced_at)
                                                    <small>{{ $channel->last_synced_at->diffForHumans() }}</small>
                                                @else
                                                    <small class="text-muted">Never synced</small>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $channel->statusColor() }}">
                                                    {{ ucfirst($channel->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1 flex-column">

                                                    {{-- Toggle Status --}}
                                                    <form action="{{ route('channels.update', $channel->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status"
                                                            value="{{ $channel->status === 'active' ? 'inactive' : 'active' }}">
                                                        <input type="hidden" name="display_name" value="{{ $channel->display_name }}">
                                                        <input type="hidden" name="commission_rate" value="{{ $channel->commission_rate }}">
                                                        <button type="submit"
                                                            class="btn btn-{{ $channel->status === 'active' ? 'warning' : 'success' }} btn-xs w-100">
                                                            {{ $channel->status === 'active' ? 'Deactivate' : 'Activate' }}
                                                        </button>
                                                    </form>

                                                    {{-- Push Rates --}}
                                                    <form action="{{ route('booking.push.rates') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-xs w-100">
                                                            Push Rates
                                                        </button>
                                                    </form>

                                                    {{-- Sync Reservations --}}
                                                    <a href="{{ route('booking.pull') }}"
                                                        class="btn btn-primary btn-xs w-100">
                                                        Sync Now
                                                    </a>

                                                    {{-- Delete --}}
                                                    <form action="{{ route('channels.delete', $channel->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Remove {{ $channel->display_name }}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs w-100">
                                                            Remove
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection