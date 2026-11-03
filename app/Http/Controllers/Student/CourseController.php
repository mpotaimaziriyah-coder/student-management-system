<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    /** Courses a student can register for, with their own registration status. */
    public function index()
    {
        $student = auth()->user()->studentProfile();

        abort_unless($student, 403, 'Your account is not linked to a student record. Please contact the administrator.');

        $courses = Course::with('lecturer')
            ->where('status', 'active')
            ->orderBy('code')
            ->get();

        // course_id => registration, so the view can show "Pending / Approved / Register"
        $myRegistrations = $student->registrations->keyBy('course_id');

        return view('student.courses', compact('courses', 'myRegistrations', 'student'));
    }
}
