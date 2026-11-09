@extends('layouts.app')
@section('title', 'Student Dashboard')
@section('content')

@php
    $student = auth()->user()->studentProfile();
    $registrations = $student ? $student->registrations()->with('course')->latest()->get() : collect();
    $approved = $registrations->where('status', 'approved')->count();
    $pending  = $registrations->where('status', 'pending')->count();
@endphp

    <div class="mb-6">
        <h1 class="text-2xl font-bold">Good day, {{ auth()->user()->name }}</h1>
        <p class="text-slate-500 mt-1">Semester 1, 2026/2027 — welcome to your student portal.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
            <p class="text-2xl font-bold">{{ $registrations->count() }}</p>
            <p class="text-sm text-slate-500">My registrations</p>
        </div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
            <p class="text-2xl font-bold">{{ $approved }}</p>
            <p class="text-sm text-slate-500">Approved</p>
        </div>
        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
            <p class="text-2xl font-bold">{{ $pending }}</p>
            <p class="text-sm text-slate-500">Pending</p>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">My recent registrations</h2>
            <a href="{{ route('student.courses.index') }}" class="text-sm text-[#2563eb]">+ Register for a course</a>
        </div>

        <div class="space-y-3">
            @forelse($registrations->take(5) as $reg)
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <div>
                        <p class="text-sm font-medium">{{ $reg->course->code }} — {{ $reg->course->name }}</p>
                        <p class="text-xs text-slate-500 mt-1">{{ $reg->created_at->format('d M Y') }}</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $reg->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : ($reg->status === 'rejected' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700') }}">
                        {{ ucfirst($reg->status) }}
                    </span>
                </div>
            @empty
                <p class="text-sm text-slate-500">You have not registered for any course yet.</p>
            @endforelse
        </div>
    </div>

@endsection