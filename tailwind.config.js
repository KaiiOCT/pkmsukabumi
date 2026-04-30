import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    // Primary accent — deep crimson/garnet
                    accent:     '#8B1A1A',
                    'accent-light': '#C0392B',
                    'accent-dark':  '#5C1111',

                    // Gold / amber highlights
                    gold:       '#C9A84C',
                    'gold-light': '#E8C97A',

                    // Background tones — warm cream
                    primary:    '#FAF7F2',
                    secondary:  '#F5F0E8',
                    surface:    '#FFFFFF',

                    // Text tones
                    text:       '#1A0F0F',
                    subtitle:   '#4A3728',
                    muted:      '#7A6355',

                    // Dark footer tones
                    dark:       '#0F0808',
                    'dark-2':   '#1C1010',
                    'dark-3':   '#2A1818',
                },
            },
            fontFamily: {
                sans:  ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                'gradient-hero': 'linear-gradient(135deg, rgba(139,26,26,0.92) 0%, rgba(92,17,17,0.85) 100%)',
                'gradient-card': 'linear-gradient(180deg, transparent 40%, rgba(15,8,8,0.7) 100%)',
                'gradient-gold': 'linear-gradient(135deg, #C9A84C 0%, #E8C97A 50%, #C9A84C 100%)',
            },
            boxShadow: {
                'card':    '0 4px 24px rgba(139,26,26,0.08), 0 1px 4px rgba(0,0,0,0.04)',
                'card-hover': '0 12px 40px rgba(139,26,26,0.15), 0 4px 12px rgba(0,0,0,0.08)',
                'nav':     '0 2px 24px rgba(15,8,8,0.1)',
                'gold':    '0 4px 20px rgba(201,168,76,0.3)',
                'inner-warm': 'inset 0 1px 3px rgba(139,26,26,0.06)',
            },
            borderRadius: {
                '4xl': '2rem',
                '5xl': '2.5rem',
            },
            transitionTimingFunction: {
                'smooth':  'cubic-bezier(0.4, 0, 0.2, 1)',
                'bounce-in': 'cubic-bezier(0.34, 1.56, 0.64, 1)',
            },
            animation: {
                'fade-up':   'fadeUp 0.6s ease-out forwards',
                'fade-in':   'fadeIn 0.5s ease-out forwards',
                'shimmer':   'shimmer 2s linear infinite',
            },
            keyframes: {
                fadeUp: {
                    '0%':   { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    '0%':   { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                shimmer: {
                    '0%':   { backgroundPosition: '-200% 0' },
                    '100%': { backgroundPosition: '200% 0' },
                },
            },
        },
    },
    plugins: [],
};