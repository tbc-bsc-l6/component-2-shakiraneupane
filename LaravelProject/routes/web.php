<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\OrderConfirmationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Mail;

// Public Routes (No Middleware)
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [WeatherController::class, 'index'])->name('contact');

// Authentication Routes (No Middleware)
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes (Protected by 'admin' middleware)
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{section}', [AdminController::class, 'handleSection'])->name('admin.section');
    Route::get('/admin/users/search', [AdminController::class, 'search'])->name('admin.users.search');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/orders', [AdminController::class, 'index'])->name('admin.orders');

    // Book Management
    Route::post('/admin/addBooks', [BookController::class, 'store'])->name('store');
    Route::get('/admin/books/{book}/edit', [BookController::class, 'edit'])->name('admin.editBooks');
    Route::put('/admin/books/{book}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/admin/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');

    // Order Management
    Route::get('/admin/orders/{order}', [AdminController::class, 'showOrder'])->name('admin.orders.show');
});

// Customer Routes (Protected by 'customer' middleware)
Route::middleware(['customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'customerDashboard'])->name('customer.dashboard');

    // Cart Management
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Profile Routes
    Route::get('/customer/profile', [ProfileController::class, 'show'])->name('customer.profile');
    Route::put('/customer/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

    // Order Confirmation Page
    Route::get('/order-confirmation', [OrderConfirmationController::class, 'showConfirmationPage'])->name('order.confirmation');
});

// Creating dynamic route for genres (No Middleware)
Route::get('/genre/{genre}', [GenreController::class, 'show'])->name('genre.show');

// Contacts Routes (No Middleware)
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');



Route::get('/search', [BookController::class, 'search'])->name('search');
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');


// Test email route (No Middleware)
Route::get('/test-email', function () {
    $details = [
        'title' => 'Test Email from Laravel',
        'body' => 'This is a test email to verify the configuration.'
    ];

    Mail::raw($details['body'], function ($message) use ($details) {
        $message->to('sharmashakira47@gmail.com') // Replace with your email to receive the test email
                ->subject($details['title']);
    });

    return 'Test email sent!';
});
