<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {
        $lecturer1 = Lecturer::updateOrCreate(
            ['staff_id' => 'LEC/001'],
            [
                'first_name' => 'Daniel',
                'last_name' => 'Okello',
                'email' => 'daniel.okello@mubs.ac.ug',
                'title' => 'Dr.',
                'department' => 'Computing',
                'status' => 'active',
            ]
        );

        $lecturer2 = Lecturer::updateOrCreate(
            ['staff_id' => 'LEC/002'],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Nambi',
                'email' => 'sarah.nambi@mubs.ac.ug',
                'title' => 'Ms.',
                'department' => 'Economics',
                'status' => 'active',
            ]
        );

        Course::updateOrCreate(
            ['code' => 'ICT 2205'],
            [
                'name' => 'Web Application Development',
                'description' => 'Building modern web applications with Laravel.',
                'credit_hours' => 3,
                'semester' => 'Semester 1',
                'academic_year' => '2026/2027',
                'lecturer_id' => $lecturer1->id,
                'status' => 'active',
            ]
        );

        Course::updateOrCreate(
            ['code' => 'ECO 2104'],
            [
                'name' => 'Microeconomics',
                'description' => 'Principles of microeconomic theory.',
                'credit_hours' => 3,
                'semester' => 'Semester 1',
                'academic_year' => '2026/2027',
                'lecturer_id' => $lecturer2->id,
                'status' => 'active',
            ]
        );

        Student::updateOrCreate(
            ['registration_number' => 'STU/2025/021'],
            [
                'first_name' => 'Martha',
                'last_name' => 'Achieng',
                'email' => 'martha.achieng@mubs.ac.ug',
                'program' => 'BSc Computer Science',
                'year_of_study' => '2',
                'gender' => 'Female',
                'status' => 'active',
            ]
        );

        Student::updateOrCreate(
            ['registration_number' => 'STU/2023/014'],
            [
                'first_name' => 'Dennis',
                'last_name' => 'Okwir',
                'email' => 'dennis.okwir@mubs.ac.ug',
                'program' => 'BBA Economics',
                'year_of_study' => '3',
                'gender' => 'Male',
                'status' => 'active',
            ]
        );
    }
}
