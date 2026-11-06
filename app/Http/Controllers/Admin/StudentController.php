<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(15);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'registration_number' => 'required|unique:students',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string',
            'program' => 'nullable|string',
            'year_of_study' => 'nullable|string',
            'gender' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $Student = Student::create($validated);

        $user = User::create([
            'name'     => $student->first_name . ' ' . $student->last_name,
            'email'    => $student->email,
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('student');
    
        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully. Login: ' . $student->email . ' / password');
    }

    public function show(Student $student)
    {
        $student->load('courses.lecturer');

        return view('admin.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'registration_number' => 'required|unique:students,registration_number,' . $student->id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string',
            'program' => 'nullable|string',
            'year_of_study' => 'nullable|string',
            'gender' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $student->update($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        if ($student->registrations()->exists()) {
            return redirect()->route('admin.students.index')
                ->with('error', 'This student has course registrations. Remove them first before deleting the student.');
        }

        $student->delete();

        return redirect()->back('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
