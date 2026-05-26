@extends('public.layouts.app')

@section('title', 'Settings')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Settings</h4>
                    <p class="mb-0">Manage your account and system settings</p>
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
                 LEFT COLUMN
            ════════════════════════════════════════════ --}}
            <div class="col-xl-6">

                {{-- Admin Profile --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fa fa-user me-2"></i> Admin Profile
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('settings.update') }}">
                            @csrf

                            <input type="hidden" name="section" value="profile">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ auth()->user()->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ auth()->user()->email }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i> Update Profile
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Change Password --}}
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fa fa-lock me-2"></i> Change Password
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('settings.update') }}">
                            @csrf

                            <input type="hidden" name="section" value="password">

                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password"
                                    class="form-control"
                                    placeholder="Enter current password" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password"
                                    class="form-control"
                                    placeholder="Min 8 characters" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation"
                                    class="form-control"
                                    placeholder="Repeat new password" required>
                            </div>

                            <button type="submit" class="btn btn-warning">
                                <i class="fa fa-key me-2"></i> Change Password
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            {{-- ═══════════════════════════════════════════
                 RIGHT COLUMN
            ════════════════════════════════════════════ --}}
            <div class="col-xl-6">

                {{-- Booking.com API Settings --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            🔵 Booking.com API Settings
                        </h4>
                    </div>
                    <div class="card-body">

                        {{-- Status Badge --}}
                        @if(config('services.booking.username'))
                            <div class="alert alert-success mb-3">
                                <i class="fa fa-check-circle me-2"></i>
                                Booking.com API credentials are configured
                            </div>
                        @else
                            <div class="alert alert-warning mb-3">
                                <i class="fa fa-exclamation-triangle me-2"></i>
                                Booking.com API not configured yet —
                                add credentials to your .env file
                            </div>
                        @endif

                        <form method="POST" action="{{ route('settings.update') }}">
                            @csrf
                            <input type="hidden" name="section" value="booking_api">

                            <div class="mb-3">
                                <label class="form-label">Booking.com Username</label>
                                <input type="text" name="booking_username"
                                    class="form-control"
                                    placeholder="Your partner username"
                                    value="{{ config('services.booking.username') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Booking.com Password</label>
                                <input type="password" name="booking_password"
                                    class="form-control"
                                    placeholder="Your partner password">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hotel ID</label>
                                <input type="text" name="booking_hotel_id"
                                    class="form-control"
                                    placeholder="e.g. 12345678"
                                    value="{{ config('services.booking.hotel_id') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Webhook URL</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        value="{{ url('/api/booking/webhook') }}"
                                        readonly
                                        style="background:#1e2139; color:#9da0b3;">
                                    <button class="btn btn-secondary" type="button"
                                        onclick="copyWebhook()">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </div>
                                <small class="text-muted">
                                    Give this URL to Booking.com in your partner portal
                                </small>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i> Save API Settings
                            </button>

                        </form>

                        <hr>

                        {{-- Test Connection Buttons --}}
                        <h6 class="mb-3 text-muted">Test API Connection</h6>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('booking.pull') }}"
                                class="btn btn-outline-info btn-sm">
                                <i class="fa fa-download me-1"></i>
                                Pull Reservations
                            </a>
                            <form action="{{ route('booking.push.rates') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-warning btn-sm">
                                    <i class="fa fa-upload me-1"></i>
                                    Push Rates
                                </button>
                            </form>
                            <form action="{{ route('booking.push.availability') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-success btn-sm">
                                    <i class="fa fa-refresh me-1"></i>
                                    Push Availability
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- System Info --}}
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fa fa-info-circle me-2"></i> System Info
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-muted">Laravel Version</td>
                                    <td><span class="badge badge-primary">{{ app()->version() }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">PHP Version</td>
                                    <td><span class="badge badge-info">{{ phpversion() }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Environment</td>
                                    <td><span class="badge badge-warning">{{ app()->environment() }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Database</td>
                                    <td><span class="badge badge-success">MySQL</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Session Driver</td>
                                    <td><span class="badge badge-secondary">{{ config('session.driver') }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Logged In As</td>
                                    <td><strong>{{ auth()->user()->name }}</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Server Time</td>
                                    <td>{{ now()->format('d M Y H:i:s') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
function copyWebhook() {
    const url = '{{ url('/api/booking/webhook') }}';
    navigator.clipboard.writeText(url).then(() => {
        alert('Webhook URL copied to clipboard!');
    });
}
</script>
@endsection