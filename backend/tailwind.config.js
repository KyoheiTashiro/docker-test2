module.exports = {
  // purge: ['./resources/js/components/pages/Event.vue'],
  purge: ['./resources/js/components/AppComponent.vue', './resources/js/components/**/*.vue'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      sm: '480px',
      // => @media (min-width: 480px) { ... }

      md: '768px',
      // => @media (min-width: 768px) { ... }

      lg: '1024px',
      // => @media (min-width: 1024px) { ... }

      xl: '1200px',
      // => @media (min-width: 1280px) { ... }
    },
    // extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
