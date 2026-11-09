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
                    <h1 class="text-xl font-bold">Set a new password</h1>
                    <p class="mt-1 text-sm text-slate-500">Choose a password of at least 8 characters and confirm it below.</p>
                </div>

                <form action="{{ route('resetpassword') }}" method="get" class="space-y-5">
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-600 mb-2">New password</label>
                        <input type="password" id="password" name="password" required minlength="8" class="input-field" placeholder="Minimum 8 characters">
                        
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-600 mb-2">Confirm new password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" class="input-field" placeholder="Repeat the password">
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Reset password</button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-500">
                    Trouble with the link?
                    <a href="{{ route('contact') }}" class="text-[#2563eb] hover:text-[#1d4ed8]">Contact the registry</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Start: Footer -->
   @include('layouts.footer')
    <!-- End: Footer -->

    @endsection