@extends('layouts.app')
@section('title', 'Student Dashboard')
@section('content')


            <!-- Start: Page heading -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold">Good afternoon,{{auth()->user()->name}}</h1>
                <p class="text-slate-500 mt-1">Semester 1, 2026/2027 &mdash; registration closes on 14 Nov 2026. 3 registrations are waiting for approval.</p>
            </div>
            <!-- End: Page heading -->

            <!-- Start: Stats cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="graduation-cap" class="w-5 h-5 text-[#2563eb]"></i></div><div><p class="text-2xl font-bold">184</p><p class="text-sm text-slate-500">Students</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center"><i data-lucide="book-open" class="w-5 h-5 text-[#d97706]"></i></div><div><p class="text-2xl font-bold">12</p><p class="text-sm text-slate-500">Courses</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="presentation" class="w-5 h-5 text-[#2563eb]"></i></div><div><p class="text-2xl font-bold">6</p><p class="text-sm text-slate-500">Lecturers</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center"><i data-lucide="clipboard-list" class="w-5 h-5 text-[#d97706]"></i></div><div><p class="text-2xl font-bold">371</p><p class="text-sm text-slate-500">Registrations</p></div></div></div>
            </div>
            <!-- End: Stats cards -->

            <!-- Start: Attention and admin shortcuts -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Recent registrations</h2>
                        <a href="/registrations/index.html" class="text-sm text-[#2563eb]">All registrations</a>
                    </div>
                    <div class="space-y-3">
                        <a href="/registrations/show.html" class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-200"><div><p class="text-sm font-medium">Dennis Okwir &mdash; ECO 2104</p><p class="text-xs text-slate-500 mt-1">STU/2023/014 &middot; Ms. Sarah Nambi &middot; 05 Oct 2026</p></div><span class="text-xs px-2 py-1 rounded-full bg-bg-emerald-50 text-emerald-700">Approved</span></a><a href="/registrations/show.html" class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-200"><div><p class="text-sm font-medium">Martha Achieng &mdash; ICT 2205</p><p class="text-xs text-slate-500 mt-1">STU/2025/021 &middot; Dr. Daniel Okello &middot; 12 Oct 2026</p></div><span class="text-xs px-2 py-1 rounded-full bg-bg-amber-50 text-[#d97706]">Pending</span></a><a href="/registrations/show.html" class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200 hover:border-blue-200"><div><p class="text-sm font-medium">Martha Achieng &mdash; ECO 2104</p><p class="text-xs text-slate-500 mt-1">STU/2025/021 &middot; Ms. Sarah Nambi &middot; 12 Oct 2026</p></div><span class="text-xs px-2 py-1 rounded-full bg-bg-amber-50 text-[#d97706]">Pending</span></a>
                    </div>
                </div>
                <div class="space-y-4">
                    <a href="students/index.html" class="block bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-blue-200">
                        <div class="flex items-center gap-3 mb-2"><i data-lucide="graduation-cap" class="w-5 h-5 text-[#2563eb]"></i><h3 class="font-semibold">Students</h3></div>
                        <p class="text-sm text-slate-500">184 students on the register</p>
                    </a>
                    <a href="courses/index.html" class="block bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-amber-200">
                        <div class="flex items-center gap-3 mb-2"><i data-lucide="book-open" class="w-5 h-5 text-[#d97706]"></i><h3 class="font-semibold">Courses</h3></div>
                        <p class="text-sm text-slate-500">12 courses this semester</p>
                    </a>
                    <a href="lecturers/index.html" class="block bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-blue-200">
                        <div class="flex items-center gap-3 mb-2"><i data-lucide="presentation" class="w-5 h-5 text-[#2563eb]"></i><h3 class="font-semibold">Lecturers</h3></div>
                        <p class="text-sm text-slate-500">6 lecturers with assigned courses</p>
                    </a>
                    <a href="users/index.html" class="block bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:border-amber-200">
                        <div class="flex items-center gap-3 mb-2"><i data-lucide="users" class="w-5 h-5 text-[#d97706]"></i><h3 class="font-semibold">Users &amp; roles</h3></div>
                        <p class="text-sm text-slate-500">191 users across 3 roles</p>
                    </a>
                </div>
            </div>
            <!-- End: Attention and admin shortcuts -->

        @endsection
