<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class RolePermissionSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
    $adminRole    = Role::firstOrCreate(['name' => 'admin',    'guard_name' => 'web']);
    $lecturerRole = Role::firstOrCreate(['name' => 'lecturer', 'guard_name' => 'web']);
    $studentRole  = Role::firstOrCreate(['name' => 'student',  'guard_name' => 'web']);

    // Create permissions
    $manageStudents      = Permission::firstOrCreate(['name' => 'manage students',        'guard_name' => 'web']);
    $manageCourses       = Permission::firstOrCreate(['name' => 'manage courses',         'guard_name' => 'web']);
    $manageRegistrations = Permission::firstOrCreate(['name' => 'manage registrations',   'guard_name' => 'web']);
    $manageUsers         = Permission::firstOrCreate(['name' => 'manage users',           'guard_name' => 'web']);
    $viewDashboard       = Permission::firstOrCreate(['name' => 'view dashboard',         'guard_name' => 'web']);
    $viewAssignedCourses = Permission::firstOrCreate(['name' => 'view assigned courses',  'guard_name' => 'web']);
    $viewAvailableCourses = Permission::firstOrCreate(['name' => 'view available courses', 'guard_name' => 'web']);
    $viewOwnRegistrations = Permission::firstOrCreate(['name' => 'view own registrations', 'guard_name' => 'web']);
    $viewRegistered      = Permission::firstOrCreate(['name' => 'view registered students', 'guard_name' => 'web']);

    // Assign permissions to roles
    $adminRole->givePermissionTo([
        $manageStudents,
        $manageCourses,
        $manageRegistrations,
        $manageUsers,
        $viewDashboard,
    ]);

    $lecturerRole->givePermissionTo([
        $viewDashboard,
        $viewAssignedCourses,
        $viewRegistered,
    ]);

    $studentRole->givePermissionTo([
        $viewDashboard,
        $viewAvailableCourses,
        $viewOwnRegistrations,
    ]);



        

        
        





    }
}
