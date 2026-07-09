<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/profil-dusun', function () {
    return view('profil-dusun');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/berita/{slug}', function ($slug) {
    return view('detail-berita', compact('slug'));
});

Route::get('/umkm', function () {
    return view('umkm');
});
