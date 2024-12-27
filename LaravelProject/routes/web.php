<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('home');
});

Route::get('/layout', function () {
    return view('layout');
});


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/fav', function () {
    return view('fav');
})->name('fav');

// Creating dynamic route for genres
Route::get('/genre/{genre}', [GenreController::class, 'show'])->name('genre.show');

// Authentication Routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');

// Admin Routes (only accessible for admins)
Route::middleware(['checkRole'])->get('/admin/dashboard', function () {
    return view('admin.dashboard'); // Admin dashboard view
})->name('admin.dashboard');

// Route for the customer dashboard
Route::get('/customer/dashboard', [AuthController::class, 'customerDashboard'])->name('customer.dashboard');

// Dynamic Admin Routes for admin pages
Route::get('/admin/{section}', [AdminController::class, 'handleSection'])->name('admin.section');


// Route to handle form submission and store the book (POST method)
Route::post('/admin/addBooks', [BookController::class, 'store'])->name('store');

// Route to display the edit form
Route::get('/admin/books/{book}/edit', [BookController::class, 'edit'])->name('admin.editBooks');

// Route to handle the form submission and update the book
Route::put('/admin/books/{book}', [BookController::class, 'update'])->name('admin.books.update');

// Route to handle the deletion of a book
Route::delete('/admin/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');
