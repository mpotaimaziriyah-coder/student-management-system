@extends('layouts.app')
@section('title', 'Lecturer Dashboard')
@section('content')


            <!-- Start: Page heading -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold">Good afternoon,{{auth()->user()->name}}</h1>
                <p class="text-slate-500 mt-1">You are teaching 2 courses this semester with 32 registered students between them.</p>
            </div>
            <!-- End: Page heading -->

            <!-- Start: Stats cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="book-open" class="w-5 h-5 text-[#2563eb]"></i></div><div><p class="text-2xl font-bold">2</p><p class="text-sm text-slate-500">My courses</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center"><i data-lucide="users" class="w-5 h-5 text-[#d97706]"></i></div><div><p class="text-2xl font-bold">32</p><p class="text-sm text-slate-500">Registered students</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center"><i data-lucide="clock" class="w-5 h-5 text-[#d97706]"></i></div><div><p class="text-2xl font-bold">2</p><p class="text-sm text-slate-500">Pending approvals</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center"><i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600"></i></div><div><p class="text-2xl font-bold">30</p><p class="text-sm text-slate-500">Confirmed registrations</p></div></div></div>
            </div>
            <!-- End: Stats cards -->

            <!-- Start: Queue panels -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div id="courses" class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">My assigned courses</h2>
                        <span class="text-xs text-slate-500">Semester 1, 2026/2027</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-slate-200">
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Code</th>
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Title</th>
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Sem</th>
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Credits</th>
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Students</th>
                                    <th class="py-2 text-center text-xs font-semibold text-slate-500">Open</th>
                                </tr>
                            </thead>
                            <tbody><tr class="border-b border-slate-200 hover:bg-slate-50"><td class="py-3 px-4 text-sm font-medium">ICT 2103</td><td class="py-3 px-4 text-sm">Data Structures and Algorithms</td><td class="py-3 px-4 text-sm text-slate-500">1</td><td class="py-3 px-4 text-sm text-slate-500">3</td><td class="py-3 px-4 text-sm text-slate-500">14</td><td class="py-3 px-4 text-center"><a href="#students" class="text-[#2563eb]" title="View registered students"><i data-lucide="users" class="w-4 h-4 inline"></i></a></td></tr><tr class="border-b border-slate-200 hover:bg-slate-50"><td class="py-3 px-4 text-sm font-medium">ICT 2205</td><td class="py-3 px-4 text-sm">Web Application Development</td><td class="py-3 px-4 text-sm text-slate-500">1</td><td class="py-3 px-4 text-sm text-slate-500">3</td><td class="py-3 px-4 text-sm text-slate-500">18</td><td class="py-3 px-4 text-center"><a href="#students" class="text-[#2563eb]" title="View registered students"><i data-lucide="users" class="w-4 h-4 inline"></i></a></td></tr></tbody>
                        </table>
                    </div>
                </div>
                <div id="students" class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Registered students</h2>
                        <span class="text-xs text-[#d97706]">2 awaiting approval</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-slate-200">
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Reg. number</th>
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Name</th>
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Course</th>
                                    <th class="py-2 text-left text-xs font-semibold text-slate-500">Status</th>
                                    <th class="py-2 text-center text-xs font-semibold text-slate-500">Open</th>
                                </tr>
                            </thead>
                            <tbody><tr class="border-b border-slate-200 hover:bg-slate-50"><td class="py-3 px-4 text-sm text-slate-500">STU/2024/001</td><td class="py-3 px-4 text-sm font-medium">Aisha Namuli</td><td class="py-3 px-4 text-sm text-slate-500">ICT 2103</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg--blue-50 text-[#2563eb]">Registered</span></td><td class="py-3 px-4 text-center"><a href="{{ route('lecturer.courses.index') }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td></tr><tr class="border-b border-slate-200 hover:bg-slate-50"><td class="py-3 px-4 text-sm text-slate-500">STU/2024/001</td><td class="py-3 px-4 text-sm font-medium">Aisha Namuli</td><td class="py-3 px-4 text-sm text-slate-500">ICT 2205</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg--emerald-50 text-emerald-700">Approved</span></td><td class="py-3 px-4 text-center"><a href="{{ route('lecturer.courses.index') }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td></tr><tr class="border-b border-slate-200 hover:bg-slate-50"><td class="py-3 px-4 text-sm text-slate-500">STU/2024/002</td><td class="py-3 px-4 text-sm font-medium">Brian Ssemakula</td><td class="py-3 px-4 text-sm text-slate-500">ICT 2205</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg--blue-50 text-[#2563eb]">Registered</span></td><td class="py-3 px-4 text-center"><a href="{{ route('lecturer.courses.index') }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td></tr><tr class="border-b border-slate-200 hover:bg-slate-50"><td class="py-3 px-4 text-sm text-slate-500">STU/2025/021</td><td class="py-3 px-4 text-sm font-medium">Martha Achieng</td><td class="py-3 px-4 text-sm text-slate-500">ICT 2205</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg--amber-50 text-[#d97706]">Pending</span></td><td class="py-3 px-4 text-center"><a href="{{ route('lecturer.courses.index') }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td></tr></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End: Queue panels -->
@endsection