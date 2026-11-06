@extends('layouts.app')
@section('title', 'My Registrations')
@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">My registrations</h1>
            <p class="text-slate-500 text-sm">{{ $student->full_name }} · {{ $student->registration_number }}</p>
        </div>
        <a href="{{ route('student.courses.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium">+ Register for a course</a>
    </div>

    @include('partials.flash')

    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">Course</th>
                    <th class="px-4 py-3 text-left font-medium">Lecturer</th>
                    <th class="px-4 py-3 text-left font-medium">Registered on</th>
                    <th class="px-4 py-3 text-left font-medium">Status</th>
                    <th class="px-4 py-3 text-right font-medium">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($registrations as $reg)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3">{{ $reg->course->code }} — {{ $reg->course->name }}</td>
                        <td class="px-4 py-3">{{ $reg->course->lecturer?->full_name ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $reg->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3">
                            <span class="text-xs px-2 py-1 rounded-full
                                {{ $reg->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : ($reg->status === 'rejected' ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700') }}">
                                {{ ucfirst($reg->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            @if($reg->status === 'pending')
                                <form action="{{ route('student.registrations.destroy', $reg) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Cancel this registration?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline text-sm">Cancel</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">You have not registered for any course yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
