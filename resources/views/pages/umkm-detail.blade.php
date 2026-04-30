@extends('layouts.main')

@section('title', $umkm->name . ' | UMKM & Kuliner Odeon')
@section('meta_description', $umkm->description)

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <section
        class="relative pt-32 pb-40 overflow-hidden bg-gradient-to-br from-brand-dark-2 via-brand-accent-dark to-brand-dark">
        <div
            class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay">
        </div>
        <div class="absolute top-0 right-10 w-96 h-96 bg-brand-gold/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 z-10 reveal">
            <div class="flex items-center gap-2 text-sm text-white/60 flex-wrap font-medium mb-8">
                <a href="{{ route('home') }}"
                    class="no-underline hover:text-white transition-colors duration-200 flex items-center gap-1">
                    Beranda
                </a>
                <i class="iconoir-nav-arrow-right text-sm opacity-50"></i>
                <a href="{{ route('pages.umkm') }}"
                    class="no-underline hover:text-white transition-colors duration-200">UMKM & Kuliner</a>
                <i class="iconoir-nav-arrow-right text-sm opacity-50"></i>
                <span class="text-brand-gold truncate max-w-[200px]">{{ $umkm->name }}</span>
            </div>

            <div class="max-w-4xl">
                <div class="flex flex-wrap gap-2 mb-5">
                    <span class="badge bg-brand-gold">
                        {{ $umkm->category }}
                    </span>

                    <span class="badge badge-white">
                        {{ $umkm->slogan }}
                    </span>

                    <span class="badge bg-emerald-600 text-white border-emerald-600 shadow-lg shadow-emerald-600/20">
                        UMKM Lokal
                    </span>
                </div>

                <h1 class="font-serif text-4xl md:text-5xl lg:text-[56px] font-bold text-white leading-tight mt-0 mb-4">
                    {!! nl2br(e($umkm->name)) !!}
                </h1>

                <div class="flex items-center gap-6 text-white/80">
                    <div class="flex items-center">
                        <i class="iconoir-star-solid text-brand-gold"></i>
                        <i class="iconoir-star-solid text-brand-gold"></i>
                        <i class="iconoir-star-solid text-brand-gold"></i>
                        <i class="iconoir-star-solid text-brand-gold"></i>
                        <i class="iconoir-star-solid text-brand-gold"></i>
                    </div>

                    <div class="flex items-center gap-2 pl-10 border-l border-white/20">
                        <i class="iconoir-shop text-brand-gold"></i>
                        <span class="font-medium text-sm">Pemilik: {{ $umkm->owner_highlight }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 64" preserveAspectRatio="none"
                class="w-full h-12 md:h-20 wave-divider">
                <path
                    d="M0,32L60,26.7C120,21,240,11,360,16C480,21,600,43,720,48C840,53,960,43,1080,37.3C1200,32,1320,32,1380,32L1440,32L1440,64L1380,64C1320,64,1200,64,1080,64C960,64,840,64,720,64C600,64,480,64,360,64C240,64,120,64,60,64L0,64Z" />
            </svg>
        </div>
    </section>

    <section class="px-5 sm:px-8 relative z-20 -mt-24 md:-mt-32 mb-12">
        <div class="max-w-7xl mx-auto">
            <div
                class="grid grid-cols-2 md:grid-cols-4 gap-3 h-[300px] md:h-[450px] rounded-3xl overflow-hidden shadow-card-hover border-4 border-white dark:border-[#1E1212]">

                @php
                    $gallery = is_array($umkm->gallery) ? $umkm->gallery : json_decode($umkm->gallery ?? '[]', true);
                @endphp

                <a href="{{ asset('storage/' . $umkm->main_image) }}" data-fancybox="umkm-galeri"
                    class="col-span-2 row-span-2 relative overflow-hidden group cursor-zoom-in block">
                    <img src="{{ asset('storage/' . $umkm->main_image) }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </a>

                @foreach (array_slice($gallery, 0, 2) as $img)
                    <a href="{{ asset('storage/' . $img) }}" data-fancybox="umkm-galeri"
                        class="relative overflow-hidden group cursor-zoom-in block">
                        <img src="{{ asset('storage/' . $img) }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </a>
                @endforeach

                <a href="{{ asset('storage/' . $umkm->main_image) }}" data-fancybox="umkm-galeri"
                    class="col-span-2 relative overflow-hidden group cursor-zoom-in block">
                    <img src="{{ asset('storage/' . $umkm->main_image) }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div
                        class="absolute inset-0 bg-brand-dark/40 flex items-center justify-center backdrop-blur-sm group-hover:bg-brand-dark/50 transition-colors duration-300">
                        <span class="text-white font-bold text-sm uppercase tracking-wider flex items-center gap-2">
                            <i class="iconoir-media-image-list text-xl"></i> Lihat Suasana Warung
                        </span>
                    </div>
                </a>

            </div>
        </div>
    </section>

    <section class="py-4 px-5 sm:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

            <div class="lg:col-span-7 xl:col-span-8 space-y-14">

                <div class="reveal">
                    <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-text dark:text-white mb-6">
                        {{ $umkm->slogan }}
                    </h2>

                    <div class="space-y-5 text-brand-muted dark:text-white/70 leading-relaxed text-base md:text-[16.5px]">
                        <p>{{ $umkm->description }}</p>
                    </div>
                </div>

                <div class="reveal">
                    <h2 class="font-serif text-2xl font-bold text-brand-text dark:text-white mb-8 flex items-center gap-3">
                        <span class="w-10 h-[1px] bg-brand-accent"></span> Menu {{ $umkm->name }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        @php
                            $menus = is_array($umkm->menu) ? $umkm->menu : json_decode($umkm->menu ?? '[]', true);
                        @endphp

                        @foreach ($menus as $m)
                            <div
                                class="p-6 rounded-2xl bg-white dark:bg-[#1A1010] border border-brand-accent/10 dark:border-white/5 shadow-sm">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold text-brand-text dark:text-white text-lg">{{ $m['name'] }}</h4>
                                    <span class="text-brand-accent dark:text-brand-gold font-bold">Rp
                                        {{ number_format($m['price'], 0, ',', '.') }}</span>
                                </div>
                                <p class="text-sm text-brand-muted dark:text-white/60 leading-relaxed">{{ $m['desc'] }}
                                </p>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

            <div class="lg:col-span-5 xl:col-span-4">
                <div class="sticky top-28 space-y-6 reveal">

                    <div
                        class="bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-card border border-brand-accent/10 dark:border-white/10 overflow-hidden">
                        <div class="p-8">

                            <div class="flex items-center justify-between mb-8">
                                <span
                                    class="text-sm font-bold uppercase tracking-widest text-brand-muted dark:text-white/40">Status
                                    Sekarang</span>

                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50 text-[11px] font-extrabold uppercase">
                                    {{ $umkm->is_open ? 'Buka' : 'Tutup' }}
                                </span>
                            </div>

                            <ul class="space-y-6">

                                <li class="flex gap-4">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-brand-accent/8 flex items-center justify-center shrink-0">
                                        <i class="iconoir-clock text-brand-accent text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] uppercase font-bold text-brand-muted dark:text-white/40 mb-1">
                                            Jam Operasional</p>
                                        <p class="text-sm font-bold text-brand-text dark:text-white">
                                            {{ date('H:i', strtotime($umkm->open_time)) }} –
                                            {{ date('H:i', strtotime($umkm->close_time)) }} WIB
                                        </p>
                                    </div>
                                </li>

                                <li class="flex gap-4">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-brand-accent/8 flex items-center justify-center shrink-0">
                                        <i class="iconoir-map-pin text-brand-accent text-lg"></i>
                                    </div>
                                    <div>
                                        <p class="text-[10px] uppercase font-bold text-brand-muted dark:text-white/40 mb-1">
                                            Lokasi Presisi</p>
                                        <p class="text-sm font-bold text-brand-text dark:text-white">{{ $umkm->address }}
                                        </p>
                                    </div>
                                </li>

                            </ul>

                            <div class="mt-10">
                                <a href="https://wa.me/{{ $umkm->whatsapp }}" target="_blank"
                                    class="flex items-center justify-center gap-3 w-full py-4 rounded-2xl bg-[#25D366] text-white font-bold shadow-lg shadow-emerald-500/30 hover:-translate-y-1 transition-all no-underline">
                                    <i class="iconoir-whatsapp text-2xl"></i>
                                    Hubungi Penjual
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <section class="py-24 px-5 sm:px-8 relative overflow-hidden mt-12 mb-0 reveal">
        <div class="absolute inset-0 bg-gradient-to-br from-brand-accent via-[#6b1212] to-brand-dark"></div>
        <div
            class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay">
        </div>

        <div class="relative max-w-4xl mx-auto text-center">
            <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                Punya Bisnis di Kawasan Odeon?
            </h2>

            <p class="text-lg text-[#FAF7F2]/80 mb-10 max-w-2xl mx-auto">
                Bergabunglah bersama puluhan mitra UMKM lainnya dan jangkau ribuan wisatawan setiap bulannya. Mari
                kembangkan ekonomi lokal bersama.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#" class="btn-gold w-full sm:w-auto px-8 py-4 flex items-center justify-center gap-2">
                    <i class="iconoir-shop text-lg"></i> Daftarkan UMKM Anda
                </a>

                <a href="{{ route('pages.umkm') }}"
                    class="w-full sm:w-auto px-8 py-4 rounded-full font-bold text-white border border-white/30 bg-white/10 hover:bg-white/20 transition-all no-underline">
                    Lihat UMKM Lainnya
                </a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox]", {
                Images: {
                    zoom: true,
                },
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: [
                            "zoomIn",
                            "zoomOut",
                            "toggle1to1",
                            "rotateCCW",
                            "rotateCW",
                            "flipX",
                            "flipY",
                        ],
                        right: ["slideshow", "thumbs", "close"],
                    },
                },
            });
        });
    </script>

@endsection
