<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','koleksiController@index')->name('homepage');

Route::get('detail/{book}','koleksiController@show')->name('showbook');

Route::post('book/{book}/pinjam','koleksiController@pinjam')->name('pinjam')->middleware('auth');

Route::get('/dashboard','koleksiController@dashboard')->name('dashboard')->middleware('auth');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

