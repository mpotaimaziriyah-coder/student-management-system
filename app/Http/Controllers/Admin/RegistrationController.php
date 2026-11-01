<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['student', 'course.lecturer'])
            ->latest()
            ->paginate(20);

        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        $students = Student::where('status', 'active')->orderBy('last_name')->get();
        $courses = Course::where('status', 'active')->orderBy('code')->get();

        return view('registrations.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $exists = Registration::where('student_id', $validated['student_id'])
            ->where('course_id', $validated['course_id'])
            ->exists();

        if ($exists) {
            return back()->withErrors(['course_id' => 'This student is already registered for the selected course.']);
        }

        Registration::create([
            'student_id' => $validated['student_id'],
            'course_id' => $validated['course_id'],
            'status' => 'pending',
        ]);

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Registration submitted successfully.');
    }

    public function approve(Registration $registration)
    {
        $registration->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => auth()->id(),
        ]);

        return back()->with('success', 'Registration approved.');
    }

    public function reject(Registration $registration)
    {
        $registration->update([
            'status' => 'rejected',
            'approved_at' => now(),
            'approved_by' => auth()->id(),
        ]);

        return back()->with('success', 'Registration rejected.');
    }
}
