<?php

use Illuminate\Support\Facades\Route;

Route::get('/','homecontroller@index')->name('admin.home');

Route::get('/penulis','authorController@index')->name('author.index');

Route::get('/penulis/data','authorController@showData')->name('author.data');
//Route::resource('penulis', 'authorController');