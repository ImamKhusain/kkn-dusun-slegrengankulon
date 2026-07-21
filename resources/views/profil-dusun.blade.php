@extends('layouts.app')

@section('title', 'Profil Dusun - Dusun Slegrengan Kulon')

@section('content')

@php
    $profile = $profile ?? null;

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

    /**
     * Membuat link WhatsApp dari nomor kontak.
     * Contoh:
     * 089669337474  -> 6289669337474
     * +6289669337474 -> 6289669337474
     */
    $waLink = '#';
    $waMessage = 'Halo, saya ingin menghubungi pengurus Dusun Slegrengan Kulon.';

    if (!empty($profile?->contact)) {
        $phone = preg_replace('/[^0-9]/', '', $profile->contact);

        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        } elseif (str_starts_with($phone, '8')) {
            $phone = '62' . $phone;
        }

        if (!empty($phone)) {
            $waLink = 'https://wa.me/' . $phone . '?' . http_build_query([
                'text' => $waMessage,
            ]);
        }
    }

    /**
     * Render content builder blocks: heading, paragraph, image.
     * Gambar dibuat lebih kecil dan stabil agar tidak memenuhi card.
     */
    $renderBlocks = function ($blocks) use ($mediaUrl) {
        if (!is_array($blocks) || empty($blocks)) {
            return '';
        }

        $html = '';

        foreach ($blocks as $block) {
            $type = $block['type'] ?? null;
            $data = $block['data'] ?? [];

            if ($type === 'heading') {
                $level = $data['level'] ?? ($block['level'] ?? 'h2');
                $content = e($data['content'] ?? ($block['content'] ?? ''));

                $classes = match ($level) {
                    'h1' => 'text-3xl font-bold text-gray-900 mb-4 text-center',
                    'h2' => 'text-2xl font-bold text-gray-900 mb-4 text-center',
                    'h3' => 'text-xl font-bold text-gray-900 mb-3 text-center',
                    'h4' => 'text-lg font-bold text-gray-900 mb-3 text-center',
                    default => 'text-2xl font-bold text-gray-900 mb-4 text-center',
                };

                $html .= "<{$level} class=\"{$classes}\">{$content}</{$level}>";
            }

            if ($type === 'paragraph') {
                $content = $data['content'] ?? ($block['content'] ?? '');

                $html .= '
                    <div class="text-gray-700 text-base md:text-lg leading-relaxed mb-5 text-justify prose max-w-none">
                        ' . $content . '
                    </div>
                ';
            }

            if ($type === 'image') {
                $imageUrl = $mediaUrl($data['image'] ?? ($block['image'] ?? null));
                $alt = e($data['alt'] ?? ($block['alt'] ?? 'Gambar'));

                if ($imageUrl) {
                    $html .= '
                        <figure class="my-6 flex flex-col items-center">
                            <img
                                src="' . $imageUrl . '"
                                alt="' . $alt . '"
                                class="w-full max-w-[300px] md:max-w-[360px] max-h-[420px] object-contain rounded-xl border border-gray-100 shadow-sm"
                            />
                    ';

                    if (!empty($data['alt']) || !empty($block['alt'])) {
                        $html .= '
                            <figcaption class="text-xs text-gray-500 mt-3 text-center">
                                ' . $alt . '
                            </figcaption>
                        ';
                    }

                    $html .= '</figure>';
                }
            }
        }

        return $html;
    };

    $profilePhotoUrl = $mediaUrl($profile?->photo);
    $mapPhotoUrl = $mediaUrl($profile?->map_photo);
    $headPhotoUrl = $mediaUrl($profile?->head_photo);
    $youthPhotoUrl = $mediaUrl($profile?->youth_photo);
@endphp

