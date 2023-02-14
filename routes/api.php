<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    #ProductsCategory
    Route::group(['namespace' => 'ProductsCategory', 'prefix' => 'products-category'], function () {
        Route::get('/', IndexController::class);
        Route::patch('/{ProductsCategory}', UpdateController::class)
            ->name('admin.products_category.api.update');
        Route::delete('/{ProductsCategory}', DeleteController::class)
            ->name('admin.products_category.delete');
    });

    #Products
    Route::group(['namespace' => 'Product', 'prefix' => 'products'], function () {
        Route::get('/', IndexController::class)->name('api.product.index');
        Route::patch('/{Product}', UpdateController::class)->name('api.product.update');
        Route::delete('/{Product}', DeleteController::class)->name('api.product.delete');
        Route::post('/search', SearchController::class)->name('api.product.search');
    });

    #Orders
    Route::group(['namespace' => 'Order', 'prefix' => 'orders'], function () {
        Route::get('/', IndexController::class)->name('api.order.index');
        Route::patch('/{Order}', UpdateController::class)->name('api.order.update');
        Route::post('/{Order}', StoreController::class)->name('api.order.store');
        Route::delete('/{Order}', DeleteController::class)->name('api.order.delete');
    });

    #User
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', IndexController::class);
    });

});
