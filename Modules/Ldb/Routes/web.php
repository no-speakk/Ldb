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

Route::prefix('ldb')->group(function() {
    Route::get('/new-project', 'LdbController@newProject')->name('ldb.new-project');
    Route::get('/front', 'LdbController@front')->name('ldb.front');
});
