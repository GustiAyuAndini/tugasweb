<?php
use App\Http\Controllers\HotelController;
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

Route::get('/', function () {
    return view('home');
})->name('utama');

Route::group(['middleware=>auth'], function() {
//CRUD untuk hotel
Route:: get('hotel', [HotelController::class, 'index'])->middleware('auth');
Route:: get('tambah', [HotelController::class, 'create'])->name('create.hotel')->middleware('auth');
Route:: post('simpan-toko', [HotelController::class, 'store']);
Route:: delete('delete-hotel/{id}', [HotelController::class, 'destroy'])->name('delete.hotel');
Route:: get('edit-hotel/{id}', [HotelController::class, 'edit'])->name('edit.hotel');
Route:: patch('update-hotel/{hotel}', [HotelController::class, 'update'])->name('update.hotel');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
