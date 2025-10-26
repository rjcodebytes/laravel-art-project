<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PaintingController;
use App\Http\Controllers\User\PaintingController as UserPaintingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

// contact page
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/gallery', function () {
    return view('gallery');
});


Route::get('/my-blogs', [BlogController::class, 'index'])->name('myblogs.index');

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


    Route::get('/admin/myblog', [AdminController::class, 'myBlog'])->name('admin.myblog');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
