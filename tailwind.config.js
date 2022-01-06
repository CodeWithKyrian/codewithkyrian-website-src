const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
  darkMode: "class",
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  typography: (theme) => {
    return {
      default: {
        css: {
          "code::before": {
            content: '""',
            "padding-left": "0.25rem"
          },
          "code::after": {
            content: '""',
            "padding-right": "0.25rem"
          },
          "blockquote p:first-of-type::before": false,
          "blockquote p:last-of-type::after": false,
        },
      },
    }
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
  ],
}
