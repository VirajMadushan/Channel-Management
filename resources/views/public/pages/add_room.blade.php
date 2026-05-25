@extends('public.layouts.app')

@section('title', isset($room) ? 'Edit Room' : 'Add Room')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>{{ isset($room) ? 'Edit Room' : 'Add New Room' }}</h4>
                    <p class="mb-0">{{ isset($room) ? 'Update room details' : 'Add a new room type' }}</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a href="{{ route('rooms') }}" class="btn btn-secondary btn-rounded">
                    <i class="fa fa-arrow-left me-2"></i> Back to Rooms
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ isset($room) ? 'Edit: ' . $room->name : 'Room Details' }}
                        </h4>
                    </div>
                    <div class="card-body">

                        <form method="POST"
                            action="{{ isset($room)
                                ? route('rooms.update', $room->id)
                                : route('rooms.store') }}">
                            @csrf
                            @if(isset($room))
                                @method('PUT')
                            @endif

                            {{-- SECTION 1: Basic Info --}}
                            <h5 class="mb-3 text-primary">
                                <i class="fa fa-info-circle me-2"></i> Basic Information
                            </h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Property <span class="text-danger">*</span></label>
                                    <select name="property_id" class="form-control" required>
                                        <option value="">-- Select Property --</option>
                                        @foreach($properties as $property)
                                            <option value="{{ $property->id }}"
                                                {{ old('property_id', $room->property_id ?? '') == $property->id ? 'selected' : '' }}>
                                                {{ $property->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Room Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="e.g. Deluxe King Room"
                                        value="{{ old('name', $room->name ?? '') }}" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="category" class="form-control" required>
                                        @foreach(['standard','deluxe','suite','villa','dormitory'] as $cat)
                                            <option value="{{ $cat }}"
                                                {{ old('category', $room->category ?? '') === $cat ? 'selected' : '' }}>
                                                {{ ucfirst($cat) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Bed Type <span class="text-danger">*</span></label>
                                    <select name="bed_type" class="form-control" required>
                                        @foreach(['single','double','queen','king','twin','bunk'] as $bed)
                                            <option value="{{ $bed }}"
                                                {{ old('bed_type', $room->bed_type ?? '') === $bed ? 'selected' : '' }}>
                                                {{ ucfirst($bed) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">View Type</label>
                                    <select name="view_type" class="form-control">
                                        @foreach(['none','city','garden','pool','ocean','mountain'] as $view)
                                            <option value="{{ $view }}"
                                                {{ old('view_type', $room->view_type ?? 'none') === $view ? 'selected' : '' }}>
                                                {{ ucfirst($view) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- SECTION 2: Capacity --}}
                            <h5 class="mb-3 mt-2 text-primary">
                                <i class="fa fa-users me-2"></i> Capacity
                            </h5>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Total Rooms <span class="text-danger">*</span></label>
                                    <input type="number" name="total_rooms" class="form-control"
                                        min="1" placeholder="10"
                                        value="{{ old('total_rooms', $room->total_rooms ?? '') }}" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Max Adults <span class="text-danger">*</span></label>
                                    <input type="number" name="max_adults" class="form-control"
                                        min="1" placeholder="2"
                                        value="{{ old('max_adults', $room->max_adults ?? 2) }}" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Max Children</label>
                                    <input type="number" name="max_children" class="form-control"
                                        min="0" placeholder="1"
                                        value="{{ old('max_children', $room->max_children ?? 0) }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Room Size (m²)</label>
                                    <input type="number" name="size_sqm" class="form-control"
                                        step="0.01" placeholder="35"
                                        value="{{ old('size_sqm', $room->size_sqm ?? '') }}">
                                </div>
                            </div>

                            {{-- SECTION 3: Pricing --}}
                            <h5 class="mb-3 mt-2 text-primary">
                                <i class="fa fa-money me-2"></i> Pricing
                            </h5>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Base Rate (per night) <span class="text-danger">*</span></label>
                                    <input type="number" name="base_rate" class="form-control"
                                        step="0.01" min="0" placeholder="150.00"
                                        value="{{ old('base_rate', $room->base_rate ?? '') }}" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Weekend Rate</label>
                                    <input type="number" name="weekend_rate" class="form-control"
                                        step="0.01" min="0" placeholder="180.00"
                                        value="{{ old('weekend_rate', $room->weekend_rate ?? '') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Tax Rate (%)</label>
                                    <input type="number" name="tax_rate" class="form-control"
                                        step="0.01" min="0" max="100" placeholder="10"
                                        value="{{ old('tax_rate', $room->tax_rate ?? 0) }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Extra Adult Charge</label>
                                    <input type="number" name="extra_adult_charge" class="form-control"
                                        step="0.01" min="0" placeholder="25.00"
                                        value="{{ old('extra_adult_charge', $room->extra_adult_charge ?? 0) }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Extra Child Charge</label>
                                    <input type="number" name="extra_child_charge" class="form-control"
                                        step="0.01" min="0" placeholder="15.00"
                                        value="{{ old('extra_child_charge', $room->extra_child_charge ?? 0) }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Min Stay (nights)</label>
                                    <input type="number" name="min_stay" class="form-control"
                                        min="1" placeholder="1"
                                        value="{{ old('min_stay', $room->min_stay ?? 1) }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Max Stay (nights)</label>
                                    <input type="number" name="max_stay" class="form-control"
                                        min="1" placeholder="30"
                                        value="{{ old('max_stay', $room->max_stay ?? '') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ old('status', $room->status ?? 'active') === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $room->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            {{-- SECTION 4: Extras --}}
                            <h5 class="mb-3 mt-2 text-primary">
                                <i class="fa fa-star me-2"></i> Extras
                            </h5>
                            <div class="row mb-3">
                                <div class="col-md-3 mb-3">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox"
                                            name="breakfast" value="1" id="breakfast"
                                            {{ old('breakfast', $room->breakfast ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="breakfast">
                                            Breakfast Included
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-9 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="3"
                                        placeholder="Describe this room type...">{{ old('description', $room->description ?? '') }}</textarea>
                                </div>
                            </div>

                            {{-- SECTION 5: Amenities --}}
                            <h5 class="mb-3 text-primary">
                                <i class="fa fa-list me-2"></i> Room Amenities
                            </h5>
                            <div class="row mb-4">
                                @foreach([
                                    'wifi'        => 'Free WiFi',
                                    'ac'          => 'Air Conditioning',
                                    'tv'          => 'Flat Screen TV',
                                    'minibar'     => 'Mini Bar',
                                    'safe'        => 'In-room Safe',
                                    'bathtub'     => 'Bathtub',
                                    'shower'      => 'Rain Shower',
                                    'balcony'     => 'Balcony',
                                    'kitchenette' => 'Kitchenette',
                                    'workspace'   => 'Work Desk',
                                    'coffee'      => 'Coffee Maker',
                                    'hairdryer'   => 'Hair Dryer',
                                ] as $value => $label)
                                <div class="col-md-3 col-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            name="amenities[]"
                                            value="{{ $value }}"
                                            id="room_amenity_{{ $value }}"
                                            {{ in_array($value, old('amenities', $room->amenities ?? [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="room_amenity_{{ $value }}">
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
                                    {{ isset($room) ? 'Update Room' : 'Save Room' }}
                                </button>
                                <a href="{{ route('rooms') }}" class="btn btn-secondary btn-lg">
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