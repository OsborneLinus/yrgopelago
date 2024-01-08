/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.{html,js}'],
  theme: {
    extend: {
      backgroundImage: {
        'header-picture': "url('/media/header-pic.png')",
        'hero-picture': "url('/media/hero-pic.jpeg')",
        'hero-pic': "url('/media/SunbedsOnShore.jpg')",
      },
    },
  },
  plugins: [],
};
