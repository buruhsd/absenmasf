<?php

use App\Http\Controllers\LocaleController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');

    Route::get('peserta/register', 'Backend\PesertaController@register')->name('peserta.register');
    Route::post('peserta/confirm', 'Backend\PesertaController@confirm_register')->name('peserta.confirm');

    Route::get('peserta/confirm/{id}', 'Backend\PesertaController@confirm_register')->name('peserta.confirm.id');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');

    Route::get('peserta', 'Backend\PesertaController@index')->name('peserta');
    Route::get('peserta/show/{peserta}', 'Backend\PesertaController@show')->name('peserta.show');
    Route::get('peserta/create', 'Backend\PesertaController@add')->name('peserta.add');
    Route::post('peserta/store', 'Backend\PesertaController@store')->name('peserta.store');
});
