// tailwind.config.js
module.exports = {
  content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
  ],
  theme: {
      extend: {
        textShadow: {
          'default': '0 2px 4px rgba(0, 0, 0, 0.5)',
          'sm': '0 4px 6px rgba(0, 0, 0, 0.5)',
          'md': '0 4px 6px rgba(0, 0, 0, 0.75)',
          'lg': '0 10px 15px rgba(0, 0, 0, 0.75)',
          'xl': '0 20px 25px rgba(0, 0, 0, 0.75)',
        },
      },
  },
  plugins: [

    function ({ addUtilities }) {
      const newUtilities = {
        '.text-shadow': {
          textShadow: '0 2px 4px rgba(0, 0, 0, 0.5)',
        },
        '.text-shadow-sm': {
          textShadow: '0 4px 6px rgba(0, 0, 0, 0.5)',
        },
        '.text-shadow-md': {
          textShadow: '0 4px 6px rgba(0, 0, 0, 0.75)',
        },
        '.text-shadow-lg': {
          textShadow: '0 10px 15px rgba(0, 0, 0, 0.75)',
        },
        '.text-shadow-xl': {
          textShadow: '0 20px 25px rgba(0, 0, 0, 0.75)',
        },
        '.text-shadow-none': {
          textShadow: 'none',
        },
      }

      addUtilities(newUtilities, ['responsive', 'hover'])
    },

  ],
}
