@extends('public.layouts.app')

@section('title', 'Properties')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            {{-- Page Header --}}
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Properties</h4>
                        <p class="mb-0">Manage your hotel properties</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <a href="{{ route('add_property') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus me-2"></i> Add Property
                    </a>
                </div>
            </div>

            {{-- Flash Messages --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mx-3">
                    <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mx-3">
                    <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Properties Table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Properties</h4>
                            <span class="badge badge-primary">{{ $properties->count() }} Total</span>
                        </div>
                        <div class="card-body">
                            @if ($properties->isEmpty())
                                <div class="text-center py-5">
                                    <i class="fa fa-building fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No properties yet</h5>
                                    <p class="text-muted">Add your first property to get started</p>
                                    <a href="{{ route('add_property') }}" class="btn btn-primary">
                                        <i class="fa fa-plus me-2"></i> Add Property
                                    </a>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Property Name</th>
                                                <th>Type</th>
                                                <th>Location</th>
                                                <th>Stars</th>
                                                <th>Rooms</th>
                                                <th>Channels</th>
                                                <th>Currency</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($properties as $index => $property)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center me-3"
                                                                style="width:40px;height:40px;min-width:40px;">
                                                                <span class="text-white fw-bold">
                                                                    {{ strtoupper(substr($property->name, 0, 1)) }}
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <strong>{{ $property->name }}</strong>
                                                                @if ($property->email)
                                                                    <br><small
                                                                        class="text-muted">{{ $property->email }}</small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-info text-capitalize">
                                                            {{ $property->type }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{ $property->city }}, {{ $property->country }}
                                                    </td>
                                                    <td>
                                                        <span class="text-warning">
                                                            {{ $property->stars() }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light">
                                                            {{ $property->rooms_count ?? 0 }} rooms
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light">
                                                            {{ $property->channels_count ?? 0 }} OTAs
                                                        </span>
                                                    </td>
                                                    <td>{{ $property->currency }}</td>
                                                    <td>
                                                        @if ($property->status === 'active')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            {{-- Edit --}}
                                                            <a href="{{ route('properties.edit', $property->id) }}"
                                                                class="btn btn-primary btn-xs">
                                                                <i class="fa fa-edit"></i>
                                                            </a>

                                                            {{-- Delete --}}
                                                            <form action="{{ route('properties.delete', $property->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Delete {{ $property->name }}? This will also delete all its rooms and reservations.')">
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
