<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Odeon Kampoeng Naga</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lucaburgio/iconoir@main/css/iconoir.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans antialiased text-brand-text bg-brand-secondary dark:bg-[#100808] transition-colors duration-300 min-h-screen flex">

    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-brand-dark">
        <img src="{{ asset('assets/vihara.jpeg') }}" alt="Odeon Kampoeng Naga"
            class="absolute inset-0 w-full h-full object-cover opacity-50"
            onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1200'">
        <div class="absolute inset-0 bg-gradient-to-br from-brand-accent/80 via-brand-dark/90 to-brand-dark"></div>
        <div
            class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay">
        </div>

        <div class="relative z-10 flex flex-col justify-between p-12 w-full h-full">
            <div class="max-w-lg reveal">
                <div class="w-16 h-1 bg-brand-gold rounded-full mb-6"></div>
                <h1 class="font-serif text-4xl xl:text-5xl font-bold text-white mb-4 leading-tight">
                    Sistem Manajemen <br> <span class="text-gradient-gold italic">Odeon Kampoeng Naga</span>
                </h1>
                <p class="text-white/70 text-base leading-relaxed">
                    Portal terpadu untuk mengelola informasi, data UMKM, paket wisata, dan publikasi berita kawasan
                    pusaka budaya Pecinan Sukabumi.
                </p>
            </div>

            <div class="text-white/50 text-xs font-medium">
                &copy; {{ date('Y') }} Odeon Kampoeng Naga.
            </div>
        </div>
    </div>

    <div
        class="w-full lg:w-1/2 flex flex-col relative min-h-screen bg-brand-secondary dark:bg-[#100808] transition-colors duration-300">

        <div
            class="absolute top-5 left-0 right-0 px-6 sm:top-8 sm:px-8 z-50 flex items-center justify-between pointer-events-none">
            <div class="pointer-events-auto">
                <div
                    class="w-11 h-11 rounded-full bg-white/60 dark:bg-[#1E1212]/60 backdrop-blur-md border border-white/40 dark:border-white/10 shadow-sm flex items-center justify-center p-2 transition-colors duration-300">
                    <img src="{{ asset('assets/logoodeon.png') }}" alt="Logo Odeon"
                        class="w-full h-full object-contain">
                </div>
            </div>

            <button id="theme-toggle"
                class="pointer-events-auto w-11 h-11 rounded-full flex items-center justify-center bg-white/60 dark:bg-[#1E1212]/60 backdrop-blur-md border border-white/40 dark:border-white/10 text-brand-text dark:text-white/80 hover:text-brand-accent dark:hover:text-brand-gold transition-all shadow-sm cursor-pointer outline-none">
                <i class="iconoir-sun-light hidden dark:block text-xl"></i>
                <i class="iconoir-half-moon block dark:hidden text-xl"></i>
            </button>

        </div>

        <div class="block lg:hidden relative w-full h-[35vh] min-h-[250px] shrink-0">
            
            <div class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('assets/vihara.jpeg') }}" 
                     alt="Odeon Kampoeng Naga" 
                     class="absolute inset-0 w-full h-full object-cover scale-110"
                     style="transform-origin: center;"
                     onerror="this.src='https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=800'">
                
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark via-brand-accent/70 to-brand-dark/80"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-brand-accent/40 via-transparent to-brand-dark"></div>
                <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] mix-blend-overlay"></div>
            </div>
            
            <div class="absolute inset-0 flex flex-col justify-center items-center px-8 z-10 pb-6 text-center reveal">
                <h2 class="font-serif text-3xl sm:text-4xl font-bold text-white mb-2 leading-tight tracking-tight" style="text-shadow: 0 4px 15px rgba(0,0,0,0.4);">Selamat Datang,<br> <span class="text-gradient-gold italic">Admin!</span></h2>
                <p class="text-xs text-white/80 font-medium max-w-xs" style="text-shadow: 0 2px 4px rgba(0,0,0,0.2);">Masuk Untuk Akses Sistem Manajemen Odeon Kampoeng Naga.</p>
            </div>

            <div class="absolute -bottom-[2px] left-0 right-0 leading-none z-20 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 64" preserveAspectRatio="none" class="block w-full h-10 sm:h-12 fill-[#FAF7F2] dark:fill-[#100808] transition-colors duration-300">
                    <path d="M0,32L60,26.7C120,21,240,11,360,16C480,21,600,43,720,48C840,53,960,43,1080,37.3C1200,32,1320,32,1380,32L1440,32L1440,64L1380,64C1320,64,1200,64,1080,64C960,64,840,64,720,64C600,64,480,64,360,64C240,64,120,64,60,64L0,64Z"/>
                </svg>
            </div>
        </div>

        <div
            class="flex-1 flex items-center justify-center p-6 sm:p-12 z-10 -mt-2 lg:mt-0 relative transition-all duration-300">
            <div class="w-full max-w-md reveal" data-delay="1">
                <div class="mb-10 hidden lg:block">
                    <h2 class="text-3xl font-bold text-brand-text dark:text-white mb-2 leading-tight">Selamat Datang,
                        Admin!</h2>
                    <p class="text-sm text-brand-muted dark:text-white/60">Silakan masukkan data Admin untuk login.</p>
                    <div class="w-12 h-1 bg-brand-accent dark:bg-brand-gold rounded-full mt-5"></div>
                </div>

                @if ($errors->any())
                    <div class="mb-2 p-4 flex items-start">
                        <div>
                            <h4 class="text-sm font-bold text-rose-800 dark:text-rose-300 mb-1">Login Gagal</h4>
                            <ul class="text-xs text-rose-600 dark:text-rose-400/80">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email"
                            class="block text-sm font-bold text-brand-text dark:text-white mb-2.5 transition-colors duration-300">Alamat
                            Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none z-10">
                                <i
                                    class="iconoir-mail text-gray-400 dark:text-white/30 text-xl group-focus-within:text-brand-accent dark:group-focus-within:text-brand-gold transition-colors"></i>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                autofocus
                                class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200/70 dark:border-white/5 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold outline-none transition-all duration-300 placeholder:text-gray-400 dark:placeholder:text-white/30 shadow-sm focus:shadow-md"
                                placeholder="admin@odeonkampoengnaga.com">
                        </div>
                    </div>

                    <div>
                        <label for="password"
                            class="block text-sm font-bold text-brand-text dark:text-white mb-2.5 transition-colors duration-300">Kata
                            Sandi</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none z-10">
                                <i
                                    class="iconoir-lock text-gray-400 dark:text-white/30 text-xl group-focus-within:text-brand-accent dark:group-focus-within:text-brand-gold transition-colors"></i>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="w-full pl-12 pr-12 py-3.5 rounded-xl border border-gray-200/70 dark:border-white/5 bg-white dark:bg-[#1E1212] text-brand-text dark:text-white focus:ring-2 focus:ring-brand-accent/20 focus:border-brand-accent dark:focus:ring-brand-gold/30 dark:focus:border-brand-gold outline-none transition-all duration-300 placeholder:text-gray-400 dark:placeholder:text-white/30 shadow-sm focus:shadow-md"
                                placeholder="••••••••">

                            <button type="button" id="toggle-password"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-brand-accent dark:hover:text-brand-gold transition-colors cursor-pointer outline-none z-10">
                                <i class="iconoir-eye text-lg" id="eye-icon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2.5 cursor-pointer group">
                            <input type="checkbox" name="remember"
                                class="w-4.5 h-4.5 rounded border-gray-300/80 text-brand-accent focus:ring-brand-accent dark:border-white/10 dark:bg-[#1E1212] dark:checked:bg-brand-gold transition-all cursor-pointer shadow-sm">
                            <span
                                class="text-sm font-medium text-brand-muted dark:text-white/60 group-hover:text-brand-text dark:group-hover:text-white transition-colors duration-300">Ingat
                                Saya</span>
                        </label>
                    </div>

                    <div class="pt-8 space-y-4.5">
                        <button type="submit"
                            class="w-full flex items-center mb-2 justify-center gap-2.5 py-4 px-5 rounded-xl bg-brand-accent dark:bg-brand-gold text-white dark:text-brand-dark font-bold text-base shadow-[0_8px_25px_-5px_rgba(139,26,26,0.3)] dark:shadow-[0_8px_25px_-5px_rgba(212,175,55,0.25)] hover:-translate-y-1 hover:shadow-lg transition-all duration-300 cursor-pointer outline-none">
                            Masuk
                        </button>

                        <a href="{{ route('home') }}"
                            class="w-full flex items-center justify-center gap-2 py-3.5 px-5 rounded-xl border border-gray-200/80 dark:border-white/5 bg-transparent text-brand-text dark:text-white/70 font-bold text-sm hover:border-brand-accent dark:hover:border-brand-gold hover:text-brand-accent dark:hover:text-brand-gold hover:bg-brand-accent/5 dark:hover:bg-white/5 hover:shadow-sm transition-all duration-300 no-underline cursor-pointer outline-none text-center">
                            Kembali ke Beranda
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');
            reveals.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('active');
                }, 100 * index);
            });

            const togglePasswordBtn = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (togglePasswordBtn && passwordInput) {
                togglePasswordBtn.addEventListener('click', () => {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeIcon.classList.remove('iconoir-eye');
                        eyeIcon.classList.add('iconoir-eye-closed');
                    } else {
                        passwordInput.type = 'password';
                        eyeIcon.classList.remove('iconoir-eye-closed');
                        eyeIcon.classList.add('iconoir-eye');
                    }
                });
            }

            const themeToggleBtn = document.getElementById('theme-toggle');
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', () => {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                });
            }
        });
    </script>

    <style>
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</body>

</html>
