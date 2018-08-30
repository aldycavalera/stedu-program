<?php

use Illuminate\Support\Facades\Auth;

$userId = Auth::id();

Route::get('/', function () {
  if ( Auth::id() ) {
    return view('home');
  }
    return view('/auth/login');
});

Route::get('/register', 'UserClasses\UserClassController@retrieveFields');

Route::namespace('Users')->group(function () {
  Route::get('/profile', 'ProfileController@ownProfile')->name('ownProfile');
  Route::get('/profile/{all}', 'ProfileController@show')->name('profile');
  Route::post('/trackMaps', 'ProfileController@create')->name('trackMaps');
});
Route::get('/kelas','UserClasses\EachUserClassController@showClass')->name('classes');
Route::post('/kelas/authKey', 'UserClasses\EachUserClassController@authClass')->name('authClass');
Route::get('/kelas/admin', 'UserClasses\ClassAdminController@showAdmin');

Route::namespace('Programs')->group(function () {
  Route::get('/cbt', 'SesiController@index')->name('sesi');
  Route::post('/cbt/cekSesi', 'SesiController@cekSesi')->name('cekSesi');
  Route::get('/cbt/{mapel}/{soalId}', 'CBTControllers@show')->name('uhbk');
  Route::get('/cbt/editor/{mapel}/{soalId}', 'EditorController@show');
  // Route::post('/cbt/createSoal/{all}', 'SoalControllers@create');
});

Route::namespace('API')->group(function () {
  Route::get('/getSoal/{mapel}/{soalId}', 'SoalApiController@getSoal')->name('getSoal');
  Route::post('/postHasil', 'ApiHasilController@create')->name('postHasil');
  Route::post('/updateSoal', 'SoalApiController@updateSoal')->name('updateSoal');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'UserClasses\UserClassController@retrieveFields')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::get('/', 'HomeController@index')->name('home');
