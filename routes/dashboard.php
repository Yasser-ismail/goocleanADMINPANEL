<?php

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('companies', 'CompanyController')->except('show');
Route::get('companies/{id}/cities', 'CompanyController@getSupportedCityAjax');
Route::get('companies/{id}/dates/{c_id}/city', 'CompanyController@getAvailableDatesAjax');
Route::get('companies/{id}/services', 'CompanyController@getSupportingServicesAjax');

Route::resource('clients', 'ClientController')->except('show');
Route::get('clients/{id}/companies', 'ClientController@getSupportedCompaniesAjax');
Route::get('clients/{id}/city', 'ClientController@getClientCityAjax');

Route::resource('workinghours', 'WorkinghourController')->except('show');
Route::get('workinghours/{id}/cities', 'WorkinghourController@getWorkinghourCompanyCitiesAjax');
Route::get('workinghours/{id}/times', 'WorkinghourController@getAvailableTimesAjax');

Route::resource('appoientments', 'AppoientmentController');
Route::get('appoientments/{id}/city/{c_id}/companies', 'AppoientmentController@getSupportedCityCompanyAjax');
Route::get('appoientments/{id}/city/{c_id}/company/{com_id}/dates', 'AppoientmentController@getAvailableCompanyDatesAjax');
Route::get('appoientments/{id}/company/{com_id}/services', 'AppoientmentController@getAvailableCompanyServicesAjax');
Route::get('appoientments/{id}/workinghour/{d_id}/times', 'AppoientmentController@getDateAvailableTimesAjax');

Route::resource('cities', 'CityController')->except('show');

Route::resource('settings', 'SettingController')->only('index', 'edit', 'update');

Route::resource('services', 'ServiceController')->except('show');

