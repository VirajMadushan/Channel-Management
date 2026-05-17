@extends('public.layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">

            

            <!-- STAT SUMMARY -->
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bgl-primary rounded p-3"><svg width="26" height="26" viewBox="0 0 24 24"
                                    fill="none">
                                    <circle cx="12" cy="12" r="9" fill="#FFAB2D" opacity="0.2" />
                                    <path
                                        d="M12 6v12M9 8.5C9 7.1 10.3 6 12 6s3 1.1 3 2.5c0 1.3-1 2.2-3 2.5-2 .3-3 1.3-3 2.5C9 14.9 10.3 16 12 16s3-1.1 3-2.5"
                                        stroke="var(--primary)" stroke-width="1.8" stroke-linecap="round" />
                                </svg></div>
                            <div>
                                <p class="mb-1 fs-13">Total Revenue</p>
                                <h3 class="mb-0 font-w700">$105,720</h3><small class="text-success"><i
                                        class="fa fa-arrow-up me-1"></i>18% vs last month</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bgl-success rounded p-3"><svg width="26" height="26" viewBox="0 0 24 24"
                                    fill="none">
                                    <circle cx="12" cy="12" r="9" fill="#3AC977" />
                                    <path d="M8 12l3 3 5-5" stroke="white" stroke-width="2" stroke-linecap="round" />
                                </svg></div>
                            <div>
                                <p class="mb-1 fs-13">Net Revenue</p>
                                <h3 class="mb-0 font-w700">$92,175</h3><small class="text-muted">After commissions</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bgl-warning rounded p-3"><svg width="26" height="26" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect x="2" y="8" width="20" height="13" rx="2" fill="#FFAB2D" />
                                    <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2" stroke="#FFAB2D" stroke-width="1.5" />
                                </svg></div>
                            <div>
                                <p class="mb-1 fs-13">Avg. Occupancy</p>
                                <h3 class="mb-0 font-w700">78%</h3><small class="text-success"><i
                                        class="fa fa-arrow-up me-1"></i>5% vs last month</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center gap-3">
                            <div class="bgl-danger rounded p-3"><svg width="26" height="26" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"
                                        fill="#FF5E5E" />
                                    <rect x="9" y="3" width="6" height="4" rx="1" fill="#FF5E5E"
                                        opacity="0.5" />
                                </svg></div>
                            <div>
                                <p class="mb-1 fs-13">Total Bookings</p>
                                <h3 class="mb-0 font-w700">1,284</h3><small class="text-success"><i
                                        class="fa fa-arrow-up me-1"></i>12% vs last month</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHARTS ROW -->
            <div class="row">
                <!-- Monthly Revenue Chart -->
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Monthly Revenue &amp; Bookings</h4>
                            <div class="d-flex gap-2">
                                <button class="btn btn-xs btn-primary" onclick="showChart('revenue')">Revenue</button>
                                <button class="btn btn-xs btn-outline-secondary"
                                    onclick="showChart('bookings')">Bookings</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="revenueChart" height="280"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Channel Pie -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Revenue by Channel</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="channelPie" height="220"></canvas>
                            <ul class="list-group list-group-flush mt-3">
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13"><span><span
                                            style="display:inline-block;width:12px;height:12px;border-radius:50%;background:#7356f1;margin-right:6px;"></span>Booking.com</span><span
                                        class="fw-bold">$38,400 <small class="text-muted">(36%)</small></span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13"><span><span
                                            style="display:inline-block;width:12px;height:12px;border-radius:50%;background:#FFAB2D;margin-right:6px;"></span>Expedia</span><span
                                        class="fw-bold">$24,800 <small class="text-muted">(23%)</small></span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13"><span><span
                                            style="display:inline-block;width:12px;height:12px;border-radius:50%;background:#FF5E5E;margin-right:6px;"></span>Airbnb</span><span
                                        class="fw-bold">$18,200 <small class="text-muted">(17%)</small></span></li>
                                <li class="list-group-item px-0 d-flex justify-content-between fs-13"><span><span
                                            style="display:inline-block;width:12px;height:12px;border-radius:50%;background:#3AC977;margin-right:6px;"></span>Others</span><span
                                        class="fw-bold">$24,320 <small class="text-muted">(23%)</small></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OCCUPANCY + TOP ROOMS -->
            <div class="row">
                <!-- Occupancy by Property -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Occupancy by Property</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-bold fs-13">Grand Oceanic Hotel</span>
                                    <span class="fw-bold text-success">82%</span>
                                </div>
                                <div class="progress" style="height:10px;border-radius:6px;">
                                    <div class="progress-bar bg-success" style="width:82%;border-radius:6px;"></div>
                                </div>
                                <small class="text-muted">120 rooms &middot; Excellent performance</small>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-bold fs-13">Palm Beach Resort</span>
                                    <span class="fw-bold text-success">76%</span>
                                </div>
                                <div class="progress" style="height:10px;border-radius:6px;">
                                    <div class="progress-bar bg-success" style="width:76%;border-radius:6px;"></div>
                                </div>
                                <small class="text-muted">85 rooms &middot; Above target</small>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-bold fs-13">The Kandy Boutique</span>
                                    <span class="fw-bold text-warning">65%</span>
                                </div>
                                <div class="progress" style="height:10px;border-radius:6px;">
                                    <div class="progress-bar bg-warning" style="width:65%;border-radius:6px;"></div>
                                </div>
                                <small class="text-muted">32 rooms &middot; Below 70% target</small>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-bold fs-13">Sunset Villa Mirissa</span>
                                    <span class="fw-bold text-warning">58%</span>
                                </div>
                                <div class="progress" style="height:10px;border-radius:6px;">
                                    <div class="progress-bar bg-warning" style="width:58%;border-radius:6px;"></div>
                                </div>
                                <small class="text-muted">18 rooms &middot; Needs attention</small>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-bold fs-13">City Inn Negombo</span>
                                    <span class="fw-bold text-danger">30%</span>
                                </div>
                                <div class="progress" style="height:10px;border-radius:6px;">
                                    <div class="progress-bar bg-danger" style="width:30%;border-radius:6px;"></div>
                                </div>
                                <small class="text-muted">55 rooms &middot; Inactive — no OTA connection</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Performing Rooms -->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Top Performing Room Types</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead>
                                        <tr>
                                            <th>Room Type</th>
                                            <th>Bookings</th>
                                            <th>Revenue</th>
                                            <th>Occ. Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Ocean Suite</strong><br><small class="text-muted">Grand
                                                    Oceanic</small></td>
                                            <td>120</td>
                                            <td class="text-success fw-bold">$33,600</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:5px;">
                                                        <div class="progress-bar bg-warning" style="width:93%"></div>
                                                    </div><small>93%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Deluxe Room</strong><br><small class="text-muted">Grand
                                                    Oceanic</small></td>
                                            <td>310</td>
                                            <td class="text-success fw-bold">$43,400</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:5px;">
                                                        <div class="progress-bar bg-success" style="width:85%"></div>
                                                    </div><small>85%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Beach Cabana</strong><br><small class="text-muted">Palm
                                                    Beach</small></td>
                                            <td>98</td>
                                            <td class="text-success fw-bold">$21,560</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:5px;">
                                                        <div class="progress-bar bg-warning" style="width:90%"></div>
                                                    </div><small>90%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Standard Room</strong><br><small class="text-muted">Grand
                                                    Oceanic</small></td>
                                            <td>420</td>
                                            <td class="text-success fw-bold">$35,700</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:5px;">
                                                        <div class="progress-bar bg-success" style="width:72%"></div>
                                                    </div><small>72%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Family Room</strong><br><small class="text-muted">Grand
                                                    Oceanic</small></td>
                                            <td>186</td>
                                            <td class="text-success fw-bold">$35,340</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:5px;">
                                                        <div class="progress-bar bg-success" style="width:68%"></div>
                                                    </div><small>68%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Presidential</strong><br><small class="text-muted">Grand
                                                    Oceanic</small></td>
                                            <td>24</td>
                                            <td class="text-success fw-bold">$15,600</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-fill" style="height:5px;">
                                                        <div class="progress-bar bg-danger" style="width:40%"></div>
                                                    </div><small>40%</small>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MONTHLY SUMMARY TABLE -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title">Monthly Summary — 2026</h4>
                            <button class="btn btn-outline-success btn-sm"><i class="fa fa-download me-1"></i>Export
                                CSV</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Bookings</th>
                                            <th>Revenue</th>
                                            <th>Commission</th>
                                            <th>Net Revenue</th>
                                            <th>Occupancy</th>
                                            <th>ADR</th>
                                            <th>RevPAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>January 2026</strong></td>
                                            <td>842</td>
                                            <td>$68,200</td>
                                            <td class="text-danger">-$9,800</td>
                                            <td class="text-success fw-bold">$58,400</td>
                                            <td><span class="badge badge-warning light">62%</span></td>
                                            <td>$81</td>
                                            <td>$50</td>
                                        </tr>
                                        <tr>
                                            <td><strong>February 2026</strong></td>
                                            <td>918</td>
                                            <td>$75,400</td>
                                            <td class="text-danger">-$10,900</td>
                                            <td class="text-success fw-bold">$64,500</td>
                                            <td><span class="badge badge-warning light">68%</span></td>
                                            <td>$82</td>
                                            <td>$56</td>
                                        </tr>
                                        <tr>
                                            <td><strong>March 2026</strong></td>
                                            <td>1,024</td>
                                            <td>$84,800</td>
                                            <td class="text-danger">-$12,200</td>
                                            <td class="text-success fw-bold">$72,600</td>
                                            <td><span class="badge badge-success light">74%</span></td>
                                            <td>$82</td>
                                            <td>$61</td>
                                        </tr>
                                        <tr>
                                            <td><strong>April 2026</strong></td>
                                            <td>1,142</td>
                                            <td>$94,600</td>
                                            <td class="text-danger">-$13,400</td>
                                            <td class="text-success fw-bold">$81,200</td>
                                            <td><span class="badge badge-success light">78%</span></td>
                                            <td>$82</td>
                                            <td>$64</td>
                                        </tr>
                                        <tr>
                                            <td><strong>May 2026</strong></td>
                                            <td>1,284</td>
                                            <td>$105,720</td>
                                            <td class="text-danger">-$13,545</td>
                                            <td class="text-success fw-bold">$92,175</td>
                                            <td><span class="badge badge-success light">82%</span></td>
                                            <td>$82</td>
                                            <td>$67</td>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>
    <script>
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var revenueData = [68200, 75400, 84800, 94600, 105720, 0, 0, 0, 0, 0, 0, 0];
        var bookingsData = [842, 918, 1024, 1142, 1284, 0, 0, 0, 0, 0, 0, 0];
        var ctx = document.getElementById("revenueChart").getContext("2d");
        var revenueChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: months,
                datasets: [{
                        label: "Revenue ($)",
                        data: revenueData,
                        backgroundColor: "rgba(115,86,241,0.7)",
                        borderRadius: 6,
                        yAxisID: "y"
                    },
                    {
                        label: "Bookings",
                        data: bookingsData,
                        type: "line",
                        borderColor: "#FFAB2D",
                        backgroundColor: "rgba(255,171,45,0.1)",
                        tension: 0.4,
                        pointBackgroundColor: "#FFAB2D",
                        yAxisID: "y1"
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: "#aaa"
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            color: "#aaa",
                            callback: function(v) {
                                return "$" + v.toLocaleString();
                            }
                        },
                        grid: {
                            color: "rgba(255,255,255,.05)"
                        }
                    },
                    y1: {
                        position: "right",
                        ticks: {
                            color: "#FFAB2D"
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        var pieCtx = document.getElementById("channelPie").getContext("2d");
        new Chart(pieCtx, {
            type: "doughnut",
            data: {
                labels: ["Booking.com", "Expedia", "Airbnb", "Agoda", "Hotels.com", "Direct"],
                datasets: [{
                    data: [38400, 24800, 18200, 7100, 11400, 5820],
                    backgroundColor: ["#7356f1", "#FFAB2D", "#FF5E5E", "#3AC977", "#36c6d3", "#495057"],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: "70%"
            }
        });

        function showChart(type) {
            if (type === "revenue") {
                revenueChart.data.datasets[0].label = "Revenue ($)";
                revenueChart.data.datasets[0].data = revenueData;
            } else {
                revenueChart.data.datasets[0].label = "Bookings";
                revenueChart.data.datasets[0].data = bookingsData;
            }
            revenueChart.update();
        }
    </script>
@endsection
