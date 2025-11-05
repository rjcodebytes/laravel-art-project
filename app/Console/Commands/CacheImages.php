<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CacheImages extends Command
{
    /**
     * Command signature
     */
    protected $signature = 'images:cache';

    /**
     * Command description
     */
    protected $description = 'Generate optimized WebP versions of all images in public/images and store them in public/cache/images with same folder structure';

    /**
     * Execute the command.
     */
    public function handle()
    {
        $this->info('🔍 Scanning images in public/images...');

        $sourceDir = public_path('images');
        $targetDir = public_path('cache/images');
        $manager = new ImageManager(new Driver());

        $files = File::allFiles($sourceDir);
        $count = 0;

        foreach ($files as $file) {
            // Get relative path (e.g. featured/f1.webp)
            $relativePath = str_replace($sourceDir . DIRECTORY_SEPARATOR, '', $file->getPathname());

            // Replace file extension with .webp
            $webpPath = preg_replace('/\.[^.]+$/', '.webp', $relativePath);

            // Final destination
            $optimizedPath = $targetDir . DIRECTORY_SEPARATOR . $webpPath;

            $this->line("⚙️  Optimizing: {$relativePath}");

            try {
                // Read and convert image
                $image = $manager->read($file->getPathname())->toWebp(75);

                // Ensure folder exists in cache/images
                File::ensureDirectoryExists(dirname($optimizedPath));

                // Save optimized image
                $image->save($optimizedPath);

                $count++;
            } catch (\Exception $e) {
                $this->error("❌ Failed: {$relativePath} → " . $e->getMessage());
            }
        }

        $this->info("✅ Done! {$count} images optimized and stored in /public/cache/images");
        return 0;
    }
}
