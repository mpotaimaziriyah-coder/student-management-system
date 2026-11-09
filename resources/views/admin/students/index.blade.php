@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold">Students</h1>
        <p class="text-slate-500 text-sm">Every student on the register.</p>
    </div>
    <a href="{{ route('admin.students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">+ Add student</a>
</div>
@include('partials.flash')

@if(session('success'))
    <div class="mb-4 p-3 bg-emerald-50 text-emerald-800 rounded text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600">
            <tr>
                <th class="px-4 py-3 text-left font-medium">Reg. number</th>
                <th class="px-4 py-3 text-left font-medium">Name</th>
                <th class="px-4 py-3 text-left font-medium">Programme</th>
                <th class="px-4 py-3 text-left font-medium">Year</th>
                <th class="px-4 py-3 text-left font-medium">Status</th>
                <th class="px-4 py-3 text-right font-medium">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($students as $student)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 py-3">{{ $student->registration_number }}</td>
                    <td class="px-4 py-3 font-medium">{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td class="px-4 py-3">{{ $student->program ?? '—' }}</td>
                    <td class="px-4 py-3">{{ $student->year_of_study ?? '—' }}</td>
                    <td class="px-4 py-3">
                        <span class="text-xs px-2 py-1 rounded-full {{ $student->status === 'active' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                            {{ ucfirst($student->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.students.edit', $student->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                         <form action="{{ route('admin.students.destroy',$student->id)}}" method="POST" class="inline"
                            onsubmit="return confirm('Delete this record? This cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm ml-3">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-slate-500">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $students->links() }}
</div>
@endsection
