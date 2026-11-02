<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->code }} Students — MUBS Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">
@include('partials.role-nav')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="{{ route('lecturer.courses.index') }}" class="text-sm text-blue-600 hover:underline">← Back to my courses</a>
        <h1 class="text-2xl font-bold mt-2">{{ $course->code }} — {{ $course->name }}</h1>
        <p class="text-slate-500 text-sm">{{ $registrations->count() }} registered {{ \Illuminate\Support\Str::plural('student', $registrations->count()) }}.</p>
    </div>

    @include('partials.flash')

    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Reg. number</th>
                    <th class="px-4 py-3 text-left font-medium">Name</th>
                    <th class="px-4 py-3 text-left font-medium">Programme</th>
                    <th class="px-4 py-3 text-left font-medium">Email</th>
                    <th class="px-4 py-3 text-left font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($registrations as $reg)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">{{ $reg->student->registration_number }}</td>
                        <td class="px-4 py-3 font-medium">{{ $reg->student->full_name }}</td>
                        <td class="px-4 py-3">{{ $reg->student->program ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $reg->student->email }}</td>
                        <td class="px-4 py-3">
                            <span class="text-xs px-2 py-1 rounded-full
                                {{ $reg->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : ($reg->status === 'rejected' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700') }}">
                                {{ ucfirst($reg->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">No students have registered for this course yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
