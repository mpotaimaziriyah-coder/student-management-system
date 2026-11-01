@extends('layouts.main')

@section('content')


    <!-- Start: Header -->
   @include('layouts.header')
    <!-- End: Header -->

    <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 w-full">
        <div class="max-w-2xl mb-10">
            <h1 class="text-2xl sm:text-3xl font-bold mb-3">Contact the registry</h1>
            <p class="text-sm text-slate-500">Questions about your registration, a course, or your account? The registry office handles student records during working hours.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Start: Contact form -->
            <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                <h2 class="text-lg font-semibold mb-4">Send a message</h2>

                <form action="{{route('contact.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-600 mb-2">Full name</label>
                        <input id="name" name="name" required class="input-field" placeholder="Your full name">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">Email</label>
                        <input type="email" id="email" name="email" required class="input-field" placeholder="you@mubs.ac.ug">
                    </div>
                    <div>
                        <label for="topic" class="block text-sm font-medium text-slate-600 mb-2">Topic</label>
                        <select id="topic" name="topic" class="input-field">
                            <option>Course registration</option>
                            <option>Student record</option>
                            <option>Account or login</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-600 mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required class="input-field" placeholder="How can the registry help?"></textarea>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Send message</button>
                </form>
            </div>

            <!-- End: Contact form -->

            <div class="space-y-4">
                <div class="rounded-2xl border border-slate-200 bg-white p-6">
                    <div class="flex items-center gap-3 mb-3"><i data-lucide="map-pin" class="w-5 h-5 text-[#2563eb]"></i><h3 class="font-semibold">Registry office</h3></div>
                    <p class="text-sm text-slate-500">Main building, first floor<br>Makerere University Business School<br>Nakawa, Kampala</p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-6">
                    <div class="flex items-center gap-3 mb-3"><i data-lucide="phone" class="w-5 h-5 text-[#d97706]"></i><h3 class="font-semibold">Phone &amp; email</h3></div>
                    <p class="text-sm text-slate-500">Registry: 0414 000 210<br>ICT support: 0414 000 211<br><span class="text-[#2563eb]">registry@mubs.ac.ug</span></p>
                </div>
                <div class="rounded-2xl border border-slate-200 bg-white p-6">
                    <div class="flex items-center gap-3 mb-3"><i data-lucide="clock" class="w-5 h-5 text-[#2563eb]"></i><h3 class="font-semibold">Working hours</h3></div>
                    <p class="text-sm text-slate-500">Monday &ndash; Friday, 8:00am &ndash; 5:00pm<br>Closed on public holidays</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Start: Footer -->
   @include('layouts.footer')
    <!-- End: Footer -->

   @endsection