import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        VitePWA({
            registerType: 'autoUpdate',
            devOptions: {
                enabled: true
            },
            injectRegister: 'null', // 自動的にService Workerを登録
            workbox: {
                globPatterns: ['**/*.{js,css,html,ico,png,svg}']
            },
            includeAssets: ['favicon.ico', 'apple-touch-icon.png', 'mask-icon.svg'],
            manifest: {
            name: "DIY Creator's Hub",
            short_name: 'クレハブ',
            description: 'My Awesome App description',
            scope: '/',
            start_url: '/',
            theme_color: '#ffffff',
            icons: [
                {
                src: '../images/dch_icon.png',
                sizes: '1024x1025',
                type: 'image/png',
                purpose: 'any'
                },
                {
                src: '../images/dch_icon192.png',
                sizes: '192x192',
                type: 'image/png'
                },
                {
                src: '../images/dch_icon512.png',
                sizes: '512x512',
                type: 'image/png'
                },
                {
                src: '../images/apple-touch-icon.png',
                sizes: '180x180',
                type: 'image/png'
                }
            ]
            }
        })
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
