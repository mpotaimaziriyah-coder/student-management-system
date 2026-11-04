@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Add student</h1>
    <p class="text-slate-500 text-sm">Adding a student here gives them a login with the Student role.</p>
</div>

<form action="{{ route('admin.students.store') }}" method="POST" class="bg-white border border-slate-200 rounded-xl p-6 space-y-4 max-w-2xl">
    @csrf

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Registration number *</label>
            <input type="text" name="registration_number" required class="w-full border rounded-lg px-3 py-2" placeholder="e.g. STU/2025/030">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded-lg px-3 py-2">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">First name *</label>
            <input type="text" name="first_name" required class="w-full border rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Last name *</label>
            <input type="text" name="last_name" required class="w-full border rounded-lg px-3 py-2">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Email *</label>
        <input type="email" name="email" required class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Programme</label>
            <input type="text" name="program" class="w-full border rounded-lg px-3 py-2" placeholder="e.g. BSc Computer Science">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Year of study</label>
            <input type="text" name="year_of_study" class="w-full border rounded-lg px-3 py-2" placeholder="1">
        </div>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">Create student</button>
        <a href="{{ route('admin.students.index') }}" class="text-sm text-slate-600 self-center">Cancel</a>
    </div>
</form>
@endsection
