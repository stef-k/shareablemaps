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

Route::group(['prefix' => 'v1'], function () {
    Route::get('tags', 'TagController@tags');
    Route::get('places', 'IndexController@getNames');
    Route::get('places-filtered', 'IndexController@getNamesFiltered');
    Route::get('filter-places/{name}', 'IndexController@getPlaces');
    Route::get('maps', 'MapController@mapsListData');
});
