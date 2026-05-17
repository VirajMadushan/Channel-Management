@extends('public.layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            

            <!-- STAT CARDS -->
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bgl-primary rounded p-3">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"
                                        fill="var(--primary)" />
                                    <rect x="9" y="3" width="6" height="4" rx="1" fill="var(--primary)"
                                        opacity="0.5" />
                                    <line x1="9" y1="12" x2="15" y2="12" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Total Bookings</p>
                                <h3 class="mb-0 font-w700">1,284</h3><small class="text-success"><i
                                        class="fa fa-arrow-up me-1"></i>12% this month</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bgl-success rounded p-3">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="9" fill="#3AC977" />
                                    <path d="M8 12l3 3 5-5" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Confirmed</p>
                                <h3 class="mb-0 font-w700">987</h3><small class="text-success">76.9% of total</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bgl-warning rounded p-3">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="9" fill="#FFAB2D" opacity="0.3" />
                                    <path d="M12 7v5l3 3" stroke="#FFAB2D" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Pending</p>
                                <h3 class="mb-0 font-w700">214</h3><small class="text-warning">Needs attention</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bgl-danger rounded p-3">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="9" fill="#FF5E5E" opacity="0.2" />
                                    <path d="M9 9l6 6M15 9l-6 6" stroke="#FF5E5E" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Cancelled</p>
                                <h3 class="mb-0 font-w700">83</h3><small class="text-danger">6.5% cancel rate</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RESERVATIONS TABLE -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">All Reservations</h4>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-success btn-sm"><i
                                        class="fa fa-download me-1"></i>Export</button>
                                <button class="btn btn-primary btn-sm"><i class="fa fa-plus me-1"></i>New Booking</button>
                            </div>
                        </div>
                        <div class="card-body">

                            <!-- Filters -->
                            <div class="row mb-3 g-2">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" placeholder="Search guest, booking ID...">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control default-select">
                                        <option>All Channels</option>
                                        <option>Booking.com</option>
                                        <option>Expedia</option>
                                        <option>Airbnb</option>
                                        <option>Hotels.com</option>
                                        <option>Agoda</option>
                                        <option>Direct</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control default-select">
                                        <option>All Status</option>
                                        <option>Confirmed</option>
                                        <option>Pending</option>
                                        <option>Checked In</option>
                                        <option>Checked Out</option>
                                        <option>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control default-select">
                                        <option>All Properties</option>
                                        <option>Grand Oceanic Hotel</option>
                                        <option>Palm Beach Resort</option>
                                        <option>The Kandy Boutique</option>
                                    </select>
                                </div>
                                <div class="col-md-3 d-flex gap-2">
                                    <input type="date" class="form-control" title="Check-in from">
                                    <input type="date" class="form-control" title="Check-in to">
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered align-middle mb-0">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Guest Name</th>
                                            <th>Property</th>
                                            <th>Room Type</th>
                                            <th>Check-In</th>
                                            <th>Check-Out</th>
                                            <th>Nights</th>
                                            <th>Channel</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>#BK-1041</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">J</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">James Anderson</p><small
                                                            class="text-muted">james@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Grand Oceanic</small></td>
                                            <td>Deluxe Suite</td>
                                            <td>May 10</td>
                                            <td>May 14</td>
                                            <td><span class="badge badge-info light">4N</span></td>
                                            <td><span class="badge badge-primary light">Booking.com</span></td>
                                            <td><strong>$480</strong></td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1040</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">S</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">Sarah Mitchell</p><small
                                                            class="text-muted">sarah@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Grand Oceanic</small></td>
                                            <td>Standard Room</td>
                                            <td>May 11</td>
                                            <td>May 13</td>
                                            <td><span class="badge badge-info light">2N</span></td>
                                            <td><span class="badge badge-warning light">Expedia</span></td>
                                            <td><strong>$180</strong></td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1039</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">C</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">Carlos Ruiz</p><small
                                                            class="text-muted">carlos@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Palm Beach</small></td>
                                            <td>Beach Cabana</td>
                                            <td>May 12</td>
                                            <td>May 16</td>
                                            <td><span class="badge badge-info light">4N</span></td>
                                            <td><span class="badge badge-info light">Airbnb</span></td>
                                            <td><strong>$620</strong></td>
                                            <td><span class="badge badge-warning light">Pending</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1038</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">E</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">Emily Chen</p><small
                                                            class="text-muted">emily@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Grand Oceanic</small></td>
                                            <td>Family Room</td>
                                            <td>May 13</td>
                                            <td>May 17</td>
                                            <td><span class="badge badge-info light">4N</span></td>
                                            <td><span class="badge badge-primary light">Booking.com</span></td>
                                            <td><strong>$740</strong></td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1037</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">A</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">Ahmed Al Farsi</p><small
                                                            class="text-muted">ahmed@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Grand Oceanic</small></td>
                                            <td>Presidential</td>
                                            <td>May 14</td>
                                            <td>May 18</td>
                                            <td><span class="badge badge-info light">4N</span></td>
                                            <td><span class="badge badge-dark light">Direct</span></td>
                                            <td><strong>$1,200</strong></td>
                                            <td><span class="badge badge-danger light">Cancelled</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1036</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">L</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">Lisa Wong</p><small
                                                            class="text-muted">lisa@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Palm Beach</small></td>
                                            <td>Deluxe Room</td>
                                            <td>May 15</td>
                                            <td>May 19</td>
                                            <td><span class="badge badge-info light">4N</span></td>
                                            <td><span class="badge badge-warning light">Expedia</span></td>
                                            <td><strong>$520</strong></td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1035</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">P</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">Priya Sharma</p><small
                                                            class="text-muted">priya@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Kandy Boutique</small></td>
                                            <td>Heritage Room</td>
                                            <td>May 10</td>
                                            <td>May 12</td>
                                            <td><span class="badge badge-info light">2N</span></td>
                                            <td><span class="badge badge-primary light">Booking.com</span></td>
                                            <td><strong>$190</strong></td>
                                            <td><span class="badge badge-success light">Checked In</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1034</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">D</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">David Kim</p><small
                                                            class="text-muted">david@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Grand Oceanic</small></td>
                                            <td>Ocean Suite</td>
                                            <td>May 08</td>
                                            <td>May 12</td>
                                            <td><span class="badge badge-info light">4N</span></td>
                                            <td><span class="badge badge-info light">Airbnb</span></td>
                                            <td><strong>$980</strong></td>
                                            <td><span class="badge badge-success light">Checked Out</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1033</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">F</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">Fatima Hassan</p><small
                                                            class="text-muted">fatima@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Grand Oceanic</small></td>
                                            <td>Standard Room</td>
                                            <td>May 16</td>
                                            <td>May 18</td>
                                            <td><span class="badge badge-info light">2N</span></td>
                                            <td><span class="badge badge-success light">Agoda</span></td>
                                            <td><strong>$170</strong></td>
                                            <td><span class="badge badge-warning light">Pending</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>#BK-1032</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle bgl-primary d-flex align-items-center justify-content-center fw-bold"
                                                        style="width:32px;height:32px;font-size:12px;">M</div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-14">Michael Torres</p><small
                                                            class="text-muted">michael@email.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><small>Palm Beach</small></td>
                                            <td>Garden View</td>
                                            <td>May 17</td>
                                            <td>May 21</td>
                                            <td><span class="badge badge-info light">4N</span></td>
                                            <td><span class="badge badge-primary light">Booking.com</span></td>
                                            <td><strong>$440</strong></td>
                                            <td><span class="badge badge-success light">Confirmed</span></td>
                                            <td>
                                                <a href="reservation-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-xs btn-success me-1" title="Check In"><i
                                                        class="fa fa-sign-in"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Cancel"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <p class="mb-0 text-muted">Showing 1–10 of 1,284 reservations</p>
                                <nav>
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><span class="page-link">...</span></li>
                                        <li class="page-item"><a class="page-link" href="#">129</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
