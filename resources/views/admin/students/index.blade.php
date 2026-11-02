<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students — MUBS Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-50">
 @include('patials.role-nav')
 <div class="min-h-screen">
    {{-- Keep your existing sidebar/header structure here if you want the full layout.
         For now this is a clean version that displays real data. --}}

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold">Students</h1>
                <p class="text-slate-500 text-sm">Every student on the register.</p>
            </div>
            <a href="{{ route('admin.students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium">+ Add student</a>
        </div>
            @include('partials.flash')


        @if(session('success'))
            <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg text-sm">
                {{ session('success') }}
            </div>
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
                    @foreach($students as $student)
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
                                <a href="{{ route('admin.students.edit', $student) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                                < <form action="{{ route(' admin.students.destroy', $student->id)}}" method="POST" class="inline"
                            onsubmit="return confirm('Delete this record? This cannot be undone.')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" >Delete</button>
                                </form>
                              
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-slate-500">No students found.</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</div>
<script>lucide.createIcons();</script>
</body>
</html>
