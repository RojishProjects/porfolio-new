import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                'fade-in': {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' }
                },
                'slide-in-right': {
                    '0%': { opacity: '0', transform: 'translateX(100px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' }
                },
                'scale-in': {
                    '0%': { opacity: '0', transform: 'scale(0.8)' },
                    '100%': { opacity: '1', transform: 'scale(1)' }
                },
                'float-fade': {
                    '0%, 100%': { opacity: '0', transform: 'scale(1) translate(0, 0)' },
                    '50%': { opacity: '0.7', transform: 'scale(1.1) translate(20px, -20px)' }
                }
            },
            animation: {
                'fade-in': 'fade-in 0.6s ease-out forwards',
                'slide-in-right': 'slide-in-right 0.8s ease-out forwards',
                'scale-in': 'scale-in 0.6s ease-out forwards',
                'float-fade': 'float-fade 8s ease-in-out infinite'
            }
        },
    },

    plugins: [forms],
};

