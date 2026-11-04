<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    private function lecturer()
    {
        $lecturer = auth()->user()->lecturerProfile();

        abort_unless($lecturer, 403, 'Your account is not linked to a lecturer record. Please contact the administrator.');

        return $lecturer;
    }

    /** Only the courses assigned to the logged-in lecturer. */
    public function index()
    {
        $lecturer = $this->lecturer();

        $courses = $lecturer->courses()
            ->withCount('registrations')
            ->orderBy('code')
            ->get();

        return view('lecturer.courses.index', compact('courses', 'lecturer'));
    }

    /** A course's registered students, visible only to the lecturer who teaches it. */
    public function show(Course $course)
    {
        $lecturer = $this->lecturer();

        abort_unless($course->lecturer_id === $lecturer->id, 403, 'This course is not assigned to you.');

        $registrations = $course->registrations()
            ->with('student')
            ->latest()
            ->get();

        return view('lecturer.courses.show', compact('course', 'registrations'));
    }
}
