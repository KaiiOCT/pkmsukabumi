@extends('layouts.admin')

@section('title', 'Edit Berita / Acara')
@section('subtitle', 'Perbarui artikel, pengumuman acara, atau liputan terbaru.')

@section('content')

<div class="w-full mx-auto mb-6">
    <a href="{{ route('admin.news.index') }}"
        class="inline-flex items-center gap-2 text-sm font-bold text-brand-muted dark:text-white/50 hover:text-brand-accent transition-colors no-underline">
        <i class="iconoir-arrow-left text-lg"></i> Kembali ke Daftar Berita
    </a>
</div>

<form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto pb-10">
    @csrf
    @method('PUT')

    <input type="hidden" name="old_image" value="{{ $news->image }}">

    <div
        class="bg-white dark:bg-[#1E1212] p-6 sm:p-10 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">

        <div class="mb-10">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 m-0">
                    Informasi Dasar
                </h3>
                <label
                    class="flex items-center gap-2 cursor-pointer bg-brand-gold/10 px-4 py-2 rounded-xl border border-brand-gold/20 hover:bg-brand-gold/20 transition-colors">
                    <input type="checkbox" name="is_featured" value="1"
                        {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}
                        class="w-4 h-4 text-brand-accent border-gray-300 rounded">
                    <span class="text-sm font-bold text-brand-text dark:text-white flex items-center gap-1">
                        <i class="iconoir-star-solid text-brand-gold"></i> Jadikan Berita Utama
                    </span>
                </label>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Judul Artikel <span
                        class="text-rose-500">*</span></label>
                <input type="text" name="title" required
                    value="{{ old('title', $news->title) }}"
                    class="w-full px-4 py-3.5 text-lg font-bold rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Kategori Berita
                        <span class="text-rose-500">*</span></label>
                    <input type="text" name="category" required
                        value="{{ old('category', $news->category) }}"
                        class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20">
                </div>
                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Status Publikasi <span
                            class="text-rose-500">*</span></label>
                    <select name="status" required
                        class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 cursor-pointer">
                        <option value="publish" {{ old('status', $news->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                        <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Gambar Utama Saat
                        Ini</label>
                    <label
                        class="flex flex-col items-center justify-center w-full h-40 rounded-2xl border-2 border-dashed border-gray-300 dark:border-white/20 bg-gray-50 hover:bg-gray-100 dark:bg-[#0A0505] dark:hover:bg-white/5 transition-all cursor-pointer relative overflow-hidden group shadow-inner">
                        <img id="preview-main-image"
                            src="{{ $news->image ? asset('storage/'.$news->image) : '' }}"
                            alt="Current Cover" class="absolute inset-0 w-full h-full object-cover">
                        <div id="main-image-placeholder"
                            class="text-center z-10 p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/60 backdrop-blur-md rounded-2xl">
                            <i class="iconoir-refresh text-3xl text-white mb-2 transition-colors"></i>
                            <p class="text-sm font-bold text-white">Ganti Foto Utama</p>
                        </div>
                        <input type="file" id="main_image_upload" name="main_image" class="hidden"
                            accept="image/*" />
                    </label>
                </div>
                <div>
                    <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Keterangan Gambar
                        (Opsional)</label>
                    <textarea name="image_caption" rows="5"
                        class="w-full px-4 py-3 rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar">{{ old('image_caption', $news->image_caption) }}</textarea>
                </div>
            </div>
        </div>

        <hr class="border-gray-100 dark:border-white/10 mb-10">

        <div class="mb-10">
            <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 mb-6">
                Isi Artikel
            </h3>

            <div class="mb-6">
                <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Ringkasan Berita <span
                        class="text-rose-500">*</span></label>
                <textarea name="excerpt" rows="3" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar">{{ old('excerpt', $news->excerpt) }}</textarea>
                <p class="text-[10px] text-brand-muted mt-1">Maksimal 2-3 kalimat. Sangat penting untuk SEO.</p>
            </div>

            <div class="mb-6 bg-brand-gold/5 border border-brand-gold/20 p-5 rounded-2xl">
                <label
                    class="block text-sm font-bold text-brand-text dark:text-white mb-4 text-brand-gold flex items-center gap-1.5">Kutipan
                    Sorotan (Opsional)</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <textarea name="quote_text" rows="2"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-gold/30 italic custom-scrollbar">{{ old('quote_text', $news->quote_text) }}</textarea>
                    </div>
                    <div>
                        <input type="text" name="quote_author"
                            value="{{ old('quote_author', $news->quote_author) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-gold/30 mt-1 md:mt-0">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-brand-text dark:text-white mb-2">Isi Konten Lengkap <span
                        class="text-rose-500">*</span></label>
                <textarea name="content" rows="12" required
                    class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar">{{ old('content', $news->content) }}</textarea>
            </div>
        </div>

        <hr class="border-gray-100 dark:border-white/10 mb-10">

        <div
            class="mb-10 bg-emerald-50/30 dark:bg-emerald-900/10 border border-emerald-100 dark:border-emerald-900/30 p-6 sm:p-8 rounded-[2rem]">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h3 class="text-lg font-bold text-brand-text dark:text-white flex items-center gap-2 m-0">
                        Tambahkan Detail Acara?
                    </h3>
                    <p class="text-xs text-brand-muted dark:text-white/60 mt-1">Aktifkan jika berita ini memuat undangan
                        acara/event.</p>
                </div>

                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="has_event_toggle" name="has_event" value="1"
                        {{ old('has_event', $news->has_event) ? 'checked' : '' }}
                        class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-500">
                    </div>
                    <span class="ml-3 text-sm font-bold text-brand-text dark:text-white">Ya, Ini Acara</span>
                </label>
            </div>

            <div id="event_details_form" class="grid grid-cols-1 md:grid-cols-2 gap-4 transition-all {{ old('has_event', $news->has_event) ? '' : 'hidden' }}">
                <div>
                    <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Tanggal Acara</label>
                    <input type="text" name="event_date"
                        value="{{ old('event_date', $news->event_date) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none focus:ring-2 focus:ring-emerald-500/30">
                </div>
                <div>
                    <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Waktu / Jam</label>
                    <input type="text" name="event_time"
                        value="{{ old('event_time', $news->event_time) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none focus:ring-2 focus:ring-emerald-500/30">
                </div>
                <div>
                    <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Lokasi Acara</label>
                    <input type="text" name="event_location"
                        value="{{ old('event_location', $news->event_location) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none focus:ring-2 focus:ring-emerald-500/30">
                </div>
                <div>
                    <label class="block text-xs font-bold text-brand-text dark:text-white mb-2">Harga Tiket
                        (HTM)</label>
                    <input type="text" name="event_price"
                        value="{{ old('event_price', $news->event_price) }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#0A0505] text-sm outline-none focus:ring-2 focus:ring-emerald-500/30">
                </div>
            </div>
        </div>

        <div
            class="pt-8 border-t border-gray-100 dark:border-white/10 flex flex-col md:flex-row items-center justify-center gap-4 mt-12">
            <button type="submit"
                class="w-full md:w-auto md:px-16 py-4 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm shadow-xl shadow-brand-accent/30 hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                <i class="iconoir-check-circle"></i> Perbarui Berita
            </button>
            <a href="{{ route('admin.news.index') }}"
                class="w-full md:w-auto px-10 py-4 rounded-2xl border border-gray-200 dark:border-white/10 bg-transparent text-brand-text dark:text-white font-bold text-sm hover:bg-gray-50 dark:hover:bg-white/5 transition-all no-underline text-center">
                Batal
            </a>
        </div>

    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
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

    const toggleEvent = document.getElementById('has_event_toggle');
    const eventForm = document.getElementById('event_details_form');
    const eventInputs = eventForm.querySelectorAll('input');

    if (toggleEvent && eventForm) {
        if (toggleEvent.checked) {
            eventForm.classList.remove('hidden');
            eventInputs.forEach(input => input.setAttribute('required', 'required'));
        }

        toggleEvent.addEventListener('change', function() {
            if (this.checked) {
                eventForm.classList.remove('hidden');
                eventInputs.forEach(input => input.setAttribute('required', 'required'));
            } else {
                eventForm.classList.add('hidden');
                eventInputs.forEach(input => {
                    input.removeAttribute('required');
                });
            }
        });
    }
});
</script>

@endsection