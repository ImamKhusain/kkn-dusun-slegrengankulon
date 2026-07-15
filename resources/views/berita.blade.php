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
                    <div class="flex flex-wrap items-center gap-3">
                        @if (!empty($categorySlug))
                            <a href="{{ route('berita.index') }}" class="text-gray-500 hover:text-red-600 text-xl">
                                ×
                            </a>
                        @endif

                        <a
                            href="{{ route('berita.index') }}"
                            class="px-4 py-2 rounded-lg text-sm font-medium transition
                            {{ empty($categorySlug) ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700 hover:bg-green-100 hover:text-green-700' }}"
                        >
                            Semua Berita
                        </a>

                        @foreach ($categories as $category)
                            <a
                                href="{{ route('berita.index', ['category' => $category->slug]) }}"
                                class="px-4 py-2 rounded-lg text-sm font-medium transition
                                {{ ($categorySlug ?? '') === $category->slug ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700 hover:bg-green-100 hover:text-green-700' }}"
                            >
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>

                    <div class="flex gap-6 text-sm font-medium">
                        <a
                            href="{{ route('berita.index', array_merge(request()->except('sort'), ['sort' => 'latest'])) }}"
                            class="{{ ($sort ?? 'latest') === 'latest' ? 'text-green-700 border-b-2 border-green-700 pb-2' : 'text-gray-600 hover:text-green-700 pb-2' }}"
                        >
                            Latest
                        </a>

                        <a
                            href="{{ route('berita.index', array_merge(request()->except('sort'), ['sort' => 'oldest'])) }}"
                            class="{{ ($sort ?? '') === 'oldest' ? 'text-green-700 border-b-2 border-green-700 pb-2' : 'text-gray-600 hover:text-green-700 pb-2' }}"
                        >
                            Oldest
                        </a>
                    </div>
                </div>

                <!-- List Berita Dinamis -->
                @if ($posts->count() > 0)
                    <div class="space-y-8">
                        @foreach ($posts as $post)
                            @php
                                $description = $post->meta_description;

                                if (!$description && is_array($post->content)) {
                                    foreach ($post->content as $block) {
                                        if (($block['type'] ?? '') === 'paragraph') {
                                            $description = strip_tags($block['data']['content'] ?? '');
                                            break;
                                        }
                                    }
                                }

                                $tags = is_array($post->tags) ? $post->tags : [];
                            @endphp

                            <article class="grid md:grid-cols-3 gap-6 border-b pb-8">
                                <a href="{{ route('berita.show', $post->slug) }}">
                                    <div class="h-48 md:h-40 bg-green-200 rounded-xl flex items-center justify-center overflow-hidden">
                                        @if ($post->thumbnail)
                                            <img
                                                src="{{ asset('storage/' . $post->thumbnail) }}"
                                                alt="{{ $post->title }}"
                                                class="w-full h-full object-cover hover:scale-105 transition duration-300"
                                            >
                                        @else
                                            <span class="text-green-800 font-semibold">
                                                Foto Kegiatan
                                            </span>
                                        @endif
                                    </div>
                                </a>

                                <div class="md:col-span-2">
                                    <p class="text-sm text-green-700 font-semibold uppercase mb-2">
                                        {{ $post->category->name ?? 'Berita Dusun' }}
                                    </p>

                                    <a href="{{ route('berita.show', $post->slug) }}">
                                        <h3 class="text-2xl font-bold text-gray-900 mb-3 hover:text-green-700 cursor-pointer">
                                            {{ $post->title }}
                                        </h3>
                                    </a>

                                    <p class="text-gray-600 leading-relaxed mb-4">
                                        {{ \Illuminate\Support\Str::limit($description ?? 'Belum ada ringkasan berita.', 160) }}
                                    </p>

                                    <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                                        <span>
                                            {{ optional($post->published_at)->translatedFormat('d F Y') ?? $post->created_at->translatedFormat('d F Y') }}
                                        </span>
                                        <span>•</span>
                                        <span>{{ $post->author_name ?? 'Admin Dusun' }}</span>
                                    </div>

                                    @if (count($tags) > 0)
                                        <div class="flex flex-wrap gap-2 mt-4">
                                            @foreach ($tags as $tag)
                                                <span class="bg-gray-100 px-3 py-1 rounded-md text-sm">
                                                    #{{ ltrim($tag, '#') }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <a
                                        href="{{ route('berita.show', $post->slug) }}"
                                        class="inline-block mt-5 text-green-700 font-semibold hover:underline"
                                    >
                                        Baca Selengkapnya →
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-16 bg-gray-50 border rounded-2xl">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Belum ada berita
                        </h3>
                        <p class="text-gray-600">
                            Berita akan tampil setelah admin menambahkan post dan mengaktifkan visibility.
                        </p>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <aside class="space-y-6">

                <!-- Search -->
                <form action="{{ route('berita.index') }}" method="GET" class="bg-white border rounded-2xl p-5 shadow-sm">
                    @if (!empty($categorySlug))
                        <input type="hidden" name="category" value="{{ $categorySlug }}">
                    @endif

                    @if (!empty($sort))
                        <input type="hidden" name="sort" value="{{ $sort }}">
                    @endif

                    <div class="relative">
                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="search"
                            class="w-full border rounded-xl py-3 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-green-600"
                        >
                        <span class="absolute left-3 top-3 text-gray-400">🔍</span>
                    </div>
                </form>

                <!-- Recommended Topics -->
                <div class="bg-white border rounded-2xl p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Recommended Topics
                        </h3>
                        <span>⌃</span>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($categories as $category)
                            <a
                                href="{{ route('berita.index', ['category' => $category->slug]) }}"
                                class="bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm hover:bg-green-200 transition"
                            >
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Category -->
                <div class="bg-white border rounded-2xl p-5 shadow-sm">
                    <h3 class="font-bold text-gray-900 uppercase mb-5">
                        Category
                    </h3>

                    <div class="space-y-4">
                        @foreach ($categories as $category)
                            <a
                                href="{{ route('berita.index', ['category' => $category->slug]) }}"
                                class="h-24 rounded-xl bg-gradient-to-r from-green-700 to-green-400 flex items-center justify-center text-white font-bold hover:opacity-90 transition"
                            >
                                {{ $category->name }}
                            </a>
                        @endforeach
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