@extends('public.layouts.app')

@section('title', 'Rooms')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Rooms</h4>
                    <p class="mb-0">Manage your hotel rooms</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <a href="{{ route('add_room') }}" class="btn btn-primary btn-rounded">
                    <i class="fa fa-plus me-2"></i> Add Room
                </a>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mx-3">
                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mx-3">
                <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Rooms Table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Rooms</h4>
                        <span class="badge badge-primary">{{ $rooms->count() }} Total</span>
                    </div>
                    <div class="card-body">
                        @if($rooms->isEmpty())
                            <div class="text-center py-5">
                                <i class="fa fa-bed fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No rooms yet</h5>
                                <p class="text-muted">Add your first room to get started</p>
                                <a href="{{ route('add_room') }}" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i> Add Room
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Room Name</th>
                                            <th>Property</th>
                                            <th>Category</th>
                                            <th>Bed Type</th>
                                            <th>Capacity</th>
                                            <th>Base Rate</th>
                                            <th>Available</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rooms as $index => $room)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div>
                                                    <strong>{{ $room->name }}</strong>
                                                    @if($room->size_sqm)
                                                        <br>
                                                        <small class="text-muted">
                                                            {{ $room->size_sqm }} m²
                                                        </small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-muted">
                                                    {{ $room->property->name ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-info text-capitalize">
                                                    {{ $room->category }}
                                                </span>
                                            </td>
                                            <td class="text-capitalize">
                                                {{ $room->bed_type }}
                                            </td>
                                            <td>
                                                <small>
                                                    👤 {{ $room->max_adults }} adults
                                                    @if($room->max_children > 0)
                                                        <br>👶 {{ $room->max_children }} children
                                                    @endif
                                                </small>
                                            </td>
                                            <td>
                                                <strong class="text-success">
                                                    {{ $room->property->currency ?? 'USD' }}
                                                    {{ number_format($room->base_rate, 2) }}
                                                </strong>
                                                <br>
                                                <small class="text-muted">per night</small>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $room->availableNow() > 0 ? 'success' : 'danger' }}">
                                                    {{ $room->availableNow() }} / {{ $room->total_rooms }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($room->status === 'active')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    {{-- Edit --}}
                                                    <a href="{{ route('rooms.edit', $room->id) }}"
                                                        class="btn btn-primary btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    {{-- Delete --}}
                                                    <form action="{{ route('rooms.delete', $room->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Delete {{ $room->name }}? This cannot be undone.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection