@extends('layouts.admin')

@section('title', 'Manajemen Pesanan')
@section('subtitle', 'Pantau form booking masuk dan hubungi wisatawan via WhatsApp.')

@section('content')

    @php
        $status = request('status');
    @endphp

    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-8">
        <form method="GET" action="{{ route('admin.bookings.index') }}" class="relative w-full md:w-96">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="iconoir-search text-gray-400 dark:text-white/40 text-lg"></i>
            </div>

            <input type="text" 
                name="search"
                value="{{ request('search') }}"
                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 outline-none transition-all duration-300 placeholder:text-gray-400 dark:placeholder:text-white/30 shadow-sm"
                placeholder="Cari Order ID atau Nama Pemesan...">
        </form>

        <div class="flex items-center gap-3 w-full md:w-auto overflow-x-auto pb-2 md:pb-0 hide-scrollbar">

            <!-- SEMUA -->
            <a href="{{ route('admin.bookings.index') }}"
                class="px-5 py-2.5 rounded-xl font-bold text-sm whitespace-nowrap transition-colors outline-none cursor-pointer
                {{ !$status 
                    ? 'bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark shadow-md shadow-brand-accent/20 dark:shadow-brand-gold/20' 
                    : 'border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-muted dark:text-white/70 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                Semua Pesanan
            </a>

            <!-- PENDING -->
            <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}"
                class="px-5 py-2.5 rounded-xl font-bold text-sm whitespace-nowrap transition-colors outline-none cursor-pointer
                {{ $status == 'pending' 
                    ? 'bg-amber-500 text-white shadow-md' 
                    : 'border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-muted dark:text-white/70 hover:text-brand-accent dark:hover:text-brand-gold' }}">
                Menunggu Konfirmasi
            </a>

            <!-- CONFIRMED -->
            <a href="{{ route('admin.bookings.index', ['status' => 'confirmed']) }}"
                class="px-5 py-2.5 rounded-xl font-bold text-sm whitespace-nowrap transition-colors outline-none cursor-pointer
                {{ $status == 'confirmed' 
                    ? 'bg-emerald-500 text-white shadow-md' 
                    : 'border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-muted dark:text-white/70 hover:text-emerald-500 dark:hover:text-emerald-400' }}">
                Selesai
            </a>

            <!-- CANCELLED -->
            <a href="{{ route('admin.bookings.index', ['status' => 'cancelled']) }}"
                class="px-5 py-2.5 rounded-xl font-bold text-sm whitespace-nowrap transition-colors outline-none cursor-pointer
                {{ $status == 'cancelled' 
                    ? 'bg-rose-500 text-white shadow-md' 
                    : 'border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-muted dark:text-white/70 hover:text-rose-500 dark:hover:text-rose-400' }}">
                Dibatalkan
            </a>

        </div>
    </div>

    <div class="bg-white dark:bg-[#1E1212] rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 dark:bg-black/20 border-b border-gray-100 dark:border-white/5">
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/40 w-16">No</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/40">Order ID</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/40">Pemesan</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/40">Nama Paket</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/40">Tagihan</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/40 text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/40 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-white/5">

                @forelse($bookings as $i => $b)

                <tr class="group hover:bg-rose-50/50 dark:hover:bg-white/5 transition-colors cursor-default">

                    <!-- NO -->
                    <td class="px-6 py-4 text-sm font-semibold text-brand-muted dark:text-white/50">
                        {{ $i + 1 }}
                    </td>

                    <!-- ORDER ID -->
                    <td class="px-6 py-4">
                        <span class="font-mono text-sm font-bold text-brand-accent dark:text-brand-gold">
                            #{{ $b->order_id }}
                        </span>
                    </td>

                    <!-- NAMA -->
                    <td class="px-6 py-4">
                        <span class="text-sm font-bold text-brand-text dark:text-white">
                            {{ $b->name }}
                        </span>
                    </td>

                    <!-- PAKET -->
                    <td class="px-6 py-4">
                        <span class="text-sm font-semibold text-brand-text dark:text-white truncate max-w-[200px]">
                            {{ $b->package_name }}
                        </span>
                    </td>

                    <!-- TAGIHAN -->
                    <td class="px-6 py-4">
                        <span class="text-sm font-bold text-brand-text dark:text-white">
                            Rp {{ number_format($b->package_price * $b->pax, 0, ',', '.') }}
                        </span>
                    </td>

                    <!-- STATUS -->
                    <td class="px-6 py-4 text-center">
                        @if($b->status == 'pending')
                            <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}"
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 text-[10px] font-extrabold uppercase border border-amber-200 dark:border-amber-500/20 shadow-sm">
                                Menunggu
                            </a>

                        @elseif($b->status == 'confirmed')
                            <a href="{{ route('admin.bookings.index', ['status' => 'confirmed']) }}"
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-[10px] font-extrabold uppercase border border-emerald-200 dark:border-emerald-500/20 shadow-sm">
                                Selesai
                            </a>

                        @else
                            <a href="{{ route('admin.bookings.index', ['status' => 'cancelled']) }}"
                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 text-[10px] font-extrabold uppercase border border-rose-200 dark:border-rose-500/20 shadow-sm">
                                Dibatalkan
                            </a>
                        @endif
                    </td>

                    <!-- AKSI -->
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">

                            <!-- DETAIL -->
                            <button type="button"
                                onclick='openDetailModal(@json($b))'
                                class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500 transition-colors cursor-pointer">
                                <i class="iconoir-eye text-sm"></i>
                            </button>

                            <!-- WHATSAPP -->
                            <a href="https://wa.me/{{ $b->phone }}?text=Halo%20{{ urlencode($b->name) }},%20kami%20dari%20Admin%20Odeon%20menerima%20pesanan%20Anda%20dengan%20Order%20ID:%20%23{{ $b->order_id }}"
                                target="_blank"
                                class="w-8 h-8 rounded-lg flex items-center justify-center bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white dark:hover:bg-emerald-500 transition-colors no-underline">
                                <i class="iconoir-whatsapp text-sm"></i>
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('admin.bookings.destroy', $b->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau hapus booking ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="w-8 h-8 rounded-lg flex items-center justify-center bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 hover:bg-rose-600 hover:text-white dark:hover:bg-rose-500 transition-colors">
                                    <i class="iconoir-trash text-sm"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center py-10 text-gray-400">
                        Belum ada booking masuk
                    </td>
                </tr>

                @endforelse

                </tbody>
            </table>
        </div>

        <br>

        <div class="flex justify-end">
            <div class="flex items-center gap-1">

                {{-- PREV --}}
                @if ($bookings->onFirstPage())
                    <button class="w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 dark:border-white/10 text-gray-400 dark:text-white/30 cursor-not-allowed outline-none border-none bg-transparent" disabled>
                        <i class="iconoir-nav-arrow-left text-sm"></i>
                    </button>
                @else
                    <a href="{{ $bookings->previousPageUrl() }}"
                    class="w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 dark:border-white/10 text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 font-bold text-xs transition-colors outline-none cursor-pointer bg-transparent">
                        <i class="iconoir-nav-arrow-left text-sm"></i>
                    </a>
                @endif


                {{-- PAGE 1 --}}
                <a href="{{ $bookings->url(1) }}"
                class="w-8 h-8 rounded-lg flex items-center justify-center border font-bold text-xs outline-none border-none cursor-pointer
                {{ $bookings->currentPage() == 1
                        ? 'bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark border-brand-accent dark:border-brand-gold'
                        : 'border-gray-200 dark:border-white/10 text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 bg-transparent' }}">
                    1
                </a>

                {{-- PAGE 2 --}}
                @if ($bookings->lastPage() >= 2)
                    <a href="{{ $bookings->url(2) }}"
                    class="w-8 h-8 rounded-lg flex items-center justify-center border font-bold text-xs outline-none border-none cursor-pointer
                    {{ $bookings->currentPage() == 2
                            ? 'bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark border-brand-accent dark:border-brand-gold'
                            : 'border-gray-200 dark:border-white/10 text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 bg-transparent' }}">
                        2
                    </a>
                @endif


                {{-- NEXT --}}
                @if ($bookings->hasMorePages())
                    <a href="{{ $bookings->nextPageUrl() }}"
                    class="w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 dark:border-white/10 text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 transition-colors outline-none cursor-pointer bg-transparent">
                        <i class="iconoir-nav-arrow-right text-sm"></i>
                    </a>
                @else
                    <button class="w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 dark:border-white/10 text-gray-400 dark:text-white/30 cursor-not-allowed outline-none border-none bg-transparent">
                        <i class="iconoir-nav-arrow-right text-sm"></i>
                    </button>
                @endif

            </div>
        </div>

        <br>
        
    </div>

    <div id="detailModal" class="fixed inset-0 z-[60] hidden opacity-0 pointer-events-none transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('detailModal')"></div>
        
        <div id="detailModalCard" class="relative w-full max-w-2xl bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh] transform scale-95 transition-transform duration-300">
            
            <div class="p-6 sm:p-8 bg-gradient-to-r from-brand-accent to-brand-dark flex items-center justify-between border-b-4 border-brand-gold">
                <div>
                    <h3 class="text-xl sm:text-2xl font-bold text-white font-serif flex items-center gap-2 m-0">
                        <i class="iconoir-page"></i> Detail Pemesanan
                    </h3>
                    <p id="modalOrderId" class="text-sm font-mono text-brand-gold/80 mt-1"></p>
                </div>
                <button onclick="closeModal('detailModal')" class="w-8 h-8 bg-white/20 hover:bg-rose-500 rounded-full flex items-center justify-center text-white transition-colors outline-none border-none cursor-pointer">
                    <i class="iconoir-xmark text-lg"></i>
                </button>
            </div>

            <div class="p-6 sm:p-8 overflow-y-auto custom-scrollbar flex-1 bg-gray-50/50 dark:bg-transparent space-y-8">
                
                <div class="flex items-center justify-between bg-white dark:bg-[#1A0E0E] p-4 rounded-xl border border-gray-200 dark:border-white/10 shadow-sm">
                    <span class="text-xs font-bold text-brand-muted dark:text-white/50 uppercase tracking-widest">Waktu Pemesanan</span>
                    <span id="modalWaktu" class="text-sm font-bold text-brand-text dark:text-white flex items-center gap-1.5"></span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div>
                        <h4 class="text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 mb-3 border-b border-gray-200 dark:border-white/10 pb-2">Informasi Wisatawan</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <i class="iconoir-user text-brand-accent dark:text-brand-gold mt-0.5"></i>
                                <div>
                                    <p class="text-[10px] text-brand-muted dark:text-white/50 mb-0.5">Nama Lengkap</p>
                                    <p id="modalNama" class="text-sm font-bold text-brand-text dark:text-white"></p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="iconoir-whatsapp text-brand-accent dark:text-brand-gold mt-0.5"></i>
                                <div>
                                    <p class="text-[10px] text-brand-muted dark:text-white/50 mb-0.5">Nomor WhatsApp</p>
                                    <p id="modalPhone" class="text-sm font-bold text-brand-text dark:text-white"></p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="iconoir-mail text-brand-accent dark:text-brand-gold mt-0.5"></i>
                                <div>
                                    <p class="text-[10px] text-brand-muted dark:text-white/50 mb-0.5">Email (Opsional)</p>
                                    <p id="modalEmail" class="text-sm font-bold text-brand-text dark:text-white"></p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 mb-3 border-b border-gray-200 dark:border-white/10 pb-2">Detail Paket</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <i class="iconoir-map text-brand-accent dark:text-brand-gold mt-0.5"></i>
                                <div>
                                    <p class="text-[10px] text-brand-muted dark:text-white/50 mb-0.5">Nama Paket Wisata</p>
                                    <p id="modalPaket" class="text-sm font-bold text-brand-text dark:text-white"></p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="iconoir-calendar text-brand-accent dark:text-brand-gold mt-0.5"></i>
                                <div>
                                    <p class="text-[10px] text-brand-muted dark:text-white/50 mb-0.5">Tanggal Kedatangan</p>
                                    <p id="modalTanggal" class="text-sm font-bold text-brand-text dark:text-white"></p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="iconoir-group text-brand-accent dark:text-brand-gold mt-0.5"></i>
                                <div>
                                    <p class="text-[10px] text-brand-muted dark:text-white/50 mb-0.5">Jumlah Peserta</p>
                                    <p id="modalPax" class="text-sm font-bold text-brand-text dark:text-white"></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-amber-50/50 dark:bg-brand-gold/5 p-4 rounded-xl border border-amber-100 dark:border-brand-gold/10">
                    <p class="text-[10px] font-extrabold uppercase tracking-widest text-amber-600 dark:text-brand-gold mb-1"><i class="iconoir-message-text text-xs mr-1"></i> Pesan Tambahan</p>
                    <p id="modalPesan" class="text-sm text-brand-text dark:text-white/80 italic"></p>
                </div>
                
                <div>
                    <h4 class="text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 mb-4 border-b border-gray-200 dark:border-white/10 pb-2">Rincian Tagihan</h4>
                    <div class="bg-white dark:bg-[#1A0E0E] rounded-xl border border-gray-200 dark:border-white/10 overflow-hidden">
                        <div class="flex justify-between items-center p-4 border-b border-gray-100 dark:border-white/5">
                            <span class="text-sm text-brand-text dark:text-white/80">Harga Paket per Orang</span>
                            <span id="modalJumlah"></span>
                        </div>
                        <div class="flex justify-between items-center p-4 border-b border-gray-100 dark:border-white/5">
                            <span class="text-sm text-brand-text dark:text-white/80">Jumlah Peserta</span>
                            <span id="modalPaxText" class="text-sm font-bold text-brand-text dark:text-white"></span>
                        </div>
                        <div class="flex justify-between items-center p-5 bg-brand-primary/10 dark:bg-brand-gold/10">
                            <span class="text-sm font-extrabold uppercase tracking-wider text-brand-text dark:text-brand-gold">Total Pembayaran</span>
                            <span id="modalTotal" class="text-xl font-extrabold text-brand-accent dark:text-brand-gold"></span>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-200 dark:border-white/10">
                    <p class="text-[10px] uppercase font-bold text-brand-muted dark:text-white/50 mb-3">Tindakan Admin</p>
                    
                <form id="updateStatusForm" method="POST" action="{{ route('admin.bookings.updateStatus') }}" class="flex flex-col sm:flex-row gap-3">
                    @csrf

                    <input type="hidden" name="id" id="bookingIdInput">

                    <select name="status"
                        class="w-full sm:w-1/2 px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white">

                        <option value="pending">Menunggu</option>
                        <option value="confirmed">Selesai</option>
                        <option value="cancelled">Dibatalkan</option>

                    </select>

                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-3 rounded-xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm hover:-translate-y-0.5 transition-all">
                        Simpan Perubahan
                    </button>
                </form>
                </div>

            </div>
        </div>
    </div>

    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <script>
    function openDetailModal(data) {
        const modal = document.getElementById('detailModal');
        const card = document.getElementById('detailModalCard');

        // 🔥 TAMBAH INI
        modal.classList.remove('hidden');
        modal.classList.remove('pointer-events-none');

        setTimeout(() => {
            modal.classList.remove('opacity-0');
            if(card) card.classList.replace('scale-95', 'scale-100');
        }, 10);

        // 🔥 ISI DATA
        document.getElementById('modalOrderId').innerText = '#' + data.order_id;
        document.getElementById('modalWaktu').innerText = formatTanggal(data.created_at);

        document.getElementById('modalNama').innerText = data.name;
        document.getElementById('modalPhone').innerText = data.phone;
        document.getElementById('modalEmail').innerText = data.email ?? '-';

        document.getElementById('modalPaket').innerText = data.package_name;
        let tanggal = data.date ?? data.visit_date;
        document.getElementById('modalTanggal').innerText = formatTanggal(tanggal);

        let pax = data.pax ?? 0;

        document.getElementById('modalPax').innerText = pax + ' Orang';
        document.getElementById('modalPaxText').innerText = 'x ' + pax + ' Pax';

        document.getElementById('bookingIdInput').value = data.id;
        document.querySelector('select[name="status"]').value = data.status;

        document.getElementById('modalPesan').innerText = data.message ?? '-';

        document.getElementById('modalJumlah').innerText =
            'Rp ' + formatRupiah(data.package_price);

        let total = (data.package_price ?? 0) * (data.pax ?? 0);
        document.getElementById('modalTotal').innerText =
            'Rp ' + formatRupiah(total);
        

        // 🔥 BUKA MODAL
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            if(card) card.classList.replace('scale-95', 'scale-100');
        }, 10);
    }

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    function formatTanggal(tanggal) {
        if(!tanggal) return '-';
        let d = new Date(tanggal);
        return d.toLocaleString('id-ID', {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const card = document.getElementById(modalId + 'Card');

        modal.classList.add('opacity-0');
        if (card) card.classList.replace('scale-100', 'scale-95');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
    </script>

@endsection