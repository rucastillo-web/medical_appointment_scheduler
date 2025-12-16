<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\VisitLogController;
use App\Http\Controllers\ReminderController;

/**
 * Welcome Route
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Dashboard Route
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/**
 * Staff Management Routes
 */
Route::resource('staff', StaffController::class);

/**
 * Doctor Management Routes
 */
Route::resource('doctors', DoctorController::class);

/**
 * Patient Management Routes
 */
Route::resource('patients', PatientController::class);

/**
 * Appointment Management Routes
 */
Route::resource('appointments', AppointmentController::class);

/**
 * Doctor Availability Routes
 */
Route::resource('availabilities', AvailabilityController::class);

/**
 * Visit Log Routes
 */
Route::resource('visit-logs', VisitLogController::class);

/**
 * Reminder Routes
 */
Route::resource('reminders', ReminderController::class);
