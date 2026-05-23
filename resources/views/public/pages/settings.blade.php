@extends('public.layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">


            <div class="row">

                <!-- LEFT: Settings Tabs -->
                <div class="col-xl-3 col-md-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush rounded" id="settings-tabs">
                                <a href="#tab-general"
                                    class="list-group-item list-group-item-action active d-flex align-items-center gap-2 py-3"
                                    onclick="switchTab(this,'tab-general')"><i class="fa fa-cog text-primary"></i>
                                    General</a>
                                <a href="#tab-api"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-2 py-3"
                                    onclick="switchTab(this,'tab-api')"><i class="fa fa-key text-warning"></i> API Keys</a>
                                <a href="#tab-notif"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-2 py-3"
                                    onclick="switchTab(this,'tab-notif')"><i class="fa fa-bell text-success"></i>
                                    Notifications</a>
                                <a href="#tab-user"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-2 py-3"
                                    onclick="switchTab(this,'tab-user')"><i class="fa fa-user text-info"></i> My Account</a>
                                <a href="#tab-billing"
                                    class="list-group-item list-group-item-action d-flex align-items-center gap-2 py-3"
                                    onclick="switchTab(this,'tab-billing')"><i class="fa fa-credit-card text-danger"></i>
                                    Billing</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Settings Content -->
                <div class="col-xl-9 col-md-8">

                    <!-- GENERAL -->
                    <div id="tab-general">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title"><i class="fa fa-cog text-primary me-2"></i>General Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6"><label class="form-label fw-bold">Company / Hotel Group
                                            Name</label><input type="text" class="form-control"
                                            value="Grand Hotel Group"></div>
                                    <div class="col-md-6"><label class="form-label fw-bold">System Email</label><input
                                            type="email" class="form-control" value="admin@grandhotelgroup.com"></div>
                                    <div class="col-md-6"><label class="form-label fw-bold">Default Currency</label><select
                                            class="form-control default-select">
                                            <option>USD — US Dollar</option>
                                            <option>LKR — Sri Lankan Rupee</option>
                                            <option>EUR — Euro</option>
                                            <option>GBP — British Pound</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label fw-bold">Timezone</label><select
                                            class="form-control default-select">
                                            <option>Asia/Colombo (UTC+5:30)</option>
                                            <option>UTC</option>
                                            <option>America/New_York</option>
                                            <option>Europe/London</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label fw-bold">Date Format</label><select
                                            class="form-control default-select">
                                            <option>DD/MM/YYYY</option>
                                            <option>MM/DD/YYYY</option>
                                            <option>YYYY-MM-DD</option>
                                        </select></div>
                                    <div class="col-md-6"><label class="form-label fw-bold">Language</label><select
                                            class="form-control default-select">
                                            <option>English</option>
                                            <option>Sinhala</option>
                                            <option>Tamil</option>
                                        </select></div>
                                    <div class="col-12"><label class="form-label fw-bold">System Logo</label><input
                                            type="file" class="form-control" accept="image/*"></div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Sync Settings</label>
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <div class="form-check form-switch"><input class="form-check-input"
                                                        type="checkbox" checked><label class="form-check-label">Auto-sync
                                                        rates every 5 mins</label></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch"><input class="form-check-input"
                                                        type="checkbox" checked><label class="form-check-label">Auto-sync
                                                        availability</label></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch"><input class="form-check-input"
                                                        type="checkbox" checked><label class="form-check-label">Auto-import
                                                        reservations</label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><button class="btn btn-primary" onclick="saveSettings()"><i
                                                class="fa fa-save me-2"></i>Save General Settings</button></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- API KEYS -->
                    <div id="tab-api" style="display:none;">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title"><i class="fa fa-key text-warning me-2"></i>API Keys &amp; Credentials
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-warning d-flex gap-2 align-items-start">
                                    <i class="fa fa-exclamation-triangle mt-1"></i>
                                    <div><strong>Keep these keys secret.</strong> Never share API keys publicly. Rotate them
                                        immediately if compromised.</div>
                                </div>
                                <div class="card mb-3" style="background:rgba(255,255,255,.04); ">
                                    <div class="card-body" style="height:auto!important;">
                                        <div class="d-flex justify-content-between align-items-center mb-3" ">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span class="badge badge-primary fs-13 px-3">BK</span>
                                                            <span class="fw-bold">Booking.com</span>
                                                        </div>
                                                        <span class="badge badge-success light">Connected</span>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-md-6">
                                                            <label class="form-label fs-12 text-muted">Hotel ID / API Key</label>
                                                            <div class="input-group input-group-sm">
                                                                <input type="password" class="form-control" value="••••••••••••bk2024" id="key-bk">
                                                                <button class="btn btn-outline-secondary" onclick="toggleKey('key-bk')"><i class="fa fa-eye"></i></button>
                                                                <button class="btn btn-outline-primary" onclick="navigator.clipboard.writeText(document.getElementById('key-bk').value);alert('Copied!')"><i class="fa fa-copy"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-end gap-2">
                                                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-refresh me-1"></i>Rotate Key</button>
                                                            <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash me-1"></i>Revoke</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-3" style="background:rgba(255,255,255,.04);">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span class="badge badge-warning fs-13 px-3">EX</span>
                                                            <span class="fw-bold">Expedia</span>
                                                        </div>
                                                        <span class="badge badge-success light">Connected</span>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-md-6">
                                                            <label class="form-label fs-12 text-muted">Partner ID / API Key</label>
                                                            <div class="input-group input-group-sm">
                                                                <input type="password" class="form-control" value="••••••••••••ex2024" id="key-ex">
                                                                <button class="btn btn-outline-secondary" onclick="toggleKey('key-ex')"><i class="fa fa-eye"></i></button>
                                                                <button class="btn btn-outline-primary" onclick="navigator.clipboard.writeText(document.getElementById('key-ex').value);alert('Copied!')"><i class="fa fa-copy"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-end gap-2">
                                                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-refresh me-1"></i>Rotate Key</button>
                                                            <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash me-1"></i>Revoke</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-3" style="background:rgba(255,255,255,.04);">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span class="badge badge-danger fs-13 px-3">AB</span>
                                                            <span class="fw-bold">Airbnb</span>
                                                        </div>
                                                        <span class="badge badge-success light">Connected</span>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-md-6">
                                                            <label class="form-label fs-12 text-muted">Listing ID / Token</label>
                                                            <div class="input-group input-group-sm">
                                                                <input type="password" class="form-control" value="••••••••••••ab2024" id="key-ab">
                                                                <button class="btn btn-outline-secondary" onclick="toggleKey('key-ab')"><i class="fa fa-eye"></i></button>
                                                                <button class="btn btn-outline-primary" onclick="navigator.clipboard.writeText(document.getElementById('key-ab').value);alert('Copied!')"><i class="fa fa-copy"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-end gap-2">
                                                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-refresh me-1"></i>Rotate Key</button>
                                                            <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash me-1"></i>Revoke</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-3" style="background:rgba(255,255,255,.04);">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span class="badge badge-success fs-13 px-3">AG</span>
                                                            <span class="fw-bold">Agoda</span>
                                                        </div>
                                                        <span class="badge badge-warning light">Pending</span>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-md-6">
                                                            <label class="form-label fs-12 text-muted">Property ID / API Key</label>
                                                            <div class="input-group input-group-sm">
                                                                <input type="password" class="form-control" value="Not configured" id="key-ag">
                                                                <button class="btn btn-outline-secondary" onclick="toggleKey('key-ag')"><i class="fa fa-eye"></i></button>
                                                                <button class="btn btn-outline-primary" onclick="navigator.clipboard.writeText(document.getElementById('key-ag').value);alert('Copied!')"><i class="fa fa-copy"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-end gap-2">
                                                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-refresh me-1"></i>Rotate Key</button>
                                                            <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash me-1"></i>Revoke</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-3" style="background:rgba(255,255,255,.04);">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span class="badge badge-warning fs-13 px-3">TR</span>
                                                            <span class="fw-bold">Trip.com</span>
                                                        </div>
                                                        <span class="badge badge-danger light">Not Connected</span>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-md-6">
                                                            <label class="form-label fs-12 text-muted">Hotel ID / API Key</label>
                                                            <div class="input-group input-group-sm">
                                                                <input type="password" class="form-control" value="Not configured" id="key-tr">
                                                                <button class="btn btn-outline-secondary" onclick="toggleKey('key-tr')"><i class="fa fa-eye"></i></button>
                                                                <button class="btn btn-outline-primary" onclick="navigator.clipboard.writeText(document.getElementById('key-tr').value);alert('Copied!')"><i class="fa fa-copy"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-end gap-2">
                                                            <button class="btn btn-outline-warning btn-sm"><i class="fa fa-refresh me-1"></i>Rotate Key</button>
                                                            <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash me-1"></i>Revoke</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h6 class="fw-bold mb-2">Your System API Key <small class="text-muted">(for Laravel backend)</small></h6>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" value="sk_live_hotel_••••••••••••••••••••••••••••••" id="system-key">
                                                    <button class="btn btn-outline-secondary" onclick="toggleKey('system-key')"><i class="fa fa-eye"></i></button>
                                                    <button class="btn btn-primary" onclick="navigator.clipboard.writeText('sk_live_hotel_xxxx');alert('System key copied!')"><i class="fa fa-copy me-1"></i>Copy</button>
                                                </div>
                                                <small class="text-muted mt-1 d-block">Use this key in your Laravel .env file as HOTEL_API_KEY</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- NOTIFICATIONS -->
                                <div id="tab-notif" style="display:none;">
                                    <div class="card">
                                        <div class="card-header border-0 pb-0">
                                            <h4 class="card-title"><i class="fa fa-bell text-success me-2"></i>Notification Settings</h4>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="fw-bold mb-3 text-muted">EMAIL NOTIFICATIONS</h6>
                                            <div class="row g-3 mb-4">
                                                <div class="col-12"><label class="form-label fw-bold">Notification Email Address</label><input type="email" class="form-control" value="manager@grandhotelgroup.com"></div>
                                                <div class="col-md-6"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked><label class="form-check-label">New reservation received</label></div></div>
                                                <div class="col-md-6"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked><label class="form-check-label">Booking cancellation</label></div></div>
                                                <div class="col-md-6"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked><label class="form-check-label">Check-in reminder (1 day before)</label></div></div>
                                                <div class="col-md-6"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" ><label class="form-check-label">Check-out reminder</label></div></div>
                                                <div class="col-md-6"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked><label class="form-check-label">Low availability alert (< 3 rooms)</label></div></div>
                                                <div class="col-md-6"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked><label class="form-check-label">OTA sync error</label></div></div>
                                                <div class="col-md-6"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked><label class="form-check-label">Revenue daily summary</label></div></div>
                                                <div class="col-md-6"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" ><label class="form-check-label">New OTA channel connected</label></div></div>
                                            </div>
                                            <h6 class="fw-bold mb-3 text-muted">SMS NOTIFICATIONS</h6>
                                            <div class="row g-3 mb-4">
                                                <div class="col-md-6"><label class="form-label fw-bold">SMS Phone Number</label><input type="tel" class="form-control" placeholder="+94 77 123 4567"></div>
                                                <div class="col-md-6 d-flex align-items-end"><div class="form-check form-switch"><input class="form-check-input" type="checkbox"><label class="form-check-label">Enable SMS alerts for new bookings</label></div></div>
                                            </div>
                                            <button class="btn btn-primary" onclick="saveSettings()"><i class="fa fa-save me-2"></i>Save Notification Settings</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- MY ACCOUNT -->
                                <div id="tab-user" style="display:none;">
                                    <div class="card">
                                        <div class="card-header border-0 pb-0">
                                            <h4 class="card-title"><i class="fa fa-user text-info me-2"></i>My Account</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center mb-4">
                                                <div class="bgl-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:80px;height:80px;font-size:28px;font-weight:bold;">A</div>
                                                <h5 class="mb-0">Admin User</h5>
                                                <small class="text-muted">admin@grandhotelgroup.com</small>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-6"><label class="form-label fw-bold">First Name</label><input type="text" class="form-control" value="Admin"></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Last Name</label><input type="text" class="form-control" value="User"></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Email</label><input type="email" class="form-control" value="admin@grandhotelgroup.com"></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Phone</label><input type="tel" class="form-control" value="+94 77 123 4567"></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Role</label><input type="text" class="form-control" value="Super Admin" readonly></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Profile Photo</label><input type="file" class="form-control" accept="image/*"></div>
                                                <div class="col-12"><hr><h6 class="fw-bold mb-3">Change Password</h6></div>
                                                <div class="col-md-4"><label class="form-label fw-bold">Current Password</label><input type="password" class="form-control" placeholder="••••••••"></div>
                                                <div class="col-md-4"><label class="form-label fw-bold">New Password</label><input type="password" class="form-control" placeholder="••••••••"></div>
                                                <div class="col-md-4"><label class="form-label fw-bold">Confirm Password</label><input type="password" class="form-control" placeholder="••••••••"></div>
                                                <div class="col-12"><button class="btn btn-primary me-2" onclick="saveSettings()"><i class="fa fa-save me-2"></i>Save Profile</button><button class="btn btn-outline-warning" onclick="saveSettings()"><i class="fa fa-lock me-2"></i>Update Password</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- BILLING -->
                                <div id="tab-billing" style="display:none;">
                                    <div class="card">
                                        <div class="card-header border-0 pb-0">
                                            <h4 class="card-title"><i class="fa fa-credit-card text-danger me-2"></i>Billing &amp; Plan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="card mb-4 border-0" style="background:var(--primary);">
                                                <div class="card-body d-flex justify-content-between align-items-center" style="height:auto!important;">
                                                    <div>
                                                        <h5 class="text-white mb-1">Pro Plan</h5>
                                                        <p class="text-white mb-0 fs-13">Up to 10 properties · Unlimited OTA channels · Priority support</p>
                                                    </div>
                                                    <div class="text-end">
                                                        <h3 class="text-white mb-0">$49<small class="fs-14">/mo</small></h3>
                                                        <span class="badge badge-success light">Active</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="fw-bold mb-3">Billing History</h6>
                                            <div class="table-responsive">
                                                <table class="table table-hover align-middle mb-0">
                                                    <thead><tr><th>Date</th><th>Description</th><th>Amount</th><th>Status</th><th>Invoice</th></tr></thead>
                                                    <tbody>
                                                        <tr><td>May 1, 2026</td><td>Pro Plan — Monthly</td><td>$49</td><td><span class="badge badge-success light">Paid</span></td><td><a href="#" class="btn btn-xs btn-outline-primary"><i class="fa fa-download"></i></a></td></tr>
                                                        <tr><td>Apr 1, 2026</td><td>Pro Plan — Monthly</td><td>$49</td><td><span class="badge badge-success light">Paid</span></td><td><a href="#" class="btn btn-xs btn-outline-primary"><i class="fa fa-download"></i></a></td></tr>
                                                        <tr><td>Mar 1, 2026</td><td>Pro Plan — Monthly</td><td>$49</td><td><span class="badge badge-success light">Paid</span></td><td><a href="#" class="btn btn-xs btn-outline-primary"><i class="fa fa-download"></i></a></td></tr>
                                                        <tr><td>Feb 1, 2026</td><td>Pro Plan — Monthly</td><td>$49</td><td><span class="badge badge-success light">Paid</span></td><td><a href="#" class="btn btn-xs btn-outline-primary"><i class="fa fa-download"></i></a></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    function switchTab(link, tabId) {
                        event.preventDefault();
                        document.querySelectorAll("#settings-tabs a").forEach(function(a) {
                            a.classList.remove("active");
                        });
                        link.classList.add("active");
                        document.querySelectorAll("[id^=tab-]").forEach(function(t) {
                            t.style.display = "none";
                        });
                        document.getElementById(tabId).style.display = "block";
                    }

                    function toggleKey(id) {
                        var el = document.getElementById(id);
                        el.type = el.type === "password" ? "text" : "password";
                    }

                    function saveSettings() {
                        var btn = event.target;
                        var orig = btn.innerHTML;
                        btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Saving...';
                        btn.disabled = true;
                        setTimeout(function() {
                            btn.innerHTML = '<i class="fa fa-check me-2"></i>Saved!';
                            setTimeout(function() {
                                btn.innerHTML = orig;
                                btn.disabled = false;
                            }, 2000);
                        }, 1500);
                    }
                </script>
            </div>
        </div>
    @endsection
