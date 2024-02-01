<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\GetProducts;
use App\Http\Controllers\Products\CreateProduct;
use App\Http\Controllers\Products\UpdateProduct;
use App\Http\Controllers\Products\ShowProduct;
use App\Http\Controllers\Products\DeleteProduct;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('products')->group(function () {
    Route::get('/', GetProducts::class);

    Route::post('/', CreateProduct::class);

    Route::get('/show/{product}', ShowProduct::class);

    Route::post('/update/{product}', UpdateProduct::class);

    Route::delete('/delete/{id}', DeleteProduct::class);
});

