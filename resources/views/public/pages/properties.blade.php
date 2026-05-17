
@extends('public.layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            

            <!-- ══════════════════════════
                             ROW 1 — STAT CARDS
                        ══════════════════════════ -->
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="bgl-primary me-3 rounded p-3">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <path d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5z"
                                        fill="var(--primary)" />
                                    <rect x="9" y="13" width="6" height="8" rx="1" fill="white"
                                        opacity="0.6" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Total Properties</p>
                                <h3 class="mb-0 font-w700">12</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="bgl-success me-3 rounded p-3">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="9" fill="#3AC977" />
                                    <path d="M8 12l3 3 5-5" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Active Properties</p>
                                <h3 class="mb-0 font-w700">9</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="bgl-warning me-3 rounded p-3">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="8" width="20" height="13" rx="2" fill="#FFAB2D" />
                                    <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2" stroke="#FFAB2D" stroke-width="1.5" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Total Rooms</p>
                                <h3 class="mb-0 font-w700">348</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="bgl-danger me-3 rounded p-3">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="9" fill="#FF5E5E" opacity="0.2" />
                                    <path
                                        d="M12 6v12M9 8.5C9 7.1 10.3 6 12 6s3 1.1 3 2.5c0 1.3-1 2.2-3 2.5-2 .3-3 1.3-3 2.5C9 14.9 10.3 16 12 16s3-1.1 3-2.5"
                                        stroke="#FF5E5E" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Avg. Occupancy</p>
                                <h3 class="mb-0 font-w700">74%</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ══════════════════════════
                             ROW 2 — PROPERTIES TABLE
                        ══════════════════════════ -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">All Properties</h4>
                            <a href="add-property.html" class="btn btn-primary btn-sm rounded-pill">
                                <i class="fa fa-plus me-1"></i> Add Property
                            </a>
                        </div>
                        <div class="card-body">

                            <!-- Search & Filter Bar -->
                            <div class="row mb-3 g-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control"
                                        placeholder="Search property name or city...">
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control default-select">
                                        <option>All Types</option>
                                        <option>Hotel</option>
                                        <option>Resort</option>
                                        <option>Boutique</option>
                                        <option>Hostel</option>
                                        <option>Villa</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control default-select">
                                        <option>All Status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                        <option>Pending</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control default-select">
                                        <option>All Stars</option>
                                        <option>5 Star</option>
                                        <option>4 Star</option>
                                        <option>3 Star</option>
                                        <option>2 Star</option>
                                    </select>
                                </div>
                                <div class="col-md-2 d-flex gap-2">
                                    <button class="btn btn-primary flex-fill">Filter</button>
                                    <button class="btn btn-outline-secondary flex-fill">Reset</button>
                                </div>
                            </div>

                            <!-- Properties Table -->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered align-middle mb-0">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Property Name</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Stars</th>
                                            <th>Rooms</th>
                                            <th>Channels</th>
                                            <th>Occupancy</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="bgl-primary rounded p-2"><i
                                                            class="fa fa-building text-primary"></i></div>
                                                    <div>
                                                        <p class="mb-0 fw-bold">Grand Oceanic Hotel</p>
                                                        <small class="text-muted">Property ID: #PRO-001</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Hotel</td>
                                            <td><i class="fa fa-map-marker text-danger me-1"></i>Colombo, Sri Lanka</td>
                                            <td><span class="text-warning">★★★★★</span></td>
                                            <td><span class="badge badge-primary light">120 rooms</span></td>
                                            <td>
                                                <span class="badge badge-primary light me-1">BK</span>
                                                <span class="badge badge-warning light me-1">EX</span>
                                                <span class="badge badge-info light">AB</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress" style="height:6px;width:60px;">
                                                        <div class="progress-bar bg-success" style="width:82%"></div>
                                                    </div>
                                                    <small>82%</small>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-success light">Active</span></td>
                                            <td>
                                                <a href="property-detail.html" class="btn btn-xs btn-primary me-1"
                                                    title="View"><i class="fa fa-eye"></i></a>
                                                <a href="edit-property.html" class="btn btn-xs btn-warning me-1"
                                                    title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="rooms.html" class="btn btn-xs btn-info me-1" title="Rooms"><i
                                                        class="fa fa-bed"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="bgl-success rounded p-2"><i
                                                            class="fa fa-building text-success"></i></div>
                                                    <div>
                                                        <p class="mb-0 fw-bold">Palm Beach Resort</p>
                                                        <small class="text-muted">Property ID: #PRO-002</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Resort</td>
                                            <td><i class="fa fa-map-marker text-danger me-1"></i>Galle, Sri Lanka</td>
                                            <td><span class="text-warning">★★★★★</span></td>
                                            <td><span class="badge badge-primary light">85 rooms</span></td>
                                            <td>
                                                <span class="badge badge-primary light me-1">BK</span>
                                                <span class="badge badge-warning light">EX</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress" style="height:6px;width:60px;">
                                                        <div class="progress-bar bg-success" style="width:76%"></div>
                                                    </div>
                                                    <small>76%</small>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-success light">Active</span></td>
                                            <td>
                                                <a href="property-detail.html" class="btn btn-xs btn-primary me-1"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="edit-property.html" class="btn btn-xs btn-warning me-1"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="rooms.html" class="btn btn-xs btn-info me-1"><i
                                                        class="fa fa-bed"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="bgl-warning rounded p-2"><i
                                                            class="fa fa-building text-warning"></i></div>
                                                    <div>
                                                        <p class="mb-0 fw-bold">The Kandy Boutique</p>
                                                        <small class="text-muted">Property ID: #PRO-003</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Boutique</td>
                                            <td><i class="fa fa-map-marker text-danger me-1"></i>Kandy, Sri Lanka</td>
                                            <td><span class="text-warning">★★★★</span><span class="text-muted">★</span>
                                            </td>
                                            <td><span class="badge badge-primary light">32 rooms</span></td>
                                            <td>
                                                <span class="badge badge-primary light me-1">BK</span>
                                                <span class="badge badge-info light">AB</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress" style="height:6px;width:60px;">
                                                        <div class="progress-bar bg-warning" style="width:65%"></div>
                                                    </div>
                                                    <small>65%</small>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-success light">Active</span></td>
                                            <td>
                                                <a href="property-detail.html" class="btn btn-xs btn-primary me-1"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="edit-property.html" class="btn btn-xs btn-warning me-1"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="rooms.html" class="btn btn-xs btn-info me-1"><i
                                                        class="fa fa-bed"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="bgl-info rounded p-2"><i
                                                            class="fa fa-building text-info"></i></div>
                                                    <div>
                                                        <p class="mb-0 fw-bold">Sunset Villa Mirissa</p>
                                                        <small class="text-muted">Property ID: #PRO-004</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Villa</td>
                                            <td><i class="fa fa-map-marker text-danger me-1"></i>Mirissa, Sri Lanka</td>
                                            <td><span class="text-warning">★★★★</span><span class="text-muted">★</span>
                                            </td>
                                            <td><span class="badge badge-primary light">18 rooms</span></td>
                                            <td>
                                                <span class="badge badge-warning light">EX</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress" style="height:6px;width:60px;">
                                                        <div class="progress-bar bg-warning" style="width:58%"></div>
                                                    </div>
                                                    <small>58%</small>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-warning light">Pending</span></td>
                                            <td>
                                                <a href="property-detail.html" class="btn btn-xs btn-primary me-1"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="edit-property.html" class="btn btn-xs btn-warning me-1"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="rooms.html" class="btn btn-xs btn-info me-1"><i
                                                        class="fa fa-bed"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="bgl-danger rounded p-2"><i
                                                            class="fa fa-building text-danger"></i></div>
                                                    <div>
                                                        <p class="mb-0 fw-bold">City Inn Negombo</p>
                                                        <small class="text-muted">Property ID: #PRO-005</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Hotel</td>
                                            <td><i class="fa fa-map-marker text-danger me-1"></i>Negombo, Sri Lanka</td>
                                            <td><span class="text-warning">★★★</span><span class="text-muted">★★</span>
                                            </td>
                                            <td><span class="badge badge-primary light">55 rooms</span></td>
                                            <td>
                                                <span class="text-muted fs-12">None</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress" style="height:6px;width:60px;">
                                                        <div class="progress-bar bg-danger" style="width:30%"></div>
                                                    </div>
                                                    <small>30%</small>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-danger light">Inactive</span></td>
                                            <td>
                                                <a href="property-detail.html" class="btn btn-xs btn-primary me-1"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="edit-property.html" class="btn btn-xs btn-warning me-1"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="rooms.html" class="btn btn-xs btn-info me-1"><i
                                                        class="fa fa-bed"></i></a>
                                                <a href="#" class="btn btn-xs btn-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <p class="mb-0 text-muted">Showing 1–5 of 12 properties</p>
                                <nav>
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
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
