@extends('layouts.app')

@section('title', $post->title . ' - Dusun Slegrengan Kulon')

@section('content')

@php
    $normalizeMediaPath = function ($value) {
        if (is_array($value)) {
            $value = reset($value);
        }

        if (empty($value) || !is_string($value)) {
            return null;
        }

        $value = trim(str_replace('\\', '/', $value));
        $value = ltrim($value, '/');

        if (\Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])) {
            return $value;
        }

        if (\Illuminate\Support\Str::startsWith($value, 'public/')) {
            $value = substr($value, strlen('public/'));
        }

        return $value;
    };

    $mediaUrl = function ($value) use ($normalizeMediaPath) {
        $path = $normalizeMediaPath($value);

        if (!$path) {
            return null;
        }

        if (\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (\Illuminate\Support\Str::startsWith($path, 'storage/')) {
            return asset($path);
        }

        return asset('storage/' . $path);
    };

    $contentBlocks = is_array($post->content) ? $post->content : [];

    $thumbnailPath = $normalizeMediaPath($post->thumbnail);
    $thumbnailUrl = $mediaUrl($thumbnailPath);

    /*
        Jika thumbnail kosong, ambil image pertama dari content sebagai gambar utama.
    */
    if (!$thumbnailUrl) {
        foreach ($contentBlocks as $block) {
            $type = $block['type'] ?? null;
            $data = $block['data'] ?? [];

            if ($type === 'image') {
                $firstImage = $data['image'] ?? ($block['image'] ?? null);

                if ($firstImage) {
                    $thumbnailPath = $normalizeMediaPath($firstImage);
                    $thumbnailUrl = $mediaUrl($firstImage);
                    break;
                }
            }
        }
    }

    /*
        Supaya gambar tidak dobel:
        Kalau thumbnail sudah ada, image pertama dari builder content akan dilewati.
    */
    $firstContentImageSkipped = false;
@endphp

<section class="bg-white min-h-screen">
    <div class="max-w-7xl mx-auto px-6 py-5">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-12">
            <a href="/" class="hover:text-green-700 font-medium">
                Home
            </a>

            <span class="text-gray-400">›</span>

            <a href="{{ route('berita.index') }}" class="hover:text-green-700 font-medium">
                News
            </a>

            <span class="text-gray-400">›</span>

            <span class="text-gray-700">
                {{ \Illuminate\Support\Str::limit($post->title, 40) }}
            </span>
        </div>

        {{-- Header Artikel --}}
        <div class="text-center max-w-4xl mx-auto mb-16">
            <p class="uppercase tracking-wide text-gray-700 font-semibold mb-5">
                {{ $post->category->name ?? 'BERITA DUSUN' }}
            </p>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-6">
                {{ $post->title }}
            </h1>

            <p class="text-gray-600">
                Publish
                {{ optional($post->published_at)->translatedFormat('d F Y, H:i') ?? $post->created_at->translatedFormat('d F Y, H:i') }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

            {{-- Artikel Utama --}}
            <main class="lg:col-span-9">

                {{-- Meta Penulis --}}
                <div class="border-y border-gray-200 py-4 mb-8 flex items-center justify-between text-gray-600 text-base">
                    <div>
                        Oleh:
                        <span class="font-semibold text-gray-800">
                            {{ $post->author_name ?? 'Admin Dusun' }}
                        </span>

                        <span class="mx-2">|</span>

                        <span>1 min read</span>
                    </div>

                    <div class="hidden md:flex items-center gap-2 text-gray-500">
                        <span>
                            {{ optional($post->published_at)->diffForHumans() ?? $post->created_at->diffForHumans() }}
                        </span>

                        <svg
                            class="h-5 w-5 text-gray-400"
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
                                d="M12 6v6l4 2m6-2a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z"
                            />
                        </svg>
                    </div>
                </div>

                {{-- Judul Artikel Body --}}
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight mb-8">
                    {{ $post->title }}
                </h2>

                {{-- Thumbnail Utama --}}
                @if ($thumbnailUrl)
                    <div class="mb-10">
                        <img
                            src="{{ $thumbnailUrl }}"
                            alt="{{ $post->title }}"
                            class="w-full max-h-[560px] object-cover"
                        >
                    </div>
                @else
                    <div class="mb-10 h-[360px] bg-green-100 flex items-center justify-center text-green-700 font-semibold">
                        Thumbnail belum tersedia
                    </div>
                @endif

                {{-- Isi Artikel --}}
                <div class="text-gray-700 text-lg leading-relaxed space-y-7">
                    @forelse ($contentBlocks as $block)
                        @php
                            $type = $block['type'] ?? null;
                            $data = $block['data'] ?? [];

                            $headingContent = $data['content'] ?? ($block['content'] ?? '');
                            $headingLevel = $data['level'] ?? ($block['level'] ?? 'h2');

                            $paragraphContent = $data['content'] ?? ($block['content'] ?? '');

                            $imagePath = $data['image'] ?? ($block['image'] ?? null);
                            $imageAlt = $data['alt'] ?? ($block['alt'] ?? $post->title);
                            $imageUrl = $mediaUrl($imagePath);

                            $headingContentText = trim(strtolower(strip_tags($headingContent)));
                            $postTitleText = trim(strtolower(strip_tags($post->title)));

                            $isDuplicateTitle = $headingContentText === $postTitleText;

                            $skipThisImage = false;

                            if ($type === 'image' && $thumbnailUrl && !$firstContentImageSkipped) {
                                $skipThisImage = true;
                                $firstContentImageSkipped = true;
                            }
                        @endphp

                        {{-- Heading --}}
                        @if ($type === 'heading' && !$isDuplicateTitle)
                            @if ($headingLevel === 'h1')
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-10 mb-5">
                                    {{ $headingContent }}
                                </h1>
                            @elseif ($headingLevel === 'h2')
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-10 mb-5">
                                    {{ $headingContent }}
                                </h2>
                            @elseif ($headingLevel === 'h3')
                                <h3 class="text-xl md:text-2xl font-bold text-gray-900 mt-8 mb-4">
                                    {{ $headingContent }}
                                </h3>
                            @else
                                <h4 class="text-lg md:text-xl font-bold text-gray-900 mt-8 mb-3">
                                    {{ $headingContent }}
                                </h4>
                            @endif
                        @endif

                        {{-- Paragraph --}}
                        @if ($type === 'paragraph')
                            <div class="text-gray-700 leading-relaxed text-lg">
                                {!! $paragraphContent !!}
                            </div>
                        @endif

                        {{-- Image Content --}}
                        @if ($type === 'image' && !$skipThisImage)
                            @if ($imageUrl)
                                <figure class="my-8">
                                    <img
                                        src="{{ $imageUrl }}"
                                        alt="{{ $imageAlt }}"
                                        class="w-full object-cover"
                                    >

                                    @if (!empty($imageAlt))
                                        <figcaption class="text-center text-xs text-gray-500 mt-3">
                                            {{ $imageAlt }}
                                        </figcaption>
                                    @endif
                                </figure>
                            @endif
                        @endif

                    @empty
                        @if (!empty($post->meta_description))
                            <p class="text-gray-700 leading-relaxed text-lg">
                                {{ $post->meta_description }}
                            </p>
                        @else
                            <p class="text-gray-500">
                                Isi berita belum tersedia.
                            </p>
                        @endif
                    @endforelse
                </div>

                {{-- Tags dan Statistik --}}
                <div class="border-t border-gray-200 mt-12 pt-5 flex flex-col md:flex-row md:items-center md:justify-between gap-5">
                    <div class="flex flex-wrap gap-3">
                        @if (is_array($post->tags) && count($post->tags) > 0)
                            @foreach ($post->tags as $tag)
                                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded text-sm font-medium">
                                    #{{ ltrim($tag, '#') }}
                                </span>
                            @endforeach
                        @endif
                    </div>

                    <div class="flex items-center gap-5 text-gray-600">
                        <div class="flex items-center gap-2">
                            <svg
                                class="h-5 w-5 text-gray-500"
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
                                    d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 15.25a3.25 3.25 0 1 0 0-6.5 3.25 3.25 0 0 0 0 6.5Z"
                                />
                            </svg>

                            <span>127</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg
                                class="h-5 w-5 text-gray-500"
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
                                    d="M21 8.25c0-2.35-1.9-4.25-4.25-4.25-1.4 0-2.65.68-3.42 1.73L12 7.5l-1.33-1.77A4.24 4.24 0 0 0 7.25 4C4.9 4 3 5.9 3 8.25c0 6.25 9 11.25 9 11.25s9-5 9-11.25Z"
                                />
                            </svg>

                            <span>0</span>
                        </div>
                    </div>
                </div>

                {{-- Tombol Kembali --}}
                <div class="mt-10">
                    <a
                        href="{{ route('berita.index') }}"
                        class="inline-block bg-green-700 text-white px-5 py-3 rounded font-semibold hover:bg-green-800 transition"
                    >
                        ← Kembali ke Berita
                    </a>
                </div>
            </main>

            {{-- Sidebar Berita Lainnya --}}
            <aside class="lg:col-span-3">
                <div class="border border-gray-200 rounded-lg p-5 sticky top-24">
                    <h3 class="text-2xl font-bold text-gray-900 mb-5">
                        Berita Lainnya
                    </h3>

                    @if ($latestPosts->count() > 0)
                        <div class="space-y-5">
                            @foreach ($latestPosts as $latest)
                                @php
                                    $latestThumbnailUrl = $mediaUrl($latest->thumbnail);
                                @endphp

                                <a
                                    href="{{ route('berita.show', $latest->slug) }}"
                                    class="flex gap-3 group"
                                >
                                    <div class="w-24 h-20 bg-green-100 overflow-hidden flex-shrink-0">
                                        @if ($latestThumbnailUrl)
                                            <img
                                                src="{{ $latestThumbnailUrl }}"
                                                alt="{{ $latest->title }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                            >
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-xs text-green-700 font-semibold">
                                                Foto
                                            </div>
                                        @endif
                                    </div>

                                    <div class="min-w-0">
                                        <h4 class="text-sm font-bold text-gray-900 leading-snug line-clamp-3 group-hover:text-green-700 transition">
                                            {{ \Illuminate\Support\Str::limit($latest->title, 55) }}
                                        </h4>

                                        <p class="text-xs text-gray-500 mt-2">
                                            Read in 1 minutes
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500">
                            Belum ada berita lainnya.
                        </p>
                    @endif
                </div>
            </aside>

        </div>
    </div>
</section>

@endsection