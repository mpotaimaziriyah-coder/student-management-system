@extends('layouts.app')

@section('title', 'Add Lecturer')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Add lecturer</h1>
    <p class="text-slate-500 text-sm">Lecturers can be assigned to courses.</p>
</div>

<form action="{{ route('admin.lecturers.store') }}" method="POST" class="bg-white border border-slate-200 rounded-xl p-6 space-y-4 max-w-2xl">
    @csrf

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Staff ID *</label>
            <input type="text" name="staff_id" required class="w-full border rounded-lg px-3 py-2" placeholder="e.g. LEC/010">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <select name="title" class="w-full border rounded-lg px-3 py-2">
                <option value="">—</option>
                <option>Mr.</option>
                <option>Ms.</option>
                <option>Dr.</option>
                <option>Prof.</option>
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

    <div>
        <label class="block text-sm font-medium mb-1">Department</label>
        <input type="text" name="department" class="w-full border rounded-lg px-3 py-2" placeholder="e.g. Computing">
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">Create lecturer</button>
        <a href="{{ route('admin.lecturers.index') }}" class="text-sm text-slate-600 self-center">Cancel</a>
    </div>
</form>
@endsection
