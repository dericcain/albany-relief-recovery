<?php

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group([
    'prefix' => 'needs',
], function () {
    Route::get('/', 'NeedController@index')->name('needs.index')->middleware('auth');
    Route::get('/create', 'NeedController@create')->name('needs.create');
    Route::get('/{id}', 'NeedController@show')->name('needs.show')->middleware('auth');
    Route::post('/', 'NeedController@store')->name('needs.store');
});
