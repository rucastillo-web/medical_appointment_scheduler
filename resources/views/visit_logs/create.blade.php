@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Visit Log</h4>
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

                    <form action="{{ route('visit-logs.store') }}" method="POST">
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
                            <label for="visit_datetime" class="form-label">Visit DateTime *</label>
                            <input type="datetime-local" class="form-control @error('visit_datetime') is-invalid @enderror" 
                                   id="visit_datetime" name="visit_datetime" value="{{ old('visit_datetime') }}" required>
                            @error('visit_datetime')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="symptoms" class="form-label">Symptoms</label>
                            <textarea class="form-control @error('symptoms') is-invalid @enderror" 
                                      id="symptoms" name="symptoms" rows="3">{{ old('symptoms') }}</textarea>
                            @error('symptoms')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="diagnosis" class="form-label">Diagnosis</label>
                            <textarea class="form-control @error('diagnosis') is-invalid @enderror" 
                                      id="diagnosis" name="diagnosis" rows="3">{{ old('diagnosis') }}</textarea>
                            @error('diagnosis')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="treatment" class="form-label">Treatment</label>
                            <textarea class="form-control @error('treatment') is-invalid @enderror" 
                                      id="treatment" name="treatment" rows="3">{{ old('treatment') }}</textarea>
                            @error('treatment')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save
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
