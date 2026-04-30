@extends('layouts.main')

@section('title', 'Daya Tarik Wisata | Odeon Kampoeng Naga')
@section('meta_description',
    'Jelajahi berbagai daya tarik wisata di Odeon Kampoeng Naga Sukabumi — vihara bersejarah,
    lorong lampion, pertunjukan barongsai, dan kuliner autentik pecinan.')

@section('content')

    <section
        class="relative pt-36 pb-28 px-5 sm:px-8 overflow-hidden bg-gradient-to-br from-brand-dark-2 via-brand-dark to-brand-accent-dark">

        <div class="absolute inset-0">
            <img src="{{ asset('assets/lorong.jpeg') }}" alt="Atraksi Wisata Odeon"
                class="w-full h-full object-cover opacity-15" onerror="this.style.display='none'">
        </div>

        <div class="absolute top-1/4 right-10 w-72 h-72 bg-brand-gold/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-40 bg-brand-accent/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-4xl mx-auto text-center reveal">
            <h1 class="font-serif text-5xl md:text-6xl font-bold text-white mb-5 leading-tight">
                Daya Tarik <span class="text-gradient-gold italic">Wisata</span>
            </h1>
            <p class="text-lg text-white/65 leading-relaxed max-w-2xl mx-auto">
                Menelusuri keindahan arsitektur bersejarah, atraksi budaya yang autentik, dan pusat-pusat kebudayaan yang
                melebur bersama kehidupan masyarakat lokal.
            </p>
        </div>

        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 64" preserveAspectRatio="none"
                class="w-full h-16 wave-divider">
                <path
                    d="M0,32L60,26.7C120,21,240,11,360,16C480,21,600,43,720,48C840,53,960,43,1080,37.3C1200,32,1320,32,1380,32L1440,32L1440,64L1380,64C1320,64,1200,64,1080,64C960,64,840,64,720,64C600,64,480,64,360,64C240,64,120,64,60,64L0,64Z" />
            </svg>
        </div>
    </section>


    <section class="py-10 px-5 sm:px-8 -mt-2">
        <div class="max-w-6xl mx-auto">

            <div class="mb-8 text-center md:text-left reveal">
                <h2 class="font-serif text-2xl md:text-3xl font-bold text-brand-text mb-2">Mau Ke Mana Hari Ini?</h2>
                <p class="text-brand-muted text-sm">Pilih kategori wisata di bawah atau cari langsung nama tempat yang ingin
                    kamu jelajahi.</p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-5 reveal">

                <div class="flex flex-wrap gap-2 justify-center md:justify-start" id="atraksi-filters">
                    <button class="filter-pill active" data-target="all">
                        <i class="iconoir-grid-plus text-sm"></i> Semua
                    </button>
                    <button class="filter-pill" data-target="ikonik">
                        Ikonik
                    </button>
                    <button class="filter-pill" data-target="budaya">
                        Religi &amp; Budaya
                    </button>
                    <button class="filter-pill" data-target="hiburan">
                        Hiburan &amp; Acara
                    </button>
                    <button class="filter-pill" data-target="lokal">
                        Suasana Lokal
                    </button>
                </div>

                <div class="relative w-full md:w-80 shrink-0">
                    <input type="text" id="search-input" placeholder="Cari atraksi atau kata kunci..."
                        class="search-input pr-10 pl-12" aria-label="Cari atraksi wisata">

                    <i
                        class="iconoir-search absolute left-4 top-1/2 -translate-y-1/2 text-brand-muted text-lg pointer-events-none z-10"></i>

                    <button id="clear-search"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-brand-muted hover:text-brand-accent transition-colors hidden cursor-pointer border-none bg-transparent z-10"
                        aria-label="Hapus pencarian">
                        <i class="iconoir-xmark text-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>


    <section class="pb-24 px-5 sm:px-8">
        <div class="max-w-6xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7" id="atraksi-grid">

                @php
                    $atraksi = [
                        [
                            'image' => 'assets/museum.jpeg',
                            'category' => 'ikonik',
                            'title' => 'Gapura Utama Odeon',
                            'badge' => 'Ikonik',
                            'desc' =>
                                'Gerbang masuk utama yang memancarkan arsitektur oriental klasik nan megah. Menjadi spot foto terfavorit karena nilai historisnya sebagai penanda batas kultural sejak zaman Belanda.',
                            'search' => 'gapura utama odeon ikonik sejarah',
                        ],
                        [
                            'image' => 'assets/vihara.jpeg',
                            'category' => 'budaya',
                            'title' => 'Vihara Widhi Sakti',
                            'badge' => 'Religi & Budaya',
                            'desc' =>
                                'Salah satu kelenteng tertua di Kota Sukabumi. Berdiri dengan desain kaya pilar naga melilit, tempat suci bagi umat Buddha ini terbuka bagi pengunjung dari semua kalangan.',
                            'search' => 'vihara widhi sakti kelenteng ibadah',
                        ],
                        [
                            'image' => 'assets/lorong.jpeg',
                            'category' => 'lokal',
                            'title' => 'Lorong Lampion Merah',
                            'badge' => 'Suasana Lokal',
                            'desc' =>
                                'Ruas jalan yang menjadi lautan lampion saat malam hari. Suasana meriah ditemani temaram cahaya merah muda menjadi pelarian bagi para pencari estetika perkotaan.',
                            'search' => 'lorong lampion merah malam estetika',
                        ],
                        [
                            'image' => 'assets/pertunjukan.jpeg',
                            'category' => 'hiburan',
                            'title' => 'Pertunjukan Barongsai',
                            'badge' => 'Hiburan & Acara',
                            'desc' =>
                                'Akrobatik tradisional perwujudan singa naga yang memukau. Kerap memeriahkan area jalan setiap festival Cap Go Meh yang sukses menarik ribuan pengunjung lokal.',
                            'search' => 'pertunjukan barongsai seni singa naga cap go meh',
                        ],
                        [
                            'image' => 'assets/kopitiam.jpeg',
                            'category' => 'lokal',
                            'title' => 'Kopitiam Sudut Kota',
                            'badge' => 'Suasana Lokal',
                            'desc' =>
                                'Nikmati sentuhan masa lampau melalui barisan kedai klasik pinggir jalan yang ramah dan tak lekang oleh waktu. Tempat meleburnya para pewaris sejarah dan pemuda kota.',
                            'search' => 'kopitiam sudut kota warung kopi tongkrongan',
                        ],
                        [
                            'image' =>
                                'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800&auto=format&fit=crop',
                            'category' => 'hiburan',
                            'title' => 'Pasar Kuliner Senggol',
                            'badge' => 'Hiburan & Acara',
                            'desc' =>
                                'Beragam sajian akulturasi di hamparan tenda yang digelar pada akhir pekan. Aroma makanan oriental dan bumbu selera Nusantara mengundang penikmat santap senja.',
                            'search' => 'pasar kuliner senggol belanja bazar',
                        ],
                    ];
                @endphp

                @foreach ($atraksi as $a)
                    <article class="atraksi-item card group flex flex-col cursor-pointer reveal"
                        data-category="{{ $a['category'] }}" data-title="{{ $a['search'] }}">

                        <div class="card-image h-60">
                            <img src="{{ Str::startsWith($a['image'], 'http') ? $a['image'] : asset($a['image']) }}"
                                alt="{{ $a['title'] }}"
                                onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=600'">
                            <div class="absolute inset-0 bg-gradient-card pointer-events-none"></div>

                            <div class="absolute top-3 left-3">
                                <span class="badge badge-white text-[10px]">{{ $a['badge'] }}</span>
                            </div>

                            <div
                                class="absolute inset-0 flex items-end p-5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a href="{{ route('pages.atraksi-detail') }}"
                                    class="w-full text-center py-3 rounded-xl bg-white/90 backdrop-blur-sm
                                  text-brand-accent text-sm font-bold no-underline
                                  hover:bg-white transition-colors duration-200">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                        <div class="card-body flex flex-col flex-1">
                            <h3
                                class="font-serif text-xl font-bold text-brand-text group-hover:text-brand-accent
                               transition-colors duration-300 mb-2.5 mt-0 leading-snug">
                                <a href="{{ route('pages.atraksi-detail') }}"
                                    class="no-underline text-inherit">{{ $a['title'] }}</a>
                            </h3>
                            <p class="text-sm text-brand-muted leading-relaxed mb-5 flex-1 line-clamp-3">
                                {{ $a['desc'] }}
                            </p>
                            <div class="mt-auto flex items-center justify-between border-t border-gray-100 dark:border-white/5 pt-4">
                                
                                <a href="{{ route('pages.atraksi-detail') }}"
                                    class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-accent
                                  no-underline hover:gap-3 transition-all duration-300 group/link">
                                    Selengkapnya
                                    <i class="iconoir-arrow-right group-hover/link:translate-x-1 transition-transform duration-300"></i>
                                </a>

                                <div class="flex items-center gap-1.5" title="Jumlah orang yang menyukai atraksi ini">
                                    <i class="iconoir-heart-solid text-rose-500 text-lg"></i>
                                    <span class="text-xs font-bold text-gray-600 dark:text-white/70">{{ rand(120, 999) }}</span>
                                </div>
                                
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>

            <div id="no-result" class="hidden text-center py-24 max-w-sm mx-auto">
                <div class="w-20 h-20 rounded-3xl bg-brand-accent/8 flex items-center justify-center mx-auto mb-5">
                    <i class="iconoir-search text-3xl text-brand-accent"></i>
                </div>
                <h3 class="font-serif text-2xl font-bold text-brand-text mb-2">Tidak ditemukan</h3>
                <p class="text-brand-muted text-sm">Coba kata kunci atau kategori yang berbeda.</p>
            </div>
        </div>
    </section>


    <section class="py-20 px-5 sm:px-8 bg-brand-secondary">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14 reveal">
                <p class="section-eyebrow mb-3">Panduan Wisatawan</p>
                <h2 class="section-title mb-4">Tips Berkunjung</h2>
                <span class="gold-line mx-auto"></span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php $tips = [
                        [
                            'icon' => 'iconoir-sun-light',
                            'title' => 'Waktu Terbaik',
                            'desc' =>
                                'Kunjungi sore hari (16:00-19:00) saat lampion mulai menyala dan cahaya matahari memberi nuansa dramatis.',
                        ],
                        [
                            'icon' => 'iconoir-shirt',
                            'title' => 'Berpakaian',
                            'desc' =>
                                'Kenakan pakaian sopan terutama saat memasuki area vihara. Sepatu nyaman sangat disarankan untuk walking tour.',
                        ],
                        [
                            'icon' => 'iconoir-camera',
                            'title' => 'Fotografi',
                            'desc' =>
                                'Bawa kamera atau charging ponsel penuh! Hampir setiap sudut kawasan adalah spot foto yang instagrammable.',
                        ],
                        [
                            'icon' => 'iconoir-parking',
                            'title' => 'Parkir',
                            'desc' =>
                                'Tersedia area parkir di sekitar kawasan. Disarankan datang dengan angkutan umum atau jalan kaki dari stasiun.',
                        ],
                    ];
                @endphp
                @foreach ($tips as $t)
                    <div
                        class="reveal group bg-white rounded-3xl p-7 shadow-card border border-brand-accent/6
                        hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-12 h-12 rounded-2xl bg-brand-accent/8 flex items-center justify-center mb-5
                            group-hover:bg-brand-accent transition-colors duration-300">
                            <i
                                class="{{ $t['icon'] }} text-brand-accent text-xl group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h4 class="font-bold text-brand-text mb-2">{{ $t['title'] }}</h4>
                        <p class="text-sm text-brand-muted leading-relaxed">{{ $t['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 px-5 sm:px-8 relative overflow-hidden mt-12 mb-0 reveal">
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
            <p class="text-brand-gold text-sm font-bold uppercase tracking-[0.2em] mb-3">Jelajahi Lebih Jauh</p>
            <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6 leading-tight"
                style="text-shadow: 0 4px 24px rgba(0,0,0,0.4);">
                Siap Memulai Petualangan Budaya di <br> <span class="text-gradient-gold italic">Odeon Kampoeng Naga?</span>
            </h2>
            <p class="text-lg md:text-xl text-[#FAF7F2]/80 mb-10 max-w-2xl mx-auto leading-relaxed font-medium">
                Jangan hanya melihat dari layar. Jadikan pengalamanmu nyata dengan mengikuti tur panduan warga lokal, dan
                nikmati langsung kelezatan kuliner legendaris kami.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('pages.paket-wisata') }}"
                    class="btn-primary w-full sm:w-auto text-base px-8 py-3.5 shadow-xl shadow-brand-gold/20 flex items-center justify-center gap-2">
                    <i class="iconoir-map text-lg"></i> Pesan Paket Wisata
                </a>

                <a href="{{ route('pages.umkm') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-full font-bold text-white border border-white/30 bg-white/10 hover:bg-white/20 transition-all backdrop-blur-sm no-underline">
                    <i class="iconoir-shop text-lg"></i> Eksplorasi Kuliner
                </a>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const filterBtns = document.querySelectorAll('#atraksi-filters .filter-pill');
                const items = document.querySelectorAll('.atraksi-item');
                const searchEl = document.getElementById('search-input');
                const clearBtn = document.getElementById('clear-search');
                const noResult = document.getElementById('no-result');
                let currentFilter = 'all';
                let currentSearch = '';

                function updateDisplay() {
                    let found = false;
                    items.forEach(item => {
                        const catMatch = currentFilter === 'all' || item.dataset.category === currentFilter;
                        const searchMatch = item.dataset.title.toLowerCase().includes(currentSearch);
                        if (catMatch && searchMatch) {
                            item.style.display = 'flex';
                            found = true;
                            requestAnimationFrame(() => {
                                item.style.opacity = '1';
                                item.style.transform = '';
                            });
                        } else {
                            item.style.opacity = '0';
                            setTimeout(() => {
                                item.style.display = 'none';
                            }, 200);
                        }
                    });
                    setTimeout(() => noResult.classList.toggle('hidden', found), 220);
                }

                filterBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        filterBtns.forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
                        currentFilter = btn.dataset.target;
                        updateDisplay();
                    });
                });

                searchEl.addEventListener('input', e => {
                    currentSearch = e.target.value.toLowerCase();

                    if (currentSearch.length > 0) {
                        clearBtn.classList.remove('hidden');
                    } else {
                        clearBtn.classList.add('hidden');
                    }

                    updateDisplay();
                });

                clearBtn.addEventListener('click', () => {
                    searchEl.value = '';
                    currentSearch = '';
                    clearBtn.classList.add('hidden');
                    updateDisplay();
                    searchEl.focus();
                });
            });
        </script>
    @endpush

@endsection
