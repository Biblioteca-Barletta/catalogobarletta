/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}", "./public/*.html"],
  theme: {
    colors: {
      azul: '#263d54',
      rojo: '#bf1b27',
      gris: 'rgb(226 232 240)',
      blanco: 'rgb(255 255 255);'
    },
    extend: {
      boxShadow: {
        'shadow-xl':'box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)' 
      }
    },
  },
  plugins: [],
}

