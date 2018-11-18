<?php

use App\Kemeja;
use App\Kain;
use App\User;
use App\Customer;
use App\Pesan;
use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('bajubatikjs', function() {
	return Kemeja::all();
})->name('api.bajubatikjs');
Route::get('bajubatikjs/bs', function() {
	return Kemeja::where('kategori', '=', '1')->get();
})->name('api.bajubatikjs.bs');
Route::get('bajubatikjs/np', function() {
	return Kemeja::where('kategori', '=', '2')->get();
})->name('api.bajubatikjs.np');

Route::get('stokbajubatikjs', function() {
	return Kemeja::all();
})->name('api.stokbajubatikjs');
Route::get('kainjs', function() {
	return Kain::all();
})->name('api.kainjs');
Route::get('stokkainjs', function() {
	return Kain::all();
})->name('api.stokkainjs');
Route::get('userjs', function() {
	return User::all();
})->name('api.userjs');
Route::get('customerjs', function() {
	return Customer::all();
})->name('api.customerjs');
Route::get('pesanjs', function() {
	return Pesan::all();
})->name('api.pesanjs');

