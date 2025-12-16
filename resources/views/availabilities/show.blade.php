@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Availability Details</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-muted">Doctor</h6>
                        <p class="h5">
                            <a href="{{ route('doctors.show', $availability->doctor->doctor_id) }}">
                                {{ $availability->doctor->first_name }} {{ $availability->doctor->last_name }}
                            </a>
                        </p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Available Date</h6>
                            <p class="h5">{{ \Carbon\Carbon::parse($availability->available_date)->format('M d, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Time Slot</h6>
                            <p class="h5">{{ $availability->start_time }} - {{ $availability->end_time }}</p>
                        </div>
                    </div>

                    <hr>

                    <h6 class="text-muted">Created At</h6>
                    <p>{{ $availability->created_at->format('M d, Y H:i A') }}</p>

                    <h6 class="text-muted">Updated At</h6>
                    <p>{{ $availability->updated_at->format('M d, Y H:i A') }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('availabilities.edit', $availability->availability_id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('availabilities.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
