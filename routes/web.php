<?php


Route::group(['middleware' => 'auth'], function() {
	
	Route::resource('template', 'TemplateController');
	Route::resource('bunch', 'BunchController');
	Route::resource('campaign', 'CampaignController');
	Route::resource('subscriber', 'SubscriberController');
	Route::resource('report', 'ReportController');

	Route::get('/campaign/send/{campaign}', 'CampaignController@send')->name('campaignSend');

	Route::get('bunch/{bunch}/subscriber/{subscriber}', 'SubscriberController@show');

});


Route::get('bunch/unsubscribe/{bunch}/subscriber/{subscriber}', 'BunchController@unsubscribe');

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');


