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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// answers用に追記
Route::resource('answers', 'Api\AnswersController')
    ->only(['index', 'show', 'store']);

Route::put('answers/{id}/{correct}/{wrong}/report', 'Api\ReportAnswersController@update');
// Route::put('answers/{id}/update', 'Api\AnswersController@update');