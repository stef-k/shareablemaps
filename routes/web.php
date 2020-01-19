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

Route::get('/help', function () {
    return view('help');
})->name('help');

Route::get('/showcase', function () {
    return view('showcase');
})->name('showcase');

Route::get('/contact', 'MailController@show')->name('contact');
Route::post('/contact', 'MailController@postMail')->name('postMail');

Route::get('/tos', function () {
    return view('tos');
})->name('tos');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/maps/{id}', 'MapController@publicMaptile');

// Auth routes & Disable registrations
Auth::routes(['register' => false]);
// User home
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/', 'IndexController@index')->name('index');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    // Maps
    Route::get('mapslist', 'MapController@mapslist')->name('mapslist');
    Route::get('maps/new', 'MapController@newMap')->name('newmap');
    Route::post('maps/new', 'MapController@saveNewMap')->name('savenewmap');
    Route::get('maps/{id}', 'MapController@showMap')->name('showmap');
    Route::post('maps/{id}/delete', 'MapController@deleteMap')->name('deletemap');
    Route::post('maps/{id}/save', 'MapController@saveMap');
    // Tags
    Route::get('tags', 'TagController@showTags');
    Route::post('tags', 'TagController@edit');
    Route::post('tags/{id}/delete', 'TagController@deleteTag');
});
