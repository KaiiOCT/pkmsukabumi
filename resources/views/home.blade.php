@extends('layouts.main')

@section('title', 'Beranda | Odeon Kampoeng Naga')

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
                            <p class="text-xs font-semibold uppercase tracking-wider mb-2 text-red-300">UMKM dan Kuliner</p>
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
            <div
                class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-brand-accent/20 transition-all duration-300 transform hover:-translate-y-1 flex flex-col reveal">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1517400508447-f8dd518b86db?q=80&w=800&auto=format&fit=crop"
                        alt="Walking Tour"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute top-4 left-4 bg-gradient-to-r from-amber-200 to-amber-100 text-amber-800 text-[10px] font-bold px-3 py-1.5 rounded-full shadow-lg uppercase tracking-wider flex items-center gap-1.5 border border-amber-300">
                        <i class="iconoir-star-solid text-amber-600"></i> Best Seller
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-xl font-bold text-brand-text mb-2 mt-0">Heritage Walking Tour</h3>
                    <p class="text-sm text-brand-muted leading-relaxed mb-6 line-clamp-2">
                        Menelusuri jejak sejarah perkembangan awal pecinan di Sukabumi, mendengarkan cerita lokal yang
                        melegenda.
                    </p>
                    <div class="flex items-end justify-between mt-auto pt-4 border-t border-gray-100">
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-brand-muted block mb-0.5 mt-0">Mulai
                                dari</span>
                            <span class="text-lg font-bold text-brand-accent block">Rp 50.000<span
                                    class="text-xs font-normal text-brand-muted">/pax</span></span>
                        </div>
                        <a href="{{ route('pages.paket-wisata-detail') }}"
                            class="text-brand-accent bg-red-50 hover:bg-red-100 w-10 h-10 flex items-center justify-center rounded-full transition">
                            <i class="iconoir-arrow-right text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-brand-accent/20 transition-all duration-300 transform hover:-translate-y-1 flex flex-col reveal">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop"
                        alt="Kuliner"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-xl font-bold text-brand-text mb-2 mt-0">Pecinan Culinary Trip</h3>
                    <p class="text-sm text-brand-muted leading-relaxed mb-6 line-clamp-2">
                        Perjalanan memanjakan lidah mencicipi berbagai hidangan khas akulturasi lokal dan Tionghoa yang
                        otentik.
                    </p>
                    <div class="flex items-end justify-between mt-auto pt-4 border-t border-gray-100">
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-brand-muted block mb-0.5 mt-0">Mulai
                                dari</span>
                            <span class="text-lg font-bold text-brand-accent block">Rp 120.000<span
                                    class="text-xs font-normal text-brand-muted">/pax</span></span>
                        </div>
                        <a href="{{ route('pages.paket-wisata-detail') }}"
                            class="text-brand-accent bg-red-50 hover:bg-red-100 w-10 h-10 flex items-center justify-center rounded-full transition">
                            <i class="iconoir-arrow-right text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-brand-accent/20 transition-all duration-300 transform hover:-translate-y-1 flex flex-col lg:col-span-1 md:col-span-2 md:w-1/2 md:mx-auto lg:w-auto lg:mx-0 reveal">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1512618831669-521d4b375f5d?q=80&w=800&auto=format&fit=crop"
                        alt="Edukasi"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-xl font-bold text-brand-text mb-2 mt-0">Paket Edukasi Budaya</h3>
                    <p class="text-sm text-brand-muted leading-relaxed mb-6 line-clamp-2">
                        Diperuntukkan bagi pelajar/mahasiswa. Eksplorasi mendalam terkait seni, tradisi, dan perpaduan
                        budaya.
                    </p>
                    <div class="flex items-end justify-between mt-auto pt-4 border-t border-gray-100">
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-brand-muted block mb-0.5 mt-0">Mulai
                                dari</span>
                            <span class="text-lg font-bold text-brand-accent block">Rp 75.000<span
                                    class="text-xs font-normal text-brand-muted">/pax</span></span>
                        </div>
                        <a href="{{ route('pages.paket-wisata-detail') }}"
                            class="text-brand-accent bg-red-50 hover:bg-red-100 w-10 h-10 flex items-center justify-center rounded-full transition">
                            <i class="iconoir-arrow-right text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
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

@endsection
