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
                                    <circle cx="12" cy="12" r="9" stroke="var(--primary)" stroke-width="1.5"
                                        fill="none" />
                                    <path d="M2 12h20M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18" stroke="var(--primary)"
                                        stroke-width="1.5" fill="none" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 fs-13">Total Channels</p>
                                <h3 class="mb-0 font-w700">6</h3>
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
                                <p class="mb-1 fs-13">Live &amp; Active</p>
                                <h3 class="mb-0 font-w700">4</h3>
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
                                <p class="mb-1 fs-13">Syncing</p>
                                <h3 class="mb-0 font-w700">1</h3>
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
                                <p class="mb-1 fs-13">Offline / Error</p>
                                <h3 class="mb-0 font-w700">1</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHANNEL CARDS -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Connected OTA Channels</h4>
                            <a href="connect-channel.html" class="btn btn-primary btn-sm rounded-pill">
                                <i class="fa fa-plus me-1"></i> Connect New Channel
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0 h-100 border"
                                        style="border-color:rgba(255,255,255,.08)!important;">
                                        <div class="card-body">
                                            <!-- Header -->
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="rounded bgl-primary p-3 text-center"
                                                        style="min-width:52px;">
                                                        <span class="fw-bold fs-16 text-primary">BK</span>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-15">Booking.com</p>
                                                        <small class="text-muted">Connectivity API v2</small>
                                                    </div>
                                                </div>
                                                <span class="badge badge-success light">Live</span>
                                            </div>
                                            <!-- Stats -->
                                            <div class="row g-2 mb-3">
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-primary">482</p>
                                                    <small class="text-muted fs-11">Bookings</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-success">$38,400</p>
                                                    <small class="text-muted fs-11">Revenue</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-warning">15%</p>
                                                    <small class="text-muted fs-11">Commission</small>
                                                </div>
                                            </div>
                                            <!-- Last sync -->
                                            <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded"
                                                style="background:rgba(255,255,255,.04);">
                                                <i class="fa fa-refresh text-primary fs-12"></i>
                                                <small class="text-muted">Last sync: 2 mins ago</small>
                                            </div>
                                            <!-- Properties connected -->
                                            <div class="mb-3">
                                                <small class="text-muted d-block mb-1">Connected Properties</small>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <span class="badge badge-primary light me-1">Grand Oceanic</span><span
                                                        class="badge badge-primary light">Palm Beach</span>
                                                </div>
                                            </div>
                                            <!-- Actions -->
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-xs btn-primary flex-fill"
                                                    onclick="syncChannel(this,'Booking.com')"><i
                                                        class="fa fa-refresh me-1"></i>Sync</a>
                                                <a href="#" class="btn btn-xs btn-outline-warning flex-fill"><i
                                                        class="fa fa-cog me-1"></i>Settings</a>
                                                <a href="#" class="btn btn-xs btn-outline-danger"><i
                                                        class="fa fa-unlink"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0 h-100 border"
                                        style="border-color:rgba(255,255,255,.08)!important;">
                                        <div class="card-body">
                                            <!-- Header -->
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="rounded bgl-warning p-3 text-center"
                                                        style="min-width:52px;">
                                                        <span class="fw-bold fs-16 text-warning">EX</span>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-15">Expedia</p>
                                                        <small class="text-muted">EPS Rapid API</small>
                                                    </div>
                                                </div>
                                                <span class="badge badge-success light">Live</span>
                                            </div>
                                            <!-- Stats -->
                                            <div class="row g-2 mb-3">
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-primary">316</p>
                                                    <small class="text-muted fs-11">Bookings</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-success">$24,800</p>
                                                    <small class="text-muted fs-11">Revenue</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-warning">18%</p>
                                                    <small class="text-muted fs-11">Commission</small>
                                                </div>
                                            </div>
                                            <!-- Last sync -->
                                            <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded"
                                                style="background:rgba(255,255,255,.04);">
                                                <i class="fa fa-refresh text-warning fs-12"></i>
                                                <small class="text-muted">Last sync: 5 mins ago</small>
                                            </div>
                                            <!-- Properties connected -->
                                            <div class="mb-3">
                                                <small class="text-muted d-block mb-1">Connected Properties</small>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <span class="badge badge-warning light me-1">Grand Oceanic</span><span
                                                        class="badge badge-warning light">Kandy Boutique</span>
                                                </div>
                                            </div>
                                            <!-- Actions -->
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-xs btn-warning flex-fill"
                                                    onclick="syncChannel(this,'Expedia')"><i
                                                        class="fa fa-refresh me-1"></i>Sync</a>
                                                <a href="#" class="btn btn-xs btn-outline-warning flex-fill"><i
                                                        class="fa fa-cog me-1"></i>Settings</a>
                                                <a href="#" class="btn btn-xs btn-outline-danger"><i
                                                        class="fa fa-unlink"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0 h-100 border"
                                        style="border-color:rgba(255,255,255,.08)!important;">
                                        <div class="card-body">
                                            <!-- Header -->
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="rounded bgl-danger p-3 text-center"
                                                        style="min-width:52px;">
                                                        <span class="fw-bold fs-16 text-danger">AB</span>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-15">Airbnb</p>
                                                        <small class="text-muted">Open API</small>
                                                    </div>
                                                </div>
                                                <span class="badge badge-success light">Live</span>
                                            </div>
                                            <!-- Stats -->
                                            <div class="row g-2 mb-3">
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-primary">198</p>
                                                    <small class="text-muted fs-11">Bookings</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-success">$18,200</p>
                                                    <small class="text-muted fs-11">Revenue</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-warning">3%</p>
                                                    <small class="text-muted fs-11">Commission</small>
                                                </div>
                                            </div>
                                            <!-- Last sync -->
                                            <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded"
                                                style="background:rgba(255,255,255,.04);">
                                                <i class="fa fa-refresh text-danger fs-12"></i>
                                                <small class="text-muted">Last sync: 12 mins ago</small>
                                            </div>
                                            <!-- Properties connected -->
                                            <div class="mb-3">
                                                <small class="text-muted d-block mb-1">Connected Properties</small>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <span class="badge badge-danger light">Sunset Villa</span>
                                                </div>
                                            </div>
                                            <!-- Actions -->
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-xs btn-danger flex-fill"
                                                    onclick="syncChannel(this,'Airbnb')"><i
                                                        class="fa fa-refresh me-1"></i>Sync</a>
                                                <a href="#" class="btn btn-xs btn-outline-warning flex-fill"><i
                                                        class="fa fa-cog me-1"></i>Settings</a>
                                                <a href="#" class="btn btn-xs btn-outline-danger"><i
                                                        class="fa fa-unlink"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0 h-100 border"
                                        style="border-color:rgba(255,255,255,.08)!important;">
                                        <div class="card-body">
                                            <!-- Header -->
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="rounded bgl-info p-3 text-center" style="min-width:52px;">
                                                        <span class="fw-bold fs-16 text-info">HC</span>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-15">Hotels.com</p>
                                                        <small class="text-muted">Partner API</small>
                                                    </div>
                                                </div>
                                                <span class="badge badge-success light">Live</span>
                                            </div>
                                            <!-- Stats -->
                                            <div class="row g-2 mb-3">
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-primary">142</p>
                                                    <small class="text-muted fs-11">Bookings</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-success">$11,400</p>
                                                    <small class="text-muted fs-11">Revenue</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-warning">15%</p>
                                                    <small class="text-muted fs-11">Commission</small>
                                                </div>
                                            </div>
                                            <!-- Last sync -->
                                            <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded"
                                                style="background:rgba(255,255,255,.04);">
                                                <i class="fa fa-refresh text-info fs-12"></i>
                                                <small class="text-muted">Last sync: 8 mins ago</small>
                                            </div>
                                            <!-- Properties connected -->
                                            <div class="mb-3">
                                                <small class="text-muted d-block mb-1">Connected Properties</small>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <span class="badge badge-info light me-1">Grand Oceanic</span><span
                                                        class="badge badge-info light">Palm Beach</span>
                                                </div>
                                            </div>
                                            <!-- Actions -->
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-xs btn-info flex-fill"
                                                    onclick="syncChannel(this,'Hotels.com')"><i
                                                        class="fa fa-refresh me-1"></i>Sync</a>
                                                <a href="#" class="btn btn-xs btn-outline-warning flex-fill"><i
                                                        class="fa fa-cog me-1"></i>Settings</a>
                                                <a href="#" class="btn btn-xs btn-outline-danger"><i
                                                        class="fa fa-unlink"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0 h-100 border"
                                        style="border-color:rgba(255,255,255,.08)!important;">
                                        <div class="card-body">
                                            <!-- Header -->
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="rounded bgl-success p-3 text-center"
                                                        style="min-width:52px;">
                                                        <span class="fw-bold fs-16 text-success">AG</span>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-15">Agoda</p>
                                                        <small class="text-muted">YCS API</small>
                                                    </div>
                                                </div>
                                                <span class="badge badge-warning light">Syncing</span>
                                            </div>
                                            <!-- Stats -->
                                            <div class="row g-2 mb-3">
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-primary">87</p>
                                                    <small class="text-muted fs-11">Bookings</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-success">$7,100</p>
                                                    <small class="text-muted fs-11">Revenue</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-warning">15%</p>
                                                    <small class="text-muted fs-11">Commission</small>
                                                </div>
                                            </div>
                                            <!-- Last sync -->
                                            <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded"
                                                style="background:rgba(255,255,255,.04);">
                                                <i class="fa fa-refresh text-success fs-12"></i>
                                                <small class="text-muted">Last sync: Syncing...</small>
                                            </div>
                                            <!-- Properties connected -->
                                            <div class="mb-3">
                                                <small class="text-muted d-block mb-1">Connected Properties</small>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <span class="badge badge-success light">Grand Oceanic</span>
                                                </div>
                                            </div>
                                            <!-- Actions -->
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-xs btn-success flex-fill"
                                                    onclick="syncChannel(this,'Agoda')"><i
                                                        class="fa fa-refresh me-1"></i>Sync</a>
                                                <a href="#" class="btn btn-xs btn-outline-warning flex-fill"><i
                                                        class="fa fa-cog me-1"></i>Settings</a>
                                                <a href="#" class="btn btn-xs btn-outline-danger"><i
                                                        class="fa fa-unlink"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="card mb-0 h-100 border"
                                        style="border-color:rgba(255,255,255,.08)!important;">
                                        <div class="card-body">
                                            <!-- Header -->
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="rounded bgl-secondary p-3 text-center"
                                                        style="min-width:52px;">
                                                        <span class="fw-bold fs-16 text-secondary">TR</span>
                                                    </div>
                                                    <div>
                                                        <p class="mb-0 fw-bold fs-15">Trip.com</p>
                                                        <small class="text-muted">Not configured</small>
                                                    </div>
                                                </div>
                                                <span class="badge badge-danger light">Offline</span>
                                            </div>
                                            <!-- Stats -->
                                            <div class="row g-2 mb-3">
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-primary">-</p>
                                                    <small class="text-muted fs-11">Bookings</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-success">$0</p>
                                                    <small class="text-muted fs-11">Revenue</small>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <p class="mb-0 fw-bold text-warning">-</p>
                                                    <small class="text-muted fs-11">Commission</small>
                                                </div>
                                            </div>
                                            <!-- Last sync -->
                                            <div class="d-flex align-items-center gap-2 mb-3 p-2 rounded"
                                                style="background:rgba(255,255,255,.04);">
                                                <i class="fa fa-refresh text-secondary fs-12"></i>
                                                <small class="text-muted">Last sync: Never</small>
                                            </div>
                                            <!-- Properties connected -->
                                            <div class="mb-3">
                                                <small class="text-muted d-block mb-1">Connected Properties</small>
                                                <div class="d-flex flex-wrap gap-1">
                                                    <span class="text-muted fs-12">No properties connected</span>
                                                </div>
                                            </div>
                                            <!-- Actions -->
                                            <div class="d-flex gap-2">
                                                <a href="#" class="btn btn-xs btn-secondary flex-fill"
                                                    onclick="syncChannel(this,'Trip.com')"><i
                                                        class="fa fa-refresh me-1"></i>Sync</a>
                                                <a href="#" class="btn btn-xs btn-outline-warning flex-fill"><i
                                                        class="fa fa-cog me-1"></i>Settings</a>
                                                <a href="#" class="btn btn-xs btn-outline-danger"><i
                                                        class="fa fa-unlink"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHANNEL PERFORMANCE TABLE -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Channel Performance — This Month</h4>
                            <button class="btn btn-outline-success btn-sm"><i
                                    class="fa fa-download me-1"></i>Export</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Channel</th>
                                            <th>Bookings</th>
                                            <th>Revenue</th>
                                            <th>Commission</th>
                                            <th>Net Revenue</th>
                                            <th>Avg. Rate</th>
                                            <th>Cancel Rate</th>
                                            <th>Share</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="badge badge-$79.67 light fs-13 px-3">Booking.com</span></td>
                                            <td><strong>482</strong></td>
                                            <td>$38,400</td>
                                            <td class="text-danger">-$5,760</td>
                                            <td class="text-success fw-bold">$32,640</td>
                                            <td>5.2%</td>
                                            <td><span class="text-38">success</span></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:6px;">
                                                        <div class="progress-bar bg-$79.67" style="width:primary%"></div>
                                                    </div>
                                                    <small>primary%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge badge-$78.48 light fs-13 px-3">Expedia</span></td>
                                            <td><strong>316</strong></td>
                                            <td>$24,800</td>
                                            <td class="text-danger">-$4,464</td>
                                            <td class="text-success fw-bold">$20,336</td>
                                            <td>6.8%</td>
                                            <td><span class="text-25">warning</span></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:6px;">
                                                        <div class="progress-bar bg-$78.48" style="width:warning%"></div>
                                                    </div>
                                                    <small>warning%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge badge-$91.92 light fs-13 px-3">Airbnb</span></td>
                                            <td><strong>198</strong></td>
                                            <td>$18,200</td>
                                            <td class="text-danger">-$546</td>
                                            <td class="text-success fw-bold">$17,654</td>
                                            <td>3.1%</td>
                                            <td><span class="text-15">success</span></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:6px;">
                                                        <div class="progress-bar bg-$91.92" style="width:danger%"></div>
                                                    </div>
                                                    <small>danger%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge badge-$80.28 light fs-13 px-3">Hotels.com</span></td>
                                            <td><strong>142</strong></td>
                                            <td>$11,400</td>
                                            <td class="text-danger">-$1,710</td>
                                            <td class="text-success fw-bold">$9,690</td>
                                            <td>7.0%</td>
                                            <td><span class="text-11">warning</span></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:6px;">
                                                        <div class="progress-bar bg-$80.28" style="width:info%"></div>
                                                    </div>
                                                    <small>info%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge badge-$81.61 light fs-13 px-3">Agoda</span></td>
                                            <td><strong>87</strong></td>
                                            <td>$7,100</td>
                                            <td class="text-danger">-$1,065</td>
                                            <td class="text-success fw-bold">$6,035</td>
                                            <td>4.6%</td>
                                            <td><span class="text-7">success</span></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:6px;">
                                                        <div class="progress-bar bg-$81.61" style="width:success%"></div>
                                                    </div>
                                                    <small>success%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge badge-$98.64 light fs-13 px-3">Direct</span></td>
                                            <td><strong>59</strong></td>
                                            <td>$5,820</td>
                                            <td class="text-danger">$0</td>
                                            <td class="text-success fw-bold">$5,820</td>
                                            <td>2.1%</td>
                                            <td><span class="text-5">success</span></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:6px;">
                                                        <div class="progress-bar bg-$98.64" style="width:dark%"></div>
                                                    </div>
                                                    <small>dark%</small>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="fw-bold">
                                        <tr>
                                            <td>TOTAL</td>
                                            <td>1,284</td>
                                            <td>$105,720</td>
                                            <td class="text-danger">-$13,545</td>
                                            <td class="text-success">$92,175</td>
                                            <td>$82.34</td>
                                            <td>5.1%</td>
                                            <td>100%</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function syncChannel(btn, name) {
            var orig = btn.innerHTML;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i>Syncing...';
            btn.disabled = true;
            setTimeout(function() {
                btn.innerHTML = '<i class="fa fa-check me-1"></i>Synced!';
                setTimeout(function() {
                    btn.innerHTML = orig;
                    btn.disabled = false;
                }, 2000);
            }, 2500);
        }
    </script>
@endsection
