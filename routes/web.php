<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::resource('products', ShopController::class);


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/product/{id}', 'show')->name('product.show');
    Route::get('/category/{id}', 'showCategory')->name('category.show');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::get('/store/{id}', 'store')->name('cart.store');
    Route::patch('/update', 'update')->name('cart.update');
    Route::delete('/delete', 'delete')->name('cart.delete');
    Route::get('/checkout', 'checkout')->name('cart.checkout');
    Route::post('/order', 'order')->name('cart.order');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

Route::prefix('admin/banners')->controller(BannerController::class)->group(function () {
    Route::get('/', 'index')->name('admin.banner.index');
    Route::get('/create', 'create')->name('admin.banner.create');
    Route::post('/store', 'store')->name('admin.banner.store');
    Route::get('/{id}', 'show')->name('admin.banner.edit');
    Route::post('/update/{id}', 'update')->name('admin.banner.update');
    Route::delete('/delete/{id}', 'delete')->name('admin.banner.delete');
});

Route::prefix('admin/products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('admin.product.index');
    Route::get('/create', 'create')->name('admin.product.create');
    Route::post('/store', 'store')->name('admin.product.store');
    Route::get('/{id}', 'show')->name('admin.product.edit');
    Route::post('/update/{id}', 'update')->name('admin.product.update');
    Route::delete('/delete/{id}', 'delete')->name('admin.product.delete');
});

Route::prefix('admin/brands')->controller(BrandController::class)->group(function () {
    Route::get('/', 'index')->name('admin.brand.index');
    Route::get('/create', 'create')->name('admin.brand.create');
    Route::post('/store', 'store')->name('admin.brand.store');
    Route::get('/{id}', 'show')->name('admin.brand.edit');
    Route::post('/update/{id}', 'update')->name('admin.brand.update');
    Route::delete('/delete/{id}', 'delete')->name('admin.brand.delete');
});

Route::prefix('admin/categories')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('admin.category.index');
    Route::get('/create', 'create')->name('admin.category.create');
    Route::post('/store', 'store')->name('admin.category.store');
    Route::get('/{id}', 'show')->name('admin.category.edit');
    Route::post('/update/{id}', 'update')->name('admin.category.update');
    Route::delete('/delete/{id}', 'delete')->name('admin.category.delete');
});

Route::prefix('admin/orders')->controller(OrderController::class)->group(function () {
    Route::get('/', 'index')->name('admin.order.index');
    Route::get('/create', 'create')->name('admin.order.create');
    Route::post('/store', 'store')->name('admin.order.store');
    Route::get('/{id}', 'show')->name('admin.order.edit');
    Route::post('/update/{id}', 'update')->name('admin.order.update');
    Route::delete('/delete/{id}', 'delete')->name('admin.order.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('user.index');
    Route::get('/orders', 'order')->name('user.order.index');
    Route::get('/{id}', 'detail')->name('user.order.detail');
});

require __DIR__.'/auth.php';
