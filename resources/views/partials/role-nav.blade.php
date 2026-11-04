{{-- Navigation that only shows the links the logged-in role may use. --}}
@php($role = auth()->user()?->role)
<nav class="bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 py-3 flex flex-wrap items-center justify-between gap-3">
        <div class="flex flex-wrap items-center gap-5 text-sm">
            <span class="font-semibold text-slate-900">MUBS SMS</span>

            @if($role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="text-slate-600 hover:text-blue-600">Dashboard</a>
                <a href="{{ route('admin.students.index') }}" class="text-slate-600 hover:text-blue-600">Students</a>
                <a href="{{ route('admin.courses.index') }}" class="text-slate-600 hover:text-blue-600">Courses</a>
                <a href="{{ route('admin.lecturers.index') }}" class="text-slate-600 hover:text-blue-600">Lecturers</a>
                <a href="{{ route('admin.registrations.index') }}" class="text-slate-600 hover:text-blue-600">Registrations</a>
            @elseif($role === 'lecturer')
                <a href="{{ route('lecturer.dashboard') }}" class="text-slate-600 hover:text-blue-600">Dashboard</a>
                <a href="{{ route('lecturer.courses.index') }}" class="text-slate-600 hover:text-blue-600">My courses</a>
            @elseif($role === 'student')
                <a href="{{ route('student.dashboard') }}" class="text-slate-600 hover:text-blue-600">Dashboard</a>
                <a href="{{ route('student.courses.index') }}" class="text-slate-600 hover:text-blue-600">Available courses</a>
                <a href="{{ route('student.registrations.index') }}" class="text-slate-600 hover:text-blue-600">My registrations</a>
            @endif
        </div>

        <div class="flex items-center gap-3 text-sm">
            <span class="text-slate-500">{{ auth()->user()?->name }} ({{ ucfirst((string) $role) }})</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="text-red-600 hover:underline">Log out</button>
            </form>
        </div>
    </div>
</nav>
