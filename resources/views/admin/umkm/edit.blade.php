@extends('layouts.admin')

@section('title', 'Edit Profil UMKM & Kuliner')
@section('subtitle', 'Perbarui informasi operasional, menu, dan profil mitra usaha.')

@section('content')

    <div class="w-full mx-auto mb-6">
        <a href="{{ route('admin.umkm.index') }}"
            class="inline-flex items-center gap-2 text-sm font-bold text-brand-muted dark:text-white/50 hover:text-brand-accent transition-colors no-underline">
            <i class="iconoir-arrow-left text-lg"></i> Kembali ke Daftar UMKM
        </a>
    </div>

    <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data"
        class="w-full mx-auto pb-10">
        @csrf
        @method('PUT')

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

                        <input type="text" name="name" required value="{{ old('name', $umkm->name) }}"
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 font-bold">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Sorotan / Nama Pemilik
                            (Baris 2 - Gold) <span class="text-rose-500">*</span></label>

                        <input type="text" name="owner_highlight" required
                            value="{{ old('owner_highlight', $umkm->owner_highlight) }}"
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 font-bold">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Slogan / Tahun Berdiri
                            <span class="text-rose-500">*</span></label>

                        <input type="text" name="slogan" required value="{{ old('slogan', $umkm->slogan) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Kategori Bisnis<span
                                class="text-rose-500">*</span></label>

                        <select name="category"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                            <option value="">Semua Kategori</option>
                            <option value="makanan" {{ old('category', $umkm->category) == 'makanan' ? 'selected' : '' }}>
                                Makanan</option>
                            <option value="minuman" {{ old('category', $umkm->category) == 'minuman' ? 'selected' : '' }}>
                                Minuman</option>
                            <option value="cafe" {{ old('category', $umkm->category) == 'cafe' ? 'selected' : '' }}>Cafe
                            </option>
                            <option value="kerajinan"
                                {{ old('category', $umkm->category) == 'kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Deskripsi Lengkap Usaha
                        <span class="text-rose-500">*</span></label>

                    <textarea name="description" rows="5" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar">{{ old('description', $umkm->description) }}</textarea>
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
                            <option value="1" {{ old('is_open', $umkm->is_open) == 1 ? 'selected' : '' }}>Buka
                            </option>
                            <option value="0" {{ old('is_open', $umkm->is_open) == 0 ? 'selected' : '' }}>Tutup
                            </option>
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

                            <input type="text" name="open_time" required
                                value="{{ old('open_time', \Carbon\Carbon::parse($umkm->open_time)->format('H:i')) }}"
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

                            <input type="text" name="close_time" required
                                value="{{ old('close_time', \Carbon\Carbon::parse($umkm->close_time)->format('H:i')) }}"
                                class="time-picker w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-rose-500/20 cursor-pointer">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Harga Mulai (Rp)
                            <span class="text-rose-500">*</span></label>

                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 pl-4 flex items-center text-brand-muted font-bold text-sm">Rp</span>

                            <input type="number" name="price_start" required
                                value="{{ old('price_start', $umkm->price_start) }}"
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-brand-accent/30 bg-brand-accent/5 dark:bg-brand-gold/5 text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent font-bold">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Alamat Singkat
                                <span class="text-rose-500">*</span></label>

                            <input type="text" name="address" required value="{{ old('address', $umkm->address) }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                        </div>

                        <div>
                            <label
                                class="block text-sm font-bold text-brand-text dark:text-white mb-2 flex items-center gap-1.5">Link
                                Google Maps</label>

                            <input type="url" name="gmaps_url" value="{{ old('gmaps_url', $umkm->gmaps_url) }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                        </div>
                    </div>

                    <div>
                        <label
                            class="block text-sm font-bold text-brand-text dark:text-white mb-2 flex items-center gap-1.5">Nomor
                            WhatsApp UMKM <span class="text-rose-500">*</span></label>

                        <input type="number" name="whatsapp" required value="{{ old('whatsapp', $umkm->whatsapp) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">

                        <p class="text-[10px] text-gray-500 mt-2 leading-relaxed">Gunakan format 62 (tanpa angka 0 atau + di
                            depan) agar tombol "Hubungi Penjual" berfungsi otomatis.</p>
                    </div>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Media Visual
                </h3>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-3">Foto Utama UMKM Saat
                        Ini</label>

                    <label
                        class="flex flex-col items-center justify-center w-full h-64 rounded-[2rem] border-2 border-dashed border-gray-300 dark:border-white/20 bg-gray-50 hover:bg-gray-100 dark:bg-[#0A0505] dark:hover:bg-white/5 transition-all cursor-pointer relative overflow-hidden group shadow-inner">

                        <img id="preview-main-image" src="{{ asset('storage/' . $umkm->main_image) }}"
                            alt="Current Cover" class="absolute inset-0 w-full h-full object-cover">

                        <div id="main-image-placeholder"
                            class="text-center z-10 p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/60 backdrop-blur-md rounded-2xl">
                            <i class="iconoir-refresh text-3xl text-white mb-2 transition-colors"></i>
                            <p class="text-sm font-bold text-white">Ganti Foto Utama UMKM</p>
                        </div>

                        <input type="file" id="main_image_upload" name="main_image" class="hidden"
                            accept="image/*" />
                    </label>

                    <p class="text-[10px] text-gray-400 dark:text-white/40 mt-2 text-center">Abaikan jika tidak ingin
                        mengubah gambar utama.</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-3">Tambah Foto Galeri
                        Baru</label>

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
                        class="mt-6 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-4 {{ count($umkm->gallery ?? []) ? '' : 'hidden' }}">

                        @foreach ($umkm->gallery ?? [] as $img)
                            <div
                                class="relative aspect-square rounded-xl overflow-hidden shadow-sm group border border-gray-200 dark:border-white/10">
                                <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                            </div>
                        @endforeach

                    </div>
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

                    @foreach ($umkm->menu ?? [] as $i => $menu)
                        <div
                            class="menu-item bg-gray-50/50 dark:bg-[#1A0E0E] border border-gray-200 dark:border-white/10 rounded-2xl p-5 relative">
                            <button type="button" onclick="this.closest('.menu-item').remove()"
                                class="absolute top-3 right-3 text-gray-400 hover:text-rose-500 transition-colors p-1"
                                title="Hapus Menu">
                                <i class="iconoir-xmark text-lg"></i>
                            </button>

                            <div class="grid grid-cols-3 gap-3 mb-3 pr-6">
                                <div class="col-span-2">
                                    <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Nama Menu
                                        <span class="text-rose-500">*</span></label>

                                    <input type="text" name="menu[{{ $i }}][name]" required
                                        value="{{ $menu['name'] }}"
                                        class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-sm font-bold outline-none">
                                </div>

                                <div>
                                    <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Harga (Rp)
                                        <span class="text-rose-500">*</span></label>

                                    <input type="number" name="menu[{{ $i }}][price]" required
                                        value="{{ $menu['price'] }}"
                                        class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-sm font-bold text-brand-accent dark:text-brand-gold outline-none">
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Deskripsi Menu
                                    (Opsional)</label>

                                <textarea name="menu[{{ $i }}][desc]" rows="2"
                                    class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-xs outline-none custom-scrollbar">{{ $menu['desc'] ?? '' }}</textarea>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div
                class="pt-8 border-t border-gray-100 dark:border-white/10 flex flex-col md:flex-row items-center justify-center gap-4 mt-12">
                <button type="submit"
                    class="w-full md:w-auto md:px-16 py-4 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-xl shadow-brand-accent/30 hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                    <i class="iconoir-check-circle"></i> Perbarui UMKM
                </button>

                <a href="{{ route('admin.umkm.index') }}"
                    class="w-full md:w-auto px-10 py-4 rounded-2xl border border-gray-200 dark:border-white/10 bg-transparent text-brand-text dark:text-white font-bold text-sm hover:bg-gray-50 dark:hover:bg-white/5 transition-all no-underline text-center">
                    Batal
                </a>
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
                const originalSrc = mainPreview.src;

                mainInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];

                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = (event) => {
                            mainPreview.src = event.target.result;
                        };

                        reader.readAsDataURL(file);
                    } else {
                        mainPreview.src = originalSrc;
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

            document.getElementById('btnAddMenu').addEventListener('click', function() {
                let currentItems = document.querySelectorAll('.menu-item').length;

                const menuHtml = `
            <div class="menu-item bg-gray-50/50 dark:bg-[#1A0E0E] border border-gray-200 dark:border-white/10 rounded-2xl p-5 relative">
                <button type="button" onclick="this.closest('.menu-item').remove()" class="absolute top-3 right-3 text-gray-400 hover:text-rose-500 transition-colors p-1" title="Hapus Menu">
                    <i class="iconoir-xmark text-lg"></i>
                </button>

                <div class="grid grid-cols-3 gap-3 mb-3 pr-6">
                    <div class="col-span-2">
                        <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Nama Menu <span class="text-rose-500">*</span></label>
                        <input type="text" name="menu[${currentItems}][name]" required placeholder="Cth: Bakmi Ayam Jamur" class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-sm font-bold outline-none">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Harga (Rp) <span class="text-rose-500">*</span></label>
                        <input type="number" name="menu[${currentItems}][price]" required placeholder="25000" class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-sm font-bold text-brand-accent dark:text-brand-gold outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] uppercase font-bold text-brand-muted mb-1">Deskripsi Menu (Opsional)</label>
                    <textarea name="menu[${currentItems}][desc]" rows="2" placeholder="Komposisi atau keterangan menu..." class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-white dark:bg-black/20 text-xs outline-none custom-scrollbar"></textarea>
                </div>
            </div>
        `;

                document.getElementById('menuContainer').insertAdjacentHTML('beforeend', menuHtml);
            });
        });
    </script>

@endsection
