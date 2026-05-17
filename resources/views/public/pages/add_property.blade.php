@extends('public.layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-w700 mb-1">Add New Property</h4>
                        <p class="text-muted fs-13 mb-0">Fill in the details below to register a new hotel property.</p>
                    </div>
                    <a href="properties.html" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-arrow-left me-1"></i> Back to Properties
                    </a>
                </div>
            </div>

            <form id="addPropertyForm">
                <div class="row">

                    <!-- ══ LEFT COLUMN ══ -->
                    <div class="col-xl-8">

                        <!-- ── Card 1: Basic Info ── -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">
                                    <span class="bgl-primary rounded p-2 me-2 d-inline-flex align-items-center">
                                        <i class="fa fa-building text-primary fs-14"></i>
                                    </span>
                                    Basic Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <label class="form-label font-w600">Property Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="e.g. Grand Oceanic Hotel"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label font-w600">Property Type <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control default-select" required>
                                            <option value="">Select type...</option>
                                            <option>Hotel</option>
                                            <option>Resort</option>
                                            <option>Boutique Hotel</option>
                                            <option>Guest House</option>
                                            <option>Villa</option>
                                            <option>Hostel</option>
                                            <option>Apartment</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label font-w600">Star Rating <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control default-select" required>
                                            <option value="">Select stars...</option>
                                            <option>⭐ 1 Star</option>
                                            <option>⭐⭐ 2 Stars</option>
                                            <option>⭐⭐⭐ 3 Stars</option>
                                            <option>⭐⭐⭐⭐ 4 Stars</option>
                                            <option>⭐⭐⭐⭐⭐ 5 Stars</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label font-w600">Total Rooms</label>
                                        <input type="number" class="form-control" placeholder="e.g. 120" min="1">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label font-w600">Year Established</label>
                                        <input type="number" class="form-control" placeholder="e.g. 2015" min="1900"
                                            max="2025">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label font-w600">Property Description</label>
                                        <textarea class="form-control" rows="3"
                                            placeholder="Describe your property — location highlights, unique features, nearby attractions..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ── Card 2: Location ── -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">
                                    <span class="bgl-danger rounded p-2 me-2 d-inline-flex align-items-center">
                                        <i class="fa fa-map-marker text-danger fs-14"></i>
                                    </span>
                                    Location
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label font-w600">Street Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="e.g. 123 Galle Road"
                                            required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label font-w600">City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="e.g. Colombo" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label font-w600">Province / State</label>
                                        <input type="text" class="form-control" placeholder="e.g. Western Province">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label font-w600">Postal Code</label>
                                        <input type="text" class="form-control" placeholder="e.g. 00300">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label font-w600">Country <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control default-select" required>
                                            <option value="">Select country...</option>
                                            <option selected>Sri Lanka</option>
                                            <option>Maldives</option>
                                            <option>India</option>
                                            <option>UAE</option>
                                            <option>United Kingdom</option>
                                            <option>Australia</option>
                                            <option>USA</option>
                                            <option>Germany</option>
                                            <option>Japan</option>
                                            <option>Singapore</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label font-w600">Latitude</label>
                                        <input type="text" class="form-control" placeholder="e.g. 6.9271">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label font-w600">Longitude</label>
                                        <input type="text" class="form-control" placeholder="e.g. 79.8612">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ── Card 3: Contact Info ── -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">
                                    <span class="bgl-success rounded p-2 me-2 d-inline-flex align-items-center">
                                        <i class="fa fa-phone text-success fs-14"></i>
                                    </span>
                                    Contact Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label font-w600">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" placeholder="+94 11 234 5678"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label font-w600">Alternate Phone</label>
                                        <input type="tel" class="form-control" placeholder="+94 77 123 4567">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label font-w600">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="info@hotel.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label font-w600">Website URL</label>
                                        <input type="url" class="form-control" placeholder="https://www.hotel.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label font-w600">Property Manager Name</label>
                                        <input type="text" class="form-control" placeholder="e.g. Priya Fernando">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label font-w600">Manager Email</label>
                                        <input type="email" class="form-control" placeholder="manager@hotel.com">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ── Card 4: Facilities & Amenities ── -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">
                                    <span class="bgl-warning rounded p-2 me-2 d-inline-flex align-items-center">
                                        <i class="fa fa-star text-warning fs-14"></i>
                                    </span>
                                    Facilities &amp; Amenities
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted fs-13 mb-3">Select all facilities available at this property:</p>
                                <div class="row g-2">
                                    <!-- Row 1 -->
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox" checked> <span class="fs-13">📶 Free WiFi</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox" checked> <span class="fs-13">🅿️ Free Parking</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox" checked> <span class="fs-13">🏊 Swimming Pool</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox" checked> <span class="fs-13">🍽️ Restaurant</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">🏋️ Gym / Fitness</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">💆 Spa &amp; Wellness</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox" checked> <span class="fs-13">❄️ Air
                                                Conditioning</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">🛎️ 24h Reception</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">🚕 Airport Transfer</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox" checked> <span class="fs-13">🍳 Breakfast Incl.</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">🐶 Pet Friendly</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">♿ Accessible</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">🤿 Water Sports</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">🎭 Entertainment</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox" checked> <span class="fs-13">💼 Business Centre</span>
                                        </label>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <label
                                            class="d-flex align-items-center gap-2 p-2 border rounded cursor-pointer amenity-item">
                                            <input type="checkbox"> <span class="fs-13">🌊 Beach Access</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- end left column -->

                    <!-- ══ RIGHT COLUMN ══ -->
                    <div class="col-xl-4">

                        <!-- ── Card: Status & Settings ── -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">Status &amp; Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label font-w600">Property Status</label>
                                    <select class="form-control default-select">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                        <option>Pending Review</option>
                                        <option>Under Maintenance</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-w600">Currency</label>
                                    <select class="form-control default-select">
                                        <option>USD — US Dollar</option>
                                        <option>LKR — Sri Lanka Rupee</option>
                                        <option>EUR — Euro</option>
                                        <option>GBP — British Pound</option>
                                        <option>AUD — Australian Dollar</option>
                                        <option>SGD — Singapore Dollar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-w600">Check-in Time</label>
                                    <input type="time" class="form-control" value="14:00">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-w600">Check-out Time</label>
                                    <input type="time" class="form-control" value="12:00">
                                </div>
                                <div class="mb-0">
                                    <label class="form-label font-w600">Timezone</label>
                                    <select class="form-control default-select">
                                        <option>Asia/Colombo (UTC+5:30)</option>
                                        <option>Asia/Dubai (UTC+4)</option>
                                        <option>Asia/Singapore (UTC+8)</option>
                                        <option>Europe/London (UTC+0)</option>
                                        <option>America/New_York (UTC-5)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- ── Card: Channel Connections ── -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">Channel Connections</h5>
                                <p class="text-muted fs-12 mt-1 mb-0">Enable OTAs for this property</p>
                            </div>
                            <div class="card-body">

                                <!-- Booking.com -->
                                <div class="d-flex align-items-center justify-content-between p-3 mb-2 rounded"
                                    style="background:var(--bs-light,#f8f9fa);">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-primary rounded p-2"
                                            style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;">
                                            <span class="text-primary font-w700 fs-12">BK</span>
                                        </div>
                                        <div>
                                            <p class="mb-0 font-w600 fs-14">Booking.com</p>
                                            <small class="text-muted">OTA Partner</small>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>

                                <!-- Expedia -->
                                <div class="d-flex align-items-center justify-content-between p-3 mb-2 rounded"
                                    style="background:var(--bs-light,#f8f9fa);">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-warning rounded p-2"
                                            style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;">
                                            <span class="text-warning font-w700 fs-12">EX</span>
                                        </div>
                                        <div>
                                            <p class="mb-0 font-w600 fs-14">Expedia</p>
                                            <small class="text-muted">OTA Partner</small>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>

                                <!-- Airbnb -->
                                <div class="d-flex align-items-center justify-content-between p-3 mb-2 rounded"
                                    style="background:var(--bs-light,#f8f9fa);">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-danger rounded p-2"
                                            style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;">
                                            <span class="text-danger font-w700 fs-12">AB</span>
                                        </div>
                                        <div>
                                            <p class="mb-0 font-w600 fs-14">Airbnb</p>
                                            <small class="text-muted">OTA Partner</small>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </div>

                                <!-- Direct -->
                                <div class="d-flex align-items-center justify-content-between p-3 rounded"
                                    style="background:var(--bs-light,#f8f9fa);">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-info rounded p-2"
                                            style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;">
                                            <span class="text-info font-w700 fs-12">DR</span>
                                        </div>
                                        <div>
                                            <p class="mb-0 font-w600 fs-14">Direct Booking</p>
                                            <small class="text-muted">Website / Walk-in</small>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>

                                <p class="text-muted fs-12 mt-2 mb-0">
                                    <i class="fa fa-info-circle me-1"></i>
                                    API credentials can be configured after saving from <a
                                        href="channels.html">Channels</a>.
                                </p>
                            </div>
                        </div>

                        <!-- ── Card: Property Photos ── -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">Property Photos</h5>
                            </div>
                            <div class="card-body">
                                <!-- Upload area -->
                                <div class="border-dashed rounded text-center p-4 mb-3"
                                    style="border:2px dashed #dee2e6;cursor:pointer;"
                                    onclick="document.getElementById('photoUpload').click()">
                                    <i class="fa fa-cloud-upload fa-2x text-muted mb-2 d-block"></i>
                                    <p class="mb-1 font-w600 fs-14">Click to upload photos</p>
                                    <p class="text-muted fs-12 mb-0">JPG, PNG, WEBP — max 5MB each</p>
                                    <input type="file" id="photoUpload" multiple accept="image/*"
                                        style="display:none;" onchange="previewPhotos(this)">
                                </div>
                                <!-- Preview grid -->
                                <div class="row g-2" id="photoPreview"></div>
                                <p class="text-muted fs-12 mt-2 mb-0">First photo will be the main cover image.</p>
                            </div>
                        </div>

                        <!-- ── Card: Policies ── -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">Policies</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label font-w600">Cancellation Policy</label>
                                    <select class="form-control default-select">
                                        <option>Free cancellation up to 24 hours</option>
                                        <option>Free cancellation up to 48 hours</option>
                                        <option>Free cancellation up to 72 hours</option>
                                        <option>Non-refundable</option>
                                        <option>Custom policy</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label font-w600">Pet Policy</label>
                                    <select class="form-control default-select">
                                        <option>No pets allowed</option>
                                        <option>Pets allowed (free)</option>
                                        <option>Pets allowed (fee applies)</option>
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label font-w600">Special Notes</label>
                                    <textarea class="form-control" rows="2" placeholder="Any additional policies or notes..."></textarea>
                                </div>
                            </div>
                        </div>

                    </div><!-- end right column -->

                </div><!-- end row -->

                <!-- ══ FORM ACTIONS ══ -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body d-flex flex-wrap gap-2 justify-content-between align-items-center">
                                <p class="text-muted fs-13 mb-0">
                                    <i class="fa fa-info-circle me-1 text-primary"></i>
                                    Fields marked with <span class="text-danger">*</span> are required.
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="properties.html" class="btn btn-outline-secondary">
                                        <i class="fa fa-times me-1"></i> Cancel
                                    </a>
                                    <button type="button" class="btn btn-light" onclick="saveDraft()">
                                        <i class="fa fa-save me-1"></i> Save as Draft
                                    </button>
                                    <button type="submit" class="btn btn-primary" onclick="submitProperty(event)">
                                        <i class="fa fa-check me-1"></i> Save &amp; Publish Property
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form><!-- end form -->

        </div>
    </div>


    <script>
        // ── Photo preview ──
        function previewPhotos(input) {
            var preview = document.getElementById('photoPreview');
            preview.innerHTML = '';
            var files = Array.from(input.files).slice(0, 8);
            files.forEach(function(file, i) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var col = document.createElement('div');
                    col.className = 'col-4';
                    col.innerHTML =
                        '<div style="position:relative;">' +
                        '<img src="' + e.target.result +
                        '" class="img-fluid rounded" style="height:70px;width:100%;object-fit:cover;">' +
                        (i === 0 ?
                            '<span class="badge badge-primary" style="position:absolute;top:4px;left:4px;font-size:9px;">Cover</span>' :
                            '') +
                        '</div>';
                    preview.appendChild(col);
                };
                reader.readAsDataURL(file);
            });
        }

        // ── Save as Draft ──
        function saveDraft() {
            showAlert('success', 'Property saved as draft successfully!');
        }

        // ── Submit ──
        function submitProperty(e) {
            e.preventDefault();
            var name = document.querySelector('input[placeholder="e.g. Grand Oceanic Hotel"]').value.trim();
            if (!name) {
                showAlert('danger', 'Please enter the property name.');
                return;
            }
            showAlert('success', 'Property "' + name + '" saved and published! Redirecting...');
            setTimeout(function() {
                window.location.href = 'properties.html';
            }, 1800);
        }

        // ── Alert helper ──
        function showAlert(type, msg) {
            var existing = document.getElementById('formAlert');
            if (existing) existing.remove();
            var div = document.createElement('div');
            div.id = 'formAlert';
            div.className = 'alert alert-' + type + ' alert-dismissible fade show fixed-bottom mx-4 mb-4';
            div.style.cssText =
                'z-index:9999;max-width:500px;margin-left:auto!important;box-shadow:0 4px 20px rgba(0,0,0,.15)';
            div.innerHTML = '<strong>' + (type === 'success' ? '✓ ' : '✗ ') + '</strong>' + msg +
                '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            document.body.appendChild(div);
            setTimeout(function() {
                if (div.parentNode) div.remove();
            }, 4000);
        }

        // ── Amenity checkbox visual highlight ──
        document.querySelectorAll('.amenity-item input').forEach(function(cb) {
            function update() {
                cb.closest('.amenity-item').style.background = cb.checked ?
                    'rgba(var(--primary-rgb,88,56,196),.08)' : '';
                cb.closest('.amenity-item').style.borderColor = cb.checked ? 'var(--primary)' : '';
            }
            update();
            cb.addEventListener('change', update);
        });
    </script>

    </body>

    </html>
@endsection
