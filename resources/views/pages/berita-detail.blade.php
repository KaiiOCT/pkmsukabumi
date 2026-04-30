@extends('layouts.main')

@section('title', $news->title . ' | Berita Odeon Kampoeng Naga')
@section('meta_description', $news->excerpt)

@section('content')

    <section
        class="relative pt-32 pb-44 overflow-hidden bg-gradient-to-br from-brand-dark-2 via-brand-accent-dark to-brand-dark">
        <div
            class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay">
        </div>
        <div class="absolute top-0 right-10 w-96 h-96 bg-brand-gold/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 z-10 reveal">
            <div class="flex items-center gap-2 text-sm text-white/50 flex-wrap font-medium mb-8">
                <a href="{{ route('home') }}" class="no-underline hover:text-white transition-colors duration-200">Beranda</a>
                <i class="iconoir-nav-arrow-right text-sm opacity-50"></i>
                <a href="{{ route('pages.berita') }}"
                    class="no-underline hover:text-white transition-colors duration-200">Berita & Acara</a>
                <i class="iconoir-nav-arrow-right text-sm opacity-50"></i>
                <span class="text-brand-gold truncate max-w-[200px]">{{ $news->title }}</span>
            </div>

            <div class="max-w-4xl">
                <span
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-accent/20 text-brand-gold border border-brand-gold/20 text-[10px] font-extrabold uppercase tracking-widest mb-6">
                    {{ $news->category }}
                </span>

                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mt-0 mb-6"
                    style="text-shadow: 0 4px 20px rgba(0,0,0,0.5);">
                    {{ $news->title }}
                </h1>

                <div class="flex items-center flex-wrap gap-6 text-white/70">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-white/20 border border-white/10 flex items-center justify-center shrink-0 overflow-hidden">
                            <i class="iconoir-user text-white/80 text-2xl"></i>
                        </div>
                        <div class="text-sm font-medium">
                            <p class="text-white font-bold m-0 leading-none">Redaksi Odeon</p>
                            <p class="text-[11px] opacity-60 m-0">Admin</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-sm border-l border-white/20 pl-6">
                        <i class="iconoir-calendar text-brand-gold"></i>
                        <span>{{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 64" preserveAspectRatio="none"
                class="w-full h-12 md:h-20 fill-[#FAF7F2] dark:fill-[#100808] transition-colors duration-300">
                <path
                    d="M0,32L60,26.7C120,21,240,11,360,16C480,21,600,43,720,48C840,53,960,43,1080,37.3C1200,32,1320,32,1380,32L1440,32L1440,64L1380,64C1320,64,1200,64,1080,64C960,64,840,64,720,64C600,64,480,64,360,64C240,64,120,64,60,64L0,64Z" />
            </svg>
        </div>
    </section>

    <section class="px-5 sm:px-8 relative z-20 -mt-24 md:-mt-32">
        <div class="max-w-7xl mx-auto">
            <figure class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white dark:border-[#1E1212] reveal">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                    class="w-full h-[50vh] md:h-[65vh] object-cover" onerror="this.src='{{ asset('assets/vihara.jpeg') }}'">

                <figcaption
                    class="bg-white dark:bg-[#1E1212] px-6 py-4 text-xs text-brand-muted dark:text-white/50 italic border-t border-brand-accent/5 transition-colors">
                    {{ $news->image_caption }}
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="py-16 px-5 sm:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">

            <article class="lg:col-span-8">
                <div class="prose max-w-none dark:prose-invert">

                    <div
                        class="text-xl md:text-2xl font-serif text-brand-text dark:text-white leading-relaxed mb-10 italic border-l-4 border-brand-gold pl-8 reveal">
                        {{ $news->excerpt }}
                    </div>

                    <div class="space-y-6 text-brand-subtitle dark:text-white/80 leading-loose text-base md:text-lg reveal">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>

                <div class="mt-16 pt-8 border-t border-brand-accent/10 flex flex-wrap items-center gap-3 reveal">
                    <span class="text-xs font-bold text-brand-muted uppercase tracking-wider mr-2">Topik Terkait:</span>

                    <span
                        class="px-4 py-2 rounded-full bg-brand-accent/5 dark:bg-white/5 border border-brand-accent/10 text-brand-accent dark:text-brand-gold text-xs font-bold transition-all hover:bg-brand-accent hover:text-white cursor-pointer">
                        #{{ $news->category }}
                    </span>
                </div>
            </article>

            <aside class="lg:col-span-4">
                <div class="sticky top-28 space-y-8 reveal">

                    @if ($news->has_event)
                        <div
                            class="bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-card border border-brand-accent/10 overflow-hidden">
                            <div class="p-8">
                                <h4 class="font-serif text-xl font-bold text-brand-text dark:text-white mb-6">Detail Acara
                                </h4>

                                <ul class="space-y-6">

                                    <li class="flex items-start gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-brand-accent/8 flex items-center justify-center shrink-0">
                                            <i class="iconoir-calendar text-brand-accent"></i>
                                        </div>
                                        <div>
                                            <p
                                                class="text-[10px] uppercase font-bold text-brand-muted dark:text-white/40 mb-1">
                                                Tanggal</p>
                                            <p class="text-sm font-bold text-brand-text dark:text-white">
                                                {{ $news->event_date }}
                                            </p>
                                        </div>
                                    </li>

                                    <li class="flex items-start gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-brand-accent/8 flex items-center justify-center shrink-0">
                                            <i class="iconoir-map-pin text-brand-accent"></i>
                                        </div>
                                        <div>
                                            <p
                                                class="text-[10px] uppercase font-bold text-brand-muted dark:text-white/40 mb-1">
                                                Lokasi</p>
                                            <p class="text-sm font-bold text-brand-text dark:text-white">
                                                {{ $news->event_location }}
                                            </p>
                                        </div>
                                    </li>

                                    <li class="flex items-start gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-brand-accent/8 flex items-center justify-center shrink-0">
                                            <i class="iconoir-clock text-brand-accent"></i>
                                        </div>
                                        <div>
                                            <p
                                                class="text-[10px] uppercase font-bold text-brand-muted dark:text-white/40 mb-1">
                                                Waktu</p>
                                            <p class="text-sm font-bold text-brand-text dark:text-white">
                                                {{ $news->event_time }}
                                            </p>
                                        </div>
                                    </li>

                                    <li class="flex items-start gap-4">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-brand-accent/8 flex items-center justify-center shrink-0">
                                            <i class="iconoir-dollar text-brand-accent"></i>
                                        </div>
                                        <div>
                                            <p
                                                class="text-[10px] uppercase font-bold text-brand-muted dark:text-white/40 mb-1">
                                                HTM</p>
                                            <p class="text-sm font-bold text-brand-text dark:text-white">
                                                {{ $news->event_price }}
                                            </p>
                                        </div>
                                    </li>

                                </ul>

                                <button onclick="shareArticle()"
                                    class="btn-primary w-full mt-8 flex items-center justify-center gap-2 cursor-pointer border-none outline-none">
                                    <i class="iconoir-share-ios text-lg"></i> Bagikan Acara
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="p-8 rounded-[2rem] bg-brand-primary/30 dark:bg-white/5 border border-brand-accent">
                        <h4 class="font-serif text-lg font-bold text-brand-text dark:text-white mb-6">Berita Terkait</h4>

                        <div class="space-y-6">

                            @foreach ($related as $r)
                                <a href="{{ route('pages.berita-detail', $r->slug) }}"
                                    class="group block no-underline border-b border-brand-accent/5 pb-4 last:border-0 last:pb-0">

                                    <p
                                        class="text-sm font-bold text-brand-text dark:text-white group-hover:text-brand-accent transition-colors mb-1">
                                        {{ $r->title }}
                                    </p>

                                    <span class="text-[11px] text-brand-muted uppercase tracking-tighter">
                                        {{ \Carbon\Carbon::parse($r->published_at)->translatedFormat('d M Y') }}
                                    </span>

                                </a>
                            @endforeach

                        </div>
                    </div>

                    <div class="flex items-center justify-center gap-4 py-4">
                        <span class="text-xs font-bold text-brand-muted uppercase tracking-widest">Ikuti Kami:</span>

                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white dark:bg-[#1E1212] border border-brand-accent/10 flex items-center justify-center text-brand-muted hover:text-brand-accent transition-all shadow-sm">
                            <i class="iconoir-facebook"></i>
                        </a>

                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white dark:bg-[#1E1212] border border-brand-accent/10 flex items-center justify-center text-brand-muted hover:text-brand-accent transition-all shadow-sm">
                            <i class="iconoir-instagram"></i>
                        </a>
                    </div>

                </div>
            </aside>
        </div>
    </section>

    <script>
        function shareArticle() {

            const title = "{{ $news->title }}";
            const text = "{{ $news->excerpt }}";
            const url = window.location.href;

            const isMobile = /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);

            if (navigator.share && isMobile) {

                navigator.share({
                    title: title,
                    text: text,
                    url: url
                }).catch(() => {});

            } else {

                navigator.clipboard.writeText(url)
                    .then(() => {
                        alert('Link berita berhasil disalin!');
                    })
                    .catch(() => {
                        prompt('Salin link ini:', url);
                    });

            }
        }
    </script>

@endsection
