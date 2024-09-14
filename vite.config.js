import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/contact_validation.js',
                // 'resources/js/swiper.js',
                'resources/js/carousel.js', 
                'resources/js/sort_products.js', 
                'resources/js/toggleSearchPopup.js', 
                'resources/js/responsive-navigation.js', 
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            // You can add your preprocessor options here
          },
    }
});
