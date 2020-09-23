<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.login');
})->name('login');

Route::post('/auth', 'LoginController@authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'UserController@dashboard');
    Route::get('/draws', 'UserController@draws');
    Route::post('/draws/save', 'DrawController@store');

    Route::post('/config/save', 'ConfigController@store');
    Route::put('/config/save', 'ConfigController@store');

    Route::get('/user/{id}/registration', 'UserController@registration');
    Route::post('/user/save', 'UserController@store');
    Route::put('/user/save', 'UserController@store');
    Route::get('/user/list', 'UserController@index');
    Route::get('/user/list/search', 'UserController@getUserList');
});
