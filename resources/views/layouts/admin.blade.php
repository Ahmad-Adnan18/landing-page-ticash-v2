<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin ticash</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo-ticash.png') }}" type="image/png">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Custom scrollbar untuk sidebar */
        .sidebar-scroll {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f8fafc;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: #f8fafc;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 2px;
        }

        /* Pastikan tidak ada overflow horizontal */
        .no-horizontal-scroll {
            overflow-x: hidden !important;
        }

        /* Smooth transition untuk sidebar */
        .sidebar-transition {
            transition: width 0.3s ease-in-out;
        }

        /* Prevent flash of unstyled content */
        .sidebar-init {
            width: 70px;
        }

        .sidebar-open {
            width: 256px;
        }

        /* Optimasi untuk sidebar content */
        .sidebar-content {
            will-change: transform;
        }

    </style>
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-800 min-h-screen" x-data="sidebarState()" x-cloak>

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar dengan Hover Effect -->
        <aside class="flex flex-col bg-white border-r border-slate-200 sidebar-transition relative z-30 no-horizontal-scroll sidebar-init" :class="sidebarOpen ? 'sidebar-open' : ''" @mouseenter="sidebarOpen = true" @mouseleave="sidebarOpen = false">
            <!-- Logo Section -->
            <div class="h-16 flex items-center justify-between px-4 border-b border-slate-100 min-w-0">
                <div class="flex items-center gap-3 overflow-hidden whitespace-nowrap min-w-0" x-show="sidebarOpen" x-transition:enter.opacity.duration.300ms>
                    <img src="{{ asset('images/logo-ticash.png') }}" alt="Logo" class="h-8 w-auto flex-shrink-0">
                    <div class="min-w-0 flex-1">
                        <span class="block font-bold text-slate-900 leading-none truncate">ticash</span>
                        <span class="text-[10px] font-medium text-slate-500 uppercase tracking-wider">Admin</span>
                    </div>
                </div>

                <!-- Logo Collapsed -->
                <div x-show="!sidebarOpen" class="w-full flex justify-center flex-shrink-0">
                    <img src="{{ asset('images/logo-ticash.png') }}" alt="Logo" class="h-8 w-auto">
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto py-4 px-2 space-y-1 sidebar-scroll no-horizontal-scroll sidebar-content">

                {{-- Helper component for links to keep code clean --}}
                @php
                $navLinks = [
                ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '
                <path d="M3 3v18h18" />
                <path d="m19 9-5 5-4-4-3 3" />'],
                ['route' => 'admin.leads', 'label' => 'Leads', 'icon' => '
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />'],
                ['route' => 'admin.testimonials', 'label' => 'Testimonials', 'icon' => '
                <path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />
                <path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z" />'],
                ['route' => 'admin.settings', 'label' => 'Settings', 'icon' => '
                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.47a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                <circle cx="12" cy="12" r="3" />'],
                ['route' => 'admin.profile', 'label' => 'Profile', 'icon' => '
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />'],
                ];
                @endphp

                @foreach($navLinks as $link)
                <a href="{{ route($link['route']) }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-md transition-all duration-200 relative no-horizontal-scroll
                   {{ request()->routeIs($link['route']) 
                        ? 'bg-blue-600 text-white shadow-md' 
                        : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' 
                   }}" @click.prevent="navigateTo('{{ route($link['route']) }}')">

                    <!-- Icon (Lucide) -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 transition-colors duration-200 {{ request()->routeIs($link['route']) ? 'text-white' : 'text-slate-500 group-hover:text-slate-900' }}">
                        {!! $link['icon'] !!}
                    </svg>

                    <!-- Label -->
                    <span class="ml-3 whitespace-nowrap transition-all duration-200 overflow-hidden" :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0'">
                        {{ $link['label'] }}
                    </span>

                    <!-- Tooltip for collapsed state -->
                    <div x-show="!sidebarOpen" class="absolute left-14 bg-slate-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none z-50 whitespace-nowrap">
                        {{ $link['label'] }}
                    </div>
                </a>
                @endforeach

            </nav>

            <!-- User Profile / Logout Section -->
            <div class="border-t border-slate-200 p-2 no-horizontal-scroll">
                <div class="relative group">
                    <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-3 py-2 text-sm font-medium text-red-600 rounded-md hover:bg-red-50 transition-colors no-horizontal-scroll">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" x2="9" y1="12" y2="12"></line>
                            </svg>

                            <div class="ml-3 flex-1 text-left overflow-hidden transition-all duration-200" :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0 hidden'">
                                <span class="block truncate">Logout</span>
                            </div>
                        </button>
                    </form>
                </div>

                <!-- Profile Info (Only visible when open) -->
                <div class="mt-2 px-3 py-2 bg-slate-50 rounded-md border border-slate-100 no-horizontal-scroll" x-show="sidebarOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-bold text-xs flex-shrink-0">
                            AU
                        </div>
                        <div class="flex-1 overflow-hidden min-w-0">
                            <p class="text-xs font-semibold text-slate-700 truncate">Admin User</p>
                            <p class="text-[10px] text-slate-500 truncate">{{ now()->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden">

            <!-- Scrollable Content -->
            <div class="flex-1 overflow-y-auto p-6 lg:p-10 no-horizontal-scroll">
                @yield('content')
            </div>
        </main>

    </div>

    <!-- Alpine.js di-load di akhir body -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        // Alpine.js state management - SIMPLIFIED
        function sidebarState() {
            return {
                sidebarOpen: false
                , init() {
                    // Load state dari localStorage setelah Alpine siap
                    this.$nextTick(() => {
                        try {
                            const savedState = localStorage.getItem('sidebarOpen');
                            if (savedState !== null) {
                                this.sidebarOpen = savedState === 'true';
                            }
                        } catch (e) {
                            console.warn('Cannot access localStorage:', e);
                        }
                    });

                    // Auto-save state ke localStorage
                    this.$watch('sidebarOpen', (value) => {
                        try {
                            localStorage.setItem('sidebarOpen', value);
                        } catch (e) {
                            console.warn('Cannot save to localStorage:', e);
                        }
                    });
                }
                , navigateTo(url) {
                    // Navigasi langsung tanpa delay yang lama
                    // Hanya beri waktu minimal untuk sidebar transition
                    setTimeout(() => {
                        window.location.href = url;
                    }, 50); // Reduced dari 150ms ke 50ms
                }
            }
        }

        // Preload resources untuk navigasi yang lebih cepat
        document.addEventListener('DOMContentLoaded', function() {
            // Prefetch halaman admin yang umum
            const adminRoutes = [
                '/admin/dashboard'
                , '/admin/leads'
                , '/admin/testimonials'
                , '/admin/settings'
                , '/admin/profile'
            ];

            // Prefetch links untuk navigasi cepat
            adminRoutes.forEach(route => {
                const link = document.createElement('link');
                link.rel = 'prefetch';
                link.href = route;
                document.head.appendChild(link);
            });

            // Handle logout form
            const logoutForm = document.getElementById('logout-form');
            if (logoutForm) {
                logoutForm.addEventListener('submit', function() {
                    try {
                        localStorage.setItem('sidebarOpen', 'false');
                    } catch (e) {
                        console.warn('Cannot save to localStorage:', e);
                    }
                });
            }

            // Optimasi: Force GPU acceleration untuk smoother animations
            const sidebar = document.querySelector('aside');
            if (sidebar) {
                sidebar.style.transform = 'translateZ(0)';
            }
        });

        // Fallback: Jika Alpine gagal load, tetap tampilkan konten
        window.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const alpineElements = document.querySelectorAll('[x-cloak]');
                alpineElements.forEach(el => {
                    el.style.display = '';
                });
            }, 1000); // Fallback setelah 1 detik
        });

    </script>
</body>
</html>
