import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/Admin/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                "./Modules/**/*.{html,js,jsx,ts,tsx,vue}",
                "./resources/**/*.{php,html,js,jsx,ts,tsx,vue}",
            ],
        }),

        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            '@@': '/Modules',
        },
    },
    css: {
        postCss: {
            plugins: [
                require("tailwindcss/nesting"),
                require("tailwindcss")({
                    config: "./tailwind.config.js",
                }),
                require("autoprefixer"),
            ],
        },
    },
});
