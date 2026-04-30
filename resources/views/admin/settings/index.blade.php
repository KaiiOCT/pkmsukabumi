@extends('layouts.admin')

@section('title', 'Pengaturan Website')
@section('subtitle', 'Kelola informasi global, kontak, dan identitas visual Kampoeng Naga.')

@section('content')

    <form action="#" method="POST" enctype="multipart/form-data" class="w-full space-y-8 pb-32">
        @csrf
        @method('PUT')

        <div class="bg-white dark:bg-[#1E1212] p-6 sm:p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">
            <h3 class="text-lg font-bold text-brand-text dark:text-white mb-6 flex items-center gap-2 border-b border-gray-100 dark:border-white/5 pb-4">
                Identitas Utama
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <label for="site_name" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Nama Website <span class="text-rose-500">*</span></label>
                    <input type="text" name="site_name" id="site_name" required value="Odeon Kampoeng Naga" 
                        class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium">
                </div>
                <div>
                    <label for="tagline" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Tagline Singkat</label>
                    <input type="text" name="tagline" id="tagline" value="Pusat Budaya, Sejarah & Kuliner" 
                        class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-xs font-bold text-brand-text dark:text-white mb-3 uppercase tracking-wider">Logo Utama (Header)</label>
                    <div class="flex items-center gap-6">
                        <div class="w-24 h-24 rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-[#0A0505] flex items-center justify-center p-3 shrink-0 shadow-inner">
                            <img id="preview-logo" src="{{ asset('assets/logoodeon.png') }}" alt="Logo" class="max-w-full max-h-full object-contain">
                        </div>
                        <div class="flex-1">
                            <label for="logo_upload" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-sm font-bold text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 transition-colors cursor-pointer shadow-sm">
                                <i class="iconoir-cloud-upload"></i> Ganti Logo
                            </label>
                            <input id="logo_upload" type="file" name="logo" class="hidden" accept="image/png, image/svg+xml" />
                            <p class="text-[10px] text-brand-muted dark:text-white/40 mt-2.5 leading-relaxed">Format disarankan: PNG Transparan / SVG.<br>Maksimal 2MB.</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-brand-text dark:text-white mb-3 uppercase tracking-wider">Favicon (Ikon Tab Browser)</label>
                    <div class="flex items-center gap-6">
                        <div class="w-24 h-24 rounded-2xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-[#0A0505] flex items-center justify-center p-5 shrink-0 shadow-inner">
                            <img id="preview-favicon" src="{{ asset('assets/logoodeon.png') }}" alt="Favicon" class="max-w-full max-h-full object-contain">
                        </div>
                        <div class="flex-1">
                            <label for="favicon_upload" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-sm font-bold text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 transition-colors cursor-pointer shadow-sm">
                                <i class="iconoir-cloud-upload"></i> Ganti Favicon
                            </label>
                            <input id="favicon_upload" type="file" name="favicon" class="hidden" accept="image/png, image/x-icon" />
                            <p class="text-[10px] text-brand-muted dark:text-white/40 mt-2.5 leading-relaxed">Format disarankan: PNG atau ICO (1:1).<br>Ukuran ideal 32x32px.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1E1212] p-6 sm:p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">
            <h3 class="text-lg font-bold text-brand-text dark:text-white mb-6 flex items-center gap-2 border-b border-gray-100 dark:border-white/5 pb-4">
                Kontak & Alamat
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                <div>
                    <label for="whatsapp_main" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">WhatsApp Utama <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="iconoir-whatsapp text-emerald-500 text-lg"></i>
                        </div>
                        <input type="number" name="whatsapp_main" id="whatsapp_main" required value="6281234567890" 
                            class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium">
                    </div>
                    <p class="text-[10px] text-brand-muted dark:text-white/40 mt-1.5">Gunakan format awalan 62 (tanpa + atau 0).</p>
                </div>
                <div>
                    <label for="email_main" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Email Utama</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="iconoir-mail text-blue-500 text-lg"></i>
                        </div>
                        <input type="email" name="email_main" id="email_main" value="halo@kampoengnaga.com" 
                            class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium">
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label for="address" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Alamat Lengkap</label>
                <textarea name="address" id="address" rows="3" 
                    class="w-full px-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 custom-scrollbar transition-all font-medium leading-relaxed">Jl. Pajagalan, Nyomplong, Kec. Warudoyong, Kota Sukabumi, Jawa Barat 43131</textarea>
            </div>

            <div>
                <label for="google_maps" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Link Google Maps</label>
                <div class="relative">
                    <input type="url" name="google_maps" id="google_maps" placeholder="https://maps.app.goo.gl/..." value="https://maps.app.goo.gl/kampoengnaga"
                        class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium text-sm">
                </div>
                <p class="text-[10px] text-brand-muted dark:text-white/40 mt-1.5">Masukkan tautan (URL) rute lokasi dari Google Maps.</p>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1E1212] p-6 sm:p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">
            <h3 class="text-lg font-bold text-brand-text dark:text-white mb-6 flex items-center gap-2 border-b border-gray-100 dark:border-white/5 pb-4">
                Sosial Media
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="instagram" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Instagram Link</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="iconoir-instagram text-pink-500 text-lg"></i>
                        </div>
                        <input type="url" name="instagram" id="instagram" value="https://instagram.com/kampoengnaga" 
                            class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 text-sm transition-all font-medium">
                    </div>
                </div>
                <div>
                    <label for="facebook" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Facebook Link</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="iconoir-facebook text-blue-600 text-lg"></i>
                        </div>
                        <input type="url" name="facebook" id="facebook" value="https://facebook.com/kampoengnaga" 
                            class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 text-sm transition-all font-medium">
                    </div>
                </div>
                <div>
                    <label for="tiktok" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">TikTok / Youtube</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="iconoir-tiktok text-gray-800 dark:text-white text-lg"></i>
                        </div>
                        <input type="url" name="tiktok" id="tiktok" placeholder="https://tiktok.com/..." 
                            class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 text-sm transition-all font-medium">
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed bottom-6 right-0 left-0 sm:left-auto sm:right-8 z-50 flex justify-center sm:justify-end px-5 sm:px-0 pointer-events-none">
            <div class="pointer-events-auto bg-white/90 dark:bg-[#1E1212]/90 backdrop-blur-xl p-3 rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] dark:shadow-[0_10px_40px_rgba(0,0,0,0.5)] border border-gray-200 dark:border-white/10 flex items-center gap-4 w-full sm:w-auto">
                <span class="hidden sm:block text-sm font-bold text-brand-muted dark:text-white/60 pl-3">Pastikan data sudah benar</span>
                <button type="submit" class="w-full sm:w-auto flex-1 inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm hover:-translate-y-1 transition-all outline-none border-none cursor-pointer">
                    <i class="iconoir-floppy-disk text-lg"></i> Simpan
                </button>
            </div>
        </div>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function setupPreview(inputId, previewId) {
                const input = document.getElementById(inputId);
                const preview = document.getElementById(previewId);
                if (input && preview) {
                    const originalSrc = preview.src;
                    input.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file && file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = (event) => { preview.src = event.target.result; };
                            reader.readAsDataURL(file);
                        } else {
                            preview.src = originalSrc;
                        }
                    });
                }
            }
            
            setupPreview('logo_upload', 'preview-logo');
            setupPreview('favicon_upload', 'preview-favicon');
        });
    </script>

@endsection