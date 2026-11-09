@extends('layouts.app')

@section('title', $student->full_name)

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.students.index') }}" class="text-sm text-blue-600">← Back to students</a>
    <div class="flex justify-between items-start mt-2">
        <div>
            <h1 class="text-2xl font-bold">{{ $student->full_name }}</h1>
            <p class="text-slate-500">{{ $student->registration_number }} · {{ $student->program ?? 'No programme' }}</p>
        </div>
        <a href="{{ route('admin.students.edit', $student) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">Edit</a>
    </div>
</div>

<div class="bg-white border border-slate-200 rounded-xl p-5 mb-6">
    <h2 class="font-semibold mb-3">Details</h2>
    <dl class="grid grid-cols-2 gap-4 text-sm">
        <div><dt class="text-slate-500">Email</dt><dd>{{ $student->email }}</dd></div>
        <div><dt class="text-slate-500">Phone</dt><dd>{{ $student->phone ?? '—' }}</dd></div>
        <div><dt class="text-slate-500">Year</dt><dd>{{ $student->year_of_study ?? '—' }}</dd></div>
        <div><dt class="text-slate-500">Status</dt><dd>{{ ucfirst($student->status) }}</dd></div>
    </dl>
</div>

<div class="bg-white border border-slate-200 rounded-xl p-5">
    <h2 class="font-semibold mb-3">Registrations</h2>
    @if($student->courses->isEmpty())
        <p class="text-slate-500 text-sm">No registrations yet.</p>
    @else
        <div class="space-y-2">
            @foreach($student->courses as $course)
                <div class="flex justify-between items-center p-3 bg-slate-50 rounded-lg">
                    <div>
                        <p class="font-medium">{{ $course->code }} — {{ $course->name }}</p>
                        <p class="text-xs text-slate-500">{{ $course->lecturer?->full_name ?? 'No lecturer' }} · {{ ucfirst($course->pivot->status ?? 'pending') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
