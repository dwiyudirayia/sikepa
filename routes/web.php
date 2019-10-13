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


Route::get('/', 'FrontController@home');
Route::get('/front/article', 'FrontController@article');
Route::get('/front/article/{id}', 'FrontController@articleDetail');

Route::get('/{any}', function(){
    return view('layouts.app');
})->where('any', '.*');
// Auth::routes();
