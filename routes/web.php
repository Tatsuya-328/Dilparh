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

Auth::routes();

Route::get('/home', 'TopController@index')->name('index');

Route::get('/', 'TopController@index')->name('index');

Route::get('/how', 'TopController@how')->name('how');

Route::get('/how_sp', 'TopController@how_sp')->name('how_sp');

Route::get('/about', 'TopController@about')->name('about');

Route::get('/config', 'TopController@config')->name('config');

Route::post('/edit_account', 'TopController@edit_account')->name('edit_account');

Route::post('/delete/{part?}', 'TopController@delete')->name('delete');

Route::get('/dictionary/{language?}', 'TopController@dictionary')->name('dictionary');

// Route::get('/dictionary_urdu', 'TopController@dictionary_urdu')->name('dictionary_urdu');

Route::post('/dictionary/{language?}/result', 'TopController@dictionary_result')->name('dictionary_result');

Route::get('/select_part', 'TopController@select_part')->name('select_part');

Route::get('/start/{part?}', 'TopController@start')->name('start');

Route::post('/start/{part?}/quiz', 'TopController@quiz')->name('quiz');

Route::post('/start/{part?}/quiz/{review?}', 'TopController@quiz')->name('quiz');
