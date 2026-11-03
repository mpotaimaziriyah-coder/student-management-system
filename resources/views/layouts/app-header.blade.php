<input type="checkbox" id="sidebar-toggle" class="peer hidden">
    <label for="sidebar-toggle" class="fixed inset-0 bg-slate-900/30 z-30 hidden peer-checked:block sm:!hidden"></label>
    <!-- End: Sidebar toggle -->
    <!-- Start: Header -->
    <header class="fixed top-0 z-50 w-full bg-white border-b border-slate-200">
        <div class="px-2 py-2 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <label for="sidebar-toggle" class="inline-flex items-center p-2 text-slate-500 rounded-lg sm:hidden hover:bg-slate-100 cursor-pointer">
                        <span class="sr-only">Open sidebar</span>
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </label>
                    <a href="//dashboard.html" class="flex items-center ms-2 md:me-8">
                        <img src="{{assest('assests/img/logo.png')}}" alt="MUBS Student Management System" class="h-10 w-10 me-3">
                        <div class="flex flex-col">
                            <span class="font-semibold text-slate-900 text-base">MUBS Student Management System</span>
                            <span class="text-xs text-slate-500">Makerere University Business School</span>
                        </div>
                    </a>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Start: Header notifications -->
                    <details class="menu-dropdown relative">
                        <summary class="p-2 text-slate-500 rounded-lg hover:text-slate-900 hover:bg-slate-100 cursor-pointer relative list-none">
                            <i data-lucide="bell" class="w-5 h-5"></i>
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-[#d97706] rounded-full"></span>
                        </summary>
                        <div class="absolute right-0 mt-2 w-80 bg-white border border-slate-200 rounded-lg shadow-lg z-50">
                            <div class="px-4 py-2 border-b border-slate-200 flex justify-between items-center bg-slate-50">
                                <p class="text-sm font-medium">Notifications</p>
                                <a href="//notifications.html" class="text-xs text-[#2563eb]">View all</a>
                            </div>
                            <a href="///registrations/show.html" class="block px-4 py-3 hover:bg-slate-50 border-b border-slate-200">
                                <p class="text-sm">Registration approved for <span class="text-[#d97706]">ICT 2205</span></p>
                                <p class="text-xs text-slate-500 mt-1">Web Application Development &middot; 12 min ago</p>
                            </a>
                            <a href="///registrations/index.html" class="block px-4 py-3 hover:bg-slate-50">
                                <p class="text-sm">3 new registrations to review</p>
                                <p class="text-xs text-slate-500 mt-1">Semester 1, 2026/2027 &middot; 1 hr ago</p>
                            </a>
                        </div>
                    </details>