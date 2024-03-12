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
        },
        fontSize: {
            sm: 'var(--wp--preset--font-size--small)',
            base: 'var(--wp--preset--font-size--medium)',
            lg: 'var(--wp--preset--font-size--large)',
            xl: 'var(--wp--preset--font-size--x-large)',
            '2xl': 'var(--wp--preset--font-size--2-x-large)',
            '3xl': 'var(--wp--preset--font-size--3-x-large)',
            '4xl': 'var(--wp--preset--font-size--4-x-large)',
        }
    },
    variants: {},
    plugins: [],
  }