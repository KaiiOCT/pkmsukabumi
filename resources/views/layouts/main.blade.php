<!DOCTYPE html>
<html lang="id" class="scroll-smooth" id="html-root">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        (function() {
            if (localStorage.getItem('odeon_dark') === 'true') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    <meta name="description" content="@yield('meta_description', 'Odeon Kampoeng Naga — Kawasan wisata budaya pecinan modern yang memadukan warisan sejarah dan denyut ekonomi lokal Kota Sukabumi.')">
    <title>@yield('title', 'Odeon Kampoeng Naga')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lucaburgio/iconoir@main/css/iconoir.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        .nav-utility-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            background: rgba(255, 255, 255, 0.10);
            color: white;
            cursor: pointer;
            transition: all 250ms ease;
            backdrop-filter: blur(8px);
        }

        .nav-utility-btn:hover {
            background: rgba(255, 255, 255, 0.22);
            border-color: rgba(255, 255, 255, 0.45);
            transform: translateY(-1px);
        }

        .nav-scrolled .nav-utility-btn {
            border-color: rgba(139, 26, 26, 0.20);
            background: rgba(139, 26, 26, 0.07);
            color: #1A0F0F;
        }

        .nav-scrolled .nav-utility-btn:hover {
            background: rgba(139, 26, 26, 0.12);
            border-color: rgba(139, 26, 26, 0.30);
        }

        html.dark body {
            background-color: #100808;
            color: #E8DDD5;
        }

        html.dark .bg-brand-primary {
            background-color: #100808;
        }

        html.dark .bg-brand-secondary {
            background-color: #1A1010;
        }

        html.dark .text-brand-text {
            color: #E8DDD5;
        }

        html.dark .text-brand-muted {
            color: #9E8878;
        }

        html.dark .text-brand-subtitle {
            color: #B09080;
        }

        html.dark .card,
        html.dark .bg-white {
            background-color: #1E1212 !important;
            border-color: rgba(201, 168, 76, 0.10) !important;
            color: #E8DDD5;
        }

        html.dark .shadow-card,
        html.dark .shadow-card-hover {
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.40), 0 1px 4px rgba(0, 0, 0, 0.30);
        }

        html.dark #nav-bg {
            background: rgba(16, 8, 8, 0.90) !important;
            border-bottom-color: rgba(201, 168, 76, 0.12) !important;
        }

        html.dark #logo-text-main {
            color: #E8DDD5 !important;
        }

        html.dark #logo-text-sub {
            color: #9E8878 !important;
        }

        html.dark .filter-pill {
            background-color: rgba(30, 18, 18, 0.90) !important;
            color: #C9A84C !important;
            border-color: rgba(201, 168, 76, 0.20) !important;
        }

        html.dark .filter-pill.active {
            background-color: #8B1A1A !important;
            color: white !important;
        }

        html.dark .search-input {
            background-color: rgba(30, 18, 18, 0.90) !important;
            color: #E8DDD5 !important;
            border-color: rgba(201, 168, 76, 0.20) !important;
        }

        html.dark .bg-red-50\/50,
        html.dark .bg-\[\#FAFAF8\] {
            background-color: #180E0E !important;
        }

        html.dark .border-red-50,
        html.dark .border-gray-100 {
            border-color: rgba(201, 168, 76, 0.08) !important;
        }

        html.dark .border-gray-200 {
            border-color: rgba(255, 255, 255, 0.08) !important;
        }

        html.dark .prose {
            color: #B09080;
        }

        html.dark .prose strong {
            color: #E8DDD5;
        }

        html.dark .glass {
            background: rgba(24, 14, 14, 0.80) !important;
            border-color: rgba(255, 255, 255, 0.08) !important;
        }

        .wave-divider {
            fill: #FAF7F2;
            transition: fill 350ms ease;
        }

        html.dark .wave-divider {
            fill: #100808 !important;
        }

        html.dark.nav-scrolled .nav-utility-btn,
        html.dark .nav-scrolled .nav-utility-btn {
            border-color: rgba(201, 168, 76, 0.25) !important;
            background: rgba(201, 168, 76, 0.08) !important;
            color: #C9A84C !important;
        }

        html.dark section.bg-brand-secondary,
        html.dark .bg-brand-secondary {
            background-color: #180E0E !important;
        }

        html.dark .border-brand-accent\/10 {
            border-color: rgba(139, 26, 26, 0.25) !important;
        }

        html.dark .umkm-item {
            background-color: #1E1212 !important;
        }

        html.dark .bg-\\[\\#FAFAF8\\] {
            background-color: #180E0E !important;
        }
        
        html.dark .text-brand-dark,
        html.dark .text-brand-text,
        html.dark .text-gray-900,
        html.dark .text-gray-800,
        html.dark .text-black {
            color: #FAF7F2 !important;
        }

        html.dark .text-brand-subtitle,
        html.dark .text-gray-700,
        html.dark .text-gray-600,
        html.dark .text-gray-500 {
            color: #D4C9BA !important;
        }

        html.dark {
            --color-text: #FAF7F2 !important;
            --color-muted: #D4C9BA !important;
        }

        html.dark .bg-emerald-50\/40 {
            background-color: rgba(6, 78, 59, 0.25) !important;
            border-color: rgba(16, 185, 129, 0.15) !important;
        }

        html.dark .bg-emerald-100 {
            background-color: rgba(6, 78, 59, 0.5) !important;
        }

        html.dark .text-emerald-800 {
            color: #34d399 !important;
        }

        html.dark .text-emerald-600 {
            color: #a7f3d0 !important;
        }

        html.dark .bg-rose-50\/40 {
            background-color: rgba(136, 19, 55, 0.25) !important;
            border-color: rgba(225, 29, 72, 0.15) !important;
        }

        html.dark .bg-rose-100 {
            background-color: rgba(136, 19, 55, 0.5) !important;
        }

        html.dark .text-rose-800 {
            color: #fb7185 !important;
        }

        html.dark .text-rose-600 {
            color: #fecdd3 !important;
        }

        html,
        body,
        main,
        header,
        footer,
        section,
        div,
        a,
        p,
        h1,
        h2,
        h3,
        h4,
        span {
            transition: background-color 350ms ease, color 250ms ease, border-color 250ms ease;
        }

        .goog-te-banner-frame,
        .skiptranslate {
            display: none !important;
        }

        body {
            top: 0 !important;
        }

        .goog-te-gadget {
            font-size: 0;
        }

        .goog-te-gadget select {
            display: none;
        }

        #goog-gt-tt,
        .goog-te-balloon-frame,
        div#goog-gt-tt {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }

        .goog-text-highlight {
            background-color: transparent !important;
            box-shadow: none !important;
            border: none !important;
        }

        font {
            pointer-events: none !important;
            background-color: transparent !important;
            box-shadow: none !important;
        }
    </style>
