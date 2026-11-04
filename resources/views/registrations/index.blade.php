@extends('layouts.app')

@section('title', 'Registrations')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold">Registrations</h1>
    <a href="{{ route('admin.registrations.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">+ New registration</a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-emerald-50 text-emerald-800 rounded text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-4 py-3 text-left">Student</th>
                <th class="px-4 py-3 text-left">Course</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($registrations as $reg)
                <tr class="border-t">
                    <td class="px-4 py-3">{{ $reg->student->full_name ?? 'N/A' }} ({{ $reg->student->registration_number ?? '' }})</td>
                    <td class="px-4 py-3">{{ $reg->course->code ?? '' }} — {{ $reg->course->name ?? '' }}</td>
                    <td class="px-4 py-3">
                        <span class="text-xs px-2 py-1 rounded-full
                            {{ $reg->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : ($reg->status === 'rejected' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700') }}">
                            {{ ucfirst($reg->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right space-x-2">
                        @if($reg->status === 'pending')
                            <form action="{{ route('admin.registrations.approve', $reg) }}" method="POST" class="inline">
                                @csrf
                                <button class="text-emerald-600 text-sm">Approve</button>
                            </form>
                            <form action="{{ route('admin.registrations.reject', $reg) }}" method="POST" class="inline">
                                @csrf
                                <button class="text-red-600 text-sm">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-8 text-center text-slate-500">No registrations yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
