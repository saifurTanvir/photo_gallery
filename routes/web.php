<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Product\ProductController;


Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/login', [LoginController::class, 'login'])->name('login');

// photo-gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery_id}/allImages', [GalleryController::class, 'allImages'])->name('gallery.allImages');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
Route::post('/gallery/{gallery_id}/image/store', [GalleryController::class, 'store_image'])->name('gallery.store_image');

// client
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{id}/delete', [ClientController::class, 'delete'])->name('client.delete');

// product
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product_id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{product_id}/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/{product_id}/show', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{product_id}/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/{product_id}/make_active', [ProductController::class, 'make_active'])->name('product.make_active');
Route::get('/product/{product_id}/make_inactive', [ProductController::class, 'make_inactive'])->name('product.make_inactive');
Route::post('/product/search', [ProductController::class, 'product_search'])->name('product.search');







