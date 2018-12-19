<?php
##### NON-AUTHENTICATED ROUTES START ######

Route::get('/', function () {
    return view('index');
});

##### NON-AUTHENTICATED ROUTES END ######


##### ADMIN AUTHENTICATED ROUTES START ######
Route::get('/admin', function () {
    return view('admin.index');
});

# Country routes
Route::get('/admin/countries', 'CountryController@index');

Route::get('/admin/countries/create', 'CountryController@create');

Route::post('/admin/countries', 'CountryController@store');

Route::get('/admin/countries/{id}/edit', 'CountryController@edit');

Route::put('/admin/countries/{id}', 'CountryController@update');

Route::get('/admin/countries/{id}/delete', 'CountryController@delete');

Route::delete('/admin/countries/{id}', 'CountryController@destroy');

Route::get('/admin/countries/{id}/regions', 'CountryController@regions');

# Region routes
Route::get('/admin/countries/{cid}/regions/create', 'RegionController@create');

Route::get('/admin/countries/{cid}/regions/{rid?}/create', 'RegionController@create');

Route::post('/admin/countries/{cid}/regions', 'RegionController@store');

Route::post('/admin/countries/{cid}/regions/{rid?}', 'RegionController@store');

Route::get('/admin/countries/{cid}/regions/{rid}/delete', 'RegionController@delete');

Route::delete('/admin/countries/{cid}/regions/{rid}', 'RegionController@destroy');

Route::get('/admin/countries/{cid}/regions/{rid}/edit', 'RegionController@edit');

Route::put('/admin/countries/{cid}/regions/{rid}', 'RegionController@update');


# Winery Routes
Route::get('/admin/wineries', 'WineryController@index');

Route::get('/admin/wineries/create', 'WineryController@create');

Route::post('/admin/wineries', 'WineryController@store');

Route::get('/admin/wineries/{id}', 'WineryController@show');

Route::get('/admin/wineries/{id}/edit', 'WineryController@edit');

Route::put('/admin/wineries/{id}', 'WineryController@update');

Route::get('/admin/wineries/{id}/delete', 'WineryController@delete');

Route::delete('/admin/wineries/{id}', 'WineryController@destroy');


# Wine Routes
Route::get('/admin/wineries/{id}/wines/create', 'WineController@create');

Route::post('/admin/wineries/{id}/wines', 'WineController@store');

Route::get('/admin/wineries/{id}/wines/{wid}/edit', 'WineController@edit');

Route::put('/admin/wineries/{id}/wines/{wid}', 'WineController@update');

Route::get('/admin/wineries/{id}/wines/{wid}/delete', 'WineController@delete');

Route::delete('/admin/wineries/{id}/wines/{wid}', 'WineController@destroy');

##### ADMIN AUTHENTICATED ROUTES END ######


##### USER AUTHENTICATED ROUTES START ######

Route::get('/user', function () {
    return view('user.index');
});

##### USER AUTHENTICATED ROUTES END ######
