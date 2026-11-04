@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')


            <!-- Start: Page heading -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold">Good afternoon, Aisha</h1>
                <p class="text-slate-500 mt-1">You are registered for 3 courses this semester (9 credits). Registration closes on 14 Nov 2026.</p>
            </div>
            <!-- End: Page heading -->

            <div class="mb-6 flex items-start gap-3 bg-emerald-50 border border-emerald-200 rounded-xl p-4"><i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 mt-0.5 shrink-0"></i><div><p class="text-sm font-medium text-emerald-800">Registration successful.</p><p class="text-xs text-emerald-700 mt-1">You have been registered for <span class="font-medium">ICT 2205 &mdash; Web Application Development</span>. Your lecturer will confirm it before the semester starts.</p></div></div>

            <!-- Start: Stats cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="clipboard-check" class="w-5 h-5 text-[#2563eb]"></i></div><div><p class="text-2xl font-bold">3</p><p class="text-sm text-slate-500">My registrations</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center"><i data-lucide="book-open" class="w-5 h-5 text-[#d97706]"></i></div><div><p class="text-2xl font-bold">9</p><p class="text-sm text-slate-500">Credits this semester</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="library" class="w-5 h-5 text-[#2563eb]"></i></div><div><p class="text-2xl font-bold">5</p><p class="text-sm text-slate-500">Available courses</p></div></div></div> <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center"><i data-lucide="clock" class="w-5 h-5 text-[#d97706]"></i></div><div><p class="text-2xl font-bold">1</p><p class="text-sm text-slate-500">Pending approval</p></div></div></div>
            </div>
            <!-- End: Stats cards -->

            <!-- Start: My registrations -->
            <div id="registrations" class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-4">
                <h2 class="text-lg font-semibold">My registrations</h2>
                <a href="{{ route('student.courses.index') }}" class="inline-flex items-center px-4 py-2 bg-[#2563eb] rounded-lg text-sm font-medium text-white hover:bg-[#1d4ed8]"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>Register for a course</a>
            </div>
            <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[720px]">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50">
                                <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Reg ID</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Course</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Lecturer</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Registered on</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-slate-500">Status</th>
                                <th class="py-3 px-4 text-center text-sm font-semibold text-slate-500">Open</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-slate-50"><td class="py-3 px-4 text-sm text-slate-500">REG-001</td><td class="py-3 px-4 text-sm font-medium">ICT 2103 &mdash; Data Structures and Algorithms</td><td class="py-3 px-4 text-sm text-slate-500">Dr. Daniel Okello</td><td class="py-3 px-4 text-sm text-slate-500">02 Oct 2026</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-blue-50 text-[#2563eb]">Registered</span></td><td class="py-3 px-4 text-center"><a href="{{ route('student.registrations.index') }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td></tr><tr class="hover:bg-slate-50"><td class="py-3 px-4 text-sm text-slate-500">REG-002</td><td class="py-3 px-4 text-sm font-medium">ICT 2205 &mdash; Web Application Development</td><td class="py-3 px-4 text-sm text-slate-500">Dr. Daniel Okello</td><td class="py-3 px-4 text-sm text-slate-500">02 Oct 2026</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">Approved</span></td><td class="py-3 px-4 text-center"><a href="{{ route('student.registrations.index') }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td></tr><tr class="hover:bg-slate-50"><td class="py-3 px-4 text-sm text-slate-500">REG-003</td><td class="py-3 px-4 text-sm font-medium">BBA 2102 &mdash; Principles of Management</td><td class="py-3 px-4 text-sm text-slate-500">Mr. Peter Muwonga</td><td class="py-3 px-4 text-sm text-slate-500">03 Oct 2026</td><td class="py-3 px-4"><span class="text-xs px-2 py-1 rounded-full bg-emerald-50 text-emerald-700">Approved</span></td><td class="py-3 px-4 text-center"><a href="{{ route('student.registrations.index') }}" class="text-[#2563eb]"><i data-lucide="eye" class="w-4 h-4 inline"></i></a></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End: My registrations -->

        @endsection