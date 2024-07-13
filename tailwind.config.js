import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    darkMode: true, // Asegúrate de deshabilitar el modo oscuro

    theme: {
        extend: {
            fontFamily: {
                inter: ["Inter", "sans-serif"],
            },
        },
    },

    plugins: [forms],
};
