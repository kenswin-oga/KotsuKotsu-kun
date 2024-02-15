/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/auth/register.blade.php",
    "./resources/views/auth/login.blade.php",
    "./resources/views/top.blade.php",
    "./resources/views/home.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'yusei-magic': ['Yusei Magic', 'sans-serif'],
      },
    },
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#4F3318",
          "secondary": "#fef3c7",
          "accent": "#fb923c",
          "neutral": "#4F3318",
          "base-100": "#ffedd5",
          "info": "#f3f4f6",
          "success": "#d9f99d",
          "warning": "#fef08a",
          "error": "#e11d48",
        },
      },
      "dark",
      "cupcake",
      "autumn",
    ],
  },
}

