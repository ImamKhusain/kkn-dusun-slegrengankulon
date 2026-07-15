<?php

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Umkm;
use App\Models\UmkmCategory;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestPosts = Post::with('category')
        ->where('is_visible', true)
        ->where('status', 'published')
        ->latest('published_at')
        ->limit(3)
        ->get();

    $latestUmkms = Umkm::with('category')
        ->where('is_visible', true)
        ->where('status', 'active')
        ->latest()
        ->limit(4)
        ->get();

    return view('home', compact('latestPosts', 'latestUmkms'));
})->name('home');

Route::get('/profil-dusun', function () {
    $profile = VillageProfile::where('is_visible', true)
        ->latest()
        ->first();

    return view('profil-dusun', compact('profile'));
});

Route::get('/berita', function (Request $request) {
    $search = $request->query('search');
    $categorySlug = $request->query('category');
    $sort = $request->query('sort', 'latest');

    $categories = PostCategory::orderBy('name', 'asc')->get();

    $posts = Post::with('category')
        ->where('is_visible', true)
        ->where('status', 'published')
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('author_name', 'like', '%' . $search . '%')
                    ->orWhere('meta_description', 'like', '%' . $search . '%');
            });
        })
        ->when($categorySlug, function ($query) use ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        })
        ->when($sort === 'oldest', function ($query) {
            $query->oldest('published_at');
        }, function ($query) {
            $query->latest('published_at');
        })
        ->paginate(6)
        ->withQueryString();

    return view('berita', compact(
        'posts',
        'categories',
        'search',
        'categorySlug',
        'sort'
    ));
})->name('berita.index');

Route::get('/berita/{slug}', function ($slug) {
    $post = Post::with('category')
        ->where('slug', $slug)
        ->where('is_visible', true)
        ->where('status', 'published')
        ->firstOrFail();

    $latestPosts = Post::with('category')
        ->where('id', '!=', $post->id)
        ->where('is_visible', true)
        ->where('status', 'published')
        ->latest('published_at')
        ->limit(3)
        ->get();

    return view('detail-berita', compact('post', 'latestPosts'));
})->name('berita.show');

Route::get('/umkm', function (Request $request) {
    $search = $request->query('search');
    $categoryId = $request->query('category');

    $categories = UmkmCategory::orderBy('name', 'asc')->get();

    $umkms = Umkm::with('category')
        ->where('is_visible', true)
        ->where('status', 'active')
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('business_name', 'like', '%' . $search . '%')
                    ->orWhere('owner_name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%');
            });
        })
        ->when($categoryId, function ($query) use ($categoryId) {
            $query->where('umkm_category_id', $categoryId);
        })
        ->latest()
        ->paginate(8)
        ->withQueryString();

    return view('umkm', compact(
        'umkms',
        'categories',
        'search',
        'categoryId'
    ));
})->name('umkm.index');