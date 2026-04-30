@extends('layouts.admin')

@section('title', 'Paket Wisata')
@section('subtitle', 'Kelola daftar paket wisata, harga, dan ketersediaan layanan.')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
            <div class="relative w-full sm:w-80">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="iconoir-search text-gray-400 dark:text-white/40 text-lg"></i>
                </div>
                <input type="text" 
                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold outline-none transition-all duration-300 placeholder:text-gray-400 dark:placeholder:text-white/30 shadow-sm"
                    placeholder="Cari nama paket wisata...">
            </div>
            
            <div class="relative">
                <select class="appearance-none w-full sm:w-48 px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold outline-none cursor-pointer shadow-sm pr-10 transition-all duration-300">
                    <option value="">Semua Kategori</option>
                    <option value="edukasi">Edukasi & Sejarah</option>
                    <option value="kuliner">Kuliner</option>
                    <option value="kombinasi">Paket Kombinasi</option>
                </select>
                <i class="iconoir-nav-arrow-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>
        </div>

        <a href="{{ route('admin.packages.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 py-3 px-6 rounded-xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-lg shadow-brand-accent/20 dark:shadow-brand-gold/20 hover:-translate-y-0.5 transition-all duration-300 no-underline">
            <i class="iconoir-plus"></i> Tambah Paket
        </a>
    </div>

    <div class="bg-white dark:bg-[#1E1212] rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 dark:bg-black/20 border-b border-gray-100 dark:border-white/5">
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 w-16 text-center">No</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">Judul Paket</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-right">Harga (Rp)</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center">Kategori</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-white/5">
                    
                    <tr class="group hover:bg-gray-50/80 dark:hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 text-sm font-semibold text-brand-muted dark:text-white/50 text-center">1</td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-brand-text dark:text-white truncate max-w-[250px]" title="Eksplorasi Mendalam Kampoeng Naga">Eksplorasi Mendalam Kampoeng Naga</p>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <p class="text-sm font-bold text-brand-text dark:text-white">850.000</p>
                            <p class="text-[10px] text-brand-muted dark:text-white/50">/ Orang</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 text-[10px] font-bold uppercase tracking-wider border border-blue-100 dark:border-blue-500/20">Kombinasi</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-[10px] font-extrabold uppercase border border-emerald-200 dark:border-emerald-500/20">
                                Tersedia
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button type="button" onclick="openDetailModal()" class="w-8 h-8 rounded-lg flex items-center justify-center bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer" title="Lihat Detail">
                                    <i class="iconoir-eye text-sm"></i>
                                </button>
                                
                                <a href="{{ route('admin.packages.edit', 1) }}" class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500 transition-colors tooltip-trigger" title="Edit">
                                    <i class="iconoir-edit-pencil text-sm"></i>
                                </a>
                                
                                <button type="button" onclick="openArchiveModal()" class="w-8 h-8 rounded-lg flex items-center justify-center bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 hover:bg-amber-500 hover:text-white dark:hover:bg-amber-500 transition-colors tooltip-trigger outline-none border-none cursor-pointer" title="Nonaktifkan Paket">
                                    <i class="iconoir-prohibition text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="group hover:bg-gray-50/80 dark:hover:bg-white/5 transition-colors opacity-70">
                        <td class="px-6 py-4 text-sm font-semibold text-brand-muted dark:text-white/50 text-center">2</td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-500 dark:text-white/50 truncate max-w-[250px]" title="Tur Eksklusif Vihara Widhi Sakti">Tur Eksklusif Vihara Widhi Sakti</p>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <p class="text-sm font-bold text-gray-500 dark:text-white/50">75.000</p>
                            <p class="text-[10px] text-gray-400 dark:text-white/40">/ Orang</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 text-[10px] font-bold uppercase tracking-wider border border-amber-100 dark:border-amber-500/20">Edukasi</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 text-[10px] font-extrabold uppercase border border-rose-200 dark:border-rose-500/20">
                                Habis
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button type="button" onclick="openDetailModal()" class="w-8 h-8 rounded-lg flex items-center justify-center bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer" title="Lihat Detail">
                                    <i class="iconoir-eye text-sm"></i>
                                </button>
                                <a href="#" class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500 transition-colors tooltip-trigger" title="Edit">
                                    <i class="iconoir-edit-pencil text-sm"></i>
                                </a>
                                <button type="button" onclick="openArchiveModal()" class="w-8 h-8 rounded-lg flex items-center justify-center bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 hover:bg-amber-500 hover:text-white dark:hover:bg-amber-500 transition-colors tooltip-trigger outline-none border-none cursor-pointer" title="Nonaktifkan Paket">
                                    <i class="iconoir-prohibition text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-100 dark:border-white/5 flex items-center justify-between flex-wrap gap-4">
            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">Menampilkan <span class="font-bold text-brand-text dark:text-white">1</span> sampai <span class="font-bold text-brand-text dark:text-white">2</span> dari <span class="font-bold text-brand-text dark:text-white">2</span> paket</p>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 rounded-lg flex items-center justify-center border border-brand-accent dark:border-brand-gold bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-xs outline-none border-none cursor-pointer">1</button>
            </div>
        </div>

    </div>

    <div id="detailModal" class="fixed inset-0 z-[60] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('detailModal')"></div>
        
        <div id="detailModalCard" class="relative w-full max-w-4xl bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh] transform scale-95 transition-transform duration-300">
            <div class="relative w-full h-40 sm:h-48 shrink-0">
                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1000" alt="Cover" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/90 via-brand-dark/40 to-transparent"></div>
                
                <button onclick="closeModal('detailModal')" class="absolute top-4 right-4 w-8 h-8 bg-black/20 hover:bg-rose-500 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-colors z-10 outline-none border-none cursor-pointer">
                    <i class="iconoir-xmark text-lg"></i>
                </button>

                <div class="absolute bottom-5 left-6 right-6">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2 py-0.5 rounded-md bg-brand-gold text-brand-dark text-[10px] font-bold uppercase tracking-wider flex items-center gap-1"><i class="iconoir-star-solid text-[10px]"></i> Best Seller</span>
                        <span class="px-2 py-0.5 rounded-md bg-white/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider border border-white/20">2 Hari 1 Malam</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-white leading-tight">Eksplorasi Mendalam <span class="text-brand-gold italic">Kampoeng Naga</span></h3>
                    <p class="text-sm text-white/80 mt-1">Rasakan Nostalgia Masa Lampau</p>
                </div>
            </div>

            <div class="p-0 overflow-y-auto custom-scrollbar flex-1 bg-gray-50/30 dark:bg-transparent">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-0 h-full">
                    
                    <div class="md:col-span-2 p-6 sm:p-8 border-r border-gray-100 dark:border-white/5 space-y-8">
                        <div>
                            <h4 class="text-xs font-extrabold uppercase tracking-widest text-brand-muted mb-2">Deskripsi</h4>
                            <p class="text-sm text-gray-600 dark:text-white/60 leading-relaxed text-justify">Paket perjalanan unggulan ini tidak dirancang sekadar untuk berlibur, melainkan untuk membawa Anda menyelami romantika kehidupan tempo dulu, di mana harmoni budaya, kuliner legendaris, dan arsitektur otentik melebur menjadi satu.</p>
                        </div>

                        <div>
                            <h4 class="text-xs font-extrabold uppercase tracking-widest text-brand-muted mb-4 border-b border-gray-100 dark:border-white/10 pb-2">Ringkasan Itinerary</h4>
                            <div class="space-y-4">
                                <div class="flex gap-4">
                                    <div class="w-8 h-8 rounded-full bg-brand-accent/10 dark:bg-brand-gold/10 text-brand-accent dark:text-brand-gold flex items-center justify-center font-bold text-xs shrink-0">H1</div>
                                    <div>
                                        <p class="text-sm font-bold text-brand-text dark:text-white mb-1">Ketibaan & Petualangan Malam</p>
                                        <ul class="space-y-1">
                                            <li class="text-xs text-gray-500 dark:text-white/50 flex items-center gap-2"><i class="iconoir-clock text-brand-accent dark:text-brand-gold"></i> 14:00 - Check-In Hotel</li>
                                            <li class="text-xs text-gray-500 dark:text-white/50 flex items-center gap-2"><i class="iconoir-clock text-brand-accent dark:text-brand-gold"></i> 19:00 - Simfoni Kuliner Malam</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="flex gap-4">
                                    <div class="w-8 h-8 rounded-full bg-brand-accent/10 dark:bg-brand-gold/10 text-brand-accent dark:text-brand-gold flex items-center justify-center font-bold text-xs shrink-0">H2</div>
                                    <div>
                                        <p class="text-sm font-bold text-brand-text dark:text-white mb-1">Edukasi & Kepulangan</p>
                                        <ul class="space-y-1">
                                            <li class="text-xs text-gray-500 dark:text-white/50 flex items-center gap-2"><i class="iconoir-clock text-brand-accent dark:text-brand-gold"></i> 07:00 - Sarapan Dimsum</li>
                                            <li class="text-xs text-gray-500 dark:text-white/50 flex items-center gap-2"><i class="iconoir-clock text-brand-accent dark:text-brand-gold"></i> 09:00 - Kelas Merakit Lampion</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-emerald-50/50 dark:bg-emerald-500/5 p-4 rounded-xl border border-emerald-100 dark:border-emerald-500/10">
                                <p class="text-[10px] font-extrabold uppercase text-emerald-600 dark:text-emerald-400 mb-2">Termasuk</p>
                                <ul class="text-xs text-emerald-800/70 dark:text-emerald-400/70 space-y-1 pl-3 list-disc">
                                    <li>Hotel Bintang 3</li>
                                    <li>Tour Guide HPI</li>
                                    <li>Makan Malam Otentik</li>
                                </ul>
                            </div>
                            <div class="bg-rose-50/50 dark:bg-rose-500/5 p-4 rounded-xl border border-rose-100 dark:border-rose-500/10">
                                <p class="text-[10px] font-extrabold uppercase text-rose-600 dark:text-rose-400 mb-2">Tidak Termasuk</p>
                                <ul class="text-xs text-rose-800/70 dark:text-rose-400/70 space-y-1 pl-3 list-disc">
                                    <li>Transportasi Antar Kota</li>
                                    <li>Pengeluaran Pribadi</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 bg-white dark:bg-[#1A0E0E] flex flex-col border-t md:border-t-0 border-gray-100 dark:border-white/5">
                        <h4 class="text-xs font-extrabold uppercase tracking-widest text-brand-muted mb-6 border-b border-gray-100 dark:border-white/10 pb-2">Logistik & Harga</h4>
                        
                        <div class="space-y-4 mb-8">
                            <div>
                                <p class="text-[10px] uppercase text-brand-muted mb-0.5">Status Penjualan</p>
                                <p class="text-sm font-bold text-emerald-500 flex items-center gap-1"><i class="iconoir-check-circle"></i> Aktif (Tersedia)</p>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase text-brand-muted mb-0.5">Sisa Slot Promo</p>
                                <p class="text-sm font-bold text-rose-500">4 Pax Tersisa</p>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase text-brand-muted mb-0.5">Ukuran Grup</p>
                                <p class="text-sm font-bold text-brand-text dark:text-white">Min. 2 Orang</p>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase text-brand-muted mb-0.5">Pemandu & Bahasa</p>
                                <p class="text-sm font-bold text-brand-text dark:text-white">Lokal / English</p>
                            </div>
                        </div>

                        <div class="mt-auto bg-gray-50/80 dark:bg-white/5 rounded-2xl p-5 border border-gray-100 dark:border-white/10">
                            <p class="text-xs text-brand-muted line-through mb-0.5">Rp 1.200.000</p>
                            <p class="font-serif text-3xl font-extrabold text-brand-text dark:text-brand-gold leading-none">Rp 850.000</p>
                            <p class="text-[10px] text-brand-muted uppercase tracking-wider mt-1">Per Orang (Pax)</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="archiveModal" class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('archiveModal')"></div>
        <div id="archiveModalCard" class="relative w-full max-w-sm bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl p-8 text-center transform scale-95 transition-transform duration-300">
            
            <div class="w-20 h-20 rounded-full bg-amber-50 dark:bg-amber-500/10 flex items-center justify-center text-amber-500 mx-auto mb-5">
                <i class="iconoir-archive text-4xl"></i>
            </div>
            
            <h3 class="font-bold text-brand-text dark:text-white text-xl mb-2">Nonaktifkan Paket?</h3>
            <p class="text-sm text-brand-muted dark:text-white/60 mb-8 leading-relaxed">Anda yakin ingin menonaktifkan paket wisata ini? Paket akan disembunyikan dari halaman pengunjung namun riwayat pemesanan masa lalu tetap aman.</p>
            
            <div class="flex flex-col gap-3">
                <button type="button" class="w-full py-3.5 rounded-xl bg-amber-500 text-white font-bold text-sm shadow-lg shadow-amber-500/30 hover:bg-amber-600 transition-colors outline-none border-none cursor-pointer">
                    Ya, Nonaktifkan Paket
                </button>
                <button type="button" onclick="closeModal('archiveModal')" class="w-full py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-transparent text-brand-text dark:text-white font-bold text-sm hover:bg-gray-50 dark:hover:bg-white/5 transition-colors outline-none cursor-pointer">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        function openDetailModal() {
            const modal = document.getElementById('detailModal');
            const card = document.getElementById('detailModalCard');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                if(card) card.classList.replace('scale-95', 'scale-100');
            }, 10);
        }

        function openArchiveModal() {
            const modal = document.getElementById('archiveModal');
            const card = document.getElementById('archiveModalCard');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                if(card) card.classList.replace('scale-95', 'scale-100');
            }, 10);
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            const card = document.getElementById(modalId + 'Card');
            
            modal.classList.add('opacity-0');
            if(card) card.classList.replace('scale-100', 'scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>

@endsection