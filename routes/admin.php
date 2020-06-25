<?php

use Illuminate\Support\Facades\Route;

Route::get('/','homecontroller@index')->name('admin.home');

Route::get('/penulis/data','authorController@showData')->name('author.data');

Route::get('/book/data','bookController@showData')->name('book.data');

Route::get('/peminjaman','bukuController@index')->name('buku.index');

Route::get('/dashboard','dashController@index')->name('dashboard.index');

route::put('/peminjaman/{borrow}/pengembalian','bukuController@pengembalian')->name('buku.pengembalian');

Route::resource('author', 'authorController');

Route::resource('book', 'bookController');

