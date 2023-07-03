/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    colors: {
      'merah': '#DC0000',
      'merah-gelap': '#850000',
      'figma-blue-gray-50': '#F8F9FC',
      'figma-gray-500': '#667085',
      'figma-gray-100': '#F2F4F7'
    },
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

