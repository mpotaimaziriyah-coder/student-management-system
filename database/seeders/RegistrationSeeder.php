<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Course;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student1 = Student::where('registration_number', 'STU/2025/001')->first();
        $student2 = Student::where('registration_number', 'STU/2025/002')->first();
        $student3 = Student::where('registration_number', 'STU/2025/003')->first();
        $student4 = Student::where('registration_number', 'STU/2025/004')->first();
        $student5 = Student::where('registration_number', 'STU/2025/005')->first();

        $course1 = Course::first();
        $course2 = Course::skip(1)->first();
        $course3 = Course::skip(2)->first();
        $course4 = Course::skip(3)->first();
        $course5 = Course::skip(4)->first();

        // Create registrations for each student and course
        Registration::updateOrCreate(
            ['student_id' => $student1->id, 'course_id' => $course1->id],
            ['status' => 'registered']
        );
        Registration::updateOrCreate(
            ['student_id' => $student2->id, 'course_id' => $course2->id],
            ['status' => 'registered']
        );
        Registration::updateOrCreate(
            ['student_id' => $student3->id, 'course_id' => $course3->id],
            ['status' => 'registered']
        );
        Registration::updateOrCreate(
            ['student_id' => $student4->id, 'course_id' => $course4->id],
            ['status' => 'registered']
        );
        Registration::updateOrCreate(
            ['student_id' => $student5->id, 'course_id' => $course5->id],
            ['status' => 'registered']
        );
    }
}
