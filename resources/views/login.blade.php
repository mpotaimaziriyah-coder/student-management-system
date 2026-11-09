@extends('layouts.main')
@section('content')


    <div class="flex-1 flex items-center justify-center p-4 bg-white">
        <div class="w-full max-w-md">
            <div class="flex justify-center mb-8">

                <a href="/" class="inline-flex flex-col items-center gap-3">
                    <img src="assets/img/logo.png" alt="MUBS Student Management System" class="h-16 w-16">
                    <span class="text-sm font-semibold text-slate-900">MUBS Student Management System</span>
                    <span class="text-xs text-slate-500">Makerere University Business School</span>
                </a>
            </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                <div class="mb-6">
                    <h1 class="text-xl font-bold text-slate-900">Sign in</h1>
                    <p class="mt-1 text-sm text-slate-500">Use your MUBS email to register for courses, or sign in as a lecturer or administrator.</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
 
 
 
                  @csrf
 





 
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


                    <div>

                        <label for="password" class="block text-sm font-medium text-slate-600 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="lock" class="h-5 w-5"></i>
                            </div>
                            <input type="password" id="password" name="password" required placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                                class="block w-full pl-10 pr-3 py-3 rounded-xl bg-white border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#2563eb] focus:ring-1 focus:ring-[#2563eb]">

                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-[#2563eb] focus:ring-[#2563eb]">
                            <span class="text-sm text-slate-500">Keep me signed in</span>
                        </label>
                        
                        <a href="{{ route('forgotpassword') }}" class="text-sm text-[#2563eb] hover:text-[#1d4ed8]">Forgot password?</a>
</div>
                        <div class="flex items-center justify-between mt-4">
                      <label class="flex items-center gap-2 cursor-pointer">
            
                       
                 </label>

                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Sign in</button>
                </form>

                <div class="mt-6 pt-6 border-t border-slate-200">
                    <p class="text-xs text-slate-500 mb-3 text-center">Try a demo account</p>
                    <div class="grid grid-cols-3 gap-2">
    @foreach ([['Administrator', 'admin@mubs.ac.ug'], ['Lecturer', 'lecturer@mubs.ac.ug'], ['Student', 'student@mubs.ac.ug']] as [$label, $demoEmail])
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $demoEmail }}">
            <input type="hidden" name="password" value="password">
            <button type="submit" class="w-full text-center text-xs px-2 py-2 rounded-lg border border-slate-200 bg-white hover:border-[#2563eb]">{{ $label }}</button>
        </form>
    @endforeach
</div>
                    <p class="text-[11px] text-slate-400 mt-3 text-center">admin@mubs.ac.ug &middot; lecturer@mubs.ac.ug &middot; student@mubs.ac.ug</p>
                </div>

                <p class="mt-6 text-center text-sm text-slate-500">
                    New student?
                    <a href="{{route('register')}}" class="text-[#2563eb] hover:text-[#1d4ed8]">Create an account</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Start: Footer -->
    @include('layouts.footer')
    <!-- End: Footer -->
@endsection



