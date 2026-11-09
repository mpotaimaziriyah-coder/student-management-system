<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'student_id' => ['required', Rule::exists('students', 'id')->where('status', 'active')],
            'course_id' => [
                'required',
                Rule::exists('courses', 'id')->where('status', 'active'),
                // a student can register for a course only once
                Rule::unique('registrations', 'course_id')->where('student_id', $request->input('student_id')),
            ],
        ], [
            'student_id.required' => 'Please select a student.',
            'student_id.exists' => 'The selected student does not exist or is not active.',
            'course_id.required' => 'Please select a course.',
            'course_id.exists' => 'The selected course does not exist or is not active.',
            'course_id.unique' => 'This student is already registered for the selected course.',
        ]);

        try {
            Registration::create([
                'student_id' => $validated['student_id'],
                'course_id' => $validated['course_id'],
                'status' => 'pending',
            ]);
        } catch (UniqueConstraintViolationException) {
            // two admins clicking at the same moment: the database index still protects us
            return back()->withInput()->with('error', 'This student is already registered for the selected course.');
        }

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

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return back()->with('success', 'Registration removed.');
    }
}
