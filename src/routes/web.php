<?php

Route::group(['namespace' => 'App\Wire\Http\Controllers', 'middleware' => 'web'], function () {
    Route::get('wire/login', 'Authentication\LoginController@viewLogin')->name('viewLogin');
    Route::post('wire/login', 'Authentication\LoginController@attemptLogin')->name('attemptLogin');

    Route::group(['middleware' => 'wire_interface'], function () {
        Route::prefix('wire')->group(function () {
            Route::get('/dashboard', 'DashboardController@dashboard')->name('wire.dashboard');

            Route::get('logout', 'Authentication\LogoutController@logout')->name('logout-admin');

            Route::get('{identifier}', 'CrudController@index')->name('wire.index');
            Route::post('{identifier}', 'CrudController@store')->name('wire.store');
            Route::get('{identifier}/create', 'CrudController@create')->name('wire.create');
            Route::get('{identifier}/recycle', 'CrudController@recycle')->name('wire.recycle');
            Route::get('{identifier}/restore/{id}', 'CrudController@restore')->name('wire.restore');
            Route::delete('{identifier}/{id}', 'CrudController@destroy')->name('wire.destroy');
            Route::put('{identifier}/{id}', 'CrudController@update')->name('wire.update');
            Route::get('{identifier}/show/{id}', 'CrudController@show')->name('wire.show');
            Route::get('{identifier}/{id}/edit', 'CrudController@edit')->name('wire.edit');
        });
    });
});
