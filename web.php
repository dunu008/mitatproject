<?php

//DASHBOARD
Route::get('/dashboard','DashboardController@dashboard');

//REGISTRATIONS
Route::get('/registration','RegistrationController@index');
Route::delete('/registration/{id}','RegistrationController@destroy');
Route::get('/registration/edit/{id}','RegistrationController@edit');
Route::patch('/registration/{id}','RegistrationController@update');
Route::get('/registration/single-registration','RegistrationController@create_single');
Route::post('/registration/single-registration','RegistrationController@store_single');
Route::get('/registration/multiple-registration','RegistrationController@create_multiple');
Route::post('/registration/multiple-registration','RegistrationController@store_multiple');

//VENUES
Route::resource('venues','VenueController');

//ADMISSIONS
Route::get('/admissions','AdmissionController@index');
Route::get('/admissions/edit','AdmissionController@edit');
Route::patch('/admissions/edit','AdmissionController@saveAdmissions');
Route::get('/admissions/downloadPDF/{id}','AdmissionController@downloadPDF');

//TEST RESULTS
Route::get('/test-results','TestResultsController@index');
Route::get('/test-results/multiple-results','TestResultsController@create');
Route::patch('/test-results/multiple-results','TestResultsController@saveMultiple');
Route::delete('/test-results/{id}','TestResultsController@destroy');
Route::get('/test-results/edit/{id}','TestResultsController@edit');
Route::patch('/test-results/{id}','TestResultsController@update');

//ANALYZE
Route::get('/analyze','AnalyzeController@index');
Route::get('/analyze/filter','AnalyzeController@filter');
Route::post('/analyze','AnalyzeController@setQualified');
Route::get('/analyze/statistics','AnalyzeController@statictics');
Route::get('/analyze/statistics/sectionA','AnalyzeController@graphSectionA');
Route::get('/analyze/statistics/sectionB','AnalyzeController@graphSectionB');
Route::get('/analyze/statistics/sectionC','AnalyzeController@graphSectionC');
Route::get('/analyze/statistics/total','AnalyzeController@graphTotal');

//VIEW APPLICANTS
Route::get('/viewApplicants','ApplicantController@viewApplicants');
Route::get('/viewApplicants/search','ApplicantController@viewApplicantsSearch');
Route::get('/viewApplicants/statistics','ApplicantController@applicantStatistics');
Route::get('/viewApplicants/statistics/pieChart','ApplicantController@applicantPieChart');
Route::get('/viewApplicants/statistics/scatterPlot','ApplicantController@applicantScatterPlot');

//ARCHIVE
Route::get('/archive','ArchiveController@index');
Route::get('/archive/summary','ArchiveController@viewSummary');
Route::get('/archive/currentYear','ArchiveController@addCurrentYear');

//AUTHENTICATION
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'DashboardController@dashboard');

//ONLINE WEBPAGES
Route::get('/online-registration','OnlineController@viewRegistration');
Route::post('/online-registration','OnlineController@postRegistration');
Route::get('/qualified','OnlineController@viewQualified');
Route::get('/qualified/checkApplicant','OnlineController@getQualified');