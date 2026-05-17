 @extends('public.layouts.app')
 @section('content')
     <div class="content-body">
         <div class="container-fluid">

             

             <!-- STAT CARDS -->
             <div class="row">
                 <div class="col-xl-3 col-sm-6">
                     <div class="card">
                         <div class="card-body d-flex align-items-center">
                             <div class="bgl-primary me-3 rounded p-3">
                                 <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                     <rect x="2" y="8" width="20" height="13" rx="2" fill="var(--primary)" />
                                     <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2" stroke="var(--primary)"
                                         stroke-width="1.5" />
                                     <rect x="6" y="12" width="5" height="4" rx="1" fill="white"
                                         opacity="0.7" />
                                     <rect x="13" y="12" width="5" height="4" rx="1" fill="white"
                                         opacity="0.7" />
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
                             <div class="bgl-success me-3 rounded p-3">
                                 <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                     <circle cx="12" cy="12" r="9" fill="#3AC977" />
                                     <path d="M8 12l3 3 5-5" stroke="white" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" />
                                 </svg>
                             </div>
                             <div>
                                 <p class="mb-1 fs-13">Available Now</p>
                                 <h3 class="mb-0 font-w700">76</h3>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-sm-6">
                     <div class="card">
                         <div class="card-body d-flex align-items-center">
                             <div class="bgl-warning me-3 rounded p-3">
                                 <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                     <circle cx="12" cy="12" r="9" fill="#FFAB2D" opacity="0.3" />
                                     <path d="M12 7v5l3 3" stroke="#FFAB2D" stroke-width="2" stroke-linecap="round" />
                                 </svg>
                             </div>
                             <div>
                                 <p class="mb-1 fs-13">Occupied</p>
                                 <h3 class="mb-0 font-w700">252</h3>
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
                                     <path d="M9 9l6 6M15 9l-6 6" stroke="#FF5E5E" stroke-width="2"
                                         stroke-linecap="round" />
                                 </svg>
                             </div>
                             <div>
                                 <p class="mb-1 fs-13">Under Maintenance</p>
                                 <h3 class="mb-0 font-w700">20</h3>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- FILTER + TABLE -->
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header border-0 pb-0">
                             <h4 class="card-title">Room Types</h4>
                             <a href="add-room.html" class="btn btn-primary btn-sm rounded-pill">
                                 <i class="fa fa-plus me-1"></i> Add Room Type
                             </a>
                         </div>
                         <div class="card-body">

                             <!-- Filters -->
                             <div class="row mb-3 g-2">
                                 <div class="col-md-3">
                                     <select class="form-control default-select">
                                         <option>All Properties</option>
                                         <option>Grand Oceanic Hotel</option>
                                         <option>Palm Beach Resort</option>
                                         <option>The Kandy Boutique</option>
                                         <option>Sunset Villa Mirissa</option>
                                         <option>City Inn Negombo</option>
                                     </select>
                                 </div>
                                 <div class="col-md-2">
                                     <select class="form-control default-select">
                                         <option>All Types</option>
                                         <option>Standard</option>
                                         <option>Deluxe</option>
                                         <option>Suite</option>
                                         <option>Family</option>
                                         <option>Presidential</option>
                                     </select>
                                 </div>
                                 <div class="col-md-2">
                                     <select class="form-control default-select">
                                         <option>All Status</option>
                                         <option>Available</option>
                                         <option>Occupied</option>
                                         <option>Maintenance</option>
                                     </select>
                                 </div>
                                 <div class="col-md-3">
                                     <input type="text" class="form-control" placeholder="Search room name...">
                                 </div>
                                 <div class="col-md-2 d-flex gap-2">
                                     <button class="btn btn-primary flex-fill">Filter</button>
                                     <button class="btn btn-outline-secondary flex-fill">Reset</button>
                                 </div>
                             </div>

                             <!-- Room Cards Grid -->
                             <div class="row g-3">

                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-primary rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--primary)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--primary)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Standard Room</p>
                                                         <small class="text-muted">Grand Oceanic Hotel</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-success light">Available</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$85/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">2 adults</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">40 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">28 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">72%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-success" style="width:72%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-success rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--success)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--success)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Deluxe Room</p>
                                                         <small class="text-muted">Grand Oceanic Hotel</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-success light">Available</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$140/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">2 adults</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">30 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">38 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">85%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-success" style="width:85%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-warning rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--warning)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--warning)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Ocean Suite</p>
                                                         <small class="text-muted">Grand Oceanic Hotel</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-warning light">Occupied</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$280/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">2 adults + 1</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">15 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">65 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">93%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-warning" style="width:93%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-info rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--info)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--info)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Family Room</p>
                                                         <small class="text-muted">Grand Oceanic Hotel</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-success light">Available</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$190/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">4 adults</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">20 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">52 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">68%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-success" style="width:68%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-danger rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--danger)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--danger)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Presidential Suite</p>
                                                         <small class="text-muted">Grand Oceanic Hotel</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-success light">Available</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$650/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">4 adults</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">3 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">120 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">40%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-danger" style="width:40%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-primary rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--primary)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--primary)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Beach Cabana</p>
                                                         <small class="text-muted">Palm Beach Resort</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-warning light">Occupied</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$220/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">2 adults</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">12 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">45 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">90%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-warning" style="width:90%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-success rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--success)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--success)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Garden View Room</p>
                                                         <small class="text-muted">Palm Beach Resort</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-success light">Available</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$110/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">2 adults</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">28 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">32 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">60%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-success" style="width:60%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-warning rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--warning)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--warning)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Heritage Room</p>
                                                         <small class="text-muted">The Kandy Boutique</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-danger light">Maintenance</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$95/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">2 adults</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">18 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">30 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">30%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-danger" style="width:30%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-xl-4 col-md-6">
                                     <div class="card mb-0 h-100">
                                         <div class="card-body">
                                             <div class="d-flex justify-content-between align-items-start mb-3">
                                                 <div class="d-flex align-items-center gap-2">
                                                     <div class="bgl-info rounded p-2">
                                                         <svg width="20" height="20" viewBox="0 0 24 24"
                                                             fill="none">
                                                             <rect x="2" y="8" width="20" height="13"
                                                                 rx="2" fill="var(--info)" />
                                                             <path d="M5 8V6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v2"
                                                                 stroke="var(--info)" stroke-width="1.5" />
                                                             <rect x="6" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                             <rect x="13" y="12" width="5" height="4"
                                                                 rx="1" fill="white" opacity="0.7" />
                                                         </svg>
                                                     </div>
                                                     <div>
                                                         <p class="mb-0 fw-bold fs-14">Villa Suite</p>
                                                         <small class="text-muted">Sunset Villa Mirissa</small>
                                                     </div>
                                                 </div>
                                                 <span class="badge badge-success light">Available</span>
                                             </div>
                                             <div class="row g-2 mb-3">
                                                 <div class="col-6">
                                                     <div class="bgl-primary rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Base Rate</p>
                                                         <p class="mb-0 fw-bold text-primary">$350/night</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-success rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Capacity</p>
                                                         <p class="mb-0 fw-bold text-success">2 adults + 2</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-warning rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Total</p>
                                                         <p class="mb-0 fw-bold text-warning">8 rooms</p>
                                                     </div>
                                                 </div>
                                                 <div class="col-6">
                                                     <div class="bgl-info rounded p-2 text-center">
                                                         <p class="mb-0 fs-12 text-muted">Size</p>
                                                         <p class="mb-0 fw-bold text-info">90 m²</p>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="mb-3">
                                                 <div class="d-flex justify-content-between mb-1">
                                                     <small class="text-muted">Occupancy</small>
                                                     <small class="fw-bold">55%</small>
                                                 </div>
                                                 <div class="progress" style="height:6px;">
                                                     <div class="progress-bar bg-success" style="width:55%"></div>
                                                 </div>
                                             </div>
                                             <div class="d-flex gap-2">
                                                 <a href="edit-room.html" class="btn btn-xs btn-warning flex-fill"><i
                                                         class="fa fa-edit me-1"></i>Edit</a>
                                                 <a href="rates.html" class="btn btn-xs btn-primary flex-fill"><i
                                                         class="fa fa-calendar me-1"></i>Rates</a>
                                                 <a href="#" class="btn btn-xs btn-danger"><i
                                                         class="fa fa-trash"></i></a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <!-- Pagination -->
                             <div class="d-flex justify-content-between align-items-center mt-4">
                                 <p class="mb-0 text-muted">Showing 1–9 of 24 room types</p>
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
