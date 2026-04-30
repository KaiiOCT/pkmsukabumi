@extends('layouts.admin')

@section('title', 'Tambah UMKM & Kuliner')
@section('subtitle', 'Daftarkan mitra usaha lokal ke dalam sistem kawasan Odeon.')

@section('content')

    <div class="w-full mx-auto mb-6">
        <a href="{{ route('admin.umkm.index') }}"
            class="inline-flex items-center gap-2 text-sm font-bold text-brand-muted dark:text-white/50 hover:text-brand-accent transition-colors no-underline">
            <i class="iconoir-arrow-left text-lg"></i> Kembali ke Daftar UMKM
        </a>
    </div>

    <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto pb-10">
        @csrf

        <div
            class="bg-white dark:bg-[#1E1212] p-6 sm:p-10 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">

            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6 m-0">
                    Identitas Bisnis
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Nama UMKM (Baris 1 -
                            Putih) <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" required placeholder="Contoh: Bakmi Odeon"
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 font-bold">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Sorotan / Nama Pemilik
                            (Baris 2 - Gold) <span class="text-rose-500">*</span></label>
                        <input type="text" name="owner_highlight" required placeholder="Contoh: Mang Ujang"
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 font-bold">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Slogan / Tahun Berdiri
                            <span class="text-rose-500">*</span></label>
                        <input type="text" name="slogan" required placeholder="Contoh: Warisan Resep Sejak 1970"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Kategori Bisnis (Manual)
                            <span class="text-rose-500">*</span></label>
                        <select name="category"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                            <option value="">Semua Kategori</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="cafe">Cafe</option>
                            <option value="kerajinan">Kerajinan</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Deskripsi Lengkap Usaha
                        <span class="text-rose-500">*</span></label>
                    <textarea name="description" rows="5" required
                        placeholder="Ceritakan sejarah, keunikan, dan daya tarik utama dari UMKM ini..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar"></textarea>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Info Operasional
                </h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Status Saat Ini</label>
                        <select name="is_open"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none cursor-pointer">
                            <option value="1">Buka</option>
                            <option value="0">Tutup</option>
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-sm font-bold text-brand-text dark:text-white mb-2 text-emerald-600 dark:text-emerald-400">Jam
                            Buka <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="iconoir-clock text-emerald-500 text-lg"></i>
                            </div>
                            <input type="text" name="open_time" required placeholder="08:00"
                                class="time-picker w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-emerald-500/20 cursor-pointer">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2 text-rose-500">Jam Tutup
                            <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="iconoir-clock text-rose-500 text-lg"></i>
                            </div>
                            <input type="text" name="close_time" required placeholder="21:00"
                                class="time-picker w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-rose-500/20 cursor-pointer">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Harga Mulai (Rp) <span
                                class="text-rose-500">*</span></label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 pl-4 flex items-center text-brand-muted font-bold text-sm">Rp</span>
                            <input type="number" name="price_start" required placeholder="15000"
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-brand-accent/30 bg-brand-accent/5 dark:bg-brand-gold/5 text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent font-bold">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Alamat Singkat <span
                                    class="text-rose-500">*</span></label>
                            <input type="text" name="address" required placeholder="Contoh: Jl. Pajagalan No. 42"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                        </div>
                        <div>
                            <label
                                class="block text-sm font-bold text-brand-text dark:text-white mb-2 flex items-center gap-1.5">Link
                                Google Maps</label>
                            <input type="url" name="gmaps_url" placeholder="https://maps.google.com/..."
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                        </div>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold text-brand-text dark:text-white mb-2 flex items-center gap-1.5">Nomor
                            WhatsApp UMKM <span class="text-rose-500">*</span></label>
                        <input type="number" name="whatsapp" required placeholder="Contoh: 6281234567890"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                        <p class="text-[10px] text-gray-500 mt-2 leading-relaxed">Gunakan format 62 (tanpa angka 0 atau +
                            di depan) agar tombol "Hubungi Penjual" berfungsi otomatis.</p>
                    </div>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Media Visual
                </h3>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-3">Foto Utama UMKM <span
                            class="text-rose-500">*</span></label>
                    <label
                        class="flex flex-col items-center justify-center w-full h-64 rounded-[2rem] border-2 border-dashed border-gray-300 dark:border-white/20 bg-gray-50 hover:bg-gray-100 dark:bg-[#0A0505] dark:hover:bg-white/5 transition-all cursor-pointer relative overflow-hidden group">
                        <img id="preview-main-image" src="" alt="Preview"
                            class="absolute inset-0 w-full h-full object-cover hidden">
                        <div id="main-image-placeholder"
                            class="text-center z-10 p-4 transition-opacity duration-300 group-hover:opacity-100 bg-white/60 dark:bg-black/40 backdrop-blur-md rounded-2xl">
                            <i
                                class="iconoir-cloud-upload text-3xl text-gray-700 dark:text-gray-200 mb-2 group-hover:text-brand-accent transition-colors"></i>
                            <p class="text-sm font-bold text-gray-800 dark:text-white">Pilih Foto Utama UMKM</p>
                            <p class="text-[11px] text-gray-500 dark:text-white/50 mt-1">Foto tempat usaha/warung. Maksimal
                                2MB.</p>
                        </div>
                        <input type="file" id="main_image_upload" name="main_image" class="hidden" accept="image/*"
                            required />
                    </label>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-3">Galeri Foto Tambahan
                        (Produk/Suasana)</label>
                    <label
                        class="flex flex-col items-center justify-center w-full h-32 rounded-2xl border-2 border-dashed border-gray-300 dark:border-white/20 bg-gray-50 hover:bg-gray-100 dark:bg-[#0A0505] dark:hover:bg-white/5 transition-all cursor-pointer">
                        <div class="text-center p-4">
                            <i class="iconoir-multiple-pages-empty text-2xl text-gray-400 mb-2"></i>
                            <p class="text-xs font-bold text-gray-600 dark:text-white/60">Tambah Foto Galeri</p>
                        </div>
                        <input type="file" id="gallery_upload" name="gallery[]" class="hidden" accept="image/*"
                            multiple />
                    </label>
                    <div id="gallery-preview-container"
                        class="mt-6 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-4 hidden"></div>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 m-0">
                        Daftar Menu Unggulan
                    </h3>
                    <button type="button" id="btnAddMenu"
                        class="text-xs font-bold text-brand-accent bg-brand-accent/10 px-4 py-2 rounded-xl hover:bg-brand-accent/20 transition-colors flex items-center gap-1.5">
                        <i class="iconoir-plus-circle"></i> Tambah Menu
                    </button>
                </div>

                <div id="menuContainer" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div
                        class="menu-item bg-gray-50/50 dark:bg-[#1A0E0E] border border-gray-200 dark:border-white/10 rounded-2xl p-5 relative">
                        <div class="grid grid-cols-3 gap-3 mb-3">
                            <div class="col-span-2">
                                <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Nama Menu <span
                                        class="text-rose-500">*</span></label>
                                <input type="text" name="menu[0][name]" required placeholder="Cth: Bakmi Ayam Jamur"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-sm font-bold outline-none">
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Harga (Rp) <span
                                        class="text-rose-500">*</span></label>
                                <input type="number" name="menu[0][price]" required placeholder="25000"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-sm font-bold text-brand-accent dark:text-brand-gold outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Deskripsi Menu
                                (Opsional)</label>
                            <textarea name="menu[0][desc]" rows="2" placeholder="Komposisi atau keterangan menu..."
                                class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-xs outline-none custom-scrollbar"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="pt-8 border-t border-gray-100 dark:border-white/10 flex justify-center mt-12">
                <button type="submit"
                    class="w-full md:w-auto md:px-16 py-4 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-xl shadow-brand-accent/30 hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                    <i class="iconoir-floppy-disk"></i> Simpan UMKM
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
                    selectedFiles = selectedFiles.concat(Array.from(e.target.files));
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
                        div.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                <button type="button" onclick="removeImage(${index})" class="w-7 h-7 bg-rose-500 text-white rounded-full"><i class="iconoir-xmark text-xs"></i></button>
                            </div>`;
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

            let menuCount = 0;

            document.getElementById('btnAddMenu').addEventListener('click', function() {
                menuCount++;
                const menuHtml = `
                    <div class="menu-item bg-gray-50/50 dark:bg-[#1A0E0E] border border-gray-200 dark:border-white/10 rounded-2xl p-5 relative">
                        <button type="button" onclick="this.closest('.menu-item').remove()" class="absolute top-3 right-3 text-gray-400 hover:text-rose-500 transition-colors p-1" title="Hapus Menu">
                            <i class="iconoir-xmark text-lg"></i>
                        </button>
                        
                        <div class="grid grid-cols-3 gap-3 mb-3 pr-6">
                            <div class="col-span-2">
                                <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Nama Menu <span class="text-rose-500">*</span></label>
                                <input type="text" name="menu[${menuCount}][name]" required placeholder="Cth: Bakmi Ayam Jamur" class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-sm font-bold outline-none">
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Harga (Rp) <span class="text-rose-500">*</span></label>
                                <input type="number" name="menu[${menuCount}][price]" required placeholder="25000" class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-sm font-bold text-brand-accent dark:text-brand-gold outline-none">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Deskripsi Menu (Opsional)</label>
                            <textarea name="menu[${menuCount}][desc]" rows="2" placeholder="Komposisi atau keterangan menu..." class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-xs outline-none custom-scrollbar"></textarea>
                        </div>
                    </div>
                `;
                document.getElementById('menuContainer').insertAdjacentHTML('beforeend', menuHtml);
            });
        });
    </script>

@endsection
