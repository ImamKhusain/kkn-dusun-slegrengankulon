@extends('layouts.app')

@section('title', 'Beranda - Dusun Slegrengan Kulon')

@section('content')

<!-- Hero Section -->
<section class="py-24 bg-gradient-to-r from-green-700 to-green-500 text-white">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                Membangun Identitas Digital Dusun Slegrengan Kulon
            </h1>

            <p class="text-lg mb-8 text-green-50 leading-relaxed">
                Website ini hadir sebagai media informasi, promosi potensi dusun,
                dokumentasi kegiatan masyarakat, serta wadah pemasaran produk UMKM lokal
                agar Dusun Slegrengan Kulon semakin dikenal luas.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="/profil-dusun" class="bg-white text-green-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                    Lihat Profil Dusun
                </a>

                <a href="/umkm" class="border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-700">
                    Jelajahi UMKM
                </a>
            </div>
        </div>

        <div class="bg-white/20 rounded-2xl p-6 text-center">
            <div class="h-72 bg-white/30 rounded-xl flex items-center justify-center">
                <p class="text-white font-semibold">
                    Foto Dusun / Banner Utama
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Fitur Utama -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Fitur Utama Website Dusun
            </h2>

            <p class="text-gray-600">
                Satu website untuk mengenalkan dusun, menyebarkan informasi, dan mendukung UMKM lokal.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <a href="/profil-dusun" class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition block">
                <div class="text-4xl mb-4">🏡</div>
                <h3 class="text-xl font-bold mb-3 text-green-700">Profil Dusun</h3>
                <p class="text-gray-600">
                    Menampilkan sejarah, visi misi, potensi, struktur pengurus, dan identitas Dusun Slegrengan Kulon.
                </p>
            </a>

            <a href="/berita" class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition block">
                <div class="text-4xl mb-4">📰</div>
                <h3 class="text-xl font-bold mb-3 text-green-700">Berita & Kegiatan</h3>
                <p class="text-gray-600">
                    Mendokumentasikan kegiatan warga, pengumuman, acara dusun, gotong royong, dan program masyarakat.
                </p>
            </a>

            <a href="/umkm" class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition block">
                <div class="text-4xl mb-4">🛍️</div>
                <h3 class="text-xl font-bold mb-3 text-green-700">Marketplace UMKM</h3>
                <p class="text-gray-600">
                    Membantu pelaku UMKM lokal mempromosikan produk agar lebih mudah dikenal dan dijangkau pembeli.
                </p>
            </a>
        </div>
    </div>
</section>

<!-- Berita Terbaru -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Berita Terbaru</h2>
                <p class="text-gray-600">Informasi kegiatan terbaru dari Dusun Slegrengan Kulon.</p>
            </div>

            <a href="/berita" class="text-green-700 font-semibold hover:underline">
                Lihat Semua
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Berita 1 -->
            <article class="bg-gray-50 rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                <div class="h-48 bg-green-200 flex items-center justify-center">
                    Foto Kegiatan
                </div>

                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-2">6 Juli 2026</p>

                    <h3 class="text-lg font-bold mb-3 text-gray-900 hover:text-green-700">
                        <a href="/berita/kegiatan-gotong-royong-warga-dusun-slegrengan-kulon">
                            Kegiatan Gotong Royong Warga
                        </a>
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        Warga dusun bersama-sama melaksanakan kegiatan gotong royong untuk menjaga kebersihan lingkungan.
                    </p>

                    <a href="/berita/kegiatan-gotong-royong-warga-dusun-slegrengan-kulon" class="inline-block mt-4 text-green-700 font-semibold text-sm hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            </article>

            <!-- Berita 2 -->
            <article class="bg-gray-50 rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                <div class="h-48 bg-green-200 flex items-center justify-center">
                    Foto Kegiatan
                </div>

                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-2">6 Juli 2026</p>

                    <h3 class="text-lg font-bold mb-3 text-gray-900 hover:text-green-700">
                        <a href="/berita/pelatihan-pemasaran-digital-untuk-pelaku-umkm-lokal">
                            Pelatihan UMKM Lokal
                        </a>
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        Pelaku UMKM mengikuti pelatihan pemasaran digital untuk meningkatkan daya saing produk lokal.
                    </p>

                    <a href="/berita/pelatihan-pemasaran-digital-untuk-pelaku-umkm-lokal" class="inline-block mt-4 text-green-700 font-semibold text-sm hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            </article>

            <!-- Berita 3 -->
            <article class="bg-gray-50 rounded-2xl overflow-hidden shadow hover:shadow-lg transition">
                <div class="h-48 bg-green-200 flex items-center justify-center">
                    Foto Kegiatan
                </div>

                <div class="p-6">
                    <p class="text-sm text-gray-500 mb-2">6 Juli 2026</p>

                    <h3 class="text-lg font-bold mb-3 text-gray-900 hover:text-green-700">
                        <a href="/berita/peran-pemuda-dalam-membangun-branding-dusun">
                            Kegiatan Pemuda Dusun
                        </a>
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed">
                        Pemuda dusun berperan aktif dalam kegiatan sosial dan pengembangan potensi masyarakat.
                    </p>

                    <a href="/berita/peran-pemuda-dalam-membangun-branding-dusun" class="inline-block mt-4 text-green-700 font-semibold text-sm hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- UMKM -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold text-gray-800">Produk UMKM Lokal</h2>
            <p class="text-gray-600">
                Dukung produk lokal masyarakat Dusun Slegrengan Kulon.
            </p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            <!-- Produk 1 -->
            <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-yellow-200 flex items-center justify-center">
                    Foto Produk
                </div>

                <div class="p-5">
                    <h3 class="font-bold text-lg">Produk UMKM 1</h3>
                    <p class="text-green-700 font-semibold mt-2">Rp 10.000</p>

                    <a href="#" class="block mt-4 bg-green-700 text-white text-center py-2 rounded-lg hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Produk 2 -->
            <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-yellow-200 flex items-center justify-center">
                    Foto Produk
                </div>

                <div class="p-5">
                    <h3 class="font-bold text-lg">Produk UMKM 2</h3>
                    <p class="text-green-700 font-semibold mt-2">Rp 15.000</p>

                    <a href="#" class="block mt-4 bg-green-700 text-white text-center py-2 rounded-lg hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Produk 3 -->
            <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-yellow-200 flex items-center justify-center">
                    Foto Produk
                </div>

                <div class="p-5">
                    <h3 class="font-bold text-lg">Produk UMKM 3</h3>
                    <p class="text-green-700 font-semibold mt-2">Rp 20.000</p>

                    <a href="#" class="block mt-4 bg-green-700 text-white text-center py-2 rounded-lg hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Produk 4 -->
            <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-yellow-200 flex items-center justify-center">
                    Foto Produk
                </div>

                <div class="p-5">
                    <h3 class="font-bold text-lg">Produk UMKM 4</h3>
                    <p class="text-green-700 font-semibold mt-2">Rp 25.000</p>

                    <a href="#" class="block mt-4 bg-green-700 text-white text-center py-2 rounded-lg hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="/umkm" class="inline-block bg-green-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-800">
                Lihat Semua Produk UMKM
            </a>
        </div>
    </div>
</section>

@endsection