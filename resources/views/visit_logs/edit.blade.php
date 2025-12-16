@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Edit Visit Log</h4>
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

                    <form action="{{ route('visit-logs.update', $visitLog->visit_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="appointment_id" class="form-label">Appointment *</label>
                            <select class="form-select @error('appointment_id') is-invalid @enderror" 
                                    id="appointment_id" name="appointment_id" required>
                                <option value="">Select Appointment</option>
                                @foreach($appointments as $appointment)
                                    <option value="{{ $appointment->appointment_id }}" {{ old('appointment_id', $visitLog->appointment_id) == $appointment->appointment_id ? 'selected' : '' }}>
                                        Apt #{{ $appointment->appointment_id }} - {{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('appointment_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="visit_datetime" class="form-label">Visit DateTime *</label>
                            <input type="datetime-local" class="form-control @error('visit_datetime') is-invalid @enderror" 
                                   id="visit_datetime" name="visit_datetime" value="{{ old('visit_datetime', $visitLog->visit_datetime->format('Y-m-d\TH:i')) }}" required>
                            @error('visit_datetime')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="symptoms" class="form-label">Symptoms</label>
                            <textarea class="form-control @error('symptoms') is-invalid @enderror" 
                                      id="symptoms" name="symptoms" rows="3">{{ old('symptoms', $visitLog->symptoms) }}</textarea>
                            @error('symptoms')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="diagnosis" class="form-label">Diagnosis</label>
                            <textarea class="form-control @error('diagnosis') is-invalid @enderror" 
                                      id="diagnosis" name="diagnosis" rows="3">{{ old('diagnosis', $visitLog->diagnosis) }}</textarea>
                            @error('diagnosis')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="treatment" class="form-label">Treatment</label>
                            <textarea class="form-control @error('treatment') is-invalid @enderror" 
                                      id="treatment" name="treatment" rows="3">{{ old('treatment', $visitLog->treatment) }}</textarea>
                            @error('treatment')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="{{ route('visit-logs.index') }}" class="btn btn-secondary">
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
