/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      textUnderlineOffset: {
        10: '10px',
      },
      colors: {
        'main':'#051C2B',
        'second':'#455965',
        'red-custom':'#EC0100',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
  ],
}
