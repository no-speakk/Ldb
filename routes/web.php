<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravelController;
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

Route::view('/', 'dashboard.dashboard')->name('dashboard');

Route::view('laravel/newproject',   'laravel.newproject')->name('laravel.newproject');
Route::view('laravel/front',        'laravel.front')->name('laravel.front');
Route::view('laravel/pagebuilder',  'laravel.pagebuilder')->name('laravel.pagebuilder');

