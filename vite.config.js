import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '172.27.0.5', // Bind to all interfaces
        port: 5173,       // Ensure this port is open in your Docker containe
        // hmr: {
        //     host: 'mvp_server', // Replace 'web' with your Nginx or front-facing container name
        //     //protocol: 'ws',
        //     port: 5173,
        // },
    },
});
