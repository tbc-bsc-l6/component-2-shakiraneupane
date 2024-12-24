<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');



    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');

    Route::get('/fav', function () {
        return view('fav');
    })->name('fav');


    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    // Admin Routes (only accessible for admins)
    Route::middleware(['checkRole'])->get('/admin/dashboard', function () {
    return view('admin.dashboard'); // Admin dashboard view
    })->name('admin.dashboard');



