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
				Route::get('/freelancers', 'AdminController@showFreelancers');
				Route::get('/addfreelancer', 'AdminController@addFreelancer');
				Route::get('/settings', 'AdminController@settings');
				Route::post('/saveFreelancer', 'AdminController@saveFreelancer');
				Route::post('/deleteFreelancer', 'AdminController@deleteFreelancer');
				Route::post('/getFreelancer', 'AdminController@getFreelancer');
				Route::post('/editFreelancer', 'AdminController@editFreelancer');
				Route::post('/editAccount', 'AdminController@editAccount');
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


