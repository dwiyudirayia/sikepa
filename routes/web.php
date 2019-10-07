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
    Route::resource('agency', 'AgencyController');
    Route::resource('section/page', 'SectionPageController');
    Route::resource('category/page', 'CategoryPageController');
    Route::resource('page', 'PageController');

    //Change Status Article
    Route::get('change/article/publish/{id}', 'ArticleController@changePublishStatus');
    Route::get('change/article/approve/{id}', 'ArticleController@changeApprovedStatus');
    //End Change Status Article

    //Change Status Page
    Route::get('change/page/publish/{id}', 'PageController@changePublishStatus');
    Route::get('change/page/approve/{id}', 'PageController@changeApprovedStatus');
    //End Change Status Page

    Route::get('list/section/category/article/{id}', 'CategoryArticleController@listSectionCategory');
    Route::get('list/category/article/{id}', 'ArticleController@listCategoryArticle');

    Route::get('list/section/category/page/{id}', 'CategoryPageController@listSectionCategory');
    Route::get('list/category/page/{id}', 'PageController@listCategoryPage');
    //Validation
    Route::get('check/section/article/{name}', 'SectionArticleController@checkNameSection');
    Route::get('check/section/article/{name}/edit/{id}', 'SectionArticleController@checkNameSectionEdit');

    Route::get('check/category/article/{name}/section/{section_id}', 'CategoryArticleController@checkNameCategory');
    Route::get('check/category/article/{name}/edit/{id}', 'CategoryArticleController@checkNameCategoryEdit');

    Route::get('check/section/page/{name}', 'SectionArticleController@checkNameSection');
    Route::get('check/section/page/{name}/edit/{id}', 'SectionArticleController@checkNameSectionEdit');

    Route::get('check/category/page/{name}/section/{section_id}', 'CategoryPageController@checkNameCategory');
    Route::get('check/category/page/{name}/edit/{id}', 'CategoryPageController@checkNameCategoryEdit');
});

Route::get('user-authenticated', 'UserController@getUserLogin');
Route::get('user-lists', 'UserController@userLists');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
Route::get('roles', 'RolePermissionsController@getAllRole');
Route::get('permissions', 'RolePermissionsController@getAllPermission');
Route::post('role-permission', 'RolePermissionsController@getRolePermission');
Route::post('set-role-permission', 'RolePermissionsController@setRolePermission');
Route::post('set-role-user', 'RolePermissionsController@setRoleUser');

Route::get('/', 'FrontController@home');
Route::get('/front/article', 'FrontController@article');
Route::get('/front/article/{id}', 'FrontController@articleDetail');

Route::get('/{any}', function(){
    return view('layouts.app');
})->where('any', '.*');
// Auth::routes();
