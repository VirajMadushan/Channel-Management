@extends('public.layouts.app')

@section('title', 'Connect Channel')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Connect Channel</h4>
                    <p class="mb-0">Connect a new OTA booking channel</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a href="{{ route('channels') }}" class="btn btn-secondary btn-rounded">
                    <i class="fa fa-arrow-left me-2"></i> Back to Channels
                </a>
            </div>
        </div>

        {{-- OTA Quick Select Cards --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Select OTA Platform</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach([
                                ['name' => 'booking_com', 'label' => 'Booking.com',  'logo' => '🔵', 'color' => '#003580'],
                                ['name' => 'expedia',     'label' => 'Expedia',       'logo' => '🟡', 'color' => '#00355F'],
                                ['name' => 'airbnb',      'label' => 'Airbnb',        'logo' => '🔴', 'color' => '#FF5A5F'],
                                ['name' => 'agoda',       'label' => 'Agoda',         'logo' => '🟢', 'color' => '#003B95'],
                                ['name' => 'hotels_com',  'label' => 'Hotels.com',    'logo' => '🟠', 'color' => '#C8102E'],
                                ['name' => 'trivago',     'label' => 'Trivago',       'logo' => '🔷', 'color' => '#E8690B'],
                                ['name' => 'direct',      'label' => 'Direct Booking','logo' => '🏨', 'color' => '#6366F1'],
                            ] as $ota)
                            <div class="col-md-3 col-6 mb-3">
                                <div class="ota-card p-3 rounded text-center"
                                    style="border: 2px solid #3a3f5c; cursor:pointer; transition: all 0.2s;"
                                    onclick="selectOTA('{{ $ota['name'] }}', '{{ $ota['label'] }}')"
                                    id="card_{{ $ota['name'] }}">
                                    <div style="font-size: 36px;">{{ $ota['logo'] }}</div>
                                    <strong class="text-white">{{ $ota['label'] }}</strong>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Connection Form --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Channel Details</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('channels.store') }}">
                            @csrf

                            <div class="row">
                                {{-- OTA Name (hidden, set by card click) --}}
                                <input type="hidden" name="ota_name" id="ota_name_input" value="booking_com">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Selected Platform</label>
                                    <input type="text" id="display_name_show"
                                        class="form-control"
                                        value="Booking.com"
                                        readonly
                                        style="background:#1e2139; color: var(--primary); font-weight:bold;">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Display Name <span class="text-danger">*</span></label>
                                    <input type="text" name="display_name" id="display_name_input"
                                        class="form-control"
                                        placeholder="e.g. Booking.com - Main"
                                        value="{{ old('display_name') }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Property <span class="text-danger">*</span></label>
                                    <select name="property_id" class="form-control" required>
                                        <option value="">-- Select Property --</option>
                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}"
                                                {{ old('property_id') == $property->id ? 'selected' : '' }}>
                                                {{ $property->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Your Hotel ID on this OTA</label>
                                    <input type="text" name="hotel_id" class="form-control"
                                        placeholder="e.g. 12345678"
                                        value="{{ old('hotel_id') }}">
                                    <small class="text-muted">
                                        Find this in your OTA extranet/partner portal
                                    </small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">API Key / Access Token</label>
                                    <input type="password" name="api_key" class="form-control"
                                        placeholder="Paste your API key here">
                                    <small class="text-muted">
                                        This is encrypted before saving. Leave blank if not yet available.
                                    </small>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Commission Rate (%) <span class="text-danger">*</span></label>
                                    <input type="number" name="commission_rate" class="form-control"
                                        step="0.01" min="0" max="100"
                                        placeholder="e.g. 15"
                                        value="{{ old('commission_rate') }}" required>
                                    <small class="text-muted">
                                        Booking.com ~15%, Expedia ~18%, Airbnb ~3%
                                    </small>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Sync Frequency</label>
                                    <select name="sync_frequency" class="form-control">
                                        <option value="realtime">Real-time</option>
                                        <option value="hourly" selected>Every Hour</option>
                                        <option value="daily">Daily</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="pending">Pending (test first)</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Sync Options --}}
                            <h5 class="mb-3 mt-2 text-primary">
                                <i class="fa fa-refresh me-2"></i> Sync Options
                            </h5>
                            <div class="row mb-4">
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="sync_availability" value="1"
                                            id="sync_availability" checked>
                                        <label class="form-check-label" for="sync_availability">
                                            Sync Availability
                                            <br><small class="text-muted">Push room availability to this OTA</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="sync_rates" value="1"
                                            id="sync_rates" checked>
                                        <label class="form-check-label" for="sync_rates">
                                            Sync Rates
                                            <br><small class="text-muted">Push your rates to this OTA</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="receive_reservations" value="1"
                                            id="receive_reservations" checked>
                                        <label class="form-check-label" for="receive_reservations">
                                            Receive Reservations
                                            <br><small class="text-muted">Auto-import bookings from this OTA</small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- Booking.com Info Box --}}
                            <div class="alert alert-info mb-4" id="booking_com_info">
                                <h6><i class="fa fa-info-circle me-2"></i> How to connect Booking.com</h6>
                                <ol class="mb-0 mt-2">
                                    <li>Login to <strong>partner.booking.com</strong></li>
                                    <li>Go to <strong>Account → Connectivity Provider</strong></li>
                                    <li>Find your <strong>Hotel ID</strong> and <strong>API credentials</strong></li>
                                    <li>Paste them above and click Connect</li>
                                    <li>Give Booking.com this webhook URL:<br>
                                        <code>{{ url('/api/booking/webhook') }}</code>
                                    </li>
                                </ol>
                            </div>

                            {{-- Submit --}}
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa fa-plug me-2"></i> Connect Channel
                                </button>
                                <a href="{{ route('channels') }}" class="btn btn-secondary btn-lg">
                                    Cancel
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
function selectOTA(name, label) {
    // Update hidden input
    document.getElementById('ota_name_input').value = name;

    // Update display
    document.getElementById('display_name_show').value = label;
    document.getElementById('display_name_input').value = label;

    // Highlight selected card
    document.querySelectorAll('.ota-card').forEach(card => {
        card.style.borderColor = '#3a3f5c';
        card.style.background  = 'transparent';
    });
    const selected = document.getElementById('card_' + name);
    if (selected) {
        selected.style.borderColor = 'var(--primary)';
        selected.style.background  = 'rgba(99,102,241,0.1)';
    }
}

// Select Booking.com by default on page load
document.addEventListener('DOMContentLoaded', function() {
    selectOTA('booking_com', 'Booking.com');
});
</script>
@endsection