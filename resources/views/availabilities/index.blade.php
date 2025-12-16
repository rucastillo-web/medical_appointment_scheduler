@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Doctor Availabilities</h1>
                <a href="{{ route('availabilities.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Availability
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
                            <th>Doctor</th>
                            <th>Available Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($availabilities as $availability)
                            <tr>
                                <td>{{ $availability->availability_id }}</td>
                                <td>{{ $availability->doctor->first_name }} {{ $availability->doctor->last_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($availability->available_date)->format('M d, Y') }}</td>
                                <td>{{ $availability->start_time }}</td>
                                <td>{{ $availability->end_time }}</td>
                                <td>
                                    <a href="{{ route('availabilities.show', $availability->availability_id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('availabilities.edit', $availability->availability_id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('availabilities.destroy', $availability->availability_id) }}" method="POST" style="display:inline;">
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
                                <td colspan="6" class="text-center">No availabilities found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
