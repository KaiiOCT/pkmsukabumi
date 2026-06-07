@extends('layouts.main')

@section('title', 'Beranda | Odeon Kampoeng Naga')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        #home-map {
            width: 100%;
            height: 580px;
            border-radius: 28px;
            overflow: hidden;
            border: 1px solid rgba(174, 82, 56, 0.16);
            z-index: 1;
        }

        .home-map-card {
            background: linear-gradient(180deg, #ffffff 0%, #fffaf5 100%);
            border-radius: 36px;
            padding: 18px;
            box-shadow: 0 28px 80px rgba(45, 20, 10, 0.14);
            border: 1px solid rgba(174, 82, 56, 0.10);
            position: relative;
        }

        .home-map-toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 16px;
        }

        .map-filter-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .map-filter-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border-radius: 999px;
            border: 1px solid rgba(139, 26, 26, 0.14);
            background: #ffffff;
            color: #6b1212;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 8px 22px rgba(45, 20, 10, 0.06);
        }

        .map-filter-btn:hover,
        .map-filter-btn.active {
            background: #8B1A1A;
            color: #ffffff;
            border-color: #8B1A1A;
            transform: translateY(-1px);
        }

        .map-help-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border-radius: 999px;
            border: 1px solid rgba(201, 168, 76, 0.38);
            background: rgba(201, 168, 76, 0.14);
            color: #6b4d00;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .map-help-btn:hover {
            background: rgba(201, 168, 76, 0.24);
        }

        .map-help-panel {
            position: relative;
            margin-bottom: 18px;
            padding: 0;
            border-radius: 28px;
            overflow: hidden;
            border: 1px solid rgba(139, 26, 26, 0.12);
            background:
                radial-gradient(circle at top left, rgba(201, 168, 76, 0.24), transparent 34%),
                linear-gradient(135deg, #fffaf2 0%, #ffffff 48%, #fff6ec 100%);
            box-shadow:
                0 18px 46px rgba(45, 20, 10, 0.10),
                inset 0 1px 0 rgba(255, 255, 255, 0.78);
        }

        .map-help-panel.hidden {
            display: none;
        }

        .map-help-inner {
            position: relative;
            display: grid;
            grid-template-columns: 1.1fr 1.5fr auto;
            align-items: stretch;
            gap: 18px;
            padding: 20px;
        }

        .map-help-inner::before {
            content: "";
            position: absolute;
            left: 20px;
            right: 20px;
            top: 0;
            height: 3px;
            border-radius: 999px;
            background: linear-gradient(90deg, #8B1A1A, #C9A84C, #8B1A1A);
            opacity: 0.9;
        }

        .map-help-main {
            display: flex;
            gap: 14px;
            align-items: flex-start;
            min-width: 0;
        }

        .map-help-icon {
            width: 48px;
            height: 48px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: linear-gradient(135deg, #8B1A1A, #C0482D);
            color: #ffffff;
            box-shadow: 0 14px 30px rgba(139, 26, 26, 0.24);
        }

        .map-help-icon i {
            font-size: 22px;
        }

        .map-help-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 6px;
            color: #8B1A1A;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .map-help-title {
            margin: 0;
            font-size: 18px;
            font-weight: 900;
            color: #2f1712;
            line-height: 1.25;
        }

        .map-help-desc {
            margin: 8px 0 0;
            font-size: 13px;
            line-height: 1.65;
            color: #7A6355;
        }

        .map-help-steps {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .map-help-step {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.70);
            border: 1px solid rgba(139, 26, 26, 0.08);
            box-shadow: 0 8px 22px rgba(45, 20, 10, 0.045);
        }

        .map-help-step-number {
            width: 28px;
            height: 28px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: rgba(139, 26, 26, 0.10);
            color: #8B1A1A;
            font-size: 12px;
            font-weight: 900;
        }

        .map-help-step:nth-child(2) .map-help-step-number {
            background: rgba(201, 168, 76, 0.22);
            color: #7A5A00;
        }

        .map-help-step:nth-child(3) .map-help-step-number {
            background: rgba(139, 26, 26, 0.10);
            color: #8B1A1A;
        }

        .map-help-step:nth-child(4) .map-help-step-number {
            background: rgba(201, 168, 76, 0.22);
            color: #7A5A00;
        }

        .map-help-step-text {
            min-width: 0;
        }

        .map-help-step-text strong {
            display: block;
            margin-bottom: 2px;
            color: #3a1f16;
            font-size: 12px;
            font-weight: 900;
            line-height: 1.2;
        }

        .map-help-step-text span {
            display: block;
            color: #7A6355;
            font-size: 11px;
            line-height: 1.35;
        }

        .map-help-close {
            width: 38px;
            height: 38px;
            border-radius: 999px;
            border: 1px solid rgba(139, 26, 26, 0.10);
            background: rgba(255, 255, 255, 0.78);
            color: #8B1A1A;
            font-weight: 900;
            cursor: pointer;
            flex-shrink: 0;
            transition: all 0.25s ease;
            box-shadow: 0 8px 18px rgba(45, 20, 10, 0.07);
        }

        .map-help-close:hover {
            background: #8B1A1A;
            color: #ffffff;
            transform: rotate(90deg);
        }

        .map-help-note {
            position: absolute;
            right: 20px;
            bottom: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: rgba(122, 99, 85, 0.76);
            font-size: 10px;
            font-weight: 800;
        }

        .map-count-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(139, 26, 26, 0.08);
            color: #6b1212;
            font-size: 12px;
            font-weight: 800;
        }

        .odeon-marker {
            width: 44px;
            height: 44px;
            border-radius: 50% 50% 50% 8px;
            transform: rotate(-45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #ffffff;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.28);
            position: relative;
        }

        .odeon-marker::after {
            content: "";
            position: absolute;
            inset: 7px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.16);
        }

        .odeon-marker i {
            transform: rotate(45deg);
            color: #ffffff;
            font-size: 20px;
            position: relative;
            z-index: 2;
        }

        .odeon-marker.attraction {
            background: linear-gradient(135deg, #8B1A1A, #C0482D);
        }

        .odeon-marker.umkm {
            background: linear-gradient(135deg, #C9A84C, #8A5A0A);
        }

        .leaflet-tooltip {
            border: none;
            border-radius: 999px;
            padding: 7px 12px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.14);
            font-size: 12px;
            font-weight: 800;
            color: #3a1f16;
        }

        .odeon-map-popup .leaflet-popup-content-wrapper {
            padding: 0;
            border-radius: 18px;
            overflow: hidden;
            background: #fffaf5;
            box-shadow: 0 18px 42px rgba(45, 20, 10, 0.24);
            border: 1px solid rgba(139, 26, 26, 0.12);
        }

        .odeon-map-popup .leaflet-popup-content {
            width: 220px !important;
            margin: 0;
        }

        .odeon-map-popup .leaflet-popup-tip {
            background: #fffaf5;
        }

        .odeon-popup-card {
            background: linear-gradient(180deg, #ffffff 0%, #fff8ee 100%);
            overflow: hidden;
        }

        .odeon-popup-top {
            height: 76px;
            position: relative;
            overflow: hidden;
            background: #3a1f16;
        }

        .odeon-popup-top img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: 0.92;
        }

        .odeon-popup-top::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(45, 20, 10, 0.72), rgba(45, 20, 10, 0.06));
        }

        .odeon-popup-badge {
            position: absolute;
            left: 10px;
            bottom: 9px;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 8px;
            border-radius: 999px;
            color: #ffffff;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            line-height: 1;
        }

        .odeon-popup-badge.attraction {
            background: linear-gradient(135deg, #8B1A1A, #C0482D);
        }

        .odeon-popup-badge.umkm {
            background: linear-gradient(135deg, #C9A84C, #8A5A0A);
        }

        .odeon-popup-body {
            padding: 12px;
        }

        .odeon-popup-title {
            margin: 0 0 5px;
            color: #2f1712;
            font-size: 14px;
            font-weight: 900;
            line-height: 1.22;
        }

        .odeon-popup-desc {
            margin: 0 0 9px;
            color: #7A6355;
            font-size: 11px;
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .odeon-popup-meta {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #6f5548;
            font-size: 10.5px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .odeon-popup-meta i {
            color: #8B1A1A;
            font-size: 12px;
            flex-shrink: 0;
        }

        .odeon-popup-footer {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .odeon-popup-chip {
            flex: 1;
            min-width: 0;
            padding: 7px 8px;
            border-radius: 999px;
            background: rgba(139, 26, 26, 0.08);
            color: #6b1212;
            font-size: 9.5px;
            font-weight: 900;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .odeon-popup-link {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 9px 13px;
            border-radius: 999px;
            background: #8B1A1A;
            color: #ffffff !important;
            text-decoration: none !important;
            font-size: 11px;
            font-weight: 900;
            line-height: 1;
            box-shadow: 0 10px 20px rgba(139, 26, 26, 0.28);
            border: 1px solid rgba(255, 255, 255, 0.75);
        }

        .odeon-popup-link:hover {
            background: #6b1212;
            color: #ffffff !important;
            box-shadow: 0 12px 24px rgba(139, 26, 26, 0.34);
        }

        .odeon-popup-link i {
            font-size: 12px;
        }

        .odeon-map-popup .leaflet-popup-close-button {
            width: 24px;
            height: 24px;
            top: 8px;
            right: 8px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.92);
            color: #8B1A1A !important;
            font-size: 17px;
            font-weight: 900;
            line-height: 22px;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
        }

        .odeon-map-popup .leaflet-popup-close-button:hover {
            background: #8B1A1A;
            color: #ffffff !important;
        }

        .leaflet-control-attribution {
            font-size: 10px;
        }

        @media (max-width: 640px) {
            #home-map {
                height: 480px;
                border-radius: 22px;
            }

            .home-map-card {
                padding: 12px;
                border-radius: 28px;
            }

            .home-map-toolbar {
                align-items: stretch;
            }

            .map-filter-group,
            .map-help-btn,
            .map-count-badge {
                width: 100%;
            }

            .map-filter-btn {
                flex: 1;
                justify-content: center;
            }

            .map-help-inner {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 18px;
            }

            .map-help-main {
                padding-right: 38px;
            }

            .map-help-steps {
                grid-template-columns: 1fr;
            }

            .map-help-close {
                position: absolute;
                top: 16px;
                right: 16px;
            }

            .map-help-note {
                position: static;
                margin: 0 18px 16px;
            }
        }
    </style>
@endpush

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <section
        class="relative pt-36 pb-28 px-5 sm:px-8 overflow-hidden bg-gradient-to-br from-brand-dark via-brand-accent-dark to-brand-accent">

        <div class="absolute inset-0">
            <img src="{{ asset('assets/vihara.jpeg') }}" alt="Odeon Kampoeng Naga"
                class="w-full h-full object-cover opacity-20" onerror="this.style.display='none'">
        </div>

        <div
            class="absolute top-0 right-0 w-96 h-96 bg-brand-gold/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-72 h-72 bg-brand-accent/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto text-center reveal">
            <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-5 leading-tight"
                style="text-shadow: 0 4px 32px rgba(0,0,0,0.35);">
                Selamat Datang Di<br>
                <span class="text-gradient-gold italic">Odeon Kampoeng Naga</span>
            </h1>

            <p class="text-lg text-white/65 leading-relaxed max-w-2xl mx-auto mb-10">
                Jelajahi perpaduan harmonis antara warisan budaya Tionghoa dan kearifan lokal serta kawasan pecinan modern
                yang bersih, tertata, dan menjadi pusat denyut nadi ekonomi warga Kota Sukabumi.
            </p>

            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#wisata-section"
                    class="inline-flex items-center gap-2.5 px-8 py-3.5 rounded-full
                      bg-white text-brand-accent text-sm font-bold no-underline
                      hover:bg-brand-gold hover:text-brand-dark hover:shadow-gold
                      hover:-translate-y-0.5 transition-all duration-300 shadow-lg">
                    <i class="iconoir-compass"></i> Jelajahi Paket Wisata
                </a>
                <a href="#tentang-odeon"
                    class="inline-flex items-center gap-2.5 px-8 py-3.5 rounded-full
                      bg-white/10 backdrop-blur-sm border border-white/30 text-white text-sm font-bold no-underline
                      hover:bg-white/20 hover:-translate-y-0.5 transition-all duration-300">
                    <i class="iconoir-info-circle"></i> Tentang Kami
                </a>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 64" preserveAspectRatio="none"
                class="w-full h-16 wave-divider">
                <path
                    d="M0,32L60,26.7C120,21,240,11,360,16C480,21,600,43,720,48C840,53,960,43,1080,37.3C1200,32,1320,32,1380,32L1440,32L1440,64L1380,64C1320,64,1200,64,1080,64C960,64,840,64,720,64C600,64,480,64,360,64C240,64,120,64,60,64L0,64Z" />
            </svg>
        </div>
    </section>

    <div class="pt-12 pb-4 px-5 sm:px-8 reveal">
        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-8 reveal">
                <p class="section-eyebrow mb-2">Galeri Kegiatan</p>
                <h2 class="section-title text-3xl mb-3">Momen Berkesan di Odeon</h2>
                <span class="gold-line mx-auto"></span>
            </div>

            <div
                class="mb-16 relative w-full h-[300px] md:h-[250px] md:h-[320px] lg:h-[400px] lg:h-[480px] md:h-[320px] md:h-[450px] lg:h-[560px] rounded-3xl overflow-hidden shadow-card-hover group reveal">
                <div id="hero-slider" class="w-full h-full relative bg-gray-900">

                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 slide-item">
                        <img src="{{ asset('assets/penghargaan.jpeg') }}" class="w-full h-full object-cover"
                            alt="Suasana Odeon 1">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white pb-2">
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2 text-red-300">Penghargaan Wisata
                                Odeon
                            </p>
                            <h3 class="font-serif text-2xl font-bold text-white mt-0 mb-0">Penghargaan Desa Wisata Terbaik
                                2025
                            </h3>
                        </div>
                    </div>
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 slide-item">
                        <img src="{{ asset('assets/sundakarsa.jpeg') }}" class="w-full h-full object-cover"
                            alt="Suasana Odeon 1">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white pb-2">
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2 text-red-300">Sunda Karsa Fest</p>
                            <h3 class="font-serif text-2xl font-bold text-white mt-0 mb-0">Karya Kreatif Jawa Barat 2025
                            </h3>
                        </div>
                    </div>
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide-item">
                        <img src="{{ asset('assets/kopitiam.jpeg') }}" class="w-full h-full object-cover"
                            alt="Suasana Odeon 2">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white pb-2">
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2 text-red-300 notranslate">UMKM dan Kuliner</p>
                            <h3 class="font-serif text-2xl font-bold text-white mt-0 mb-0">Kopitiam Odeon</h3>
                        </div>
                    </div>
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slide-item">
                        <img src="{{ asset('assets/pertunjukan.jpeg') }}" class="w-full h-full object-cover"
                            alt="Suasana Odeon 2">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white pb-2">
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2 text-red-300">Pertunjukan</p>
                            <h3 class="font-serif text-2xl font-bold text-white mt-0 mb-0">Barongsai dan Liong</h3>
                        </div>
                    </div>
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 slide-item">
                        <img src="{{ asset('assets/hibah.jpeg') }}" class="w-full h-full object-cover"
                            alt="Suasana Odeon 1">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white pb-2">
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2 text-red-300">Bantuan Hibah
                                Provinsi
                                Jawa Barat</p>
                            <h3 class="font-serif text-2xl font-bold text-white mt-0 mb-0">Pengembangan Tata Kelola Bisnis
                                Pariwisata Kampung Tematik Kota Sukabumi 2023</h3>
                        </div>
                    </div>
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-100 slide-item">
                        <img src="{{ asset('assets/vihara.jpeg') }}" class="w-full h-full object-cover"
                            alt="Suasana Odeon 1">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white pb-2">
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2 text-red-300">Vihara Widhi Sakti
                            </p>
                            <h3 class="font-serif text-2xl font-bold text-white mt-0 mb-0">Tempat Ibadah Umat Buddha</h3>
                        </div>
                    </div>
                </div>

                <button id="slider-prev"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/20 hover:bg-white/40 backdrop-blur-md rounded-full flex items-center justify-center text-white transition opacity-0 group-hover:opacity-100 border-none cursor-pointer">
                    <i class="iconoir-nav-arrow-left text-xl"></i>
                </button>
                <button id="slider-next"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/20 hover:bg-white/40 backdrop-blur-md rounded-full flex items-center justify-center text-white transition opacity-0 group-hover:opacity-100 border-none cursor-pointer">
                    <i class="iconoir-nav-arrow-right text-xl"></i>
                </button>

                <div class="absolute bottom-6 right-6 flex gap-2 z-10" id="slider-dots">
                    <button
                        class="w-2.5 h-2.5 rounded-full bg-white transition border-none cursor-pointer slider-dot"></button>
                    <button
                        class="w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white/70 transition border-none cursor-pointer slider-dot"></button>
                    <button
                        class="w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white/70 transition border-none cursor-pointer slider-dot"></button>
                    <button
                        class="w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white/70 transition border-none cursor-pointer slider-dot"></button>
                    <button
                        class="w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white/70 transition border-none cursor-pointer slider-dot"></button>
                    <button
                        class="w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white/70 transition border-none cursor-pointer slider-dot"></button>
                </div>
            </div>
        </div>
    </div>

    <section id="tentang-odeon" class="py-20 px-5 sm:px-8 bg-brand-secondary">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            <div class="reveal relative order-2 lg:order-1">
                <div
                    class="absolute -inset-4 bg-gradient-to-br from-brand-gold/15 to-brand-accent/5
                        rounded-4xl -rotate-2 z-0">
                </div>

                <div class="relative z-10 rounded-3xl overflow-hidden shadow-card-hover">
                    <img src="{{ asset('assets/sundakarsa.jpeg') }}"
                        alt="Odeon Kampoeng Naga — Wisata Budaya Pecinan Sukabumi"
                        class="w-full h-[280px] md:h-[360px] lg:h-[440px] object-cover"
                        onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800'">
                    <div class="absolute inset-0 bg-gradient-card pointer-events-none"></div>
                </div>

                <div
                    class="absolute -bottom-5 -right-4 z-20 glass rounded-2xl px-6 py-4
                        shadow-card-hover border border-white/60 text-center">
                    <div class="font-serif text-3xl font-bold text-gradient-crimson mb-0.5">1910</div>
                    <div class="text-[10px] text-brand-muted font-bold uppercase tracking-widest">Tahun Berdiri</div>
                </div>
            </div>

            <div class="order-1 lg:order-2 space-y-6 reveal">
                <div>
                    <p class="section-eyebrow mb-3">Mengenal Kami</p>
                    <h2 class="section-title mb-4 leading-tight">
                        Tentang Odeon<br>
                        <span class="text-gradient-gold italic">Kampoeng Naga</span>
                    </h2>
                    <span class="gold-line"></span>
                </div>

                <div class="space-y-4 text-brand-muted leading-relaxed text-[15.5px] pt-2">
                    <p>
                        <strong class="text-brand-text font-semibold">Odeon Kampoeng Naga</strong> adalah kawasan wisata
                        budaya pecinan yang terletak di jantung Kota Sukabumi, Jawa Barat. Kawasan ini merupakan perpaduan
                        unik antara warisan sejarah masyarakat Tionghoa perantauan dengan kearifan lokal Sunda yang telah
                        berdampingan secara harmonis selama lebih dari satu abad.
                    </p>
                    <p>
                        Di sini, pengunjung dapat menjelajahi lorong-lorong bersejarah yang dihiasi lampion merah,
                        mengunjungi Vihara Widhi Sakti yang megah, menikmati kuliner autentik, dan menyaksikan pertunjukan
                        seni budaya yang memukau — semua dalam satu kawasan yang tertata rapi dan ramah wisatawan.
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-4 py-5 border-y border-brand-accent/10 reveal">
                    @php $miniStats = [['val' => '500+', 'label' => 'Pengunjung / Bulan'], ['val' => '30+', 'label' => 'UMKM Binaan'], ['val' => '12+', 'label' => 'Program Budaya']]; @endphp
                    @foreach ($miniStats as $s)
                        <div class="text-center">
                            <div class="font-serif text-2xl font-bold text-brand-text">{{ $s['val'] }}</div>
                            <div class="text-[10px] text-brand-muted font-semibold uppercase tracking-wider mt-1">
                                {{ $s['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-wrap gap-3 pt-2 reveal">
                    <a href="{{ route('pages.profil') }}" class="btn-primary">
                        <i class="iconoir-user-circle"></i>
                        Profil Lengkap
                    </a>
                    <a href="{{ route('pages.atraksi') }}" class="btn-outline">
                        <i class="iconoir-compass"></i>
                        Lihat Atraksi
                    </a>
                </div>
            </div>

        </div>
    </section>

    <div id="atraksi-section" class="px-6 md:px-10 py-16 sm:px-8 md:mx-0">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4 reveal">
            <div>
                <p class="text-sm uppercase tracking-[0.14em] font-semibold text-brand-accent mb-2 m-0">Titik Kunjungan
                </p>
                <h2 class="font-serif text-4xl font-bold text-brand-text mb-2 mt-0">Daya Tarik Utama</h2>
                <p class="text-base text-brand-muted max-w-2xl m-0">Menyusuri jejak sejarah dan keindahan yang menjadi ikon
                    Kampoeng Naga.</p>
            </div>
            <a href="{{ route('pages.atraksi') }}"
                class="hidden md:inline-flex items-center gap-2 text-sm font-semibold border border-gray-200 text-brand-text px-6 py-2.5 rounded-full hover:border-brand-accent hover:text-brand-accent transition no-underline">
                Lihat Semua Atraksi <i class="iconoir-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="group relative rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-brand-accent/20 transition-all duration-300 h-80 reveal block cursor-zoom-in">
                <a href="{{ asset('assets/vihara.jpeg') }}" data-fancybox="atraksi-home"
                    data-caption="Gapura Utama Odeon">
                    <img src="{{ asset('assets/vihara.jpeg') }}" alt="Gapura Utama Odeon"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div
                        class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 w-10 h-10 bg-black/30 backdrop-blur-md rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                        <i class="iconoir-zoom-in text-lg"></i>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-white/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider mb-2">
                            <i class="iconoir-camera text-[10px]"></i> Spot Ikonik
                        </span>
                        <h3 class="font-serif text-2xl font-bold text-white leading-tight mt-0 mb-1">Gapura Utama Odeon
                        </h3>
                        <p class="text-sm text-white/70 line-clamp-1 mb-0">Arsitektur pembatas penanda masuk kawasan
                            pusaka.</p>
                    </div>
                </a>
            </div>

            <div
                class="group relative rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-brand-accent/20 transition-all duration-300 h-80 reveal block cursor-zoom-in lg:-translate-y-6">
                <a href="{{ asset('assets/lorong.jpeg') }}" data-fancybox="atraksi-home"
                    data-caption="Lorong Lampion Merah">
                    <img src="{{ asset('assets/lorong.jpeg') }}" alt="Lorong Lampion Merah"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div
                        class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 w-10 h-10 bg-black/30 backdrop-blur-md rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                        <i class="iconoir-zoom-in text-lg"></i>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-white/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider mb-2">
                            <i class="iconoir-camera text-[10px]"></i> Estetik
                        </span>
                        <h3 class="font-serif text-2xl font-bold text-white leading-tight mt-0 mb-1">Lorong Lampion Merah
                        </h3>
                        <p class="text-sm text-white/70 line-clamp-1 mb-0">Ratusan lampion temaram yang sangat
                            instagramable.</p>
                    </div>
                </a>
            </div>

            <div
                class="group relative rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-brand-accent/20 transition-all duration-300 h-80 reveal block cursor-zoom-in">
                <a href="{{ asset('assets/museum.jpeg') }}" data-fancybox="atraksi-home"
                    data-caption="Vihara Widhi Sakti">
                    <img src="{{ asset('assets/museum.jpeg') }}" alt="Vihara Widhi Sakti"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div
                        class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div
                        class="absolute top-4 right-4 w-10 h-10 bg-black/30 backdrop-blur-md rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                        <i class="iconoir-zoom-in text-lg"></i>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <span
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-white/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider mb-2">
                            <i class="iconoir-open-book text-[10px]"></i> Religi
                        </span>
                        <h3 class="font-serif text-2xl font-bold text-white leading-tight mt-0 mb-1">Vihara Widhi Sakti
                        </h3>
                        <p class="text-sm text-white/70 line-clamp-1 mb-0">Tempat ibadah tertua peninggalan etnis Tionghoa.
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="mt-8 text-center md:hidden reveal">
            <a href="{{ route('pages.atraksi') }}"
                class="inline-flex items-center justify-center gap-2 text-sm font-semibold border border-gray-200 text-brand-text px-6 py-3 rounded-full hover:border-brand-accent hover:text-brand-accent transition no-underline">
                Lihat Semua Atraksi <i class="iconoir-arrow-right"></i>
            </a>
        </div>
    </div>

    <div id="wisata-section" class="px-6 md:px-10 py-16 bg-red-50/50 sm:px-8 md:mx-0">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4 reveal">
            <div>
                <p class="text-sm uppercase tracking-[0.14em] font-semibold text-brand-accent mb-2 m-0">Penawaran Eksklusif
                </p>
                <h2 class="font-serif text-4xl font-bold text-brand-text mb-2 mt-0">Paket Wisata</h2>
                <p class="text-base text-brand-muted max-w-2xl m-0">Nikmati pengalaman tak terlupakan melalui berbagai
                    paket pilihan.</p>
            </div>
            <a href="{{ route('pages.paket-wisata') }}"
                class="hidden md:inline-flex items-center gap-2 text-sm font-semibold border border-gray-200 text-brand-text px-6 py-2.5 rounded-full hover:border-brand-accent hover:text-brand-accent transition no-underline">
                Lihat Semua Paket <i class="iconoir-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($tourPackages as $package)
                <div
                    class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-brand-accent/20 transition-all duration-300 transform hover:-translate-y-1 flex flex-col reveal">

                    <div class="relative h-56 overflow-hidden">

                        <img src="{{ asset('storage/' . $package->main_image) }}" alt="{{ $package->title_line1 }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                        @if ($package->is_bestseller)
                            <div
                                class="absolute top-4 left-4 bg-gradient-to-r from-amber-200 to-amber-100 text-amber-800 text-[10px] font-bold px-3 py-1.5 rounded-full shadow-lg uppercase tracking-wider flex items-center gap-1.5 border border-amber-300">

                                <i class="iconoir-star-solid text-amber-600"></i>
                                Best Seller

                            </div>
                        @endif

                    </div>

                    <div class="p-6 flex flex-col flex-1">

                        <h3 class="font-serif text-xl font-bold text-brand-text mb-2 mt-0">
                            {{ $package->title_line1 }}
                            {{ $package->title_line2 }}
                        </h3>

                        <p class="text-sm text-brand-muted leading-relaxed mb-6 line-clamp-2">
                            {{ $package->catchphrase }}
                        </p>

                        <div class="flex items-end justify-between mt-auto pt-4 border-t border-gray-100">

                            <div>
                                <span class="text-[10px] uppercase tracking-wider text-brand-muted block mb-0.5 mt-0">
                                    Mulai dari
                                </span>

                                <span class="text-lg font-bold text-brand-accent block">
                                    Rp {{ number_format($package->price, 0, ',', '.') }}
                                    <span class="text-xs font-normal text-brand-muted">/pax</span>
                                </span>
                            </div>

                            <a href="#"
                                class="text-brand-accent bg-red-50 hover:bg-red-100 w-10 h-10 flex items-center justify-center rounded-full transition">

                                <i class="iconoir-arrow-right text-lg"></i>

                            </a>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

        <div class="mt-8 text-center md:hidden reveal">
            <a href="{{ route('pages.paket-wisata') }}"
                class="inline-flex items-center justify-center gap-2 text-sm font-semibold border border-gray-200 text-brand-text px-6 py-3 rounded-full hover:border-brand-accent hover:text-brand-accent transition no-underline">
                Lihat Semua Paket <i class="iconoir-arrow-right"></i>
            </a>
        </div>
    </div>

    <div id="umkm-section" class="mb-10 px-6 sm:px-8 py-10 bg-[#FAFAF8] md:mx-0">
        <div class="flex flex-col lg:flex-row justify-between items-end mb-10 gap-6 reveal">
            <div>
                <p class="text-sm uppercase tracking-[0.14em] font-semibold text-brand-accent mb-2 m-0">Produk Unggulan</p>
                <h2 class="font-serif text-4xl font-bold text-brand-text mb-2 mt-0">UMKM & Kuliner Lokal</h2>
                <p class="text-base text-brand-muted max-w-xl m-0">Dukung penggerak ekonomi warga asli Odeon dengan membeli
                    mahakarya lokal.</p>
            </div>

            <a href="{{ route('pages.umkm') }}"
                class="hidden md:inline-flex items-center gap-2 text-sm font-semibold border border-gray-200 text-brand-text px-6 py-2.5 rounded-full hover:border-brand-accent hover:text-brand-accent transition no-underline">
                Lihat Semua UMKM <i class="iconoir-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="umkm-grid">
            @foreach ($umkms as $umkm)
                <div class="umkm-item bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col transition hover:shadow-xl hover:shadow-brand-accent/10 hover:-translate-y-1 reveal"
                    data-category="{{ strtolower($umkm->category) }}">

                    <div class="w-full h-44 rounded-xl overflow-hidden mb-5 relative group">
                        <img src="{{ asset('storage/' . $umkm->main_image) }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                            alt="{{ $umkm->name }}">

                        <div
                            class="absolute top-3 left-3 bg-white/90 backdrop-blur text-orange-600 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded shadow-sm">
                            {{ $umkm->category }}
                        </div>
                    </div>

                    <h3 class="font-serif text-lg font-bold text-brand-text mb-1 mt-0">
                        {{ $umkm->name }}
                    </h3>

                    <p class="text-xs font-medium text-brand-muted mb-3 flex items-center gap-1.5">
                        <i class="iconoir-shop text-sm"></i>
                        {{ $umkm->owner_highlight }}
                    </p>

                    <p class="text-sm text-brand-muted leading-relaxed mb-6 flex-1 line-clamp-3">
                        {{ $umkm->description }}
                    </p>

                    <div class="flex items-center justify-between pt-4 border-t border-brand-accent/8 mt-auto">
                        <span class="text-sm font-bold text-brand-text">
                            Mulai Rp {{ number_format($umkm->price_start, 0, ',', '.') }}
                        </span>

                        <a href="{{ route('pages.umkm-detail', $umkm->id) }}"
                            class="btn-icon text-xs transition-colors duration-300 no-underline"
                            aria-label="Lihat detail UMKM">
                            <i class="iconoir-arrow-right text-sm"></i>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="mt-8 text-center md:hidden reveal">
            <a href="{{ route('pages.umkm') }}"
                class="inline-flex items-center justify-center gap-2 text-sm font-semibold border border-gray-200 text-brand-text px-6 py-3 rounded-full hover:border-brand-accent hover:text-brand-accent transition no-underline">
                Lihat Semua UMKM <i class="iconoir-arrow-right"></i>
            </a>
        </div>
    </div>


    <div id="berita-section" class="mb-16 pt-8 px-5 sm:px-8">
        <div class="flex justify-between items-end mb-10 gap-4 reveal">
            <div>
                <p class="text-sm uppercase tracking-[0.14em] font-semibold text-brand-accent mb-2 m-0">Informasi Terkini
                </p>
                <h2 class="font-serif text-4xl font-bold text-brand-text mb-2 mt-0">Berita & Pencapaian</h2>
                <p class="text-base text-brand-muted max-w-xl m-0">Kabar terbaru, artikel informatif, dan pencapaian dari
                    Kawasan Wisata Budaya Odeon.</p>
            </div>
            <a href="{{ route('pages.berita') }}"
                class="hidden md:inline-flex items-center gap-2 text-sm font-semibold border border-gray-200 text-brand-text px-6 py-2.5 rounded-full hover:border-brand-accent hover:text-brand-accent transition no-underline">
                Lihat Semua Berita <i class="iconoir-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($latestNews as $news)
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col transition duration-300 transform hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-accent/10 group reveal">

                    <div class="relative w-full h-56 overflow-hidden">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>

                    <div class="flex flex-col flex-1 p-6">

                        <p
                            class="text-[11px] font-bold text-brand-muted mb-3 flex items-center gap-2 uppercase tracking-wide">

                            <span class="bg-red-50 text-brand-accent px-2.5 py-1 rounded">
                                {{ $news->category }}
                            </span>

                            <i class="iconoir-calendar text-xs"></i>

                            {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d M Y') }}

                        </p>

                        <h3 class="font-serif text-xl font-bold text-brand-text leading-snug mb-3 mt-0 flex-1">

                            <a href="{{ route('news.show', $news->slug) }}"
                                class="no-underline text-brand-text hover:text-brand-accent transition-colors">

                                {{ $news->title }}

                            </a>
                        </h3>
                        <p class="text-sm text-brand-muted leading-relaxed mb-6 line-clamp-3">
                            {{ $news->excerpt }}
                        </p>
                        <a href="{{ route('news.show', $news->slug) }}"
                            class="text-sm font-bold text-brand-accent no-underline inline-flex items-center gap-1.5 w-fit transition group-hover:gap-2 mt-auto">
                            Baca Selengkapnya
                            <i class="iconoir-arrow-right text-lg"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 text-center md:hidden">
            <a href="{{ route('pages.berita') }}"
                class="inline-flex items-center justify-center gap-2 text-sm font-semibold border border-gray-200 text-brand-text px-6 py-3 rounded-full hover:border-brand-accent hover:text-brand-accent transition no-underline">
                Lihat Semua Berita <i class="iconoir-arrow-right"></i>
            </a>
        </div>
    </div>

        <section class="py-20 px-5 sm:px-8 bg-brand-secondary">
        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-12 reveal">
                <p class="section-eyebrow mb-3">Peta Digital Kawasan</p>
                <h2 class="section-title mb-4">
                    Jelajahi Atraksi & UMKM Odeon
                </h2>
                <span class="gold-line mx-auto"></span>
                <p class="text-brand-muted text-sm md:text-base max-w-2xl mx-auto mt-5 leading-relaxed">
                    Temukan titik daya tarik wisata dan UMKM lokal di kawasan Odeon Kampoeng Naga melalui peta digital interaktif.
                </p>
            </div>

            @php
                $homeMapItems = collect();

                foreach ($mapAttractions as $a) {
                    $homeMapItems->push([
                        'type' => 'atraksi',
                        'typeLabel' => 'Atraksi',
                        'name' => $a->name,
                        'category' => $a->category,
                        'description' => $a->excerpt ?? $a->description,
                        'location' => $a->location_label,
                        'image' => $a->main_image ? asset('storage/' . $a->main_image) : asset('assets/vihara.jpeg'),
                        'latitude' => (float) $a->latitude,
                        'longitude' => (float) $a->longitude,
                        'url' => route('pages.atraksi-detail', $a->slug),
                    ]);
                }

                foreach ($mapUmkms as $u) {
                    $homeMapItems->push([
                        'type' => 'umkm',
                        'typeLabel' => 'UMKM',
                        'name' => $u->name,
                        'category' => $u->category,
                        'description' => $u->description,
                        'location' => $u->address,
                        'image' => $u->main_image ? asset('storage/' . $u->main_image) : asset('assets/kopitiam.jpeg'),
                        'price' => $u->price_start ? 'Mulai Rp ' . number_format($u->price_start, 0, ',', '.') : null,
                        'isOpen' => $u->is_open,
                        'latitude' => (float) $u->latitude,
                        'longitude' => (float) $u->longitude,
                        'url' => route('pages.umkm-detail', $u->id),
                    ]);
                }
            @endphp

            <div class="home-map-card reveal">

                <div class="home-map-toolbar">
                    <div class="map-filter-group" id="home-map-filters">
                        <button type="button" class="map-filter-btn active" data-filter="all">
                            <i class="iconoir-grid-plus"></i> Semua
                        </button>

                        <button type="button" class="map-filter-btn" data-filter="atraksi">
                            <i class="iconoir-camera"></i> Atraksi
                        </button>

                        <button type="button" class="map-filter-btn" data-filter="umkm">
                            <i class="iconoir-shop"></i> UMKM
                        </button>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">
                        <span class="map-count-badge" id="home-map-count">
                            <i class="iconoir-map-pin"></i> Memuat titik...
                        </span>

                        <button type="button" class="map-help-btn" id="map-help-toggle">
                            <i class="iconoir-info-circle"></i> Petunjuk
                        </button>
                    </div>
                </div>

                <div class="map-help-panel" id="map-help-panel">
                    <div class="map-help-inner">

                        <div class="map-help-main">
                            <div class="map-help-icon">
                                <i class="iconoir-map"></i>
                            </div>

                            <div>
                                <div class="map-help-eyebrow">
                                    <i class="iconoir-info-circle"></i>
                                    Panduan Peta
                                </div>

                                <h4 class="map-help-title">
                                    Jelajahi kawasan Odeon dengan lebih mudah
                                </h4>

                                <p class="map-help-desc">
                                    Gunakan filter untuk memilih titik Atraksi atau UMKM, lalu klik marker untuk melihat popup ringkas sebelum masuk ke halaman detail.
                                </p>
                            </div>
                        </div>

                        <div class="map-help-steps">

                            <div class="map-help-step">
                                <div class="map-help-step-number">01</div>
                                <div class="map-help-step-text">
                                    <strong>Pilih kategori</strong>
                                    <span>Tampilkan semua titik, Atraksi saja, atau UMKM saja.</span>
                                </div>
                            </div>

                            <div class="map-help-step">
                                <div class="map-help-step-number">02</div>
                                <div class="map-help-step-text">
                                    <strong>Lihat marker</strong>
                                    <span>Marker merah untuk Atraksi dan gold untuk UMKM.</span>
                                </div>
                            </div>

                            <div class="map-help-step">
                                <div class="map-help-step-number">03</div>
                                <div class="map-help-step-text">
                                    <strong>Klik titik</strong>
                                    <span>Buka popup ringkas, lalu pilih tombol detail lokasi.</span>
                                </div>
                            </div>

                            <div class="map-help-step">
                                <div class="map-help-step-number">04</div>
                                <div class="map-help-step-text">
                                    <strong>Area terkunci</strong>
                                    <span>Peta tetap fokus di kawasan Odeon Sukabumi.</span>
                                </div>
                            </div>

                        </div>

                        <button type="button" class="map-help-close" id="map-help-close" aria-label="Tutup petunjuk">
                            <i class="iconoir-xmark"></i>
                        </button>

                    </div>

                    <div class="map-help-note">
                        <i class="iconoir-spark-solid"></i>
                        Petunjuk ini bisa ditutup dan dibuka kembali kapan saja.
                    </div>
                </div>

                <div id="home-map"></div>
            </div>

            <div id="home-map-empty" class="hidden text-center py-16 max-w-sm mx-auto">
                <div class="w-20 h-20 rounded-3xl bg-brand-accent/8 flex items-center justify-center mx-auto mb-5">
                    <i class="iconoir-map-pin text-3xl text-brand-accent"></i>
                </div>
                <h3 class="font-serif text-2xl font-bold text-brand-text mb-2">
                    Belum ada titik peta
                </h3>
                <p class="text-brand-muted text-sm">
                    Pastikan data Atraksi dan UMKM sudah memiliki latitude dan longitude.
                </p>
            </div>

        </div>
    </section>
    
    <section class="py-20 px-5 sm:px-8 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-14 reveal">
                <p class="section-eyebrow mb-2">Informasi Penting</p>
                <h2 class="section-title text-3xl mb-3">Pertanyaan Seputar Odeon</h2>
                <span class="gold-line mx-auto"></span>
            </div>

            <div class="space-y-4 reveal">

                <div
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden faq-item transition-all duration-300">
                    <button
                        class="faq-button w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none cursor-pointer border-none bg-transparent">
                        <span class="font-bold text-brand-text pr-4 text-base">Berapa harga tiket masuk ke kawasan Odeon
                            Kampoeng Naga?</span>
                        <div
                            class="w-8 h-8 rounded-full bg-brand-accent/10 text-brand-accent flex items-center justify-center shrink-0 transition-transform duration-300 faq-icon">
                            <i class="iconoir-plus text-lg"></i>
                        </div>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-sm text-brand-muted leading-relaxed m-0 border-t border-gray-100 pt-4">
                            Kawasan pecinan Odeon <strong>100% Gratis</strong> untuk dikunjungi oleh publik. Anda hanya
                            perlu membayar jika ingin menikmati kuliner di UMKM, membeli suvenir, atau memesan Paket Wisata
                            berpemandu.
                        </p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden faq-item transition-all duration-300">
                    <button
                        class="faq-button w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none cursor-pointer border-none bg-transparent">
                        <span class="font-bold text-brand-text pr-4 text-base">Jam berapa waktu terbaik untuk
                            berkunjung?</span>
                        <div
                            class="w-8 h-8 rounded-full bg-brand-accent/10 text-brand-accent flex items-center justify-center shrink-0 transition-transform duration-300 faq-icon">
                            <i class="iconoir-plus text-lg"></i>
                        </div>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-sm text-brand-muted leading-relaxed m-0 border-t border-gray-100 pt-4">
                            Jika Anda ingin berburu sarapan legendaris, datanglah pada pukul <strong>07.00 - 10.00
                                WIB</strong>. Namun, jika Anda ingin menikmati keindahan lampion yang menyala dan suasana
                            romantis pecinan, waktu terbaik adalah mulai pukul <strong>17.00 WIB hingga malam hari</strong>.
                        </p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden faq-item transition-all duration-300">
                    <button
                        class="faq-button w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none cursor-pointer border-none bg-transparent">
                        <span class="font-bold text-brand-text pr-4 text-base">Apakah tersedia fasilitas parkir yang
                            luas?</span>
                        <div
                            class="w-8 h-8 rounded-full bg-brand-accent/10 text-brand-accent flex items-center justify-center shrink-0 transition-transform duration-300 faq-icon">
                            <i class="iconoir-plus text-lg"></i>
                        </div>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-sm text-brand-muted leading-relaxed m-0 border-t border-gray-100 pt-4">
                            Tersedia beberapa kantong parkir resmi di sekitar Jalan Pajagalan untuk kendaraan roda dua
                            maupun roda empat. Khusus untuk rombongan bus wisata, kami sarankan untuk konfirmasi terlebih
                            dahulu melalui WhatsApp agar kami dapat menyiapkan area parkir khusus.
                        </p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden faq-item transition-all duration-300">
                    <button
                        class="faq-button w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none cursor-pointer border-none bg-transparent">
                        <span class="font-bold text-brand-text pr-4 text-base">Apakah kuliner di kawasan ini ramah Muslim
                            (Halal)?</span>
                        <div
                            class="w-8 h-8 rounded-full bg-brand-accent/10 text-brand-accent flex items-center justify-center shrink-0 transition-transform duration-300 faq-icon">
                            <i class="iconoir-plus text-lg"></i>
                        </div>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-sm text-brand-muted leading-relaxed m-0 border-t border-gray-100 pt-4">
                            Tentu! Banyak UMKM kuliner di Odeon Kampoeng Naga yang dikelola oleh warga lokal dan 100% Halal.
                            Anda bisa bertanya langsung kepada para pedagang mengenai komposisi hidangan, karena
                            keharmonisan dan toleransi adalah nilai utama di kawasan kami.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 px-5 sm:px-8 relative overflow-hidden reveal mb-0 mt-0">
        <div class="absolute inset-0 bg-gradient-to-br from-brand-accent via-[#6b1212] to-brand-dark"></div>
        <div
            class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay">
        </div>
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-brand-gold/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-72 h-72 bg-brand-gold-light/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto text-center reveal">
            <p class="text-brand-gold text-sm font-bold uppercase tracking-[0.2em] mb-3">Tunggu Apa Lagi?</p>
            <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6 leading-tight"
                style="text-shadow: 0 4px 24px rgba(0,0,0,0.4);">
                Mari Rangkai Kenangan Anda di <br> <span class="text-gradient-gold italic">Odeon Kampoeng Naga</span>
            </h2>
            <p class="text-lg md:text-xl text-[#FAF7F2]/80 mb-10 max-w-2xl mx-auto leading-relaxed font-medium">
                Pilih paket wisata Anda sekarang atau hubungi kami untuk merancang jadwal kunjungan khusus yang sesuai
                dengan keinginan Anda.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('pages.paket-wisata') }}"
                    class="btn-gold w-full sm:w-auto text-base px-8 py-4 shadow-xl shadow-brand-gold/20 flex items-center justify-center gap-2 no-underline">
                    <i class="iconoir-calendar-check text-xl"></i> Pesan Perjalanan
                </a>
                <a href="https://wa.me/6281234567890" target="_blank"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-full font-bold text-white border border-white/30 bg-white/10 hover:bg-white/20 transition-all backdrop-blur-sm no-underline">
                    <i class="iconoir-whatsapp text-lg"></i> Tanya Admin
                </a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            Fancybox.bind("[data-fancybox]", {
                Images: {
                    zoom: true
                },
                Toolbar: {
                    display: {
                        right: ["slideshow", "thumbs", "close"]
                    }
                },
            });

            const slides = document.querySelectorAll('.slide-item');
            const dots = document.querySelectorAll('.slider-dot');
            const btnPrev = document.getElementById('slider-prev');
            const btnNext = document.getElementById('slider-next');
            let currentSlide = 0;
            const slideIntervalTime = 3000;
            let slideInterval;

            function showSlide(index) {
                if (dots[currentSlide]) {
                    dots[currentSlide].classList.remove('bg-white');
                    dots[currentSlide].classList.add('bg-white/40');
                }
                if (slides[currentSlide]) {
                    slides[currentSlide].classList.remove('opacity-100');
                    slides[currentSlide].classList.add('opacity-0');
                    slides[currentSlide].classList.add('pointer-events-none');
                }

                currentSlide = (index + slides.length) % slides.length;

                if (dots[currentSlide]) {
                    dots[currentSlide].classList.remove('bg-white/40');
                    dots[currentSlide].classList.add('bg-white');
                }
                if (slides[currentSlide]) {
                    slides[currentSlide].classList.remove('opacity-0', 'pointer-events-none');
                    slides[currentSlide].classList.add('opacity-100');
                }
            }

            function nextSlide() {
                showSlide(currentSlide + 1);
            }

            function prevSlide() {
                showSlide(currentSlide - 1);
            }

            function resetInterval() {
                if (slideInterval) clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, slideIntervalTime);
            }

            if (btnNext && btnPrev) {
                btnNext.addEventListener('click', () => {
                    nextSlide();
                    resetInterval();
                });
                btnPrev.addEventListener('click', () => {
                    prevSlide();
                    resetInterval();
                });
            }

            dots.forEach((dot, idx) => {
                dot.addEventListener('click', () => {
                    showSlide(idx);
                    resetInterval();
                });
            });

            if (slides.length > 0) {
                slides.forEach((s, i) => {
                    if (i !== 0) s.classList.add('pointer-events-none');
                });
                resetInterval();
            }

            const faqButtons = document.querySelectorAll('.faq-button');

            faqButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('.iconoir-plus, .iconoir-minus');
                    const parentItem = button.closest('.faq-item');

                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        icon.classList.replace('iconoir-plus', 'iconoir-minus');
                        parentItem.classList.add('border-brand-accent/30', 'shadow-md');
                        icon.parentElement.classList.add('rotate-180', 'bg-brand-accent',
                            'text-white');
                        icon.parentElement.classList.remove('bg-brand-accent/10',
                            'text-brand-accent');
                    } else {
                        content.classList.add('hidden');
                        icon.classList.replace('iconoir-minus', 'iconoir-plus');
                        parentItem.classList.remove('border-brand-accent/30', 'shadow-md');
                        icon.parentElement.classList.remove('rotate-180', 'bg-brand-accent',
                            'text-white');
                        icon.parentElement.classList.add('bg-brand-accent/10', 'text-brand-accent');
                    }
                });
            });

        });
    </script>

    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const mapItems = @json($homeMapItems);

                const mapEl = document.getElementById('home-map');
                const emptyBox = document.getElementById('home-map-empty');
                const countEl = document.getElementById('home-map-count');

                const filterButtons = document.querySelectorAll('#home-map-filters .map-filter-btn');

                const helpPanel = document.getElementById('map-help-panel');
                const helpToggle = document.getElementById('map-help-toggle');
                const helpClose = document.getElementById('map-help-close');

                if (!mapEl) return;

                // Titik fallback sekitar kawasan Jalan Pajagalan / Odeon Sukabumi.
                // Ini hanya dipakai kalau belum ada marker sama sekali.
                const fallbackCenter = [-6.9256, 106.9297];

                // Ambil semua koordinat marker dari database admin.
                const allCoordinates = mapItems
                    .filter(item => item.latitude && item.longitude)
                    .map(item => [Number(item.latitude), Number(item.longitude)]);

                // Kalau sudah ada marker, batas peta otomatis mengikuti marker.
                // Kalau belum ada marker, pakai batas kecil sekitar fallbackCenter.
                let odeonBounds;

                if (allCoordinates.length > 0) {
                    odeonBounds = L.latLngBounds(allCoordinates).pad(0.35);
                } else {
                    odeonBounds = L.latLngBounds(
                        [fallbackCenter[0] - 0.004, fallbackCenter[1] - 0.004],
                        [fallbackCenter[0] + 0.004, fallbackCenter[1] + 0.004]
                    );
                }

                const odeonCenter = allCoordinates.length > 0
                    ? odeonBounds.getCenter()
                    : fallbackCenter;

                const map = L.map('home-map', {
                    center: odeonCenter,
                    zoom: 17,
                    minZoom: 15,
                    maxZoom: 19,
                    maxBounds: odeonBounds,
                    maxBoundsViscosity: 0.9,
                    scrollWheelZoom: false
                });

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                const markerLayer = L.layerGroup().addTo(map);

                let currentFilter = 'all';

                function createMarkerIcon(type) {
                    const isAttraction = type === 'atraksi';

                    return L.divIcon({
                        className: '',
                        html: `
                            <div class="odeon-marker ${isAttraction ? 'attraction' : 'umkm'}">
                                <i class="${isAttraction ? 'iconoir-camera' : 'iconoir-shop'}"></i>
                            </div>
                        `,
                        iconSize: [44, 44],
                        iconAnchor: [22, 44],
                        tooltipAnchor: [0, -40],
                        popupAnchor: [0, -44]
                    });
                }

                function markerLabel(item) {
                    return `${item.typeLabel}: ${item.name}`;
                }

                function escapeHtml(value) {
                    return String(value ?? '')
                        .replaceAll('&', '&amp;')
                        .replaceAll('<', '&lt;')
                        .replaceAll('>', '&gt;')
                        .replaceAll('"', '&quot;')
                        .replaceAll("'", '&#039;');
                }

                function popupHtml(item) {
                    const isAttraction = item.type === 'atraksi';

                    const typeClass = isAttraction ? 'attraction' : 'umkm';
                    const typeIcon = isAttraction ? 'iconoir-camera' : 'iconoir-shop';
                    const detailText = isAttraction ? 'Detail' : 'Detail';

                    const chipText = isAttraction
                        ? (item.category || 'Atraksi')
                        : (item.price || item.category || 'UMKM');

                    return `
                        <div class="odeon-popup-card">
                            <div class="odeon-popup-top">
                                <img src="${escapeHtml(item.image)}" alt="${escapeHtml(item.name)}"
                                    onerror="this.src='https://placehold.co/400x250?text=No+Image'">

                                <div class="odeon-popup-badge ${typeClass}">
                                    <i class="${typeIcon}"></i>
                                    ${escapeHtml(item.typeLabel)}
                                </div>
                            </div>

                            <div class="odeon-popup-body">
                                <h3 class="odeon-popup-title">
                                    ${escapeHtml(item.name)}
                                </h3>

                                <p class="odeon-popup-desc">
                                    ${escapeHtml(item.description || 'Lokasi menarik di kawasan Odeon Kampoeng Naga.')}
                                </p>

                                <div class="odeon-popup-meta">
                                    <i class="iconoir-map-pin"></i>
                                    <span>${escapeHtml(item.location || 'Kawasan Odeon Sukabumi')}</span>
                                </div>

                                <div class="odeon-popup-footer">
                                    <div class="odeon-popup-chip">
                                        ${escapeHtml(chipText)}
                                    </div>

                                    <a href="${escapeHtml(item.url)}" class="odeon-popup-link">
                                        ${detailText}
                                        <i class="iconoir-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    `;
                }

                function renderMarkers() {
                    markerLayer.clearLayers();

                    const visibleItems = mapItems.filter(item => {
                        return currentFilter === 'all' || item.type === currentFilter;
                    });

                    if (countEl) {
                        const label = currentFilter === 'all'
                            ? 'Semua titik'
                            : currentFilter === 'atraksi'
                                ? 'Titik Atraksi'
                                : 'Titik UMKM';

                        countEl.innerHTML = `<i class="iconoir-map-pin"></i> ${visibleItems.length} ${label}`;
                    }

                    if (!visibleItems.length) {
                        if (emptyBox) emptyBox.classList.remove('hidden');
                        map.fitBounds(odeonBounds, {
                            padding: [40, 40],
                            maxZoom: 17
                        });
                        return;
                    }

                    if (emptyBox) emptyBox.classList.add('hidden');

                    const bounds = [];

                    visibleItems.forEach(item => {
                        const marker = L.marker([item.latitude, item.longitude], {
                            icon: createMarkerIcon(item.type),
                            title: markerLabel(item)
                        });

                    marker.bindTooltip(markerLabel(item), {
                        direction: 'top',
                        offset: [0, -10]
                    });

                    marker.bindPopup(popupHtml(item), {
                        className: 'odeon-map-popup',
                        maxWidth: 230,
                        minWidth: 220,
                        closeButton: true,
                        autoPan: true,
                        autoPanPadding: [22, 22]
                    });

                    marker.on('click', () => {
                        marker.openPopup();

                        map.flyTo([item.latitude, item.longitude], Math.max(map.getZoom(), 18), {
                            animate: true,
                            duration: 0.55
                        });
                    });

                    marker.addTo(markerLayer);
                    bounds.push([item.latitude, item.longitude]);
                    });

                    if (bounds.length > 1) {
                        const fitBounds = L.latLngBounds(bounds).pad(0.25);

                        map.fitBounds(fitBounds, {
                            padding: [55, 55],
                            maxZoom: 18
                        });
                    } else {
                        map.setView(bounds[0], 18);
                    }
                }

                filterButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        filterButtons.forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');

                        currentFilter = btn.dataset.filter || 'all';

                        renderMarkers();
                    });
                });

                /*
                    Petunjuk penggunaan bisa ditutup dan dimunculkan lagi.
                    Status disimpan di localStorage supaya kalau user refresh,
                    pilihan terakhir tetap tersimpan.
                */
                const savedHelpState = localStorage.getItem('odeon_map_help_hidden');

                if (savedHelpState === 'true') {
                    helpPanel?.classList.add('hidden');
                }

                helpClose?.addEventListener('click', () => {
                    helpPanel?.classList.add('hidden');
                    localStorage.setItem('odeon_map_help_hidden', 'true');
                });

                helpToggle?.addEventListener('click', () => {
                    helpPanel?.classList.toggle('hidden');

                    const isHidden = helpPanel?.classList.contains('hidden');
                    localStorage.setItem('odeon_map_help_hidden', isHidden ? 'true' : 'false');
                });

                /*
                    Kalau user maksa geser keluar batas,
                    peta akan dikembalikan ke kawasan Odeon.
                */
                map.on('dragend', () => {
                    if (!odeonBounds.contains(map.getCenter())) {
                        map.panInsideBounds(odeonBounds, {
                            animate: true
                        });
                    }
                });

                map.fitBounds(odeonBounds, {
                    padding: [40, 40],
                    maxZoom: 17
                });

                renderMarkers();
            });
        </script>
    @endpush

@endsection
