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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            container: {
                padding: {
                    DEFAULT: '1rem',
                    sm: '0',
                },
                screens: {
                    xs: '380px',
                    sm: '600px',
                    md: '728px',
                    lg: '984px',
                    xl: '1240px',
                    '2xl': '1536px',
                }
            }
        },
    },

    plugins: [forms],
};
