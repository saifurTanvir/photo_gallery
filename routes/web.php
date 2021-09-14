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
Route::get('/client/{client_id}/make_active', [ClientController::class, 'make_active'])->name('client.make_active');
Route::get('/client/{client_id}/make_inactive', [ClientController::class, 'make_inactive'])->name('client.make_inactive');
Route::get('/client/{client_id}/edit', [ClientController::class, 'edit'])->name('client.edit');
Route::post('/client/{client_id}/update', [ClientController::class, 'update'])->name('client.update');

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

//product_search
// Route::post('/product/combined_search', [ProductController::class, 'combined_search'])->name('product.combinedSearch');
Route::post('/product/search/product_name', [ProductController::class, 'searchByProductName'])->name('product.search.product_name');
Route::post('/product/search/category', [ProductController::class, 'searchByCategory'])->name('product.search.category');
Route::post('/product/search/subcategory', [ProductController::class, 'searchBySubcategory'])->name('product.search.subcategory');
Route::post('/product/search/shop_name', [ProductController::class, 'searchByShopName'])->name('product.search.shop_name');







