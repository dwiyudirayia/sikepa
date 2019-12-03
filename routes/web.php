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
Route::get('/', 'FrontController@home')->name('home');
Route::get('/page/faq', 'FrontController@faq')->name('faq');
Route::get('/page/article', 'FrontController@article')->name('article');
// Route::get('/front/article', 'FrontController@article')->name('article');
// Route::get('/front/article/{slug}', 'FrontController@articleDetail');
Route::get('/front/download/pdf/{file}', 'FrontController@downloadPdf');
Route::get('/front/submission', 'FrontController@submission')->name('submission.cooperation');
Route::get('download/format/mou', 'ExportController@formatOldMOU');
Route::get('download/data/monev/pdf', 'ExportController@downloadDataMonevPDF');
Route::get('download/data/monev/detail/pdf/{id}', 'ExportController@downloadDataMonevDetailPDF');

Route::get('/page/{slug}', 'FrontController@about')->name('about');
Route::get('/{any}', function(){
    return view('layouts.app');
})->where('any', '.*');
