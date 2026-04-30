@extends('layouts.main')

@section('title', 'Berita & Acara | Odeon Kampoeng Naga')
@section('meta_description', 'Ikuti terus perkembangan, perayaan budaya, festival kuliner, dan kisah-kisah menarik dari
    jantung pecinan Kampoeng Naga Sukabumi.')

@section('content')

    @php
        use Carbon\Carbon;
        $featured = $news->where('is_featured', 1)->first();
    @endphp

    <section
        class="relative pt-36 pb-28 px-5 sm:px-8 overflow-hidden bg-gradient-to-br from-brand-dark via-brand-dark-3 to-brand-dark-2">

        <div class="absolute inset-0">
            <img src="{{ asset('assets/pertunjukan.jpeg') }}" alt="Berita Odeon Kampoeng Naga"
                class="w-full h-full object-cover opacity-15" onerror="this.style.display='none'">
        </div>

        <div
            class="absolute top-1/3 right-0 w-72 h-72 bg-brand-accent/20 rounded-full blur-3xl translate-x-1/2 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-80 h-60 bg-brand-gold/10 rounded-full blur-3xl -translate-x-1/3 translate-y-1/2 pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto text-center reveal">
            <h1 class="font-serif text-5xl md:text-6xl font-bold text-white mb-5 leading-tight">
                Berita &amp; <span class="text-gradient-gold italic">Acara</span>
            </h1>
            <p class="text-lg text-white/65 leading-relaxed max-w-2xl mx-auto">
                Ikuti terus perkembangan, perayaan budaya, festival kuliner, dan kisah-kisah menarik dari jantung pecinan
                Kampoeng Naga.
            </p>
        </div>

        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 64" preserveAspectRatio="none"
                class="w-full h-16 fill-[#FAF7F2] dark:fill-[#100808] transition-colors duration-300">
                <path
                    d="M0,32L60,26.7C120,21,240,11,360,16C480,21,600,43,720,48C840,53,960,43,1080,37.3C1200,32,1320,32,1380,32L1440,32L1440,64L1380,64C1320,64,1200,64,1080,64C960,64,840,64,720,64C600,64,480,64,360,64C240,64,120,64,60,64L0,64Z" />
            </svg>
        </div>
    </section>

    @if ($featured)
        <section class="py-10 px-5 sm:px-8 -mt-2">
            <div class="max-w-6xl mx-auto reveal">
                <a href="{{ route('pages.berita-detail', $featured->slug) }}" class="group block no-underline">
                    <div
                        class="relative rounded-3xl overflow-hidden grid grid-cols-1 md:grid-cols-2
                shadow-card border border-brand-accent/10 dark:border-white/10
                hover:shadow-card-hover transition-all duration-300 bg-white dark:bg-[#1E1212]">

                        <div class="relative h-64 md:h-auto overflow-hidden bg-brand-dark">
                            <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-90 group-hover:opacity-100">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black/20 dark:to-black/40">
                            </div>

                            <div class="absolute top-5 left-5">
                                <span class="badge bg-brand-gold text-brand-dark border-brand-gold shadow-gold">
                                    <i class="iconoir-star-solid text-[10px]"></i> Berita Utama
                                </span>
                            </div>
                        </div>

                        <div class="p-8 md:p-12 flex flex-col justify-center relative">
                            <span
                                class="text-xs text-brand-muted dark:text-white/60 font-semibold mb-4 flex items-center gap-1.5 uppercase tracking-widest">
                                <i class="iconoir-calendar text-brand-accent text-sm"></i>
                                {{ Carbon::parse($featured->published_at)->translatedFormat('d F Y') }}
                            </span>

                            <h2
                                class="font-serif text-3xl md:text-4xl font-bold text-brand-text dark:text-white mb-5 leading-tight group-hover:text-brand-accent transition-colors duration-300">
                                {{ $featured->title }}
                            </h2>

                            <p class="text-brand-muted dark:text-white/70 text-base leading-relaxed mb-8 line-clamp-3">
                                {{ $featured->excerpt }}
                            </p>

                            <span
                                class="inline-flex items-center gap-2 text-sm font-bold text-brand-accent group-hover:gap-3 transition-all duration-300 mt-auto">
                                Baca Selengkapnya
                                <i class="iconoir-arrow-right"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    @endif

    <section class="py-8 pb-24 px-5 sm:px-8">
        <div class="max-w-6xl mx-auto">

            <div class="flex flex-col md:flex-row items-center justify-between gap-5 mb-10 reveal">
                <div class="flex flex-wrap gap-2 justify-center md:justify-start" id="berita-filters">
                    <button class="filter-pill active" data-target="all">Semua</button>
                    <button class="filter-pill" data-target="budaya">Budaya</button>
                    <button class="filter-pill" data-target="event">Event</button>
                    <button class="filter-pill" data-target="komunitas">Komunitas</button>
                </div>

                <div class="relative w-full md:w-80 shrink-0">
                    <input type="text" id="search-input" placeholder="Cari berita atau topik..."
                        class="search-input pl-12 pr-10" aria-label="Cari berita">

                    <i
                        class="iconoir-search absolute left-4 top-1/2 -translate-y-1/2 text-brand-muted text-lg pointer-events-none z-10"></i>

                    <button id="clear-search"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-brand-muted hover:text-brand-accent transition-colors hidden cursor-pointer border-none bg-transparent z-10"
                        aria-label="Hapus pencarian">
                        <i class="iconoir-xmark text-lg"></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7" id="berita-grid">

                @foreach ($news as $n)
                    @if (!$featured || $n->id != $featured->id)
                        <article
                            class="berita-item card group flex flex-col reveal dark:bg-[#1E1212] dark:border-white/10 transition-colors duration-300"
                            data-category="{{ strtolower($n->category) }}" data-title="{{ strtolower($n->title) }}">

                            <a href="{{ route('pages.berita-detail', $n->slug) }}"
                                class="block card-image h-52 no-underline relative bg-brand-dark">
                                <img src="{{ asset('storage/' . $n->image) }}" alt="{{ $n->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105 opacity-90 group-hover:opacity-100">
                                <div class="absolute inset-0 bg-gradient-card pointer-events-none"></div>
                                <div class="absolute top-4 left-4">
                                    <span class="badge badge-white text-[10px]">{{ $n->category }}</span>
                                </div>
                            </a>

                            <div class="card-body flex flex-col flex-1 p-6">
                                <span
                                    class="text-[11px] text-brand-muted dark:text-white/50 font-bold tracking-widest uppercase flex items-center gap-1.5 mb-3 transition-colors duration-300">
                                    <i class="iconoir-calendar text-brand-accent text-sm"></i>
                                    {{ Carbon::parse($n->published_at)->translatedFormat('d F Y') }}
                                </span>

                                <a href="{{ route('pages.berita-detail', $n->slug) }}" class="no-underline">
                                    <h3
                                        class="font-serif text-xl font-bold text-brand-text dark:text-white group-hover:text-brand-accent
                                transition-colors duration-300 mb-3 mt-0 leading-snug line-clamp-2">
                                        {{ $n->title }}
                                    </h3>
                                </a>

                                <p
                                    class="text-sm text-brand-muted dark:text-white/70 leading-relaxed mb-6 flex-1 line-clamp-3 transition-colors duration-300">
                                    {{ $n->excerpt }}
                                </p>

                                <a href="{{ route('pages.berita-detail', $n->slug) }}"
                                    class="mt-auto inline-flex items-center gap-1.5 text-sm font-bold text-brand-accent
                            no-underline hover:gap-3 transition-all duration-300 group/link w-fit">
                                    Baca Selengkapnya
                                    <i
                                        class="iconoir-arrow-right group-hover/link:translate-x-1 transition-transform duration-300"></i>
                                </a>
                            </div>
                        </article>
                    @endif
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

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const filterBtns = document.querySelectorAll('#berita-filters .filter-pill');
                const items = document.querySelectorAll('.berita-item');
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
                        const searchMatch = item.dataset.title.includes(currentSearch);

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
