@extends('layouts.main')
@section('content')


    <div class="flex-1 flex items-center justify-center p-4 bg-white">
        <div class="w-full max-w-md">
            <div class="flex justify-center mb-8">
                <a href="{{ route('index') }}" class="inline-flex flex-col items-center gap-3">
                    <img src="assets/img/logo.png" alt="MUBS Student Management System" class="h-16 w-16">
                    <span class="text-sm font-semibold text-slate-900">MUBS Student Management System</span>
                    <span class="text-xs text-slate-500">Makerere University Business School</span>
                </a>
            </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                <div class="mb-6">
                    <h1 class="text-xl font-bold">Forgot your password?</h1>
                    <p class="mt-1 text-sm text-slate-500">Enter the email on your account and the registry will send you a reset link.</p>
                </div>

                <form action="login.html" method="post" class="space-y-5"></form>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="mail" class="h-5 w-5"></i>
                            </div>
                            <input type="email" id="email" name="email" required autofocus placeholder="you@mubs.ac.ug"
                                class="block w-full pl-10 pr-3 py-3 rounded-xl bg-white border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb]">
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Send reset link</button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-500">
                    Remembered it?
                    <a href="login.html" class="text-[#2563eb] hover:text-[#1d4ed8]">Back to sign in</a>
                    <a href="{{ route('password.reset') }}"class="block text-center text-blue-600 mt-4"> Continue to Reset Password</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Start: Footer -->
    @include('layouts.footer')
    <!-- End: Footer -->

 @endsection
