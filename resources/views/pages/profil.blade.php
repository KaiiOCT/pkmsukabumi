@extends('layouts.main')

@section('title', 'Profil Organisasi | Odeon Kampoeng Naga')
@section('meta_description',
    'Kenali sejarah, visi misi, dan struktur organisasi Odeon Kampoeng Naga — Kawasan wisata
    budaya pecinan Sukabumi yang menghidupkan warisan leluhur.')

@section('content')

    <section
        class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-brand-dark transition-colors duration-300">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/sundakarsa.jpeg') }}" alt="Sejarah Kampoeng Naga"
                class="w-full h-full object-cover opacity-60 scale-105"
                style="transform-origin: center; will-change: transform;">
            <div
                class="absolute inset-0 bg-gradient-to-b from-brand-dark-2/80 via-brand-dark/60 to-brand-primary dark:to-[#100808]">
            </div>
        </div>

        <div
            class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-transparent via-brand-gold to-transparent opacity-70">
        </div>

        <div class="relative z-10 text-center px-5 sm:px-8 max-w-4xl mx-auto pt-20">
            <h1 class="font-serif text-5xl sm:text-6xl md:text-7xl font-bold text-white leading-tight md:leading-[1.1] tracking-tight mb-6 reveal"
                style="text-shadow: 0 4px 32px rgba(0,0,0,0.5);">
                Profil <br>
                <span class="text-gradient-gold italic">Odeon Kampoeng Naga</span>
            </h1>
            <p class="text-lg md:text-xl text-white/75 leading-relaxed max-w-2xl mx-auto mb-10 reveal" data-delay="1">
                Menyelaraskan jejak sejarah emas masa lalu dengan visi kesejahteraan pariwisata terpadu di masa depan dan
                membangun ruang merdeka untuk semua.
            </p>
        </div>
    </section>

    <section class="relative z-20 -mt-16 mb-20 px-5 sm:px-8">
        <div class="max-w-6xl mx-auto reveal">
            <div
                class="bg-white dark:bg-[#1E1212] rounded-[2.5rem] p-8 md:p-12 shadow-2xl border border-brand-accent/5 dark:border-white/10 grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-0 md:divide-x divide-brand-accent/10 dark:divide-white/10 transition-colors duration-300">
                @php
                    $stats = [
                        ['value' => '1910', 'label' => 'Tahun Berdiri', 'icon' => 'iconoir-calendar'],
                        ['value' => '500+', 'label' => 'Pengunjung / Bulan', 'icon' => 'iconoir-community'],
                        ['value' => '30+', 'label' => 'UMKM Binaan', 'icon' => 'iconoir-shop'],
                        ['value' => '12+', 'label' => 'Program Budaya', 'icon' => 'iconoir-sparks'],
                    ];
                @endphp
                @foreach ($stats as $stat)
                    <div class="text-center px-4 group">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-brand-accent/8 dark:bg-white/5 mb-4 group-hover:scale-110 group-hover:bg-brand-accent/15 dark:group-hover:bg-brand-gold/10 transition-all duration-300">
                            <i class="{{ $stat['icon'] }} text-brand-accent dark:text-brand-gold text-xl"></i>
                        </div>
                        <div
                            class="font-serif text-3xl font-bold text-brand-text dark:text-white mb-1 transition-colors duration-300">
                            {{ $stat['value'] }}</div>
                        <div
                            class="text-[10px] text-brand-muted dark:text-white/50 font-semibold uppercase tracking-wider transition-colors duration-300">
                            {{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-20 px-5 sm:px-8" id="sejarah">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                <div class="reveal relative order-2 lg:order-1" data-delay="1">
                    <div
                        class="absolute -inset-4 bg-gradient-to-br from-brand-gold/20 to-brand-accent/10 dark:from-brand-gold/10 dark:to-brand-accent/5 rounded-[3rem] -rotate-3 z-0 transition-colors duration-300">
                    </div>

                    <div
                        class="relative z-10 rounded-3xl overflow-hidden shadow-2xl border-4 border-white dark:border-[#1E1212] transition-colors duration-300">
                        <img src="{{ asset('assets/hibah.jpeg') }}" alt="Sejarah Awal Odeon"
                            class="w-full h-[300px] md:h-[400px] lg:h-[500px] object-cover"
                            onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800'">
                        <div class="absolute inset-0 bg-gradient-card pointer-events-none"></div>
                    </div>

                    <div
                        class="absolute -bottom-6 -right-4 md:-right-6 z-20 bg-white/90 dark:bg-[#1E1212]/90 backdrop-blur-md rounded-2xl px-8 py-5 shadow-xl border border-white/60 dark:border-white/10 text-center transition-colors duration-300">
                        <div class="font-serif text-4xl font-bold text-gradient-crimson mb-1">1910</div>
                        <div class="text-[10px] text-brand-muted dark:text-white/60 font-bold uppercase tracking-widest">
                            Tonggak Berdiri</div>
                    </div>
                </div>

                <div class="order-1 lg:order-2 reveal">
                    <div class="mb-8">
                        <p class="section-eyebrow mb-3">Babak Pertama</p>
                        <h2 class="section-title mb-4 leading-tight">
                            Sejarah &amp; Rekam Jejak
                        </h2>
                        <div class="w-12 h-1 bg-brand-accent rounded-full mb-8"></div>
                    </div>

                    <div
                        class="space-y-6 text-brand-muted dark:text-white/70 leading-loose text-base transition-colors duration-300">
                        <p>
                            Kawasan Odeon Sukabumi telah lama bermetamorfosis lebih dari sekadar jalur perlintasan niaga
                            kuno.
                            Akar sejarahnya menjulur jauh ke era kolonial ketika masyarakat Tionghoa perantauan mendaratkan
                            asanya di kota sejuk ini, membangun kelenteng Vihara Widhi Sakti sebagai pilar spiritual
                            sekaligus episentrum kehidupan dagang.
                        </p>
                        <p>
                            Nama <strong class="text-brand-text dark:text-white font-semibold">"Kampoeng Naga"</strong>
                            dicetuskan kembali sebagai sebuah entitas penggerak oleh para pemuda dan paguyuban lintas etnis
                            setempat yang rindu akan kejayaan budaya lampion merah tempo dulu. Lahirnya organisasi pengelola
                            ini diawali dari sebatas inisiatif kerja bakti pemugaran lorong bersejarah, yang secara organik
                            berkembang menjadi satuan pengelola kawasan wisata terpadu.
                        </p>
                    </div>

                    <div class="mt-12 space-y-6">
                        @php
                            $timeline = [
                                [
                                    'year' => '1910',
                                    'event' => 'Berdirinya komunitas niaga Tionghoa di Pecinan Sukabumi',
                                ],
                                ['year' => '1975', 'event' => 'Renovasi besar Vihara Widhi Sakti sebagai ikon budaya'],
                                ['year' => '2010', 'event' => 'Lahirnya Paguyuban Kampoeng Naga modern'],
                                ['year' => '2020', 'event' => 'Pengembangan kawasan wisata terpadu oleh PKM Sukabumi'],
                            ];
                        @endphp
                        @foreach ($timeline as $item)
                            <div class="flex items-start gap-5">
                                <div class="shrink-0 flex flex-col items-center">
                                    <div
                                        class="w-12 h-12 rounded-full bg-brand-accent/5 dark:bg-white/5 border border-brand-accent/20 dark:border-brand-gold/30 flex items-center justify-center transition-colors duration-300">
                                        <span
                                            class="font-serif text-sm font-bold text-brand-accent dark:text-brand-gold">{{ substr($item['year'], 2) }}</span>
                                    </div>
                                    @unless ($loop->last)
                                        <div
                                            class="w-[2px] h-6 bg-brand-accent/15 dark:bg-white/10 mt-2 transition-colors duration-300">
                                        </div>
                                    @endunless
                                </div>
                                <div class="pt-2">
                                    <span
                                        class="text-xs font-extrabold text-brand-gold uppercase tracking-widest">{{ $item['year'] }}</span>
                                    <p
                                        class="text-sm text-brand-text dark:text-white/90 mt-1 leading-relaxed font-medium transition-colors duration-300">
                                        {{ $item['event'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section
        class="py-24 px-5 sm:px-8 bg-gradient-to-br from-brand-accent via-brand-accent-dark to-brand-dark relative overflow-hidden"
        id="visi-misi">
        <div class="absolute -top-20 -right-20 w-96 h-96 rounded-full bg-brand-gold/10 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 rounded-full bg-white/5 blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6">Visi &amp; Misi</h2>
                <div class="w-12 h-1 bg-brand-gold rounded-full mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <div class="lg:col-span-2 reveal">
                    <div
                        class="h-full rounded-[2rem] border border-white/10 bg-white/5 backdrop-blur-sm p-8 md:p-10 hover:bg-white/10 transition-colors duration-300 shadow-xl">
                        <p class="text-brand-gold text-3xl uppercase tracking-[0.2em] font-bold mb-4">Visi</p>
                        <blockquote
                            class="font-serif text-white text-2xl font-semibold leading-snug border-l-2 border-brand-gold/50 pl-6 italic mt-12 mb-6">
                            "Menjadikan Odeon pusat wisata budaya terpadu yang merajut kerukunan antaretnis dan kemandirian
                            ekonomi lokal."
                        </blockquote>
                        <p class="text-white/60 text-sm leading-relaxed">
                            Kami percaya bahwa perbedaan adalah kanvas yang indah jika dilukis dengan semangat toleransi.
                            Kampoeng Naga memproyeksikan sebuah ruang merdeka di mana wisata bisa memberdayakan warga.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-3 reveal" data-delay="1">
                    <div
                        class="h-full rounded-[2rem] border border-white/10 bg-white/5 backdrop-blur-sm p-8 md:p-10 hover:bg-white/10 transition-colors duration-300 shadow-xl">
                        <p class="text-brand-gold text-3xl uppercase tracking-[0.2em] font-bold mb-6">Misi</p>
                        <div class="space-y-8">
                            @php
                                $missions = [
                                    [
                                        'title' => 'Pelestarian Ekosistem Budaya',
                                        'desc' =>
                                            'Menjaga dan merevitalisasi peninggalan arsitektur warisan, festival tradisional, serta mengarsip nilai lisan kesejarahan bagi generasi mendatang.',
                                    ],
                                    [
                                        'title' => 'Katalisator Ekonomi UMKM',
                                        'desc' =>
                                            'Menyediakan payung pembinaan dan bimbingan pemasaran pariwisata agar pelaku kuliner lokal mampu merajai persaingan di kancah nasional.',
                                    ],
                                    [
                                        'title' => 'Pariwisata Toleransi & Ramah',
                                        'desc' =>
                                            'Membangun SOP wisata ramah lingkungan yang mengutamakan keramahtamahan kolektif seluruh warga tanpa memandang SARA.',
                                    ],
                                ];
                            @endphp
                            @foreach ($missions as $m)
                                <div class="flex items-start gap-5">
                                    <div>
                                        <h4 class="text-brand-gold font-bold text-base mb-2">{{ $m['title'] }}</h4>
                                        <p class="text-white/70 text-sm leading-relaxed m-0">{{ $m['desc'] }}</p>
                                    </div>
                                </div>
                                @if (!$loop->last)
                                    <div class="h-[1px] bg-white/10 w-full"></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 px-5 sm:px-8" id="nilai">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <p class="section-eyebrow mb-3">Fondasi Kami</p>
                <h2 class="section-title mb-6">Nilai-Nilai Utama</h2>
                <div class="w-12 h-1 bg-brand-accent mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $values = [
                        [
                            'icon' => 'iconoir-heart',
                            'title' => 'Toleransi',
                            'desc' =>
                                'Menjunjung keberagaman etnis, budaya, dan agama sebagai kekuatan utama komunitas.',
                            'color' => 'from-rose-500/10 to-brand-accent/5 dark:from-rose-900/20 dark:to-rose-800/10',
                            'iconColor' => 'text-rose-500 dark:text-rose-400',
                        ],
                        [
                            'icon' => 'iconoir-reports-solid',
                            'title' => 'Keberlanjutan',
                            'desc' => 'Pariwisata yang bertanggung jawab terhadap lingkungan alam dan warisan budaya.',
                            'color' => 'from-emerald-500/10 to-teal-400/5 dark:from-emerald-900/20 dark:to-teal-800/10',
                            'iconColor' => 'text-emerald-500 dark:text-emerald-400',
                        ],
                        [
                            'icon' => 'iconoir-community',
                            'title' => 'Pemberdayaan',
                            'desc' =>
                                'Mendorong partisipasi aktif masyarakat lokal dalam setiap aspek pengelolaan wisata.',
                            'color' => 'from-amber-500/10 to-brand-gold/5 dark:from-amber-900/20 dark:to-amber-800/10',
                            'iconColor' => 'text-amber-500 dark:text-brand-gold',
                        ],
                        [
                            'icon' => 'iconoir-shield-check',
                            'title' => 'Keaslian',
                            'desc' =>
                                'Menjaga orisinalitas pengalaman budaya tanpa kompromi terhadap nilai-nilai autentik.',
                            'color' => 'from-blue-500/10 to-indigo-400/5 dark:from-blue-900/20 dark:to-indigo-800/10',
                            'iconColor' => 'text-blue-500 dark:text-blue-400',
                        ],
                    ];
                @endphp
                @foreach ($values as $v)
                    <div
                        class="reveal group rounded-3xl p-8 bg-gradient-to-br {{ $v['color'] }} border border-brand-accent/5 dark:border-white/5 hover:shadow-card hover:-translate-y-2 transition-all duration-300 cursor-default bg-white dark:bg-[#1E1212]">
                        <div class="w-14 h-14 flex items-center justify-center mb-6">
                            <i class="{{ $v['icon'] }} {{ $v['iconColor'] }} text-3xl"></i>
                        </div>
                        <h3
                            class="font-serif text-xl font-bold text-brand-text dark:text-white mb-3 transition-colors duration-300">
                            {{ $v['title'] }}</h3>
                        <p
                            class="text-sm text-brand-muted dark:text-white/60 leading-relaxed transition-colors duration-300">
                            {{ $v['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 px-5 sm:px-8 bg-brand-secondary dark:bg-[#100808] transition-colors duration-300" id="struktur">
        <div class="max-w-6xl mx-auto">

            <div class="text-center mb-16 reveal">
                <p class="section-eyebrow mb-3">Susunan Pengurus</p>
                <h2 class="section-title mb-6">Struktur Organisasi</h2>
                <div class="w-12 h-1 bg-brand-accent mx-auto rounded-full mb-6"></div>
                <p class="section-subtitle mx-auto max-w-2xl dark:text-white/60">Motor penggerak operasional di balik
                    kesuksesan manajemen wisata Kampoeng Naga tahun anggaran terkini.</p>
            </div>

            <div class="flex flex-col items-center">
                <div class="reveal flex flex-col items-center z-10 w-full relative">
                    <div
                        class="bg-white dark:bg-[#1E1212] p-8 rounded-[2rem] shadow-card-hover border border-brand-accent/15 dark:border-white/10 w-80 text-center transition-colors duration-300 mx-auto relative z-10">
                        <img src="{{ asset('assets/logoodeon.png') }}"
                            onerror="this.src='https://ui-avatars.com/api/?name=Hendra+K&background=8B1A1A&color=fff&size=150&bold=true'"
                            class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-4 border-brand-secondary dark:border-[#100808] shadow-md">

                        <h4 class="text-xl font-bold text-brand-text dark:text-white mb-1 transition-colors duration-300">
                            Bapak Hendra K.</h4>
                        <p
                            class="inline-block px-4 py-1.5 rounded-full bg-brand-accent/10 text-brand-accent dark:text-brand-gold text-[10px] font-extrabold uppercase tracking-widest">
                            Ketua Umum</p>
                    </div>
                    <div class="w-[2px] h-8 bg-brand-accent/30 dark:bg-brand-gold/30"></div>
                </div>

                <div
                    class="w-full flex flex-col md:flex-row flex-wrap justify-center md:border-t-2 md:border-brand-accent/30 dark:md:border-brand-gold/30 reveal">
                    @php
                        $divisions = [
                            [
                                'name' => 'Ibu Siska',
                                'role' => 'Pemasaran & Publikasi',
                                'bg' => 'F4F1ED',
                                'color' => '8B1A1A',
                            ],
                            [
                                'name' => 'Bpk Haryanto',
                                'role' => 'Operasional & Acara',
                                'bg' => 'F4F1ED',
                                'color' => '8B1A1A',
                            ],
                            ['name' => 'Sdr. Alvin', 'role' => 'Sekretaris', 'bg' => 'F4F1ED', 'color' => '8B1A1A'],
                            ['name' => 'Sdri. Rina', 'role' => 'Bendahara', 'bg' => 'F4F1ED', 'color' => '8B1A1A'],
                        ];
                    @endphp
                    @foreach ($divisions as $div)
                        <div class="w-full md:w-64 px-4 md:px-6 relative mt-8 md:mt-8 flex justify-center">

                            <div
                                class="absolute -top-8 left-1/2 w-[2px] h-8 bg-brand-accent/30 dark:bg-brand-gold/30 -translate-x-1/2 hidden md:block">
                            </div>
                            <div
                                class="absolute -top-8 left-1/2 w-[2px] h-8 bg-brand-accent/30 dark:bg-brand-gold/30 -translate-x-1/2 md:hidden block">
                            </div>

                            <div
                                class="w-full max-w-[320px] bg-white dark:bg-[#1E1212] p-8 rounded-[2rem] border border-brand-accent/10 dark:border-white/5 shadow-sm hover:shadow-card hover:-translate-y-1 transition-all duration-300 text-center relative z-10">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($div['name']) }}&background={{ $div['bg'] }}&color={{ $div['color'] }}&size=150&bold=true"
                                    alt="{{ $div['name'] }}"
                                    class="w-20 h-20 rounded-full mx-auto mb-4 object-cover border-4 border-brand-secondary dark:border-[#100808] shadow-sm">

                                <h4
                                    class="font-bold text-brand-text dark:text-white text-lg mb-1.5 transition-colors duration-300">
                                    {{ $div['name'] }}</h4>
                                <div
                                    class="text-[11px] text-brand-muted dark:text-white/60 uppercase font-bold tracking-wider transition-colors duration-300">
                                    {{ $div['role'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <section class="relative py-28 md:py-36 overflow-hidden reveal">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/vihara.jpeg') }}" alt="Kunjungi Odeon" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-brand-dark/95 via-brand-accent-dark/90 to-brand-dark/95">
            </div>
            <div
                class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay">
            </div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-8 text-center">
            <p class="text-brand-gold text-[11px] font-bold uppercase tracking-[0.3em] mb-4">Siap Berkunjung?</p>
            <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                Jadikan Odeon Kampoeng Naga<br>
                <span class="text-gradient-gold italic">Destinasi Berikutnya</span>
            </h2>
            <p class="text-white/70 text-lg mb-10 max-w-xl mx-auto leading-relaxed">
                Eksplorasi paket wisata kami dan ciptakan kenangan tak terlupakan bersama keluarga atau rekan perjalanan
                Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('pages.paket-wisata') }}" class="btn-gold px-8 py-4 shadow-xl">
                    <i class="iconoir-sparks text-lg"></i> Lihat Paket Wisata
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" rel="noopener"
                    class="inline-flex items-center gap-2.5 px-8 py-4 rounded-full border-2 border-white/20 text-white text-sm font-bold hover:bg-white/10 hover:-translate-y-0.5 transition-all duration-300 no-underline">
                    <i class="iconoir-whatsapp text-lg"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </section>

@endsection
