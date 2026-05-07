/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        nss: {
          navy: '#0d2448',
          'navy-deep': '#071530',
          gold: '#b8922a',
          'gold-bright': '#d4a843',
          cream: '#fafafa',
        }
      },
      fontFamily: {
        sans: ['Outfit', 'sans-serif'],
        serif: ['Cinzel', 'serif'],
      }
    }
  },
  plugins: [],
}
