@extends('layouts.main')
@section('content')
    <!-- Start: Header -->
   @include('layouts.header')
    
    <!-- End: Header -->

    <!-- Start: Hero -->
    <section class="relative pt-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center py-16 lg:py-20">
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 bg-white mb-6">
                        <i data-lucide="calendar-clock" class="w-4 h-4 text-[#d97706]"></i>
                        <span class="text-sm text-slate-500">Semester 1, 2026/2027 &mdash; registration closes 14 Nov</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-5 leading-tight">
                        Your semester,<br>
                        <span class="text-gradient">managed in one place.</span>
                    </h1>
                    <p class="text-sm sm:text-base text-slate-500 max-w-xl mx-auto lg:mx-0 mb-6 leading-relaxed">
                        Browse the courses open this semester, register with a click, and follow your registration until your lecturer approves it. All linked to your MUBS student record.
                    </p>
                    <div class="grid gap-2 text-left max-w-xl mx-auto lg:mx-0 mb-8">
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#d97706] mt-0.5 shrink-0"></i>
                            <span>Register for courses from your phone in under a minute.</span>
                        </div>
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#d97706] mt-0.5 shrink-0"></i>
                            <span>See your lecturer and the credits for every course.</span>
                        </div>
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-[#d97706] mt-0.5 shrink-0"></i>
                            <span>Duplicate registrations are blocked automatically.</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('register') }}" class="group flex items-center gap-2 px-8 py-4 bg-[#2563eb] text-white rounded-xl font-semibold text-sm hover:bg-[#1d4ed8] glow-blue w-full sm:w-auto justify-center">
                            Create student account
                            <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="login.html" class="flex items-center justify-center gap-2 px-8 py-4 border border-slate-200 bg-white rounded-xl font-semibold text-sm text-slate-900 hover:border-[#2563eb]/40 w-full sm:w-auto">
                            I already have an account
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 shadow-xl">
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-[#d97706] font-semibold">This week</p>
                                <p class="text-lg font-semibold mt-1">Registrations coming in</p>
                            </div>
                            <span class="text-xs px-2.5 py-1 rounded-full bg-blue-50 text-[#2563eb] border border-blue-100">3 pending</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white border border-slate-200">
                                <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="book-open" class="w-4 h-4 text-[#2563eb]"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium truncate">Aisha Namuli &mdash; ICT 2205</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Web Application Development</p>
                                </div>
                                <span class="text-[11px] px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 shrink-0">Approved</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white border border-slate-200">
                                <div class="w-9 h-9 rounded-lg bg-amber-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="clock" class="w-4 h-4 text-[#d97706]"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium truncate">Martha Achieng &mdash; ICT 2205</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Waiting for the lecturer</p>
                                </div>
                                <span class="text-[11px] px-2 py-1 rounded-full bg-amber-50 text-[#d97706] shrink-0">Pending</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white border border-slate-200">
                                <div class="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium truncate">Dennis Okwir &mdash; ECO 2104</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Microeconomics</p>
                                </div>
                                <span class="text-[11px] px-2 py-1 rounded-full bg-blue-50 text-[#2563eb] shrink-0">Registered</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start: Hero stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 pb-16 border-t border-slate-200 pt-8">
                <div class="flex flex-col sm:flex-row items-center gap-4 p-5 rounded-xl bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0"><i data-lucide="graduation-cap" class="w-6 h-6 text-[#2563eb]"></i></div>
                    <div class="text-center sm:text-left"><div class="text-xl font-bold text-slate-900 mb-1">184 students</div><div class="text-sm text-slate-500">On the register</div></div>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4 p-5 rounded-xl bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center shrink-0"><i data-lucide="book-open" class="w-6 h-6 text-[#d97706]"></i></div>
                    <div class="text-center sm:text-left"><div class="text-xl font-bold text-slate-900 mb-1">12 courses</div><div class="text-sm text-slate-500">Open this semester</div></div>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4 p-5 rounded-xl bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0"><i data-lucide="presentation" class="w-6 h-6 text-[#2563eb]"></i></div>
                    <div class="text-center sm:text-left"><div class="text-xl font-bold text-slate-900 mb-1">6 lecturers</div><div class="text-sm text-slate-500">With assigned courses</div></div>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-4 p-5 rounded-xl bg-white border border-slate-200">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center shrink-0"><i data-lucide="clipboard-list" class="w-6 h-6 text-[#d97706]"></i></div>
                    <div class="text-center sm:text-left"><div class="text-xl font-bold text-slate-900 mb-1">371 registrations</div><div class="text-sm text-slate-500">Recorded this year</div></div>
                </div>
            </div>
            <!-- End: Hero stats -->
        </div>
    </section>
    <!-- End: Hero -->

    <!-- Start: How it works -->
    <section id="how-it-works" class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#d97706] mb-3">How it works</p>
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">Register in four steps</h2>
                <p class="text-sm text-slate-500">No queues at the registry desk and no paper forms.</p>
            </div>
            <ol class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <li class="p-6 rounded-xl bg-white border border-slate-200">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#2563eb]">Step 01</span>
                    <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center my-4"><i data-lucide="log-in" class="w-6 h-6 text-[#2563eb]"></i></div>
                    <h3 class="font-bold mb-2">Sign in</h3>
                    <p class="text-sm text-slate-500">Log in with your MUBS email. New students create an account with their registration number.</p>
                </li>
                <li class="p-6 rounded-xl bg-white border border-slate-200">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#d97706]">Step 02</span>
                    <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center my-4"><i data-lucide="search" class="w-6 h-6 text-[#d97706]"></i></div>
                    <h3 class="font-bold mb-2">Browse courses</h3>
                    <p class="text-sm text-slate-500">See every course open this semester with its code, credits, and lecturer.</p>
                </li>
                <li class="p-6 rounded-xl bg-white border border-slate-200">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#2563eb]">Step 03</span>
                    <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center my-4"><i data-lucide="clipboard-check" class="w-6 h-6 text-[#2563eb]"></i></div>
                    <h3 class="font-bold mb-2">Register</h3>
                    <p class="text-sm text-slate-500">One click registers you. The system refuses a second registration for the same course.</p>
                </li>
                <li class="p-6 rounded-xl bg-white border border-slate-200">
                    <span class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#d97706]">Step 04</span>
                    <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center my-4"><i data-lucide="check-circle-2" class="w-6 h-6 text-[#d97706]"></i></div>
                    <h3 class="font-bold mb-2">Get approved</h3>
                    <p class="text-sm text-slate-500">Your lecturer confirms the registration and you get a notification.</p>
                </li>
            </ol>
        </div>
    </section>
    <!-- End: How it works -->

    <!-- Start: Why use the system -->
    <section class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-[#d97706] font-semibold text-sm uppercase tracking-wider">Why use the system</span>
                    <h2 class="text-2xl sm:text-3xl font-bold mt-3 mb-6">Stop carrying paper forms between the registry and the faculty</h2>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed">
                        Course registration should not depend on finding the registry open. The student picks the courses, the lecturer sees who signed up, and the administrator keeps one record that everyone reads from.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3"><i data-lucide="eye" class="w-5 h-5 text-[#2563eb] shrink-0"></i><span>Follow your own registration from submitted to approved</span></div>
                        <div class="flex items-center gap-3"><i data-lucide="shield-check" class="w-5 h-5 text-[#2563eb] shrink-0"></i><span>Students only ever see their own records</span></div>
                        <div class="flex items-center gap-3"><i data-lucide="copy-x" class="w-5 h-5 text-[#2563eb] shrink-0"></i><span>Duplicate registrations are rejected by the database</span></div>
                        <div class="flex items-center gap-3"><i data-lucide="history" class="w-5 h-5 text-[#2563eb] shrink-0"></i><span>Every change is kept with who did it and when</span></div>
                    </div>
                </div>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="p-6 rounded-xl bg-white border border-slate-200"><div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center mb-4"><i data-lucide="graduation-cap" class="w-6 h-6 text-[#2563eb]"></i></div><h3 class="font-bold mb-2">One student record</h3><p class="text-sm text-slate-500">Registration number, programme, year, and contacts in one place.</p></div>
                    <div class="p-6 rounded-xl bg-white border border-slate-200"><div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center mb-4"><i data-lucide="book-open" class="w-6 h-6 text-[#d97706]"></i></div><h3 class="font-bold mb-2">Courses with lecturers</h3><p class="text-sm text-slate-500">Every course shows its code, credits, and the lecturer who teaches it.</p></div>
                    <div class="p-6 rounded-xl bg-white border border-slate-200"><div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center mb-4"><i data-lucide="users" class="w-6 h-6 text-[#2563eb]"></i></div><h3 class="font-bold mb-2">Lecturers see their classes</h3><p class="text-sm text-slate-500">A lecturer opens their dashboard and sees exactly who registered for their courses.</p></div>
                    <div class="p-6 rounded-xl bg-white border border-slate-200"><div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center mb-4"><i data-lucide="shield" class="w-6 h-6 text-[#d97706]"></i></div><h3 class="font-bold mb-2">Roles decide access</h3><p class="text-sm text-slate-500">Administrator, lecturer, and student roles control who can do what.</p></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Why use the system -->

    <!-- Start: Modules -->
    <section id="modules" class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#2563eb] mb-3">Modules</p>
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">What the system manages</h2>
                <p class="text-sm text-slate-500">Five modules, one relational database behind them.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center"><div class="w-12 h-12 mx-auto rounded-lg bg-blue-50 flex items-center justify-center mb-3"><i data-lucide="graduation-cap" class="w-6 h-6 text-[#2563eb]"></i></div><h3 class="font-semibold mb-1">Students</h3><p class="text-xs text-slate-500">Records, programmes, and years of study</p></div>
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center"><div class="w-12 h-12 mx-auto rounded-lg bg-amber-50 flex items-center justify-center mb-3"><i data-lucide="book-open" class="w-6 h-6 text-[#d97706]"></i></div><h3 class="font-semibold mb-1">Courses</h3><p class="text-xs text-slate-500">Codes, credits, semesters, and lecturers</p></div>
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center"><div class="w-12 h-12 mx-auto rounded-lg bg-blue-50 flex items-center justify-center mb-3"><i data-lucide="presentation" class="w-6 h-6 text-[#2563eb]"></i></div><h3 class="font-semibold mb-1">Lecturers</h3><p class="text-xs text-slate-500">Staff records and assigned courses</p></div>
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center"><div class="w-12 h-12 mx-auto rounded-lg bg-amber-50 flex items-center justify-center mb-3"><i data-lucide="clipboard-check" class="w-6 h-6 text-[#d97706]"></i></div><h3 class="font-semibold mb-1">Registrations</h3><p class="text-xs text-slate-500">The student&ndash;course link and its status</p></div>
                <div class="p-5 rounded-xl bg-white border border-slate-200 text-center sm:col-span-2 lg:col-span-1"><div class="w-12 h-12 mx-auto rounded-lg bg-blue-50 flex items-center justify-center mb-3"><i data-lucide="users" class="w-6 h-6 text-[#2563eb]"></i></div><h3 class="font-semibold mb-1">Users &amp; roles</h3><p class="text-xs text-slate-500">Logins and what each role may access</p></div>
            </div>
        </div>
    </section>
    <!-- End: Modules -->

    <!-- Start: Who can use it -->
    <section id="who" class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#d97706] mb-3">Accounts</p>
                <h2 class="text-2xl sm:text-3xl font-bold mb-3">Three roles, three different views</h2>
                <p class="text-sm text-slate-500">Students register themselves. Lecturers and administrators are added by the registry.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="p-6 rounded-xl bg-white border border-slate-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="graduation-cap" class="w-5 h-5 text-[#2563eb]"></i></div>
                        <h3 class="font-bold">Students</h3>
                    </div>
                    <p class="text-sm text-slate-500 mb-4">Study at MUBS and register for courses each semester.</p>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#2563eb] mt-0.5"></i>Browse available courses</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#2563eb] mt-0.5"></i>Register and track your own registrations</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#2563eb] mt-0.5"></i>Keep your profile up to date</li>
                    </ul>
                    <a href="dashboard.html" class="inline-flex items-center gap-2 mt-6 text-sm text-[#2563eb]">Open student home <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>
                <div class="p-6 rounded-xl bg-white border border-slate-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-amber-50 flex items-center justify-center"><i data-lucide="presentation" class="w-5 h-5 text-[#d97706]"></i></div>
                        <h3 class="font-bold">Lecturers</h3>
                    </div>
                    <p class="text-sm text-slate-500 mb-4">Teach the courses assigned to them each semester.</p>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#d97706] mt-0.5"></i>See your assigned courses</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#d97706] mt-0.5"></i>See the students registered for them</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#d97706] mt-0.5"></i>Approve or drop registrations</li>
                    </ul>
                    <a href="lecturer/dashboard.html" class="inline-flex items-center gap-2 mt-6 text-sm text-[#d97706]">Open lecturer home <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>
                <div class="p-6 rounded-xl bg-white border border-slate-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-blue-50 flex items-center justify-center"><i data-lucide="shield" class="w-5 h-5 text-[#2563eb]"></i></div>
                        <h3 class="font-bold">Administrators</h3>
                    </div>
                    <p class="text-sm text-slate-500 mb-4">Keep students, courses, and user access up to date.</p>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#2563eb] mt-0.5"></i>Add and edit students, courses, lecturers</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#2563eb] mt-0.5"></i>See every registration on the system</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-[#2563eb] mt-0.5"></i>Create users and assign roles</li>
                    </ul>
                    <a href="admin/dashboard.html" class="inline-flex items-center gap-2 mt-6 text-sm text-[#2563eb]">Open admin home <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Who can use it -->

    <!-- Start: Call to action -->
    <section class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="rounded-2xl border border-slate-200 bg-white p-10 sm:p-14">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4">Registration closes on 14 Nov 2026</h2>
                <p class="text-slate-500 mb-8 max-w-xl mx-auto">Create your student account with your registration number, or sign in if you already have one.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-[#2563eb] text-white rounded-xl font-semibold text-sm hover:bg-[#1d4ed8] glow-blue">Create account</a>
                    <a href="{{ route('login') }}" class="px-8 py-4 border border-slate-200 bg-white rounded-xl font-semibold text-sm hover:border-[#2563eb]/40">Sign in</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Call to action -->

    <!-- Start: Footer -->
  @include('layouts.footer')
    
    <!-- End: Footer -->

@endsection



