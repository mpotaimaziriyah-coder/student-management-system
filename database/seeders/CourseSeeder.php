<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course1 = Course::Create(
            ['code' => 'ICT 2205',
                'name' => 'Web Application Development',
                'description' => 'Building modern web applications with Laravel.',
                'credit_hours' => 3,
                'semester' => 'Semester 1',
                'academic_year' => '2026/2027',
                'lecturer_id' => Lecturer::where('staff_id', 'LEC/001')->first()->id,
                'status' => 'active',
            ]
        );

        $course2 = Course::Create(
            ['code' => 'ECO 2104',
                'name' => 'Microeconomics',
                'description' => 'Principles of microeconomic theory.',
                'credit_hours' => 3,
                'semester' => 'Semester 1',
                'academic_year' => '2026/2027',
                'lecturer_id' => Lecturer::where('staff_id', 'LEC/002')->first()->id,
                'status' => 'active',
            ]
        );

        $course3 = Course::Create(
            ['code' => 'AWAD 1101',
                'name' => 'Advanced web application development',
                'description' => 'Introduction to differential and integral calculus.',
                'credit_hours' => 3,
                'semester' => 'Semester 1',
                'academic_year' => '2026/2027',
                'lecturer_id' => Lecturer::where('staff_id', 'LEC/001')->first()->id,
                'status' => 'active',
            ]
        );

        $course3 = Course::Create(
            ['code' => 'ICT 2206',
                'name' => 'Database Management Systems',
                'description' => 'Introduction to database design and management.',
                'credit_hours' => 3,
                'semester' => 'Semester 1',
                'academic_year' => '2026/2027',
                'lecturer_id' => Lecturer::where('staff_id', 'LEC/002')->first()->id,
                'status' => 'active',
            ]
        );

        $course4 = Course::Create(
            ['code' => 'ICT 2207',
                'name' => 'Software Engineering',
                'description' => 'Introduction to software development methodologies.',
                'credit_hours' => 3,
                'semester' => 'Semester 1',
                'academic_year' => '2026/2027',
                'lecturer_id' => Lecturer::where('staff_id', 'LEC/001')->first()->id,
                'status' => 'active',
            ]
        );
    }
}
