<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Database\Seeder;



class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {






        $lecturer1 = Lecturer::Create([
            'staff_id' => 'LEC/001',
            'first_name' => 'Daniel',
            'last_name' => 'Okello',
            'email' => 'daniel.okello@mubs.ac.ug',
            'title' => 'Dr.',
            'department' => 'Computing',
            
            'status' => 'active'
            ]
        );

        


        $lecturer2 = Lecturer::Create([
            'staff_id' => 'LEC/002',
            'first_name' => 'Sarah',
            'last_name' => 'Nambi',
            'email' => 'sarah.nambi@mubs.ac.ug',
            'title' => 'Ms.',
            'department' => 'Economics',
            
            'status' => 'active'

            ]
        );
        


        // Course::updateOrCreate(
        //     ['code' => 'ICT 2205'],
        //     [
        //         'name' => 'Web Application Development',
        //         'description' => 'Building modern web applications with Laravel.',
        //         'credit_hours' => 3,
        //         'semester' => 'Semester 1',
        //         'academic_year' => '2026/2027',
        //         'lecturer_id' => $lecturer1->id,
        //         'status' => 'active',
        //     ]
        // );

        // Course::updateOrCreate(
        //     ['code' => 'ECO 2104'],
        //     [
        //         'name' => 'Microeconomics',
        //         'description' => 'Principles of microeconomic theory.',
        //         'credit_hours' => 3,
        //         'semester' => 'Semester 1',
        //         'academic_year' => '2026/2027',
        //         'lecturer_id' => $lecturer2->id,
        //         'status' => 'active',
        //     ]
        // );

        $student1 =Student::Create(
            ['registration_number' => 'STU/2024/001',
            'first_name' => 'Martha',
            'last_name' => 'Achieng',
            'email' => 'martha.achieng@mubs.ac.ug',
            'program' => 'BSc Computer Science',
            'year_of_study' => '2',
            'gender' => 'Female',
            

            'status' => 'active'
            ]
        );
        


        $student2=Student::Create(
            ['registration_number' => 'STU/2023/002',
            'first_name' => 'Dennis',
            'last_name' => 'Okwir',
            'email' => 'dennis.okwir@mubs.ac.ug',
            'program' => 'BBA Economics',

            
            'year_of_study' => '3',
            'gender' => 'Male',
            'status' => 'active'
            ]
        );
       
        

        $student3=Student::Create(
            ['registration_number' => 'STU/2023/003',
            'first_name' => 'Sarah',
            'last_name' => 'Grey',
            'email' => 'saragrey@mubs.ac.ug',
            'program' => 'BBC',
            'year_of_study' => '3',
            

            'gender' => 'Female',
            'status' => 'active'
            ]
        );

        $student4=Student::Create(
            ['registration_number' => 'STU/2024/004',
            'first_name' => 'Kevin',
            'last_name' => 'kay',
            'email' => 'kevinkay@mubs.ac.ug',
            

            'program' => 'BOIM',
            'year_of_study' => '2',
            'gender' => 'Male',
            'status' => 'active'
            ]
        );
       

        $student5=Student::Create(
            ['registration_number' => 'STU/2023/005',
            'first_name' => 'Ziria',
            'last_name' => 'lay',
            'email' => 'zirialay@mubs.ac.ug',
            

            'program' => 'Procurement Bcs',
            'year_of_study' => '3',
            'gender' => 'Female',
            'status' => 'active'
            ]
        );

        Student::firstOrCreate(
            ['registration_number' => 'STU/2025/006'],
            [
                'first_name' => 'Demo',
                'last_name' => 'Student',
                'email' => 'student@mubs.ac.ug',
                'program' => 'BSc Computer Science',
                'year_of_study' => '2',
                'gender' => 'Male',
                'status' => 'active',
            ]
        );
        
        Lecturer::firstOrCreate(
            ['staff_id' => 'LEC/003'],
            [
                'first_name' => 'Demo',
                'last_name' => 'Lecturer',
                'email' => 'lecturer@mubs.ac.ug',
                'title' => 'Dr.',
                'department' => 'Computing',
                'status' => 'active',
            ]
        );






        
        // Lecturers
        foreach ([$lecturer1, $lecturer2] as $lecturer) {
            $user = User::firstOrCreate(
                ['email' => $lecturer->email],
                [
                    'name'     => $lecturer->first_name . ' ' . $lecturer->last_name,
                    'password' => Hash::make('password'),
                ]
            );
            $user->assignRole('lecturer');
        }

        // Students
        foreach ([$student1, $student2, $student3, $student4, $student5] as $student) {
            $user = User::firstOrCreate(
                ['email' => $student->email],
                [
                    'name'     => $student->first_name . ' ' . $student->last_name,
                    'password' => Hash::make('password'),
                ]
            );
            $user->assignRole('student');
        }
    }
}



        

    

