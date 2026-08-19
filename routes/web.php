<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('sitemap.xml', function () {
    return response()->view('sitemap', [
        'lastmod' => date('Y-m-d', (int) filemtime(resource_path('views/welcome.blade.php'))),
    ])->header('Content-Type', 'application/xml');
});

Route::get('robots.txt', function () {
    return response()->view('robots', [
        'sitemapUrl' => url('/sitemap.xml'),
    ])->header('Content-Type', 'text/plain');
});

Route::view('stati', 'articles.index', ['article' => null])->name('articles.index');

foreach ((array) config('landing.articles') as $slug => $article) {
    $slug = (string) $slug;
    Route::view('stati/'.$slug, 'articles.'.$slug, [
        'article' => $article,
    ])->name('articles.'.$slug);
}

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
