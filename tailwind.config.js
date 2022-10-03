const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "class",

    theme: {
        extend: {
            display: ["group-hover"],
            colors: {
                50: "#fffbeb",
                100: "#fef3c7",
                200: "#fde68a",
                300: "#fcd34d",
                400: "#fbbf24",
                500: "#f59e0b",
                600: "#d97706",
                700: "#b45309",
                800: "#92400e",
                900: "#78350f",
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                arial: ["arial", "Gill Sans", "sans-serif"],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("flowbite/plugin"),
        require("tailwind-scrollbar")({ nocompatible: true }),
        require("tailwindcss-plugins/pagination")({
            /* Customizations here... */
            pagination: (theme) => ({
                // Customize the color only. (optional)
                color: theme("colors.teal.600"),

                // Customize styling using @apply. (optional)
                wrapper: "flex justify-center list-reset",

                // Customize styling using CSS-in-JS. (optional)
                wrapper: {
                    display: "flex",
                    "justify-items": "center",
                    "@apply list-reset": {},
                },
            }),
        }),
    ],
    variants: {
        scrollbar: ["rounded"],
    },
};
