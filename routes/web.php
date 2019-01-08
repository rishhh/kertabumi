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
Route::get('/contact', function () { return view('frontend.contact'); })->name('contact');
Route::get('/signup', function () { return view('frontend.signup'); })->name('signup');
Route::get('/login', 'AuthCustomer\LoginController@showLoginForm')->name('customer.login');
Route::post('/login', 'AuthCustomer\LoginController@login')->name('customer.login.submit');
Route::get('/logout', 'AuthCustomer\LoginController@logoutCustomer')->name('customer.logout');
Route::post('/signup', 'AuthCustomer\RegisterController@register')->name('customer.signup.submit');
Route::post('/storeContact', 'NoAuthController@storeContact')->name('customer.contact.submit');
Route::resource('/detailProduct', 'NoAuthController');
Route::get('/testimoni', 'NoAuthController@testimoni')->name('testimoni');

Route::group(['prefix' => 'home'], function(){
	Route::get('/', 'CustomerhomeController@index')->name('customer.home');
	Route::get('/bs', 'CustomerhomeController@bs')->name('bs.home');
	Route::get('/np', 'CustomerhomeController@np')->name('np.home');
	Route::get('/ap', 'CustomerhomeController@ap')->name('ap.home');
	Route::get('/about', 'CustomerhomeController@about')->name('about.home');
	Route::get('/testimoni', 'CustomerhomeController@testimoni')->name('testimoni.home');
	Route::get('/contact', 'CustomerhomeController@contact')->name('contact.home');
	Route::get('/profil/{profil}','CustomerhomeController@profilshow')->name('profil.home');
	Route::get('/profil/{profil}/edit','CustomerhomeController@profiledit')->name('profil.edit.home');
	Route::patch('/profil/{profil}','CustomerhomeController@profilupdate')->name('profil.edit.home.submit');
	Route::resource('/detailProduct','CustomerhomeController');
	Route::get('/pesan', 'CustomerhomeController@pesan')->name('pesan.home');
	Route::get('/{cust}/cart', 'CustomerhomeController@cart')->name('cart.home');
	Route::post('/{cust}/cart', 'CustomerhomeController@store');
	Route::get('/cart/{cart}', 'CustomerhomeController@cartdestroy')->name('cart.destroy');
	Route::get('/{cust}/checkout', 'CustomerhomeController@checkout')->name('checkout.home');
	Route::get('/{cust}/bayar', 'CustomerhomeController@bayar')->name('bayar.home');
	Route::post('/{bayar}/bayar', 'CustomerhomeController@bayarstore');
	Route::get('/{trx}/trx', 'CustomerhomeController@trx')->name('trx.home');
	Route::get('/trx/{trx}/changestatus', 'CustomerhomeController@changestatus');
	Route::get('/trx/{idtrx}/detail', 'CustomerhomeController@detailtrx')->name('detailtrx.home');

});

Route::group(['prefix' => 'adminstok'], function(){
	Route::get('/', 'AdminstokController@index')->name('adminstok.home');
	Route::get('/login', 'AuthAdminstok\LoginController@showLoginForm')->name('adminstok.login');
	Route::post('/login', 'AuthAdminstok\LoginController@login')->name('adminstok.login.submit');
	Route::get('/logout', 'AuthAdminstok\LoginController@logoutAdminstok')->name('adminstok.logout');
	Route::post('/store', 'AdminstokController@store');
	Route::get('/show', 'AdminstokController@show');
	Route::resource('/stokbajubatik','DetailKemejaController');
	Route::get('/stokbajubatik/{stokbajubatik}/edit2','DetailKemejaController@edit2')->name('stokbajubatik.edit2');
	Route::get('/stokbajubatik/{stokbajubatik}/edit3','DetailKemejaController@edit3')->name('stokbajubatik.edit3');
	Route::get('/stokbajubatik/{stokbajubatik}/edit4','DetailKemejaController@edit4')->name('stokbajubatik.edit4');
	Route::get('/stokbajubatikjs','DetailKemejaController@dataTable')->name('backend.stokbajubatikjs');
	Route::resource('/stokkain','DetailKainController');
	Route::get('/stokkainjs','DetailKainController@dataTable')->name('backend.stokkainjs');
	Route::get('/profil/{profil}','AdminstokController@profilshow')->name('profil.adminstok');
	Route::get('/profil/{profil}/edit','AdminstokController@profiledit')->name('profil.edit.adminstok');
	Route::patch('/profil/{profil}','AdminstokController@profilupdate')->name('profil.adminstok.submit');
});

Route::group(['prefix' => 'backend'], function(){
	Route::get('/', 'UserhomeController@index')->name('backend.home');
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('backend.login');
	Route::post('/login', 'Auth\LoginController@login')->name('backend.login.submit');
	Route::get('/logout', 'Auth\LoginController@logoutAdmin')->name('backend.logout');
	Route::resource('/bajubatik','KemejaController');
	Route::get('/bajubatikjs','KemejaController@json')->name('backend.bajubatikjs');
	Route::resource('/kain','KainController');
	Route::get('/kainjs','KainController@json')->name('backend.kainjs');
	Route::resource('/user','UserController');
	Route::get('/userjs','UserController@json')->name('backend.userjs');
	Route::resource('/customer','CustomerController');
	Route::get('/customerjs','CustomerController@json')->name('backend.customerjs');
	Route::resource('/pesan','PesanController');
	Route::get('/pesanjs','PesanController@json')->name('backend.pesanjs');
	Route::get('/transaksi','TransaksiController@index')->name('transaksi.index');
	Route::get('/transaksi/{transaksi}','TransaksiController@show')->name('transaksi.show');
	Route::delete('/transaksi/{transaksi}','TransaksiController@destroy')->name('transaksi.destroy');
	Route::get('/transaksijs','TransaksiController@json')->name('backend.transaksijs');
	Route::get('/transaksi/{transaksi}/changestatus', 'TransaksiController@changestatus');
	Route::get('/keranjang','KeranjangController@index')->name('keranjang.index');
	Route::delete('/keranjang/{keranjang}','KeranjangController@destroy')->name('keranjang.destroy');
	Route::get('/keranjangjs','KeranjangController@json')->name('backend.keranjangjs');
	Route::get('/testimoni', 'UserhomeController@indextesti')->name('testimoni.index');
	Route::post('/testimoni/store', 'UserhomeController@store')->name('testimoni.store');
	Route::delete('/testimoni/{testimoni}', 'UserhomeController@destroy')->name('testimoni.destroy');
	Route::get('/testimonijs', 'UserhomeController@json')->name('backend.testimonijs');
});