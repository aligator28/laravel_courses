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



Route::group(['middleware' => 'auth'], function() {
	
	Route::resource('template', 'TemplateController');
	Route::resource('bunch', 'BunchController');
	Route::resource('campaign', 'CampaignController');
	Route::resource('subscriber', 'SubscriberController');

	Route::get('/campaign/send/{campaign}', 'CampaignController@send')->name('campaignSend');

});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');


