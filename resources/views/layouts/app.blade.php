<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dusun Slegrengan Kulon')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-green-700">
                Dusun Slegrengan Kulon
            </a>

            <div class="space-x-6 hidden md:block">
                <a href="/" class="{{ request()->is('/') ? 'text-green-700 font-semibold' : 'text-gray-700 hover:text-green-700' }}">
                    Beranda
                </a>

                <a href="/profil-dusun" class="{{ request()->is('profil-dusun') ? 'text-green-700 font-semibold' : 'text-gray-700 hover:text-green-700' }}">
                    Profil Dusun
                </a>

                <a href="/berita" class="{{ request()->is('berita*') ? 'text-green-700 font-semibold' : 'text-gray-700 hover:text-green-700' }}">
                    Berita
                </a>

                <a href="/umkm" class="{{ request()->is('umkm') ? 'text-green-700 font-semibold' : 'text-gray-700 hover:text-green-700' }}">
                    UMKM
                </a>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h4 class="font-bold text-xl mb-2">Dusun Slegrengan Kulon</h4>
            <p class="text-sm text-green-200 mt-4">
                © kkn-upnyk-84.376 tahun 2026
            </p>
        </div>
    </footer>

</body>
</html>