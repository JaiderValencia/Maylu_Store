import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/global.css',
                'resources/css/header.css',
                'resources/css/footer.css',
                'resources/css/home.css',
                'resources/css/about.css',
                'resources/css/contact.css',
                'resources/css/login.css',
                'resources/css/panel.css',
                'resources/css/admin-prendas.css',
                'resources/css/carrito.css',
                'resources/css/producto.css',
                'resources/css/tienda.css',
                'resources/css/tendencias.css',
                'resources/js/app.js',
                'resources/js/partials.js',
                'resources/js/cart.js',
                'resources/js/login.js',
                'resources/js/panel.js',
                'resources/js/prendas-form.js',
                'resources/js/product.js',
                'resources/js/tienda.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
