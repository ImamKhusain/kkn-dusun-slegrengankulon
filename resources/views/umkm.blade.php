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
                Produk & Usaha Masyarakat Dusun Slegrengan Kulon
            </h2>

            <p class="text-gray-600 max-w-3xl">
                Halaman ini menampilkan daftar usaha masyarakat, produk lokal, makanan,
                kerajinan, hasil pertanian, serta layanan jasa yang ada di Dusun Slegrengan Kulon.
            </p>
        </div>

        <!-- Search & Filter -->
        <form action="{{ route('umkm.index') }}" method="GET" class="grid md:grid-cols-4 gap-4 mb-10">
            <div class="md:col-span-2">
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Cari nama produk atau usaha..."
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-600"
                >
            </div>

            <div>
                <select
                    name="category"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-600"
                >
                    <option value="">Semua Kategori</option>

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ (string) ($categoryId ?? '') === (string) $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-green-700 text-white px-4 py-3 rounded-xl font-semibold hover:bg-green-800 transition"
                >
                    Cari Produk
                </button>
            </div>
        </form>

        <!-- Category Badge -->
        <div class="flex flex-wrap gap-3 mb-10">
            <a
                href="{{ route('umkm.index') }}"
                class="px-4 py-2 rounded-lg text-sm font-medium transition
                {{ empty($categoryId) ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700 hover:bg-green-100 hover:text-green-700' }}"
            >
                Semua Produk
            </a>

            @foreach ($categories as $category)
                <a
                    href="{{ route('umkm.index', ['category' => $category->id]) }}"
                    class="px-4 py-2 rounded-lg text-sm font-medium transition
                    {{ (string) ($categoryId ?? '') === (string) $category->id ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700 hover:bg-green-100 hover:text-green-700' }}"
                >
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- Produk Grid -->
        @if ($umkms->count() > 0)
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @foreach ($umkms as $umkm)
                    @php
                        $description = strip_tags($umkm->description ?? '');

                        $waNumber = preg_replace('/[^0-9]/', '', $umkm->whatsapp_number ?? '');

                        if (str_starts_with($waNumber, '0')) {
                            $waNumber = '62' . substr($waNumber, 1);
                        }

                        $waText = urlencode('Halo, saya tertarik dengan ' . $umkm->business_name);
                    @endphp

                    <div class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">

                        <!-- Foto Produk -->
                        <div class="h-48 bg-green-100 flex items-center justify-center overflow-hidden">
                            @if ($umkm->image)
                                <img
                                    src="{{ asset('storage/' . $umkm->image) }}"
                                    alt="{{ $umkm->business_name }}"
                                    class="w-full h-full object-cover hover:scale-105 transition duration-300"
                                >
                            @else
                                <span class="text-green-800 font-semibold">
                                    Foto Produk
                                </span>
                            @endif
                        </div>

                        <div class="p-5">
                            <div class="flex justify-between items-start gap-2 mb-3">
                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold">
                                    {{ $umkm->category->name ?? 'UMKM' }}
                                </span>

                                <span class="text-sm text-gray-500">
                                    {{ $umkm->status === 'active' ? 'Tersedia' : 'Tidak Aktif' }}
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 mb-2">
                                {{ $umkm->business_name }}
                            </h3>

                            @if ($description)
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    {{ \Illuminate\Support\Str::limit($description, 110) }}
                                </p>
                            @endif

                            @if ($umkm->price)
                                <p class="text-green-700 font-bold text-lg mb-3">
                                    Rp {{ number_format($umkm->price, 0, ',', '.') }}
                                </p>
                            @endif

                            <div class="border-t pt-4 text-sm text-gray-600 mb-4 space-y-1">
                                @if ($umkm->owner_name)
                                    <p>
                                        <span class="font-semibold">Pemilik:</span>
                                        {{ $umkm->owner_name }}
                                    </p>
                                @endif

                                @if ($umkm->address)
                                    <p>
                                        <span class="font-semibold">Lokasi:</span>
                                        {{ $umkm->address }}
                                    </p>
                                @endif
                            </div>

                            <div class="space-y-2">
                                @if ($waNumber)
                                    <a
                                        href="https://wa.me/{{ $waNumber }}?text={{ $waText }}"
                                        target="_blank"
                                        class="block bg-green-700 text-white text-center py-3 rounded-xl font-semibold hover:bg-green-800 transition"
                                    >
                                        Pesan via WhatsApp
                                    </a>
                                @endif

                                @if ($umkm->link)
                                    <a
                                        href="{{ $umkm->link }}"
                                        target="_blank"
                                        class="block border border-green-700 text-green-700 text-center py-3 rounded-xl font-semibold hover:bg-green-50 transition"
                                    >
                                        Lihat Lokasi / Detail
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $umkms->links() }}
            </div>
        @else
            <div class="text-center py-16 bg-gray-50 border rounded-2xl">
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    Belum ada produk UMKM
                </h3>
                <p class="text-gray-600">
                    Data produk akan tampil setelah admin menambahkan produk dan mengaktifkan visibility.
                </p>
            </div>
        @endif

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
                    <a
                        href="/kontak"
                        class="inline-block bg-green-700 text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-800 transition"
                    >
                        Hubungi Pengelola Website
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection