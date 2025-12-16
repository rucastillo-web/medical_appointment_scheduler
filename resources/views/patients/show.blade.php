@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Patient Details</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">First Name</h6>
                            <p class="h5">{{ $patient->first_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Last Name</h6>
                            <p class="h5">{{ $patient->last_name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Date of Birth</h6>
                            <p class="h5">{{ \Carbon\Carbon::parse($patient->date_of_birth)->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Gender</h6>
                            <p class="h5">
                                <span class="badge bg-secondary">{{ ucfirst($patient->gender) }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Phone Number</h6>
                            <p class="h5">{{ $patient->phone_number }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Email</h6>
                            <p class="h5">{{ $patient->email }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Address</h6>
                        <p class="h5">{{ $patient->address }}</p>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h6 class="mb-2">Appointments</h6>
                        @if($patient->appointments->count())
                            <ul class="list-group">
                                @foreach($patient->appointments as $appointment)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $appointment->appointment_datetime }}</span>
                                        <span class="badge bg-primary">{{ ucfirst($appointment->status) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No appointments scheduled</p>
                        @endif
                    </div>

                    <h6 class="text-muted">Created At</h6>
                    <p>{{ $patient->created_at->format('M d, Y H:i A') }}</p>

                    <h6 class="text-muted">Updated At</h6>
                    <p>{{ $patient->updated_at->format('M d, Y H:i A') }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('patients.edit', $patient->patient_id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('patients.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
