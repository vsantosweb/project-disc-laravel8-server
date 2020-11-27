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
                Route::get('/finish', 'DiscSessionController@finish');
            });

            Route::prefix('questions')->group(function () {

                Route::get('/', 'DiscQuestionsController@index');
                Route::get('/{uuid}', 'DiscQuestionsController@show');
            });
        });


        /* Customer  Routes */
        Route::prefix('customer')->namespace('Customer')->group(function () {
            Route::prefix('auth')->namespace('Auth')->group(function () {
                Route::prefix('register')->group(function () {
                    Route::post('/', 'CustomerRegisterController@register');
                });
                Route::post('login', 'CustomerAuthController@login');

                Route::middleware('auth:customer')->group(function () {
                    Route::get('logged', 'CustomerAuthController@logged');
                    Route::post('logout', 'CustomerAuthController@logout');
                });
            });

            Route::prefix('session')->group(function () {
                Route::get('hash-login', 'CustomerDiscSessionController@checkSessionHash');
            });
            Route::middleware('auth:customer')->group(function () {
            });
        });
    });
});
