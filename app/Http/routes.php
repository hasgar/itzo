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
Route::get('/book/{id}/{name}', 'HealthcareController@bookHealthcare')->middleware('isUser');
Route::get('/signin', 'UserController@showSignIn');
Route::get('/signup', 'UserController@showSignUp');
Route::get('/user/dashboard', 'UserController@dashboard');

Route::auth();

Route::get('/add-health-care', 'HealthcareController@addHealthcare');

Route::post('/addRating', 'RatingController@addRating');