<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('lecturer')->latest()->paginate(15);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $lecturers = Lecturer::where('status', 'active')->get();
        return view('admin.courses.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:courses',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'credit_hours' => 'nullable|integer|min:1',
            'semester' => 'nullable|string',
            'academic_year' => 'nullable|string',
            'lecturer_id' => 'nullable|exists:lecturers,id',
            'status' => 'nullable|string',
        ]);

        Course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        $course->load('lecturer');
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $lecturers = Lecturer::where('status', 'active')->get();
        return view('admin.courses.edit', compact('course', 'lecturers'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => 'required|unique:courses,code,' . $course->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'credit_hours' => 'nullable|integer|min:1',
            'semester' => 'nullable|string',
            'academic_year' => 'nullable|string',
            'lecturer_id' => 'nullable|exists:lecturers,id',
            'status' => 'nullable|string',
        ]);

        $course->update($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->back('admin.courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
