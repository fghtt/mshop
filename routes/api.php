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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    #Admin
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        #Category
        Route::group(['namespace' => 'Category\Api', 'prefix' => 'category'], function () {
            Route::get('/', IndexController::class)->name('admin.category.index');
            Route::patch('/{ProductsCategory}', UpdateController::class)->name('admin.category.update');
        });
    });
});
