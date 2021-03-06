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

Route::get('/', 'PagesController@index');

Route::get('blade','PagesController@blade');

Route::get('users/create', ['uses' => 'UsersController@create']);
Route::post('users', ['uses' => 'UsersController@store']);
// Route::get('users', function(){
// 	$users = [
// 		'0' => [
// 			'first_name'	=> 'Ahmed',
// 			'last_name'		=> 'Mostafa',
// 			'location'		=>'Egypt'
// 		],
// 		'1' => [
// 			'first_name'	=> 'Mai',
// 			'last_name'		=> 'Omran',
// 			'location'		=>'Tunisia'
// 		]
// 	];
// 	return $users;
// });
Auth::routes();

Route::group(['middleware' => 'authenticated'], function(){
	
	Route::get('profile', 'PagesController@profile');

	Route::get('settings', 'PagesController@settings');

	Route::get('users', 'UsersController@index');
});

Route::get('/home', 'HomeController@index');
