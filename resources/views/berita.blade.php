@extends('layouts.app')

@section('title', 'Berita Dusun - Slegrengan Kulon')

@section('content')

<!-- Header Background -->
<section class="h-64 bg-gradient-to-r from-green-800 via-green-700 to-green-500 relative">
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="max-w-7xl mx-auto px-6 h-full flex items-center relative z-10">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Berita Dusun
            </h1>

            <p class="text-green-50 text-lg max-w-2xl">
                Informasi terbaru mengenai kegiatan, program masyarakat, pengumuman,
                dan perkembangan Dusun Slegrengan Kulon.
            </p>
        </div>
    </div>
</section>

<!-- Content Wrapper -->
<section class="max-w-7xl mx-auto px-6 -mt-16 relative z-20 mb-20">

    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10">

        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-500 mb-8">
            <a href="/" class="hover:text-green-700">Home</a>
            <span class="mx-3">›</span>
            <span class="text-gray-700">Berita</span>
        </div>

        <!-- Title -->
        <div class="mb-10">
            <h2 class="text-4xl font-bold text-gray-900 mb-3">
                Berita Dusun Slegrengan Kulon
            </h2>

            <p class="text-gray-600 max-w-3xl">
                Dokumentasi kegiatan masyarakat, informasi program dusun, serta berita
                terbaru sebagai media publikasi dan branding Dusun Slegrengan Kulon.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- Left Content -->
            <div class="lg:col-span-2">

                <!-- Filter dan Sorting -->
                <div class="border-y py-4 mb-8 flex flex-col md:flex-row justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <button class="text-gray-500 hover:text-red-600 text-xl">
                            ×
                        </button>

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm font-medium">
                            Kegiatan Dusun
                        </span>
                    </div>

                    <div class="flex gap-6 text-sm font-medium">
                        <a href="#" class="text-green-700 border-b-2 border-green-700 pb-2">
                            Latest
                        </a>

                        <a href="#" class="text-gray-600 hover:text-green-700 pb-2">
                            Oldest
                        </a>
                    </div>
                </div>

                <!-- List Berita -->
                <div class="space-y-8">

                    <!-- Card Berita 1 -->
                    <article class="grid md:grid-cols-3 gap-6 border-b pb-8">
                        <div class="h-48 md:h-40 bg-green-200 rounded-xl flex items-center justify-center overflow-hidden">
                            <span class="text-green-800 font-semibold">Foto Kegiatan</span>
                        </div>

                        <div class="md:col-span-2">
                            <p class="text-sm text-green-700 font-semibold uppercase mb-2">
                                Kegiatan Dusun
                            </p>

                            <a href="/berita/kegiatan-gotong-royong-warga-dusun-slegrengan-kulon">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3 hover:text-green-700 cursor-pointer">
                                    Kegiatan Gotong Royong Warga Dusun Slegrengan Kulon
                                </h3>
                            </a>

                            <p class="text-gray-600 leading-relaxed mb-4">
                                Warga Dusun Slegrengan Kulon melaksanakan kegiatan gotong royong
                                untuk membersihkan lingkungan, memperbaiki fasilitas umum, dan
                                mempererat kebersamaan antarwarga.
                            </p>

                            <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                                <span>6 Juli 2026</span>
                                <span>•</span>
                                <span>2 min read</span>
                            </div>

                            <div class="flex flex-wrap gap-2 mt-4">
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#GotongRoyong</span>
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#KegiatanWarga</span>
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#DusunSlegrenganKulon</span>
                            </div>

                            <a href="/berita/kegiatan-gotong-royong-warga-dusun-slegrengan-kulon"
                               class="inline-block mt-5 text-green-700 font-semibold hover:underline">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </article>

                    <!-- Card Berita 2 -->
                    <article class="grid md:grid-cols-3 gap-6 border-b pb-8">
                        <div class="h-48 md:h-40 bg-yellow-200 rounded-xl flex items-center justify-center overflow-hidden">
                            <span class="text-yellow-800 font-semibold">Foto UMKM</span>
                        </div>

                        <div class="md:col-span-2">
                            <p class="text-sm text-green-700 font-semibold uppercase mb-2">
                                UMKM Dusun
                            </p>

                            <a href="/berita/pelatihan-pemasaran-digital-untuk-pelaku-umkm-lokal">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3 hover:text-green-700 cursor-pointer">
                                    Pelatihan Pemasaran Digital untuk Pelaku UMKM Lokal
                                </h3>
                            </a>

                            <p class="text-gray-600 leading-relaxed mb-4">
                                Pelaku UMKM mendapatkan pendampingan mengenai pemanfaatan media digital
                                untuk memperkenalkan produk lokal agar mampu menjangkau pasar yang lebih luas.
                            </p>

                            <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                                <span>6 Juli 2026</span>
                                <span>•</span>
                                <span>3 min read</span>
                            </div>

                            <div class="flex flex-wrap gap-2 mt-4">
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#UMKM</span>
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#ProdukLokal</span>
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#DigitalMarketing</span>
                            </div>

                            <a href="/berita/pelatihan-pemasaran-digital-untuk-pelaku-umkm-lokal"
                               class="inline-block mt-5 text-green-700 font-semibold hover:underline">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </article>

                    <!-- Card Berita 3 -->
                    <article class="grid md:grid-cols-3 gap-6 border-b pb-8">
                        <div class="h-48 md:h-40 bg-blue-200 rounded-xl flex items-center justify-center overflow-hidden">
                            <span class="text-blue-800 font-semibold">Foto Pemuda</span>
                        </div>

                        <div class="md:col-span-2">
                            <p class="text-sm text-green-700 font-semibold uppercase mb-2">
                                Pemuda Dusun
                            </p>

                            <a href="/berita/peran-pemuda-dalam-membangun-branding-dusun">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3 hover:text-green-700 cursor-pointer">
                                    Peran Pemuda dalam Membangun Branding Dusun
                                </h3>
                            </a>

                            <p class="text-gray-600 leading-relaxed mb-4">
                                Pemuda dusun berperan aktif dalam dokumentasi kegiatan, pengelolaan media,
                                serta pengembangan website sebagai identitas digital Dusun Slegrengan Kulon.
                            </p>

                            <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                                <span>6 Juli 2026</span>
                                <span>•</span>
                                <span>2 min read</span>
                            </div>

                            <div class="flex flex-wrap gap-2 mt-4">
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#PemudaDusun</span>
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#BrandingDusun</span>
                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">#WebsiteDesa</span>
                            </div>

                            <a href="/berita/peran-pemuda-dalam-membangun-branding-dusun"
                               class="inline-block mt-5 text-green-700 font-semibold hover:underline">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </article>

                </div>
            </div>

            <!-- Sidebar -->
            <aside class="space-y-6">

                <!-- Search -->
                <div class="bg-white border rounded-2xl p-5 shadow-sm">
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="search"
                            class="w-full border rounded-xl py-3 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-green-600"
                        >
                        <span class="absolute left-3 top-3 text-gray-400">🔍</span>
                    </div>
                </div>

                <!-- Recommended Topics -->
                <div class="bg-white border rounded-2xl p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Recommended Topics
                        </h3>
                        <span>⌃</span>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <a href="#" class="bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm">
                            Kegiatan Dusun
                        </a>

                        <a href="#" class="bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm">
                            UMKM
                        </a>

                        <a href="#" class="bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm">
                            Budaya
                        </a>

                        <a href="#" class="bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm">
                            Pengumuman
                        </a>
                    </div>
                </div>

                <!-- Category -->
                <div class="bg-white border rounded-2xl p-5 shadow-sm">
                    <h3 class="font-bold text-gray-900 uppercase mb-5">
                        Category
                    </h3>

                    <div class="space-y-4">
                        <div class="h-24 rounded-xl bg-gradient-to-r from-green-700 to-green-400 flex items-center justify-center text-white font-bold">
                            Kegiatan Dusun
                        </div>

                        <div class="h-24 rounded-xl bg-gradient-to-r from-yellow-600 to-yellow-300 flex items-center justify-center text-white font-bold">
                            UMKM Lokal
                        </div>

                        <div class="h-24 rounded-xl bg-gradient-to-r from-blue-700 to-blue-400 flex items-center justify-center text-white font-bold">
                            Pengumuman
                        </div>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-green-700 rounded-2xl p-6 text-white">
                    <h3 class="font-bold text-xl mb-3">
                        Punya Kegiatan Dusun?
                    </h3>

                    <p class="text-green-50 text-sm leading-relaxed mb-5">
                        Kegiatan masyarakat dapat dipublikasikan melalui website ini
                        agar terdokumentasi dan dikenal oleh masyarakat luas.
                    </p>

                    <a href="/kontak" class="bg-white text-green-700 px-4 py-2 rounded-lg font-semibold inline-block">
                        Hubungi Admin
                    </a>
                </div>

            </aside>

        </div>
    </div>
</section>

@endsection