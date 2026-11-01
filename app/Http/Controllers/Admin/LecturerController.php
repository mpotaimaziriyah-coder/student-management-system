<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::latest()->paginate(15);
        return view('admin.lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        return view('admin.lecturers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id' => 'required|unique:lecturers',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers',
            'phone' => 'nullable|string',
            'department' => 'nullable|string',
            'title' => 'nullable|string',
            'bio' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        Lecturer::create($validated);

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer created successfully.');
    }

    public function show(Lecturer $lecturer)
    {
        $lecturer->load('courses');
        return view('admin.lecturers.show', compact('lecturer'));
    }

    public function edit(Lecturer $lecturer)
    {
        return view('admin.lecturers.edit', compact('lecturer'));
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'staff_id' => 'required|unique:lecturers,staff_id,' . $lecturer->id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers,email,' . $lecturer->id,
            'phone' => 'nullable|string',
            'department' => 'nullable|string',
            'title' => 'nullable|string',
            'bio' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $lecturer->update($validated);

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer updated successfully.');
    }

    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer deleted successfully.');
    }
}
