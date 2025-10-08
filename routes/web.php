<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PaintingController;

Route::get('/', function () {
    return view('home');
});

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
    
    Route::get('/admin/myblog', [AdminController::class, 'myBlog'])->name('admin.myblog');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
