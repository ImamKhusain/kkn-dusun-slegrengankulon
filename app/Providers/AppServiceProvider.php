<?php

namespace App\Providers;

use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerWebpUploadMacro();

        // Terapkan konversi WebP ke SEMUA FileUpload secara default.
        FileUpload::configureUsing(fn (FileUpload $component) => $component->webp());
    }

    /**
     * FileUpload::make('foo')->webp() — konversi setiap gambar yang di-upload
     * menjadi WebP (dan opsional di-resize) sebelum disimpan, biar ringan.
     *
     * Pakai ekstensi GD bawaan (sudah support WebP), tanpa dependency tambahan.
     */
    protected function registerWebpUploadMacro(): void
    {
        if (FileUpload::hasMacro('webp')) {
            return;
        }

        FileUpload::macro('webp', function (int $quality = 80, ?int $maxWidth = 1600) {
            /** @var FileUpload $this */
            return $this->saveUploadedFileUsing(function (FileUpload $component, $file) use ($quality, $maxWidth) {
                $disk = $component->getDiskName();
                $directory = trim((string) $component->getDirectory(), '/');

                // Kalau GD tidak bisa baca (mis. HEIC/SVG), simpan file asli apa adanya.
                $binary = @file_get_contents($file->getRealPath());
                $image = $binary ? @imagecreatefromstring($binary) : false;

                if ($image === false) {
                    return $file->storePubliclyAs(
                        $directory,
                        Str::uuid() . '.' . $file->getClientOriginalExtension(),
                        $disk,
                    );
                }

                // Pertahankan transparansi (PNG/WebP).
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);

                // Downscale kalau lebih lebar dari batas — hemat ukuran.
                $width = imagesx($image);
                $height = imagesy($image);
                if ($maxWidth && $width > $maxWidth) {
                    $newHeight = (int) round($height * $maxWidth / $width);
                    $resized = imagecreatetruecolor($maxWidth, $newHeight);
                    imagealphablending($resized, false);
                    imagesavealpha($resized, true);
                    imagecopyresampled($resized, $image, 0, 0, 0, 0, $maxWidth, $newHeight, $width, $height);
                    imagedestroy($image);
                    $image = $resized;
                }

                $tmp = tempnam(sys_get_temp_dir(), 'webp_');
                imagewebp($image, $tmp, $quality);
                imagedestroy($image);

                $path = ($directory ? $directory . '/' : '') . Str::uuid() . '.webp';
                Storage::disk($disk)->put($path, file_get_contents($tmp), 'public');
                @unlink($tmp);

                return $path;
            });
        });
    }
}
