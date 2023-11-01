/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        'main':'#051C2B',
        'second':'#1F40C7',
      }
    },
  },
  plugins: [],
}

