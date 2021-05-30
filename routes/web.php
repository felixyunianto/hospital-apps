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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('login','Admin\AuthAdminController@showLoginForm');
Route::post('login','Admin\AuthAdminController@login')->name('login');
Route::post('logout','Admin\AuthAdminController@adminLogout')->name('logout');

Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');
Route::get('pariwisata','Admin\TourController@index')->name('tour');
Route::get('pariwisata/detail/{tour}','Admin\TourController@show')->name('tour.show');
Route::get('pariwisata/tambah','Admin\TourController@create')->name('tour.create');
Route::post('pariwisata/tambah','Admin\TourController@store')->name('tour.store');
Route::post('pariwisata/{tour}','Admin\TourController@destroy')->name('tour.destroy');
Route::get('pariwisata/edit/{tour}','Admin\TourController@edit')->name('tour.edit');
Route::post('pariwisata/edit/{tour}','Admin\TourController@update')->name('tour.update');
Route::post('panorama/{panorama}','Admin\TourController@panoramaDestroy')->name('panorama.destroy');
Route::get('pengguna','Admin\UserController@index')->name('users');
Route::get('komentar','Admin\UserController@comment')->name('comment');





// Route::get('/home', 'HomeController@index')->name('home');
