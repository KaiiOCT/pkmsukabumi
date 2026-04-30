@extends('layouts.admin')

@section('title', 'Buat Paket Wisata Baru')
@section('subtitle', 'Rancang paket pengalaman unik untuk wisatawan.')

@section('content')

    <div class="w-full mx-auto mb-6">
        <a href="{{ route('admin.packages.index') }}"
            class="inline-flex items-center gap-2 text-sm font-bold text-brand-muted dark:text-white/50 hover:text-brand-accent transition-colors no-underline">
            <i class="iconoir-arrow-left text-lg"></i> Kembali ke Daftar Paket
        </a>
    </div>

    <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data"
        class="w-full mx-auto pb-10">
        @csrf

        <div
            class="bg-white dark:bg-[#1E1212] p-6 sm:p-10 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">

            <div class="mb-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 m-0">
                        Identitas & Marketing
                    </h3>
                    <label
                        class="flex items-center gap-2 cursor-pointer bg-brand-gold/10 px-4 py-2 rounded-xl border border-brand-gold/20 hover:bg-brand-gold/20 transition-colors">
                        <input type="checkbox" name="is_bestseller" value="1"
                            class="w-4 h-4 text-brand-accent border-gray-300 rounded">
                        <span class="text-sm font-bold text-brand-text dark:text-white flex items-center gap-1">
                            Best Seller
                        </span>
                    </label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Judul Utama (Baris 1)
                            <span class="text-rose-500">*</span></label>
                        <input type="text" name="title_line1" required placeholder="Contoh: Eksplorasi Mendalam"
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Judul Sorotan (Baris 2 -
                            Gold) <span class="text-rose-500">*</span></label>
                        <input type="text" name="title_line2" required placeholder="Contoh: Kampoeng Naga Bermalam"
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Sub-judul / Slogan Pendek <span class="text-rose-500">*</span></label>
                        <input type="text" name="catchphrase" required placeholder="Contoh: Rasakan Nostalgia Masa Lampau" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Label Lokasi Singkat <span class="text-rose-500">*</span></label>
                        <input type="text" name="location_label" required placeholder="Contoh: Sukabumi, Jawa Barat" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                </div>

                <div class="mb-6">
                    <label
                        class="block text-sm font-bold text-brand-text dark:text-white mb-2 text-brand-gold flex items-center gap-1">
                        Kutipan Estetik (Opsional)
                    </label>
                    <textarea name="quote" rows="2"
                        placeholder="Contoh: Bayangkan diri Anda berjalan menyusuri lorong-lorong pecinan kuno..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 italic custom-scrollbar"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Deskripsi Lengkap Paket
                        <span class="text-rose-500">*</span></label>
                    <textarea name="description" rows="5" required
                        placeholder="Jelaskan secara naratif apa saja pengalaman yang akan didapatkan..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar"></textarea>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">
            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Info Praktis & Harga
                </h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Durasi (Teks)</label>
                        <input type="text" name="duration" placeholder="Misal: 2 Hari 1 Malam"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none text-sm focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Ukuran Grup</label>
                        <input type="text" name="group_size" placeholder="Misal: Min. 2 Orang"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none text-sm focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Pemandu & Bahasa</label>
                        <input type="text" name="guide" placeholder="Misal: Lokal / Indonesia"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none text-sm focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Jenis Aktivitas</label>
                        <input type="text" name="activity_type" placeholder="Misal: Budaya & Santai"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none text-sm focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Harga Utama (Rp / Orang)
                            <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <span
                                class="absolute inset-y-0 left-0 pl-4 flex items-center text-brand-muted font-bold text-sm">Rp</span>
                            <input type="number" name="price" required placeholder="850000"
                                class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-brand-accent/30 bg-brand-accent/5 dark:bg-brand-gold/5 text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent font-bold text-lg">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2 text-rose-500">Harga
                            Coret (Diskon)</label>
                        <input type="number" name="price_strike" placeholder="1200000"
                            class="w-full px-4 py-3.5 rounded-xl border border-rose-200 dark:border-rose-900/30 bg-rose-50/50 dark:bg-rose-900/10 text-brand-text dark:text-white outline-none text-sm focus:ring-2 focus:ring-rose-500/20">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Sisa Slot Promo (Opsional)</label>
                        <input type="number" name="slots_left" placeholder="Misal: 4"
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none text-sm focus:ring-2 focus:ring-brand-accent/20">
                        <p class="text-[9px] text-brand-muted mt-1 leading-tight">Biarkan kosong jika paket tidak memiliki batasan kuota (Unlimited).</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Status Penjualan</label>
                        <select name="status"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none cursor-pointer text-sm">
                            <option value="active">Tersedia</option>
                            <option value="inactive">Habis</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Kategori</label>
                        <input type="text" name="category" placeholder="Contoh: Edukasi, Budaya, Kuliner..."
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none text-sm focus:ring-2 focus:ring-brand-accent/20">
                    </div>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">
            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Fasilitas
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label
                            class="block text-[10px] font-extrabold text-emerald-600 dark:text-emerald-400 uppercase tracking-widest mb-2">Termasuk
                            (Included)</label>
                        <textarea name="included" rows="4" placeholder="Misal: Akomodasi Hotel Bintang 3, Tour Guide Berlisensi..."
                            class="w-full px-4 py-3 rounded-xl border border-emerald-200/50 bg-emerald-50/30 dark:bg-emerald-500/5 text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-emerald-500/20 custom-scrollbar"></textarea>
                        <p class="text-[10px] text-gray-500 mt-1">Pisahkan antar item dengan tanda koma ( , ). Maksimal 3
                            item pertama akan tampil di card halaman depan.</p>
                    </div>
                    <div>
                        <label
                            class="block text-[10px] font-extrabold text-rose-600 dark:text-rose-400 uppercase tracking-widest mb-2">Tidak
                            Termasuk (Excluded)</label>
                        <textarea name="excluded" rows="4" placeholder="Misal: Transportasi dari kota asal, Pengeluaran pribadi..."
                            class="w-full px-4 py-3 rounded-xl border border-rose-200/50 bg-rose-50/30 dark:bg-rose-500/5 text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-rose-500/20 custom-scrollbar"></textarea>
                        <p class="text-[10px] text-gray-500 mt-1">Pisahkan antar item dengan tanda koma ( , ).</p>
                    </div>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Media Visual
                </h3>

                <div class="mb-8">
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-3">Foto Utama (Hero &
                        Thumbnail) <span class="text-rose-500">*</span></label>
                    <label
                        class="flex flex-col items-center justify-center w-full h-64 rounded-[2rem] border-2 border-dashed border-gray-300 dark:border-white/20 bg-gray-50 hover:bg-gray-100 dark:bg-[#0A0505] dark:hover:bg-white/5 transition-all cursor-pointer relative overflow-hidden group">
                        <img id="preview-main-image" src="" alt="Preview"
                            class="absolute inset-0 w-full h-full object-cover hidden">
                        <div id="main-image-placeholder"
                            class="text-center z-10 p-4 transition-opacity duration-300 group-hover:opacity-100 bg-white/60 dark:bg-black/40 backdrop-blur-md rounded-2xl">
                            <i
                                class="iconoir-cloud-upload text-3xl text-gray-700 dark:text-gray-200 mb-2 group-hover:text-brand-accent transition-colors"></i>
                            <p class="text-sm font-bold text-gray-800 dark:text-white">Pilih Foto Utama Paket</p>
                            <p class="text-[11px] text-gray-500 dark:text-white/50 mt-1">Landscape disarankan. Maksimal 2MB.
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
                        Rencana Perjalanan
                    </h3>
                    <button type="button" id="btnAddDay"
                        class="text-xs font-bold text-brand-accent bg-brand-accent/10 px-3 py-1.5 rounded-lg hover:bg-brand-accent/20 transition-colors">
                        Tambah Hari
                    </button>
                </div>

                <div id="itineraryContainer" class="space-y-8">
                    <div
                        class="day-block bg-gray-50/50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-[2rem] p-6 sm:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h4
                                class="font-serif text-xl font-bold text-brand-text dark:text-white flex items-center gap-2">
                                <span
                                    class="w-8 h-8 rounded-full bg-brand-accent text-white flex items-center justify-center text-sm">1</span>
                                Hari Pertama
                            </h4>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="md:col-span-2">
                                <input type="text" name="itinerary[0][title]" required
                                    placeholder="Judul Hari (Cth: Ketibaan & Petualangan Malam)"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm focus:ring-2 focus:ring-brand-accent/20 outline-none">
                            </div>
                            <div>
                                <input type="text" name="itinerary[0][time_range]"
                                    placeholder="Waktu (Cth: Pukul 14:00 - 21:00)"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm focus:ring-2 focus:ring-brand-accent/20 outline-none">
                            </div>
                        </div>

                        <div class="activities-container space-y-4 border-l-2 border-brand-accent/20 ml-4 pl-6">
                            <div
                                class="activity-item bg-white dark:bg-[#1E1212] p-5 rounded-2xl border border-gray-100 dark:border-white/5 shadow-sm relative">
                                <div
                                    class="absolute -left-[35px] top-5 w-4 h-4 rounded-full bg-brand-accent ring-4 ring-white dark:ring-[#1E1212]">
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                                    <div>
                                        <input type="text" name="itinerary[0][activities][0][time]"
                                            placeholder="Jam (14:00)"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-black/20 text-xs outline-none">
                                        <select name="itinerary[0][activities][0][color]"
                                            class="w-full px-3 py-2 mt-2 rounded-lg border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-black/20 text-xs outline-none">
                                            <option value="brand-accent">Warna Biasa</option>
                                            <option value="brand-gold">Warna Emas (Puncak)</option>
                                        </select>
                                    </div>
                                    <div class="sm:col-span-3 space-y-3 pr-6">
                                        <input type="text" name="itinerary[0][activities][0][title]"
                                            placeholder="Nama Kegiatan (Cth: Check-In Hotel)"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-black/20 text-sm font-bold outline-none">
                                        <textarea name="itinerary[0][activities][0][desc]" rows="2" placeholder="Deskripsi ringkas..."
                                            class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-black/20 text-xs outline-none custom-scrollbar"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 ml-4">
                            <button type="button"
                                class="btn-add-activity text-xs font-bold text-gray-500 hover:text-brand-accent transition-colors flex items-center gap-1">
                                <i class="iconoir-plus-circle"></i> Tambah Kegiatan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-100 dark:border-white/10 flex justify-center mt-12">
                <button type="submit"
                    class="w-full md:w-auto md:px-16 py-4 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-xl shadow-brand-accent/30 hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                    <i class="iconoir-floppy-disk"></i> Simpan Paket Wisata
                </button>
            </div>

        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                            'relative aspect-square rounded-xl overflow-hidden shadow-sm group border border-gray-200';
                        div.innerHTML = `<img src="${event.target.result}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center">
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

            let dayCount = 0;

            document.getElementById('btnAddDay').addEventListener('click', function() {
                dayCount++;
                const actCount = 0;
                const dayHtml = `
                    <div class="day-block bg-gray-50/50 dark:bg-white/5 border border-gray-200 dark:border-white/10 rounded-[2rem] p-6 sm:p-8 relative mt-8">
                        <button type="button" onclick="this.closest('.day-block').remove()" class="absolute top-6 right-6 text-rose-500 hover:text-rose-700 text-lg font-bold"><i class="iconoir-trash"></i></button>
                        
                        <div class="flex items-center mb-6">
                            <h4 class="font-serif text-xl font-bold text-brand-text dark:text-white flex items-center gap-2">
                                <span class="w-8 h-8 rounded-full bg-brand-accent text-white flex items-center justify-center text-sm">${dayCount + 1}</span> Hari Ke-${dayCount + 1}
                            </h4>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="md:col-span-2">
                                <input type="text" name="itinerary[${dayCount}][title]" required placeholder="Judul Hari" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none">
                            </div>
                            <div>
                                <input type="text" name="itinerary[${dayCount}][time_range]" placeholder="Waktu (Cth: Pukul 07:00 - 12:00)" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none">
                            </div>
                        </div>

                        <div class="activities-container space-y-4 border-l-2 border-brand-accent/20 ml-4 pl-6">
                            </div>
                        
                        <div class="mt-6 ml-4">
                            <button type="button" class="btn-add-activity text-xs font-bold text-gray-500 hover:text-brand-accent flex items-center gap-1" data-day="${dayCount}">
                                <i class="iconoir-plus-circle"></i> Tambah Kegiatan
                            </button>
                        </div>
                    </div>`;

                document.getElementById('itineraryContainer').insertAdjacentHTML('beforeend', dayHtml);
            });

            document.getElementById('itineraryContainer').addEventListener('click', function(e) {
                if (e.target.closest('.btn-add-activity')) {
                    const btn = e.target.closest('.btn-add-activity');
                    const container = btn.closest('.day-block').querySelector('.activities-container');

                    const dayIndex = btn.dataset.day || 0;
                    const activityIndex = container.children.length;

                    const actHtml = `
                        <div class="activity-item bg-white dark:bg-[#1E1212] p-5 rounded-2xl border border-gray-100 dark:border-white/5 shadow-sm relative mt-4">
                            <div class="absolute -left-[35px] top-5 w-4 h-4 rounded-full bg-gray-300 ring-4 ring-white dark:ring-[#1E1212]"></div>
                            <button type="button" onclick="this.closest('.activity-item').remove()" class="absolute top-4 right-4 text-gray-400 hover:text-rose-500"><i class="iconoir-xmark"></i></button>
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                                <div>
                                    <input type="text" name="itinerary[${dayIndex}][activities][${activityIndex}][time]" placeholder="Jam" class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-black/20 text-xs outline-none">
                                    <select name="itinerary[${dayIndex}][activities][${activityIndex}][color]" class="w-full px-3 py-2 mt-2 rounded-lg border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-black/20 text-xs outline-none">
                                        <option value="brand-accent">Warna Biasa</option>
                                        <option value="brand-gold">Warna Emas (Puncak)</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-3 space-y-3 pr-6">
                                    <input type="text" name="itinerary[${dayIndex}][activities][${activityIndex}][title]" placeholder="Nama Kegiatan" class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-black/20 text-sm font-bold outline-none">
                                    <textarea name="itinerary[${dayIndex}][activities][${activityIndex}][desc]" rows="2" placeholder="Deskripsi..." class="w-full px-3 py-2 rounded-lg border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-black/20 text-xs outline-none custom-scrollbar"></textarea>
                                </div>
                            </div>
                        </div>`;
                    container.insertAdjacentHTML('beforeend', actHtml);
                }
            });
        });
    </script>
@endsection
