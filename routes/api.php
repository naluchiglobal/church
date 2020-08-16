<?php

use Illuminate\Http\Request;

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

//Auth apis
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('prayerrequest', 'AuthController@PrayerRequest')->middleware('cors');
Route::get('events', 'AuthController@Events')->middleware('cors');
Route::post('donations', 'AuthController@MakeDonation')->middleware('cors');
Route::get('faqs', 'AuthController@FAQ')->middleware('cors');
Route::get('sermons', 'AuthController@Sermon')->middleware('cors');
Route::get('announcements', 'AuthController@Announcement')->middleware('cors');
Route::get('viewprayer', 'AuthController@ViewPrayer')->middleware('cors');
Route::get('students/{id}', 'ApiController@getStudent');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@getAuthUser');
    Route::post('logout', 'AuthController@logout');
	Route::get('/users','AuthController@index');
    Route::get('users/{user}','AuthController@show');
    Route::patch('users/{user}','AuthController@update');



});
