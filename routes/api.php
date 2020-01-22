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
Route::get('get/photo', 'LoginController@getPhoto');

Route::post('me', 'LoginController@me');
Route::middleware('jwt')->group(function () {
    Route::prefix('admin')->group(function () {
        //Barcode
        Route::get('generate/barcode/{id}', 'BarcodeController@generate');
        Route::get('generate/barcode/{id}/guest', 'BarcodeController@generateGuest');

        Route::get('generate/barcode/{id}/adendum', 'BarcodeController@generateAdendum');
        Route::get('generate/barcode/{id}/guest/adendum', 'BarcodeController@generateGuestAdendum');

        Route::get('generate/barcode/{id}/extension', 'BarcodeController@generateExtension');
        Route::get('generate/barcode/{id}/guest/extension', 'BarcodeController@generateGuestExtension');

        Route::resource('notification', 'NotificationController')->except(['create', 'destroy']);
        Route::post('logout', 'LoginController@logout');
        Route::resource('user', 'UserController');
        Route::put('user/change/password', 'UserController@changePassword');
        Route::post('user/update/profile', 'UserController@updateProfileUser');
        Route::resource('faq', 'FAQController');
        Route::resource('article', 'ArticleController');
        Route::resource('section/article', 'SectionArticleController');
        Route::resource('category/article', 'CategoryArticleController');

        Route::resource('agency', 'AgencyController');

        // Route::resource('banner/category', 'BannerCategoryController');
        // Route::get('banner/list/{id}/category', 'BannerController@listCategoryBanner');
        // Route::post('banner', 'BannerController@store');
        // Route::get('banner/create', 'BannerController@create');
        // Route::delete('banner/{id}', 'BannerController@destroy');
        // Route::get('banner/{id}/edit', 'BannerController@edit');
        // Route::put('banner/{id}', 'BannerController@update');



        Route::resource('section/page', 'SectionPageController');
        Route::resource('category/page', 'CategoryPageController');
        Route::resource('page', 'PageController');
        Route::get('page/change/category/{id}', 'PageController@categoryPage');
        Route::get('article/change/category/{id}', 'ArticleController@categoryArticle');

        Route::resource('proposal/category', 'CategoryProposalController');
        // Route::resource('proposal/cooperation/target', 'CooperationTargetController');
        // Route::resource('proposal/submission/type', 'SubmissionTypeController');
        // Route::resource('proposal/typeof/cooperation', 'TypeOfCooperationController');
        Route::resource('proposal/subtance/cooperation', 'SubtanceCooperationController');
        Route::resource('proposal/typeof/cooperation/one', 'TypeOfCooperationOneDerivativeController');
        // Route::get('proposal/typeof/cooperation/one/{id}/create', 'TypeOfCooperationOneDerivativeController@createType');
        Route::get('proposal/typeof/cooperation/one/list/cooperation', 'TypeOfCooperationOneDerivativeController@listTypeOfCooperationOne');
        Route::resource('proposal/typeof/cooperation/two', 'TypeOfCooperationTwoDerivativeController');
        Route::get('proposal/typeof/cooperation/two/{id}/create', 'TypeOfCooperationTwoDerivativeController@createType');
        Route::get('proposal/typeof/cooperation/two/{id}/list', 'TypeOfCooperationTwoDerivativeController@listTypeOfCooperationTwo');
        Route::get('proposal/typeof/cooperation/two/{id}/select', 'TypeOfCooperationTwoDerivativeController@changeSelectTwo');

        //MOU
        Route::get('mou/submission/cooperation', 'SubmissionProposalController@indexMOU');
        Route::get('adendum/submission/cooperation', 'AdendumController@indexMOU');
        Route::get('extension/submission/cooperation', 'ExtensionController@indexMOU');
        // Route::get('pks/submission/cooperation', 'SubmissionProposalController@indexPKS');
        Route::get('submission/cooperation/create', 'SubmissionProposalController@create');
        Route::get('submission/cooperation/two/{id}/derivative', 'SubmissionProposalController@changeSelectTwoDerivative');
        Route::get('submission/get/regencies/{id}', 'SubmissionProposalController@getRegecies');
        Route::get('submission/cooperation/{id}/detail', 'SubmissionProposalController@detail');
        Route::get('submission/cooperation/{id}/detail/guest', 'SubmissionProposalController@detailGuest');

        Route::get('submission/cooperation/{id}/detail/adendum', 'AdendumController@detail');
        Route::get('submission/cooperation/{id}/detail/guest/adendum', 'AdendumController@detailGuest');

        Route::get('submission/cooperation/{id}/detail/extension', 'ExtensionController@detail');
        Route::get('submission/cooperation/{id}/detail/guest/extension', 'ExtensionController@detailGuest');

        Route::post('submission/reason/approve', 'SubmissionProposalController@approve');
        Route::post('submission/reason/approve/guest', 'SubmissionProposalGuestController@approve');
        Route::post('submission/reason/reject', 'SubmissionProposalController@reject');
        Route::post('submission/reason/reject/guest', 'SubmissionProposalGuestController@reject');

        Route::post('submission/reason/approve/adendum', 'AdendumController@approve');
        Route::post('submission/reason/approve/guest/adendum', 'AdendumController@approveGuest');
        Route::post('submission/reason/reject/adendum', 'AdendumController@reject');
        Route::post('submission/reason/reject/guest/adendum', 'AdendumController@rejectGuest');
        Route::post('submission/reason/continue/adendum', 'AdendumController@continue');
        Route::post('submission/reason/continue/guest/adendum', 'AdendumController@continueGuest');

        Route::post('submission/reason/approve/extension', 'ExtensionController@approve');
        Route::post('submission/reason/approve/guest/extension', 'ExtensionController@approveGuest');
        Route::post('submission/reason/reject/extension', 'ExtensionController@reject');
        Route::post('submission/reason/reject/guest/extension', 'ExtensionController@rejectGuest');
        Route::post('submission/reason/continue/extension', 'ExtensionController@continue');
        Route::post('submission/reason/continue/guest/extension', 'ExtensionController@continueGuest');

        Route::post('submission/reason/continue', 'SubmissionProposalController@continue');
        Route::post('submission/reason/continue/guest', 'SubmissionProposalGuestController@continue');
        Route::get('submission/proposal/success', 'SubmissionProposalController@successMOU');
        Route::get('submission/proposal/success/{id}', 'SubmissionProposalController@findMOUSuccess');
        Route::post('submission/cooperation/law/{id}', 'SubmissionProposalController@law');
        Route::post('submission/cooperation/law/{id}/guest', 'SubmissionProposalGuestController@law');

        Route::post('submission/cooperation/law/{id}/adendum', 'AdendumController@law');
        Route::post('submission/cooperation/law/{id}/guest/adendum', 'AdendumController@lawGuest');

        Route::post('submission/cooperation/law/{id}/extension', 'ExtensionController@law');
        Route::post('submission/cooperation/law/{id}/guest/extension', 'ExtensionController@lawGuest');

        Route::delete('deputi/pic/guest/{id}', 'SubmissionProposalGuestController@destroyDeputiPIC');
        Route::post('deputi/pic/guest', 'SubmissionProposalGuestController@storeDeputiPIC');
        Route::delete('deputi/pic/{id}', 'SubmissionProposalController@destroyDeputiPIC');
        Route::post('deputi/pic', 'SubmissionProposalController@storeDeputiPIC');

        Route::delete('deputi/pic/guest/adendum/{id}', 'AdendumController@destroyDeputiPICGuest');
        Route::post('deputi/pic/guest/adendum', 'AdendumController@storeDeputiPICGuest');
        Route::delete('deputi/pic/adendum/{id}', 'AdendumController@destroyDeputiPIC');
        Route::post('deputi/pic/adendum', 'AdendumController@storeDeputiPIC');

        Route::delete('deputi/pic/guest/extension/{id}', 'ExtensionController@destroyDeputiPICGuest');
        Route::post('deputi/pic/guest/extension', 'ExtensionController@storeDeputiPICGuest');
        Route::delete('deputi/pic/extension/{id}', 'ExtensionController@destroyDeputiPIC');
        Route::post('deputi/pic/extension', 'ExtensionController@storeDeputiPIC');

        Route::post('submission/cooperation/final/{id}', 'SubmissionProposalController@final');
        Route::post('submission/cooperation/final/{id}/guest', 'SubmissionProposalGuestController@final');

        Route::post('submission/cooperation/final/{id}/adendum', 'AdendumController@final');
        Route::post('submission/cooperation/final/{id}/guest/adendum', 'AdendumController@finalGuest');

        Route::post('submission/cooperation/final/{id}/extension', 'ExtensionController@final');
        Route::post('submission/cooperation/final/{id}/guest/extension', 'ExtensionController@finalGuest');

        Route::get('mou/submission/cooperation/approve', 'SubmissionProposalController@proposalApproveMOU');
        Route::get('mou/submission/cooperation/reject', 'SubmissionProposalController@proposalRejectMOU');

        Route::get('adendum/submission/cooperation/approve', 'AdendumController@proposalApproveMOU');
        Route::get('adendum/submission/cooperation/reject', 'AdendumController@proposalRejectMOU');

        Route::get('extension/submission/cooperation/approve', 'ExtensionController@proposalApproveMOU');
        Route::get('extension/submission/cooperation/reject', 'ExtensionController@proposalRejectMOU');
        // Route::get('pks/submission/cooperation/approve', 'SubmissionProposalController@proposalApprovePKS');
        // Route::get('pks/submission/cooperation/reject', 'SubmissionProposalController@proposalRejectPKS');
        Route::get('download/format/word/{id}', 'ExportController@downloadFormatMOUWord');
        Route::get('download/format/word/{id}/guest', 'ExportController@downloadFormatMOUWordGuest');

        Route::get('download/format/word/{id}/adendum', 'ExportController@downloadFormatMOUWordAdendum');
        Route::get('download/format/word/{id}/guest/adendum', 'ExportController@downloadFormatMOUWordGuestAdendum');

        Route::get('download/format/word/{id}/extension', 'ExportController@downloadFormatMOUWordExtension');
        Route::get('download/format/word/{id}/guest/extension', 'ExportController@downloadFormatMOUWordGuestExtension');

        // Route::get('download/file/draft/{id}', 'SubmissionProposalController@fileDraftMOU');
        // Route::get('download/file/draft/{id}/guest', 'SubmissionProposalGuestController@fileDraftMOU');

        Route::get('download/file/guest/draft/{id}', 'SubmissionProposalGuestController@fileDraftMOU');
        Route::get('download/file/guest/notulen/{id}', 'SubmissionProposalGuestController@fileNotulenMOU');

        Route::get('download/file/draft/{id}', 'SubmissionProposalController@fileDraftMOU');
        Route::get('download/file/notulen/{id}', 'SubmissionProposalController@fileNotulenMOU');

        Route::post('store/file/guest/draft', 'SubmissionProposalGuestController@storeDraft');
        Route::post('store/file/guest/notulen', 'SubmissionProposalGuestController@storeNotulen');

        Route::post('store/file/draft', 'SubmissionProposalController@storeDraft');
        Route::post('store/file/notulen', 'SubmissionProposalController@storeNotulen');

        //
        Route::get('download/file/guest/draft/{id}/adendum', 'AdendumController@fileDraftMOUGuest');
        Route::get('download/file/guest/notulen/{id}/adendum', 'AdendumController@fileNotulenMOUGuest');

        Route::get('download/file/draft/{id}/adendum', 'AdendumController@fileDraftMOU');
        Route::get('download/file/notulen/{id}/adendum', 'AdendumController@fileNotulenMOU');

        Route::post('store/file/guest/draft/adendum', 'AdendumController@storeDraftGuest');
        Route::post('store/file/guest/notulen/adendum', 'AdendumController@storeNotulenGuest');

        Route::post('store/file/draft/adendum', 'AdendumController@storeDraft');
        Route::post('store/file/notulen/adendum', 'AdendumController@storeNotulen');
        //
        Route::get('download/file/guest/draft/{id}/extension', 'ExtensionController@fileDraftMOUGuest');
        Route::get('download/file/guest/notulen/{id}/extension', 'ExtensionController@fileNotulenMOUGuest');

        Route::get('download/file/draft/{id}/extension', 'ExtensionController@fileDraftMOU');
        Route::get('download/file/notulen/{id}/extension', 'ExtensionController@fileNotulenMOU');

        Route::post('store/file/guest/draft/extension', 'ExtensionController@storeDraftGuest');
        Route::post('store/file/guest/notulen/extension', 'ExtensionController@storeNotulenGuest');

        Route::post('store/file/draft/extension', 'ExtensionController@storeDraft');
        Route::post('store/file/notulen/extension', 'ExtensionController@storeNotulen');

        Route::get('download/cooperation/success/guest/draft/{id}', 'SubmissionProposalGuestController@downloadDraftMOUSuccess');
        Route::get('download/cooperation/success/draft/{id}', 'SubmissionProposalController@downloadDraftMOUSuccess');

        Route::get('download/cooperation/success/guest/draft/{id}/adendum', 'AdendumController@downloadDraftMOUSuccessGuest');
        Route::get('download/cooperation/success/draft/{id}/adendum', 'AdendumController@downloadDraftMOUSuccess');

        Route::get('download/cooperation/success/guest/draft/{id}/extension', 'ExtensionController@downloadDraftMOUSuccessGuest');
        Route::get('download/cooperation/success/draft/{id}/extension', 'ExtensionController@downloadDraftMOUSuccess');

        // Route::get('filter/satker/sesmen/approval/pks','SubmissionProposalController@filterSatkerSesmenApprovalPKS');
        // Route::get('filter/satker/sesmen/pks','SubmissionProposalController@filterSatkerSesmenYouPKS');
        // Route::get('filter/guest/pks','SubmissionProposalController@filterGuestPKS');
        // Route::get('reset/satker/sesmen/approval/pks','SubmissionProposalController@resetSatkerSesmenApprovalPKS');
        // Route::get('reset/satker/sesmen/pks','SubmissionProposalController@resetSatkerSesmenYouPKS');
        // Route::get('reset/guest/pks','SubmissionProposalController@resetGuestPKS');

        Route::get('filter/satker/sesmen/approval/mou', 'SubmissionProposalController@filterSatkerSesmenApprovalMOU');
        Route::get('filter/satker/sesmen/mou', 'SubmissionProposalController@filterSatkerSesmenYouMOU');
        Route::get('filter/guest/mou', 'SubmissionProposalController@filterGuestMOU');
        Route::get('reset/satker/sesmen/approval/mou', 'SubmissionProposalController@resetSatkerSesmenApprovalMOU');
        Route::get('reset/satker/sesmen/mou', 'SubmissionProposalController@resetSatkerSesmenYouMOU');
        Route::get('reset/guest/mou', 'SubmissionProposalController@resetGuestMOU');

        Route::get('filter/satker/sesmen/approval/adendum', 'SubmissionProposalController@filterSatkerSesmenApprovalMOU');
        Route::get('filter/satker/sesmen/adendum', 'SubmissionProposalController@filterSatkerSesmenYouMOU');
        Route::get('filter/guest/adendum', 'SubmissionProposalController@filterGuestMOU');
        Route::get('reset/satker/sesmen/approval/adendum', 'SubmissionProposalController@resetSatkerSesmenApprovalMOU');
        Route::get('reset/satker/sesmen/adendum', 'SubmissionProposalController@resetSatkerSesmenYouMOU');
        Route::get('reset/guest/adendum', 'SubmissionProposalController@resetGuestMOU');

        Route::get('download/file/proposal/{id}', 'SubmissionProposalController@downloadProposal');
        Route::get('download/file/agency/profile/{id}', 'SubmissionProposalController@downloadAgencyProfile');

        Route::get('download/file/proposal/{id}/adendum', 'AdendumController@downloadProposal');
        Route::get('download/file/agency/profile/{id}/adendum', 'AdendumController@downloadAgencyProfile');

        Route::get('download/file/proposal/{id}/guest', 'SubmissionProposalGuestController@downloadProposalCooperationGuest');
        Route::get('download/file/agency/profile/{id}/guest', 'SubmissionProposalGuestController@downloadAgencyProfileCooperationGuest');
        Route::get('download/file/ktp/{id}/guest', 'SubmissionProposalGuestController@downloadKTPGuest');
        Route::get('download/file/npwp/{id}/guest', 'SubmissionProposalGuestController@downloadNPWPGuest');
        Route::get('download/file/siup/{id}/guest', 'SubmissionProposalGuestController@downloadSIUPGuest');

        Route::get('download/file/proposal/{id}/guest/adendum', 'AdendumController@downloadProposalCooperationGuest');
        Route::get('download/file/agency/profile/{id}/guest/adendum', 'AdendumController@downloadAgencyProfileCooperationGuest');
        Route::get('download/file/ktp/{id}/guest/adendum', 'AdendumController@downloadKTPGuest');
        Route::get('download/file/npwp/{id}/guest/adendum', 'AdendumController@downloadNPWPGuest');
        Route::get('download/file/siup/{id}/guest/adendum', 'AdendumController@downloadSIUPGuest');

        Route::get('download/file/proposal/{id}/guest/extension', 'ExtensionController@downloadProposalCooperationGuest');
        Route::get('download/file/agency/profile/{id}/guest/extension', 'ExtensionController@downloadAgencyProfileCooperationGuest');
        Route::get('download/file/ktp/{id}/guest/extension', 'ExtensionController@downloadKTPGuest');
        Route::get('download/file/npwp/{id}/guest/extension', 'ExtensionController@downloadNPWPGuest');
        Route::get('download/file/siup/{id}/guest/extension', 'ExtensionController@downloadSIUPGuest');

        Route::get('download/summary/cooperation/{id}', 'ExportController@downloadSummary');
        Route::get('download/summary/cooperation/{id}/guest', 'ExportController@downloadSummaryGuest');

        Route::get('download/summary/cooperation/{id}/adendum', 'ExportController@downloadSummaryAdendum');
        Route::get('download/summary/cooperation/{id}/guest/adendum', 'ExportController@downloadSummaryGuestAdendum');

        Route::get('download/summary/cooperation/{id}/extension', 'ExportController@downloadSummaryExtension');
        Route::get('download/summary/cooperation/{id}/guest/extension', 'ExportController@downloadSummaryGuestExtension');

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

        //Photo Login
        Route::get('photo/login', 'PhotoLoginController@index');
        Route::get('photo/login/{id}/edit', 'PhotoLoginController@edit');
        Route::post('photo/login/{id}', 'PhotoLoginController@update');
        //End Photo Login
        //Banner Article
        Route::get('banner/landing/page', 'BannerLandingPageController@index');
        Route::get('banner/landing/page/{id}/edit', 'BannerLandingPageController@edit');
        Route::post('banner/landing/page/{id}', 'BannerLandingPageController@update');
        Route::post('banner/landing/page/change/config', 'BannerLandingPageController@changeConfig');
        Route::get('banner/landing/page/config', 'BannerLandingPageController@config');
        //End Banner Article
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
        Route::post('monev/p3', 'MonevController@storeP3');
        Route::post('monev/satker', 'MonevController@storeSatker');
        Route::post('monev/activity/satker', 'MonevController@storeActivitySatker');
        Route::post('monev/activity/guest', 'MonevController@storeActivityGuest');
        Route::get('list/monev/activity/satker/{id}', 'MonevController@listActivitySatker');
        Route::get('show/monev/activity/satker/{id}', 'MonevController@showActivitySatker');
        Route::get('show/monev/activity/guest/{id}', 'MonevController@showActivityGuest');
        Route::post('monev/report/satker', 'MonevController@storeReport');
        Route::post('monev/report/guest', 'MonevController@storeReportGuest');
        Route::get('list/monev/activity/guest/{id}', 'MonevController@listActivityGuest');
        Route::delete('list/monev/activity/satker/{id}', 'MonevController@destroyActivitySatker');
        Route::delete('list/monev/activity/guest/{id}', 'MonevController@destroyActivityGuest');
        Route::get('download/monev/activity/satker/{id}', 'MonevController@downloadSummarySatker');
        Route::get('download/monev/activity/guest/{id}', 'MonevController@downloadSummaryGuest');
        Route::get('monev/detail/guest/{id}', 'MonevController@detailMonevGuest');
        Route::get('monev/detail/satker/{id}', 'MonevController@detailMonevSatker');
        Route::get('monev/activity/sakter/{id}/edit', 'MonevController@editSatker');
        Route::get('monev/activity/guest/{id}/edit', 'MonevController@editGuest');
        Route::get('download/image/activity/guest/{id}', 'MonevController@downloadImageGuest');
        Route::get('download/image/activity/satker/{id}', 'MonevController@downloadImageSatker');
        Route::delete('image/activity/guest/{id}', 'MonevController@destroyImageGuest');
        Route::delete('image/activity/satker/{id}', 'MonevController@destroyImageSatker');
        Route::post('store/file/activity/guest', 'MonevController@storeImageGuest');
        Route::post('store/file/activity/satker', 'MonevController@storeImageSatker');
        Route::put('monev/activity/guest/{id}', 'MonevController@updateActivityGuest');
        Route::put('monev/activity/satker/{id}', 'MonevController@updateActivitySatker');

        //Monev Adendum
        Route::get('adendum/monev', 'MonevAdendumController@index');
        Route::post('adendum/monev/p3', 'MonevAdendumController@storeP3');
        Route::post('adendum/monev/satker', 'MonevAdendumController@storeSatker');
        Route::post('adendum/monev/activity/satker', 'MonevAdendumController@storeActivitySatker');
        Route::post('adendum/monev/activity/guest', 'MonevAdendumController@storeActivityGuest');
        Route::get('adendum/list/monev/activity/satker/{id}', 'MonevAdendumController@listActivitySatker');
        Route::get('adendum/show/monev/activity/satker/{id}', 'MonevAdendumController@showActivitySatker');
        Route::get('adendum/show/monev/activity/guest/{id}', 'MonevAdendumController@showActivityGuest');
        Route::post('adendum/monev/report/satker', 'MonevAdendumController@storeReport');
        Route::post('adendum/monev/report/guest', 'MonevAdendumController@storeReportGuest');
        Route::get('adendum/list/monev/activity/guest/{id}', 'MonevAdendumController@listActivityGuest');
        Route::delete('adendum/list/monev/activity/satker/{id}', 'MonevAdendumController@destroyActivitySatker');
        Route::delete('adendum/list/monev/activity/guest/{id}', 'MonevAdendumController@destroyActivityGuest');
        Route::get('adendum/download/monev/activity/satker/{id}', 'MonevAdendumController@downloadSummarySatker');
        Route::get('adendum/download/monev/activity/guest/{id}', 'MonevAdendumController@downloadSummaryGuest');
        Route::get('adendum/monev/detail/guest/{id}', 'MonevAdendumController@detailMonevGuest');
        Route::get('adendum/monev/detail/satker/{id}', 'MonevAdendumController@detailMonevSatker');
        Route::get('adendum/monev/activity/sakter/{id}/edit', 'MonevAdendumController@editSatker');
        Route::get('adendum/monev/activity/guest/{id}/edit', 'MonevAdendumController@editGuest');
        Route::get('adendum/download/image/activity/guest/{id}', 'MonevAdendumController@downloadImageGuest');
        Route::get('adendum/download/image/activity/satker/{id}', 'MonevAdendumController@downloadImageSatker');
        Route::delete('adendum/image/activity/guest/{id}', 'MonevAdendumController@destroyImageGuest');
        Route::delete('adendum/image/activity/satker/{id}', 'MonevAdendumController@destroyImageSatker');
        Route::post('adendum/store/file/activity/guest', 'MonevAdendumController@storeImageGuest');
        Route::post('adendum/store/file/activity/satker', 'MonevAdendumController@storeImageSatker');
        Route::put('adendum/monev/activity/guest/{id}', 'MonevAdendumController@updateActivityGuest');
        Route::put('adendum/monev/activity/satker/{id}', 'MonevAdendumController@updateActivitySatker');

        //Monev Perpanjangan
        Route::get('extension/monev', 'MonevExtensionController@index');
        Route::post('extension/monev/p3', 'MonevExtensionController@storeP3');
        Route::post('extension/monev/satker', 'MonevExtensionController@storeSatker');
        Route::post('extension/monev/activity/satker', 'MonevExtensionController@storeActivitySatker');
        Route::post('extension/monev/activity/guest', 'MonevExtensionController@storeActivityGuest');
        Route::get('extension/list/monev/activity/satker/{id}', 'MonevExtensionController@listActivitySatker');
        Route::get('extension/show/monev/activity/satker/{id}', 'MonevExtensionController@showActivitySatker');
        Route::get('extension/show/monev/activity/guest/{id}', 'MonevExtensionController@showActivityGuest');
        Route::post('extension/monev/report/satker', 'MonevExtensionController@storeReport');
        Route::post('extension/monev/report/guest', 'MonevExtensionController@storeReportGuest');
        Route::get('extension/list/monev/activity/guest/{id}', 'MonevExtensionController@listActivityGuest');
        Route::delete('extension/list/monev/activity/satker/{id}', 'MonevExtensionController@destroyActivitySatker');
        Route::delete('extension/list/monev/activity/guest/{id}', 'MonevExtensionController@destroyActivityGuest');
        Route::get('extension/download/monev/activity/satker/{id}', 'MonevExtensionController@downloadSummarySatker');
        Route::get('extension/download/monev/activity/guest/{id}', 'MonevExtensionController@downloadSummaryGuest');
        Route::get('extension/monev/detail/guest/{id}', 'MonevExtensionController@detailMonevGuest');
        Route::get('extension/monev/detail/satker/{id}', 'MonevExtensionController@detailMonevSatker');
        Route::get('extension/monev/activity/sakter/{id}/edit', 'MonevExtensionController@editSatker');
        Route::get('extension/monev/activity/guest/{id}/edit', 'MonevExtensionController@editGuest');
        Route::get('extension/download/image/activity/guest/{id}', 'MonevExtensionController@downloadImageGuest');
        Route::get('extension/download/image/activity/satker/{id}', 'MonevExtensionController@downloadImageSatker');
        Route::delete('extension/image/activity/guest/{id}', 'MonevExtensionController@destroyImageGuest');
        Route::delete('extension/image/activity/satker/{id}', 'MonevExtensionController@destroyImageSatker');
        Route::post('extension/store/file/activity/guest', 'MonevExtensionController@storeImageGuest');
        Route::post('extension/store/file/activity/satker', 'MonevExtensionController@storeImageSatker');
        Route::put('extension/monev/activity/guest/{id}', 'MonevExtensionController@updateActivityGuest');
        Route::put('extension/monev/activity/satker/{id}', 'MonevExtensionController@updateActivitySatker');

        //Dashboard
        Route::get('dashboard', 'DashboardController@index');
        Route::get('old/monev/filter/{year}', 'DashboardController@filterOldMonev');

        // Route::get('filter/kesetaraan/gender/pks/{year}', 'DashboardController@filterKesetaraanGenderPKS');
        Route::get('filter/kesetaraan/gender/mou/{year}', 'DashboardController@filterKesetaraanGenderMOU');
        // Route::get('filter/partisipasi/masyarakat/pks/{year}', 'DashboardController@filterPartisipasiMasyarakatPKS');
        Route::get('filter/partisipasi/masyarakat/mou/{year}', 'DashboardController@filterPartisipasiMasyarakatMOU');
        Route::get('filter/partisipasi/masyarakat/adendum/{year}', 'DashboardController@filterPartisipasiMasyarakatAdendum');
        Route::get('filter/partisipasi/masyarakat/extension/{year}', 'DashboardController@filterPartisipasiMasyarakatExtension');
        // Route::get('filter/perlindungan/anak/pks/{year}', 'DashboardController@filterPerlindunganAnakPKS');
        Route::get('filter/perlindungan/anak/mou/{year}', 'DashboardController@filterPerlindunganAnakMOU');
        Route::get('filter/perlindungan/anak/adendum/{year}', 'DashboardController@filterPerlindunganAnakAdendum');
        Route::get('filter/perlindungan/anak/extension/{year}', 'DashboardController@filterPerlindunganAnakExtension');
        // Route::get('filter/perlindungan/hak/perempuan/pks/{year}', 'DashboardController@filterPerlindunganHakPerempuanPKS');
        Route::get('filter/perlindungan/hak/perempuan/mou/{year}', 'DashboardController@filterPerlindunganHakPerempuanMOU');
        Route::get('filter/perlindungan/hak/perempuan/adendum/{year}', 'DashboardController@filterPerlindunganHakPerempuanAdendum');
        Route::get('filter/perlindungan/hak/perempuan/extension/{year}', 'DashboardController@filterPerlindunganHakPerempuanExtension');
        // Route::get('filter/perlindungan/tumbuh/kembang/anak/pks/{year}', 'DashboardController@filterPerlindunganTumbuhKembangAnakPKS');
        Route::get('filter/perlindungan/tumbuh/kembang/anak/mou/{year}', 'DashboardController@filterPerlindunganTumbuhKembangAnakMOU');
        Route::get('filter/perlindungan/tumbuh/kembang/anak/adendum/{year}', 'DashboardController@filterPerlindunganTumbuhKembangAnakAdendum');
        Route::get('filter/perlindungan/tumbuh/kembang/anak/extension/{year}', 'DashboardController@filterPerlindunganTumbuhKembangAnakExtension');
        // Route::get('filter/agencies/pks/{year}', 'DashboardController@filterAgenciesPKS');
        Route::get('filter/agencies/mou/{year}', 'DashboardController@filterAgenciesMOU');
        // Route::get('filter/submission/pks/{year}', 'DashboardController@filterSubmissionPKS');
        Route::get('filter/submission/mou/{year}', 'DashboardController@filterSubmissionMOU');
        Route::get('filter/submission/adendum/{year}', 'DashboardController@filterSubmissionAdendum');
        Route::get('filter/submission/extension/{year}', 'DashboardController@filterSubmissionExtension');
        Route::get('filter/survey/{year}', 'DashboardController@filterSurvey');

        // Route::get('reset/kesetaraan/gender/pks', 'DashboardController@resetKesetaraanGenderPKS');
        Route::get('reset/kesetaraan/gender/mou', 'DashboardController@resetKesetaraanGenderMOU');
        // Route::get('reset/partisipasi/masyarakat/pks', 'DashboardController@resetPartisipasiMasyarakatPKS');
        Route::get('reset/partisipasi/masyarakat/mou', 'DashboardController@resetPartisipasiMasyarakatMOU');
        Route::get('reset/partisipasi/masyarakat/adendum', 'DashboardController@resetPartisipasiMasyarakatAdendum');
        Route::get('reset/partisipasi/masyarakat/extension', 'DashboardController@resetPartisipasiMasyarakatExtension');
        // Route::get('reset/perlindungan/anak/pks', 'DashboardController@resetPerlindunganAnakPKS');
        Route::get('reset/perlindungan/anak/mou', 'DashboardController@resetPerlindunganAnakMOU');
        Route::get('reset/perlindungan/anak/adendum', 'DashboardController@resetPerlindunganAnakAdendum');
        Route::get('reset/perlindungan/anak/extension', 'DashboardController@resetPerlindunganAnakExtension');
        // Route::get('reset/perlindungan/hak/perempuan/pks', 'DashboardController@resetPerlindunganHakPerempuanPKS');
        Route::get('reset/perlindungan/hak/perempuan/mou', 'DashboardController@resetPerlindunganHakPerempuanMOU');
        Route::get('reset/perlindungan/hak/perempuan/adendum', 'DashboardController@resetPerlindunganHakPerempuanAdendum');
        Route::get('reset/perlindungan/hak/perempuan/extension', 'DashboardController@resetPerlindunganHakPerempuanExtension');
        // Route::get('reset/perlindungan/tumbuh/kembang/anak/pks', 'DashboardController@resetPerlindunganTumbuhKembangAnakPKS');
        Route::get('reset/perlindungan/tumbuh/kembang/anak/mou', 'DashboardController@resetPerlindunganTumbuhKembangAnakMOU');
        Route::get('reset/perlindungan/tumbuh/kembang/anak/adendum', 'DashboardController@resetPerlindunganTumbuhKembangAnakAdendum');
        Route::get('reset/perlindungan/tumbuh/kembang/anak/extension', 'DashboardController@resetPerlindunganTumbuhKembangAnakExtension');
        // Route::get('reset/agencies/pks', 'DashboardController@resetAgenciesPKS');
        Route::get('reset/agencies/mou', 'DashboardController@resetAgenciesMOU');
        // Route::get('reset/submission/pks', 'DashboardController@resetSubmissionPKS');
        Route::get('reset/submission/mou', 'DashboardController@resetSubmissionMOU');
        Route::get('reset/submission/adendum', 'DashboardController@resetSubmissionAdendum');
        Route::get('reset/submission/extension', 'DashboardController@resetSubmissionExtension');
        Route::get('reset/survey', 'DashboardController@resetSurvey');
        //Information Deputi
        Route::get('/deputi/information', 'DeputiInformationController@index');
        Route::post('/deputi/information', 'DeputiInformationController@store');
        Route::delete('/deputi/information/{id}', 'DeputiInformationController@destroy');
        Route::post('/deputi/information/{id}/update', 'DeputiInformationController@update');
        Route::get('/deputi/information/{id}/edit', 'DeputiInformationController@edit');
        Route::delete('/deputi/information/{id}/file', 'DeputiInformationController@destroyFile');
        Route::post('/deputi/information/file', 'DeputiInformationController@storeFile');
        Route::get('/deputi/information/download/file/{id}', 'DeputiInformationController@downloadFileDeputiInformation');

        //Submisison Cooperation
        // Route::get('type/{id}', 'SubmissionProposalController@type');
        // Route::get('typeone/{id}', 'SubmissionProposalController@typeOne');
        Route::get('typetwo/{id}', 'SubmissionProposalController@typeTwo');
        Route::get('province/{id}', 'SubmissionProposalController@province');
        Route::get('regency/{id}', 'SubmissionProposalController@regency');
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

