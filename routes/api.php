<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->namespace('Api\v1')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | BackOffice Routes
    |--------------------------------------------------------------------------
    */

    Route::namespace('Backoffice')->group(function () {

        Route::prefix('disc')->namespace('Disc')->group(function () {

            Route::get('questions', 'DiscQuestionsController@index');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Client Routes
    |--------------------------------------------------------------------------
    */

    Route::prefix('client')->namespace('Client')->group(function () {

        Route::prefix('disc')->namespace('Disc')->group(function () {

            Route::prefix('session')->group(function () {
                Route::post('/start', 'DiscSessionController@start');
                Route::post('/finish', 'DiscSessionController@finish');
            });

            Route::prefix('questions')->group(function () {
                Route::get('/', 'DiscQuestionsController@index');
                Route::get('/{uuid}', 'DiscQuestionsController@show');
            });
            Route::get('intensities', 'DiscController@intensities');
        });


        /* Respondent  Routes */
        Route::prefix('respondent')->namespace('Respondent')->group(function () {
            Route::prefix('auth')->namespace('Auth')->group(function () {
                Route::prefix('register')->group(function () {
                    Route::post('/', 'RespondentRegisterController@register');
                });
                Route::post('login', 'RespondentAuthController@login');

                Route::middleware('auth:Respondent,Respondent-token')->group(function () {
                    Route::get('logged', 'RespondentAuthController@logged');
                    Route::post('logout', 'RespondentAuthController@logout');
                });
            });

            Route::prefix('session')->group(function () {
                Route::get('hash-login', 'RespondentDiscSessionController@hashLogged');
                Route::post('shutdown', 'RespondentDiscSessionController@hashLogout');
                Route::post('create', 'RespondentDiscSessionController@getToken');
            });

            Route::get('disc/{code}', 'RespondentController@getTest');
        });
    });
});
