<?php

use Illuminate\Http\Request;

Route::post('/register','Api\UserController@register');
Route::post('/login','Api\UserController@login');
Route::post('/comment','Api\UserController@comment')->middleware('auth:api');
Route::get('/tours','Api\TourController@index');
Route::get('/tour/{tour}','Api\TourController@show');
Route::post('/tour/search','Api\TourController@search');
Route::get('/tour/category/{category}','Api\TourController@category');
Route::get('/tours/popular','Api\TourController@popular');
