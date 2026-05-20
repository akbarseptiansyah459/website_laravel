<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES - All Users (Admin & Customer)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Product Detail
    Route::get('/detail/{id}', [HomeController::class, 'detail'])
        ->name('detail');

    /*
    |--------------------------------------------------------------------------
    | CART
    |--------------------------------------------------------------------------
    */

    Route::post('/add-to-cart/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::put('/cart/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{id}', [CartController::class, 'destroy'])
        ->name('cart.destroy');

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */

    Route::get('/checkout', function () {
        $carts = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('cart.checkout', compact('carts'));
    })->name('checkout.form');

    Route::post('/checkout', [CartController::class, 'checkout'])
        ->name('checkout');

    /*
    |--------------------------------------------------------------------------
    | ORDER
    |--------------------------------------------------------------------------
    */

    Route::get('/orders', [OrderController::class, 'orders'])
        ->name('orders');

    Route::get('/history', [OrderController::class, 'history'])
        ->name('history');

    Route::get('/invoice/{id}', [OrderController::class, 'invoice'])
        ->name('invoice');

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/my-profile', [ProfileController::class, 'index'])
        ->name('my.profile');

    Route::post('/my-profile', [ProfileController::class, 'updateProfile'])
        ->name('my.profile.update');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD REDIRECT (DIPERBAIKI)
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect('/');
    })->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES - Only Admin Users
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', function () {
        $totalProducts = \App\Models\Product::count();
        $totalOrders = \App\Models\Order::count();
        $totalUsers = \App\Models\User::where('role', 'pelanggan')->count();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalUsers'
        ));
    })->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PRODUCT MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource('products', ProductController::class);

    /*
    |--------------------------------------------------------------------------
    | ORDER MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/orders', [OrderController::class, 'admin'])
        ->name('admin.orders');

    Route::get('/admin/orders/{id}', [OrderController::class, 'show'])
        ->name('admin.orders.show');

    Route::post('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])
        ->name('admin.orders.status');

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/customers', [OrderController::class, 'customers'])
        ->name('admin.customers');

    Route::put('/admin/customers/{id}/reset', [OrderController::class, 'resetPassword'])
        ->name('admin.customers.reset');

    /*
    |--------------------------------------------------------------------------
    | ADMIN PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES (from auth.php)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
