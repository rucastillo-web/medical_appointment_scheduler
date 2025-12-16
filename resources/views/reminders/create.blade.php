@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Reminder</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('reminders.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="appointment_id" class="form-label">Appointment *</label>
                            <select class="form-select @error('appointment_id') is-invalid @enderror" 
                                    id="appointment_id" name="appointment_id" required>
                                <option value="">Select Appointment</option>
                                @foreach($appointments as $appointment)
                                    <option value="{{ $appointment->appointment_id }}" {{ old('appointment_id') == $appointment->appointment_id ? 'selected' : '' }}>
                                        Apt #{{ $appointment->appointment_id }} - {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('appointment_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="reminder_datetime" class="form-label">Reminder DateTime *</label>
                            <input type="datetime-local" class="form-control @error('reminder_datetime') is-invalid @enderror" 
                                   id="reminder_datetime" name="reminder_datetime" value="{{ old('reminder_datetime') }}" required>
                            @error('reminder_datetime')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="reminder_type" class="form-label">Reminder Type *</label>
                            <select class="form-select @error('reminder_type') is-invalid @enderror" 
                                    id="reminder_type" name="reminder_type" required>
                                <option value="">Select Type</option>
                                <option value="email" {{ old('reminder_type') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="sms" {{ old('reminder_type') == 'sms' ? 'selected' : '' }}>SMS</option>
                                <option value="notification" {{ old('reminder_type') == 'notification' ? 'selected' : '' }}>Notification</option>
                            </select>
                            @error('reminder_type')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="sent" {{ old('status') == 'sent' ? 'selected' : '' }}>Sent</option>
                                <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save
                            </button>
                            <a href="{{ route('reminders.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
