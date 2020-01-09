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

use Illuminate\Support\Facades\Auth;

Route::get('/', 'Auth\LoginController@redirectToProvider');
Route::get('afterlogin', 'Auth\LoginController@handleProviderCallback');
Route::get('/logout/{id}', 'Auth\LoginController@logout');
Route::get('/afterlog/{id}', 'Auth\LoginController@afterlog');

  



