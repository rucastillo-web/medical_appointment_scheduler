<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffController extends Controller
{
    /**
     * Display a listing of staff members
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new staff member
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created staff member
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'role' => 'required|in:doctor,receptionist,admin',
            'username' => 'required|string|unique:staff',
            'password' => 'required|string',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        Staff::create($validated);

        return redirect()->route('staff.index')->with('success', 'Staff member created successfully.');
    }

    /**
     * Display a specific staff member
     */
    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing a staff member
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update a staff member
     */
    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'role' => 'sometimes|in:doctor,receptionist,admin',
            'username' => 'sometimes|string|unique:staff,username,' . $staff->staff_id . ',staff_id',
            'password' => 'sometimes|string',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $staff->update($validated);

        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
    }

    /**
     * Delete a staff member
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
