<?php
##### NON-AUTHENTICATED ROUTES START ######

Route::get('/', 'IndexController@guest_index');

##### NON-AUTHENTICATED ROUTES END ######


##### ADMIN AUTHENTICATED ROUTES START ######
Route::get('/admin', 'IndexController@admin_index')->middleware('auth','admin');

# Country routes
Route::get('/admin/countries', 'CountryController@index')->middleware('auth','admin');

Route::get('/admin/countries/create', 'CountryController@create')->middleware('auth','admin');

Route::post('/admin/countries', 'CountryController@store')->middleware('auth','admin');

Route::get('/admin/countries/{id}/edit', 'CountryController@edit')->middleware('auth','admin');

Route::put('/admin/countries/{id}', 'CountryController@update')->middleware('auth','admin');

Route::get('/admin/countries/{id}/delete', 'CountryController@delete')->middleware('auth','admin');

Route::delete('/admin/countries/{id}', 'CountryController@destroy')->middleware('auth','admin');

Route::get('/admin/countries/{id}/regions', 'CountryController@regions')->middleware('auth','admin');

# Region routes
Route::get('/admin/countries/{cid}/regions/create', 'RegionController@create')->middleware('auth','admin');

Route::get('/admin/countries/{cid}/regions/{rid?}/create', 'RegionController@create')->middleware('auth','admin');

Route::post('/admin/countries/{cid}/regions', 'RegionController@store')->middleware('auth','admin');

Route::post('/admin/countries/{cid}/regions/{rid?}', 'RegionController@store')->middleware('auth','admin');

Route::get('/admin/countries/{cid}/regions/{rid}/delete', 'RegionController@delete')->middleware('auth','admin');

Route::delete('/admin/countries/{cid}/regions/{rid}', 'RegionController@destroy')->middleware('auth','admin');

Route::get('/admin/countries/{cid}/regions/{rid}/edit', 'RegionController@edit')->middleware('auth','admin');

Route::put('/admin/countries/{cid}/regions/{rid}', 'RegionController@update')->middleware('auth','admin');


# Winery Routes
Route::get('/admin/wineries', 'WineryController@index')->middleware('auth','admin');

Route::get('/admin/wineries/create', 'WineryController@create')->middleware('auth','admin');

Route::post('/admin/wineries', 'WineryController@store')->middleware('auth','admin');

Route::get('/admin/wineries/{id}', 'WineryController@show')->middleware('auth','admin');

Route::get('/admin/wineries/{id}/edit', 'WineryController@edit')->middleware('auth','admin');

Route::put('/admin/wineries/{id}', 'WineryController@update')->middleware('auth','admin');

Route::get('/admin/wineries/{id}/delete', 'WineryController@delete')->middleware('auth','admin');

Route::delete('/admin/wineries/{id}', 'WineryController@destroy')->middleware('auth','admin');


# Wine Routes
Route::get('/admin/wineries/{id}/wines/create', 'WineController@create')->middleware('auth','admin');

Route::post('/admin/wineries/{id}/wines', 'WineController@store')->middleware('auth','admin');

Route::get('/admin/wineries/{id}/wines/{wid}/edit', 'WineController@edit')->middleware('auth','admin');

Route::put('/admin/wineries/{id}/wines/{wid}', 'WineController@update')->middleware('auth','admin');

Route::get('/admin/wineries/{id}/wines/{wid}/delete', 'WineController@delete')->middleware('auth','admin');

Route::delete('/admin/wineries/{id}/wines/{wid}', 'WineController@destroy')->middleware('auth','admin');

Route::get('/admin/wineries/{id}/wines/{wid}', 'WineController@show')->middleware('auth','admin');


# User Routes
Route::get('/admin/users', 'UserController@index')->middleware('auth','admin');

Route::get('/admin/users/create', 'UserController@create')->middleware('auth','admin');

Route::post('/admin/users', 'UserController@store')->middleware('auth','admin');

Route::get('/admin/users/{id}/delete', 'UserController@delete')->middleware('auth','admin');

Route::delete('/admin/users/{id}', 'UserController@destroy')->middleware('auth','admin');

Route::get('/admin/users/{id}/edit', 'UserController@edit')->middleware('auth','admin');

Route::put('/admin/users/{id}', 'UserController@update')->middleware('auth','admin');

Route::get('/admin/users/{id}', 'UserController@show')->middleware('auth','admin');

##### ADMIN AUTHENTICATED ROUTES END ######


##### USER AUTHENTICATED ROUTES START ######

Route::get('/user', 'UserIndexController@index')->middleware('auth','standard');

Route::get('/user/reviews/create', 'UserIndexController@create')->middleware('auth','standard');

Route::post('/user/reviews/create', 'UserIndexController@store')->middleware('auth','standard');

##### USER AUTHENTICATED ROUTES END ######

Auth::routes();
