@extends('layouts.main')

@section('title', 'Eksplorasi Malam Odeon | Paket Wisata Kampoeng Naga')
@section('meta_description',
    'Detail paket wisata Eksplorasi Malam Odeon 2 Hari 1 Malam — lampion, vihara, kuliner, dan
    budaya pecinan Sukabumi dalam satu paket premium.')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <section
        class="relative pt-32 pb-40 overflow-hidden bg-gradient-to-br from-brand-dark-2 via-brand-accent-dark to-brand-dark">
        <div
            class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay">
        </div>
        <div class="absolute top-0 right-10 w-96 h-96 bg-brand-gold/15 rounded-full blur-3xl pointer-events-none"></div>
        <div
            class="absolute bottom-0 left-0 w-72 h-72 bg-brand-accent/30 rounded-full blur-3xl pointer-events-none -translate-x-1/2">
        </div>

        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 z-10 reveal">
            <div class="flex items-center gap-2 text-sm text-white/60 flex-wrap font-medium mb-8">
                <a href="{{ route('home') }}"
                    class="no-underline hover:text-white transition-colors duration-200 flex items-center gap-1">
                    Beranda
                </a>
                <i class="iconoir-nav-arrow-right text-sm opacity-50"></i>
                <a href="{{ route('pages.paket-wisata') }}"
                    class="no-underline hover:text-white transition-colors duration-200">Paket Wisata</a>
                <i class="iconoir-nav-arrow-right text-sm opacity-50"></i>
                <span class="text-brand-gold truncate max-w-[200px]">Eksplorasi Malam Odeon</span>
            </div>

            <div class="max-w-4xl">
                <div class="flex flex-wrap gap-2 mb-5">
                    <span class="badge bg-brand-gold text-brand-dark border-brand-gold shadow-gold">
                        <i class="iconoir-star-solid text-xs"></i> Best Seller
                    </span>
                    <span class="badge badge-white">
                        <i class="iconoir-moon-sat text-xs"></i> 2 Hari 1 Malam
                    </span>
                    <span class="badge bg-white/10 text-white border border-white/20 backdrop-blur-md">
                        <i class="iconoir-map-pin text-xs text-brand-gold"></i> Sukabumi, Jawa Barat
                    </span>
                </div>
                <h1 class="font-serif text-4xl md:text-5xl lg:text-[56px] font-bold text-white leading-tight mt-0 mb-4"
                    style="text-shadow: 0 4px 20px rgba(0,0,0,0.5);">
                    Eksplorasi Mendalam <br><span class="text-brand-gold italic">Kampoeng Naga Bermalam</span>
                </h1>

                <div class="flex items-center gap-3 mt-4">
                    <div class="flex items-center text-brand-gold text-lg">
                        <i class="iconoir-star-solid"></i><i class="iconoir-star-solid"></i><i
                            class="iconoir-star-solid"></i><i class="iconoir-star-solid"></i><i
                            class="iconoir-star-solid"></i>
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
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 h-[300px] md:h-[400px] lg:h-[500px] rounded-3xl overflow-hidden shadow-card-hover border-4 border-white dark:border-[#1E1212]">
                <a href="{{ asset('assets/vihara.jpeg') }}" data-fancybox="paket-galeri" data-caption="Vihara Widhi Sakti — Jantung Odeon" class="col-span-2 row-span-2 relative overflow-hidden group cursor-zoom-in bg-brand-dark block">
                    <img src="{{ asset('assets/vihara.jpeg') }}" alt="Vihara Widhi Sakti — Jantung Odeon"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-90 group-hover:opacity-100"
                        onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute top-4 right-4 w-10 h-10 bg-black/30 backdrop-blur-md rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i class="iconoir-zoom-in text-lg"></i>
                    </div>
                </a>

                @php
                    $photos = [
                        ['src' => 'assets/lorong.jpeg', 'alt' => 'Lorong Lampion Merah'],
                        ['src' => 'assets/pertunjukan.jpeg', 'alt' => 'Pertunjukan Barongsai'],
                        ['src' => 'assets/museum.jpeg', 'alt' => 'Museum Pecinan'],
                        ['src' => 'assets/kopitiam.jpeg', 'alt' => 'Kopitiam Suasana Malam'],
                    ];
                @endphp
                @foreach ($photos as $i => $photo)
                    <a href="{{ asset($photo['src']) }}" data-fancybox="paket-galeri" data-caption="{{ $photo['alt'] }}" class="relative overflow-hidden group cursor-zoom-in bg-brand-dark block">
                        <img src="{{ asset($photo['src']) }}" alt="{{ $photo['alt'] }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 opacity-90 group-hover:opacity-100"
                            onerror="this.src='https://images.unsplash.com/photo-1559028006-448665bd7c7f?q=80&w=400'">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                        
                        <div class="absolute top-3 right-3 w-8 h-8 bg-black/30 backdrop-blur-md rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="iconoir-zoom-in text-sm"></i>
                        </div>

                        @if ($loop->last)
                            <div class="absolute inset-0 bg-brand-dark/50 flex items-center justify-center backdrop-blur-sm group-hover:bg-brand-dark/40 transition-all">
                                <span class="text-white font-bold text-sm uppercase tracking-wider flex items-center gap-2">
                                    <i class="iconoir-media-image-list text-xl"></i> Lihat Semua Foto
                                </span>
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-4 px-5 sm:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">

            <div class="lg:col-span-7 xl:col-span-8 space-y-14">

                <div class="reveal">
                    <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-text dark:text-white mb-6">
                        Rasakan Nostalgia Masa Lampau
                    </h2>
                    <div class="space-y-5 text-brand-muted dark:text-white/70 leading-relaxed text-base md:text-[16.5px]">
                        <p class="text-lg font-serif text-brand-text dark:text-white italic">
                            "Bayangkan diri Anda berjalan menyusuri lorong-lorong pecinan kuno Sukabumi tepat saat lampion
                            merah mulai berpendar di bawah langit senja."
                        </p>
                        <p>
                            Paket perjalanan unggulan ini tidak dirancang sekadar untuk berlibur, melainkan untuk membawa
                            Anda menyelami <strong class="text-brand-text dark:text-white font-semibold">romantika kehidupan tempo
                                dulu</strong>, di mana harmoni budaya, kuliner legendaris, dan arsitektur otentik melebur
                            menjadi satu.
                        </p>
                        <p>
                            Eksplorasi Malam Odeon telah dinobatkan oleh ratusan wisatawan sebagai titik pelepas penat
                            terbaik untuk melarikan diri dari kesibukan ibukota. Anda cukup membawa diri berlenggang,
                            sisanya — tim kami yang mengurus segala kenyamanan Anda sejak ketibaan hingga kepulangan.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 py-2 reveal">
                    <div class="flex items-center gap-3.5 bg-brand-accent/5 p-4 rounded-2xl border border-brand-accent/10 hover:bg-brand-accent/10 transition-colors duration-300">
                        <div class="w-11 h-11 rounded-xl bg-white shadow-sm flex items-center justify-center shrink-0">
                            <i class="iconoir-clock text-2xl text-brand-accent"></i>
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-muted dark:text-white/50 mb-0.5">Durasi</span>
                            <span class="text-sm font-bold text-brand-text dark:text-white leading-none">2 Hari 1 Malam</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5 bg-brand-accent/5 p-4 rounded-2xl border border-brand-accent/10 hover:bg-brand-accent/10 transition-colors duration-300">
                        <div class="w-11 h-11 rounded-xl bg-white shadow-sm flex items-center justify-center shrink-0">
                            <i class="iconoir-group text-2xl text-brand-accent"></i>
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-muted dark:text-white/50 mb-0.5">Ukuran Grup</span>
                            <span class="text-sm font-bold text-brand-text dark:text-white leading-none">Min. 2 Orang</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5 bg-brand-accent/5 p-4 rounded-2xl border border-brand-accent/10 hover:bg-brand-accent/10 transition-colors duration-300">
                        <div class="w-11 h-11 rounded-xl bg-white shadow-sm flex items-center justify-center shrink-0">
                            <i class="iconoir-translate text-2xl text-brand-accent"></i>
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-muted dark:text-white/50 mb-0.5">Pemandu & Bahasa</span>
                            <span class="text-sm font-bold text-brand-text dark:text-white leading-none">Lokal & Indonesia</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5 bg-brand-accent/5 p-4 rounded-2xl border border-brand-accent/10 hover:bg-brand-accent/10 transition-colors duration-300">
                        <div class="w-11 h-11 rounded-xl bg-white shadow-sm flex items-center justify-center shrink-0">
                            <i class="iconoir-activity text-2xl text-brand-accent"></i>
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-muted dark:text-white/50 mb-0.5">Aktivitas</span>
                            <span class="text-sm font-bold text-brand-text dark:text-white leading-none">Budaya & Santai</span>
                        </div>
                    </div>
                </div>

                <div class="reveal">
                    <h2 class="font-serif text-3xl font-bold text-brand-text dark:text-white mb-8">Rencana Perjalanan</h2>
                    <div class="space-y-6">
                        <div class="rounded-3xl border border-brand-accent/10 bg-white dark:bg-[#1E1212] shadow-sm hover:shadow-card transition-shadow overflow-hidden">
                            <div class="flex items-center gap-4 p-6 pb-5 border-b border-brand-accent/8 bg-gradient-to-r from-brand-accent/5 to-transparent">
                                <div class="w-16 h-16 rounded-2xl bg-brand-accent text-white flex flex-col items-center justify-center shadow-md shrink-0">
                                    <span class="text-xs font-medium uppercase tracking-widest opacity-80">Hari</span>
                                    <span class="font-serif text-2xl font-bold leading-none">01</span>
                                </div>
                                <div>
                                    <h3 class="font-serif text-xl md:text-2xl font-bold text-brand-text dark:text-white m-0">Ketibaan & Petualangan Malam</h3>
                                    <p class="text-sm text-brand-muted dark:text-white/50 mt-1.5 m-0 flex items-center gap-1.5 font-medium">Pukul 14:00 – 21:00</p>
                                </div>
                            </div>
                            <div class="p-6 md:p-8 space-y-8">
                                @php
                                    $day1 = [
                                        ['time' => '14:00', 'color' => 'brand-accent', 'title' => 'Check-In Hotel & Welcome Tea', 'desc' => 'Layanan penjemputan atau pertemuan di lobi hotel pusat. Menikmati teh sambutan hangat seraya staf kami mengurus keperluan Check-In Anda.'],
                                        ['time' => '16:30', 'color' => 'brand-accent', 'title' => 'Penjelajahan Senja (Walking Tour)', 'desc' => 'Menyusuri nadi budaya di Jalan Pajagalan ditemani penutur sejarah lokal kami. Anda diajak masuk secara eksklusif mempelajari ukiran sakral altar Vihara Widhi Sakti.'],
                                        ['time' => '19:00', 'color' => 'brand-gold', 'title' => 'Simfoni Kuliner Malam', 'desc' => 'Puncak acara di mana Anda akan disajikan deretan makanan legendaris dari 3 kedai pusaka secara berkelanjutan. Hidangan panas, suasana malam lampion — tak terlupakan.'],
                                    ];
                                @endphp
                                @foreach ($day1 as $item)
                                    <div class="flex gap-5 relative">
                                        @if (!$loop->last)
                                            <div class="absolute left-[27px] top-8 bottom-[-2rem] w-[2px] bg-brand-accent/15"></div>
                                        @endif
                                        <div class="shrink-0 flex flex-col items-center relative z-10">
                                            <div class="w-14 h-8 rounded-lg bg-{{ $item['color'] }}/10 text-{{ $item['color'] === 'brand-gold' ? 'amber-600' : 'brand-accent' }} font-bold text-sm flex items-center justify-center border border-{{ $item['color'] }}/20">{{ $item['time'] }}</div>
                                        </div>
                                        <div class="flex-1 pb-2">
                                            <h4 class="font-bold text-brand-text dark:text-white mb-2 text-base md:text-lg">{{ $item['title'] }}</h4>
                                            <p class="text-sm text-brand-muted dark:text-white/60 leading-relaxed m-0">{{ $item['desc'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="rounded-3xl border border-brand-accent/10 bg-white dark:bg-[#1E1212] shadow-sm hover:shadow-card transition-shadow overflow-hidden">
                            <div class="flex items-center gap-4 p-6 pb-5 border-b border-brand-accent/8 bg-gradient-to-r from-brand-accent/5 to-transparent">
                                <div class="w-16 h-16 rounded-2xl bg-brand-accent text-white flex flex-col items-center justify-center shadow-md shrink-0">
                                    <span class="text-xs font-medium uppercase tracking-widest opacity-80">Hari</span>
                                    <span class="font-serif text-2xl font-bold leading-none">02</span>
                                </div>
                                <div>
                                    <h3 class="font-serif text-xl md:text-2xl font-bold text-brand-text dark:text-white m-0">Edukasi & Kepulangan</h3>
                                    <p class="text-sm text-brand-muted dark:text-white/50 mt-1.5 m-0 flex items-center gap-1.5 font-medium">Pukul 07:00 – 12:00</p>
                                </div>
                            </div>
                            <div class="p-6 md:p-8 space-y-8">
                                @php
                                    $day2 = [
                                        ['time' => '07:00', 'color' => 'brand-accent', 'title' => 'Romansa Pagi Pecinan', 'desc' => 'Menjemput udara segar sambil menyantap Dimsum kukus bambu yang mengepul di pinggir jalan yang riuh rendah nuansa pagi.'],
                                        ['time' => '09:00', 'color' => 'brand-accent', 'title' => 'Aktivitas Kebudayaan (Merangkai Lampion)', 'desc' => 'Kelas mini merakit suvenir karya mandiri (Lampion Kertas) dipandu ahli lokal untuk Anda bawa pulang sebagai kepingan memori berharga.'],
                                        ['time' => '12:00', 'color' => 'brand-gold', 'title' => 'Perjalanan Usai', 'desc' => 'Persiapan akhir. Anda kembali ke rutinitas dengan hati yang kembali terisi penuh.'],
                                    ];
                                @endphp
                                @foreach ($day2 as $item)
                                    <div class="flex gap-5 relative">
                                        @if (!$loop->last)
                                            <div class="absolute left-[27px] top-8 bottom-[-2rem] w-[2px] bg-brand-accent/15"></div>
                                        @endif
                                        <div class="shrink-0 flex flex-col items-center relative z-10">
                                            <div class="w-14 h-8 rounded-lg bg-{{ $item['color'] }}/10 text-{{ $item['color'] === 'brand-gold' ? 'amber-600' : 'brand-accent' }} font-bold text-sm flex items-center justify-center border border-{{ $item['color'] }}/20">{{ $item['time'] }}</div>
                                        </div>
                                        <div class="flex-1 pb-2">
                                            <h4 class="font-bold text-brand-text dark:text-white mb-2 text-base md:text-lg">{{ $item['title'] }}</h4>
                                            <p class="text-sm text-brand-muted dark:text-white/60 leading-relaxed m-0">{{ $item['desc'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reveal">
                    <h2 class="font-serif text-3xl font-bold text-brand-text dark:text-white mb-8">Informasi Layanan</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="rounded-3xl border border-emerald-200/60 dark:border-emerald-900/30 bg-emerald-50/40 dark:bg-emerald-900/10 p-8 shadow-sm">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-emerald-500 text-white flex items-center justify-center shadow-md shadow-emerald-500/20"><i class="iconoir-check-circle text-xl"></i></div>
                                <h3 class="font-bold text-emerald-900 dark:text-emerald-400 text-lg m-0">Termasuk</h3>
                            </div>
                            <ul class="space-y-4">
                                @php $included = ['Akomodasi Hotel Bintang 3 (1 Malam)', 'Tour Guide Berlisensi Resmi HPI', 'Kuliner Jalanan + Sarapan Dimsum', 'Tiket Donasi Vihara & Workshop', 'Cinderamata / Oleh-oleh Eksklusif']; @endphp
                                @foreach ($included as $item)
                                    <li class="flex items-start gap-3 text-[15px] font-medium text-emerald-800/80 dark:text-white/70"><i class="iconoir-check text-emerald-500 font-bold mt-0.5 shrink-0 text-lg"></i>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="rounded-3xl border border-rose-200/60 dark:border-rose-900/30 bg-rose-50/40 dark:bg-rose-900/10 p-8 shadow-sm">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-rose-500 text-white flex items-center justify-center shadow-md shadow-rose-500/20"><i class="iconoir-xmark-circle text-xl"></i></div>
                                <h3 class="font-bold text-rose-900 dark:text-rose-400 text-lg m-0">Tidak Termasuk</h3>
                            </div>
                            <ul class="space-y-4">
                                @php $excluded = ['Transportasi dari/ke Kota Sukabumi', 'Biaya Minibar & Tambahan Laundry', 'Pengeluaran Pribadi (Belanja extra)', 'Tip sukarela untuk pemandu lokal']; @endphp
                                @foreach ($excluded as $item)
                                    <li class="flex items-start gap-3 text-[15px] font-medium text-rose-800/80 dark:text-white/70"><i class="iconoir-xmark text-rose-500 font-bold mt-0.5 shrink-0 text-lg"></i>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-5 xl:col-span-4">
                <div class="sticky top-28 reveal">
                    <div class="bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-[0_8px_30px_rgb(139,26,26,0.12)] border border-brand-accent/15 dark:border-white/5 overflow-hidden">
                        <div class="bg-rose-50 dark:bg-rose-900/30 px-6 py-3 border-b border-rose-100 dark:border-rose-800 flex items-center justify-between">
                            <div class="flex items-center gap-2 text-rose-600 dark:text-rose-300 text-xs font-bold uppercase tracking-wider">Ketersediaan Terbatas</div>
                            <span class="text-xs font-bold text-rose-800 dark:text-rose-200 bg-rose-200/50 dark:bg-rose-800/40 px-2 py-1 rounded-md">Sisa 4 Slot</span>
                        </div>

                        <div class="p-8 pb-6">
                            <p class="text-sm font-semibold text-brand-muted dark:text-white/40 line-through mb-1">Rp 1.200.000</p>
                            <div class="font-serif text-[42px] font-extrabold text-brand-text dark:text-white leading-none flex items-baseline gap-1.5 mb-2">
                                Rp 850.000
                                <span class="text-base font-medium text-brand-muted dark:text-white/50 font-sans">/ pax</span>
                            </div>
                        </div>

                        <div class="p-8 py-6">
                            <ul class="space-y-4">
                                @php $policies = [['icon' => 'iconoir-calendar', 'text' => 'Bebas pilih tanggal (Termasuk Akhir Pekan)'], ['icon' => 'iconoir-wallet', 'text' => 'Bisa DP 50% untuk amankan slot'], ['icon' => 'iconoir-shield-check', 'text' => 'Jaminan uang kembali (H-7 Pembatalan)']]; @endphp
                                @foreach ($policies as $p)
                                    <li class="flex items-center gap-3.5">
                                        <i class="{{ $p['icon'] }} text-brand-gold text-xl shrink-0"></i>
                                        <span class="text-sm text-brand-text dark:text-white/80 font-medium leading-snug">{{ $p['text'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="p-8 bg-white dark:bg-[#1E1212]">
                            <button onclick="openBookingModal()"
                                class="flex items-center justify-center gap-2.5 w-full py-4 px-6 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-base shadow-lg shadow-brand-accent/30 dark:shadow-brand-gold/20 hover:-translate-y-1 transition-all duration-300 mb-4 outline-none cursor-pointer border-none">
                                <i class="iconoir-calendar-check text-2xl"></i>
                                Booking Sekarang
                            </button>

                            <div class="grid grid-cols-2 gap-3">
                                <button onclick="sharePackage()" class="w-full py-3.5 px-4 rounded-2xl border-2 border-gray-200 dark:border-white/10 bg-transparent text-brand-text dark:text-white/80 font-bold hover:border-brand-accent dark:hover:border-brand-gold hover:text-brand-accent dark:hover:text-brand-gold hover:bg-brand-accent/5 dark:hover:bg-brand-gold/5 transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer outline-none">
                                    <i class="iconoir-share-ios text-lg"></i> Bagikan
                                </button>
                                <a href="#" class="w-full py-3.5 px-4 rounded-2xl border-2 border-brand-accent/15 dark:border-brand-gold/20 bg-transparent text-brand-text dark:text-white/80 font-bold hover:border-brand-accent dark:hover:border-brand-gold hover:text-brand-accent dark:hover:text-brand-gold hover:bg-brand-accent/5 dark:hover:bg-brand-gold/5 transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer outline-none no-underline">
                                    <i class="iconoir-download text-lg"></i> Unduh PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="py-24 px-5 sm:px-8 relative overflow-hidden mt-6 mb-0 reveal">
        <div class="absolute inset-0 bg-gradient-to-br from-brand-accent via-[#6b1212] to-brand-dark"></div>
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-gold/30 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-brand-gold-light/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

        <div class="relative max-w-4xl mx-auto text-center reveal">
            <p class="text-brand-gold text-sm font-bold uppercase tracking-[0.2em] mb-3">Punya Rencana Lain?</p>
            <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6 leading-tight" style="text-shadow: 0 4px 24px rgba(0,0,0,0.4);">
                Atur Perjalanan <br> <span class="text-gradient-gold italic">Sesuai Keinginan Anda</span>
            </h2>
            <p class="text-lg md:text-xl text-[#FAF7F2]/80 mb-10 max-w-2xl mx-auto leading-relaxed font-medium">
                Selain paket yang tersedia, kami juga melayani kustomisasi jadwal khusus rombongan besar, kunjungan korporasi, atau tur edukasi sekolah.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="https://wa.me/6281234567890" target="_blank" class="btn-gold w-full sm:w-auto text-base px-8 py-3.5 shadow-xl shadow-brand-gold/20 flex items-center justify-center gap-2">
                    <i class="iconoir-chat-bubble text-lg"></i> Konsultasi Kustom
                </a>
                <a href="{{ route('pages.paket-wisata') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-full font-bold text-white border border-white/30 bg-white/10 hover:bg-white/20 transition-all backdrop-blur-sm no-underline">
                    Lihat Paket Lainnya
                </a>
            </div>
        </div>
    </section>

    <div id="bookingModal" class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeBookingModal()"></div>
        
        <div class="relative w-full max-w-2xl bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[95vh] sm:max-h-[90vh]">
            
            <div class="px-6 py-5 border-b border-gray-100 dark:border-white/5 flex items-center justify-between bg-gray-50/50 dark:bg-black/20">
                <div>
                    <h3 class="font-bold text-brand-text dark:text-white text-lg">Formulir Pemesanan</h3>
                    <p class="text-xs text-brand-muted dark:text-brand-gold/70 mt-0.5">Eksplorasi Malam Odeon (Rp 850.000 / pax)</p>
                </div>
                <button type="button" onclick="closeBookingModal()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-rose-50 dark:hover:bg-rose-500/10 text-gray-400 dark:text-white/40 hover:text-rose-500 dark:hover:text-rose-400 transition-colors outline-none cursor-pointer border-none bg-transparent">
                    <i class="iconoir-xmark text-xl"></i>
                </button>
            </div>

            <div class="p-6 sm:p-8 overflow-y-auto custom-scrollbar flex-1">

                <form id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="package_name" value="Eksplorasi Malam Odeon">
                    <input type="hidden" name="package_price" value="850000">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                            <input type="text" name="name" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Nomor WhatsApp <span class="text-rose-500">*</span></label>
                            <input type="number" name="phone" required placeholder="Contoh: 081234567890" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20">
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Email (Opsional)</label>
                        <input type="email" name="email" placeholder="Contoh: budi@email.com" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">
                                Tanggal Kedatangan <span class="text-rose-500">*</span>
                            </label>

                            <div class="relative">
                                <i class="iconoir-calendar absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 dark:text-white/40 pointer-events-none"></i>

                                <input
                                    type="date"
                                    name="date"
                                    required
                                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20"
                                    style="color-scheme: dark;"
                                >
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Jumlah Peserta <span class="text-rose-500">*</span></label>
                            <div class="relative">
                                <i class="iconoir-group absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 dark:text-white/40 pointer-events-none"></i>
                                <input type="number" name="pax" required min="2" value="2" class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20">
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-1.5">Pesan Khusus</label>
                        <textarea name="message" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white text-sm outline-none focus:ring-2 focus:ring-brand-accent/20"></textarea>
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row gap-3">
                        <button type="button" onclick="closeBookingModal()" class="w-full sm:w-1/3 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-transparent text-gray-600 dark:text-white/60 font-bold text-sm hover:bg-gray-50 transition-colors">
                            Batal
                        </button>

                        <!-- 🔥 SUBMIT FIX -->
                        <button type="submit" class="w-full sm:w-2/3 py-3.5 rounded-xl bg-brand-accent dark:bg-[#A91D1D] text-white font-bold text-sm shadow-lg hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                            Kirim Booking <i class="iconoir-send text-lg"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#cust_date", {
            dateFormat: "Y-m-d",     // format untuk backend Laravel
            altInput: true,          // bikin tampilan lebih cantik
            altFormat: "d F Y",      // contoh: 29 April 2026
            allowInput: false        // user tidak bisa ngetik manual
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox]", {
                Images: { zoom: true },
                Toolbar: { display: { right: ["slideshow", "thumbs", "close"] } },
            });

            const paxInput = document.getElementById('cust_pax');
            const calcText = document.getElementById('calc_text');
            const calcTotal = document.getElementById('calc_total');
            const pricePerPax = 850000;

            if(paxInput) {
                paxInput.addEventListener('input', function() {
                    const pax = parseInt(this.value) || 0;
                    if(pax > 0) {
                        const total = pax * pricePerPax;
                        calcText.innerText = `Rp ${pricePerPax.toLocaleString('id-ID')} x ${pax} pax`;
                        calcTotal.innerText = `Rp ${total.toLocaleString('id-ID')}`;
                    }
                });
            }
        });

        function sharePackage() {
            if (navigator.share) {
                navigator.share({
                    title: 'Eksplorasi Malam Odeon | Paket Wisata',
                    text: 'Lihat paket wisata menarik ini di Kampoeng Naga Sukabumi!',
                    url: window.location.href,
                }).catch(err => console.log('Error sharing', err));
            } else {
                navigator.clipboard.writeText(window.location.href);
                alert('Tautan disalin ke clipboard!');
            }
        }

        const bookingModal = document.getElementById('bookingModal');

        function openBookingModal() {
            bookingModal.classList.remove('hidden');
            setTimeout(() => bookingModal.classList.remove('opacity-0'), 10);
            document.body.style.overflow = 'hidden';
        }

        function closeBookingModal() {
            bookingModal.classList.add('opacity-0');
            setTimeout(() => {
                bookingModal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault(); // WAJIB

            const form = this;

            // kirim ke backend (POST Laravel)
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(res => res.text())
            .then(() => {

                // setelah sukses → kirim ke WA
                const name = form.name.value;
                const date = form.date.value;
                const pax = form.pax.value;

                let text = `Halo Admin Kampoeng Naga!%0A`;
                text += `Nama: ${name}%0A`;
                text += `Tanggal: ${date}%0A`;
                text += `Pax: ${pax}`;

                window.open(`https://wa.me/6281234567890?text=${text}`, '_blank');

                alert('Booking berhasil!');
                form.reset();
            });
        });
    </script>

@endsection