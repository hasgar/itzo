<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/up', 'HomeController@up');
Route::get('/', 'HomeController@index');
Route::post('/getCities', 'LocationController@getCities');
Route::post('/getStates', 'LocationController@getStates');
Route::get('/selectHealthcare', 'HealthcareController@selectHealthcare');
Route::get('/healthcare/type/{name}', 'HealthcareController@typeHealthcares');
Route::get('/healthcare/type/{name}', 'HealthcareController@typeHealthcares');
Route::get('/healthcare/{id}/{name}', 'HealthcareController@showHealthcare');
Route::get('/book/{id}/{name}', 'HealthcareController@bookHealthcare');
Route::post('/booked', 'HealthcareController@book')->middleware('isUser');
Route::get('/signin', 'UserController@showSignIn');
Route::get('/signup', 'UserController@showSignUp');
Route::get('/user/dashboard', 'UserController@dashboard')->middleware('isUser');
Route::get('/contact', 'HomeController@contact');
Route::post('/contactSend', 'HomeController@contactSend');


Route::auth();

Route::get('/add-health-care', 'HealthcareController@addHealthcare');

Route::get('/404', 'HomeController@notFound');
Route::get('/testMail', 'UserController@testMail');
Route::post('/addRating', 'RatingController@addRating');
Route::post('/otpVerification', 'UserController@otpVerification');
Route::post('/healthcareOtpVerification', 'UserController@healthcareOtpVerification');

Route::get('/userOtp', 'UserController@userOtp');
Route::get('/paymentPending', 'UserController@paymentPending');
Route::get('/healthcareOtp', 'UserController@healthcareOtp');
Route::get('/about', 'HomeController@about');
Route::get('/user/cancel/{id}/{name}', 'HealthcareController@cancelBooking')->middleware('isUser');
Route::get('/user/chat/{id}/{name}', 'UserController@chat')->middleware('isUser');
Route::post('/user/chatSend', 'UserController@chatSend')->middleware('isUser');
Route::get('/admin/chat/{id}/{name}/{healthcare}', 'UserController@aChat')->middleware('isAdmin');
Route::get('/noPermission', 'UserController@noPermission');
Route::get('/healthcare/successfullyRegistered', 'UserController@hSuccessfullyRegistered')->middleware('isHealthcare');
Route::get('/user/successfullyRegistered', 'UserController@uSuccessfullyRegistered')->middleware('isUser');
Route::get('/healthcare/dashboard', 'UserController@hDashboard')->middleware('isHealthcare');
Route::post('/healthcare/update', 'HealthcareController@update')->middleware('isHealthcare');
Route::get('/admin/dashboard', 'UserController@aDashboard')->middleware('isAdmin');
Route::get('/admin/users', 'UserController@aUsers')->middleware('isAdmin');
Route::get('/admin/healthcares', 'UserController@aHealthcares')->middleware('isAdmin');
Route::get('/admin/settings', 'UserController@aSettings')->middleware('isAdmin');
Route::get('/user/settings', 'UserController@uSettings')->middleware('isUser');
Route::get('/healthcare/settings', 'UserController@hSettings')->middleware('isHealthcare');
Route::get('/healthcare/edit', 'UserController@admin/healthcare/update')->middleware('isHealthcare');
Route::get('/admin/block/{id}/{name}', 'UserController@block')->middleware('isAdmin');
Route::get('/admin/healthcare/paymentDone/{id}/{name}', 'UserController@paymentDoneComplete')->middleware('isAdmin');

Route::get('/admin/healthcare/verifiedComplete/{id}/{name}', 'UserController@verifiedComplete')->middleware('isAdmin');

Route::get('/admin/healthcare/approve/{id}/{name}', 'UserController@hApprove')->middleware('isAdmin');
Route::get('/admin/healthcare/edit/{id}/{name}', 'UserController@aEdit')->middleware('isAdmin');
Route::get('/admin/healthcare/block/{id}/{name}', 'UserController@hBlock')->middleware('isAdmin');
Route::get('/admin/bookings/{id}/{name}', 'UserController@userBookings')->middleware('isAdmin');
Route::get('/admin/unblock/{id}/{name}', 'UserController@unblock')->middleware('isAdmin');
Route::get('/healthcare/cancel/{id}/{name}', 'HealthcareController@cancelBook')->middleware('isHealthcare');
Route::get('/healthcare/confirm/{id}/{name}', 'HealthcareController@confirmBook')->middleware('isHealthcare');
Route::get('/healthcare/chat/{id}/{name}', 'UserController@hChat')->middleware('isHealthcare');
Route::post('/healthcare/chatSend', 'UserController@hChatSend')->middleware('isHealthcare');
Route::post('/admin/healthcare/update', 'UserController@editHealthcare')->middleware('isHealthcare');
Route::post('/admin/updateEmail', 'UserController@aUpdateEmail')->middleware('isAdmin');
Route::post('/admin/updatePassword', 'UserController@aUpdatePassword')->middleware('isAdmin');
Route::post('/user/updateEmail', 'UserController@uUpdateEmail')->middleware('isUser');
Route::post('/user/updatePassword', 'UserController@uUpdatePassword')->middleware('isUser');
Route::post('/healthcare/updateEmail', 'UserController@hUpdateEmail')->middleware('isHealthcare');
Route::post('/healthcare/updatePassword', 'UserController@hUpdatePassword')->middleware('isHealthcare');

Route::get('/admin/emailSuccess', 'UserController@aeSuccess')->middleware('isAdmin');
Route::get('/admin/passwordSuccess', 'UserController@apSuccess')->middleware('isAdmin');
Route::get('/admin/error', 'UserController@aError')->middleware('isAdmin');
Route::get('/user/emailSuccess', 'UserController@ueSuccess')->middleware('isUser');
Route::get('/user/passwordSuccess', 'UserController@upSuccess')->middleware('isUser');
Route::get('/user/error', 'UserController@uError')->middleware('isUser');
Route::get('/healthcare/emailSuccess', 'UserController@heSuccess')->middleware('isHealthcare');
Route::get('/healthcare/passwordSuccess', 'UserController@hpSuccess')->middleware('isHealthcare');
Route::get('/healthcare/error', 'UserController@hError')->middleware('isHealthcare');
