<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'joytiko@gmail.com'],
            ['name' => 'Joy Tiko', 'password' => Hash::make('password')]
        );
        $admin->assignRole('admin');

        // Demo accounts for the login page links
        $demoAdmin = User::firstOrCreate(
            ['email' => 'admin@mubs.ac.ug'],
            ['name' => 'Demo Administrator', 'password' => Hash::make('password')]
        );
        $demoAdmin->assignRole('admin');

        $demoLecturer = User::firstOrCreate(
            ['email' => 'lecturer@mubs.ac.ug'],
            ['name' => 'Demo Lecturer', 'password' => Hash::make('password')]
        );
        $demoLecturer->assignRole('lecturer');

        $demoStudent = User::firstOrCreate(
            ['email' => 'student@mubs.ac.ug'],
            ['name' => 'Demo Student', 'password' => Hash::make('password')]
        );
        $demoStudent->assignRole('student');
    }
}