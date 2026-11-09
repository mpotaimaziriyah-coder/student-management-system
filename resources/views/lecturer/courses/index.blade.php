<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses — MUBS Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">
@include('partials.role-nav')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">My courses</h1>
        <p class="text-slate-500 text-sm">Courses assigned to {{ $lecturer->full_name }}.</p>
    </div>

    @include('partials.flash')

    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Code</th>
                    <th class="px-4 py-3 text-left font-medium">Title</th>
                    <th class="px-4 py-3 text-left font-medium">Semester</th>
                    <th class="px-4 py-3 text-left font-medium">Registered students</th>
                    <th class="px-4 py-3 text-right font-medium">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($courses as $course)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 font-medium">{{ $course->code }}</td>
                        <td class="px-4 py-3">{{ $course->name }}</td>
                        <td class="px-4 py-3">{{ $course->semester ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $course->registrations_count }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('lecturer.courses.show', $course) }}" class="text-blue-600 hover:underline text-sm">View students</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">No courses have been assigned to you yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
