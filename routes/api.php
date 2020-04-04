<?php


Route::group(['namespace' => 'Api'], function () {

    Route::get('users', 'UserController@index')->name('api.users');

});
