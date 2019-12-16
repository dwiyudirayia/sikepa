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
Route::get('/page/article/{slug}', 'FrontController@articleDetail')->name('article.detail');
Route::get('/page/submission/cooperation', 'FrontController@submissionProposal')->name('cooperation.submission');
Route::get('/page/our-contact', 'FrontController@ourContact')->name('our.contact');
Route::get('/page/satisfaction-survey', 'FrontController@satisfactionSurvey')->name('satisfaction.survey');
Route::post('/page/satisfaction-survey', 'FrontController@storeSatisfactionSurvey')->name('satisfaction.survey.store');
Route::get('/page/satisfaction-survey/{token}', 'FrontController@updateSatisfactionSurvey')->name('satisfaction.survey.update');
Route::get('/page/monitoring-result-cooperation', 'FrontController@monitoringResultCooperation')->name('monitoring.cooperation');
Route::get('/page/distribution/cooperation', 'FrontController@distributionOfCooperation')->name('distribution_of_cooperation');
Route::get('map/distribution/cooperation', 'FrontController@mapDistributionOfCooperation')->name('map.distribution_of_cooperation');
Route::get('map/distribution/cooperation/filter', 'FrontController@filterMapDistributionOfCooperation')->name('map.distribution_of_cooperation');
Route::post('/page/submission/cooperation', 'FrontController@submissionProposalsStore')->name('cooperation.submission.store');
// Route::get('/front/article', 'FrontController@article')->name('article');
// Route::get('/front/article/{slug}', 'FrontController@articleDetail');
Route::get('/front/download/pdf/{file}', 'FrontController@downloadPdf');
Route::get('/front/submission', 'FrontController@submission')->name('submission.cooperation');
Route::get('/download/format/mou', 'ExportController@formatOldMOU');
Route::get('/download/data/monev/pdf', 'ExportController@downloadDataMonevPDF');
Route::get('/download/data/monev/detail/pdf/{id}', 'ExportController@downloadDataMonevDetailPDF');
Route::post('/suggestion', 'FrontController@storeSuggest')->name('suggestion.store');

//AJAX
Route::get('/ajax/typeone/{id}', 'FrontController@typeOne');
Route::get('/ajax/typetwo/{id}', 'FrontController@typeTwo');
Route::get('/ajax/province/{id}', 'FrontController@province');
Route::get('/ajax/regency/{id}', 'FrontController@regency');

Route::get('/page/{slug}', 'FrontController@page')->name('page');
Route::get('/information/{slug}', 'FrontController@deputyInformation')->name('information');
Route::get('/download/information/file/{id}', 'FrontController@downloadFileInformation')->name('information.download.file');
Route::get('/information/detail/{slug}', 'FrontController@deputyInformationDetail')->name('information.detail');
Route::get('/{any}', function(){
    return view('layouts.app');
})->where('any', '.*');
