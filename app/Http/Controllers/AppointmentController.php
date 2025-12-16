<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments
     */
    public function index()
    {
        $appointments = Appointment::with('patient', 'doctor', 'createdByStaff')->get();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment
     */
    public function create()
    {
        $patients = \App\Models\Patient::all();
        $doctors = \App\Models\Doctor::all();
        $staff = \App\Models\Staff::all();
        return view('appointments.create', compact('patients', 'doctors', 'staff'));
    }

    /**
     * Store a newly created appointment
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'doctor_id' => 'required|exists:doctors,doctor_id',
            'created_by_staff_id' => 'required|exists:staff,staff_id',
            'updated_by_staff_id' => 'nullable|exists:staff,staff_id',
            'appointment_datetime' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|in:scheduled,completed,cancelled,no-show',
            'notes' => 'nullable|string',
        ]);

        // Convert datetime from ISO format to proper datetime string
        $validated['appointment_datetime'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $validated['appointment_datetime']);

        Appointment::create($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display a specific appointment
     */
    public function show(Appointment $appointment)
    {
        $appointment->load('patient', 'doctor', 'createdByStaff', 'updatedByStaff', 'visitLogs', 'reminders');
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing an appointment
     */
    public function edit(Appointment $appointment)
    {
        $patients = \App\Models\Patient::all();
        $doctors = \App\Models\Doctor::all();
        return view('appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    /**
     * Update an appointment
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_id' => 'sometimes|exists:patients,patient_id',
            'doctor_id' => 'sometimes|exists:doctors,doctor_id',
            'created_by_staff_id' => 'sometimes|exists:staff,staff_id',
            'updated_by_staff_id' => 'nullable|exists:staff,staff_id',
            'appointment_datetime' => 'sometimes|date_format:Y-m-d\TH:i',
            'status' => 'sometimes|in:scheduled,completed,cancelled,no-show',
            'notes' => 'nullable|string',
        ]);

        if (isset($validated['appointment_datetime'])) {
            $validated['appointment_datetime'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $validated['appointment_datetime']);
        }

        $appointment->update($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Delete an appointment
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
