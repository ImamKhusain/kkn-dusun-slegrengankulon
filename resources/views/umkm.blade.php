@extends('layouts.app')

@section('title', 'UMKM Lokal - Dusun Slegrengan Kulon')

@section('content')

<!-- Header -->
<section class="h-64 bg-gradient-to-r from-green-800 via-green-700 to-green-500 relative">
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="max-w-7xl mx-auto px-6 h-full flex items-center relative z-10">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Marketplace UMKM
            </h1>

            <p class="text-green-50 text-lg max-w-2xl">
                Temukan berbagai produk dan usaha lokal masyarakat Dusun Slegrengan Kulon.
                Dukung UMKM desa agar semakin berkembang dan dikenal luas.
            </p>
        </div>
    </div>
</section>

<!-- Content -->
<section class="max-w-7xl mx-auto px-6 -mt-16 relative z-20 mb-20">

    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10">

        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-500 mb-8">
            <a href="/" class="hover:text-green-700">Home</a>
            <span class="mx-3">›</span>
            <span class="text-gray-700">UMKM</span>
        </div>

        <!-- Title -->
        <div class="mb-10">
            <h2 class="text-4xl font-bold text-gray-900 mb-3">
                Produk & Usaha Masyarakat
            </h2>

            <p class="text-gray-600 max-w-3xl">
                Halaman ini menampilkan daftar usaha masyarakat, produk lokal, makanan,
                kerajinan, hasil pertanian, serta layanan jasa yang ada di Dusun Slegrengan Kulon.
            </p>
        </div>

        <!-- Search & Filter -->
        <div class="grid md:grid-cols-4 gap-4 mb-10">
            <div class="md:col-span-2">
                <input
                    type="text"
                    placeholder="Cari nama produk atau usaha..."
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-600"
                >
            </div>

            <div>
                <select class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-600">
                    <option>Semua Kategori</option>
                    <option>Makanan</option>
                    <option>Minuman</option>
                    <option>Kerajinan</option>
                    <option>Hasil Pertanian</option>
                    <option>Jasa</option>
                </select>
            </div>

            <div>
                <button class="w-full bg-green-700 text-white px-4 py-3 rounded-xl font-semibold hover:bg-green-800">
                    Cari Produk
                </button>
            </div>
        </div>

        <!-- Category Badge -->
        <div class="flex flex-wrap gap-3 mb-10">
            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm font-medium">
                Semua Produk
            </span>

            <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium">
                Makanan
            </span>

            <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium">
                Minuman
            </span>

            <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium">
                Kerajinan
            </span>

            <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium">
                Hasil Pertanian
            </span>

            <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium">
                Jasa
            </span>
        </div>

        <!-- Produk Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            <!-- Produk 1 -->
            <div class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="h-48 bg-yellow-200 flex items-center justify-center">
                    <span class="text-yellow-800 font-semibold">Foto Produk</span>
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start gap-2 mb-3">
                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                            Makanan
                        </span>

                        <span class="text-sm text-gray-500">
                            Tersedia
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        Keripik Singkong Bu Sari
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Keripik singkong rumahan dengan rasa gurih dan renyah, cocok untuk camilan keluarga.
                    </p>

                    <p class="text-green-700 font-bold text-lg mb-3">
                        Rp 10.000
                    </p>

                    <div class="border-t pt-4 text-sm text-gray-600 mb-4">
                        <p><span class="font-semibold">Pemilik:</span> Bu Sari</p>
                        <p><span class="font-semibold">Lokasi:</span> RT 01 / RW 02</p>
                    </div>

                    <a
                        href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Keripik%20Singkong%20Bu%20Sari"
                        target="_blank"
                        class="block bg-green-700 text-white text-center py-3 rounded-xl font-semibold hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Produk 2 -->
            <div class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="h-48 bg-orange-200 flex items-center justify-center">
                    <span class="text-orange-800 font-semibold">Foto Produk</span>
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start gap-2 mb-3">
                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                            Minuman
                        </span>

                        <span class="text-sm text-gray-500">
                            Tersedia
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        Jamu Tradisional Mbak Lina
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Minuman herbal tradisional yang dibuat dari bahan alami dan diproduksi secara rumahan.
                    </p>

                    <p class="text-green-700 font-bold text-lg mb-3">
                        Rp 8.000
                    </p>

                    <div class="border-t pt-4 text-sm text-gray-600 mb-4">
                        <p><span class="font-semibold">Pemilik:</span> Mbak Lina</p>
                        <p><span class="font-semibold">Lokasi:</span> RT 02 / RW 01</p>
                    </div>

                    <a
                        href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Jamu%20Tradisional"
                        target="_blank"
                        class="block bg-green-700 text-white text-center py-3 rounded-xl font-semibold hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Produk 3 -->
            <div class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="h-48 bg-blue-200 flex items-center justify-center">
                    <span class="text-blue-800 font-semibold">Foto Produk</span>
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start gap-2 mb-3">
                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                            Kerajinan
                        </span>

                        <span class="text-sm text-gray-500">
                            Pre-order
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        Anyaman Bambu Pak Darto
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Produk kerajinan bambu lokal yang dibuat secara manual dengan kualitas rapi dan kuat.
                    </p>

                    <p class="text-green-700 font-bold text-lg mb-3">
                        Rp 25.000
                    </p>

                    <div class="border-t pt-4 text-sm text-gray-600 mb-4">
                        <p><span class="font-semibold">Pemilik:</span> Pak Darto</p>
                        <p><span class="font-semibold">Lokasi:</span> RT 03 / RW 02</p>
                    </div>

                    <a
                        href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Anyaman%20Bambu"
                        target="_blank"
                        class="block bg-green-700 text-white text-center py-3 rounded-xl font-semibold hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Produk 4 -->
            <div class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="h-48 bg-lime-200 flex items-center justify-center">
                    <span class="text-lime-800 font-semibold">Foto Produk</span>
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start gap-2 mb-3">
                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                            Pertanian
                        </span>

                        <span class="text-sm text-gray-500">
                            Tersedia
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        Sayur Segar Warga
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Sayuran segar hasil kebun masyarakat dusun yang dipanen langsung dari lahan lokal.
                    </p>

                    <p class="text-green-700 font-bold text-lg mb-3">
                        Rp 12.000
                    </p>

                    <div class="border-t pt-4 text-sm text-gray-600 mb-4">
                        <p><span class="font-semibold">Pemilik:</span> Kelompok Tani</p>
                        <p><span class="font-semibold">Lokasi:</span> Area Persawahan Dusun</p>
                    </div>

                    <a
                        href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Sayur%20Segar"
                        target="_blank"
                        class="block bg-green-700 text-white text-center py-3 rounded-xl font-semibold hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Produk 5 -->
            <div class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="h-48 bg-purple-200 flex items-center justify-center">
                    <span class="text-purple-800 font-semibold">Foto Usaha</span>
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start gap-2 mb-3">
                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                            Jasa
                        </span>

                        <span class="text-sm text-gray-500">
                            Aktif
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        Jasa Jahit Bu Rini
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Layanan jahit pakaian, permak celana, dan pembuatan seragam sederhana untuk warga sekitar.
                    </p>

                    <p class="text-green-700 font-bold text-lg mb-3">
                        Mulai Rp 15.000
                    </p>

                    <div class="border-t pt-4 text-sm text-gray-600 mb-4">
                        <p><span class="font-semibold">Pemilik:</span> Bu Rini</p>
                        <p><span class="font-semibold">Lokasi:</span> RT 04 / RW 01</p>
                    </div>

                    <a
                        href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Jasa%20Jahit"
                        target="_blank"
                        class="block bg-green-700 text-white text-center py-3 rounded-xl font-semibold hover:bg-green-800">
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Produk 6 -->
            <div class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <div class="h-48 bg-red-200 flex items-center justify-center">
                    <span class="text-red-800 font-semibold">Foto Produk</span>
                </div>

                <div class="p-5">
                    <div class="flex justify-between items-start gap-2 mb-3">
                        <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                            Makanan
                        </span>

                        <span class="text-sm text-gray-500">
                            Tersedia
                        </span>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        Kue Basah Bu Tini
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        Aneka kue basah rumahan untuk acara keluarga, hajatan, kegiatan dusun, dan pesanan harian.
                    </p>

                    <p class="text-green-700 font-bold text-lg mb-3">
                        Mulai Rp 2.000
                    </p>

                    <div class="border-t pt-4 text-sm text-gray-600 mb-4">
                        <p><span class="font-semibold">Pemilik:</span> Bu Tini</p>
                        <p><span class="font-semibold">Lokasi:</span> RT 01 / RW 03</p>
                    </div>

                    <a
                        href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20Kue%20Basah"
                        target="_blank"
                        class="block bg-green-700 text-white text-center py-3 rounded-xl font-semibold hover:bg-green-800">
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>

        </div>

        <!-- Info Section -->
        <div class="mt-14 bg-green-50 border border-green-100 rounded-2xl p-8">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">
                        Ingin Usaha Anda Ditampilkan?
                    </h3>

                    <p class="text-gray-600 leading-relaxed">
                        Pelaku usaha masyarakat Dusun Slegrengan Kulon dapat mendaftarkan produk
                        atau usahanya agar ditampilkan pada website dusun. Data usaha nantinya
                        dapat dikelola oleh admin melalui dashboard.
                    </p>
                </div>

                <div class="md:text-right">
                    <a href="/kontak" class="inline-block bg-green-700 text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-800">
                        Hubungi Pengelola Website
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection