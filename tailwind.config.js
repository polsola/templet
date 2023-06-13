const colors = require('tailwindcss/colors')

module.exports = {
    content: ['./**/*.php'],
    theme: {
        colors: {
            white: '#fff',
            black: '#000',
            primary: {
                DEFAULT: 'var(--wp--preset--color--primary)',
                dark: 'var(--wp--preset--color--primary-dark)'
            },
            gray: colors.gray,
            slate: colors.slate,
        }
    },
    variants: {},
    plugins: [],
  }