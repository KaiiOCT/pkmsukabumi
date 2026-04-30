<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin') | Odeon Kampoeng Naga</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lucaburgio/iconoir@main/css/iconoir.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body
    class="font-sans antialiased bg-[#F8F9FA] dark:bg-[#0A0505] text-brand-text dark:text-white transition-colors duration-300 overflow-hidden flex h-screen">

    <div id="sidebar-backdrop"
        class="fixed inset-0 bg-brand-dark/60 backdrop-blur-sm z-40 hidden lg:hidden opacity-0 transition-opacity duration-300 cursor-pointer">
    </div>

    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-50 w-72 bg-white dark:bg-[#1E1212] border-r border-gray-200 dark:border-white/5 transform -translate-x-full lg:relative lg:translate-x-0 transition-transform duration-300 flex flex-col shadow-xl lg:shadow-none">

        <div class="h-20 flex items-center px-8 border-b border-gray-100 dark:border-white/5 shrink-0">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 no-underline">
                <div class="w-10 h-10 flex items-center justify-center">
                    <img src="{{ asset('assets/logoodeon.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                </div>
                <div>
                    <h2 class="font-bold text-sm text-brand-text dark:text-white leading-tight">Admin Portal</h2>
                    <p class="text-[10px] text-brand-muted dark:text-white/50 uppercase tracking-widest font-bold">
                        Kampoeng Naga</p>
                </div>
            </a>
            <button id="close-sidebar"
                class="lg:hidden ml-auto text-gray-400 hover:text-brand-accent dark:hover:text-brand-gold outline-none border-none bg-transparent cursor-pointer">
                <i class="iconoir-xmark text-2xl"></i>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">

            <p
                class="px-4 text-[10px] font-extrabold text-gray-400 dark:text-white/40 uppercase tracking-widest mb-2 mt-4">
                Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-brand-accent text-white shadow-md shadow-brand-accent/20' : 'text-gray-600 dark:text-white/70 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                <i class="iconoir-app-window text-lg"></i> Overview
            </a>

            <a href="{{ route('home') }}" target="_blank"
                class="sm:hidden flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 text-brand-accent dark:text-brand-gold hover:bg-brand-accent/10 dark:hover:bg-brand-gold/10 mt-2">
                <i class="iconoir-internet text-lg"></i> Lihat Website
            </a>

            <p
                class="px-4 text-[10px] font-extrabold text-gray-400 dark:text-white/40 uppercase tracking-widest mb-2 mt-6">
                Modul Konten</p>

            <a href="{{ route('admin.bookings.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.bookings.*') ? 'bg-brand-accent text-white shadow-md shadow-brand-accent/20' : 'text-gray-600 dark:text-white/70 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                <i class="iconoir-shopping-bag text-lg"></i>
                Manajemen Pesanan
                <span
                    class="ml-auto text-[10px] font-bold px-2 py-0.5 rounded-full {{ request()->routeIs('admin.bookings.*') ? 'bg-white text-brand-accent dark:bg-brand-dark dark:text-brand-gold shadow-sm' : 'bg-rose-500 text-white' }}">
                    3
                </span>
            </a>

            <a href="{{ route('admin.news.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.news.*') ? 'bg-brand-accent text-white shadow-md shadow-brand-accent/20' : 'text-gray-600 dark:text-white/70 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                <i class="iconoir-journal text-lg"></i> Berita & Acara
            </a>

            <a href="{{ route('admin.umkm.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.umkm.*') ? 'bg-brand-accent text-white shadow-md shadow-brand-accent/20' : 'text-gray-600 dark:text-white/70 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                <i class="iconoir-shop text-lg"></i> UMKM & Kuliner
            </a>

            <a href="{{ route('admin.packages.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.packages.*') ? 'bg-brand-accent text-white shadow-md shadow-brand-accent/20' : 'text-gray-600 dark:text-white/70 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                <i class="iconoir-sparks text-lg"></i> Paket Wisata
            </a>

            <a href="{{ route('admin.attractions.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.attractions.*') ? 'bg-brand-accent text-white shadow-md shadow-brand-accent/20' : 'text-gray-600 dark:text-white/70 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                <i class="iconoir-map-pin text-lg"></i> Atraksi & Destinasi
            </a>

            <a href="{{ route('admin.organizations.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.organizations.*') ? 'bg-brand-accent text-white shadow-md shadow-brand-accent/20' : 'text-gray-600 dark:text-white/70 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                <i class="iconoir-group text-lg"></i> Organisasi & Komunitas
            </a>

            <p
                class="px-4 text-[10px] font-extrabold text-gray-400 dark:text-white/40 uppercase tracking-widest mb-2 mt-6">
                Pengaturan</p>

            <a href="{{ route('admin.settings.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-brand-accent text-white shadow-md shadow-brand-accent/20' : 'text-gray-600 dark:text-white/70 hover:bg-gray-50 dark:hover:bg-white/5 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                <i class="iconoir-settings text-lg"></i> Pengaturan Web
            </a>
        </div>

        <div class="p-4 border-t border-gray-100 dark:border-white/5 shrink-0">
            <a href="{{ route('admin.profile.edit') }}"
                class="group block bg-gray-50 dark:bg-white/5 hover:bg-brand-accent/5 dark:hover:bg-brand-gold/10 border border-transparent hover:border-brand-accent/20 dark:hover:border-brand-gold/20 rounded-xl p-4 transition-all duration-300 no-underline cursor-pointer">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark flex items-center justify-center font-bold font-serif shrink-0 shadow-sm">
                        {{ substr(Auth::user()->name ?? 'Admin', 0, 1) }}
                    </div>
                    <div class="overflow-hidden flex-1">
                        <p
                            class="text-sm font-bold text-brand-text dark:text-white truncate group-hover:text-brand-accent dark:group-hover:text-brand-gold transition-colors">
                            {{ Auth::user()->name ?? 'Administrator' }}
                        </p>
                        <p class="text-[10px] text-brand-muted dark:text-white/50 truncate">Super Admin</p>
                    </div>
                    <i
                        class="iconoir-nav-arrow-right text-gray-400 dark:text-white/40 group-hover:text-brand-accent dark:group-hover:text-brand-gold group-hover:translate-x-1 transition-all"></i>
                </div>
            </a>
        </div>
    </aside>


    <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">

        <header
            class="h-20 bg-white/80 dark:bg-[#1E1212]/80 backdrop-blur-md border-b border-gray-200 dark:border-white/5 flex items-center justify-between px-5 sm:px-8 shrink-0 z-30">

            <div class="flex items-center gap-4">
                <button id="open-sidebar"
                    class="lg:hidden w-10 h-10 rounded-full flex items-center justify-center text-gray-600 dark:text-white/70 hover:bg-gray-100 dark:hover:bg-white/10 transition-colors outline-none border-none cursor-pointer bg-transparent">
                    <i class="iconoir-menu-scale text-2xl"></i>
                </button>

                <div class="flex flex-col justify-center min-w-0">
                    <h1 class="text-base sm:text-xl font-bold text-brand-text dark:text-white truncate">
                        @yield('title', 'Dashboard')
                    </h1>
                    <p class="hidden sm:block text-xs text-brand-muted dark:text-white/50 truncate">
                        @yield('subtitle', 'Selamat datang kembali di panel admin.')
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 sm:gap-4">

                <a href="{{ route('home') }}" target="_blank"
                    class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-full bg-brand-accent/10 dark:bg-brand-gold/10 text-brand-accent dark:text-brand-gold hover:bg-brand-accent hover:text-white dark:hover:bg-brand-gold dark:hover:text-brand-dark transition-all text-xs font-bold no-underline">
                    <i class="iconoir-internet"></i> Lihat Web
                </a>

                <div class="w-[1px] h-6 bg-gray-200 dark:bg-white/10 hidden sm:block mx-1"></div>

                <button id="theme-toggle"
                    class="w-10 h-10 rounded-full flex items-center justify-center text-gray-500 dark:text-white/70 hover:bg-gray-100 dark:hover:bg-white/10 transition-colors outline-none border-none bg-transparent cursor-pointer">
                    <i class="iconoir-sun-light hidden dark:block text-xl"></i>
                    <i class="iconoir-half-moon block dark:hidden text-xl"></i>
                </button>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit"
                        class="w-10 h-10 rounded-full flex items-center justify-center text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-500/10 transition-colors outline-none border-none bg-transparent cursor-pointer"
                        title="Keluar">
                        <i class="iconoir-log-out text-xl"></i>
                    </button>
                </form>

            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-5 sm:p-8 custom-scrollbar">
            <div class="max-w-7xl mx-auto pb-10">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggleBtn = document.getElementById('theme-toggle');
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', () => {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                });
            }

            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            const openBtn = document.getElementById('open-sidebar');
            const closeBtn = document.getElementById('close-sidebar');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');

                if (backdrop.classList.contains('hidden')) {
                    backdrop.classList.remove('hidden');
                    setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
                } else {
                    backdrop.classList.add('opacity-0');
                    setTimeout(() => backdrop.classList.add('hidden'), 300);
                }
            }

            if (openBtn) openBtn.addEventListener('click', toggleSidebar);
            if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
            if (backdrop) backdrop.addEventListener('click', toggleSidebar);
        });
    </script>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(139, 26, 26, 0.2);
            border-radius: 10px;
        }

        .dark .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(139, 26, 26, 0.4);
        }

        .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 175, 55, 0.3);
        }
    </style>
</body>

</html>
