@extends('layouts.app')

@section('title', 'Beranda - Dusun Slegrengan Kulon')

@section('content')

@php
    $profile = $profile ?? null;
    $latestPosts = $latestPosts ?? collect();
    $latestUmkms = $latestUmkms ?? collect();

    $mediaUrl = function ($path) {
        if (is_array($path)) {
            $path = reset($path);
        }

        if (empty($path)) {
            return null;
        }

        $path = trim(str_replace('\\', '/', $path));
        $path = ltrim($path, '/');

        if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (\Illuminate\Support\Str::startsWith($path, 'storage/')) {
            return asset($path);
        }

        if (\Illuminate\Support\Str::startsWith($path, 'public/')) {
            $path = substr($path, strlen('public/'));
        }

        return asset('storage/' . $path);
    };

    /*
    |--------------------------------------------------------------------------
    | FOTO HERO HOME
    |--------------------------------------------------------------------------
    | Bagian ini mengambil foto peta dari data Profil Dusun.
    | Kalau nama kolom peta di database berbeda, tinggal tambahkan di bawah.
    */

    $mapImagePath =
        $profile?->map_image
        ?? $profile?->map_photo
        ?? $profile?->peta_image
        ?? $profile?->peta_dusun_image
        ?? $profile?->foto_peta_dusun
        ?? $profile?->gambar_peta_dusun
        ?? $profile?->map
        ?? $profile?->map_picture
        ?? $profile?->village_map
        ?? null;

    $heroImageUrl = $mediaUrl($mapImagePath);

    $googleMapsUrl =
        $profile?->map_link
        ?? $profile?->google_maps_link
        ?? $profile?->peta_dusun_link
        ?? $profile?->link_google_maps
        ?? $profile?->google_map_url
        ?? null;
@endphp

{{-- HERO SECTION --}}
<section class="py-24 bg-gradient-to-r from-green-800 via-green-700 to-green-500 text-white">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        {{-- Hero Text --}}
        <div>
            <p class="uppercase tracking-wider text-green-100 font-semibold mb-4">
                Website Informasi Dusun
            </p>

            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                Membangun Identitas Digital Dusun Slegrengan Kulon
            </h1>

            <p class="text-lg mb-8 text-green-50 leading-relaxed">
                Website ini hadir sebagai media informasi, promosi potensi dusun,
                dokumentasi kegiatan masyarakat, serta wadah pemasaran produk UMKM
                lokal agar Dusun Slegrengan Kulon semakin dikenal luas.
            </p>

            <div class="flex flex-wrap gap-4">
                <a
                    href="{{ url('/profil-dusun') }}"
                    class="bg-white text-green-700 px-7 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                >
                    Lihat Profil Dusun
                </a>

                <a
                    href="{{ url('/umkm') }}"
                    class="border border-white px-7 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-700 transition"
                >
                    Jelajahi UMKM
                </a>
            </div>
        </div>

        {{-- Hero Image: Foto Peta Dusun --}}
        <div class="bg-white/20 rounded-2xl p-6 text-center shadow-lg">
            <div class="h-80 bg-white/30 rounded-xl flex items-center justify-center overflow-hidden">
                @if ($heroImageUrl)
                    @if ($googleMapsUrl)
                        <a href="{{ $googleMapsUrl }}" target="_blank" class="w-full h-full block">
                            <img
                                src="{{ $heroImageUrl }}"
                                alt="Peta Dusun Slegrengan Kulon"
                                class="w-full h-full object-cover"
                            >
                        </a>
                    @else
                        <img
                            src="{{ $heroImageUrl }}"
                            alt="Peta Dusun Slegrengan Kulon"
                            class="w-full h-full object-cover"
                        >
                    @endif
                @else
                    <div class="text-white font-semibold">
                        Foto Peta Dusun Belum Diisi
                    </div>
                @endif
            </div>

            <p class="text-green-50 text-sm mt-4">
                Peta wilayah Dusun Slegrengan Kulon (Kadus 3)
            </p>
        </div>

    </div>
</section>

