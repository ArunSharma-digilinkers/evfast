<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CheckoutController;


Route::get('/', [PagesController::class, 'index']);
Route::get('about-us', [PagesController::class, 'about']);
Route::get('contact-us', [PagesController::class, 'contact']);
Route::get('portable-ev-chargers', [PagesController::class, 'portableevchargers']);
Route::get('wall-mount-ev-chargers', [PagesController::class, 'wallmount']);
Route::get('ac-chargers', [PagesController::class, 'acchargers']);
Route::get('dc-chargers', [PagesController::class, 'dcchargers']);
Route::get('gun-holders', [PagesController::class, 'gunholders']);
Route::get('accessories', [PagesController::class, 'accessories']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
     Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
    Route::post('orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

// Single product page
Route::get('/product/{id}', [FrontProductController::class, 'show'])->name('product.show');

/* ADMIN ROUTES */
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

    });

/* USER ROUTES */
Route::prefix('user')
    ->middleware(['auth', 'role:user'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard');

    });

Route::post('/cart/add/{slug}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update/{slug}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{slug}', [CartController::class, 'remove'])->name('cart.remove');




Route::middleware('auth')->group(function () {

    // Show checkout page
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout');

    // Place order
    Route::post('/checkout', [CheckoutController::class, 'placeOrder'])
        ->name('checkout.place');

});



require __DIR__.'/auth.php';