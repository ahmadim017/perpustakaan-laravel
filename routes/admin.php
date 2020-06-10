<?php

use Illuminate\Support\Facades\Route;

Route::get('/','homecontroller@index')->name('admin.home');