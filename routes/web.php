<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PaintingController;
use App\Http\Controllers\User\PaintingController as UserPaintingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\Admin\BlogController;
use App\Models\Painting;
use App\Models\Blog;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/terms-and-conditions', function () {
    return view('term');
});

Route::get('/privacy-policy', function () {
    return view('privacy');
});

// contact page
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/blogs', [UserBlogController::class, 'index'])->name('myblogs.index');
Route::get('/blogs/{slug}', [UserBlogController::class, 'show'])->name('blog.show');


Route::get('/collection', [UserPaintingController::class, 'index'])->name('collection.index');
Route::get('/collection/{slug}', [UserPaintingController::class, 'show'])->name('collection.show');
Route::get('/collection/{slug}/enquiry', [UserPaintingController::class, 'enquiry'])->name('enquiry.painting');
Route::post('/collection/{slug}/enquiry', [UserPaintingController::class, 'sendEnquiry'])->name('enquiry.painting.send');



// Admin login routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Protected admin routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/myart', [AdminController::class, 'myArt'])->name('admin.myart');

    Route::get('/admin/myart/add-new-art', [AdminController::class, 'addNewArt'])->name('admin.myart.add');
    Route::post('/admin/myart/store-new-art', [PaintingController::class, 'store'])->name('admin.myart.store');
    Route::delete('/admin/myart/delete-myart/{id}', [PaintingController::class, 'destroy'])->name('admin.myart.destroy');
    Route::get('/admin/myart/edit/{id}', [PaintingController::class, 'edit'])->name('admin.myart.edit');
    Route::post('/admin/myart/update/{id}', [PaintingController::class, 'update'])->name('admin.myart.update');
    Route::post('/admin/myart/delete-image/{id}', [PaintingController::class, 'deleteImage'])->name('admin.myart.delete-image');

    Route::get('/admin/myblog', [BlogController::class, 'index'])->name('admin.myblog');
    Route::get('/admin/myblog/create', [BlogController::class, 'create'])->name('admin.myblog.create');
    Route::post('/admin/myblog/store', [BlogController::class, 'store'])->name('admin.myblog.store');
    Route::get('/admin/myblog/edit/{blog}', [BlogController::class, 'edit'])->name('admin.myblog.edit');
    Route::put('/admin/myblog/update/{blog}', [BlogController::class, 'update'])->name('admin.myblog.update');
    Route::delete('/admin/myblog/destroy/{blog}', [BlogController::class, 'destroy'])->name('admin.myblog.destroy');

    Route::patch('/admin/blogs/{id}/toggle-featured', [BlogController::class, 'toggleFeatured'])->name('admin.blog.toggleFeatured');

    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});





use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;

Route::get('/sitemap.xml', function () {

    $staticUrls = [
        [
            'loc' => url('/'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '1.0'
        ],
        [
            'loc' => url('/about'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.8'
        ],
        [
            'loc' => url('/contact'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.8'
        ],
        [
            'loc' => url('/collection'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '0.9'
        ],
        [
            'loc' => url('/blogs'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '0.9'
        ],
        [
            'loc' => url('/terms-and-conditions'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'yearly',
            'priority' => '0.5'
        ],
        [
            'loc' => url('/privacy-policy'),
            'lastmod' => now()->toAtomString(),
            'changefreq' => 'yearly',
            'priority' => '0.5'
        ],
    ];

    // ----- Dynamic Paintings -----
    $paintingUrls = Painting::where('status', 'public')->get()->map(function ($painting) {
        return [
            'loc' => url('/collection/' . $painting->slug),
            'lastmod' => $painting->updated_at->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.7'
        ];
    })->toArray();

    // ----- Dynamic Blogs -----
    $blogUrls = Blog::all()->map(function ($blog) {
        return [
            'loc' => url('/blogs/' . $blog->slug),
            'lastmod' => $blog->updated_at->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.7'
        ];
    })->toArray();


    // Merge all
    $urls = array_merge($staticUrls, $paintingUrls, $blogUrls);

    $xml = view('sitemap', ['urls' => $urls]);

    return Response::make($xml, 200)->header('Content-Type', 'application/xml');
});
