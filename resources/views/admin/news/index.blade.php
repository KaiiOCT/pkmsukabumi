@extends('layouts.admin')

@section('title', 'Berita & Acara')
@section('subtitle', 'Kelola artikel, pengumuman, dan acara Kampoeng Naga.')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div class="relative w-full sm:w-96">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="iconoir-search text-gray-400 dark:text-white/40 text-lg"></i>
            </div>

            <form action="{{ route('admin.news.index') }}" method="GET">
                <input type="text" id="searchInput" name="search" value="{{ request('search') }}"
                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold outline-none transition-all duration-300 placeholder:text-gray-400 dark:placeholder:text-white/30 shadow-sm"
                    placeholder="Cari judul berita atau acara...">
            </form>
        </div>

        <a href="{{ route('admin.news.create') }}"
            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 py-3 px-6 rounded-xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-lg shadow-brand-accent/20 dark:shadow-brand-gold/20 hover:-translate-y-0.5 transition-all duration-300 no-underline">
            <i class="iconoir-plus"></i> Tambah Berita
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
                            Judul Berita</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Tanggal Publish</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50">
                            Kategori</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center">
                            Status</th>
                        <th
                            class="px-6 py-4 text-[10px] font-extrabold uppercase tracking-widest text-brand-muted dark:text-white/50 text-center w-24">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody id="newsTable" class="divide-y divide-gray-50 dark:divide-white/5">
                    @foreach ($listNews as $index => $news)
                        <tr class="group hover:bg-gray-50/80 dark:hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 text-sm font-semibold text-brand-muted dark:text-white/50 text-center">
                                {{ $listNews->firstItem() + $index }}</td>

                            <td class="px-6 py-4">
                                <p class="text-sm font-bold text-brand-text dark:text-white truncate max-w-[250px]"
                                    title="{{ $news->title }}">
                                    @if ($news->is_featured == 1)
                                        <i class="iconoir-star-solid text-brand-gold text-xs mr-1" title="Berita Utama"></i>
                                    @endif
                                    {{ $news->title }}
                                </p>
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="text-sm font-semibold text-brand-muted dark:text-white/70">{{ date('d M Y', strtotime($news->published_at)) }}</span>
                            </td>

                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-md bg-rose-50 dark:bg-brand-accent/10 text-brand-accent dark:text-brand-gold text-[10px] font-bold uppercase tracking-wider border border-rose-100 dark:border-brand-accent/20">Budaya</span>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-[10px] font-extrabold uppercase border border-emerald-200 dark:border-emerald-500/20">
                                    Publish
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" onclick="openDetailModal(this)" data-id="{{ $news->id }}"
                                        data-title="{{ $news->title }}" data-category="{{ $news->category }}"
                                        data-image="{{ $news->image }}" data-published="{{ $news->published_at }}"
                                        data-excerpt="{{ $news->excerpt }}" data-content="{{ $news->content }}"
                                        data-quote="{{ $news->quote_text }}" data-author="{{ $news->quote_author }}"
                                        data-event-date="{{ $news->event_date }}"
                                        data-event-time="{{ $news->event_time }}"
                                        data-event-location="{{ $news->event_location }}"
                                        data-event-price="{{ $news->event_price }}" data-status="{{ $news->status }}"
                                        data-featured="{{ $news->is_featured }}"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white transition-colors tooltip-trigger outline-none border-none cursor-pointer">
                                        <i class="iconoir-eye text-sm"></i>
                                    </button>
                                    <a href="{{ route('admin.news.edit', $news->id) }}" method='POST'
                                        class="w-8 h-8 rounded-lg flex items-center justify-center bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500 transition-colors tooltip-trigger outline-none border-none cursor-pointer"
                                        title="Edit">
                                        <i class="iconoir-edit-pencil text-sm"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Yakin hapus berita?')"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center bg-rose-50 dark:bg-rose-500/10 text-rose-600 dark:text-rose-400 hover:bg-rose-600 hover:text-white transition-colors cursor-pointer">
                                            <i class="iconoir-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-100 dark:border-white/5 flex items-center justify-between flex-wrap gap-4">
            <p class="text-xs text-brand-muted dark:text-white/50 font-medium">Menampilkan <span
                    class="font-bold text-brand-text dark:text-white">1</span> sampai <span
                    class="font-bold text-brand-text dark:text-white">2</span> dari <span
                    class="font-bold text-brand-text dark:text-white">15</span> berita</p>

            <div class="flex items-center gap-1">
                <button
                    class="w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 dark:border-white/10 text-gray-400 dark:text-white/30 cursor-not-allowed outline-none border-none"
                    disabled>
                    <i class="iconoir-nav-arrow-left text-sm"></i>
                </button>
                <button
                    class="w-8 h-8 rounded-lg flex items-center justify-center border border-brand-accent dark:border-brand-gold bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-xs outline-none border-none cursor-pointer">1</button>
                <button
                    class="w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 dark:border-white/10 text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 font-bold text-xs transition-colors outline-none border-none cursor-pointer">2</button>
                <button
                    class="w-8 h-8 rounded-lg flex items-center justify-center border border-gray-200 dark:border-white/10 text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 transition-colors outline-none border-none cursor-pointer">
                    <i class="iconoir-nav-arrow-right text-sm"></i>
                </button>
            </div>
        </div>

    </div>

    <div id="detailModal"
        class="fixed inset-0 z-[60] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer" onclick="closeModal('detailModal')">
        </div>

        <div id="detailModalCard"
            class="relative w-full max-w-4xl bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh] transform scale-95 transition-transform duration-300">

            <div class="relative w-full h-48 sm:h-56 shrink-0">
                <img src="https://images.unsplash.com/photo-1518331647614-7a1f04cd34cf?q=80&w=1200" alt="Cover"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/90 via-brand-dark/50 to-transparent"></div>

                <button onclick="closeModal('detailModal')"
                    class="absolute top-4 right-4 w-8 h-8 bg-black/20 hover:bg-rose-500 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-colors z-10 outline-none border-none cursor-pointer">
                    <i class="iconoir-xmark text-lg"></i>
                </button>

                <div class="absolute bottom-5 left-6 right-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span
                            class="px-2 py-0.5 rounded-md bg-brand-gold text-brand-dark text-[10px] font-bold uppercase tracking-wider flex items-center gap-1"><i
                                class="iconoir-star-solid text-[10px]"></i> Berita Utama</span>
                        <span
                            class="px-2 py-0.5 rounded-md bg-white/20 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider border border-white/20">Budaya</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-white leading-tight font-serif mb-1">Persiapan Festival
                        Lampion Merah Menyambut Musim Semi</h3>
                    <p class="text-xs text-white/70 italic flex items-center gap-1"><i
                            class="iconoir-calendar text-brand-gold"></i> Diterbitkan: 10 April 2026</p>
                </div>
            </div>

            <div class="p-0 overflow-y-auto custom-scrollbar flex-1 bg-gray-50/30 dark:bg-transparent">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-0 h-full">

                    <div class="md:col-span-2 p-6 sm:p-8 border-r border-gray-100 dark:border-white/5 space-y-6">
                        <div class="border-l-4 border-brand-accent dark:border-brand-gold pl-4">
                            <p class="text-sm font-bold text-brand-text dark:text-white italic leading-relaxed">
                                Ribuan lampion merah mulai menghiasi jalan Pajagalan sebagai bentuk pelestarian warisan
                                leluhur — festival budaya yang menyedot ribuan wisatawan lokal dan mancanegara.
                            </p>
                        </div>

                        <div class="prose prose-sm dark:prose-invert max-w-none">
                            <p>Warga Kampoeng Naga mulai menghias sepanjang jalan Pajagalan dengan ribuan lampion merah
                                sebagai bentuk pelestarian warisan leluhur. Pemandangan ini sangat memanjakan mata, terutama
                                ketika matahari terbenam dan lampu-lampu lampion mulai dinyalakan. Aroma dupa segar
                                bercampur dengan semerbak rempah dari kedai kuliner menciptakan atmosfer yang begitu otentik
                                dan nostalgik.</p>

                            <blockquote
                                class="bg-brand-primary/50 dark:bg-white/5 border border-brand-accent/10 p-5 rounded-2xl my-6 not-prose relative">
                                <i class="iconoir-quote text-4xl text-brand-accent/10 absolute top-2 left-2"></i>
                                <p class="text-brand-text dark:text-white italic relative z-10 mb-2">"Kami berharap
                                    pengunjung tidak hanya datang untuk berfoto, tetapi juga membawa pulang cerita mengenai
                                    indahnya harmonisasi di Kampoeng Naga."</p>
                                <p class="text-[10px] font-bold text-brand-muted uppercase">— Ketua Panitia Festival 2026
                                </p>
                            </blockquote>

                            <p>Panitia juga menyiapkan beberapa rangkaian acara yang akan menyemarakkan festival ini, mulai
                                dari bazar kuliner otentik hingga pertunjukan seni barongsai di jalan utama. Festival ini
                                direncanakan akan mencapai puncaknya pada akhir pekan mendatang. Para pengunjung dihimbau
                                untuk datang menggunakan transportasi umum guna menghindari kemacetan di jalan raya utama
                                kawasan pecinan.</p>
                        </div>
                    </div>

                    <div
                        class="p-6 sm:p-8 bg-white dark:bg-[#1A0E0E] flex flex-col border-t md:border-t-0 border-gray-100 dark:border-white/5">
                        <div class="mb-8">
                            <h4
                                class="text-xs font-extrabold uppercase tracking-widest text-brand-muted mb-4 border-b border-gray-100 dark:border-white/10 pb-2 flex items-center gap-1.5">
                                <i class="iconoir-calendar text-emerald-500"></i> Detail Acara
                            </h4>

                            <ul class="space-y-4">
                                <li>
                                    <p class="text-[10px] uppercase text-brand-muted mb-0.5">Tanggal Acara</p>
                                    <p class="text-sm font-bold text-brand-text dark:text-white">10 - 12 April 2026</p>
                                </li>
                                <li>
                                    <p class="text-[10px] uppercase text-brand-muted mb-0.5">Waktu / Jam</p>
                                    <p class="text-sm font-bold text-brand-text dark:text-white">16:00 - 22:00 WIB</p>
                                </li>
                                <li>
                                    <p class="text-[10px] uppercase text-brand-muted mb-0.5">Lokasi</p>
                                    <p class="text-sm font-bold text-brand-text dark:text-white">Jl. Pajagalan, Sukabumi
                                    </p>
                                </li>
                                <li>
                                    <p class="text-[10px] uppercase text-brand-muted mb-0.5">Harga Tiket</p>
                                    <p class="text-sm font-bold text-emerald-600 dark:text-emerald-400">Gratis / Umum</p>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-auto pt-6 border-t border-gray-100 dark:border-white/10">
                            <p class="text-[10px] uppercase font-bold text-brand-muted mb-2">Status Publikasi</p>
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 text-xs font-bold w-full justify-center border border-emerald-200 dark:border-emerald-800/50">
                                <i class="iconoir-check-circle"></i> Ditayangkan Publik
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="deleteModal"
        class="fixed inset-0 z-[100] hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-brand-dark/80 backdrop-blur-sm cursor-pointer"
            onclick="closeModal('deleteModal')"></div>
        <div id="deleteModalCard"
            class="relative w-full max-w-sm bg-white dark:bg-[#1E1212] rounded-[2rem] shadow-2xl p-8 text-center transform scale-95 transition-transform duration-300">

            <div
                class="w-20 h-20 rounded-full bg-rose-50 dark:bg-rose-500/10 flex items-center justify-center text-rose-500 mx-auto mb-5">
                <i class="iconoir-trash text-4xl"></i>
            </div>

            <h3 class="font-bold text-brand-text dark:text-white text-xl mb-2">Hapus Berita?</h3>
            <p class="text-sm text-brand-muted dark:text-white/60 mb-8 leading-relaxed">Anda yakin ingin menghapus data
                berita ini? Tindakan ini tidak dapat dibatalkan.</p>

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
        const newsData = @json($listNews->items());

        function openDetailModal(btn) {

            const modal = document.getElementById('detailModal');
            const card = document.getElementById('detailModalCard');

            const d = btn.dataset;


            /* HEADER */
            modal.querySelector('img').src =
                d.image ?
                '/storage/' + d.image :
                'https://images.unsplash.com/photo-1518331647614-7a1f04cd34cf?q=80&w=1200';

            modal.querySelector('h3').innerText = d.title;

            modal.querySelector('.text-xs.text-white\\/70').innerHTML =
                '<i class="iconoir-calendar text-brand-gold"></i> Diterbitkan: ' + d.published;


            /* BADGE */
            const badges = modal.querySelectorAll('.absolute.bottom-5 span');

            badges[1].innerText = d.category;

            if (d.featured == 1) {
                badges[0].style.display = 'inline-flex';
            } else {
                badges[0].style.display = 'none';
            }


            /* CONTENT */
            modal.querySelector('.border-l-4 p').innerText = d.excerpt;
            modal.querySelector('.prose').innerHTML = d.content;


            /* EVENT */
            const eventValues = modal.querySelectorAll('.space-y-4 li p:last-child');

            eventValues[0].textContent = d.eventDate || '-';
            eventValues[1].textContent = d.eventTime || '-';
            eventValues[2].textContent = d.eventLocation || '-';
            eventValues[3].textContent = d.eventPrice || '-';


            /* STATUS */
            const statusBadge = modal.querySelector('.mt-auto span');

            if (d.status == 'draft') {
                statusBadge.innerHTML =
                    '<i class="iconoir-edit-pencil"></i> Draft';
            } else {
                statusBadge.innerHTML =
                    '<i class="iconoir-check-circle"></i> Ditayangkan Publik';
            }


            /* OPEN */
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

            const input = document.getElementById('searchInput');
            const rows = document.querySelectorAll('#newsTable tr');

            input.addEventListener('keyup', function() {

                let keyword = this.value.toLowerCase();

                rows.forEach(row => {

                    let text = row.innerText.toLowerCase();

                    if (text.includes(keyword)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>

@endsection
