<header class="sticky top-0 z-50 w-full bg-white border-b border-slate-200">
    <div class="px-4 py-3 lg:px-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="MUBS" class="h-10 w-10">
                    <div>
                        <span class="font-semibold text-slate-900 text-base">MUBS Student Management System</span>
                        <span class="block text-xs text-slate-500">Makerere University Business School</span>
                    </div>
                </a>
            </div>
            <div class="flex items-center gap-4">
                <details class="relative">
                    <summary class="list-none cursor-pointer p-2 text-slate-500 rounded-lg hover:bg-slate-100 relative">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-amber-500 rounded-full"></span>
                    </summary>
                    <div class="absolute right-0 mt-2 w-80 bg-white border border-slate-200 rounded-lg shadow-lg z-50">
                        <div class="px-4 py-2 border-b border-slate-200 bg-slate-50">
                            <p class="text-sm font-medium">Notifications</p>
                        </div>
                        <div class="px-4 py-3 border-b border-slate-100 hover:bg-slate-50">
                            <p class="text-sm">Registration approved for ICT 2205</p>
                            <p class="text-xs text-slate-500 mt-1">12 min ago</p>
                        </div>
                        <div class="px-4 py-3 hover:bg-slate-50">
                            <p class="text-sm">3 new registrations to review</p>
                            <p class="text-xs text-slate-500 mt-1">1 hr ago</p>
                        </div>
                    </div>
                </details>
                <span class="text-sm text-slate-600">{{ auth()->user()?->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:underline">Log out</button>
                </form>
            </div>
        </div>
    </div>
</header>
