<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->code }} — MUBS Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">
@include('partials.role-nav')
<div class="max-w-4xl mx-auto px-4 py-8">
    <a href="{{ route('admin.courses.index') }}" class="text-sm text-blue-600 hover:underline">← Back to courses</a>

    <div class="flex justify-between items-start mt-2 mb-6">
        <div>
            <h1 class="text-2xl font-bold">{{ $course->code }} — {{ $course->name }}</h1>
            <p class="text-slate-500 text-sm">{{ $course->lecturer?->full_name ?? 'No lecturer assigned' }}</p>
        </div>
        <a href="{{ route('admin.courses.edit', $course) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium">Edit</a>
    </div>

    @include('partials.flash')

    <div class="bg-white border border-slate-200 rounded-xl p-6 mb-6">
        <p class="text-sm text-slate-600 mb-4">{{ $course->description ?? 'No description.' }}</p>
        <dl class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-sm">
            <div><dt class="text-slate-500">Credit hours</dt><dd class="font-medium">{{ $course->credit_hours }}</dd></div>
            <div><dt class="text-slate-500">Semester</dt><dd class="font-medium">{{ $course->semester ?? '—' }}</dd></div>
            <div><dt class="text-slate-500">Academic year</dt><dd class="font-medium">{{ $course->academic_year ?? '—' }}</dd></div>
            <div><dt class="text-slate-500">Status</dt><dd class="font-medium">{{ ucfirst($course->status) }}</dd></div>
        </dl>
    </div>

    <h2 class="text-lg font-semibold mb-3">Registered students ({{ $course->students->count() }})</h2>
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Reg. number</th>
                    <th class="px-4 py-3 text-left font-medium">Name</th>
                    <th class="px-4 py-3 text-left font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($course->students as $student)
                    <tr>
                        <td class="px-4 py-3">{{ $student->registration_number }}</td>
                        <td class="px-4 py-3">{{ $student->full_name }}</td>
                        <td class="px-4 py-3">{{ ucfirst($student->pivot->status) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-4 py-6 text-center text-slate-500">No students registered yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
