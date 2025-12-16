<?php

namespace App\Http\Controllers;

use App\Models\VisitLog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VisitLogController extends Controller
{
    /**
     * Display a listing of visit logs
     */
    public function index()
    {
        $visitLogs = VisitLog::with('appointment')->get();
        return view('visit_logs.index', compact('visitLogs'));
    }

    /**
     * Show the form for creating a new visit log
     */
    public function create()
    {
        $appointments = \App\Models\Appointment::all();
        return view('visit_logs.create', compact('appointments'));
    }

    /**
     * Store a newly created visit log
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,appointment_id',
            'visit_datetime' => 'required|date_format:Y-m-d\TH:i',
            'symptoms' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
        ]);

        // Convert datetime from ISO format to proper datetime string
        $validated['visit_datetime'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $validated['visit_datetime'])->format('Y-m-d H:i:s');

        VisitLog::create($validated);

        return redirect()->route('visit-logs.index')->with('success', 'Visit log created successfully.');
    }

    /**
     * Display a specific visit log
     */
    public function show(VisitLog $visitLog)
    {
        $visitLog->load('appointment');
        return view('visit_logs.show', compact('visitLog'));
    }

    /**
     * Show the form for editing a visit log
     */
    public function edit(VisitLog $visitLog)
    {
        $appointments = \App\Models\Appointment::all();
        return view('visit_logs.edit', compact('visitLog', 'appointments'));
    }

    /**
     * Update a visit log
     */
    public function update(Request $request, VisitLog $visitLog)
    {
        $validated = $request->validate([
            'appointment_id' => 'sometimes|exists:appointments,appointment_id',
            'visit_datetime' => 'sometimes|date_format:Y-m-d\TH:i',
            'symptoms' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
        ]);

        // Convert datetime from ISO format to proper datetime string
        if (isset($validated['visit_datetime'])) {
            $validated['visit_datetime'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $validated['visit_datetime'])->format('Y-m-d H:i:s');
        }

        $visitLog->update($validated);

        return redirect()->route('visit-logs.index')->with('success', 'Visit log updated successfully.');
    }

    /**
     * Delete a visit log
     */
    public function destroy(VisitLog $visitLog)
    {
        $visitLog->delete();

        return redirect()->route('visit-logs.index')->with('success', 'Visit log deleted successfully.');
    }
}
