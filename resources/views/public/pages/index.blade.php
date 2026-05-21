@extends('public.layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <!-- ══════════════════════════════════════
                         ROW 1 — STAT CARDS
                         Shows key numbers at a glance
                    ══════════════════════════════════════ -->
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bgl-primary me-3 rounded p-3">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                                        <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"
                                            fill="var(--primary)" />
                                        <rect x="9" y="3" width="6" height="4" rx="1" fill="var(--primary)"
                                            opacity="0.5" />
                                        <line x1="9" y1="12" x2="15" y2="12" stroke="white"
                                            stroke-width="1.5" stroke-linecap="round" />
                                        <line x1="9" y1="16" x2="13" y2="16" stroke="white"
                                            stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-1 fs-13">Total Bookings</p>
                                    <h3 class="mb-0 font-w700">1,284</h3>
                                    <small class="text-success"><i class="fa fa-arrow-up me-1"></i>12% this month</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bgl-success me-3 rounded p-3">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                                        <rect x="2" y="8" width="20" height="13" rx="2" fill="#3AC977" />
                                        <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2" stroke="#3AC977"
                                            stroke-width="1.5" />
                                        <rect x="6" y="12" width="5" height="4" rx="1" fill="white"
                                            opacity="0.7" />
                                        <rect x="13" y="12" width="5" height="4" rx="1" fill="white"
                                            opacity="0.7" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-1 fs-13">Occupancy Rate</p>
                                    <h3 class="mb-0 font-w700">78%</h3>
                                    <small class="text-success"><i class="fa fa-arrow-up me-1"></i>5% vs last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bgl-warning me-3 rounded p-3">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="9" fill="#FFAB2D" opacity="0.2" />
                                        <path
                                            d="M12 6v12M9 8.5C9 7.1 10.3 6 12 6s3 1.1 3 2.5c0 1.3-1 2.2-3 2.5-2 .3-3 1.3-3 2.5C9 14.9 10.3 16 12 16s3-1.1 3-2.5"
                                            stroke="#FFAB2D" stroke-width="1.8" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-1 fs-13">Total Revenue</p>
                                    <h3 class="mb-0 font-w700">$84,320</h3>
                                    <small class="text-success"><i class="fa fa-arrow-up me-1"></i> 8% this month</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bgl-danger me-3 rounded p-3">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="9" stroke="#FF5E5E" stroke-width="1.5"
                                            fill="none" />
                                        <path d="M2 12h20M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18" stroke="#FF5E5E"
                                            stroke-width="1.5" fill="none" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-1 fs-13">Active Channels</p>
                                    <h3 class="mb-0 font-w700">6</h3>
                                    <small>Booking.com, Expedia +4</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ══════════════════════════════════════
                         ROW 2 — RECENT RESERVATIONS + CHANNEL STATUS
                    ══════════════════════════════════════ -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Recent Reservations</h4>
                            <a href="reservations.html" class="btn btn-primary btn-sm rounded-pill">View All</a>
                        </div>
                        <div class="card-body pt-2">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Guest</th>
                                            <th>Room</th>
                                            <th>Check-In</th>
                                            <th>Check-Out</th>
                                            <th>Channel</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>#BK-1041</strong></td>
                                            <td>James Anderson</td>
                                            <td>Deluxe Suite</td>
                                            <td>May 10, 2026</td>
                                            <td>May 14, 2026</td>
                                            <td><span class="badge badge-primary light">Booking.com</span></td>
                                            <td>$480</td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1040</strong></td>
                                            <td>Sarah Mitchell</td>
                                            <td>Standard Room</td>
                                            <td>May 11, 2026</td>
                                            <td>May 13, 2026</td>
                                            <td><span class="badge badge-warning light">Expedia</span></td>
                                            <td>$180</td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1039</strong></td>
                                            <td>Carlos Ruiz</td>
                                            <td>Ocean View</td>
                                            <td>May 12, 2026</td>
                                            <td>May 16, 2026</td>
                                            <td><span class="badge badge-info light">Airbnb</span></td>
                                            <td>$620</td>
                                            <td><span class="badge badge-warning light">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1038</strong></td>
                                            <td>Emily Chen</td>
                                            <td>Family Room</td>
                                            <td>May 13, 2026</td>
                                            <td>May 17, 2026</td>
                                            <td><span class="badge badge-primary light">Booking.com</span></td>
                                            <td>$740</td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1037</strong></td>
                                            <td>Ahmed Al Farsi</td>
                                            <td>Presidential Suite</td>
                                            <td>May 14, 2026</td>
                                            <td>May 18, 2026</td>
                                            <td><span class="badge badge-dark light">Direct</span></td>
                                            <td>$1,200</td>
                                            <td><span class="badge badge-danger light">Cancelled</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1036</strong></td>
                                            <td>Lisa Wong</td>
                                            <td>Deluxe Room</td>
                                            <td>May 15, 2026</td>
                                            <td>May 19, 2026</td>
                                            <td><span class="badge badge-warning light">Expedia</span></td>
                                            <td>$520</td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Channel Status</h4>
                            <a href="channels.html" class="btn btn-outline-primary btn-sm rounded-pill">Manage</a>
                        </div>
                        <div class="card-body pt-2">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-primary rounded p-2"><span
                                                class="fw-bold text-primary fs-12">BK</span></div>
                                        <div>
                                            <p class="mb-0 fw-bold fs-14">Booking.com</p><small>482 bookings</small>
                                        </div>
                                    </div>
                                    <span class="badge badge-success light">Live</span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-warning rounded p-2"><span
                                                class="fw-bold text-warning fs-12">EX</span></div>
                                        <div>
                                            <p class="mb-0 fw-bold fs-14">Expedia</p><small>316 bookings</small>
                                        </div>
                                    </div>
                                    <span class="badge badge-success light">Live</span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-danger rounded p-2"><span
                                                class="fw-bold text-danger fs-12">AB</span></div>
                                        <div>
                                            <p class="mb-0 fw-bold fs-14">Airbnb</p><small>198 bookings</small>
                                        </div>
                                    </div>
                                    <span class="badge badge-success light">Live</span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-info rounded p-2"><span class="fw-bold text-info fs-12">HC</span>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold fs-14">Hotels.com</p><small>142 bookings</small>
                                        </div>
                                    </div>
                                    <span class="badge badge-success light">Live</span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-success rounded p-2"><span
                                                class="fw-bold text-success fs-12">AG</span></div>
                                        <div>
                                            <p class="mb-0 fw-bold fs-14">Agoda</p><small>87 bookings</small>
                                        </div>
                                    </div>
                                    <span class="badge badge-warning light">Syncing</span>
                                </li>
                                <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bgl-secondary rounded p-2"><span class="fw-bold fs-12">TR</span></div>
                                        <div>
                                            <p class="mb-0 fw-bold fs-14">Trip.com</p><small>Not connected</small>
                                        </div>
                                    </div>
                                    <span class="badge badge-danger light">Offline</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Quick Actions</h4>
                        </div>
                        <div class="card-body pt-2">
                            <a href="add-property.html" class="btn btn-primary w-100 mb-2"><i
                                    class="fa fa-plus me-2"></i>Add Property</a>
                            <a href="connect-channel.html" class="btn btn-outline-primary w-100 mb-2"><i
                                    class="fa fa-plug me-2"></i>Connect Channel</a>
                            <a href="rates.html" class="btn btn-outline-secondary w-100 mb-2"><i
                                    class="fa fa-calendar me-2"></i>Update Rates</a>
                            <a href="reports.html" class="btn btn-outline-secondary w-100"><i
                                    class="fa fa-bar-chart me-2"></i>View Reports</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ══════════════════════════════════════
                         ROW 3 — TODAY'S CHECK-INS & CHECK-OUTS
                    ══════════════════════════════════════ -->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title"><i class="fa fa-sign-in text-success me-2"></i>Today's Check-ins <span
                                    class="badge badge-success light ms-2">8</span></h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Guest</th>
                                            <th>Room</th>
                                            <th>Nights</th>
                                            <th>Channel</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>James Anderson</td>
                                            <td>101 — Deluxe</td>
                                            <td>4</td>
                                            <td><span class="badge badge-primary light">BK</span></td>
                                            <td><span class="badge badge-success light">Checked In</span></td>
                                        </tr>
                                        <tr>
                                            <td>Emily Chen</td>
                                            <td>205 — Family</td>
                                            <td>4</td>
                                            <td><span class="badge badge-primary light">BK</span></td>
                                            <td><span class="badge badge-warning light">Expected</span></td>
                                        </tr>
                                        <tr>
                                            <td>Carlos Ruiz</td>
                                            <td>310 — Ocean View</td>
                                            <td>4</td>
                                            <td><span class="badge badge-info light">AB</span></td>
                                            <td><span class="badge badge-warning light">Expected</span></td>
                                        </tr>
                                        <tr>
                                            <td>Priya Sharma</td>
                                            <td>412 — Standard</td>
                                            <td>2</td>
                                            <td><span class="badge badge-warning light">EX</span></td>
                                            <td><span class="badge badge-warning light">Expected</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title"><i class="fa fa-sign-out text-danger me-2"></i>Today's Check-outs <span
                                    class="badge badge-danger light ms-2">5</span></h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Guest</th>
                                            <th>Room</th>
                                            <th>Total</th>
                                            <th>Channel</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Michael Torres</td>
                                            <td>102 — Standard</td>
                                            <td>$240</td>
                                            <td><span class="badge badge-primary light">BK</span></td>
                                            <td><span class="badge badge-success light">Checked Out</span></td>
                                        </tr>
                                        <tr>
                                            <td>Anna Kowalski</td>
                                            <td>208 — Deluxe</td>
                                            <td>$560</td>
                                            <td><span class="badge badge-warning light">EX</span></td>
                                            <td><span class="badge badge-warning light">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>David Kim</td>
                                            <td>315 — Suite</td>
                                            <td>$980</td>
                                            <td><span class="badge badge-info light">AB</span></td>
                                            <td><span class="badge badge-warning light">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>Fatima Hassan</td>
                                            <td>401 — Standard</td>
                                            <td>$180</td>
                                            <td><span class="badge badge-primary light">BK</span></td>
                                            <td><span class="badge badge-warning light">Pending</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
