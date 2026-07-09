@extends('layouts.app')

@section('title', 'Profil Dusun - Dusun Slegrengan Kulon')

@section('content')

<section class="bg-gray-100 min-h-screen py-14">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-500 mb-8">
            <a href="/" class="hover:text-green-700">Home</a>
            <span class="mx-3">›</span>
            <span class="text-gray-700">Profil Dusun</span>
        </div>

        <div class="grid lg:grid-cols-4 gap-8">

            <!-- Sidebar Kiri -->
            <aside class="lg:col-span-1">
                <div class="bg-green-900 text-white rounded-2xl p-6 shadow-lg">
                    <h2 class="text-2xl font-bold mb-6 uppercase">
                        Tentang Dusun
                    </h2>

                    <div class="space-y-2">
                        <button onclick="showSection('profil', this)"
                            class="menu-btn active-menu w-full flex justify-between items-center text-left px-4 py-4 rounded-lg border-b border-green-700 hover:bg-green-800 transition">
                            <span>Profil Dusun</span>
                            <span>→</span>
                        </button>

                        <button onclick="showSection('ketua-dusun', this)"
                            class="menu-btn w-full flex justify-between items-center text-left px-4 py-4 rounded-lg border-b border-green-700 hover:bg-green-800 transition">
                            <span>Ketua Dusun</span>
                            <span>→</span>
                        </button>

                        <button onclick="showSection('karang-taruna', this)"
                            class="menu-btn w-full flex justify-between items-center text-left px-4 py-4 rounded-lg border-b border-green-700 hover:bg-green-800 transition">
                            <span>Ketua Karang Taruna</span>
                            <span>→</span>
                        </button>

                        <button onclick="showSection('peta-dusun', this)"
                            class="menu-btn w-full flex justify-between items-center text-left px-4 py-4 rounded-lg hover:bg-green-800 transition">
                            <span>Peta Dusun</span>
                            <span>→</span>
                        </button>
                    </div>
                </div>
            </aside>

            <!-- Konten Tengah -->
            <section class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 min-h-[620px]">

                    <!-- Profil Dusun -->
                    <div id="profil" class="content-section">
                        <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">
                            Profil Dusun
                        </h1>

                        <div class="flex justify-center mb-8">
                            <div class="w-56 h-36 bg-green-100 rounded-xl flex items-center justify-center text-green-700 font-semibold">
                                Logo / Foto Dusun
                            </div>
                        </div>

                        <p class="text-gray-700 text-lg leading-relaxed mb-5 text-justify">
                            Dusun Slegrengan Kulon merupakan salah satu wilayah masyarakat yang memiliki
                            potensi sosial, budaya, dan ekonomi lokal yang dapat dikembangkan melalui
                            pemanfaatan media digital. Kehidupan masyarakat di dusun ini ditandai dengan
                            semangat gotong royong, kekeluargaan, serta partisipasi aktif dalam berbagai
                            kegiatan kemasyarakatan.
                        </p>

                        <p class="text-gray-700 text-lg leading-relaxed mb-5 text-justify">
                            Melalui website ini, Dusun Slegrengan Kulon diharapkan memiliki identitas digital
                            yang mampu memperkenalkan profil dusun, mendokumentasikan kegiatan warga,
                            serta mempromosikan potensi dan produk UMKM lokal kepada masyarakat luas.
                        </p>

                        <p class="text-gray-700 text-lg leading-relaxed text-justify">
                            Website dusun ini juga menjadi sarana informasi yang mudah diakses oleh warga
                            maupun masyarakat luar, sehingga branding dusun dapat berkembang secara lebih
                            modern, terarah, dan berkelanjutan.
                        </p>
                    </div>

                    <!-- Ketua Dusun -->
                    <div id="ketua-dusun" class="content-section hidden">
                        <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">
                            Ketua Dusun
                        </h1>

                        <div class="flex justify-center mb-6">
                            <div class="w-52 h-60 bg-gray-200 rounded-2xl flex items-center justify-center text-gray-600 font-semibold">
                                Foto Ketua Dusun
                            </div>
                        </div>

                        <h2 class="text-2xl font-bold text-center text-green-700 mb-6">
                            Bapak Nama Ketua Dusun
                        </h2>

                        <p class="text-gray-700 text-lg leading-relaxed mb-5 text-justify">
                            Ketua Dusun memiliki peran penting dalam memimpin, mengoordinasikan, serta
                            mengayomi masyarakat dalam berbagai kegiatan pemerintahan maupun sosial
                            kemasyarakatan. Kepemimpinan yang baik menjadi salah satu kunci dalam
                            mendorong kemajuan dusun.
                        </p>

                        <p class="text-gray-700 text-lg leading-relaxed text-justify">
                            Melalui kerja sama antara pengurus dusun dan warga, setiap program pembangunan,
                            pelayanan, dan pemberdayaan masyarakat diharapkan dapat berjalan dengan baik
                            demi menciptakan lingkungan yang harmonis, aman, dan sejahtera.
                        </p>
                    </div>

                    <!-- Ketua Karang Taruna -->
                    <div id="karang-taruna" class="content-section hidden">
                        <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">
                            Ketua Karang Taruna
                        </h1>

                        <div class="flex justify-center mb-6">
                            <div class="w-52 h-60 bg-gray-200 rounded-2xl flex items-center justify-center text-gray-600 font-semibold">
                                Foto Ketua Karang Taruna
                            </div>
                        </div>

                        <h2 class="text-2xl font-bold text-center text-green-700 mb-6">
                            Saudara Nama Ketua Karang Taruna
                        </h2>

                        <p class="text-gray-700 text-lg leading-relaxed mb-5 text-justify">
                            Karang Taruna merupakan organisasi kepemudaan yang berperan aktif dalam
                            pengembangan potensi generasi muda di lingkungan dusun. Ketua Karang Taruna
                            menjadi penggerak utama dalam pelaksanaan kegiatan pemuda, sosial, budaya,
                            dan pembangunan masyarakat.
                        </p>

                        <p class="text-gray-700 text-lg leading-relaxed text-justify">
                            Dengan semangat kreativitas dan kolaborasi, Karang Taruna diharapkan mampu
                            berkontribusi dalam membangun citra positif dusun, termasuk dalam mendukung
                            dokumentasi kegiatan dan branding digital melalui website dusun.
                        </p>
                    </div>

                    <!-- Peta Dusun -->
                    <div id="peta-dusun" class="content-section hidden">
                        <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">
                            Peta Dusun
                        </h1>

                        <div class="w-full h-96 bg-green-100 rounded-2xl flex items-center justify-center text-green-700 font-semibold mb-6">
                            Gambar Peta Dusun
                        </div>

                        <p class="text-gray-700 text-lg leading-relaxed text-justify">
                            Peta dusun berfungsi untuk memberikan gambaran lokasi wilayah, batas area,
                            jalur akses, serta titik-titik penting yang ada di Dusun Slegrengan Kulon.
                            Nantinya bagian ini dapat diisi dengan gambar peta dusun atau peta digital
                            dari Google Maps.
                        </p>
                    </div>

                </div>
            </section>

            <!-- Sidebar Kanan -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-5">
                        Informasi Singkat
                    </h3>

                    <div class="space-y-4 text-sm text-gray-700">
                        <div class="border-b pb-3">
                            <p class="font-semibold text-green-700">Nama Dusun</p>
                            <p>Dusun Slegrengan Kulon</p>
                        </div>

                        <div class="border-b pb-3">
                            <p class="font-semibold text-green-700">Lokasi</p>
                            <p>Desa / Kecamatan / Kabupaten</p>
                        </div>

                        <div class="border-b pb-3">
                            <p class="font-semibold text-green-700">Ketua Dusun</p>
                            <p>Bapak Nama Ketua Dusun</p>
                        </div>

                        <div class="border-b pb-3">
                            <p class="font-semibold text-green-700">Ketua Karang Taruna</p>
                            <p>Saudara Nama Ketua Karang Taruna</p>
                        </div>

                        <div>
                            <p class="font-semibold text-green-700">Kontak</p>
                            <p>08xxxxxxxxxx</p>
                        </div>
                    </div>

                    <a href="/kontak" class="mt-6 inline-block w-full text-center bg-green-700 text-white py-3 rounded-lg font-semibold hover:bg-green-800">
                        Hubungi Pengurus
                    </a>
                </div>

                <div class="bg-green-700 text-white rounded-2xl shadow-lg p-6 mt-6">
                    <h3 class="text-xl font-bold mb-3">
                        Website Dusun
                    </h3>
                    <p class="text-green-50 text-sm leading-relaxed">
                        Media digital untuk memperkenalkan profil, kegiatan,
                        potensi, dan UMKM Dusun Slegrengan Kulon.
                    </p>
                </div>
            </aside>

        </div>
    </div>
</section>

<style>
    .active-menu {
        background-color: rgb(22 101 52);
        color: white;
        font-weight: 700;
    }
</style>

<script>
    function showSection(sectionId, button) {
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => section.classList.add('hidden'));

        document.getElementById(sectionId).classList.remove('hidden');

        const buttons = document.querySelectorAll('.menu-btn');
        buttons.forEach(btn => btn.classList.remove('active-menu'));

        button.classList.add('active-menu');
    }
</script>

@endsection