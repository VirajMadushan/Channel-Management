@extends('public.layouts.app' )
@section('content')
    <div class="content-body">
        <div class="container-fluid">

          
            <div class="row">

                <!-- LEFT: Main Form -->
                <div class="col-xl-8">

                    <!-- SECTION 1: Basic Info -->
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title"><i class="fa fa-bed text-primary me-2"></i>Room Basic Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Property <span class="text-danger">*</span></label>
                                    <select class="form-control default-select">
                                        <option value="">Select property...</option>
                                        <option>Grand Oceanic Hotel</option>
                                        <option>Palm Beach Resort</option>
                                        <option>The Kandy Boutique</option>
                                        <option>Sunset Villa Mirissa</option>
                                        <option>City Inn Negombo</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Room Type Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="e.g. Deluxe Ocean View">
                                    <small class="text-muted">This name will appear on OTA listings</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Room Category <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control default-select">
                                        <option value="">Select category...</option>
                                        <option>Standard Room</option>
                                        <option>Deluxe Room</option>
                                        <option>Superior Room</option>
                                        <option>Suite</option>
                                        <option>Junior Suite</option>
                                        <option>Family Room</option>
                                        <option>Presidential Suite</option>
                                        <option>Villa</option>
                                        <option>Bungalow</option>
                                        <option>Cabana</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Bed Type <span class="text-danger">*</span></label>
                                    <select class="form-control default-select">
                                        <option value="">Select bed type...</option>
                                        <option>1 King Bed</option>
                                        <option>1 Queen Bed</option>
                                        <option>2 Single Beds</option>
                                        <option>2 Double Beds</option>
                                        <option>Bunk Beds</option>
                                        <option>Sofa Bed</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Total Number of Rooms <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="e.g. 20" min="1">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Max Adults <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="e.g. 2" min="1"
                                        max="10">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Max Children</label>
                                    <input type="number" class="form-control" placeholder="e.g. 1" min="0"
                                        max="6">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Room Size (m²)</label>
                                    <input type="number" class="form-control" placeholder="e.g. 35">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Floor Number</label>
                                    <input type="text" class="form-control" placeholder="e.g. 3rd Floor or Ground Floor">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">View Type</label>
                                    <select class="form-control default-select">
                                        <option>No specific view</option>
                                        <option>Ocean View</option>
                                        <option>Garden View</option>
                                        <option>Pool View</option>
                                        <option>Mountain View</option>
                                        <option>City View</option>
                                        <option>Courtyard View</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Status</label>
                                    <select class="form-control default-select">
                                        <option>Available</option>
                                        <option>Occupied</option>
                                        <option>Under Maintenance</option>
                                        <option>Closed</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Room Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="4"
                                        placeholder="Describe the room — features, view, décor, what makes it special. This appears on Booking.com and Expedia listings..."></textarea>
                                    <small class="text-muted">Minimum 80 characters recommended for OTA listings</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: Pricing -->
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title"><i class="fa fa-dollar text-success me-2"></i>Pricing</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Base Rate / Night <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" placeholder="0.00" min="0"
                                            step="0.01">
                                    </div>
                                    <small class="text-muted">Standard nightly price</small>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Weekend Rate / Night</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" placeholder="0.00" min="0"
                                            step="0.01">
                                    </div>
                                    <small class="text-muted">Fri–Sun pricing (optional)</small>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Extra Adult Charge</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" placeholder="0.00" min="0"
                                            step="0.01">
                                    </div>
                                    <small class="text-muted">Per extra adult per night</small>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Extra Child Charge</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" placeholder="0.00" min="0"
                                            step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Tax Rate (%)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="e.g. 15" min="0"
                                            max="100">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Breakfast Included?</label>
                                    <select class="form-control default-select">
                                        <option>No breakfast</option>
                                        <option>Breakfast included</option>
                                        <option>Breakfast available (+$)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Minimum Stay (nights)</label>
                                    <input type="number" class="form-control" placeholder="e.g. 1" min="1"
                                        value="1">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Maximum Stay (nights)</label>
                                    <input type="number" class="form-control" placeholder="e.g. 30 (0 = no limit)"
                                        min="0" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: Amenities -->
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title"><i class="fa fa-list-ul text-warning me-2"></i>Room Amenities</h4>
                        </div>
                        <div class="card-body">
                            <h6 class="text-muted fw-bold mb-3">IN-ROOM FACILITIES</h6>
                            <div class="row g-2 mb-4">
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Air Conditioning</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Free Wi-Fi</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Flat-screen TV</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Private Bathroom</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label
                                            class="form-check-label fs-13">Bathtub</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Hot Shower</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label
                                            class="form-check-label fs-13">Minibar</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label
                                            class="form-check-label fs-13">Coffee Maker</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Safe Box</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label
                                            class="form-check-label fs-13">Balcony</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label
                                            class="form-check-label fs-13">Jacuzzi</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Hairdryer</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Towels &amp; Linen</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label
                                            class="form-check-label fs-13">Kitchenette</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"><label
                                            class="form-check-label fs-13">Dining Area</label></div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                            checked><label class="form-check-label fs-13">Desk &amp; Chair</label></div>
                                </div>
                            </div>

                            <!-- Photo Upload -->
                            <h6 class="text-muted fw-bold mb-3">ROOM PHOTOS</h6>
                            <div class="border rounded p-4 text-center mb-2"
                                style="border-style:dashed!important;cursor:pointer;"
                                onclick="document.getElementById('room-photos').click()">
                                <i class="fa fa-camera fa-2x text-muted mb-2"></i>
                                <p class="mb-1 fw-bold">Click to upload room photos</p>
                                <small class="text-muted">Up to 10 photos — JPG, PNG. Min 800×600px. First photo is the
                                    main listing image.</small>
                                <input type="file" id="room-photos" accept="image/*" multiple style="display:none;">
                            </div>
                            <small class="text-muted"><i class="fa fa-info-circle text-info me-1"></i>Rooms with 5+ photos
                                receive significantly more bookings on OTA platforms</small>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center py-3">
                            <a href="rooms.html" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Cancel
                            </a>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary px-4">
                                    <i class="fa fa-save me-2"></i>Save as Draft
                                </button>
                                <button class="btn btn-success px-5"
                                    onclick="alert('Room saved successfully!\n\nNext: Set rates & availability for this room.')">
                                    <i class="fa fa-check me-2"></i>Save Room Type
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT: Tips & OTA Info -->
                <div class="col-xl-4">

                    <div class="card border-0" style="background:var(--primary);color:white;">
                        <div class="card-body">
                            <h5 class="text-white mb-3"><i class="fa fa-lightbulb-o me-2"></i>OTA Room Tips</h5>
                            <ul class="list-unstyled mb-0" style="font-size:13px;">
                                <li class="mb-2"><i class="fa fa-check-circle me-2"></i>Use descriptive names — "Deluxe
                                    Ocean View" not just "Room A"</li>
                                <li class="mb-2"><i class="fa fa-check-circle me-2"></i>Accurate capacity prevents guest
                                    complaints</li>
                                <li class="mb-2"><i class="fa fa-check-circle me-2"></i>List all amenities — guests
                                    filter by them</li>
                                <li class="mb-2"><i class="fa fa-check-circle me-2"></i>Weekend rates increase revenue
                                    on Fri–Sun</li>
                                <li class="mb-2"><i class="fa fa-check-circle me-2"></i>Upload at least 5 photos per
                                    room type</li>
                                <li><i class="fa fa-check-circle me-2"></i>Room size (m²) is required by Booking.com</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title"><i class="fa fa-info-circle text-info me-2"></i>Required by OTAs</h5>
                        </div>
                        <div class="card-body pt-2">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13">Room Type Name<span
                                        class="badge badge-success light">Required</span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13">Bed Type<span
                                        class="badge badge-success light">Required</span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13">Max Occupancy<span
                                        class="badge badge-success light">Required</span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13">Base Rate<span
                                        class="badge badge-success light">Required</span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13">Room Size (m²)<span
                                        class="badge badge-warning light">Booking.com</span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13">Description<span
                                        class="badge badge-warning light">Recommended</span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13">Photos<span
                                        class="badge badge-warning light">Recommended</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title"><i class="fa fa-map text-success me-2"></i>Next Steps</h5>
                        </div>
                        <div class="card-body pt-2">
                            <ul class="list-unstyled mb-0 fs-13">
                                <li class="mb-2 d-flex align-items-start gap-2">
                                    <span class="badge badge-primary light mt-1">1</span>
                                    Save this room type
                                </li>
                                <li class="mb-2 d-flex align-items-start gap-2">
                                    <span class="badge badge-primary light mt-1">2</span>
                                    Go to <a href="channels.html">Channels</a> and connect Booking.com
                                </li>
                                <li class="mb-2 d-flex align-items-start gap-2">
                                    <span class="badge badge-primary light mt-1">3</span>
                                    Go to <a href="rates.html">Rates &amp; Availability</a> to set prices per channel
                                </li>
                                <li class="d-flex align-items-start gap-2">
                                    <span class="badge badge-primary light mt-1">4</span>
                                    Start receiving bookings from OTAs
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
