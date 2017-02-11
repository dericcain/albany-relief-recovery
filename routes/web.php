<?php

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group([
    'prefix' => 'needs',
], function () {
    Route::get('/', 'NeedController@index')->name('needs.index')->middleware('is-worker');
    Route::get('/create', 'NeedController@create')->name('needs.create');
    Route::get('/{id}', 'NeedController@show')->name('needs.show')->middleware('is-worker');
    Route::post('/', 'NeedController@store')->name('needs.store');
    Route::post('/{id}', 'NeedController@update')->name('needs.update')->middleware('is-worker');
    Route::get('/{id}/edit', 'NeedController@edit')->name('needs.edit')->middleware('is-worker');
});

Route::group([
    'prefix' => 'volunteers',
], function () {
    Route::get('/', 'VolunteerController@index')->name('volunteers.index')->middleware('is-worker');
    Route::post('/', 'VolunteerController@store')->name('volunteers.store');
    Route::get('/create', 'VolunteerController@create')->name('volunteers.create');
    Route::get('/{id}', 'VolunteerController@show')->name('volunteers.show')->middleware('is-worker');
    Route::post('/{id}', 'VolunteerController@update')->name('volunteers.update')->middleware('is-worker');
    Route::get('/{id}/edit', 'VolunteerController@edit')->name('volunteers.edit')->middleware('is-worker');
});

Route::group([
    'prefix' => 'group-volunteers',
], function () {
    Route::get('/', 'GroupVolunteerController@index')->name('group_volunteers.index')->middleware('is-worker');
    Route::post('/', 'GroupVolunteerController@store')->name('group_volunteers.store');
    Route::get('/create', 'GroupVolunteerController@create')->name('group_volunteers.create');
    Route::get('/{id}', 'GroupVolunteerController@show')->name('group_volunteers.show')->middleware('is-worker');
    Route::post('/{id}', 'GroupVolunteerController@update')->name('group_volunteers.update')->middleware('is-worker');
    Route::get('/{id}/edit', 'GroupVolunteerController@edit')->name('group_volunteers.edit')->middleware('is-worker');
});

Route::group([
    'prefix' => 'urgent-needs',
], function () {
    Route::get('/', 'UrgentNeedController@index')->name('urgent_needs.index')->middleware('is-worker');
    Route::get('/create', 'UrgentNeedController@create')->name('urgent_needs.create')->middleware('is-worker');
    Route::get('/{id}', 'UrgentNeedController@show')->name('urgent_needs.show')->middleware('is-worker');
    Route::post('/', 'UrgentNeedController@store')->name('urgent_needs.store')->middleware('is-worker');
    Route::post('/{id}', 'UrgentNeedController@update')->name('urgent_needs.update')->middleware('is-worker');
    Route::get('/{id}/edit', 'UrgentNeedController@edit')->name('urgent_needs.edit')->middleware('is-worker');
});

Route::group([
    'prefix' => 'map',
    'middleware' => 'web'
], function () {
    Route::get('/', 'MapController@index')->name('map.index');
    Route::get('/needs', 'MapController@needs')->name('map.needs');
});

Route::group([
    'prefix' => 'users',
    'middleware' => 'is-admin'
], function () {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::post('/', 'UserController@store')->name('users.store');
    Route::post('/update/{id}', 'UserController@update')->name('users.update');
    Route::post('/{id}/delete', 'UserController@destroy')->name('users.destroy');
});


Route::post('/print-needs', 'PrintNeedController@store')->name('print.needs');
Route::post('/print-stats', 'PrintNeedController@stats')->name('print.stats');
Route::get('/stats', 'StatController@index');
Route::get('/stats/show', 'StatController@show')->name('stats.show');
Route::post('/messages', 'MessageController@store');