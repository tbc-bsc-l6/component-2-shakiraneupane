<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;



Route::get('/contact', function () {
    return view('contact');
})->name('contact');






// Creating dynamic route for genres
Route::get('/genre/{genre}', [GenreController::class, 'show'])->name('genre.show');

// Authentication Routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');

// Admin Routes (only accessible for admins)
Route::middleware(['CheckAdmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard'); // Admin dashboard view
})->name('admin.dashboard');


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


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Delete user route
Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');


Route::get('/admin/users/search', [AdminController::class, 'search'])->name('admin.users.search');



Route::middleware(['checkCustomer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'customerDashboard'])->name('customer.dashboard');
});




Route::middleware(['auth'])->group(function () {
    // Cart Index Page
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


    // Add to Cart
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

    // Update Cart Item Quantity
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

    // Remove Cart Item
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});


