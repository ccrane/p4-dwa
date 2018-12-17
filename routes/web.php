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

# User authenticated routes
Route::get('/user', function () {
    return view('user.index');
});

