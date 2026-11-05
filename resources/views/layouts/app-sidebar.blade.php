<!-- Start: Sidebar -->
<aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 -translate-x-full peer-checked:translate-x-0 sm:translate-x-0 bg-white border-r border-slate-200 flex flex-col">
    <div class="flex-1 px-3 py-4 overflow-y-auto sidebar-scrollbar">
    @php
    $user = auth()->user();
    $role = $user?->hasRole('admin') ? 'admin'
          : ($user?->hasRole('lecturer') ? 'lecturer'
          : ($user?->hasRole('student') ? 'student' : null));
@endphp

        <div class="space-y-1 mb-5">
            <p class="px-3 text-xs font-semibold text-slate-400 uppercase mb-2">Main</p>

            @if($role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
                <a href="{{ route('admin.students.index') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                    <span class="ms-3">Students</span>
                </a>
                <a href="{{ route('admin.courses.index') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                    <span class="ms-3">Courses</span>
                </a>
                <a href="{{ route('admin.lecturers.index') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="presentation" class="w-5 h-5"></i>
                    <span class="ms-3">Lecturers</span>
                </a>
                <a href="{{ route('admin.registrations.index') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="clipboard-list" class="w-5 h-5"></i>
                    <span class="ms-3">Registrations</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="ms-3">Users & roles</span>
                </a>
            @elseif($role === 'student')
                <a href="{{ route('student.dashboard') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
                <a href="{{ route('student.courses.index') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                    <span class="ms-3">Available courses</span>
                </a>
                <a href="{{ route('student.registrations.index') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="clipboard-check" class="w-5 h-5"></i>
                    <span class="ms-3">My registrations</span>
                </a>
            @elseif($role === 'lecturer')
                <a href="{{ route('lecturer.dashboard') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
                <a href="{{ route('lecturer.courses.index') }}" class="sidebar-item flex items-center p-2 rounded-lg hover:bg-slate-50 text-sm">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                    <span class="ms-3">My courses</span>
                </a>
            @endif
        </div>
    </div>

    <div class="mt-auto border-t border-slate-200 p-4">
        <div class="flex items-center space-x-3 mb-3">
            <div class="w-10 h-10 rounded-full border border-slate-200 flex items-center justify-center bg-white text-sm font-semibold text-[#2563eb]">
                {{ substr(auth()->user()?->name ?? 'U', 0, 2) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-slate-900 truncate">{{ auth()->user()?->name }}</p>
                <p class="text-xs text-slate-500 truncate">{{ auth()->user()?->email }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2 px-3 py-2 bg-white rounded-lg border border-slate-200">
            <span class="text-xs font-semibold text-slate-800 uppercase tracking-wide">{{ ucfirst($role ?? 'user') }}</span>
        </div>
    </div>
</aside>
<!-- End: Sidebar -->
