<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;


Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery_id}/allImages', [GalleryController::class, 'allImages'])->name('gallery.allImages');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
Route::post('/gallery/{gallery_id}/image/store', [GalleryController::class, 'store_image'])->name('gallery.store_image');




