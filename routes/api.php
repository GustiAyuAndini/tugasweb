<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AuthController;
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

Route::get('password', function(){
    return bcrypt('andini');
});

Route::get('v1/customers', [CustomerController::class, 'index']);
Route::get('v1/customers/{id}', [CustomerController::class, 'show']);
Route::group(['prefix'=> 'v1'], function(){

    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('customers/{id}', [CustomerController::class, 'show']);
    Route::post('customers', [CustomerController::class, 'store']);
    Route::patch('customers/{id}', [CustomerController::class, 'update']);
    Route::delete('customers/{id}', [CustomerController::class, 'delete']);

});


Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('products', [ProductController::class, 'store']);
Route::patch('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'delete']);

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    Route::post('login', [\App\Http\Controllers\API\AuthController:: class, 'login']);
    Route::post('logout', [\App\Http\Controllers\API\AuthController:: class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\API\AuthController:: class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\API\AuthController:: class, 'me']);

});