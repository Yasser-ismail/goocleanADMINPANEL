<?php

Route::redirect('/', 'dashboard');

Auth::routes();
//Route::get('/', function (){
//    $locale = App::getLocale();
//
//    return $locale;
//});
