<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Paksa halaman HTML untuk tidak di-cache oleh browser, proxy, maupun
 * layer cache hosting (LiteSpeed/nginx/Cloudflare). Tujuannya: setiap kali
 * admin meng-update data (mis. deskripsi UMKM / berita), perubahan langsung
 * tampil di situs publik tanpa perlu hard-refresh atau purge cache manual.
 *
 * Hanya respons HTML yang dikenai header ini — file statis (gambar/css/js)
 * dibiarkan tetap boleh di-cache biar situs tetap ringan.
 */
class NoCacheHtml
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $contentType = $response->headers->get('Content-Type', '');

        if (str_contains($contentType, 'text/html')) {
            $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
        }

        return $response;
    }
}
