<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@include('patials.role-nav')
<body class="bg-slate-50">
<div class="max-w-xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">New Registration</h1>

    <form action="{{ route('admin.registrations.store') }}" method="POST" class="bg-white border rounded-xl p-6 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Student</label>
            <select name="student_id" required class="w-full border rounded-lg px-3 py-2">
                <option value="">Select student</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->registration_number }} — {{ $student->full_name }}</option>
                @endforeach
            </select>
        </div>
             @include('partials.flash')
        <div>
            <label class="block text-sm font-medium mb-1">Course</label>
            <select name="course_id" required class="w-full border rounded-lg px-3 py-2">
                <option value="">Select course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>{{ $course->code }} — {{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        @if($errors->any())
            <div class="text-red-600 text-sm">{{ $errors->first() }}</div>
        @endif

        <div class="flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">Submit</button>
            <a href="{{ route('admin.registrations.index') }}" class="text-sm text-slate-600 self-center">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
