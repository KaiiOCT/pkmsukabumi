@extends('layouts.admin')

@section('title', 'Overview Dashboard')
@section('subtitle', 'Pantau aktivitas pariwisata Odeon dalam satu layar.')

@section('content')

    <div class="bg-gradient-to-r from-brand-accent to-brand-dark p-8 sm:p-10 rounded-[2.5rem] mb-10 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl shadow-brand-accent/20 border-4 border-white dark:border-[#1E1212] relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay pointer-events-none"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-brand-gold/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>

        <div class="relative z-10">
            <p class="text-brand-gold font-bold uppercase tracking-widest text-xs mb-2">Selamat Datang Kembali,</p>
            <h2 class="font-serif text-3xl sm:text-4xl font-bold text-white mb-2">Halo, Admin Odeon! 👋</h2>
            <p class="text-white/80 text-sm max-w-lg leading-relaxed">Berikut adalah rangkuman performa pariwisata, pesanan masuk, dan interaksi wisatawan di kawasan Kampoeng Naga hari ini.</p>
        </div>
        
        <div class="relative z-10 shrink-0">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-2xl flex items-center gap-4">
                <div class="w-12 h-12 bg-brand-gold rounded-full flex items-center justify-center text-brand-dark shadow-inner">
                    <i class="iconoir-calendar text-2xl"></i>
                </div>
                <div>
                    <p class="text-[10px] text-white/60 font-bold uppercase tracking-wider mb-0.5">Hari Ini</p>
                    <p class="text-sm font-bold text-white whitespace-nowrap">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <div class="bg-white dark:bg-[#1E1212] p-6 rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md transition-all duration-300 group">

            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-rose-50 dark:bg-rose-500/10 flex items-center justify-center text-rose-600 dark:text-rose-400 group-hover:scale-110 transition-transform">
                    <i class="iconoir-shopping-bag text-2xl"></i>
                </div>

                <span class="text-[10px] font-bold text-emerald-500 bg-emerald-50 dark:bg-emerald-500/10 px-2 py-1 rounded-lg">
                    +{{ $bookingGrowth ?? 0 }}%
                </span>
            </div>

            <h3 class="text-2xl font-bold text-brand-text dark:text-white mb-1">
                {{ $totalBookings }}
            </h3>

            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">
                Total Pesanan
            </p>

        </div>

        <div class="bg-white dark:bg-[#1E1212] p-6 rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 dark:bg-brand-gold/10 flex items-center justify-center text-amber-600 dark:text-brand-gold group-hover:scale-110 transition-transform">
                    <i class="iconoir-shop text-2xl"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-brand-text dark:text-white mb-1">32</h3>
            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">UMKM Aktif</p>
        </div>

        <div class="bg-white dark:bg-[#1E1212] p-6 rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center text-blue-600 dark:text-blue-400 group-hover:scale-110 transition-transform">
                    <i class="iconoir-journal text-2xl"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-brand-text dark:text-white mb-1">15</h3>
            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">Berita & Acara</p>
        </div>

        <div class="bg-white dark:bg-[#1E1212] p-6 rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 dark:text-emerald-400 group-hover:scale-110 transition-transform">
                    <i class="iconoir-group text-2xl"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-brand-text dark:text-white mb-1">1.2K</h3>
            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">Estimasi Wisatawan</p>
        </div>

    </div>

    <div class="mb-10">
        <h3 class="text-lg font-bold text-brand-text dark:text-white mb-4 flex items-center gap-2">
            Aksi Cepat
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.news.create') }}" class="group flex items-center gap-3 p-4 rounded-2xl bg-white dark:bg-[#1E1212] border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md hover:border-blue-500/30 dark:hover:border-blue-500/30 transition-all no-underline">
                <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-500/10 flex items-center justify-center text-blue-600 dark:text-blue-400 group-hover:scale-110 transition-transform shrink-0">
                    <i class="iconoir-journal-page text-lg"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-brand-text dark:text-white mb-0.5 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Tulis Berita</p>
                    <p class="text-[10px] text-brand-muted dark:text-white/50">Artikel & Acara</p>
                </div>
            </a>
            
            <a href="{{ route('admin.packages.create') }}" class="group flex items-center gap-3 p-4 rounded-2xl bg-white dark:bg-[#1E1212] border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md hover:border-brand-accent/30 dark:hover:border-brand-gold/30 transition-all no-underline">
                <div class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-rose-500/10 flex items-center justify-center text-rose-600 dark:text-brand-gold group-hover:scale-110 transition-transform shrink-0">
                    <i class="iconoir-map text-lg"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-brand-text dark:text-white mb-0.5 group-hover:text-rose-600 dark:group-hover:text-brand-gold transition-colors">Buat Paket</p>
                    <p class="text-[10px] text-brand-muted dark:text-white/50">Paket Wisata</p>
                </div>
            </a>

            <a href="{{ route('admin.umkm.create') }}" class="group flex items-center gap-3 p-4 rounded-2xl bg-white dark:bg-[#1E1212] border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md hover:border-amber-500/30 dark:hover:border-amber-500/30 transition-all no-underline">
                <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-500/10 flex items-center justify-center text-amber-600 dark:text-amber-400 group-hover:scale-110 transition-transform shrink-0">
                    <i class="iconoir-shop text-lg"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-brand-text dark:text-white mb-0.5 group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">Tambah UMKM</p>
                    <p class="text-[10px] text-brand-muted dark:text-white/50">Mitra Usaha</p>
                </div>
            </a>

            <a href="{{ route('admin.attractions.create') }}" class="group flex items-center gap-3 p-4 rounded-2xl bg-white dark:bg-[#1E1212] border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-md hover:border-emerald-500/30 dark:hover:border-emerald-500/30 transition-all no-underline">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center text-emerald-600 dark:text-emerald-400 group-hover:scale-110 transition-transform shrink-0">
                    <i class="iconoir-camera text-lg"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-brand-text dark:text-white mb-0.5 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">Atraksi Baru</p>
                    <p class="text-[10px] text-brand-muted dark:text-white/50">Spot Ikonik</p>
                </div>
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">

        <!-- HEADER -->
        <div class="grid grid-cols-5 bg-gray-50 dark:bg-black/20 border-b border-gray-100 dark:border-white/5 px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/40">

            <div>Order ID</div>
            <div>Wisatawan</div>
            <div>Paket Wisata</div>
            <div class="text-center">Pax</div>
            <div class="text-right">Status</div>

        </div>

        <!-- ROWS -->
        @forelse($latestBookings as $b)

        <div class="grid grid-cols-5 px-6 py-5 border-b border-gray-50 dark:border-white/5 hover:bg-gray-50/80 dark:hover:bg-white/5 transition-colors group">

            <!-- ORDER ID -->
            <div class="flex items-center">
                <span class="font-mono text-sm font-bold text-brand-text dark:text-white">
                    #{{ $b->order_id }}
                </span>
            </div>

            <!-- NAMA -->
            <div>
                <div class="text-sm font-bold text-brand-text dark:text-white mb-0.5">
                    {{ $b->name }}
                </div>
                <div class="text-[10px] text-brand-muted flex items-center gap-1">
                    <i class="iconoir-clock"></i>
                    {{ $b->created_at->diffForHumans() }}
                </div>
            </div>

            <!-- PAKET -->
            <div class="flex items-center">
                <span class="text-sm text-brand-muted dark:text-white/70 font-semibold truncate max-w-[200px]">
                    {{ $b->package_name }}
                </span>
            </div>

            <!-- PAX -->
            <div class="flex items-center justify-center">
                <span class="text-sm font-bold text-brand-text dark:text-white">
                    {{ $b->pax }}
                </span>
            </div>

            <!-- STATUS -->
            <div class="flex items-center justify-end">

                @if($b->status == 'pending')
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 text-[10px] font-extrabold uppercase border border-amber-100 dark:border-amber-500/20">
                        Menunggu
                    </span>

                @elseif($b->status == 'confirmed')
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-[10px] font-extrabold uppercase border border-emerald-200 dark:border-emerald-500/20">
                        Selesai
                    </span>

                @elseif($b->status == 'cancelled')
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 text-[10px] font-extrabold uppercase border border-rose-200 dark:border-rose-500/20">
                        Dibatalkan
                    </span>
                @endif

            </div>

        </div>

        @empty

        <div class="text-center py-6 text-gray-400">
            Belum ada pesanan masuk
        </div>

        @endforelse

    </div>

@endsection