<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DoctorController extends Controller
{
    /**
     * Display a listing of doctors
     */
    public function index()
    {
        $doctors = Doctor::with('availabilities')->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new doctor
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created doctor
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'specialty' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email|unique:doctors',
        ]);

        Doctor::create($validated);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    /**
     * Display a specific doctor
     */
    public function show(Doctor $doctor)
    {
        $doctor->load('availabilities', 'appointments');
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing a doctor
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update a doctor
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'specialty' => 'sometimes|string',
            'phone_number' => 'sometimes|string',
            'email' => 'sometimes|email|unique:doctors,email,' . $doctor->doctor_id . ',doctor_id',
        ]);

        $doctor->update($validated);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    /**
     * Delete a doctor
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
