@extends('layouts.main')

@section('title', 'UMKM & Kuliner Lokal | Odeon Kampoeng Naga')
@section('meta_description',
    'Temukan kekayaan kuliner khas pecinan, jajanan tradisional, hingga kafe kekinian yang
    dikelola langsung oleh masyarakat lokal Odeon Kampoeng Naga Sukabumi.')

@section('content')

    <section class="relative pt-36 pb-28 px-5 sm:px-8 overflow-hidden reveal"
        style="background: linear-gradient(135deg, #2D1B00 0%, #5C2E00 40%, #8B1A1A 100%)">

        <div class="absolute inset-0">
            <img src="{{ asset('assets/kopitiam.jpeg') }}" alt="UMKM Kuliner Odeon"
                class="w-full h-full object-cover opacity-20" onerror="this.style.display='none'">
        </div>

        <div
            class="absolute top-0 right-0 w-80 h-80 bg-brand-gold/20 rounded-full blur-3xl -translate-y-1/3 translate-x-1/3 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-1/4 w-64 h-64 bg-brand-accent/25 rounded-full blur-3xl translate-y-1/2 pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto text-center">
            <h1 class="font-serif text-5xl md:text-6xl font-bold text-white mb-5 leading-tight">
                UMKM &amp; <span class="text-gradient-gold italic">Kuliner</span>
            </h1>
            <p class="text-lg text-white/65 leading-relaxed max-w-2xl mx-auto">
                Temukan kekayaan ragam kuliner khas pecinan, jajanan tradisional, hingga tempat singgah kekinian yang
                dikelola langsung oleh masyarakat lokal Sukabumi.
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

    <section class="py-10 px-5 sm:px-8 -mt-2 reveal">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between gap-5">

                <div class="flex flex-wrap gap-2 justify-center md:justify-start" id="umkm-filters">
                    <button class="filter-pill active" data-target="all"><i class="iconoir-grid-plus text-sm"></i>
                        Semua</button>
                    <button class="filter-pill" data-target="makanan">Makanan</button>
                    <button class="filter-pill" data-target="minuman">Minuman</button>
                    <button class="filter-pill" data-target="cafe">Cafe</button>
                    <button class="filter-pill" data-target="kerajinan">Kerajinan</button>
                </div>

                <div class="relative w-full md:w-80 shrink-0">
                    <input type="text" id="search-input" placeholder="Cari kuliner atau UMKM..."
                        class="search-input pl-12 pr-10" aria-label="Cari UMKM">

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

    <section class="pb-24 px-5 sm:px-8 reveal">
        <div class="max-w-6xl mx-auto">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="umkm-grid">

                @foreach ($umkms as $u)
                    @php
                        $cat = strtolower($u->category);

                        if (str_contains($cat, 'makanan')) {
                            $cat = 'makanan';
                        } elseif (str_contains($cat, 'minuman')) {
                            $cat = 'minuman';
                        } elseif (str_contains($cat, 'cafe')) {
                            $cat = 'cafe';
                        } elseif (str_contains($cat, 'kerajinan')) {
                            $cat = 'kerajinan';
                        }

                        $img = \Illuminate\Support\Str::startsWith($u->main_image, 'http')
                            ? $u->main_image
                            : asset('storage/' . $u->main_image);
                    @endphp

                    <div class="umkm-item card group flex flex-col dark:bg-[#1E1212] dark:border-white/10 transition-colors duration-300"
                        data-category="{{ $cat }}"
                        data-title="{{ strtolower($u->name . ' ' . $u->owner_highlight . ' ' . $u->description . ' ' . $u->category) }}">

                        <div class="card-image h-52 relative">
                            <img src="{{ $img }}" alt="{{ $u->name }}"
                                onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=400'">

                            <div class="absolute inset-0 bg-gradient-card pointer-events-none"></div>

                            <div class="absolute top-3 left-3">
                                <span class="badge badge-white text-[10px]">{{ ucfirst($cat) }}</span>
                            </div>
                        </div>

                        <div class="card-body flex flex-col flex-1">

                            <h3
                                class="font-serif text-lg font-bold text-brand-text dark:text-white group-hover:text-brand-accent dark:group-hover:text-brand-gold transition-colors duration-300 mb-2 mt-0 leading-snug">
                                {{ $u->name }}
                            </h3>

                            <div class="flex items-center flex-wrap gap-2 mb-4">

                                <span
                                    class="flex items-center gap-1 text-[11px] text-brand-muted dark:text-white/60 font-semibold">
                                    <i class="iconoir-map-pin text-xs text-brand-accent dark:text-brand-gold"></i>
                                    {{ $u->address }}
                                </span>

                                <span class="text-brand-muted/30 dark:text-white/20 text-xs">•</span>

                                <span
                                    class="flex items-center gap-1 text-[11px] text-brand-muted dark:text-white/60 font-semibold">
                                    <i class="iconoir-clock text-xs text-brand-accent dark:text-brand-gold"></i>
                                    {{ \Carbon\Carbon::parse($u->open_time)->format('H:i') }} –
                                    {{ \Carbon\Carbon::parse($u->close_time)->format('H:i') }}
                                </span>

                                @if ($u->is_open)
                                    <span
                                        class="ml-auto inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50 text-[10px] font-extrabold uppercase tracking-wider">
                                        Buka
                                    </span>
                                @else
                                    <span
                                        class="ml-auto inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 border border-rose-200 dark:border-rose-800/50 text-[10px] font-extrabold uppercase tracking-wider">
                                        Tutup
                                    </span>
                                @endif

                            </div>

                            <p class="text-sm text-brand-muted dark:text-white/70 leading-relaxed mb-5 flex-1 line-clamp-3">
                                {{ $u->description }}
                            </p>

                            <div
                                class="flex items-center justify-between pt-4 border-t border-brand-accent/8 dark:border-white/10 mt-auto">
                                <span class="text-sm font-bold text-brand-text dark:text-white">
                                    Mulai Rp {{ number_format($u->price_start, 0, ',', '.') }}
                                </span>

                                <a href="{{ route('pages.umkm-detail', $u->id) }}"
                                    class="btn-icon text-xs dark:text-brand-gold dark:bg-white/5 transition-colors duration-300 no-underline">
                                    <i class="iconoir-arrow-right text-sm"></i>
                                </a>
                            </div>

                        </div>
                    </div>
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
                const filterBtns = document.querySelectorAll('#umkm-filters .filter-pill');
                const items = document.querySelectorAll('.umkm-item');
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
