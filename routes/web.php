<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', MainController::class)->name('main');

    #Admin
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' =>['auth', 'admin']], function () {
        Route::get('/', AdminController::class)->name('admin');

        #ProductsCategory
        Route::group(['namespace' => 'ProductsCategory', 'prefix' => 'products-category'], function () {
            Route::get('/', IndexController::class)->name('admin.products_category.index');
            Route::get('/create', CreateController::class)->name('admin.products_category.create');
            Route::post('/', StoreController::class)->name('admin.products_category.store');
            Route::get('/edit/{id}', EditController::class)->name('admin.products_category.edit');
            Route::patch('/{id}', UpdateController::class)->name('admin.products_category.update');
        });

        #Products
        Route::group(['namespace' => 'Product', 'prefix' => 'products'], function () {
            Route::get('/', IndexController::class)->name('admin.product.index');
            Route::get('/create', CreateController::class)->name('admin.product.create');
            Route::post('/', StoreController::class)->name('admin.product.store');
            Route::get('/edit/{id}', EditController::class)->name('admin.product.edit');
            Route::patch('/{id}', UpdateController::class)->name('admin.product.update');
        });

        #Orders
        Route::group(['namespace' => 'Order', 'prefix' => 'orders'], function () {
            Route::get('/', IndexController::class)->name('admin.order.index');
            Route::get('/create', CreateController::class)->name('admin.order.create');
            Route::post('/', StoreController::class)->name('admin.order.store');
            Route::get('/edit/{id}', EditController::class)->name('admin.order.edit');
            Route::patch('/{id}', UpdateController::class)->name('admin.order.update');
        });

        #User
        Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
            Route::get('/', IndexController::class)->name('admin.user.index');
            Route::get('/create', CreateController::class)->name('admin.user.create');
            Route::post('/', StoreController::class)->name('admin.user.store');
        });
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
