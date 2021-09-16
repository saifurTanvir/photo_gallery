<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Product\ProductController; 
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CompanyManageController;

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
Route::get('/company/{company_id}/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/company/{company_id}/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/company/{company_id}/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product_id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{product_id}/update', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/{product_id}/show', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{product_id}/delete', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/{product_id}/make_active', [ProductController::class, 'make_active'])->name('product.make_active');
Route::get('/product/{product_id}/make_inactive', [ProductController::class, 'make_inactive'])->name('product.make_inactive');

// product_search
Route::post('/company/{company_id}/product/search/product_name', [ProductController::class, 'searchByProductName'])->name('product.search.product_name');
Route::post('/company/{company_id}/product/search/category', [ProductController::class, 'searchByCategory'])->name('product.search.category');
Route::post('/company/{company_id}/product/search/subcategory', [ProductController::class, 'searchBySubcategory'])->name('product.search.subcategory');
Route::post('/company/{company_id}/product/search/shop_name', [ProductController::class, 'searchByShopName'])->name('product.search.shop_name');

// category
Route::get('/company/{company_id}/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/company/{company_id}/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/company/{company_id}/category/{category_id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/company/{company_id}/category/{category_id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/company/{company_id}/category/{category_id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/company/{company_id}/category/{category_id}/make_active', [CategoryController::class, 'make_active'])->name('category.make_active');
Route::get('/company/{company_id}/category/{category_id}/make_inactive', [CategoryController::class, 'make_inactive'])->name('category.make_inactive');

// subcategory
Route::get('/subcategory', [SubcategoryController::class, 'index'])->name('subcategory.index');

// shop
Route::get('/company/{company_id}/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/company/{company_id}/shop/create', [ShopController::class, 'create'])->name('shop.create');
Route::post('/company/{company_id}/shop/store', [ShopController::class, 'store'])->name('shop.store');
Route::get('/company/{company_id}/shop/{shop_id}/edit', [ShopController::class, 'edit'])->name('shop.edit');
Route::post('/company/{company_id}/shop/{shop_id}/update', [ShopController::class, 'update'])->name('shop.update');
Route::get('/company/{company_id}/shop/{shop_id}/delete', [ShopController::class, 'delete'])->name('shop.delete');
Route::get('/company/{company_id}/shop/{shop_id}/make_active', [ShopController::class, 'make_active'])->name('shop.make_active');
Route::get('/company/{company_id}/shop/{shop_id}/make_inactive', [ShopController::class, 'make_inactive'])->name('shop.make_inactive');

// company_control
Route::get('/company/{company_id}/index', [CompanyManageController::class, 'index'])->name('company.manage.index');
Route::get('/company/{company_id}/shop/{shop_id}/products', [CompanyManageController::class, 'product_list_by_shop_name'])->name('product_list_by_shop_name');
Route::get('/company/{company_id}/category/{category_id}/products', [CompanyManageController::class, 'product_list_by_category'])->name('product_list_by_category');
Route::get('/company/{company_id}/products', [CompanyManageController::class, 'product_list_by_company'])->name('product_list_by_company');






