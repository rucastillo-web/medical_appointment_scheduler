<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of availabilities
     */
    public function index()
    {
        $availabilities = Availability::with('doctor')->get();
        return view('availabilities.index', compact('availabilities'));
    }

    /**
     * Show the form for creating a new availability
     */
    public function create()
    {
        $doctors = \App\Models\Doctor::all();
        return view('availabilities.create', compact('doctors'));
    }

    /**
     * Store a newly created availability
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,doctor_id',
            'available_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Convert time format to HH:MM:SS
        $validated['start_time'] = $validated['start_time'] . ':00';
        $validated['end_time'] = $validated['end_time'] . ':00';

        Availability::create($validated);

        return redirect()->route('availabilities.index')->with('success', 'Availability created successfully.');
    }

    /**
     * Display a specific availability
     */
    public function show(Availability $availability)
    {
        $availability->load('doctor');
        return view('availabilities.show', compact('availability'));
    }

    /**
     * Show the form for editing an availability
     */
    public function edit(Availability $availability)
    {
        $doctors = \App\Models\Doctor::all();
        return view('availabilities.edit', compact('availability', 'doctors'));
    }

    /**
     * Update an availability
     */
    public function update(Request $request, Availability $availability)
    {
        $validated = $request->validate([
            'doctor_id' => 'sometimes|exists:doctors,doctor_id',
            'available_date' => 'sometimes|date',
            'start_time' => 'sometimes|date_format:H:i',
            'end_time' => 'sometimes|date_format:H:i|after:start_time',
        ]);

        if (isset($validated['start_time'])) {
            $validated['start_time'] = $validated['start_time'] . ':00';
        }
        if (isset($validated['end_time'])) {
            $validated['end_time'] = $validated['end_time'] . ':00';
        }

        $availability->update($validated);

        return redirect()->route('availabilities.index')->with('success', 'Availability updated successfully.');
    }

    /**
     * Delete an availability
     */
    public function destroy(Availability $availability)
    {
        $availability->delete();

        return redirect()->route('availabilities.index')->with('success', 'Availability deleted successfully.');
    }
}
