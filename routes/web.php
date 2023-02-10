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

        #Category
        Route::group(['namespace' => 'ProductsCategory', 'prefix' => 'products-category'], function () {
            Route::get('/', IndexController::class)->name('admin.category.index');
            Route::get('/create', CreateController::class)->name('admin.category.create');
            Route::post('/', StoreController::class)->name('admin.category.store');
            Route::get('/edit/{id}', EditController::class)->name('admin.category.edit');
            Route::patch('/{ProductsCategory}', UpdateController::class)->name('admin.category.update');
        });

        #Products
        Route::group(['namespace' => 'Products', 'prefix' => 'products'], function () {
            Route::get('/', IndexController::class)->name('admin.product.index');
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
