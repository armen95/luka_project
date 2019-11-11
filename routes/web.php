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

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
})->middleware('auth');

Route::group(['middleware'=>['web']], function(){

	Route::group(['middleware'=>['auth']], function(){

		Route::prefix('user')->group(function () {

			Route::group(['middleware' => 'user'], function(){

				Route::get('/profile', 'UsersController@index');

			});

		});

		Route::prefix('admin')->group(function () {

			Route::group(['middleware' => 'admin'], function(){

				Route::get('/profile', 'AdminController@index');
				Route::get('/settings', 'AdminController@settings');
				Route::post('/editAccount', 'AdminController@editAccount');

				// Freelancers
				Route::get('/freelancers', 'AdminController@showFreelancers');
				Route::get('/addfreelancer', 'AdminController@addFreelancer');
				Route::get('/viewFreelancer/{freelancer_id}', 'AdminController@viewFreelancer');
				Route::post('/getFreelancer', 'AdminController@getFreelancer');
				Route::post('/saveFreelancer', 'AdminController@saveFreelancer');
				Route::post('/editFreelancer', 'AdminController@editFreelancer');
				Route::post('/deleteFreelancer', 'AdminController@deleteFreelancer');

				// Clients
				Route::get('/clients', 'AdminController@showClients');
				Route::get('/addclient', 'AdminController@addClient');
				Route::get('/viewClient/{client_id}', 'AdminController@viewClient');
				Route::post('/saveClient', 'AdminController@saveClient');
				Route::post('/deleteClient', 'AdminController@deleteClient');
				Route::post('/editClient', 'AdminController@editClient');
				Route::post('/getClient', 'AdminController@getClient');

				// Orders
				Route::get('/orders', 'AdminController@showOrders');
				Route::get('/addorder', 'AdminController@addOrder');
				Route::get('/viewOrder/{order_id}', 'AdminController@viewOrder');
				Route::post('/saveOrder', 'AdminController@saveOrder');
				Route::post('/deleteOrder', 'AdminController@deleteOrder');
				Route::post('/deleteOrderFreelancers', 'AdminController@deleteOrderFreelancers');
				Route::post('/getOrder', 'AdminController@getOrder');
				Route::post('/editOrder', 'AdminController@editOrder');


			});

		});

	});


});

Route::get('/signup', 'Auth\RegisterController@index')->name('signup');
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/user/login', 'Auth\LoginController@login');
Route::post('/user/signup', 'Auth\RegisterController@signup');
Route::get('/logout', 'Auth\LoginController@logout');

Route::fallback(function(){
    return response()->view('errors404', [], 404);
});


