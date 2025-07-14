import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';


export default defineConfig({
        server: {
        https: {
            key: fs.readFileSync('./cert/localhost+2-key.pem'),
            cert: fs.readFileSync('./cert/localhost+2.pem'),
        },
        host: 'localhost',
        port: 5173,
        cors: true, // ✅ Allow all origins
        origin: 'https://localhost:5173', // ✅ Let Vite know the origin
        strictPort: true,
    },

    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: [
            {
                // this is required for the SCSS modules
                find: /^~(.*)$/,
                replacement: '$1',
            },
        ],
    },
});
