@extends('layouts.app')

@section('title', 'Berita Dusun - Slegrengan Kulon')

@section('content')

<!-- Header Background -->
<section class="h-64 bg-gradient-to-r from-green-800 via-green-700 to-green-500 relative">
    <div class="absolute inset-0 bg-black/20"></div>

    <div class="max-w-7xl mx-auto px-6 h-full flex items-center relative z-10">
        <!-- <div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Halaman Berita Dusun
            </h1>
        </div> -->
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
                <div class="border-y py-4 mb-8">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">

                        <!-- Filter kategori aktif -->
                        @if (!empty($categorySlug))
                            @php
                                $activeCategory = $categories->firstWhere('slug', $categorySlug);
                            @endphp

                            <div class="flex flex-wrap items-center gap-3">
                                <a
                                    href="{{ route('berita.index', request()->except(['category', 'page'])) }}"
                                    class="text-gray-500 hover:text-red-600 text-xl leading-none"
                                    title="Hapus filter kategori"
                                >
                                    ×
                                </a>

                                <span class="px-4 py-2 rounded-lg text-sm font-medium bg-green-100 text-green-700">
                                    {{ $activeCategory->name ?? 'Kategori Dipilih' }}
                                </span>
                            </div>
                        @endif

                        <!-- Sorting kanan -->
                        <div class="flex items-center gap-6 text-sm font-medium md:ml-auto">
                            <a
                                href="{{ route('berita.index', array_merge(request()->except(['sort', 'page']), ['sort' => 'latest'])) }}"
                                class="sort-tab {{ ($sort ?? 'latest') === 'latest' ? 'sort-tab-active' : 'text-gray-600 hover:text-green-700' }}"
                            >
                                Latest
                            </a>

                            <a
                                href="{{ route('berita.index', array_merge(request()->except(['sort', 'page']), ['sort' => 'oldest'])) }}"
                                class="sort-tab {{ ($sort ?? '') === 'oldest' ? 'sort-tab-active' : 'text-gray-600 hover:text-green-700' }}"
                            >
                                Oldest
                            </a>
                        </div>
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
                            placeholder="Cari berita..."
                            class="w-full border rounded-xl py-3 px-4 pl-11 focus:outline-none focus:ring-2 focus:ring-green-600"
                        >

                        <svg
                            class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6.05 6.05a7.5 7.5 0 0 0 10.6 10.6Z"
                            />
                        </svg>
                    </div>
                </form>

                <!-- Recommended Topics -->
                <div class="bg-white border rounded-2xl p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Recommended Topics
                        </h3>

                        <span class="text-gray-600">⌃</span>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($categories as $category)
                            <a
                                href="{{ route('berita.index', array_merge(request()->except(['category', 'page']), ['category' => $category->slug])) }}"
                                class="px-3 py-2 rounded-lg text-sm transition
                                {{ ($categorySlug ?? '') === $category->slug
                                    ? 'bg-green-700 text-white'
                                    : 'bg-green-100 text-green-700 hover:bg-green-200' }}"
                            >
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<style>
    .sort-tab {
        position: relative;
        display: inline-block;
        line-height: 1;
        padding-bottom: 10px;
    }

    .sort-tab-active {
        color: #15803d;
        font-weight: 600;
    }

    .sort-tab-active::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background-color: #1f2937;
        border-radius: 1px;
    }
</style>

@endsection