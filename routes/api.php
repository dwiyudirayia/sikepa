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
        Route::get('generate/barcode/{id}/guest', 'BarcodeController@generateGuest');

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
        Route::resource('proposal/submission/type', 'SubmissionTypeController');
        Route::resource('proposal/typeof/cooperation', 'TypeOfCooperationController');
        Route::resource('proposal/subtance/cooperation', 'SubtanceCooperationController');
        Route::resource('proposal/typeof/cooperation/one', 'TypeOfCooperationOneDerivativeController');
        Route::get('proposal/typeof/cooperation/one/{id}/create', 'TypeOfCooperationOneDerivativeController@createType');
        Route::get('proposal/typeof/cooperation/one/{id}/list', 'TypeOfCooperationOneDerivativeController@listTypeOfCooperationOne');
        Route::resource('proposal/typeof/cooperation/two', 'TypeOfCooperationTwoDerivativeController');
        Route::get('proposal/typeof/cooperation/two/{id}/create', 'TypeOfCooperationTwoDerivativeController@createType');
        Route::get('proposal/typeof/cooperation/two/{id}/list', 'TypeOfCooperationTwoDerivativeController@listTypeOfCooperationTwo');
        Route::get('proposal/typeof/cooperation/two/{id}/select', 'TypeOfCooperationTwoDerivativeController@changeSelectTwo');

        //MOU
        Route::get('mou/submission/cooperation', 'SubmissionProposalController@indexMOU');
        Route::get('pks/submission/cooperation', 'SubmissionProposalController@indexPKS');
        Route::get('submission/cooperation/create', 'SubmissionProposalController@create');
        Route::get('submission/cooperation/two/{id}/derivative', 'SubmissionProposalController@changeSelectTwoDerivative');
        Route::get('submission/get/regencies/{id}', 'SubmissionProposalController@getRegecies');
        Route::get('submission/cooperation/{id}/detail','SubmissionProposalController@detail');
        Route::get('submission/cooperation/{id}/detail/guest','SubmissionProposalController@detailGuest');
        Route::post('submission/reason/approve', 'SubmissionProposalController@approve');
        Route::post('submission/reason/approve/guest', 'SubmissionProposalGuestController@approve');
        Route::post('submission/reason/reject', 'SubmissionProposalController@reject');
        Route::post('submission/reason/reject/guest', 'SubmissionProposalGuestController@reject');
        Route::post('submission/cooperation/law/{id}', 'SubmissionProposalController@law');
        Route::post('submission/cooperation/law/{id}/guest', 'SubmissionProposalGuestController@law');
        Route::delete('deputi/pic/guest/{id}', 'SubmissionProposalGuestController@destroyDeputiPIC');
        Route::post('deputi/pic/guest', 'SubmissionProposalGuestController@storeDeputiPIC');
        Route::post('submission/cooperation/final/{id}', 'SubmissionProposalController@final');
        Route::post('submission/cooperation/final/{id}/guest', 'SubmissionProposalGuestController@final');
        Route::get('mou/submission/cooperation/approve', 'SubmissionProposalController@proposalApproveMOU');
        Route::get('mou/submission/cooperation/reject', 'SubmissionProposalController@proposalRejectMOU');
        Route::get('pks/submission/cooperation/approve', 'SubmissionProposalController@proposalApprovePKS');
        Route::get('pks/submission/cooperation/reject', 'SubmissionProposalController@proposalRejectPKS');
        Route::get('download/format/word/{id}', 'ExportController@downloadFormatMOUWord');
        Route::get('download/format/word/{id}/guest', 'ExportController@downloadFormatMOUWordGuest');
        Route::get('download/file/draft/{id}', 'SubmissionProposalController@fileDraftMOU');
        Route::get('download/file/draft/{id}/guest', 'SubmissionProposalGuestController@fileDraftMOU');

        Route::get('download/file/proposal/{id}', 'SubmissionProposalController@downloadProposal');
        Route::get('download/file/agency/profile/{id}', 'SubmissionProposalController@downloadAgdownloadAgencyProfile');

        Route::get('download/file/proposal/{id}/guest', 'SubmissionProposalGuestController@downloadProposalCooperationGuest');
        Route::get('download/file/agency/profile/{id}/guest', 'SubmissionProposalGuestController@downloadAgencyProfileCooperationGuest');
        Route::get('download/file/ktp/{id}/guest', 'SubmissionProposalGuestController@downloadKTPGuest');
        Route::get('download/file/npwp/{id}/guest', 'SubmissionProposalGuestController@downloadNPWPGuest');
        Route::get('download/file/siup/{id}/guest', 'SubmissionProposalGuestController@downloadSIUPGuest');

        Route::get('download/summary/cooperation/{id}', 'ExportController@downloadSummary');
        Route::get('download/summary/cooperation/{id}/guest', 'ExportController@downloadSummaryGuest');

        Route::post('submission/cooperation', 'SubmissionProposalController@store');
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
        Route::get('testimoni/{id}/edit', 'TestimoniController@edit');
        Route::put('testimoni/{id}', 'TestimoniController@update');
        Route::put('testimoni/change/status/{id}', 'TestimoniController@changeStatus');
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
        Route::post('monev', 'MonevController@store');
        Route::get('monev/{id}/edit', 'MonevController@edit');
        Route::put('monev/{id}', 'MonevController@update');
        Route::delete('monev/{id}/nomor/{nomor}', 'MonevController@destroyNomor');
        Route::delete('monev/{id}/parties/{parties}', 'MonevController@destroyParties');
        Route::get('monev/activity/{id}/create', 'MonevController@createActivity');
        Route::get('monev/activity/{id}', 'MonevController@showActivity');
        Route::post('monev/activity', 'MonevController@storeActivity');
        Route::delete('monev/activity/{id}', 'MonevController@deleteActivity');
        Route::get('monev/list/activity/{id}', 'MonevController@listMonevActivity');
        Route::delete('monev/list/activity/{id}', 'MonevController@destroyListMonevActivity');
        Route::post('monev/import', 'ImportController@importOldMOU');
        Route::post('monev/old/file/mou/{id}', 'MonevController@uploadOldMOU');
        Route::post('monev/p3', 'MonevController@storeP3');
        Route::post('monev/satker', 'MonevController@storeSatker');
        Route::post('monev/activity/satker', 'MonevController@storeActivitySatker');
        Route::post('monev/activity/guest', 'MonevController@storeActivityGuest');
        Route::get('list/monev/activity/satker/{id}', 'MonevController@listActivitySatker');
        Route::get('show/monev/activity/satker/{id}', 'MonevController@showActivitySatker');
        Route::get('show/monev/activity/guest/{id}', 'MonevController@showActivityGuest');
        Route::post('result/monev/activity/satker', 'MonevController@storeResultActivitySatker');
        Route::post('result/monev/activity/guest', 'MonevController@storeResultActivityGuest');
        Route::get('list/monev/activity/guest/{id}', 'MonevController@listActivityGuest');
        Route::delete('list/monev/activity/satker/{id}', 'MonevController@destroyActivitySatker');
        Route::delete('list/monev/activity/guest/{id}', 'MonevController@destroyActivityGuest');
        Route::get('download/monev/activity/satker/{id}', 'MonevController@downloadSummarySatker');
        Route::get('download/monev/activity/guest/{id}', 'MonevController@downloadSummaryGuest');

        //Dashboard
        Route::get('dashboard', 'DashboardController@index');
        Route::get('old/monev/filter/{year}', 'DashboardController@filterOldMonev');
        Route::get('filter/kesetaraan/gender/pks/{year}', 'DashboardController@filterKesetaraanGenderPKS');
        Route::get('filter/kesetaraan/gender/mou/{year}', 'DashboardController@filterKesetaraanGenderMOU');
        Route::get('filter/partisipasi/masyarakat/pks/{year}', 'DashboardController@filterPartisipasiMasyarakatPKS');
        Route::get('filter/partisipasi/masyarakat/mou/{year}', 'DashboardController@filterPartisipasiMasyarakatMOU');
        Route::get('filter/perlindungan/anak/pks/{year}', 'DashboardController@filterPerlindunganAnakPKS');
        Route::get('filter/perlindungan/anak/mou/{year}', 'DashboardController@filterPerlindunganAnakMOU');
        Route::get('filter/perlindungan/hak/perempuan/pks/{year}', 'DashboardController@filterPerlindunganHakPerempuanPKS');
        Route::get('filter/perlindungan/hak/perempuan/mou/{year}', 'DashboardController@filterPerlindunganHakPerempuanMOU');
        Route::get('filter/perlindungan/tumbuh/kembang/anak/pks/{year}', 'DashboardController@filterPerlindunganTumbuhKembangAnakPKS');
        Route::get('filter/perlindungan/tumbuh/kembang/anak/mou/{year}', 'DashboardController@filterPerlindunganTumbuhKembangAnakMOU');

        //Information Deputi
        Route::get('/deputi/information', 'DeputiInformationController@index');
        Route::post('/deputi/information', 'DeputiInformationController@store');
        Route::delete('/deputi/information/{id}', 'DeputiInformationController@destroy');
        Route::post('/deputi/information/{id}/update', 'DeputiInformationController@update');
        Route::get('/deputi/information/{id}/edit', 'DeputiInformationController@edit');
        Route::delete('/deputi/information/{id}/file', 'DeputiInformationController@destroyFile');
        Route::post('/deputi/information/file', 'DeputiInformationController@storeFile');
        Route::get('/deputi/information/download/file/{id}', 'DeputiInformationController@downloadFileDeputiInformation');
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
