import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/items.css',
                'resources/css/upload.css',
                'resources/js/app.js',
                'resources/js/items.js',
                'resources/js/upload.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
