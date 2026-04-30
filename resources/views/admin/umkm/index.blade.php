@extends('layouts.admin')

@section('title', 'UMKM & Kuliner')
@section('subtitle', 'Kelola direktori mitra usaha, warung, dan toko kerajinan.')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
            <div class="relative w-full sm:w-80">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="iconoir-search text-gray-400 dark:text-white/40 text-lg"></i>
                </div>
                <input type="text" id="search"
                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold outline-none transition-all duration-300 placeholder:text-gray-400 dark:placeholder:text-white/30 shadow-sm"
                    placeholder="Cari nama UMKM atau pemilik...">
            </div>

            <div class="relative">
                <select id="category"
                    class="appearance-none w-full sm:w-48 px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 outline-none cursor-pointer shadow-sm pr-10 transition-all duration-300">
                    <option value="">Semua Kategori</option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                    <option value="cafe">Cafe</option>
                    <option value="kerajinan">Kerajinan</option>
                </select>
                <i
                    class="iconoir-nav-arrow-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>
        </div>

        <a href="{{ route('admin.umkm.create') }}"
            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 py-3 px-6 rounded-xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-lg shadow-brand-accent/20 dark:shadow-brand-gold/20 hover:-translate-y-0.5 transition-all duration-300 no-underline">
            <i class="iconoir-plus"></i> Tambah UMKM
        </a>
    </div>

    <div
        class="bg-white dark:bg-[#1E1212] rounded-[2rem] border border-gray-100 dark:border-white/5 shadow-sm overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-50 dark:bg-black/20 border-b border-gray-100 dark:border-white/5">
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 w-16 text-center">
                            No</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Nama UMKM</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Nama Pemilik</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Kategori</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Kontak</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center">
                            Operasional</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center w-24">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 dark:divide-white/5" id="table-data">
                    @include('admin.umkm.table')
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-100 dark:border-white/5 flex items-center justify-between flex-wrap gap-4">
            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">Menampilkan <span
                    class="font-bold text-brand-text dark:text-white">1</span> sampai <span
                    class="font-bold text-brand-text dark:text-white">2</span> dari <span
                    class="font-bold text-brand-text dark:text-white">32</span> UMKM</p>

            <div class="flex items-center gap-1">
                <button
                    class="w-8 h-8 rounded-lg flex items-center justify-center border border-brand-accent dark:border-brand-gold bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-xs outline-none border-none cursor-pointer">1</button>
                <button
                    class="w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 dark:border-white/10 text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 font-bold text-xs transition-colors outline-none border-none cursor-pointer">2</button>
            </div>
        </div>

    </div>

    <div id="detailModal"
        class="fixed inset-0 z-[60] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('detailModal')">
        </div>

        <div id="detailModalCard"
            class="relative w-full max-w-3xl bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh] transform scale-95 transition-transform duration-300">
            <div class="relative w-full h-40 sm:h-48 shrink-0">
                <img src="https://images.unsplash.com/photo-1552611052-33e04de081de?q=80&w=800" alt="Cover"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/90 via-brand-dark/40 to-transparent"></div>

                <button onclick="closeModal('detailModal')"
                    class="absolute top-4 right-4 w-8 h-8 bg-black/20 hover:bg-rose-500 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-colors z-10 outline-none border-none cursor-pointer">
                    <i class="iconoir-xmark text-lg"></i>
                </button>

                <div class="absolute bottom-5 left-6 right-6">
                    <div class="flex items-center gap-2 mb-2">
                        <span
                            class="px-2 py-0.5 rounded-md bg-emerald-500 text-white text-[10px] font-bold uppercase tracking-wider flex items-center gap-1">Buka</span>
                        <span
                            class="px-2 py-0.5 rounded-md bg-white/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider border border-white/20">Makanan</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-white leading-tight">Bakmi Odeon <span
                            class="text-brand-gold italic">Mang Ujang</span></h3>
                    <p class="text-sm text-white/80 mt-1 flex items-center gap-1"><i class="iconoir-map-pin text-xs"></i>
                        Jl. Pajagalan No. 42</p>
                </div>
            </div>

            <div class="p-6 sm:p-8 overflow-y-auto custom-scrollbar flex-1 space-y-8 bg-gray-50/30 dark:bg-transparent">

                <div
                    class="grid grid-cols-2 sm:grid-cols-4 gap-4 bg-white dark:bg-[#1A0E0E] p-4 rounded-2xl border border-gray-100 dark:border-white/5">
                    <div>
                        <p class="text-[10px] uppercase font-bold text-brand-muted mb-1">Mulai Dari</p>
                        <p class="text-sm font-bold text-brand-accent dark:text-brand-gold">Rp 20.000</p>
                    </div>
                    <div>
                        <p class="text-[10px] uppercase font-bold text-brand-muted mb-1">Jam Operasional</p>
                        <p class="text-sm font-bold text-brand-text dark:text-white">07:00 - 15:00</p>
                    </div>
                    <div class="sm:col-span-2 flex items-center sm:justify-end">
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="inline-flex items-center gap-2 bg-[#25D366] text-white px-4 py-2 rounded-xl text-xs font-bold hover:shadow-lg transition-all no-underline">
                            <i class="iconoir-whatsapp text-lg"></i> 0812-3456-7890
                        </a>
                    </div>
                </div>

                <div>
                    <h4
                        class="text-xs font-extrabold uppercase tracking-widest text-brand-muted mb-2 border-b border-gray-100 dark:border-white/10 pb-2">
                        Slogan & Sejarah</h4>
                    <p class="text-sm font-bold text-brand-text dark:text-white mb-2 italic">"Warisan Resep Sejak 1970"</p>
                    <p class="text-sm text-gray-600 dark:text-white/60 leading-relaxed text-justify">Berawal dari gerobak
                        kayu sederhana di sudut pasar, Bakmi Odeon Mang Ujang telah menemani lidah warga Sukabumi selama
                        lebih dari setengah abad. Rahasianya? Mie yang diproduksi sendiri setiap subuh tanpa bahan pengawet.
                    </p>
                </div>

                <div>
                    <h4
                        class="text-xs font-extrabold uppercase tracking-widest text-brand-muted mb-4 border-b border-gray-100 dark:border-white/10 pb-2">
                        Daftar Menu Tersedia</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div
                            class="p-4 rounded-xl bg-white dark:bg-[#1A0E0E] border border-gray-100 dark:border-white/5 shadow-sm">
                            <div class="flex justify-between items-start mb-1">
                                <h5 class="font-bold text-brand-text dark:text-white text-sm">Bakmi Ayam Jamur Komplit</h5>
                                <span class="text-brand-accent dark:text-brand-gold font-bold text-sm">25.000</span>
                            </div>
                            <p class="text-xs text-brand-muted dark:text-white/60">Mie kenyal, ayam jamur, 2 bakso, 1
                                pangsit rebus.</p>
                        </div>
                        <div
                            class="p-4 rounded-xl bg-white dark:bg-[#1A0E0E] border border-gray-100 dark:border-white/5 shadow-sm">
                            <div class="flex justify-between items-start mb-1">
                                <h5 class="font-bold text-brand-text dark:text-white text-sm">Mie Yamin Manis Spesial</h5>
                                <span class="text-brand-accent dark:text-brand-gold font-bold text-sm">22.000</span>
                            </div>
                            <p class="text-xs text-brand-muted dark:text-white/60">Kecap premium, bumbu khas, topping ayam
                                melimpah.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="deleteModal"
        class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('deleteModal')">
        </div>
        <div id="deleteModalCard"
            class="relative w-full max-w-sm bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl p-8 text-center transform scale-95 transition-transform duration-300">

            <div
                class="w-20 h-20 rounded-full bg-rose-50 dark:bg-rose-500/10 flex items-center justify-center text-rose-500 mx-auto mb-5">
                <i class="iconoir-trash text-4xl"></i>
            </div>

            <h3 class="font-bold text-brand-text dark:text-white text-xl mb-2">Hapus UMKM?</h3>
            <p class="text-sm text-brand-muted dark:text-white/60 mb-8 leading-relaxed">Anda yakin ingin menghapus data
                UMKM ini? Tindakan ini tidak dapat dibatalkan.</p>

            <div class="flex flex-col gap-3">
                <button type="button"
                    class="w-full py-3.5 rounded-xl bg-rose-500 text-white font-bold text-sm shadow-lg shadow-rose-500/30 hover:bg-rose-600 transition-colors outline-none border-none cursor-pointer">
                    Ya, Hapus Permanen
                </button>
                <button type="button" onclick="closeModal('deleteModal')"
                    class="w-full py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-transparent text-brand-text dark:text-white font-bold text-sm hover:bg-gray-50 dark:hover:bg-white/5 transition-colors outline-none cursor-pointer">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        function openDetailModal(button) {
            const data = JSON.parse(button.dataset.detail);

            const modal = document.getElementById('detailModal');
            const card = document.getElementById('detailModalCard');

            // COVER
            modal.querySelector('img').src = data.main_image;

            // STATUS + KATEGORI
            const badges = modal.querySelectorAll('.px-2.py-0\\.5.rounded-md');
            badges[0].innerText = data.is_open ? 'Buka' : 'Tutup';
            badges[1].innerText = data.category;

            // JUDUL
            modal.querySelector('h3').innerHTML =
                `${data.name} <span class="text-brand-gold italic">${data.owner_highlight}</span>`;

            // ALAMAT
            modal.querySelector('.text-sm.text-white\\/80.mt-1').innerHTML =
                `<i class="iconoir-map-pin text-xs"></i> ${data.address}`;

            // INFO BOX
            const infoBold = modal.querySelectorAll('.text-sm.font-bold');

            infoBold.forEach(el => {
                if (el.innerText.includes('Rp')) {
                    el.innerText = 'Rp ' + Number(data.price_start).toLocaleString('id-ID');
                }

                if (el.innerText.includes('-')) {
                    el.innerText = `${data.open_time} - ${data.close_time}`;
                }
            });

            // WHATSAPP
            const waBtn = modal.querySelector('a[href^="https://wa.me"]');
            waBtn.href = 'https://wa.me/' + data.whatsapp;
            waBtn.innerHTML =
                `<i class="iconoir-whatsapp text-lg"></i> ${data.whatsapp}`;

            // SLOGAN
            modal.querySelector('.text-sm.font-bold.text-brand-text.dark\\:text-white.mb-2.italic').innerText =
                `"${data.slogan}"`;

            // DESKRIPSI
            const descs = modal.querySelectorAll('.leading-relaxed');
            descs[0].innerText = data.description;

            // MENU
            let menuHtml = '';

            if (data.menu.length > 0) {
                data.menu.forEach(item => {
                    menuHtml += `
            <div class="p-4 rounded-xl bg-white dark:bg-[#1A0E0E] border border-gray-100 dark:border-white/5 shadow-sm">
                <div class="flex justify-between items-start mb-1">
                    <h5 class="font-bold text-brand-text dark:text-white text-sm">${item.name}</h5>
                    <span class="text-brand-accent dark:text-brand-gold font-bold text-sm">
                        ${Number(item.price).toLocaleString('id-ID')}
                    </span>
                </div>
                <p class="text-xs text-brand-muted dark:text-white/60">
                    ${item.desc ?? ''}
                </p>
            </div>
            `;
                });
            } else {
                menuHtml = `<p class="text-sm text-gray-500">Menu belum tersedia</p>`;
            }

            modal.querySelector('.grid.grid-cols-1.sm\\:grid-cols-2.gap-4').innerHTML = menuHtml;

            // OPEN MODAL
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
                if (card) card.classList.replace('scale-95', 'scale-100');
            }, 10);
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

        document.addEventListener('DOMContentLoaded', function() {

            const search = document.getElementById('search');
            const category = document.getElementById('category');

            function loadData() {
                let keyword = search.value;
                let kategori = category.value;

                fetch(`{{ route('admin.umkm.index') }}?search=${keyword}&category=${kategori}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(data => {
                        document.getElementById('table-data').innerHTML = data;
                    });
            }

            search.addEventListener('keyup', loadData);
            category.addEventListener('change', loadData);

        });
    </script>
@endsection
