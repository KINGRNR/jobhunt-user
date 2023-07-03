/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {    
      fontFamily: {
      'poppins': ['"Poppins"', 'serif']
    },
      backgroundImage: {
        'about-gradient': 'linear-gradient(180deg, rgba(255,255,255,1) 15%, rgba(229,231,235,1) 15%)'
      }
  },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

