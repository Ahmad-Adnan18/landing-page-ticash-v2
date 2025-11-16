import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue: {
                    500: "#00A9E0",
                    700: "#0072BC",
                },
                slate: {
                    50: "#F8FAFC",
                    500: "#64748B",
                    800: "#1E293B",
                },
                yellow: {
                    400: "#FCD34D",
                },
                emerald: {
                    500: "#10B981",
                },
                red: {
                    500: "#EF4444",
                },
                white: "#FFFFFF",
            },
            keyframes: {
                "float-up-down": {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-20px)" }, // Gerak ke atas 20px
                },
            },
            animation: {
                "float-slow": "float-up-down 4s ease-in-out infinite", // 4 detik, smooth, tak terbatas
            },
        },
    },
    plugins: [],
};
