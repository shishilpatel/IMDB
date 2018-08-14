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


Route::get('/lists', 'iIMDBController@index')->name('lists');


Route::prefix('movie')->group(function () {

    Route::get('/', 'iIMDBController@index');
    Route::get('/title/{title}', 'iIMDBController@searchByTitle');
    Route::get('/year/{year}', 'iIMDBController@searchByYear');
    Route::get('/rating/{rating}', 'iIMDBController@searchByRating');
    Route::get('/genre/{genre}', 'iIMDBController@searchByGenre');


    Route::put('/rating/{title}/{rating}', 'iIMDBController@update');
    Route::put('/genre/{title}/{genre}', 'iIMDBController@update');
});
