/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            'brand-primary':'#ffe15c',
            'brand-secondary':'#263691',
            'brand-accent':'#89beff',
            'brand-text-light-bg': '#fbfbfe',
            'brand-text-dark-bg': '#050315',
            'brand-background': '#fbfbfe',
        }
    },
  },
  plugins: [],
}

