import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/css/app.css',
                'public/css/sb-admin-2.css',
            ],
            refresh: true,
        }),
    ],
});
