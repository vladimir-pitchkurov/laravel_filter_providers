import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

// import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/js/providers.js', 'resources/css/list.css'],
            refresh: true,
        }),
        // tailwindcss(),
    ],
});
