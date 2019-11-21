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
Route::get('refresh', 'LoginController@refresh');
Route::post('me', 'LoginController@me');
Route::middleware('jwt')->group( function () {
    Route::prefix('admin')->group(function () {
        //Barcode
        Route::get('generate/barcode/{id}', 'BarcodeController@generate');

        Route::resource('notification', 'NotificationController')->except(['create', 'destroy']);
        Route::post('logout', 'LoginController@logout');
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
        Route::resource('proposal/typeof/cooperation/one', 'TypeOfCooperationOneDerivativeController');
        Route::get('proposal/typeof/cooperation/one/{id}/list', 'TypeOfCooperationOneDerivativeController@listTypeOfCooperationOne');
        Route::resource('proposal/typeof/cooperation/two', 'TypeOfCooperationTwoDerivativeController');
        Route::get('proposal/typeof/cooperation/two/{id}/list', 'TypeOfCooperationTwoDerivativeController@listTypeOfCooperationTwo');
        Route::get('proposal/typeof/cooperation/two/{id}/select', 'TypeOfCooperationTwoDerivativeController@changeSelectTwo');

        Route::get('submission/cooperation', 'SubmissionProposalController@index');
        Route::get('submission/cooperation/create', 'SubmissionProposalController@create');
        Route::post('submission/cooperation', 'SubmissionProposalController@store');
        Route::get('submission/cooperation/one/{id}/derivative', 'SubmissionProposalController@changeSelectOneDerivative');
        Route::get('submission/cooperation/two/{id}/derivative', 'SubmissionProposalController@changeSelectTwoDerivative');
        Route::get('submission/get/regencies/{id}', 'SubmissionProposalController@getRegecies');
        Route::get('submission/cooperation/{id}/detail','SubmissionProposalController@detail');
        Route::post('submission/reason/approve', 'SubmissionProposalController@approve');
        Route::post('submission/reason/reject', 'SubmissionProposalController@reject');

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

        // Testimoni
        Route::get('testimoni', 'TestimoniController@index');
        Route::post('testimoni', 'TestimoniController@store');
        Route::delete('testimoni/{id}', 'TestimoniController@destroy');
        // EndTestimoni

        //User
        Route::get('check/same/current/password/{current_password}', 'UserController@checkSameCurrentPassword');
        Route::get('check/same/new/password/{current_password}/{new_password}', 'UserController@checkNewPassword');
        //End User

        //End Validation
        Route::post('comment', 'CommentController@store');

        Route::get('user/admin/index', 'AdminController@index');
        Route::get('user/admin/create', 'AdminController@create');
        Route::post('user/admin/store', 'AdminController@store');
        Route::put('user/change/status/{id}', 'AdminController@changeStatus');
        Route::get('user/admin/{id}/edit', 'AdminController@edit');
        Route::delete('user/admin/{id}', 'AdminController@destroy');
        Route::put('user/admin/{id}', 'AdminController@update');

        Route::get('user/satker/index', 'SatkerController@index');
        Route::get('user/satker/create', 'SatkerController@create');
        Route::post('user/satker/store', 'SatkerController@store');
        Route::get('satker/change/status/{id}', 'SatkerController@changeStatus');
        Route::get('user/satker/{id}/edit', 'SatkerController@edit');
        Route::delete('user/satker/{id}', 'SatkerController@destroy');
        Route::put('user/satker/{id}', 'SatkerController@update');

        //Monev
        Route::get('monev', 'MonevController@index');
        Route::get('monev/activity/{id}/create', 'MonevController@createActivity');
        Route::get('monev/activity/{id}', 'MonevController@showActivity');
        Route::post('monev/activity', 'MonevController@storeActivity');
        Route::delete('monev/activity/{id}', 'MonevController@deleteActivity');
        Route::get('monev/list/activity/{id}', 'MonevController@listMonevActivity');
        Route::delete('monev/list/activity/{id}', 'MonevController@destroyListMonevActivity');
        Route::post('monev/import', 'ImportController@importOldMOU');

        //Dashboard
        Route::get('/dashboard', 'DashboardController@index');
        Route::get('/old/monev/filter/{year}', 'DashboardController@filterOldMonev');
    });

    Route::get('user-authenticated', 'UserController@getUserLogin');
    Route::get('access/right', 'UserController@accessRight');
    Route::post('access/right/role', 'UserController@storeRole');
    Route::delete('access/right/role/{id}', 'UserController@destroyRole');
    Route::get('access/right/role/{id}/edit', 'UserController@editRole');
    Route::get('config/user/role', 'UserController@getData');

    Route::post('role-permission', 'RolePermissionsController@getRolePermission');
    Route::post('set-role-permission', 'RolePermissionsController@setRolePermission');
    Route::post('set-role-user', 'RolePermissionsController@setRoleUser');
});
