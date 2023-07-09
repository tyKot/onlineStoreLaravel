import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import { resolve } from 'path';

// const projectRootDir = resolve(__dirname);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/admin/admin_styles.css',
                'resources/js/app.js',
                'resources/js/admin/admin_script.js',
            ],
            refresh: true,
        }),
    ],
    // resolve: {
    //     alias: {
    //         $fonts: resolve(projectRootDir,'public/assets/fonts')
    //     }
    // }
});
