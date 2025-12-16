<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReminderController extends Controller
{
    /**
     * Display a listing of reminders
     */
    public function index()
    {
        $reminders = Reminder::with('appointment')->get();
        return view('reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new reminder
     */
    public function create()
    {
        $appointments = \App\Models\Appointment::all();
        return view('reminders.create', compact('appointments'));
    }

    /**
     * Store a newly created reminder
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|exists:appointments,appointment_id',
            'reminder_datetime' => 'required|date_format:Y-m-d\TH:i',
            'reminder_type' => 'required|in:email,sms,notification',
            'status' => 'required|in:pending,sent,failed',
        ]);

        // Convert datetime from ISO format to proper datetime string
        $validated['reminder_datetime'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $validated['reminder_datetime'])->format('Y-m-d H:i:s');

        Reminder::create($validated);

        return redirect()->route('reminders.index')->with('success', 'Reminder created successfully.');
    }

    /**
     * Display a specific reminder
     */
    public function show(Reminder $reminder)
    {
        $reminder->load('appointment');
        return view('reminders.show', compact('reminder'));
    }

    /**
     * Show the form for editing a reminder
     */
    public function edit(Reminder $reminder)
    {
        $appointments = \App\Models\Appointment::all();
        return view('reminders.edit', compact('reminder', 'appointments'));
    }

    /**
     * Update a reminder
     */
    public function update(Request $request, Reminder $reminder)
    {
        $validated = $request->validate([
            'appointment_id' => 'sometimes|exists:appointments,appointment_id',
            'reminder_datetime' => 'sometimes|date_format:Y-m-d\TH:i',
            'reminder_type' => 'sometimes|in:email,sms,notification',
            'status' => 'sometimes|in:pending,sent,failed',
        ]);

        // Convert datetime from ISO format to proper datetime string
        if (isset($validated['reminder_datetime'])) {
            $validated['reminder_datetime'] = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $validated['reminder_datetime'])->format('Y-m-d H:i:s');
        }

        $reminder->update($validated);

        return redirect()->route('reminders.index')->with('success', 'Reminder updated successfully.');
    }

    /**
     * Delete a reminder
     */
    public function destroy(Reminder $reminder)
    {
        $reminder->delete();

        return redirect()->route('reminders.index')->with('success', 'Reminder deleted successfully.');
    }
}
