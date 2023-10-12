import { defineConfig } from 'vite';
import Laravel from 'laravel-vite-plugin';
import Unfonts from 'unplugin-fonts/vite'

export default defineConfig({
    plugins: [
        Laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        Unfonts({
            google: true,
            custom: [{
                family: 'Nunito',
                files: [
                    '/fonts/nunito/cyrillic-ext-400-normal.woff',
                    '/fonts/nunito/cyrillic-ext-400-normal.woff2',
                    '/fonts/nunito/latin-ext-400-normal.woff',
                    '/fonts/nunito/latin-ext-400-normal.woff2',
                    '/fonts/nunito/latin-400-normal.woff',
                    '/fonts/nunito/latin-400-normal.woff2',
                    '/fonts/nunito/vietnamese-400-normal.woff',
                    '/fonts/nunito/vietnamese-400-normal.woff2',
                ],
            }],
        }),
    ],
});
