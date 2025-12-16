@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <!-- Total Doctors Card -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-uppercase">Total Doctors</h6>
                            <h2 class="mb-0">{{ \App\Models\Doctor::count() }}</h2>
                        </div>
                        <div class="fs-1 opacity-50">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('doctors.index') }}" class="card-footer text-white text-decoration-none">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Patients Card -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-uppercase">Total Patients</h6>
                            <h2 class="mb-0">{{ \App\Models\Patient::count() }}</h2>
                        </div>
                        <div class="fs-1 opacity-50">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('patients.index') }}" class="card-footer text-white text-decoration-none">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Total Appointments Card -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-uppercase">Total Appointments</h6>
                            <h2 class="mb-0">{{ \App\Models\Appointment::count() }}</h2>
                        </div>
                        <div class="fs-1 opacity-50">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('appointments.index') }}" class="card-footer text-white text-decoration-none">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Pending Reminders Card -->
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-uppercase">Pending Reminders</h6>
                            <h2 class="mb-0">{{ \App\Models\Reminder::where('status', 'pending')->count() }}</h2>
                        </div>
                        <div class="fs-1 opacity-50">
                            <i class="fas fa-bell"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('reminders.index') }}" class="card-footer text-white text-decoration-none">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Upcoming Appointments -->
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Upcoming Appointments</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>DateTime</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(\App\Models\Appointment::where('status', 'scheduled')->orderBy('appointment_datetime')->limit(5)->get() as $appointment)
                                    <tr>
                                        <td>{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}</td>
                                        <td>{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</td>
                                        <td>{{ $appointment->appointment_datetime->format('M d, Y H:i A') }}</td>
                                        <td>
                                            <span class="badge bg-success">Scheduled</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No upcoming appointments</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointment Status Chart -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Appointment Status Distribution</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-check text-success"></i> Completed</span>
                                <span class="badge bg-success">{{ \App\Models\Appointment::where('status', 'completed')->count() }}</span>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-calendar text-primary"></i> Scheduled</span>
                                <span class="badge bg-primary">{{ \App\Models\Appointment::where('status', 'scheduled')->count() }}</span>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-times text-danger"></i> Cancelled</span>
                                <span class="badge bg-danger">{{ \App\Models\Appointment::where('status', 'cancelled')->count() }}</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between">
                                <span><i class="fas fa-user-slash text-warning"></i> No Show</span>
                                <span class="badge bg-warning">{{ \App\Models\Appointment::where('status', 'no-show')->count() }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
