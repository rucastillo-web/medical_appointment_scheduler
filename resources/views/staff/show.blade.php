@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Staff Member Details</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">First Name</h6>
                            <p class="h5">{{ $staff->first_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Last Name</h6>
                            <p class="h5">{{ $staff->last_name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Role</h6>
                            <p class="h5">
                                <span class="badge bg-info">{{ ucfirst($staff->role) }}</span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Username</h6>
                            <p class="h5">{{ $staff->username }}</p>
                        </div>
                    </div>

                    <hr>

                    <h6 class="text-muted">Created At</h6>
                    <p>{{ $staff->created_at->format('M d, Y H:i A') }}</p>

                    <h6 class="text-muted">Updated At</h6>
                    <p>{{ $staff->updated_at->format('M d, Y H:i A') }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('staff.edit', $staff->staff_id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('staff.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
