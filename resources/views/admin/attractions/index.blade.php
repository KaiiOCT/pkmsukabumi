@extends('layouts.admin')

@section('title', 'Atraksi & Destinasi')
@section('subtitle', 'Kelola titik ikonik dan objek wisata di kawasan Odeon.')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div class="relative w-full sm:w-96">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="iconoir-search text-gray-400 text-lg"></i>
            </div>
            <input type="text"
                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 outline-none transition-all placeholder:text-gray-400 shadow-sm"
                placeholder="Cari nama atraksi...">
        </div>

        <a href="{{ route('admin.attractions.create') }}"
            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 py-3 px-6 rounded-xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-lg shadow-brand-accent/20 hover:-translate-y-0.5 transition-all no-underline">
            <i class="iconoir-plus"></i> Tambah Atraksi
        </a>
    </div>

    <div class="bg-white dark:bg-[#1E1212] rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 dark:bg-black/20 border-b border-gray-100 dark:border-white/5">
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 w-16 text-center">No</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">Atraksi</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">Kategori</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">Jam Operasional</th>
                        <th class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-white/5">
                    <tr class="group hover:bg-gray-50/80 dark:hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 text-sm font-semibold text-brand-muted dark:text-white/50 text-center">1</td>

                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-brand-text dark:text-white">Vihara Widhi Sakti</p>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-rose-50 dark:bg-brand-accent/10 text-brand-accent dark:text-brand-gold text-[10px] font-bold uppercase tracking-wider border border-rose-100 dark:border-brand-accent/20">Sejarah & Religi</span>
                        </td>

                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-brand-text dark:text-white">08:00 - 17:00</p>
                            <p class="text-[10px] text-brand-muted dark:text-white/50 mt-0.5">Setiap Hari</p>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button type="button" onclick="openDetailModal()" class="w-8 h-8 rounded-lg flex items-center justify-center bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer" title="Lihat Detail">
                                    <i class="iconoir-eye text-sm"></i>
                                </button>
                                <a href="{{ route('admin.attractions.edit', 1) }}" class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer" title="Edit">
                                    <i class="iconoir-edit-pencil text-sm"></i>
                                </a>
                                <button type="button" onclick="openDeleteModal()" class="w-8 h-8 rounded-lg flex items-center justify-center bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 hover:bg-rose-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer" title="Hapus">
                                    <i class="iconoir-trash text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-6 border-t border-gray-100 dark:border-white/5 flex items-center justify-between">
            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">Menampilkan <span class="font-bold text-brand-text dark:text-white">1</span> atraksi</p>
        </div>
    </div>

    <div id="detailModal" class="fixed inset-0 z-[60] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('detailModal')"></div>

        <div id="detailModalCard" class="relative w-full max-w-2xl bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh] transform scale-95 transition-transform duration-300">

            <div class="relative w-full h-48 sm:h-56 shrink-0">
                <img src="{{ asset('assets/vihara.jpeg') }}" alt="Cover" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/90 via-brand-dark/40 to-transparent"></div>

                <button onclick="closeModal('detailModal')" class="absolute top-4 right-4 w-8 h-8 bg-black/20 hover:bg-rose-500 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-colors outline-none border-none cursor-pointer z-10">
                    <i class="iconoir-xmark text-lg"></i>
                </button>

                <div class="absolute bottom-6 left-6 right-6">
                    <div class="flex gap-2 mb-2">
                        <span class="px-2 py-0.5 rounded-md bg-white/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider border border-white/20">Sejarah & Religi</span>
                        <span class="px-2 py-0.5 rounded-md bg-brand-accent/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider">Cagar Budaya</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-white leading-tight font-serif mb-1">Vihara Widhi Sakti</h3>
                    <p class="text-xs text-white/80 flex items-center gap-1"><i class="iconoir-map-pin text-[10px]"></i> Jl. Pajagalan, Sukabumi</p>
                </div>
            </div>

            <div class="p-6 sm:p-8 overflow-y-auto custom-scrollbar flex-1 space-y-6 bg-gray-50/30 dark:bg-transparent">
                <div>
                    <h4 class="text-[10px] font-extrabold uppercase tracking-widest text-brand-muted mb-2 border-b border-gray-200 dark:border-white/10 pb-2">Deskripsi Atraksi</h4>
                    <p class="text-sm font-bold text-brand-text dark:text-white mb-2">Pusat ibadah dan cagar budaya dengan arsitektur perpaduan Tiongkok klasik di Kampoeng Naga.</p>
                    <p class="text-xs text-gray-600 dark:text-white/60 leading-relaxed">Vihara Widhi Sakti merupakan salah satu ikon cagar budaya dan tempat ibadah tertua yang ada di kawasan Odeon. Dibangun dengan arsitektur perpaduan Tiongkok klasik dan sentuhan lokal, vihara ini menjadi pusat perayaan hari-hari besar dan simbol toleransi di Kampoeng Naga.</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white dark:bg-[#1A0E0E] p-4 rounded-xl border border-gray-100 dark:border-white/5">
                        <h4 class="text-[10px] font-extrabold uppercase tracking-widest text-brand-muted mb-1">Jam Operasional</h4>
                        <p class="text-sm font-bold text-brand-text dark:text-white flex items-center gap-1.5"><i class="iconoir-clock text-emerald-500"></i> 08:00 - 17:00</p>
                        <p class="text-[10px] text-gray-500 dark:text-white/40 mt-0.5">Setiap Hari</p>
                    </div>
                    <div class="bg-white dark:bg-[#1A0E0E] p-4 rounded-xl border border-gray-100 dark:border-white/5">
                        <h4 class="text-[10px] font-extrabold uppercase tracking-widest text-brand-muted mb-1">Tiket Masuk</h4>
                        <p class="text-sm font-bold text-brand-text dark:text-white flex items-center gap-1.5"><i class="iconoir-dollar text-brand-accent dark:text-brand-gold"></i> Gratis</p>
                    </div>
                </div>

                <div class="bg-white dark:bg-[#1A0E0E] p-4 rounded-xl border border-gray-100 dark:border-white/5">
                    <h4 class="text-[10px] font-extrabold uppercase tracking-widest text-brand-muted mb-1">Fasilitas Tersedia</h4>
                    <p class="text-sm font-bold text-brand-text dark:text-white">Area Parkir, Tempat Ibadah, Spot Foto</p>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('deleteModal')"></div>
        <div id="deleteModalCard" class="relative w-full max-w-sm bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl p-8 text-center transform scale-95 transition-transform duration-300">
            
            <div class="w-20 h-20 rounded-full bg-rose-50 dark:bg-rose-500/10 flex items-center justify-center text-rose-500 mx-auto mb-5">
                <i class="iconoir-trash text-4xl"></i>
            </div>
            
            <h3 class="font-bold text-brand-text dark:text-white text-xl mb-2">Hapus Atraksi?</h3>
            <p class="text-sm text-brand-muted dark:text-white/60 mb-8 leading-relaxed">Anda yakin ingin menghapus data atraksi ini? Tindakan ini tidak dapat dibatalkan dan akan hilang dari daftar destinasi.</p>
            
            <div class="flex flex-col gap-3">
                <button type="button" class="w-full py-3.5 rounded-xl bg-rose-500 text-white font-bold text-sm shadow-lg shadow-rose-500/30 hover:bg-rose-600 transition-colors outline-none border-none cursor-pointer">
                    Ya, Hapus Permanen
                </button>
                <button type="button" onclick="closeModal('deleteModal')" class="w-full py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-transparent text-brand-text dark:text-white font-bold text-sm hover:bg-gray-50 dark:hover:bg-white/5 transition-colors outline-none cursor-pointer">
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
                card.classList.replace('scale-95', 'scale-100');
            }, 10);
        }

        function openDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const card = document.getElementById('deleteModalCard');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                card.classList.replace('scale-95', 'scale-100');
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