<section class="bg-gray-100 min-h-screen py-14">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Breadcrumb -->
        <div class="flex items-center text-sm text-gray-500 mb-8">
            <a href="/" class="hover:text-green-700">Home</a>
            <span class="mx-3">›</span>
            <span class="text-gray-700">Profil Dusun</span>
        </div>

        @if ($profile)
            <div class="grid lg:grid-cols-4 gap-8 items-start">

                <!-- Sidebar Kiri -->
                <aside class="lg:col-span-1">
                    <div class="bg-green-900 text-white rounded-2xl p-6 shadow-lg sticky top-24">
                        <h2 class="text-2xl font-bold mb-6 uppercase">
                            Tentang Dusun
                        </h2>

                        <div class="space-y-2">
                            <button
                                onclick="showSection('profil', this)"
                                class="menu-btn active-menu w-full flex justify-between items-center text-left px-4 py-4 rounded-lg border-b border-green-700 hover:bg-green-800 transition"
                            >
                                <span>{{ $profile->title ?? 'Profil Dusun' }}</span>
                                <span>→</span>
                            </button>

                            <button
                                onclick="showSection('ketua-dusun', this)"
                                class="menu-btn w-full flex justify-between items-center text-left px-4 py-4 rounded-lg border-b border-green-700 hover:bg-green-800 transition"
                            >
                                <span>Ketua Dusun</span>
                                <span>→</span>
                            </button>

                            <button
                                onclick="showSection('karang-taruna', this)"
                                class="menu-btn w-full flex justify-between items-center text-left px-4 py-4 rounded-lg border-b border-green-700 hover:bg-green-800 transition"
                            >
                                <span>Ketua Karang Taruna</span>
                                <span>→</span>
                            </button>

                            <button
                                onclick="showSection('peta-dusun', this)"
                                class="menu-btn w-full flex justify-between items-center text-left px-4 py-4 rounded-lg hover:bg-green-800 transition"
                            >
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
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">
                                {{ $profile->title ?? 'Profil Dusun' }}
                            </h1>

                            @if ($profilePhotoUrl)
                                <div class="flex justify-center mb-8">
                                    <img
                                        src="{{ $profilePhotoUrl }}"
                                        alt="{{ $profile->title ?? 'Foto Dusun' }}"
                                        class="w-full max-w-[220px] max-h-[160px] object-contain rounded-xl"
                                    />
                                </div>
                            @endif

                            @if (is_array($profile->content) && count($profile->content) > 0)
                                {!! $renderBlocks($profile->content) !!}
                            @else
                                <p class="text-gray-500 text-center italic">
                                    Belum ada konten profil dusun.
                                </p>
                            @endif
                        </div>

                        <!-- Ketua Dusun -->
                        <div id="ketua-dusun" class="content-section hidden">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-5 text-center">
                                Ketua Dusun
                            </h1>

                            @if ($profile->head_name)
                                <h2 class="text-xl md:text-2xl font-bold text-center text-green-700 mb-6">
                                    {{ $profile->head_name }}
                                </h2>
                            @endif

                            @if ($headPhotoUrl)
                                <div class="flex justify-center mb-6">
                                    <img
                                        src="{{ $headPhotoUrl }}"
                                        alt="Foto Ketua Dusun"
                                        class="w-full max-w-[260px] md:max-w-[320px] max-h-[380px] object-contain rounded-xl border border-gray-100 shadow-sm"
                                    />
                                </div>
                            @endif

                            @if (is_array($profile->head_content) && count($profile->head_content) > 0)
                                {!! $renderBlocks($profile->head_content) !!}
                            @else
                                <p class="text-gray-500 text-center italic">
                                    Belum ada konten ketua dusun.
                                </p>
                            @endif
                        </div>

                        <!-- Ketua Karang Taruna -->
                        <div id="karang-taruna" class="content-section hidden">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-5 text-center">
                                Ketua Karang Taruna
                            </h1>

                            @if ($profile->youth_head_name)
                                <h2 class="text-xl md:text-2xl font-bold text-center text-green-700 mb-6">
                                    {{ $profile->youth_head_name }}
                                </h2>
                            @endif

                            @if ($youthPhotoUrl)
                                <div class="flex justify-center mb-6">
                                    <img
                                        src="{{ $youthPhotoUrl }}"
                                        alt="Foto Ketua Karang Taruna"
                                        class="w-full max-w-[260px] md:max-w-[320px] max-h-[380px] object-contain rounded-xl border border-gray-100 shadow-sm"
                                    />
                                </div>
                            @endif

                            @if (is_array($profile->youth_content) && count($profile->youth_content) > 0)
                                {!! $renderBlocks($profile->youth_content) !!}
                            @else
                                <p class="text-gray-500 text-center italic">
                                    Belum ada konten ketua karang taruna.
                                </p>
                            @endif
                        </div>

                        <!-- Peta Dusun -->
                        <div id="peta-dusun" class="content-section hidden">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">
                                {{ $profile->map_title ?? 'Peta Dusun' }}
                            </h1>

                            @if ($mapPhotoUrl)
                                <div class="w-full mb-6">
                                    @if ($profile->map_link)
                                        <a href="{{ $profile->map_link }}" target="_blank" class="block">
                                            <img
                                                src="{{ $mapPhotoUrl }}"
                                                alt="Peta Dusun"
                                                class="w-full rounded-2xl shadow-md hover:shadow-lg transition"
                                            />
                                        </a>
                                    @else
                                        <img
                                            src="{{ $mapPhotoUrl }}"
                                            alt="Peta Dusun"
                                            class="w-full rounded-2xl shadow-md"
                                        />
                                    @endif
                                </div>
                            @endif

                            @if ($profile->map_link)
                                <div class="mb-6 text-center">
                                    <a
                                        href="{{ $profile->map_link }}"
                                        target="_blank"
                                        class="inline-flex items-center gap-2 text-green-700 font-semibold hover:underline"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>

                                        Buka di Google Maps
                                    </a>
                                </div>
                            @endif

                            @if (is_array($profile->map_content) && count($profile->map_content) > 0)
                                {!! $renderBlocks($profile->map_content) !!}
                            @else
                                <p class="text-gray-500 text-center italic">
                                    Belum ada konten peta dusun.
                                </p>
                            @endif
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
                                <p>{{ $profile->village_name ?? 'Belum diisi' }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="font-semibold text-green-700">Lokasi</p>
                                <p>{{ $profile->location ?? 'Belum diisi' }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="font-semibold text-green-700">Ketua Dusun</p>
                                <p>{{ $profile->head_name ?? 'Belum diisi' }}</p>
                            </div>

                            <div class="border-b pb-3">
                                <p class="font-semibold text-green-700">Ketua Karang Taruna</p>
                                <p>{{ $profile->youth_head_name ?? 'Belum diisi' }}</p>
                            </div>

                            <div>
                                <p class="font-semibold text-green-700">Kontak</p>
                                <p>{{ $profile->contact ?? 'Belum diisi' }}</p>
                            </div>
                        </div>

                        <a
                            href="{{ $waLink }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-6 inline-block w-full text-center bg-green-700 text-white py-3 rounded-lg font-semibold hover:bg-green-800 transition"
                        >
                            Hubungi Pengurus
                        </a>
                    </div>
                </aside>

            </div>
        @else
            <div class="bg-white rounded-2xl shadow-lg p-10 text-center">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">
                    Profil Dusun
                </h1>

                <p class="text-gray-600 text-lg">
                    Data profil dusun belum tersedia. Silakan tambahkan melalui halaman admin.
                </p>
            </div>
        @endif

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

        const activeSection = document.getElementById(sectionId);

        if (activeSection) {
            activeSection.classList.remove('hidden');
        }

        const buttons = document.querySelectorAll('.menu-btn');
        buttons.forEach(btn => btn.classList.remove('active-menu'));

        button.classList.add('active-menu');
    }
</script>

@endsection