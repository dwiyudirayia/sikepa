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


Route::prefix('admin')->group(function () {
    Route::resource('user', 'UserController');
    Route::resource('faq', 'FAQController');
    Route::resource('article', 'ArticleController');
    Route::resource('section/article', 'SectionArticleController');
    Route::resource('category/article', 'CategoryArticleController');

    Route::get('list/section/category/{id}', 'CategoryArticleController@listSectionCategory');
    Route::get('list/category/article/{id}', 'ArticleController@listCategoryArticle');
    //Validation
    Route::get('check/section/article/{name}', 'SectionArticleController@checkNameSection');
    Route::get('check/section/article/{name}/edit/{id}', 'SectionArticleController@checkNameSectionEdit');

    Route::get('check/section/category/{name}/section/{section_id}', 'CategoryArticleController@checkNameCategory');
    Route::get('check/section/category/{name}/edit/{id}', 'CategoryArticleController@checkNameCategoryEdit');
});

Route::get('/{any}', function(){
    return view('layouts.app');
})->where('any', '.*');
// Auth::routes();
