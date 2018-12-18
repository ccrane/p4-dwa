<?php

# Non-authenticated routes
Route::get('/', function () {
    return view('index');
});

# Admin authenticated routes
Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/countries', 'CountryController@index');

Route::get('/admin/countries/create', 'CountryController@create');

Route::post('/admin/countries', 'CountryController@store');

Route::get('/admin/countries/{id}/edit', 'CountryController@edit');

Route::put('/admin/countries/{id}', 'CountryController@update');

Route::get('/admin/countries/{id}/delete', 'CountryController@delete');

Route::delete('/admin/countries/{id}', 'CountryController@destroy');

Route::get('/admin/countries/{id}/regions', 'CountryController@regions');

Route::get('/admin/countries/{cid}/regions/create', 'RegionController@create');

Route::get('/admin/countries/{cid}/regions/{rid?}/create', 'RegionController@create');

Route::post('/admin/countries/{cid}/regions', 'RegionController@store');

Route::post('/admin/countries/{cid}/regions/{rid?}', 'RegionController@store');

Route::get('/admin/countries/{cid}/regions/{rid}/delete', 'RegionController@delete');

Route::delete('/admin/countries/{cid}/regions/{rid}', 'RegionController@destroy');

Route::get('/admin/countries/{cid}/regions/{rid}/edit', 'RegionController@edit');

Route::put('/admin/countries/{cid}/regions/{rid}', 'RegionController@update');

# User authenticated routes
Route::get('/user', function () {
    return view('user.index');
});

