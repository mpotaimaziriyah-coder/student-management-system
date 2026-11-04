<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    private function student()
    {
        $student = auth()->user()->studentProfile();

        abort_unless($student, 403, 'Your account is not linked to a student record. Please contact the administrator.');

        return $student;
    }

    /** Only the logged-in student's own registrations. */
    public function index()
    {
        $student = $this->student();

        $registrations = $student->registrations()
            ->with('course.lecturer')
            ->latest()
            ->get();

        return view('student.registrations', compact('registrations', 'student'));
    }

    public function store(Request $request)
    {
        $student = $this->student();

        // the student comes from the login, never from the form, so nobody can register for someone else
        $validated = $request->validate([
            'course_id' => [
                'required',
                Rule::exists('courses', 'id')->where('status', 'active'),
                Rule::unique('registrations', 'course_id')->where('student_id', $student->id),
            ],
        ], [
            'course_id.required' => 'Please choose a course to register for.',
            'course_id.exists' => 'That course does not exist or is not open for registration.',
            'course_id.unique' => 'You are already registered for this course.',
        ]);

        if ($student->status !== 'active') {
            return back()->with('error', 'Only active students can register for courses.');
        }

        try {
            Registration::create([
                'student_id' => $student->id,
                'course_id' => $validated['course_id'],
                'status' => 'pending',
            ]);
        } catch (UniqueConstraintViolationException) {
            return back()->with('error', 'You are already registered for this course.');
        }

        return redirect()->route('student.registrations.index')
            ->with('success', 'Registration submitted. It is waiting for approval.');
    }

    /** A student may cancel their own registration while it is still pending. */
    public function destroy(Registration $registration)
    {
        $student = $this->student();

        abort_unless($registration->student_id === $student->id, 403, 'You can only manage your own registrations.');

        if ($registration->status !== 'pending') {
            return back()->with('error', 'Only pending registrations can be cancelled.');
        }

        $registration->delete();

        return back()->with('success', 'Registration cancelled.');
    }
}
