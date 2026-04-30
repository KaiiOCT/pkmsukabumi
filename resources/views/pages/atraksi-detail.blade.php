@extends('layouts.main')

@section('title', 'Gapura Utama Odeon | Daya Tarik Wisata Kampoeng Naga')
@section('meta_description',
    'Kepingan warisan arsitektur oriental yang memukau di jantung pecinan Sukabumi — Gapura
    Utama Odeon Kampoeng Naga, spot foto ikonik dan bersejarah.')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <section
        class="relative pt-32 pb-16 overflow-hidden bg-gradient-to-br from-brand-dark-2 via-brand-accent-dark to-brand-dark">
        <div
            class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay">
        </div>
        <div class="absolute top-0 right-10 w-72 h-72 bg-brand-gold/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 z-10 reveal">
            <div class="flex items-center gap-2 text-sm text-white/60 flex-wrap font-medium">
                <a href="{{ route('home') }}"
                    class="no-underline hover:text-white transition-colors duration-200 flex items-center gap-1">
                    Beranda
                </a>
                <i class="iconoir-nav-arrow-right text-sm opacity-50"></i>
                <a href="{{ route('pages.atraksi') }}"
                    class="no-underline hover:text-white transition-colors duration-200">Daya Tarik Wisata</a>
                <i class="iconoir-nav-arrow-right text-sm opacity-50"></i>
                <span class="text-brand-gold">Gapura Utama Odeon</span>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 64" preserveAspectRatio="none"
                class="w-full h-12 md:h-16 wave-divider">
                <path
                    d="M0,32L60,26.7C120,21,240,11,360,16C480,21,600,43,720,48C840,53,960,43,1080,37.3C1200,32,1320,32,1380,32L1440,32L1440,64L1380,64C1320,64,1200,64,1080,64C960,64,840,64,720,64C600,64,480,64,360,64C240,64,120,64,60,64L0,64Z" />
            </svg>
        </div>
    </section>

    <section class="pt-8 pb-10 px-5 sm:px-8">
        <div class="max-w-7xl mx-auto reveal">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-8">
                <div>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="badge badge-accent"><i class="iconoir-camera text-xs"></i> Ikonik</span>
                        <span class="badge bg-amber-50 text-amber-700 border border-amber-200"><i
                                class="iconoir-camera text-xs"></i> Foto Terfavorit</span>
                        <span class="badge bg-emerald-50 text-emerald-700 border border-emerald-200"><i
                                class="iconoir-map-pin text-xs"></i> Jl. Pajagalan, Sukabumi</span>
                    </div>
                    <h1
                        class="font-serif text-4xl md:text-5xl lg:text-[56px] font-bold text-brand-text leading-tight mt-0 mb-3">
                        Gapura Utama Odeon
                    </h1>
                    <p class="text-brand-muted text-base md:text-lg leading-relaxed max-w-2xl">
                        Arsitektur pembatas penanda masuk kawasan pusaka budaya Pecinan Kota Sukabumi.
                    </p>
                </div>

                <div class="flex items-center gap-3 shrink-0 mb-2">
                    <button onclick="shareAttraction()"
                        class="w-12 h-12 rounded-full border border-brand-accent/15 bg-white flex items-center justify-center text-brand-muted hover:text-brand-accent hover:border-brand-accent/30 shadow-sm hover:shadow-md transition-all duration-200 cursor-pointer outline-none"
                        aria-label="Bagikan">
                        <i class="iconoir-share-ios text-xl"></i>
                    </button>
                    <button id="likeBtn" onclick="toggleLike()"
                        class="w-12 h-12 rounded-full border border-brand-accent/15 bg-white flex items-center justify-center text-brand-muted hover:text-rose-500 hover:border-rose-200 shadow-sm hover:shadow-md transition-all duration-200 cursor-pointer outline-none"
                        aria-label="Simpan">
                        <i id="likeIcon" class="iconoir-heart text-xl transition-transform duration-300"></i>
                    </button>
                </div>
            </div>

            <a href="{{ asset('assets/vihara.jpeg') }}" data-fancybox="main-cover" data-caption="Gapura Utama Odeon"
                class="relative block rounded-[2rem] overflow-hidden h-[300px] md:h-[450px] lg:h-[550px] shadow-card-hover w-full group cursor-zoom-in">
                <img src="{{ asset('assets/vihara.jpeg') }}" alt="Gapura Utama Odeon"
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                    onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1200'">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-brand-dark/60 via-transparent to-transparent pointer-events-none">
                </div>

                <div
                    class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <div
                        class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white">
                        <i class="iconoir-zoom-in text-2xl"></i>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section class="pb-16 px-5 sm:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16 items-start">

            <div class="lg:col-span-2 space-y-12">
                <div class="reveal">
                    <h2 class="font-serif text-2xl md:text-3xl font-bold text-brand-text mb-6">Menjelajah Lebih Dalam</h2>
                    <div class="space-y-5 text-brand-muted leading-relaxed text-base md:text-[16.5px]">
                        <p>Gapura Utama Odeon bukan sekadar pintu masuk fisik, melainkan <strong
                                class="text-brand-text font-semibold">mesin waktu</strong> yang mengantarkan setiap
                            pengunjung ke era kejayaan akulturasi dua budaya di Tanah Pasundan...</p>
                    </div>
                </div>

                <div class="h-[1px] w-full bg-brand-accent/10"></div>

                <div class="reveal">
                    <h2 class="font-serif text-2xl font-bold text-brand-text mb-6">Galeri Sekitar</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @php $gallery = [
                                ['src' => 'assets/museum.jpeg', 'alt' => 'Museum Pecinan'],
                                ['src' => 'assets/kopitiam.jpeg', 'alt' => 'Kopitiam Lawas'],
                                ['src' => 'assets/lorong.jpeg', 'alt' => 'Lorong Lampion'],
                                ['src' => 'assets/pertunjukan.jpeg', 'alt' => 'Barongsai'],
                                ['src' => 'assets/vihara.jpeg', 'alt' => 'Vihara Widhi Sakti'],
                                ['src' => 'assets/hibah.jpeg', 'alt' => 'Suasana Malam'],
                                ['src' => 'assets/sundakarsa.jpeg', 'alt' => 'Kuliner Sekitar'],
                        ]; @endphp

                        @foreach (array_slice($gallery, 0, 5) as $index => $g)
                            <a href="{{ asset($g['src']) }}" data-fancybox="atraksi-galeri"
                                data-caption="{{ $g['alt'] }}"
                                class="block h-36 md:h-48 rounded-2xl overflow-hidden cursor-zoom-in group shadow-card hover:shadow-card-hover transition-shadow duration-300 relative">
                                <img src="{{ asset($g['src']) }}" alt="{{ $g['alt'] }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    onerror="this.src='https://images.unsplash.com/photo-1559028006-448665bd7c7f?q=80&w=400'">
                                <div
                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300">
                                </div>
                            </a>
                        @endforeach

                        @if (count($gallery) > 5)
                            <a href="{{ asset($gallery[5]['src']) }}" data-fancybox="atraksi-galeri"
                                data-caption="{{ $gallery[5]['alt'] }}"
                                class="block h-36 md:h-48 rounded-2xl overflow-hidden cursor-pointer group bg-brand-accent/5 border-2 border-dashed border-brand-accent/20 hover:bg-brand-accent/10 hover:border-brand-accent/40 transition-all duration-300 relative">
                                <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-2">
                                    <i
                                        class="iconoir-media-image-list text-3xl text-brand-accent block mb-2 group-hover:scale-110 transition-transform"></i>
                                    <span class="text-sm font-bold text-brand-accent">Lihat Semua
                                        ({{ count($gallery) }})</span>
                                </div>
                            </a>

                            <div class="hidden">
                                @foreach (array_slice($gallery, 6) as $g)
                                    <a href="{{ asset($g['src']) }}" data-fancybox="atraksi-galeri"
                                        data-caption="{{ $g['alt'] }}"></a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6 reveal">
                    <div class="bg-white rounded-3xl shadow-card border border-brand-accent/10 overflow-hidden">
                        <div class="p-7">
                            <h3 class="font-serif text-xl font-bold text-brand-text mb-6">Info Praktis</h3>
                            <ul class="space-y-6">
                                @php $infos = [['icon' => 'iconoir-clock', 'label' => 'Jam Operasional', 'value' => 'Setiap Hari (24 Jam)'], ['icon' => 'iconoir-dollar', 'label' => 'Tiket Masuk', 'value' => 'Gratis'], ['icon' => 'iconoir-wifi', 'label' => 'Fasilitas', 'value' => 'Toilet & Parkir Tersedia']]; @endphp
                                @foreach ($infos as $info)
                                    <li class="flex items-start gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-brand-accent/8 flex items-center justify-center shrink-0 mt-0.5">
                                            <i class="{{ $info['icon'] }} text-brand-accent text-lg"></i>
                                        </div>
                                        <div>
                                            <p
                                                class="text-[10px] uppercase tracking-widest font-bold text-brand-muted mb-1">
                                                {{ $info['label'] }}</p>

                                            @if ($info['label'] == 'Fasilitas')
                                                <ul class="space-y-1">
                                                    @foreach (explode(',', $info['value']) as $item)
                                                        <li
                                                            class="text-sm font-bold text-brand-text flex items-center gap-2">
                                                            <span
                                                                class="w-1.5 h-1.5 rounded-full bg-brand-accent/40"></span>
                                                            {{ trim($item) }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="text-sm font-bold text-brand-text">{{ $info['value'] }}</p>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl shadow-card border border-brand-accent/10 p-7 text-center">
                        <div class="w-14 h-14 rounded-full bg-amber-50 mx-auto flex items-center justify-center mb-4">
                            <i class="iconoir-star-solid text-3xl text-amber-500"></i>
                        </div>
                        <h3 class="font-serif text-lg font-bold text-brand-text mb-2">Bantu Wisatawan Lain</h3>
                        <p class="text-sm text-brand-muted mb-6 leading-relaxed">Bagikan momen terbaik dan berikan rating
                            ulasan Anda untuk Atraksi ini di Google Maps.</p>
                        <div class="flex flex-col gap-3">
                            <a href="#" target="_blank"
                                class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl bg-amber-50 text-amber-700 border border-amber-200 text-sm font-bold hover:bg-amber-100 hover:border-amber-300 transition-all duration-300 no-underline">Beri
                                Ulasan</a>
                            <a href="#" target="_blank"
                                class="flex items-center justify-center gap-2 w-full py-3.5 rounded-xl border border-gray-200 text-brand-muted text-sm font-bold hover:border-brand-accent hover:text-brand-accent transition-all duration-300 no-underline">Buka
                                Titik Maps</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="py-24 px-5 sm:px-8 relative overflow-hidden mt-6 mb-0 reveal">
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
            <p class="text-brand-gold text-sm font-bold uppercase tracking-[0.2em] mb-3">Ingin Berkunjung?</p>
            <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6 leading-tight"
                style="text-shadow: 0 4px 24px rgba(0,0,0,0.4);">
                Jadikan Ini Bagian dari <br> <span class="text-gradient-gold italic">Perjalanan Anda</span>
            </h2>
            <p class="text-lg md:text-xl text-[#FAF7F2]/80 mb-10 max-w-2xl mx-auto leading-relaxed font-medium">
                Nikmati kemudahan menjelajahi Gapura Utama Odeon dan puluhan destinasi menarik lainnya melalui paket wisata
                yang telah kami rancang khusus untuk Anda.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('pages.paket-wisata') }}"
                    class="btn-gold w-full sm:w-auto text-base px-8 py-3.5 shadow-xl shadow-brand-gold/20 flex items-center justify-center gap-2">
                    <i class="iconoir-map text-lg"></i> Pesan Paket Wisata
                </a>
                <a href="{{ route('pages.atraksi') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-full font-bold text-white border border-white/30 bg-white/10 hover:bg-white/20 transition-all backdrop-blur-sm no-underline">
                    Lihat Atraksi Lainnya
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

        function shareAttraction() {
            if (navigator.share) {
                navigator.share({
                    title: 'Gapura Utama Odeon | Atraksi Kampoeng Naga',
                    text: 'Lihat daya tarik wisata keren ini di Kampoeng Naga Sukabumi!',
                    url: window.location.href,
                }).catch((error) => console.log('Error sharing', error));
            } else {
                navigator.clipboard.writeText(window.location.href);
                alert('Tautan atraksi berhasil disalin ke clipboard!');
            }
        }

        function toggleLike() {
            const btn = document.getElementById('likeBtn');
            const icon = document.getElementById('likeIcon');
            
            icon.classList.add('scale-75');
            setTimeout(() => icon.classList.remove('scale-75'), 150);

            if (icon.classList.contains('iconoir-heart')) {
                icon.classList.replace('iconoir-heart', 'iconoir-heart-solid');
                btn.classList.add('text-rose-500', 'border-rose-200', 'bg-rose-50');
                btn.classList.remove('text-brand-muted');
            } else {
                icon.classList.replace('iconoir-heart-solid', 'iconoir-heart');
                btn.classList.remove('text-rose-500', 'border-rose-200', 'bg-rose-50');
                btn.classList.add('text-brand-muted');
            }
        }
    </script>

@endsection