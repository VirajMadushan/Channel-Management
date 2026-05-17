@extends('public.layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

           
            <!-- STEP 1: Choose OTA -->
            <div class="row mb-4" id="step-choose">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title"><i class="fa fa-plug text-primary me-2"></i>Step 1 — Choose OTA Channel
                                to Connect</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="card mb-0 h-100 border text-center" style="cursor:pointer;transition:.2s;"
                                        onclick="selectOTA(this,'Booking.com','hotel_id','api_key','15%')"
                                        onmouseover="this.style.borderColor='var(--primary)'"
                                        onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='rgba(255,255,255,.1)'">
                                        <div class="card-body py-4">
                                            <div class="bgl-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width:60px;height:60px;">
                                                <span class="fw-bold fs-18 text-primary">BK</span>
                                            </div>
                                            <h5 class="mb-1">Booking.com</h5>
                                            <small class="text-muted d-block mb-2">World's largest OTA</small>
                                            <span class="badge badge-success light">Most Popular</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="card mb-0 h-100 border text-center" style="cursor:pointer;transition:.2s;"
                                        onclick="selectOTA(this,'Expedia','partner_id','api_key','18%')"
                                        onmouseover="this.style.borderColor='var(--primary)'"
                                        onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='rgba(255,255,255,.1)'">
                                        <div class="card-body py-4">
                                            <div class="bgl-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width:60px;height:60px;">
                                                <span class="fw-bold fs-18 text-warning">EX</span>
                                            </div>
                                            <h5 class="mb-1">Expedia</h5>
                                            <small class="text-muted d-block mb-2">Expedia Group (Hotels.com, Vrbo)</small>
                                            <span class="badge badge-warning light">High Volume</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="card mb-0 h-100 border text-center" style="cursor:pointer;transition:.2s;"
                                        onclick="selectOTA(this,'Airbnb','listing_id','access_token','3%')"
                                        onmouseover="this.style.borderColor='var(--primary)'"
                                        onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='rgba(255,255,255,.1)'">
                                        <div class="card-body py-4">
                                            <div class="bgl-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width:60px;height:60px;">
                                                <span class="fw-bold fs-18 text-danger">AB</span>
                                            </div>
                                            <h5 class="mb-1">Airbnb</h5>
                                            <small class="text-muted d-block mb-2">Short-term rentals & homes</small>
                                            <span class="badge badge-info light">Low Commission</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="card mb-0 h-100 border text-center" style="cursor:pointer;transition:.2s;"
                                        onclick="selectOTA(this,'Agoda','property_id','api_key','15%')"
                                        onmouseover="this.style.borderColor='var(--primary)'"
                                        onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='rgba(255,255,255,.1)'">
                                        <div class="card-body py-4">
                                            <div class="bgl-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width:60px;height:60px;">
                                                <span class="fw-bold fs-18 text-success">AG</span>
                                            </div>
                                            <h5 class="mb-1">Agoda</h5>
                                            <small class="text-muted d-block mb-2">Strong in Asia Pacific</small>
                                            <span class="badge badge-success light">Asia Focus</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="card mb-0 h-100 border text-center" style="cursor:pointer;transition:.2s;"
                                        onclick="selectOTA(this,'Hotels.com','hotel_id','api_key','15%')"
                                        onmouseover="this.style.borderColor='var(--primary)'"
                                        onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='rgba(255,255,255,.1)'">
                                        <div class="card-body py-4">
                                            <div class="bgl-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width:60px;height:60px;">
                                                <span class="fw-bold fs-18 text-info">HC</span>
                                            </div>
                                            <h5 class="mb-1">Hotels.com</h5>
                                            <small class="text-muted d-block mb-2">Part of Expedia Group</small>
                                            <span class="badge badge-primary light">Bundled</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="card mb-0 h-100 border text-center" style="cursor:pointer;transition:.2s;"
                                        onclick="selectOTA(this,'Trip.com','hotel_id','api_key','12%')"
                                        onmouseover="this.style.borderColor='var(--primary)'"
                                        onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='rgba(255,255,255,.1)'">
                                        <div class="card-body py-4">
                                            <div class="bgl-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width:60px;height:60px;">
                                                <span class="fw-bold fs-18 text-warning">TR</span>
                                            </div>
                                            <h5 class="mb-1">Trip.com</h5>
                                            <small class="text-muted d-block mb-2">Leading OTA in China</small>
                                            <span class="badge badge-warning light">China Market</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="card mb-0 h-100 border text-center" style="cursor:pointer;transition:.2s;"
                                        onclick="selectOTA(this,'MakeMyTrip','property_id','api_key','14%')"
                                        onmouseover="this.style.borderColor='var(--primary)'"
                                        onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='rgba(255,255,255,.1)'">
                                        <div class="card-body py-4">
                                            <div class="bgl-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width:60px;height:60px;">
                                                <span class="fw-bold fs-18 text-danger">MM</span>
                                            </div>
                                            <h5 class="mb-1">MakeMyTrip</h5>
                                            <small class="text-muted d-block mb-2">India's largest OTA</small>
                                            <span class="badge badge-danger light">India Focus</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="card mb-0 h-100 border text-center" style="cursor:pointer;transition:.2s;"
                                        onclick="selectOTA(this,'Direct Website','n/a','n/a','0%')"
                                        onmouseover="this.style.borderColor='var(--primary)'"
                                        onmouseout="if(!this.classList.contains('selected'))this.style.borderColor='rgba(255,255,255,.1)'">
                                        <div class="card-body py-4">
                                            <div class="bgl-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                                style="width:60px;height:60px;">
                                                <span class="fw-bold fs-18 text-dark">DW</span>
                                            </div>
                                            <h5 class="mb-1">Direct Website</h5>
                                            <small class="text-muted d-block mb-2">Your own booking engine</small>
                                            <span class="badge badge-dark light">0% Commission</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Enter credentials (hidden until OTA selected) -->
            <div id="step-credentials" style="display:none;">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">
                                    <span id="selected-badge" class="badge badge-primary me-2">BK</span>
                                    Step 2 — Enter API Credentials
                                </h4>
                                <button class="btn btn-outline-secondary btn-sm" onclick="resetOTA()">
                                    <i class="fa fa-arrow-left me-1"></i> Change OTA
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">

                                    <!-- Property selector -->
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Select Property to Connect <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control default-select">
                                            <option value="">Choose a property...</option>
                                            <option>Grand Oceanic Hotel</option>
                                            <option>Palm Beach Resort</option>
                                            <option>The Kandy Boutique</option>
                                            <option>Sunset Villa Mirissa</option>
                                            <option>City Inn Negombo</option>
                                        </select>
                                    </div>

                                    <!-- Dynamic credential field 1 -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold" id="label-field1">Hotel ID / Property ID <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="field1"
                                            placeholder="e.g. 12345678">
                                        <small class="text-muted" id="help-field1">Found in your OTA extranet under
                                            Property Settings</small>
                                    </div>

                                    <!-- Dynamic credential field 2 -->
                                    <div class="col-md-6" id="field2-wrap">
                                        <label class="form-label fw-bold" id="label-field2">API Key / Access Token <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="field2"
                                                placeholder="Paste your API key here">
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="togglePass()"><i class="fa fa-eye" id="eye-icon"></i></button>
                                        </div>
                                        <small class="text-muted" id="help-field2">Generate from your OTA extranet → API
                                            Settings</small>
                                    </div>

                                    <!-- Channel name -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Channel Display Name</label>
                                        <input type="text" class="form-control" id="channel-name"
                                            placeholder="e.g. Booking.com — Grand Oceanic">
                                    </div>

                                    <!-- Commission -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Commission Rate (%)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="commission" placeholder="15"
                                                min="0" max="50">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        <small class="text-muted">Your agreed commission with this OTA</small>
                                    </div>

                                    <!-- Sync settings -->
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Sync Settings</label>
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label fs-13">Sync Availability</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label fs-13">Sync Rates</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" checked>
                                                    <label class="form-check-label fs-13">Receive Reservations</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sync frequency -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Sync Frequency</label>
                                        <select class="form-control default-select">
                                            <option>Every 5 minutes (Recommended)</option>
                                            <option>Every 15 minutes</option>
                                            <option>Every 30 minutes</option>
                                            <option>Every hour</option>
                                            <option>Manual only</option>
                                        </select>
                                    </div>

                                    <!-- Webhook URL (read-only) -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Your Webhook URL <small class="text-muted">(give
                                                this to OTA)</small></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                value="https://yourhotel.com/api/webhook/booking" readonly>
                                            <button class="btn btn-outline-primary"
                                                onclick="navigator.clipboard.writeText('https://yourhotel.com/api/webhook/booking');alert('Copied!')">
                                                <i class="fa fa-copy"></i>
                                            </button>
                                        </div>
                                        <small class="text-muted">OTA will send reservations to this URL</small>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Test & Save -->
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center py-3">
                                <a href="channels.html" class="btn btn-outline-secondary">
                                    <i class="fa fa-times me-2"></i>Cancel
                                </a>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-outline-info px-4" onclick="testConnection()">
                                        <i class="fa fa-plug me-2"></i>Test Connection
                                    </button>
                                    <button class="btn btn-success px-5" onclick="saveConnection()">
                                        <i class="fa fa-check me-2"></i>Connect &amp; Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT: Guide panel -->
                    <div class="col-xl-4">
                        <div class="card border-0" style="background:var(--primary);">
                            <div class="card-body">
                                <h5 class="text-white mb-3"><i class="fa fa-question-circle me-2"></i>How to Get Your API
                                    Key</h5>
                                <div id="api-guide">
                                    <ol class="text-white mb-0" style="font-size:13px;padding-left:18px;">
                                        <li class="mb-2">Log in to your <strong>Booking.com Extranet</strong></li>
                                        <li class="mb-2">Go to <strong>Account → API Access</strong></li>
                                        <li class="mb-2">Click <strong>"Generate New API Key"</strong></li>
                                        <li class="mb-2">Copy your <strong>Hotel ID</strong> from the Property page</li>
                                        <li class="mb-2">Paste both values into the form on the left</li>
                                        <li>Click <strong>"Test Connection"</strong> to verify</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title"><i class="fa fa-shield text-success me-2"></i>Security Note</h5>
                            </div>
                            <div class="card-body pt-2">
                                <ul class="list-unstyled fs-13 mb-0">
                                    <li class="mb-2"><i class="fa fa-lock text-success me-2"></i>API keys are encrypted
                                        in the database</li>
                                    <li class="mb-2"><i class="fa fa-lock text-success me-2"></i>Keys are never shown in
                                        plain text after saving</li>
                                    <li class="mb-2"><i class="fa fa-lock text-success me-2"></i>All API calls use HTTPS
                                    </li>
                                    <li><i class="fa fa-lock text-success me-2"></i>Revoke access anytime from Channels
                                        page</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title"><i class="fa fa-info-circle text-info me-2"></i>After Connection
                                </h5>
                            </div>
                            <div class="card-body pt-2">
                                <ul class="list-unstyled fs-13 mb-0">
                                    <li class="mb-2 d-flex gap-2"><span
                                            class="badge badge-primary light mt-1">1</span>Availability syncs automatically
                                    </li>
                                    <li class="mb-2 d-flex gap-2"><span class="badge badge-primary light mt-1">2</span>Set
                                        rates in <a href="rates.html">Rates &amp; Availability</a></li>
                                    <li class="mb-2 d-flex gap-2"><span
                                            class="badge badge-primary light mt-1">3</span>Reservations appear in <a
                                            href="reservations.html">Reservations</a></li>
                                    <li class="d-flex gap-2"><span class="badge badge-primary light mt-1">4</span>Monitor
                                        in real-time from Dashboard</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        var otaGuides = {
            "Booking.com": ["Log in to <strong>Booking.com Extranet</strong>", "Go to Account → API Access",
                "Click Generate New API Key", "Copy your Hotel ID from Property page",
                "Paste both values and Test Connection"
            ],
            "Expedia": ["Log in to <strong>Expedia Partner Central</strong>", "Go to My Account → API Credentials",
                "Request API access if not enabled", "Copy your Partner ID and API Key",
                "Paste both values and Test Connection"
            ],
            "Airbnb": ["Log in to <strong>Airbnb Host Dashboard</strong>", "Go to Settings → API Access",
                "Generate a new Access Token", "Find your Listing ID in Manage Listings",
                "Paste both values and Test Connection"
            ],
            "Agoda": ["Log in to <strong>Agoda YCS</strong>", "Go to Settings → API Integration",
                "Request API credentials from support", "Copy Property ID and API Key",
                "Paste both values and Test Connection"
            ],
            "Hotels.com": ["Log in to <strong>Hotels.com Partner Hub</strong>", "Navigate to Integration → API Keys",
                "Generate or copy existing API key", "Copy your Hotel ID", "Paste both values and Test Connection"
            ],
            "Trip.com": ["Log in to <strong>Trip.com Extranet</strong>", "Go to API Management section",
                "Generate API credentials", "Copy Hotel ID and Key", "Paste both values and Test Connection"
            ],
            "MakeMyTrip": ["Log in to <strong>MakeMyTrip Extranet</strong>", "Contact MMT partner support for API",
                "Receive credentials via email", "Copy Property ID and API Key",
                "Paste both values and Test Connection"
            ],
            "Direct Website": ["No API key needed for direct bookings", "Enter your website URL as Hotel ID",
                "Leave API key blank", "Set up payment gateway separately", "Save to track direct bookings"
            ]
        };
        var otaColors = {
            "Booking.com": "primary",
            "Expedia": "warning",
            "Airbnb": "danger",
            "Agoda": "success",
            "Hotels.com": "info",
            "Trip.com": "warning",
            "MakeMyTrip": "danger",
            "Direct Website": "dark"
        };

        function selectOTA(card, name, field1, field2, comm) {
            document.querySelectorAll('.card.selected').forEach(function(c) {
                c.classList.remove('selected');
                c.style.borderColor = 'rgba(255,255,255,.1)';
            });
            card.classList.add('selected');
            card.style.borderColor = 'var(--primary)';
            document.getElementById('step-credentials').style.display = 'block';
            document.getElementById('selected-badge').textContent = name.substring(0, 2).toUpperCase();
            document.getElementById('selected-badge').className = 'badge badge-' + (otaColors[name] || 'primary') + ' me-2';
            document.getElementById('channel-name').value = name + ' — My Hotel';
            document.getElementById('commission').value = comm.replace('%', '');
            // Update guide
            var guide = otaGuides[name] || [];
            var html = '<ol class="text-white mb-0" style="font-size:13px;padding-left:18px;">';
            guide.forEach(function(step) {
                html += '<li class="mb-2">' + step + '</li>';
            });
            html += '</ol>';
            document.getElementById('api-guide').innerHTML = html;
            card.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
            document.getElementById('step-credentials').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function resetOTA() {
            document.querySelectorAll('.card.selected').forEach(function(c) {
                c.classList.remove('selected');
                c.style.borderColor = 'rgba(255,255,255,.1)';
            });
            document.getElementById('step-credentials').style.display = 'none';
        }

        function togglePass() {
            var f = document.getElementById('field2');
            var i = document.getElementById('eye-icon');
            if (f.type === 'password') {
                f.type = 'text';
                i.className = 'fa fa-eye-slash';
            } else {
                f.type = 'password';
                i.className = 'fa fa-eye';
            }
        }

        function testConnection() {
            var btn = event.target;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Testing...';
            btn.disabled = true;
            setTimeout(function() {
                btn.innerHTML = '<i class="fa fa-check text-success me-2"></i>Connection Successful!';
                btn.className = 'btn btn-success px-4';
                setTimeout(function() {
                    btn.innerHTML = '<i class="fa fa-plug me-2"></i>Test Connection';
                    btn.className = 'btn btn-outline-info px-4';
                    btn.disabled = false;
                }, 3000);
            }, 2000);
        }

        function saveConnection() {
            var btn = event.target;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Connecting...';
            btn.disabled = true;
            setTimeout(function() {
                alert(
                    'Channel connected successfully!\n\nNext steps:\n1. Go to Rates & Availability to set prices\n2. Check Reservations for incoming bookings');
                window.location.href = 'channels.html';
            }, 2000);
        }
    </script>
@endsection
