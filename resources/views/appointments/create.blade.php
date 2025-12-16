@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Appointment</h4>
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

                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="patient_id" class="form-label">Patient *</label>
                            <select class="form-select @error('patient_id') is-invalid @enderror" 
                                    id="patient_id" name="patient_id" required>
                                <option value="">Select Patient</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->patient_id }}" {{ old('patient_id') == $patient->patient_id ? 'selected' : '' }}>
                                        {{ $patient->first_name }} {{ $patient->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('patient_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="doctor_id" class="form-label">Doctor *</label>
                            <select class="form-select @error('doctor_id') is-invalid @enderror" 
                                    id="doctor_id" name="doctor_id" required>
                                <option value="">Select Doctor</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->doctor_id }}" {{ old('doctor_id') == $doctor->doctor_id ? 'selected' : '' }}>
                                        {{ $doctor->first_name }} {{ $doctor->last_name }} ({{ $doctor->specialty }})
                                    </option>
                                @endforeach
                            </select>
                            @error('doctor_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="created_by_staff_id" class="form-label">Created By Staff *</label>
                            <select class="form-select @error('created_by_staff_id') is-invalid @enderror" 
                                    id="created_by_staff_id" name="created_by_staff_id" required>
                                <option value="">Select Staff Member</option>
                                @foreach($staff as $staffMember)
                                    <option value="{{ $staffMember->staff_id }}" {{ old('created_by_staff_id') == $staffMember->staff_id ? 'selected' : '' }}>
                                        {{ $staffMember->first_name }} {{ $staffMember->last_name }} ({{ $staffMember->position }})
                                    </option>
                                @endforeach
                            </select>
                            @error('created_by_staff_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="appointment_datetime" class="form-label">Appointment DateTime *</label>
                            <input type="datetime-local" class="form-control @error('appointment_datetime') is-invalid @enderror" 
                                   id="appointment_datetime" name="appointment_datetime" value="{{ old('appointment_datetime') }}" required>
                            @error('appointment_datetime')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="">Select Status</option>
                                <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="no-show" {{ old('status') == 'no-show' ? 'selected' : '' }}>No Show</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" 
                                      id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                            @error('notes')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save
                            </button>
                            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
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
