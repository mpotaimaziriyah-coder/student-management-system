<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $student->full_name }} — MUBS Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">
@include('partials.role-nav')
<div class="max-w-4xl mx-auto px-4 py-8">
    <a href="{{ route('admin.students.index') }}" class="text-sm text-blue-600 hover:underline">← Back to students</a>

    <div class="flex justify-between items-start mt-2 mb-6">
        <div>
            <h1 class="text-2xl font-bold">{{ $student->full_name }}</h1>
            <p class="text-slate-500 text-sm">{{ $student->registration_number }}</p>
        </div>
        <a href="{{ route('admin.students.edit', $student) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium">Edit</a>
    </div>

    @include('partials.flash')

    <div class="bg-white border border-slate-200 rounded-xl p-6 mb-6">
        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
            <div><dt class="text-slate-500">Email</dt><dd class="font-medium">{{ $student->email }}</dd></div>
            <div><dt class="text-slate-500">Phone</dt><dd class="font-medium">{{ $student->phone ?? '—' }}</dd></div>
            <div><dt class="text-slate-500">Programme</dt><dd class="font-medium">{{ $student->program ?? '—' }}</dd></div>
            <div><dt class="text-slate-500">Year of study</dt><dd class="font-medium">{{ $student->year_of_study ?? '—' }}</dd></div>
            <div><dt class="text-slate-500">Gender</dt><dd class="font-medium">{{ $student->gender ?? '—' }}</dd></div>
            <div><dt class="text-slate-500">Status</dt><dd class="font-medium">{{ ucfirst($student->status) }}</dd></div>
        </dl>
    </div>

    <h2 class="text-lg font-semibold mb-3">Registered courses</h2>
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Course</th>
                    <th class="px-4 py-3 text-left font-medium">Lecturer</th>
                    <th class="px-4 py-3 text-left font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($student->courses as $course)
                    <tr>
                        <td class="px-4 py-3">{{ $course->code }} — {{ $course->name }}</td>
                        <td class="px-4 py-3">{{ $course->lecturer?->full_name ?? '—' }}</td>
                        <td class="px-4 py-3">{{ ucfirst($course->pivot->status) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-4 py-6 text-center text-slate-500">Not registered for any course.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
