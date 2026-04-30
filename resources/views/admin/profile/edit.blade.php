@extends('layouts.admin')

@section('title', 'Profil Administrator')
@section('subtitle', 'Kelola informasi akun dan pengaturan keamanan Anda.')

@section('content')

    <form action="#" method="POST" enctype="multipart/form-data" class="w-full space-y-8 pb-32">
        @csrf
        @method('PUT')

        <div class="bg-white dark:bg-[#1E1212] p-6 sm:p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">
            <h3 class="text-lg font-bold text-brand-text dark:text-white mb-6 flex items-center gap-2 border-b border-gray-100 dark:border-white/5 pb-4">
                Informasi Akun
            </h3>
            
            <div class="mb-8">
                <label class="block text-xs font-bold text-brand-text dark:text-white mb-3 uppercase tracking-wider">Foto Profil</label>
                <div class="flex items-center gap-6">
                    <div class="w-24 h-24 rounded-full border-4 border-gray-100 dark:border-white/10 bg-gray-50 dark:bg-[#0A0505] flex items-center justify-center shrink-0 overflow-hidden shadow-inner">
                        <img id="preview-avatar" src="https://ui-avatars.com/api/?name=Admin+Odeon&background=8B1A1A&color=fff&size=150&bold=true" alt="Avatar" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <label for="avatar_upload" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-[#1E1212] text-sm font-bold text-brand-text dark:text-white hover:bg-gray-50 dark:hover:bg-white/5 transition-colors cursor-pointer shadow-sm">
                            <i class="iconoir-cloud-upload"></i> Unggah Foto
                        </label>
                        <input id="avatar_upload" type="file" name="avatar" class="hidden" accept="image/png, image/jpeg, image/webp" />
                        <p class="text-[10px] text-brand-muted dark:text-white/40 mt-2.5 leading-relaxed">Format disarankan: JPG, PNG, atau WEBP (1:1).<br>Maksimal ukuran 2MB.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                <div>
                    <label for="name" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <input type="text" name="name" id="name" required value="Admin Odeon" 
                            class="w-full pl-4 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium">
                    </div>
                </div>
                <div>
                    <label for="username" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Username <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <input type="text" name="username" id="username" required value="admin_odeon" 
                            class="w-full pl-4 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium">
                    </div>
                </div>
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Alamat Email <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <input type="email" name="email" id="email" required value="admin@kampoengnaga.com" 
                        class="w-full pl-4 pr-4 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium">
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#1E1212] p-6 sm:p-8 rounded-[2.5rem] border border-gray-100 dark:border-white/5 shadow-sm">
            <h3 class="text-lg font-bold text-brand-text dark:text-white mb-4 flex items-center gap-2 border-b border-gray-100 dark:border-white/5 pb-4">
                Keamanan & Kata Sandi
            </h3>
            
            <div class="bg-blue-50/50 dark:bg-blue-500/10 border border-blue-100 dark:border-blue-500/20 rounded-xl p-4 mb-6 flex gap-3">
                <p class="text-xs text-blue-800 dark:text-blue-300 leading-relaxed font-medium">
                    Biarkan kolom kata sandi di bawah ini <strong>tetap kosong</strong> jika Anda tidak ingin mengubah kata sandi saat ini.
                </p>
            </div>
            
            <div class="space-y-6">
                <div>
                    <label for="current_password" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Kata Sandi Saat Ini</label>
                    <div class="relative">
                        <input type="password" name="current_password" id="current_password" placeholder="Masukkan kata sandi lama..." 
                            class="w-full pl-4 pr-12 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium placeholder:text-gray-400 dark:placeholder:text-white/30">
                        <button type="button" class="toggle-password absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-brand-accent dark:hover:text-brand-gold transition-colors outline-none border-none bg-transparent cursor-pointer" data-target="current_password">
                            <i class="iconoir-eye-closed text-lg"></i>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="new_password" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Kata Sandi Baru</label>
                        <div class="relative">
                            <input type="password" name="new_password" id="new_password" placeholder="Kata sandi baru..." 
                                class="w-full pl-4 pr-12 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium placeholder:text-gray-400 dark:placeholder:text-white/30">
                            <button type="button" class="toggle-password absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-brand-accent dark:hover:text-brand-gold transition-colors outline-none border-none bg-transparent cursor-pointer" data-target="new_password">
                                <i class="iconoir-eye-closed text-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label for="new_password_confirmation" class="block text-xs font-bold text-brand-text dark:text-white mb-2 uppercase tracking-wider">Konfirmasi Kata Sandi Baru</label>
                        <div class="relative">
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Ulangi kata sandi baru..." 
                                class="w-full pl-4 pr-12 py-3.5 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/50 dark:bg-[#0A0505] text-brand-text dark:text-white outline-none focus:ring-2 focus:ring-brand-accent/20 transition-all font-medium placeholder:text-gray-400 dark:placeholder:text-white/30">
                            <button type="button" class="toggle-password absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-brand-accent dark:hover:text-brand-gold transition-colors outline-none border-none bg-transparent cursor-pointer" data-target="new_password_confirmation">
                                <i class="iconoir-eye-closed text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed bottom-6 right-0 left-0 sm:left-auto sm:right-8 z-50 flex justify-center sm:justify-end px-5 sm:px-0 pointer-events-none">
            <div class="pointer-events-auto bg-white/90 dark:bg-[#1E1212]/90 backdrop-blur-xl p-3 rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] dark:shadow-[0_10px_40px_rgba(0,0,0,0.5)] border border-gray-200 dark:border-white/10 flex items-center gap-4 w-full sm:w-auto">
                <span class="hidden sm:block text-sm font-bold text-brand-muted dark:text-white/60 pl-3">Pastikan data profil sudah benar</span>
                <button type="submit" class="w-full sm:w-auto flex-1 inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-sm hover:-translate-y-1 transition-all outline-none border-none cursor-pointer">
                    <i class="iconoir-floppy-disk text-lg"></i> Perbarui Profil
                </button>
            </div>
        </div>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            const avatarInput = document.getElementById('avatar_upload');
            const avatarPreview = document.getElementById('preview-avatar');
            
            if (avatarInput && avatarPreview) {
                const originalSrc = avatarPreview.src;
                avatarInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (event) => { avatarPreview.src = event.target.result; };
                        reader.readAsDataURL(file);
                    } else {
                        avatarPreview.src = originalSrc;
                    }
                });
            }

            const toggleButtons = document.querySelectorAll('.toggle-password');
            
            toggleButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const inputField = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    if (inputField.type === 'password') {
                        inputField.type = 'text';
                        icon.classList.remove('iconoir-eye-closed');
                        icon.classList.add('iconoir-eye');
                    } else {
                        inputField.type = 'password';
                        icon.classList.remove('iconoir-eye');
                        icon.classList.add('iconoir-eye-closed');
                    }
                });
            });
            
        });
    </script>

@endsection