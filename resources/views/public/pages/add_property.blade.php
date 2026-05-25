@extends('public.layouts.app')

@section('title', isset($property) ? 'Edit Property' : 'Add Property')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            {{-- Page Header --}}
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>{{ isset($property) ? 'Edit Property' : 'Add New Property' }}</h4>
                        <p class="mb-0">{{ isset($property) ? 'Update property details' : 'Add a new hotel property' }}</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <a href="{{ route('properties') }}" class="btn btn-secondary btn-rounded">
                        <i class="fa fa-arrow-left me-2"></i> Back to Properties
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                {{ isset($property) ? 'Edit: ' . $property->name : 'Property Details' }}
                            </h4>
                        </div>
                        <div class="card-body">

                            <form method="POST"
                                action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}">
                                @csrf
                                @if (isset($property))
                                    @method('PUT')
                                @endif

                                {{-- SECTION 1: Basic Info --}}
                                <h5 class="mb-3 text-primary">
                                    <i class="fa fa-info-circle me-2"></i> Basic Information
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Property Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="e.g. Grand Colombo Hotel"
                                            value="{{ old('name', $property->name ?? '') }}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Property Type <span class="text-danger">*</span></label>
                                        <select name="type" class="form-control" required>
                                            @foreach (['hotel', 'resort', 'villa', 'guesthouse', 'hostel', 'apartment'] as $type)
                                                <option value="{{ $type }}"
                                                    {{ old('type', $property->type ?? '') === $type ? 'selected' : '' }}>
                                                    {{ ucfirst($type) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Star Rating <span class="text-danger">*</span></label>
                                        <select name="star_rating" class="form-control" required>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}"
                                                    {{ old('star_rating', $property->star_rating ?? 3) == $i ? 'selected' : '' }}>
                                                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                {{-- SECTION 2: Location --}}
                                <h5 class="mb-3 mt-2 text-primary">
                                    <i class="fa fa-map-marker me-2"></i> Location
                                </h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" class="form-control" placeholder="e.g. Colombo"
                                            value="{{ old('city', $property->city ?? '') }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Country <span class="text-danger">*</span></label>
                                        <input type="text" name="country" class="form-control"
                                            placeholder="e.g. Sri Lanka"
                                            value="{{ old('country', $property->country ?? '') }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Currency <span class="text-danger">*</span></label>
                                        <select name="currency" class="form-control" required>
                                            @foreach (['USD', 'EUR', 'GBP', 'LKR', 'AUD', 'SGD', 'AED', 'INR'] as $cur)
                                                <option value="{{ $cur }}"
                                                    {{ old('currency', $property->currency ?? 'USD') === $cur ? 'selected' : '' }}>
                                                    {{ $cur }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Full Address <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" rows="2" placeholder="Street address, area..." required>{{ old('address', $property->address ?? '') }}</textarea>
                                    </div>
                                </div>

                                {{-- SECTION 3: Contact --}}
                                <h5 class="mb-3 mt-2 text-primary">
                                    <i class="fa fa-phone me-2"></i> Contact Details
                                </h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="hotel@example.com"
                                            value="{{ old('email', $property->email ?? '') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="+94 11 234 5678"
                                            value="{{ old('phone', $property->phone ?? '') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Website</label>
                                        <input type="text" name="website" class="form-control"
                                            placeholder="https://www.hotel.com"
                                            value="{{ old('website', $property->website ?? '') }}">
                                    </div>
                                </div>

                                {{-- SECTION 4: Operations --}}
                                <h5 class="mb-3 mt-2 text-primary">
                                    <i class="fa fa-clock-o me-2"></i> Operations
                                </h5>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Check-in Time</label>
                                        <input type="time" name="check_in_time" class="form-control"
                                            value="{{ old('check_in_time', $property->check_in_time ?? '14:00') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Check-out Time</label>
                                        <input type="time" name="check_out_time" class="form-control"
                                            value="{{ old('check_out_time', $property->check_out_time ?? '11:00') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Total Rooms</label>
                                        <input type="number" name="total_rooms" class="form-control" placeholder="50"
                                            value="{{ old('total_rooms', $property->total_rooms ?? '') }}">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="active"
                                                {{ old('status', $property->status ?? 'active') === 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ old('status', $property->status ?? '') === 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- SECTION 5: Description --}}
                                <h5 class="mb-3 mt-2 text-primary">
                                    <i class="fa fa-align-left me-2"></i> Description
                                </h5>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <textarea name="description" class="form-control" rows="4" placeholder="Describe your property...">{{ old('description', $property->description ?? '') }}</textarea>
                                    </div>
                                </div>

                                {{-- SECTION 6: Amenities --}}
                                <h5 class="mb-3 mt-2 text-primary">
                                    <i class="fa fa-list me-2"></i> Amenities
                                </h5>
                                <div class="row mb-4">
                                    @foreach ([
            'wifi' => 'Free WiFi',
            'pool' => 'Swimming Pool',
            'gym' => 'Gym / Fitness',
            'restaurant' => 'Restaurant',
            'bar' => 'Bar / Lounge',
            'spa' => 'Spa',
            'parking' => 'Parking',
            'airport_shuttle' => 'Airport Shuttle',
            'conference' => 'Conference Room',
            'laundry' => 'Laundry Service',
        ] as $value => $label)
                                        <div class="col-md-3 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="amenities[]"
                                                    value="{{ $value }}" id="amenity_{{ $value }}"
                                                    {{ in_array($value, old('amenities', $property->amenities ?? [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="amenity_{{ $value }}">
                                                    {{ $label }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Submit --}}
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa fa-save me-2"></i>
                                        {{ isset($property) ? 'Update Property' : 'Save Property' }}
                                    </button>
                                    <a href="{{ route('properties') }}" class="btn btn-secondary btn-lg">
                                        Cancel
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
