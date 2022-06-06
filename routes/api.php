<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ProductController;

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

Route::get('v1/customers', [CustomerController::class, 'index']);

Route::get('v1/customers/{id}', [CustomerController::class, 'index']);
Route::get('v1/customers/{id}', [CustomerController::class, 'show']);

//crud products
Route::get('/products', [ProductController:: class, 'index'])->name('products.index');
Route::post('/products', [ProductController:: class, 'store'])->name('products.store');
Route::get('/products/{products}', [ProductController:: class, 'show'])->name('products.show');
Route::patch('/products/{products}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{products}', [ProductController:: class, 'destroy'])->name('products.destroy'); 