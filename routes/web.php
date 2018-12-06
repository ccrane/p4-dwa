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

# User authenticated routes
Route::get('/user', function () {
    return view('user.index');
});

