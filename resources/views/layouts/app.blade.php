<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — MUBS Student Management</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <input type="checkbox" id="sidebar-toggle" class="peer hidden">

    <!-- Top bar -->
    <header class="fixed top-0 left-0 right-0 z-50 h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4">
        <div class="flex items-center gap-3">
            <label for="sidebar-toggle" class="sm:hidden cursor-pointer p-2">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </label>
            <img src="{{ asset('assets/img/logo.png') }}" alt="MUBS" class="h-9 w-9">
            <div>
                <p class="text-sm font-semibold leading-tight">MUBS Student Management System</p>
                <p class="text-xs text-slate-500 leading-tight">Makerere University Business School</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm px-3 py-2 rounded-lg border border-slate-200 hover:bg-slate-50">Log out</button>
        </form>
    </header>

    @include('layouts.app-sidebar')

    <main class="sm:ml-64 pt-16">
        <div class="p-6">
            @yield('content')
        </div>
    </main>

    <script>lucide.createIcons();</script>
</body>
</html>