{{-- FITUR UTAMA --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                Fitur Utama Website Dusun
            </h2>

            <p class="text-gray-600">
                Satu website untuk mengenalkan dusun, menyebarkan informasi, dan mendukung UMKM lokal.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <a href="{{ url('/profil-dusun') }}" class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition block">
                <div class="text-4xl mb-4">🏡</div>
                <h3 class="text-xl font-bold mb-3 text-green-700">
                    Profil Dusun
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    Menampilkan profil, pengurus, peta wilayah, serta identitas Dusun Slegrengan Kulon.
                </p>
            </a>

            <a href="{{ url('/berita') }}" class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition block">
                <div class="text-4xl mb-4">📰</div>
                <h3 class="text-xl font-bold mb-3 text-green-700">
                    Berita & Kegiatan
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    Mendokumentasikan kegiatan warga, pengumuman, acara dusun, dan program masyarakat.
                </p>
            </a>

            <a href="{{ url('/umkm') }}" class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition block">
                <div class="text-4xl mb-4">🛍️</div>
                <h3 class="text-xl font-bold mb-3 text-green-700">
                    Marketplace UMKM
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    Membantu pelaku UMKM lokal mempromosikan produk agar lebih mudah dikenal masyarakat.
                </p>
            </a>
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">
                    Berita Terbaru
                </h2>
                <p class="text-gray-600">
                    Informasi kegiatan terbaru dari Dusun Slegrengan Kulon.
                </p>
            </div>

            <a href="{{ url('/berita') }}" class="text-green-700 font-semibold hover:underline">
                Lihat Semua →
            </a>
        </div>

        @if ($latestPosts->count() > 0)
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($latestPosts as $post)
                    @php
                        $thumbnailUrl = $mediaUrl($post->thumbnail);
                        $description = $post->meta_description;

                        if (!$description && is_array($post->content)) {
                            foreach ($post->content as $block) {
                                if (($block['type'] ?? null) === 'paragraph') {
                                    $description =
                                        $block['data']['content']
                                        ?? $block['content']
                                        ?? '';

                                    $description = strip_tags($description);
                                    break;
                                }
                            }
                        }
                    @endphp

                    <article class="bg-gray-50 rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                        <a href="{{ url('/berita/' . $post->slug) }}">
                            <div class="h-48 bg-green-100 flex items-center justify-center overflow-hidden">
                                @if ($thumbnailUrl)
                                    <img
                                        src="{{ $thumbnailUrl }}"
                                        alt="{{ $post->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-300"
                                    >
                                @else
                                    <span class="text-green-700 font-semibold">
                                        Foto Kegiatan
                                    </span>
                                @endif
                            </div>
                        </a>

                        <div class="p-6">
                            <p class="text-sm text-gray-500 mb-2">
                                {{ optional($post->published_at)->translatedFormat('d F Y') ?? $post->created_at->translatedFormat('d F Y') }}
                            </p>

                            <h3 class="text-lg font-bold mb-3 text-gray-900 hover:text-green-700 line-clamp-2">
                                <a href="{{ url('/berita/' . $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                                {{ \Illuminate\Support\Str::limit($description ?? 'Belum ada ringkasan berita.', 120) }}
                            </p>

                            <a
                                href="{{ url('/berita/' . $post->slug) }}"
                                class="inline-block mt-4 text-green-700 font-semibold text-sm hover:underline"
                            >
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="bg-gray-50 border rounded-2xl p-10 text-center">
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    Belum ada berita terbaru
                </h3>
                <p class="text-gray-600">
                    Berita akan muncul setelah admin menambahkan post dan mengaktifkan visibility.
                </p>
            </div>
        @endif
    </div>
</section>

{{-- UMKM TERBARU --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-gray-900">
                Produk UMKM Lokal
            </h2>
            <p class="text-gray-600">
                Dukung produk lokal masyarakat Dusun Slegrengan Kulon.
            </p>
        </div>

        @if ($latestUmkms->count() > 0)
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($latestUmkms as $umkm)
                    @php
                        $imageUrl = $mediaUrl($umkm->image);

                        $description = strip_tags($umkm->description ?? '');

                        $waNumber = preg_replace('/[^0-9]/', '', $umkm->whatsapp_number ?? '');

                        if (!empty($waNumber) && \Illuminate\Support\Str::startsWith($waNumber, '0')) {
                            $waNumber = '62' . substr($waNumber, 1);
                        }

                        $waText = 'Halo, saya tertarik dengan produk ' . $umkm->business_name;

                        $waUrl = $waNumber
                            ? 'https://wa.me/' . $waNumber . '?text=' . urlencode($waText)
                            : null;
                    @endphp

                    <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">
                        <div class="h-44 bg-yellow-100 flex items-center justify-center overflow-hidden">
                            @if ($imageUrl)
                                <img
                                    src="{{ $imageUrl }}"
                                    alt="{{ $umkm->business_name }}"
                                    class="w-full h-full object-cover hover:scale-105 transition duration-300"
                                >
                            @else
                                <span class="text-yellow-800 font-semibold">
                                    Foto Produk
                                </span>
                            @endif
                        </div>

                        <div class="p-5">
                            <div class="flex justify-between items-start gap-2 mb-3">
                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                                    {{ $umkm->category->name ?? 'UMKM' }}
                                </span>

                                <span class="text-xs text-gray-500">
                                    {{ $umkm->status === 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </div>

                            <h3 class="font-bold text-lg text-gray-900 line-clamp-2">
                                {{ $umkm->business_name }}
                            </h3>

                            @if (!empty($description))
                                <p class="text-sm text-gray-600 mt-2 leading-relaxed line-clamp-2">
                                    {{ \Illuminate\Support\Str::limit($description, 100) }}
                                </p>
                            @endif

                            @if (!empty($umkm->owner_name))
                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $umkm->owner_name }}
                                </p>
                            @endif

                            @if (!empty($umkm->price))
                                <p class="text-green-700 font-semibold mt-3">
                                    Rp {{ number_format($umkm->price, 0, ',', '.') }}
                                </p>
                            @endif

                            @if ($waUrl)
                                <a
                                    href="{{ $waUrl }}"
                                    target="_blank"
                                    class="block mt-4 bg-green-700 text-white text-center py-2 rounded-lg hover:bg-green-800 transition"
                                >
                                    Pesan via WhatsApp
                                </a>
                            @elseif (!empty($umkm->link))
                                <a
                                    href="{{ $umkm->link }}"
                                    target="_blank"
                                    class="block mt-4 bg-green-700 text-white text-center py-2 rounded-lg hover:bg-green-800 transition"
                                >
                                    Lihat Produk
                                </a>
                            @else
                                <a
                                    href="{{ url('/umkm') }}"
                                    class="block mt-4 bg-green-700 text-white text-center py-2 rounded-lg hover:bg-green-800 transition"
                                >
                                    Lihat Detail
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white border rounded-2xl p-10 text-center">
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    Belum ada produk UMKM
                </h3>
                <p class="text-gray-600">
                    Produk akan muncul setelah admin menambahkan data UMKM dan mengaktifkan visibility.
                </p>
            </div>
        @endif

        <div class="text-center mt-10">
            <a
                href="{{ url('/umkm') }}"
                class="inline-block bg-green-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-800 transition"
            >
                Lihat Semua Produk UMKM
            </a>
        </div>
    </div>
</section>

@endsection