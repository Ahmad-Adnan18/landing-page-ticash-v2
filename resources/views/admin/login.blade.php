<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - ticash</title>

    <!-- Favicon dari folder images -->
    <link rel="shortcut icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-800">

    <div class="min-h-screen flex items-center justify-center relative px-4 py-12">

        <!-- Main Login Card -->
        <div class="relative z-10 w-full max-w-md">

            <!-- Logo Section -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo-ticash.png') }}" alt="ticash Logo" class="h-14 w-auto mx-auto mb-4">
                <h2 class="text-3xl font-bold text-slate-900 mb-1">
                    Welcome Back
                </h2>
                <p class="text-slate-500 text-sm font-medium">Sign in to your admin account</p>
            </div>

            <!-- Error Message (Shadcn Style) -->
            @if(session('error'))
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                        <line x1="12" x2="12" y1="9" y2="13"></line>
                        <line x1="12" x2="12.01" y1="17" y2="17"></line>
                    </svg>
                    <div>
                        <p class="text-red-800 font-medium">{{ session('error') }}</p>
                        <p class="text-red-700 text-sm mt-1">Please check your credentials and try again.</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Login Form (Card Style) -->
            <div class="bg-white rounded-lg shadow-md border border-slate-200 p-8">
                <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                    @csrf

                    <!-- Username Field -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-slate-700 mb-2">
                            Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                            <input type="text" id="username" name="username" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Enter your username" required>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-slate-800 font-medium" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full py-3 px-6 rounded-lg text-white font-semibold flex items-center justify-center space-x-2 
                                   bg-blue-600 hover:bg-blue-700 
                                   transition-all duration-200 
                                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
                                   disabled:opacity-70 disabled:cursor-not-allowed">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            <polyline points="10 17 15 12 10 7" />
                            <line x1="15" x2="3" y1="12" y2="12" />
                        </svg>
                        <span>Sign In</span>
                    </button>
                </form>
            </div>

            <!-- Footer Info -->
            <div class="text-center mt-8">
                <p class="text-xs text-slate-500">
                    <span class="font-medium text-slate-700">ticash</span> Admin Portal • Secure Login
                </p>
            </div>
        </div>
    </div>

    <!-- Custom Script for Loading State -->
    <script>
        document.querySelector('form').addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');

            // Simpan teks tombol asli
            const originalContent = button.innerHTML;

            // Set tombol ke mode loading
            button.innerHTML = `
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Signing In...</span>
            `;
            button.disabled = true;

            // Jika terjadi error (misal: validasi gagal), kembalikan tombol ke state semula
            // Ini hanya contoh, idealnya ditangani dengan event yang lebih spesifik
            setTimeout(() => {
                if (button.disabled) { // Cek jika masih loading (misal form tidak terkirim)
                    // button.innerHTML = originalContent;
                    // button.disabled = false;
                }
            }, 3000); // Batas waktu 
        });

    </script>
</body>
</html>
