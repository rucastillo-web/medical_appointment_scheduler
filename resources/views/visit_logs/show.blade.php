@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Visit Log Details</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-muted">Appointment</h6>
                        <p class="h5">
                            <a href="{{ route('appointments.show', $visitLog->appointment->appointment_id) }}">
                                Appointment #{{ $visitLog->appointment->appointment_id }}
                            </a>
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Visit DateTime</h6>
                        <p class="h5">{{ $visitLog->visit_datetime->format('M d, Y H:i A') }}</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Symptoms</h6>
                        <p class="h5">{{ $visitLog->symptoms ?? 'Not recorded' }}</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Diagnosis</h6>
                        <p class="h5">{{ $visitLog->diagnosis ?? 'Not recorded' }}</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Treatment</h6>
                        <p class="h5">{{ $visitLog->treatment ?? 'Not recorded' }}</p>
                    </div>

                    <hr>

                    <h6 class="text-muted">Created At</h6>
                    <p>{{ $visitLog->created_at->format('M d, Y H:i A') }}</p>

                    <h6 class="text-muted">Updated At</h6>
                    <p>{{ $visitLog->updated_at->format('M d, Y H:i A') }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('visit-logs.edit', $visitLog->visit_id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('visit-logs.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
