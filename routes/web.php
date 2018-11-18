<?php

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
Auth::routes();

Route::get('/', function () { return view('frontend.index'); })->name('home');
Route::get('/bs', function () { return view('frontend.bestseller'); })->name('bs');
Route::get('/np', function () { return view('frontend.newproduct'); })->name('np');
Route::get('/ap', function () { return view('frontend.allproduct'); })->name('ap');
Route::get('/about', function () { return view('frontend.about'); })->name('about');
Route::get('/testimoni', function () { return view('frontend.testimoni'); })->name('testimoni');
Route::get('/signup', function () { return view('frontend.signup'); })->name('signup');
Route::get('/contact', function () { return view('frontend.contact'); })->name('contact');

Route::get('/login', 'AuthCustomer\LoginController@showLoginForm')->name('customer.login');
Route::post('/login', 'AuthCustomer\LoginController@login')->name('customer.login.submit');
Route::get('/logout', 'AuthCustomer\LoginController@logoutCustomer')->name('customer.logout');
Route::post('/signup', 'AuthCustomer\RegisterController@register')->name('customer.signup.submit');
Route::post('/storeContact', 'NoAuthController@storeContact')->name('customer.contact.submit');

Route::group(['prefix' => 'home'], function(){
	Route::get('/', 'CustomerhomeController@index')->name('customer.home');
	Route::get('/bs', 'CustomerhomeController@bs')->name('bs.home');
	Route::get('/np', 'CustomerhomeController@np')->name('np.home');
	Route::get('/ap', 'CustomerhomeController@ap')->name('ap.home');
	Route::get('/about', 'CustomerhomeController@about')->name('about.home');
	Route::get('/testimoni', 'CustomerhomeController@testimoni')->name('testimoni.home');
	Route::get('/contact', 'CustomerhomeController@contact')->name('contact.home');
	Route::resource('/profil','CustomerhomeController');

});

Route::group(['prefix' => 'adminstok'], function(){
	Route::get('/', 'AdminstokController@index')->name('adminstok.home');
	Route::get('/login', 'AuthAdminstok\LoginController@showLoginForm')->name('adminstok.login');
	Route::post('/login', 'AuthAdminstok\LoginController@login')->name('adminstok.login.submit');
	Route::get('/logout', 'AuthAdminstok\LoginController@logoutAdminstok')->name('adminstok.logout');
	Route::post('/store', 'AdminstokController@store');
	Route::get('/show', 'AdminstokController@show');
	
});

Route::group(['prefix' => 'backend'], function(){
	Route::get('/', 'UserhomeController@index')->name('backend.home');
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('backend.login');
	Route::post('/login', 'Auth\LoginController@login')->name('backend.login.submit');
	Route::get('/logout', 'Auth\LoginController@logoutAdmin')->name('backend.logout');


	Route::resource('/bajubatik','KemejaController');
	Route::get('/bajubatikjs','KemejaController@json')->name('backend.bajubatikjs');

	Route::resource('/stokbajubatik','DetailKemejaController');
	Route::get('/stokbajubatikjs','DetailKemejaController@json')->name('backend.stokbajubatikjs');

	Route::resource('/kain','KainController');
	Route::get('/kainjs','KainController@json')->name('backend.kainjs');

	Route::resource('/stokkain','DetailKainController');
	Route::get('/stokkainjs','DetailKainController@json')->name('backend.stokkainjs');

	Route::resource('/user','UserController');
	Route::get('/userjs','UserController@json')->name('backend.userjs');

	Route::resource('/customer','CustomerController');
	Route::get('/customerjs','CustomerController@json')->name('backend.customerjs');

	Route::resource('/pesan','PesanController');
	Route::get('/pesanjs','PesanController@json')->name('backend.pesanjs');
	
});