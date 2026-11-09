@extends('layouts.app')
@section('title', 'Available Courses')
@section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-bold">Available courses</h1>
        <p class="text-slate-500 text-sm">Courses open for registration. Welcome, {{ $student->full_name }}.</p>
    </div>

    @include('partials.flash')

    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Code</th>
                    <th class="px-4 py-3 text-left font-medium">Title</th>
                    <th class="px-4 py-3 text-left font-medium">Lecturer</th>
                    <th class="px-4 py-3 text-left font-medium">Credits</th>
                    <th class="px-4 py-3 text-left font-medium">Semester</th>
                    <th class="px-4 py-3 text-right font-medium">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($courses as $course)
                    @php($mine = $myRegistrations->get($course->id))
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 font-medium">{{ $course->code }}</td>
                        <td class="px-4 py-3">
                            {{ $course->name }}
                            @if($course->description)
                                <p class="text-xs text-slate-500">{{ $course->description }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $course->lecturer?->full_name ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $course->credit_hours }}</td>
                        <td class="px-4 py-3">{{ $course->semester ?? '—' }}</td>
                        <td class="px-4 py-3 text-right">
                            @if($mine)
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ $mine->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : ($mine->status === 'rejected' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700') }}">
                                    {{ ucfirst($mine->status) }}
                                </span>
                            @else
                                <form action="{{ route('student.registrations.store') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <button class="bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium">Register</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-500">No courses are open for registration.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
