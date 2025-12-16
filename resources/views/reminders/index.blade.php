@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Reminders</h1>
                <a href="{{ route('reminders.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Reminder
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
                            <th>Reminder DateTime</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reminders as $reminder)
                            <tr>
                                <td>{{ $reminder->reminder_id }}</td>
                                <td>
                                    <a href="{{ route('appointments.show', $reminder->appointment->appointment_id) }}">
                                        Apt #{{ $reminder->appointment->appointment_id }}
                                    </a>
                                </td>
                                <td>{{ $reminder->reminder_datetime }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ ucfirst($reminder->reminder_type) }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-warning">{{ ucfirst($reminder->status) }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('reminders.show', $reminder->reminder_id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('reminders.edit', $reminder->reminder_id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('reminders.destroy', $reminder->reminder_id) }}" method="POST" style="display:inline;">
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
                                <td colspan="6" class="text-center">No reminders found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
