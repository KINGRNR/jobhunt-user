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
      'merah': '#1B61AD',
      'merah-gelap': '#850000',
      'figma-blue-gray-50': '#F8F9FC',
      'figma-warning-50': '#FFFAEB',
      'figma-warning-500': '#F79009',
      'figma-gray-100': '#F2F4F7',
      'figma-gray-200': '#EAECF0',
      'figma-gray-500': '#667085',
      'figma-yellow-secondary': '#DAA916',
      'figma-biru-primary': '#1B61AD',
      'figma-biru-300': '#1B61AD'
    },
    extend: {    
      fontFamily: {
      'poppins': ['"Poppins"', 'serif']
    },
      backgroundImage: {
        'about-gradient': 'linear-gradient(180deg, rgba(255,255,255,1) 15%, rgba(242,244,247,1) 15%)'
      },
      screens: {
        'lg-smallbigger': '1140px',
        'lg-bigger': '1280px',
        'xl-bigger': '1400px'
      },
  },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

