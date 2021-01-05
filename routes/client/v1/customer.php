<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CUSTOMER Routes
|--------------------------------------------------------------------------
|
| Here is where you can register CUSTOMER routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('customer')->namespace('Api\v1\Client\Customer')->group(function () {
    Route::prefix('auth')->namespace('Auth')->group(function () {

        Route::post('login', 'CustomerAuthController@login');

        Route::middleware('auth:customer')->group(function () {
            Route::post('logout', 'CustomerAuthController@logout');
            Route::get('logged', 'CustomerAuthController@logged');
        });

    });

    Route::middleware('auth:customer')->group(function () {

        Route::prefix('profile')->group(function(){
            Route::patch('update', 'CustomerProfileController@updateProfile');
            Route::put('change-password', 'CustomerProfileController@changePassword');

        });

        Route::resource('respondents', 'CustomerRespondentController');
        Route::post('respondent-lists/upload', 'CustomerRespondentListController@uploadFile');
        Route::resource('respondent-lists', 'CustomerRespondentListController');
        Route::post('create-disc', 'CustomerDiscController@create');
        Route::get('filter', 'CustomerDiscController@filter');

        Route::prefix('settings')->group(function(){
            Route::resource('custom-fields', 'CustomerRespondentCustomFieldController');
        });
    });

});
