<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Medical Appointment Scheduler')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        
        main {
            flex: 1;
        }
        
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        
        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
            padding: 20px 0;
        }
        
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: all 0.3s;
        }
        
        .sidebar a:hover {
            background-color: #495057;
            padding-left: 30px;
        }
        
        .sidebar a.active {
            background-color: #0d6efd;
        }
        
        .sidebar-title {
            color: #adb5bd;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 15px 20px 10px;
            text-transform: uppercase;
            margin-top: 15px;
        }
        
        .content-area {
            padding: 30px;
        }
        
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
        }
        
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,.1);
        }
        
        .btn {
            border-radius: 6px;
            font-weight: 500;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="fas fa-hospital"></i> Medical Appointment System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('staff.index') }}">Staff</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky pt-3">
                    <div class="sidebar-title">Main Menu</div>
                    
                    <a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')) active @endif">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>

                    <div class="sidebar-title">Management</div>
                    
                    <a href="{{ route('doctors.index') }}" class="@if(request()->routeIs('doctors.*')) active @endif">
                        <i class="fas fa-stethoscope"></i> Doctors
                    </a>
                    
                    <a href="{{ route('patients.index') }}" class="@if(request()->routeIs('patients.*')) active @endif">
                        <i class="fas fa-users"></i> Patients
                    </a>
                    
                    <a href="{{ route('appointments.index') }}" class="@if(request()->routeIs('appointments.*')) active @endif">
                        <i class="fas fa-calendar-check"></i> Appointments
                    </a>
                    
                    <a href="{{ route('availabilities.index') }}" class="@if(request()->routeIs('availabilities.*')) active @endif">
                        <i class="fas fa-clock"></i> Availabilities
                    </a>

                    <div class="sidebar-title">Records</div>
                    
                    <a href="{{ route('visit-logs.index') }}" class="@if(request()->routeIs('visit-logs.*')) active @endif">
                        <i class="fas fa-file-medical"></i> Visit Logs
                    </a>
                    
                    <a href="{{ route('reminders.index') }}" class="@if(request()->routeIs('reminders.*')) active @endif">
                        <i class="fas fa-bell"></i> Reminders
                    </a>

                    <div class="sidebar-title">Settings</div>
                    
                    <a href="{{ route('staff.index') }}" class="@if(request()->routeIs('staff.*')) active @endif">
                        <i class="fas fa-users-cog"></i> Staff
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 col-lg-10 px-md-4 content-area">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Medical Appointment Scheduler. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    @yield('scripts')
</body>
</html>
