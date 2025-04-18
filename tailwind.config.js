import defaultTheme from 'tailwindcss/defaultTheme';
<<<<<<< HEAD
=======
import forms from '@tailwindcss/forms';
>>>>>>> e2a8b4e (Primer commit)

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
<<<<<<< HEAD
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
=======
        './resources/views/**/*.blade.php',
    ],

>>>>>>> e2a8b4e (Primer commit)
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
<<<<<<< HEAD
    plugins: [],
=======

    plugins: [forms],
>>>>>>> e2a8b4e (Primer commit)
};
