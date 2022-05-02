const colors = require('tailwindcss/colors')

module.exports = {
    content: ['./**/*.php'],
    theme: {
        colors: {
            white: '#fff',
            black: '#000',
            primary: '#c04243',
            gray: colors.gray,
            slate: colors.slate,
        }
    },
    variants: {},
    plugins: [],
  }