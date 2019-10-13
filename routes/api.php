<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'LoginController@login');
Route::middleware('auth:api')->group( function () {
    Route::prefix('admin')->group(function () {
        Route::resource('user', 'UserController');
        Route::put('user/change/password', 'UserController@changePassword');
        Route::resource('faq', 'FAQController');
        Route::resource('article', 'ArticleController');
        Route::resource('section/article', 'SectionArticleController');
        Route::resource('category/article', 'CategoryArticleController');

        Route::resource('agency', 'AgencyController');

        Route::resource('banner/category', 'BannerCategoryController');
        Route::get('banner/list/{id}/category', 'BannerController@listCategoryBanner');
        Route::post('banner', 'BannerController@store');
        Route::get('banner/create', 'BannerController@create');
        Route::delete('banner/{id}', 'BannerController@destroy');
        Route::get('banner/{id}/edit', 'BannerController@edit');
        Route::put('banner/{id}', 'BannerController@update');

        Route::resource('section/page', 'SectionPageController');
        Route::resource('category/page', 'CategoryPageController');
        Route::resource('page', 'PageController');

        Route::resource('proposal/category', 'CategoryProposalController');
        Route::resource('proposal/cooperation/target', 'CooperationTargetController');
        Route::resource('proposal/typeof/cooperation', 'TypeOfCooperationController');
        Route::resource('proposal/subtance/cooperation', 'SubtanceCooperationController');
        Route::get('submission/cooperation', 'SubmissionProposalController@index');

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
        //Article
        Route::get('check/section/article/{name}', 'SectionArticleController@checkNameSection');
        Route::get('check/section/article/{name}/edit/{id}', 'SectionArticleController@checkNameSectionEdit');

        Route::get('check/category/article/{name}/section/{section_id}', 'CategoryArticleController@checkNameCategory');
        Route::get('check/category/article/{name}/edit/{id}', 'CategoryArticleController@checkNameCategoryEdit');
        //End Article

        //Article
        Route::get('check/section/page/{name}', 'SectionArticleController@checkNameSection');
        Route::get('check/section/page/{name}/edit/{id}', 'SectionArticleController@checkNameSectionEdit');

        Route::get('check/category/page/{name}/section/{section_id}', 'CategoryPageController@checkNameCategory');
        Route::get('check/category/page/{name}/edit/{id}', 'CategoryPageController@checkNameCategoryEdit');
        //End Article

        //User
        Route::get('check/same/current/password/{current_password}', 'UserController@checkSameCurrentPassword');
        Route::get('check/same/new/password/{current_password}/{new_password}', 'UserController@checkNewPassword');
        //End User

        //End Validation
        Route::post('comment', 'CommentController@store');
    });

    Route::get('user-authenticated', 'UserController@getUserLogin');
    Route::get('user-lists', 'UserController@userLists');
    Route::get('roles', 'RolePermissionsController@getAllRole');
    Route::get('permissions', 'RolePermissionsController@getAllPermission');
    Route::post('role-permission', 'RolePermissionsController@getRolePermission');
    Route::post('set-role-permission', 'RolePermissionsController@setRolePermission');
    Route::post('set-role-user', 'RolePermissionsController@setRoleUser');
});
