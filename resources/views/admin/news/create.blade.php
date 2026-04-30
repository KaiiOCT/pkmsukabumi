@extends('layouts.admin')

@section('title', 'Tulis Berita / Acara Baru')
@section('subtitle', 'Buat artikel, pengumuman acara, atau liputan terbaru.')

@section('content')

    <div class="w-full mx-auto mb-6">
        <a href="{{ route('admin.news.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-muted dark:text-white/50 hover:text-brand-accent transition-colors no-underline">
            <i class="iconoir-arrow-left text-lg"></i> Kembali ke Daftar Berita
        </a>
    </div>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto pb-10">
        @csrf

        <div class="bg-white dark:bg-[#1E1212] p-6 sm:p-10 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">

            <div class="mb-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 m-0">
                        Informasi Dasar
                    </h3>
                    <label class="flex items-center gap-2 cursor-pointer bg-brand-gold/10 px-4 py-2 rounded-xl border border-brand-gold/20 hover:bg-brand-gold/20 transition-colors">
                        <input type="checkbox" name="is_featured" value="1" class="w-4 h-4 text-brand-accent border-gray-300 rounded">
                        <span class="text-sm font-bold text-brand-text dark:text-white flex items-center gap-1">
                            <i class="iconoir-star-solid text-brand-gold"></i> Jadikan Berita Utama
                        </span>
                    </label>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Judul Artikel <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" required placeholder="Contoh: Persiapan Festival Lampion Merah..." 
                        class="w-full px-4 py-3.5 text-lg font-bold rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Kategori Berita <span class="text-rose-500">*</span></label>
                        <select name="category" required class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 cursor-pointer">
                            <option value="budaya">Budaya</option>
                            <option value="event">Event</option>
                            <option value="komunitas">Komunitas</option>
                        </select>    
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Status Publikasi <span class="text-rose-500">*</span></label>
                        <select name="status" required class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 cursor-pointer">
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Gambar Utama (Cover) <span class="text-rose-500">*</span></label>
                        <label class="flex flex-col items-center justify-center w-full h-40 rounded-2xl border-2 border-dashed border-gray-300 dark:border-white/20 bg-gray-50 hover:bg-gray-100 dark:bg-[#0A0505] dark:hover:bg-white/5 transition-all cursor-pointer relative overflow-hidden group">
                            <img id="preview-main-image" src="" alt="Preview" class="absolute inset-0 w-full h-full object-cover hidden">
                            <div id="main-image-placeholder" class="text-center z-10 p-4 transition-opacity duration-300 group-hover:opacity-100 bg-white/60 dark:bg-black/40 backdrop-blur-md rounded-2xl">
                                <i class="iconoir-cloud-upload text-3xl text-gray-700 dark:text-gray-200 mb-2"></i>
                                <p class="text-sm font-bold text-gray-800 dark:text-white">Pilih Foto Utama</p>
                            </div>
                            <input type="file" id="main_image_upload" name="main_image" class="hidden" accept="image/*" required />
                        </label>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Keterangan Gambar (Opsional)</label>
                        <textarea name="image_caption" rows="5" placeholder="Contoh: Lampion merah menghiasi lorong Pajagalan menyambut festival tahunan Kampoeng Naga. (Foto: Dokumentasi Odeon)" 
                            class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar"></textarea>
                    </div>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-10">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                    Isi Artikel
                </h3>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Ringkasan Berita <span class="text-rose-500">*</span></label>
                    <textarea name="excerpt" rows="3" required placeholder="Ringkasan singkat yang akan muncul di daftar berita dan paragraf awal artikel..." 
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar"></textarea>
                    <p class="text-[10px] text-brand-muted mt-1">Maksimal 2-3 kalimat. Sangat penting untuk SEO.</p>
                </div>

                <div class="mb-6 bg-brand-gold/5 border border-brand-gold/20 p-5 rounded-2xl">
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-4 text-brand-gold flex items-center gap-1.5">Kutipan Sorotan (Opsional)</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-2">
                            <textarea name="quote_text" rows="2" placeholder="Isi kutipan tokoh..." 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-gold/30 italic custom-scrollbar"></textarea>
                        </div>
                        <div>
                            <input type="text" name="quote_author" placeholder="Nama Tokoh (Cth: Ketua Panitia)" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-gold/30 mt-1 md:mt-0">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Isi Konten Lengkap <span class="text-rose-500">*</span></label>
                    <textarea name="content" rows="12" required placeholder="Tuliskan isi berita selengkapnya di sini..." 
                        class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar"></textarea>
                    <p class="text-[10px] text-brand-muted mt-2"><i class="iconoir-info-circle"></i> Gunakan textarea ini untuk mengetik paragraf biasa. Di tahap integrasi Backend, kotak ini akan diganti dengan Rich Text Editor (seperti MS Word).</p>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-white/10 mb-10">

            <div class="mb-10 bg-emerald-50/30 dark:bg-emerald-900/10 border border-emerald-100 dark:border-emerald-900/30 p-6 sm:p-8 rounded-[2rem]">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 m-0">
                            Tambahkan Detail Acara?
                        </h3>
                        <p class="text-xs text-brand-muted dark:text-white/60 mt-1">Aktifkan jika berita ini memuat undangan acara/event.</p>
                    </div>
                    
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="has_event_toggle" name="has_event" value="1" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-500"></div>
                        <span class="ml-3 text-sm font-bold text-brand-text dark:text-white">Ya, Ini Acara</span>
                    </label>
                </div>

                <div id="event_details_form" class="grid grid-cols-1 md:grid-cols-2 gap-4 hidden transition-all">
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Tanggal Acara</label>
                        <input type="text" name="event_date" placeholder="Contoh: 10 - 12 April 2026" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none focus:ring-2 focus:ring-emerald-500/30">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Waktu / Jam</label>
                        <input type="text" name="event_time" placeholder="Contoh: 16:00 - 22:00 WIB" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none focus:ring-2 focus:ring-emerald-500/30">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Lokasi Acara</label>
                        <input type="text" name="event_location" placeholder="Contoh: Jl. Pajagalan, Sukabumi" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none focus:ring-2 focus:ring-emerald-500/30">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Harga Tiket (HTM)</label>
                        <input type="text" name="event_price" placeholder="Contoh: Gratis / Umum" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none focus:ring-2 focus:ring-emerald-500/30">
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-100 dark:border-white/10 flex justify-center mt-12">
                <button type="submit" class="w-full md:w-auto md:px-16 py-4 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-xl shadow-brand-accent/30 hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                    Terbitkan Berita
                </button>
            </div>

        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainInput = document.getElementById('main_image_upload');
            const mainPreview = document.getElementById('preview-main-image');
            const placeholder = document.getElementById('main-image-placeholder');
            
            if (mainInput) {
                mainInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (event) => {
                            mainPreview.src = event.target.result;
                            mainPreview.classList.remove('hidden');
                            placeholder.classList.add('opacity-0');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            const toggleEvent = document.getElementById('has_event_toggle');
            const eventForm = document.getElementById('event_details_form');
            const eventInputs = eventForm.querySelectorAll('input');

            if (toggleEvent && eventForm) {
                toggleEvent.addEventListener('change', function() {
                    if (this.checked) {
                        eventForm.classList.remove('hidden');
                        eventInputs.forEach(input => input.setAttribute('required', 'required'));
                    } else {
                        eventForm.classList.add('hidden');
                        eventInputs.forEach(input => {
                            input.removeAttribute('required');
                            input.value = '';
                        });
                    }
                });
            }
        });
    </script>

@endsection