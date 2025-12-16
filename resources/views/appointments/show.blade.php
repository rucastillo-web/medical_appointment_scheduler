@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Appointment Details</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Patient</h6>
                            <p class="h5">
                                <a href="{{ route('patients.show', $appointment->patient->patient_id) }}">
                                    {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Doctor</h6>
                            <p class="h5">
                                <a href="{{ route('doctors.show', $appointment->doctor->doctor_id) }}">
                                    {{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Appointment DateTime</h6>
                            <p class="h5">{{ $appointment->appointment_datetime->format('M d, Y H:i A') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Status</h6>
                            <p class="h5">
                                <span class="badge bg-success">{{ ucfirst($appointment->status) }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Notes</h6>
                        <p class="h5">{{ $appointment->notes ?? 'No notes' }}</p>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Created By</h6>
                            <p class="h5">{{ $appointment->createdByStaff->first_name }} {{ $appointment->createdByStaff->last_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Created At</h6>
                            <p class="h5">{{ $appointment->created_at->format('M d, Y H:i A') }}</p>
                        </div>
                    </div>

                    @if($appointment->updatedByStaff)
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-muted">Updated By</h6>
                                <p class="h5">{{ $appointment->updatedByStaff->first_name }} {{ $appointment->updatedByStaff->last_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted">Updated At</h6>
                                <p class="h5">{{ $appointment->updated_at->format('M d, Y H:i A') }}</p>
                            </div>
                        </div>
                    @endif

                    <hr>

                    <div class="mb-3">
                        <h6 class="mb-2">Visit Logs</h6>
                        @if($appointment->visitLogs->count())
                            <ul class="list-group">
                                @foreach($appointment->visitLogs as $log)
                                    <li class="list-group-item">
                                        <strong>{{ $log->visit_datetime }}</strong><br>
                                        Diagnosis: {{ $log->diagnosis ?? 'N/A' }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No visit logs recorded</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <h6 class="mb-2">Reminders</h6>
                        @if($appointment->reminders->count())
                            <ul class="list-group">
                                @foreach($appointment->reminders as $reminder)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $reminder->reminder_datetime }} ({{ ucfirst($reminder->reminder_type) }})</span>
                                        <span class="badge bg-warning">{{ ucfirst($reminder->status) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No reminders set</p>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('appointments.edit', $appointment->appointment_id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
