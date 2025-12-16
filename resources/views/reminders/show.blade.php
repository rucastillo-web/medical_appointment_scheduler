@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Reminder Details</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-muted">Appointment</h6>
                        <p class="h5">
                            <a href="{{ route('appointments.show', $reminder->appointment->appointment_id) }}">
                                Appointment #{{ $reminder->appointment->appointment_id }}
                            </a>
                        </p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Reminder DateTime</h6>
                            <p class="h5">{{ $reminder->reminder_datetime->format('M d, Y H:i A') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Type</h6>
                            <p class="h5">
                                <span class="badge bg-secondary">{{ ucfirst($reminder->reminder_type) }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Status</h6>
                        <p class="h5">
                            <span class="badge bg-warning">{{ ucfirst($reminder->status) }}</span>
                        </p>
                    </div>

                    <hr>

                    <h6 class="text-muted">Created At</h6>
                    <p>{{ $reminder->created_at->format('M d, Y H:i A') }}</p>

                    <h6 class="text-muted">Updated At</h6>
                    <p>{{ $reminder->updated_at->format('M d, Y H:i A') }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('reminders.edit', $reminder->reminder_id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('reminders.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