</head>

<body class="font-sans bg-brand-primary text-brand-text antialiased">

    <header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">

        <div id="nav-bg"
            class="absolute inset-0 transition-all duration-500 opacity-0
                   bg-white/85 backdrop-blur-xl shadow-nav
                   border-b border-brand-accent/8">
        </div>

        <div class="relative max-w-7xl mx-auto px-5 sm:px-8">
            <div class="flex items-center justify-between h-[72px]">

                <a href="{{ route('home') }}" class="no-underline flex items-center gap-3 group"
                    aria-label="Odeon Kampoeng Naga Beranda">
                    <div class="relative w-10 h-10 shrink-0">
                        <div
                            class="absolute inset-0 rounded-xl bg-brand-accent/10 group-hover:bg-brand-accent/15 transition-colors duration-300">
                        </div>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center overflow-hidden p-1.5">
                            <img src="{{ asset('assets/logoodeon.png') }}" alt="Logo Odeon"
                                onerror="this.style.display='none'; this.parentElement.innerHTML='<span class=\'font-serif text-brand-accent font-bold text-xl\'>O</span>'"
                                class="w-full h-full object-contain">
                        </div>
                    </div>
                    <div class="flex flex-col leading-none">
                        <span id="logo-text-main"
                            class="font-serif text-[18px] font-bold tracking-tight transition-colors duration-500 text-white">Odeon</span>
                        <span id="logo-text-sub"
                            class="text-[9px] uppercase tracking-[0.18em] font-bold transition-colors duration-500 text-white/70">Kampoeng
                            Naga</span>
                    </div>
                </a>

                @php
                    $navLinks = [
                        ['route' => 'home', 'pattern' => 'home', 'label' => 'Beranda'],
                        ['route' => 'pages.atraksi', 'pattern' => 'pages.atraksi*', 'label' => 'Atraksi'],
                        [
                            'route' => 'pages.paket-wisata',
                            'pattern' => 'pages.paket-wisata*',
                            'label' => 'Paket Wisata',
                        ],
                        ['route' => 'pages.umkm', 'pattern' => 'pages.umkm*', 'label' => 'UMKM'],
                        ['route' => 'pages.berita', 'pattern' => 'pages.berita*', 'label' => 'Berita'],
                        ['route' => 'pages.profil', 'pattern' => 'pages.profil*', 'label' => 'Profile'],
                    ];
                @endphp

                <nav class="hidden lg:flex items-center gap-1" aria-label="Navigasi utama">
                    @foreach ($navLinks as $link)
                        @php $isActive = request()->routeIs($link['pattern']); @endphp
                         <a href="{{ route($link['route']) }}"
                            class="nav-link px-4 py-2 rounded-lg text-sm font-semibold no-underline transition-all duration-300
                                  {{ $isActive
                                      ? 'nav-link-active nav-text-solid text-brand-accent'
                                      : 'nav-text-transparent text-white/90 hover:text-white hover:bg-white/10' }}"
                            aria-current="{{ $isActive ? 'page' : 'false' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="flex items-center gap-2">

                    <button id="lang-toggle" class="nav-utility-btn group" aria-label="Toggle language"
                        title="Switch Language">
                        <span id="lang-icon"
                            class="text-[11px] font-black uppercase tracking-wide leading-none notranslate">ID</span>
                    </button>

                    <button id="dark-toggle" class="nav-utility-btn group" aria-label="Toggle dark mode"
                        title="Dark Mode">
                        <i id="dark-icon" class="iconoir-half-moon text-base"></i>
                    </button>

                    <button id="mobile-menu-btn"
                        class="lg:hidden flex flex-col justify-center items-center w-10 h-10 rounded-lg
                               bg-white/15 hover:bg-white/25 transition-colors duration-300 cursor-pointer border-none"
                        aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-menu">
                        <span class="hamburger-bar block w-5 h-[1.5px] bg-white transition-all duration-300"
                            id="bar1"></span>
                        <span class="hamburger-bar block w-5 h-[1.5px] bg-white transition-all duration-300 mt-[5px]"
                            id="bar2"></span>
                        <span class="hamburger-bar block w-5 h-[1.5px] bg-white transition-all duration-300 mt-[5px]"
                            id="bar3"></span>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="lg:hidden hidden border-t border-white/10" aria-label="Menu mobile">
            <div class="glass-dark max-w-7xl mx-auto px-5 sm:px-8 py-4 space-y-1">
                @foreach ($navLinks as $link)
                    @php $isActive = request()->routeIs($link['pattern']); @endphp
                    <a href="{{ route($link['route']) }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold no-underline transition-all duration-200
                              {{ $isActive ? 'bg-brand-accent text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
                <div class="pt-3 border-t border-white/10 flex items-center gap-3">
                    <button id="lang-toggle-mobile"
                        class="flex-1 flex items-center justify-center gap-2 py-3 rounded-xl
                               bg-white/10 hover:bg-white/20 text-white text-sm font-bold
                               transition-all duration-200 border-none cursor-pointer">
                        <i class="iconoir-language text-base"></i>
                        <span id="lang-label-mobile" class="notranslate">English</span>
                    </button>
                    <button id="dark-toggle-mobile"
                        class="flex-1 flex items-center justify-center gap-2 py-3 rounded-xl
                               bg-white/10 hover:bg-white/20 text-white text-sm font-bold
                               transition-all duration-200 border-none cursor-pointer">
                        <i id="dark-icon-mobile" class="iconoir-half-moon text-base"></i>
                        <span id="dark-label-mobile">Dark Mode</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <button id="back-to-top"
        class="fixed bottom-6 right-6 sm:bottom-8 sm:right-8 z-50 flex items-center justify-center w-12 h-12
               bg-brand-accent text-white rounded-full shadow-card-hover
               opacity-0 translate-y-10 pointer-events-none
               transition-all duration-500 hover:bg-brand-accent-dark hover:-translate-y-1 border-none cursor-pointer"
        aria-label="Kembali ke atas">
        <i class="iconoir-nav-arrow-up text-xl"></i>
    </button>

    <footer class="bg-brand-dark relative overflow-hidden">

        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");">
        </div>

        <div class="h-[3px] bg-gradient-to-r from-transparent via-brand-gold to-transparent opacity-60"></div>

        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 pt-16 pb-10">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12 mb-12">

                <div class="lg:col-span-1">
                    <a href="{{ route('home') }}" class="no-underline inline-flex items-center gap-3 mb-5 group">
                        <div
                            class="w-10 h-10 rounded-xl overflow-hidden flex items-center justify-center p-1.5 bg-brand-accent/20">
                            <img src="{{ asset('assets/logoodeon.png') }}" alt="Logo Odeon"
                                onerror="this.style.display='none'; this.parentElement.innerHTML='<span class=\'font-serif text-brand-gold font-bold text-xl\'>O</span>'"
                                class="w-full h-full object-contain">
                        </div>
                        <div class="flex flex-col leading-none">
                            <span class="font-serif text-[18px] font-bold text-white">Odeon</span>
                            <span class="text-[9px] uppercase tracking-[0.18em] text-brand-gold/70 font-bold">Kampoeng
                                Naga</span>
                        </div>
                    </a>
                    <p class="text-sm text-white/45 leading-relaxed mb-6">
                        Kawasan wisata budaya pecinan modern yang memadukan warisan sejarah dan denyut ekonomi lokal
                        Kota Sukabumi.
                    </p>
                    <div class="flex items-center gap-3">
                        <a href="https://instagram.com/dummy" target="_blank" rel="noopener"
                            class="w-9 h-9 rounded-lg bg-white/8 hover:bg-brand-accent/30 flex items-center justify-center text-white/50 hover:text-white transition-all duration-300 no-underline"
                            aria-label="Instagram">
                            <i class="iconoir-instagram text-base"></i>
                        </a>
                        <a href="https://facebook.com/dummy" target="_blank" rel="noopener"
                            class="w-9 h-9 rounded-lg bg-white/8 hover:bg-brand-accent/30 flex items-center justify-center text-white/50 hover:text-white transition-all duration-300 no-underline"
                            aria-label="Facebook">
                            <i class="iconoir-facebook text-base"></i>
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener"
                            class="w-9 h-9 rounded-lg bg-white/8 hover:bg-brand-accent/30 flex items-center justify-center text-white/50 hover:text-white transition-all duration-300 no-underline"
                            aria-label="WhatsApp">
                            <i class="iconoir-whatsapp text-base"></i>
                        </a>
                        <a href="https://youtube.com/" target="_blank" rel="noopener"
                            class="w-9 h-9 rounded-lg bg-white/8 hover:bg-brand-accent/30 flex items-center justify-center text-white/50 hover:text-white transition-all duration-300 no-underline"
                            aria-label="YouTube">
                            <i class="iconoir-youtube text-base"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-[11px] uppercase tracking-[0.2em] font-bold text-brand-gold/80 mb-5">Navigasi</h4>
                    <div class="flex flex-col gap-3">
                        @foreach ($navLinks as $link)
                            <a href="{{ route($link['route']) }}"
                                class="text-sm text-white/45 no-underline hover:text-white hover:translate-x-1
                                      transition-all duration-200 flex items-center gap-2 group">
                                {{ $link['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="text-[11px] uppercase tracking-[0.2em] font-bold text-brand-gold/80 mb-5">Kontak</h4>
                    <div class="flex flex-col gap-4">
                        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener"
                            class="no-underline group flex items-start gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-white/8 flex items-center justify-center shrink-0 group-hover:bg-brand-accent/20 transition-colors duration-300">
                                <i
                                    class="iconoir-whatsapp text-sm text-white/50 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-white/30 uppercase tracking-wider mb-0.5">WhatsApp</p>
                                <p class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">
                                    +62 812-3456-7890</p>
                            </div>
                        </a>
                        <a href="https://instagram.com/dummy" target="_blank" rel="noopener"
                            class="no-underline group flex items-start gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-white/8 flex items-center justify-center shrink-0 group-hover:bg-brand-accent/20 transition-colors duration-300">
                                <i
                                    class="iconoir-instagram text-sm text-white/50 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-white/30 uppercase tracking-wider mb-0.5">Instagram</p>
                                <p class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">
                                    @odeon_kampoengnaga</p>
                            </div>
                        </a>
                        <a href="mailto:info@odeon.id" class="no-underline group flex items-start gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-white/8 flex items-center justify-center shrink-0 group-hover:bg-brand-accent/20 transition-colors duration-300">
                                <i
                                    class="iconoir-mail text-sm text-white/50 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-white/30 uppercase tracking-wider mb-0.5">Email</p>
                                <p class="text-sm text-white/60 group-hover:text-white transition-colors duration-200">
                                    info@odeon.id</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-[11px] uppercase tracking-[0.2em] font-bold text-brand-gold/80 mb-5">Lokasi</h4>
                    <p class="text-sm text-white/45 leading-relaxed mb-4">
                        Komplek Ruko Danalaga Square, Jl. Pajagalan, Nyomplong, Kec. Warudoyong, Kota Sukabumi, Jawa
                        Barat 43131
                    </p>
                    <div class="w-full h-36 rounded-xl overflow-hidden ring-1 ring-white/10">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d286829.3219257221!2d106.715378!3d-6.9122123!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6849003f2ac651%3A0xabdb4309cedc2d9e!2sOdeon%20Chinatown%20Soekaboemi!5e1!3m2!1sen!2sid!4v1775709850579!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Lokasi Odeon Kampoeng Naga di Google Maps">
                        </iframe>
                    </div>
                </div>

            </div>

            <div
                class="pt-8 border-t border-white/[0.07] flex flex-col sm:flex-row justify-between items-center gap-3">
                <p class="text-xs text-white/25 text-center sm:text-left">
                    Developed by <a href="https://telkomuniversity.ac.id" target="_blank" rel="noopener"
                        class="text-brand-gold hover:text-white transition-colors duration-200">Telkom University</a> |
                    &copy; {{ date('Y') }} Odeon Kampoeng Naga. Seluruh hak cipta dilindungi.
                </p>
                <p class="text-xs text-white/20 flex items-center gap-2">
                    <i class="iconoir-map-pin text-brand-gold/40"></i>
                    Sukabumi, Jawa Barat, Indonesia
                </p>
            </div>
        </div>
    </footer>

    <script>
        const header = document.getElementById('main-header');
        const navBg = document.getElementById('nav-bg');
        const logoMain = document.getElementById('logo-text-main');
        const logoSub = document.getElementById('logo-text-sub');
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const bars = [document.getElementById('bar1'), document.getElementById('bar2'), document.getElementById('bar3')];
        const htmlRoot = document.getElementById('html-root');

        const desktopLinks = document.querySelectorAll('nav a.nav-link');

        function onScroll() {
            const scrolled = window.scrollY > 30;
            const isDark = htmlRoot.classList.contains('dark');

            navBg.style.opacity = scrolled ? '1' : '0';

            header.classList.toggle('nav-scrolled', scrolled);

            if (logoMain) {
                if (isDark) {
                    logoMain.style.color = scrolled ? '#E8DDD5' : '#FFFFFF';
                    logoSub.style.color = scrolled ? '#9E8878' : 'rgba(255,255,255,0.7)';
                } else {
                    logoMain.style.color = scrolled ? '#1A0F0F' : '#FFFFFF';
                    logoSub.style.color = scrolled ? '#7A6355' : 'rgba(255,255,255,0.7)';
                }
            }

            bars.forEach(b => {
                if (b) b.style.backgroundColor = scrolled ? (isDark ? '#E8DDD5' : '#1A0F0F') : '#FFFFFF';
            });

            if (mobileBtn) {
                if (scrolled) {
                    mobileBtn.style.backgroundColor = isDark ? 'rgba(255,255,255,0.1)' : 'rgba(139,26,26,0.08)';
                } else {
                    mobileBtn.style.backgroundColor = 'rgba(255,255,255,0.15)';
                }
            }

            document.querySelectorAll('.nav-text-transparent').forEach(link => {
                link.style.color = scrolled ? (isDark ? '#C9A88A' : '#4A3728') : 'rgba(255,255,255,0.9)';
            });
        }

        window.addEventListener('scroll', onScroll, {
            passive: true
        });
        onScroll(); 

        const backToTopBtn = document.getElementById('back-to-top');

        function handleBackToTopVisibility() {
            if (window.scrollY > 400) {
                backToTopBtn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                backToTopBtn.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
            } else {
                backToTopBtn.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                backToTopBtn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
            }
        }

        window.addEventListener('scroll', handleBackToTopVisibility, {
            passive: true
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        const mobileMenu = document.getElementById('mobile-menu');
        const bar1 = document.getElementById('bar1');
        const bar2 = document.getElementById('bar2');
        const bar3 = document.getElementById('bar3');
        let menuOpen = false;

        mobileBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mobileMenu.classList.toggle('hidden', !menuOpen);
            mobileBtn.setAttribute('aria-expanded', menuOpen);

            if (menuOpen) {
                bar1.style.transform = 'translateY(6.5px) rotate(45deg)';
                bar2.style.opacity = '0';
                bar3.style.transform = 'translateY(-6.5px) rotate(-45deg)';
                navBg.style.opacity = '1';
            } else {
                bar1.style.transform = '';
                bar2.style.opacity = '1';
                bar3.style.transform = '';
                onScroll();
            }
        });

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, parseInt(delay) * 80);
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.05,
            rootMargin: '0px 0px -40px 0px'
        });

        document.querySelectorAll('.reveal').forEach((el) => {
            if (!el.dataset.delay) {
                const siblings = Array.from(el.parentElement.children).filter(c => c.classList.contains('reveal'));
                el.dataset.delay = siblings.indexOf(el);
            }
            revealObserver.observe(el);
        });

        setTimeout(() => {
            document.querySelectorAll('.reveal:not(.visible)').forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    el.classList.add('visible');
                }
            });
        }, 300);

        (function() {
            const saved = localStorage.getItem('odeon_dark');
            if (saved === 'true') htmlRoot.classList.add('dark');
        })();

        function applyDarkUI(isDark) {
            const darkIconD = document.getElementById('dark-icon');
            const darkIconM = document.getElementById('dark-icon-mobile');
            const darkLabelM = document.getElementById('dark-label-mobile');

            if (isDark) {
                if (darkIconD) {
                    darkIconD.className = 'iconoir-sun-light text-base';
                }
                if (darkIconM) {
                    darkIconM.className = 'iconoir-sun-light text-base';
                }
                if (darkLabelM) darkLabelM.textContent = 'Light Mode';
            } else {
                if (darkIconD) {
                    darkIconD.className = 'iconoir-half-moon text-base';
                }
                if (darkIconM) {
                    darkIconM.className = 'iconoir-half-moon text-base';
                }
                if (darkLabelM) darkLabelM.textContent = 'Dark Mode';
            }
        }

        function updateWaveFill(isDark) {
            document.querySelectorAll('.wave-divider').forEach(svg => {
                svg.setAttribute('fill', isDark ? '#100808' : '#FAF7F2');
            });
        }

        function toggleDark() {
            const isDark = htmlRoot.classList.toggle('dark');
            localStorage.setItem('odeon_dark', isDark);
            applyDarkUI(isDark);
            updateWaveFill(isDark);
            onScroll();
        }

        updateWaveFill(htmlRoot.classList.contains('dark'));

        applyDarkUI(htmlRoot.classList.contains('dark'));

        document.getElementById('dark-toggle')?.addEventListener('click', toggleDark);
        document.getElementById('dark-toggle-mobile')?.addEventListener('click', toggleDark);


        let currentLang = localStorage.getItem('odeon_lang') || 'id';

        function applyLangUI(lang) {
            const langIcon = document.getElementById('lang-icon');
            const langLabelM = document.getElementById('lang-label-mobile');
            if (lang === 'en') {
                if (langIcon) langIcon.textContent = 'EN';
                if (langLabelM) langLabelM.textContent = 'Indonesia';
            } else {
                if (langIcon) langIcon.textContent = 'ID';
                if (langLabelM) langLabelM.textContent = 'English';
            }
        }

        function setGoogleTranslateCookie(lang) {
            const domain = window.location.hostname;

            if (lang === 'id') {
                document.cookie = "googtrans=/id/id; path=/; domain=" + domain;
                document.cookie = "googtrans=/id/id; path=/;";
            } else {
                document.cookie = "googtrans=/id/en; path=/; domain=" + domain;
                document.cookie = "googtrans=/id/en; path=/;";
            }
        }

        function toggleLang() {
            currentLang = currentLang === 'id' ? 'en' : 'id';

            localStorage.setItem('odeon_lang', currentLang);

            setGoogleTranslateCookie(currentLang);

            window.location.reload();
        }

        applyLangUI(currentLang);

        document.getElementById('lang-toggle')?.addEventListener('click', toggleLang);
        document.getElementById('lang-toggle-mobile')?.addEventListener('click', toggleLang);
    </script>

    <div id="google_translate_element" style="display:none"></div>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'en,id',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>

    @stack('scripts')

</body>

</html>
