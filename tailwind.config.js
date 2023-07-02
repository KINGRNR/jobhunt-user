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
  },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

