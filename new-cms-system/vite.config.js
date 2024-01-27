import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'public/js/bootstrap.js',
                'resources/css/app.css',
                'resources/css/sb-admin-2.css',
                'public/js/sb-admin-2.min.js',
                'public/vendor/datatables/jquery.dataTables.min.js',
                'public/vendor/fontawesome-free/css/all.min.css',
                'public/vendor/jquery-easing/jquery.easing.min.js',
                'public/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'public/vendor/jquery/jquery.min.js',
                'resources/js/sb-admin-2.min.js',
                'public/vendor/datatables/dataTables.bootstrap4.min.js',
                'public/vendor/demo/datatables-demo.js',
                'public/css/sb-admin-2.css',
            ],
            refresh: true,
        }),
    ],
});
