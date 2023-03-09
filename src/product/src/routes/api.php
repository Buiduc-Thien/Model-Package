<?php

use Illuminate\Support\Facades\Route;
use ModelsPackage\Laravel\Product\Http\Controllers\Api\Admin\ProductController;

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

Route::group(['prefix' => 'api'], function () {
    Route::get('/admin/products/{sizeName}', [ProductController::class, 'getProductBySizeName']);
    Route::get('/admin/products', [ProductController::class, 'getProducts']);
    Route::post('/admin/products/create', [ProductController::class, 'createProduct']);
});
