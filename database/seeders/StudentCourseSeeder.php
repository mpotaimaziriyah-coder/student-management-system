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

        $student1 = Student::updateOrCreate(
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

        $student2 = Student::updateOrCreate(
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

        $student3 = Student::updateOrCreate(
            ['registration_number' => 'STU/2024/005'],
            [
                'first_name' => 'Grace',
                'last_name' => 'Nabukenya',
                'email' => 'grace.nabukenya@mubs.ac.ug',
                'program' => 'BSc Computer Science',
                'year_of_study' => '2',
                'gender' => 'Female',
                'status' => 'active',
            ]
        );

        $student4 = Student::updateOrCreate(
            ['registration_number' => 'STU/2025/011'],
            [
                'first_name' => 'John',
                'last_name' => 'Kato',
                'email' => 'john.kato@mubs.ac.ug',
                'program' => 'BBA Economics',
                'year_of_study' => '3',
                'gender' => 'Male',
                'status' => 'active',
            ]
        );

        $student5 = Student::updateOrCreate(
            ['registration_number' => 'STU/2023/008'],
            [
                'first_name' => 'Alice',
                'last_name' => 'Nansubuga',
                'email' => 'alice.nansubuga@mubs.ac.ug',
                'program' => 'BBA Economics',
                'year_of_study' => '3',
                'gender' => 'Female',
                'status' => 'active',
            ]
        );

    }
}
