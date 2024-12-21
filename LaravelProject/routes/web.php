<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layout');
});
