<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/children', function () {
    return view('child');
});

Route::get('/adult', function () {
    return view('adult');
});

Route::get('/adult', function () {
    return view('adult');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/fav', function () {
    return view('fav');
});

Route::get('/register', function () {
    return view('register');
});








