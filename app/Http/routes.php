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

/*Route::get('/', ['middleware' => 'auth', function() {
    return view('welcome');
}]);*/
Route::get('/', function () {
    return view('welcome');
});

// authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Current user routes
Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::resource('posts', 'PostController');
    Route::resource('profile', 'UserProfileController');
    Route::resource('settings', 'UserController');
});

// sub-domain
Route::group(['domain' => '{city}.classifieds.local'], function () {
    Route::get('/index', function ($city) {
        return $city;
    });
});

// test route
Route::get('test', function () {
    return "success";
});