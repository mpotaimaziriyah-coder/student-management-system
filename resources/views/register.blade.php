<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account &mdash; MUBS Student Management System</title>
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] } } } };
    </script>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white text-slate-900 font-sans antialiased min-h-screen flex flex-col">
    <div class="flex-1 flex items-center justify-center p-4 bg-white">
        <div class="w-full max-w-md">
            <div class="flex justify-center mb-8">
                <a href="index.html" class="inline-flex flex-col items-center gap-3">
                    <img src="assets/img/logo.png" alt="MUBS Student Management System" class="h-16 w-16">
                    <span class="text-sm font-semibold text-slate-900">MUBS Student Management System</span>
                    <span class="text-xs text-slate-500">Makerere University Business School</span>
                </a>
            </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8">
                <div class="mb-6">
                    <h1 class="text-xl font-bold">Create your student account</h1>
                    <p class="mt-1 text-sm text-slate-500">Open an account to browse courses and register for the semester. Lecturers and administrators are added by the registry.</p>
                    <p class="mt-2 text-xs text-[#d97706]">All fields are required.</p>
                </div>

                <form action="dashboard.html" method="get" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-600 mb-2">Full name <span class="text-[#d97706]">*</span></label>
                        <input type="text" id="name" name="name" required minlength="2" autofocus placeholder="e.g. Martha Achieng" class="input-field">
                    </div>
                    <div>
                        <label for="reg_no" class="block text-sm font-medium text-slate-600 mb-2">Registration number <span class="text-[#d97706]">*</span></label>
                        <input type="text" id="reg_no" name="reg_no" required placeholder="e.g. STU/2025/023" class="input-field">
                    </div>
                    <div>
                        <label for="programme" class="block text-sm font-medium text-slate-600 mb-2">Programme <span class="text-[#d97706]">*</span></label>
                        <select id="programme" name="programme" required class="input-field">
                            <option value="">Select your programme</option>
                            <option>BSc. Computing &amp; Information Technology</option>
                            <option>BBA Finance</option>
                            <option>BBA Marketing</option>
                            <option>BBA Human Resource Management</option>
                            <option>BSc. Economics</option>
                        </select>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-600 mb-2">Email <span class="text-[#d97706]">*</span></label>
                        <input type="email" id="email" name="email" required placeholder="you@mubs.ac.ug" class="input-field">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-600 mb-2">Password <span class="text-[#d97706]">*</span></label>
                        <input type="password" id="password" name="password" required minlength="8" class="input-field">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-600 mb-2">Confirm password <span class="text-[#d97706]">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" class="input-field">
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#2563eb] hover:bg-[#1d4ed8]">Create account</button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-500">
                    Already have an account?
                    <a href="login.html" class="text-[#2563eb] hover:text-[#1d4ed8]">Sign in</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Start: Footer -->
    <footer class="bg-[#1e3a8a]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-3">
                <p class="text-sm text-blue-100">&copy; 2026 <span class="font-semibold text-white">MUBS Student Management System</span>. All rights reserved.</p>
                <p class="text-sm text-blue-200">Registry &middot; Computing &middot; Business Admin &middot; Economics</p>
            </div>
        </div>
    </footer>
    <!-- End: Footer -->

    <script>lucide.createIcons();</script>
</body>
</html>
