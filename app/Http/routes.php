<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/', ['middleware' => 'auth', function () {
    $states = App\Location::select('state', 'county')->get()->groupBy('state');
    return view('locations.index', compact('states'));
}]);

Route::get('/products', [
    'middleware' => 'auth',
    'as' => 'products',
    'uses' => 'ProductsController@index'
]);
