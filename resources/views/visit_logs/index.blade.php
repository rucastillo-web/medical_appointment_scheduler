@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Visit Logs</h1>
                <a href="{{ route('visit-logs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Visit Log
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
                            <th>Appointment</th>
                            <th>Visit DateTime</th>
                            <th>Diagnosis</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($visitLogs as $log)
                            <tr>
                                <td>{{ $log->visit_id }}</td>
                                <td>
                                    <a href="{{ route('appointments.show', $log->appointment->appointment_id) }}">
                                        Apt #{{ $log->appointment->appointment_id }}
                                    </a>
                                </td>
                                <td>{{ $log->visit_datetime }}</td>
                                <td>{{ Str::limit($log->diagnosis, 50) }}</td>
                                <td>
                                    <a href="{{ route('visit-logs.show', $log->visit_id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('visit-logs.edit', $log->visit_id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('visit-logs.destroy', $log->visit_id) }}" method="POST" style="display:inline;">
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
                                <td colspan="5" class="text-center">No visit logs found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
