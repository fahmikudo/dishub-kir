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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
    Route::prefix('datamasuk')->group(function () {
        //tampilan
        Route::get('/', 'DataMasukController@index')->name('data-masuk-index');
        Route::get('/search','DataMasukController@search')->name('data-masuk-search');
        Route::get('/{idDataMasuk}', 'DataMasukController@byId')->name('data-masuk-by-id');

        //crud
        Route::post('/create', 'DataMasukController@store')->name('data-masuk-create');
        Route::post('/put', 'DataMasukController@update')->name('data-masuk-update');
        Route::post('/remove', 'DataMasukController@removeAjax')->name('data-masuk-delete');
    });
    Route::prefix('dashboard')->group(function () {
        //tampilan
        Route::get('/', 'DashboardController@index')->name('dashboard-index');

    });
    Route::prefix('laporan')->group(function () {
        Route::get('/', 'LaporanController@index')->name('laporan-index');

        //result
        Route::post('/create', 'LaporanController@create')->name('laporan-create');
    });

});
