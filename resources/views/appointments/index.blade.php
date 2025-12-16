@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Appointments</h1>
                <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Appointment
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>DateTime</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->appointment_id }}</td>
                                <td>{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</td>
                                <td>{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</td>
                                <td>{{ $appointment->appointment_datetime }}</td>
                                <td>
                                    <span class="badge bg-success">{{ ucfirst($appointment->status) }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('appointments.show', $appointment->appointment_id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('appointments.edit', $appointment->appointment_id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('appointments.destroy', $appointment->appointment_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No appointments found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
