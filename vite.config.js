import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import fs from 'fs';
import path from 'path';

// Helper to get all JS files recursively in resources/js
function getAllJsFiles(dir) {
    let results = [];
    const list = fs.readdirSync(dir);
    list.forEach((file) => {
        const filePath = path.join(dir, file);
        const stat = fs.statSync(filePath);
        if (stat && stat.isDirectory()) {
            results = results.concat(getAllJsFiles(filePath));
        } else if (file.endsWith('.js')) {
            // Convert to relative path for Vite input
            results.push(path.relative(process.cwd(), filePath).replace(/\\/g, '/'));
        }
    });
    return results;
}

const jsFiles = getAllJsFiles('resources/js');

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', ...jsFiles], // include all JS files
            refresh: true,
        }),
        tailwindcss(),
    ],
});
