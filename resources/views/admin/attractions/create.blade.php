@extends('layouts.admin')

@section('title', 'Tambah Atraksi Baru')
@section('subtitle', 'Daftarkan titik daya tarik wisata baru di kawasan Odeon.')

@section('content')

    <div class="w-full mx-auto mb-6">
        <a href="{{ route('admin.attractions.index') }}"
            class="inline-flex items-center gap-2 text-sm font-bold text-brand-muted dark:text-white/50 hover:text-brand-accent transition-colors no-underline">
            <i class="iconoir-arrow-left text-lg"></i> Kembali ke Daftar Atraksi
        </a>
    </div>

    <form action="{{ route('admin.attractions.store') }}" method="POST" enctype="multipart/form-data"
        class="w-full mx-auto">
        @csrf

        <div
            class="bg-white dark:bg-[#1E1212] p-6 sm:p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">

            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Informasi Dasar
                </h3>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Nama Atraksi / Destinasi
                        <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" required placeholder="Contoh: Gapura Utama Odeon"
                        class="w-full px-4 py-3.5 text-lg font-semibold rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Deskripsi Singkat
                            (Sub-judul) <span class="text-rose-500">*</span></label>
                        <textarea name="excerpt" rows="2" required
                            placeholder="Tulis satu kalimat memikat yang akan tampil tepat di bawah judul..."
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Label Lokasi
                            Singkat</label>
                        <input type="text" name="location_label" placeholder="Contoh: Jl. Pajagalan, Sukabumi"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Label Spesial
                            (Opsional)</label>
                        <input type="text" name="special_badge" placeholder="Contoh: Foto Terfavorit, Ikonik, dll"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Deskripsi Lengkap
                        (Menjelajah Lebih Dalam) <span class="text-rose-500">*</span></label>
                    <textarea name="description" rows="8" required
                        placeholder="Ceritakan sejarah, daya tarik visual, dan pengalaman yang bisa dirasakan wisatawan di sini..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar"></textarea>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Info Praktis & Operasional
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Kategori Atraksi</label>
                        <input type="text" name="category" placeholder="Contoh: Spot Foto, Religi..."
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Rentang Hari
                            Operasional</label>
                        <input type="text" name="operational_days" placeholder="Contoh: Setiap Hari atau Senin - Jumat"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold text-brand-text dark:text-white mb-2 text-emerald-600 dark:text-emerald-400">Jam
                            Buka</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="iconoir-clock text-emerald-500 text-lg"></i>
                            </div>
                            <input type="text" name="open_time" placeholder="Pilih Jam"
                                class="time-picker w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-emerald-500/20 cursor-pointer bg-white">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2 text-rose-500">Jam
                            Tutup</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="iconoir-clock text-rose-500 text-lg"></i>
                            </div>
                            <input type="text" name="close_time" placeholder="Pilih Jam"
                                class="time-picker w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-rose-500/20 cursor-pointer bg-white">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Tiket Masuk</label>
                        <input type="text" name="ticket_price" placeholder="Contoh: Gratis atau Rp 10.000"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Fasilitas
                            Tersedia</label>
                        <input type="text" name="facilities" placeholder="Contoh: Area Parkir, Toilet Umum, Spot Foto"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                            <p class="text-[10px] text-brand-muted mt-2">Gunakan tanda koma ( , ) untuk memisahkan antar fasilitas agar muncul sebagai poin-poin di halaman detail.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2 flex items-center gap-2">
                            <i class="iconoir-map-pin text-rose-500"></i> Link Google Maps
                        </label>
                        <input type="url" name="google_maps_url" placeholder="Paste URL lokasi dari Google Maps..."
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-8">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Media Visual
                </h3>

                <div class="mb-10">
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-3">Foto Utama Atraksi (Cover)
                        <span class="text-rose-500">*</span></label>
                    <label
                        class="flex flex-col items-center justify-center w-full h-64 rounded-[2.5rem] border-2 border-dashed border-gray-300 dark:border-white/20 bg-gray-50 hover:bg-gray-100 dark:bg-[#0A0505] dark:hover:bg-white/5 transition-all cursor-pointer relative overflow-hidden group">

                        <img id="preview-main-image" src="" alt="Preview"
                            class="absolute inset-0 w-full h-full object-cover hidden">

                        <div id="main-image-placeholder"
                            class="text-center z-10 p-4 transition-opacity duration-300 group-hover:opacity-100 bg-white/60 dark:bg-black/40 backdrop-blur-md rounded-2xl">
                            <i
                                class="iconoir-cloud-upload text-3xl text-gray-700 dark:text-gray-200 mb-2 group-hover:text-brand-accent transition-colors"></i>
                            <p class="text-sm font-bold text-gray-800 dark:text-white">Pilih Foto Utama Atraksi</p>
                            <p class="text-[11px] text-gray-500 dark:text-white/50 mt-1">Lanskap disarankan. Maksimal 2MB.
                            </p>
                        </div>

                        <input type="file" id="main_image_upload" name="main_image" class="hidden" accept="image/*"
                            required />
                    </label>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-3">Galeri Foto
                        Tambahan</label>

                    <label
                        class="flex flex-col items-center justify-center w-full h-32 rounded-2xl border-2 border-dashed border-gray-300 dark:border-white/20 bg-gray-50 hover:bg-gray-100 dark:bg-[#0A0505] dark:hover:bg-white/5 transition-all cursor-pointer">
                        <div class="text-center p-4">
                            <i class="iconoir-multiple-pages-empty text-2xl text-gray-400 mb-2"></i>
                            <p class="text-xs font-bold text-gray-600 dark:text-white/60">Tambah Foto Galeri</p>
                            <p class="text-[10px] text-gray-400 mt-1">Bisa memilih banyak foto sekaligus</p>
                        </div>
                        <input type="file" id="gallery_upload" name="gallery[]" class="hidden" accept="image/*"
                            multiple />
                    </label>

                    <div id="gallery-preview-container"
                        class="mt-6 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4 hidden">
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-100 dark:border-white/10 flex justify-center">
                <button type="submit"
                    class="w-full md:w-auto md:px-16 py-4 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-xl shadow-brand-accent/30 hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                    <i class="iconoir-floppy-disk"></i> Simpan Atraksi Wisata
                </button>
            </div>

        </div>
    </form>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            flatpickr(".time-picker", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                disableMobile: "true"
            });

            const mainInput = document.getElementById('main_image_upload');
            const mainPreview = document.getElementById('preview-main-image');
            if (mainInput) {
                mainInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (event) => {
                            mainPreview.src = event.target.result;
                            mainPreview.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            const galleryInput = document.getElementById('gallery_upload');
            const galleryContainer = document.getElementById('gallery-preview-container');
            let selectedFiles = [];

            if (galleryInput) {
                galleryInput.addEventListener('change', function(e) {
                    const newFiles = Array.from(e.target.files);
                    selectedFiles = selectedFiles.concat(newFiles);
                    updateGalleryUI();
                    syncFiles();
                });
            }

            function updateGalleryUI() {
                galleryContainer.innerHTML = '';
                if (selectedFiles.length > 0) galleryContainer.classList.remove('hidden');
                else galleryContainer.classList.add('hidden');

                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        const div = document.createElement('div');
                        div.className =
                            'relative aspect-square rounded-xl overflow-hidden shadow-sm group border border-gray-200 dark:border-white/10';
                        div.innerHTML = `
                            <img src="${event.target.result}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <button type="button" onclick="removeImage(${index})" class="w-7 h-7 bg-rose-500 text-white rounded-full flex items-center justify-center hover:bg-rose-600 transition-all scale-75 group-hover:scale-100 shadow-lg">
                                    <i class="iconoir-xmark text-xs"></i>
                                </button>
                            </div>
                        `;
                        galleryContainer.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                });
            }

            window.removeImage = function(index) {
                selectedFiles.splice(index, 1);
                updateGalleryUI();
                syncFiles();
            };

            function syncFiles() {
                const dt = new DataTransfer();
                selectedFiles.forEach(file => dt.items.add(file));
                galleryInput.files = dt.files;
            }
        });
    </script>

@endsection
