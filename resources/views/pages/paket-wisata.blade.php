@extends('layouts.main')

@section('title', 'Paket Wisata | Odeon Kampoeng Naga')
@section('meta_description', 'Temukan paket wisata terbaik di Odeon Kampoeng Naga Sukabumi — wisata budaya, kuliner, dan
    sejarah pecinan yang tak terlupakan.')

@section('content')

    <section
        class="relative pt-36 pb-28 px-5 sm:px-8 overflow-hidden bg-gradient-to-br from-brand-dark via-brand-accent-dark to-brand-accent">

        <div class="absolute inset-0">
            <img src="{{ asset('assets/museum.jpeg') }}" alt="Paket Wisata Odeon" class="w-full h-full object-cover opacity-20"
                onerror="this.style.display='none'">
        </div>

        <div
            class="absolute top-0 right-0 w-96 h-96 bg-brand-gold/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-72 h-72 bg-brand-accent/30 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto text-center reveal">
            <h1 class="font-serif text-5xl md:text-6xl font-bold text-white mb-5 leading-tight">
                Paket <span class="text-gradient-gold italic">Wisata</span>
            </h1>
            <p class="text-lg text-white/65 leading-relaxed max-w-2xl mx-auto">
                Rasakan pengalaman utuh menjelajahi pesona sejarah, kekayaan kuliner, hingga tradisi turun-temurun pecinan
                Sukabumi dengan pilihan itinerari terbaik kami.
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
            <div class="flex flex-col md:flex-row items-center justify-between gap-5 reveal">

                <div class="flex flex-wrap gap-2 justify-center md:justify-start" id="paket-filters">
                    <button class="filter-pill active" data-target="all">
                        <i class="iconoir-grid-plus text-sm"></i> Semua Paket
                    </button>
                    <button class="filter-pill" data-target="oneday">
                        1 Hari
                    </button>
                    <button class="filter-pill" data-target="twodays">
                        2 Hari 1 Malam
                    </button>
                </div>

                <div class="relative w-full md:w-80 shrink-0">
                    <input type="text" id="search-input" placeholder="Cari penawaran wisata..."
                        class="search-input pl-12 pr-10" aria-label="Cari paket wisata">
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


    <section class="py-8 pb-24 px-5 sm:px-8">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7" id="paket-grid">

            @foreach ($tourPackages as $package)
                <article
                    class="paket-item group flex flex-col rounded-2xl overflow-hidden shadow-card
    hover:shadow-card-hover hover:-translate-y-1.5 transition-all duration-300
    border border-brand-accent/10 bg-white relative reveal"
                    data-category="{{ str_contains(strtolower($package->duration), '2 hari') ? 'twodays' : 'oneday' }}"
                    data-title="{{ strtolower($package->title_line1 . ' ' . $package->title_line2) }}">

                    @if ($package->is_bestseller)
                        <div class="absolute top-4 right-4 z-10">
                            <span class="badge bg-brand-gold text-brand-dark border-brand-gold shadow-gold">
                                <i class="iconoir-star-solid text-[10px]"></i> Best Seller
                            </span>
                        </div>
                    @endif

                    <div class="card-image h-52">

                        <img src="{{ asset('storage/' . $package->main_image) }}" alt="{{ $package->title_line1 }}"
                            onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=600'">

                        <div class="absolute inset-0 bg-gradient-card pointer-events-none"></div>

                        <div class="absolute top-4 left-4">
                            <span class="badge badge-white">
                                <i class="iconoir-clock text-xs"></i>
                                {{ $package->duration }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body flex flex-col flex-1">

                        <h3
                            class="font-serif text-xl font-bold text-brand-text group-hover:text-brand-accent
            transition-colors duration-300 mb-2 mt-0 leading-snug">

                            {{ $package->title_line1 }}
                            {{ $package->title_line2 }}

                        </h3>

                        <p class="text-sm text-brand-muted leading-relaxed mb-5 line-clamp-2">
                            {{ $package->catchphrase }}
                        </p>

                        <ul class="space-y-2 mb-6 pb-5 border-b border-brand-accent/8">

                            @foreach (explode(',', $package->included) as $item)
                                <li class="flex items-start gap-2 text-xs text-brand-muted">

                                    <i class="iconoir-check-circle text-emerald-500 text-sm shrink-0 mt-0.5"></i>

                                    {{ trim($item) }}

                                </li>
                            @endforeach

                        </ul>

                        <div class="mt-auto flex items-center justify-between">

                            <div>

                                <div class="text-[10px] text-brand-muted font-semibold uppercase tracking-wider mb-0.5">
                                    Harga Mulai
                                </div>

                                <div class="font-serif text-2xl font-bold text-brand-accent leading-none">

                                    Rp {{ number_format($package->price, 0, ',', '.') }}

                                    <span class="text-xs text-brand-muted font-normal">/ pax</span>

                                </div>

                            </div>

                            <a href="{{ route('pages.paket-wisata-detail', $package->id) }}" class="btn-icon"
                                aria-label="Detail paket">

                                <i class="iconoir-arrow-right"></i>

                            </a>

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
            <p class="text-brand-muted text-sm">Coba ubah kata kunci atau filter pencarian Anda.</p>
        </div>
    </section>


    <section class="py-20 px-5 sm:px-8 bg-brand-secondary">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14 reveal">
                <p class="section-eyebrow mb-3">Keunggulan Kami</p>
                <h2 class="section-title mb-4">Mengapa Memilih Odeon?</h2>
                <span class="gold-line mx-auto"></span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $perks = [
                        [
                            'icon' => 'iconoir-shield-check',
                            'title' => 'Terpercaya',
                            'desc' => 'Dikelola oleh tim berpengalaman dengan izin resmi dan HPI berlisensi.',
                        ],
                        [
                            'icon' => 'iconoir-headset',
                            'title' => 'Servis 24/7',
                            'desc' => 'Tim kami siap melayani pertanyaan dan kebutuhan Anda kapan saja.',
                        ],
                        [
                            'icon' => 'iconoir-heart-solid',
                            'title' => 'Pengalaman Asli',
                            'desc' => 'Wisata otentik yang mengutamakan keaslian budaya, bukan sekadar tontonan.',
                        ],
                        [
                            'icon' => 'iconoir-leaf',
                            'title' => 'Ramah Lingkungan',
                            'desc' => 'Setiap kunjungan berkontribusi langsung pada pelestarian budaya dan lingkungan.',
                        ],
                    ];
                @endphp
                @foreach ($perks as $p)
                    <div
                        class="reveal group bg-white rounded-3xl p-7 shadow-card border border-brand-accent/6
                        hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300 text-center">
                        <div
                            class="w-14 h-14 rounded-2xl bg-brand-accent/8 flex items-center justify-center mx-auto mb-5
                            group-hover:bg-brand-accent transition-colors duration-300">
                            <i
                                class="{{ $p['icon'] }} text-brand-accent text-2xl group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h4 class="font-bold text-brand-text mb-2">{{ $p['title'] }}</h4>
                        <p class="text-sm text-brand-muted leading-relaxed">{{ $p['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 px-5 sm:px-8 relative overflow-hidden reveal">
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

        <div class="relative max-w-4xl mx-auto text-center">
            <p class="text-brand-gold text-xs font-bold uppercase tracking-[0.2em] mb-3">Butuh Konsultasi?</p>
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-white mb-4 leading-tight"
                style="text-shadow: 0 4px 24px rgba(0,0,0,0.4);">
                Hubungi Kami Sekarang
            </h2>
            <p class="text-[#FAF7F2]/80 text-sm md:text-base mb-8 max-w-md mx-auto leading-relaxed">
                Tim kami siap membantu Anda merancang itinerari sesuai keinginan dan anggaran terbaik Anda.
            </p>
            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener"
                class="btn-gold text-sm px-8 py-3.5 shadow-xl shadow-brand-gold/20 flex items-center justify-center gap-2 mx-auto w-fit">
                <i class="iconoir-whatsapp text-lg"></i> Chat WhatsApp
            </a>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const filterBtns = document.querySelectorAll('#paket-filters .filter-pill');
                const items = document.querySelectorAll('.paket-item');
                const searchEl = document.getElementById('search-input');
                const clearBtn = document.getElementById('clear-search');
                const noResult = document.getElementById('no-result');
                let currentFilter = 'all';
                let currentSearch = '';

                let hideTimeouts = [];

                function updateDisplay() {
                    let found = false;
                    items.forEach((item, index) => {
                        const catMatch = currentFilter === 'all' || item.dataset.category === currentFilter;
                        const searchMatch = item.dataset.title.toLowerCase().includes(currentSearch);

                        if (hideTimeouts[index]) clearTimeout(hideTimeouts[index]);

                        if (catMatch && searchMatch) {
                            item.style.display = 'flex';
                            found = true;
                            requestAnimationFrame(() => {
                                item.style.opacity = '1';
                                item.style.transform = '';
                            });
                        } else {
                            item.style.opacity = '0';
                            hideTimeouts[index] = setTimeout(() => {
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
