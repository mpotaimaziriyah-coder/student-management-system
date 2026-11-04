@extends('layouts.app')

@section('title', 'Add Course')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Add course</h1>
    <p class="text-slate-500 text-sm">The course code must be unique. Assign a lecturer so students can see who teaches it.</p>
</div>

<form action="{{ route('admin.courses.store') }}" method="POST" class="bg-white border border-slate-200 rounded-xl p-6 space-y-4 max-w-2xl">
    @csrf

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Course code *</label>
            <input type="text" name="code" required class="w-full border rounded-lg px-3 py-2" placeholder="e.g. ICT 2402">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Credits *</label>
            <input type="number" name="credit_hours" value="3" required class="w-full border rounded-lg px-3 py-2">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Title *</label>
        <input type="text" name="name" required class="w-full border rounded-lg px-3 py-2" placeholder="e.g. Advanced Web Application Development">
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Lecturer *</label>
            <select name="lecturer_id" required class="w-full border rounded-lg px-3 py-2">
                <option value="">Select a lecturer</option>
                @foreach(\App\Models\Lecturer::where('status','active')->get() as $lecturer)
                    <option value="{{ $lecturer->id }}">{{ $lecturer->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Semester</label>
            <select name="semester" class="w-full border rounded-lg px-3 py-2">
                <option>Semester 1</option>
                <option>Semester 2</option>
            </select>
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Description</label>
        <textarea name="description" rows="4" class="w-full border rounded-lg px-3 py-2" placeholder="What the course covers"></textarea>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">Create course</button>
        <a href="{{ route('admin.courses.index') }}" class="text-sm text-slate-600 self-center">Cancel</a>
    </div>
</form>
@endsection
