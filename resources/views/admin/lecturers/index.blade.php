@extends('layouts.app')

@section('title', 'Lecturers')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold">Lecturers</h1>
        <p class="text-slate-500 text-sm">Lecturers and the courses assigned to them.</p>
    </div>
    <a href="{{ route('admin.lecturers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">+ Add lecturer</a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-emerald-50 text-emerald-800 rounded text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600">
            <tr>
                <th class="px-4 py-3 text-left font-medium">Staff ID</th>
                <th class="px-4 py-3 text-left font-medium">Name</th>
                <th class="px-4 py-3 text-left font-medium">Department</th>
                <th class="px-4 py-3 text-left font-medium">Email</th>
                <th class="px-4 py-3 text-right font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($lecturers as $lecturer)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 py-3">{{ $lecturer->staff_id }}</td>
                    <td class="px-4 py-3 font-medium">{{ $lecturer->full_name }}</td>
                    <td class="px-4 py-3">{{ $lecturer->department ?? '—' }}</td>
                    <td class="px-4 py-3">{{ $lecturer->email }}</td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.lecturers.edit', $lecturer) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-8 text-center text-slate-500">No lecturers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $lecturers->links() }}
</div>
@endsection
