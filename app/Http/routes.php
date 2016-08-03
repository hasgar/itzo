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


Route::get('/', 'HomeController@index');
Route::post('/getCities', 'LocationController@getCities');
Route::post('/getStates', 'LocationController@getStates');
Route::get('/selectHealthcare', 'HealthcareController@selectHealthcare');
Route::get('/healthcare/{id}/{name}', 'HealthcareController@showHealthcare');
Route::get('/book/{id}/{name}', 'HealthcareController@bookHealthcare');
Route::post('/booked', 'HealthcareController@book')->middleware('isUser');
Route::get('/signin', 'UserController@showSignIn');
Route::get('/signup', 'UserController@showSignUp');
Route::get('/user/dashboard', 'UserController@dashboard')->middleware('isUser');

Route::auth();

Route::get('/add-health-care', 'HealthcareController@addHealthcare');

Route::post('/addRating', 'RatingController@addRating');
Route::get('/user/cancel/{id}/{name}', 'HealthcareController@cancelBooking')->middleware('isUser');
Route::get('/user/chat/{id}/{name}', 'UserController@chat')->middleware('isUser');
Route::post('/user/chatSend', 'UserController@chatSend')->middleware('isUser');

Route::get('/noPermission', 'UserController@noPermission');
Route::get('/healthcare/dashboard', 'UserController@hDashboard')->middleware('isHealthcare');
Route::get('/healthcare/cancel/{id}/{name}', 'HealthcareController@cancelBook')->middleware('isHealthcare');
Route::get('/healthcare/confirm/{id}/{name}', 'HealthcareController@confirmBook')->middleware('isHealthcare');
Route::get('/healthcare/chat/{id}/{name}', 'UserController@hChat')->middleware('isHealthcare');
Route::post('/healthcare/chatSend', 'UserController@hChatSend')->middleware('isHealthcare');
