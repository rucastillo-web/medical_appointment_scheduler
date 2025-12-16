@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Doctor Details</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">First Name</h6>
                            <p class="h5">{{ $doctor->first_name }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Last Name</h6>
                            <p class="h5">{{ $doctor->last_name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-muted">Specialty</h6>
                            <p class="h5">{{ $doctor->specialty }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Phone Number</h6>
                            <p class="h5">{{ $doctor->phone_number }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Email</h6>
                        <p class="h5">{{ $doctor->email }}</p>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h6 class="mb-2">Availabilities</h6>
                        @if($doctor->availabilities->count())
                            <ul class="list-group">
                                @foreach($doctor->availabilities as $availability)
                                    <li class="list-group-item">
                                        {{ $availability->available_date }} | {{ $availability->start_time }} - {{ $availability->end_time }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No availabilities scheduled</p>
                        @endif
                    </div>

                    <h6 class="text-muted">Created At</h6>
                    <p>{{ $doctor->created_at->format('M d, Y H:i A') }}</p>

                    <h6 class="text-muted">Updated At</h6>
                    <p>{{ $doctor->updated_at->format('M d, Y H:i A') }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('doctors.edit', $doctor->doctor_id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
