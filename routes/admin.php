<?php

use Illuminate\Support\Facades\Route;

Route::get('/','homecontroller@index')->name('admin.home');

Route::get('/penulis/data','authorController@showData')->name('author.data');

Route::get('/book/data','bookController@showData')->name('book.data');

Route::resource('author', 'authorController');

Route::resource('book', 'bookController');

