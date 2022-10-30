const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
  important: true,
  content: [
    "./src/**/*.{php,html,js,jsx,ts,tsx,vue}",
    "./Modules/**/*.{php,html,js,jsx,ts,tsx,vue}",
     "./resources/**/*.{php,html,js,jsx,ts,tsx,vue}",
     "./node_modules/@left4code/tw-starter/**/*.js",
  ],

  theme: {
    extend: {
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        gray: {
          100: '#FBFBFB',
          200: '#EAEAEA',
          300: '#DFDFDF',
          400: '#999999',
          500: '#7F7F7F',
          600: '#666666',
          700: '#4C4C4C',
          800: '#333333',
          900: '#191919',
        },
        blue: {
          100: '#E6F0FD',
          200: '#CCE2FC',
          300: '#99C5FA',
          400: '#66A9F7',
          500: '#338CF5',
          600: '#0070F4',
          700: '#0064DA',
          800: '#0059C2',
          900: '#004391',
        },
        teal: {
          100: '#E6FFFA',
          200: '#B2F5EA',
          300: '#81E6D9',
          400: '#4FD1C5',
          500: '#3ABAB4',
          600: '#319795',
          700: '#2C7A7B',
          800: '#285E61',
          900: '#234E52',
        },
        'logo': 'var(--color-logo)',
        'text-primary': 'var(--color-text-primary)',
        'text-secondary': 'var(--color-text-secondary)',
        'primary': 'var(--color-primary)',
        'primary-hover': 'var(--color-primary-hover)',
        'bg-light': 'var(--color-bg-light)',
        'bg-lighter': 'var(--color-bg-lighter)',
        'bg-dark': 'var(--color-bg-dark)',
        'secondary': 'var(--color-secondary)',
        'secondary-hover': 'var(--color-secondary-hover)',
        'danger': 'var(--color-danger)',
        'danger-hover': 'var(--color-danger-hover)',
        'warning': 'var(--color-warning)',
        'warning-hover': 'var(--color-warning-hover)',
        'success': 'var(--color-success)',
        'success-hover': 'var(--color-success-hover)',
      },
      boxShadow: {
        xs: '0 0 0 1px rgba(0, 0, 0, 0.16)',
        sm: '0 1px 2px 0 rgba(0, 0, 0, 0.16)',
        default: '0 1px 3px 0 rgba(0, 0, 0, 0.12), 0 1px 2px 0 rgba(0, 0, 0, 0.03)',
        md: '0 4px 6px -1px rgba(0, 0, 0, 0.04), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
        lg: '0 10px 15px -3px rgba(0, 0, 0, 0.04), 0 4px 6px -2px rgba(0, 0, 0, 0.02)',
        xl: '0 20px 25px -5px rgba(0, 0, 0, 0.12), 0 10px 10px -5px rgba(0, 0, 0, 0.02)',
        '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.15)',
        inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.04)',
        outline: '0 0 0 3px rgba(66, 153, 225, 0.5)',
        none: 'none',
      },
      spacing: {
        '9/16': '56.25%',
        '3/4': '75%',
        '1/1': '100%',
      },
      fontFamily: {
        inter: ['Inter', 'sans-serif']
      },
      fontSize: {
        xs: '0.75rem',
        sm: '0.875rem',
        base: '1rem',
        lg: '1.125rem',
        xl: '1.25rem',
        '2xl': '1.5rem',
        '3xl': '2rem',
        '4xl': '2.625rem',
        '5xl': '3.25rem',
        '6xl': '5.5rem',
      },
      inset: {
        '1/2': '50%',
        'full': '100%',
      },
      letterSpacing: {
        tighter: '-0.02em',
        tight: '-0.01em',
        normal: '0',
        wide: '0.01em',
        wider: '0.02em',
        widest: '0.4em',
      },
      lineHeight: {
        none: '1',
        tighter: '1.125',
        tight: '1.25',
        snug: '1.375',
        normal: '1.5',
        relaxed: '1.625',
        loose: '2',
        '3': '.75rem',
        '4': '1rem',
        '5': '1.2rem',
        '6': '1.5rem',
        '7': '1.75rem',
        '8': '2rem',
        '9': '2.25rem',
        '10': '2.5rem',
      },
      minWidth: {
        '10': '2.5rem',
        '48': '12rem',
      },
      opacity: {
        '95': '0.95',
        '90': '0.90',
        '85': '0.85',
        '80': '0.80',
        '75': '0.75',
        '70': '0.70',
        '65': '0.65',
        '60': '0.60',
        '55': '0.55',
        '50': '0.50',
        '45': '0.45',
        '40': '0.40',
        '35': '0.35',
        '30': '0.30',
        '25': '0.25',
        '20': '0.20',
        '15': '0.15',
        '10': '0.10',
        '5': '0.5',
      },
      scale: {
        '98': '.98'
      },
      animation: {
        float: 'float 3s ease-in-out infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': {transform: 'translateY(0)',},
          '50%': {transform: 'translateY(-5%)',},
        },
      },
      // fontFamily: {
      //   sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      // },

      backgroundImageDark: {
        'header-pattern-dark': "url('/storage/patterns/header-bg-dark.jpg')",
      },
      backgroundImage: {
        'header-pattern': "url('/storage/patterns/header-bg.jpg')",
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/line-clamp'),
    require('tailwind-scrollbar')
  ],
};
