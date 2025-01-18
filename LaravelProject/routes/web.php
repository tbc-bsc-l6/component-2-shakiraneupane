<?php

// Importing necessary controllers and classes
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\OrderConfirmationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;

// Public Routes (No Middleware)
Route::get('/', [HomeController::class, 'home'])->name('home'); // Homepage
Route::get('/home/{id}', [HomeController::class, 'show'])->name('home.show');


Route::get('/contact', [WeatherController::class, 'index'])->name('contact'); // Contact page

// Admin Routes (Protected by 'admin' middleware)
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Admin dashboard
    Route::get('/admin/{section}', [AdminController::class, 'handleSection'])->name('admin.section'); // Admin section handling
    Route::get('/admin/users/search', [AdminController::class, 'search'])->name('admin.users.search'); // Admin user search
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy'); // Admin delete user
    Route::get('/admin/orders', [AdminController::class, 'index'])->name('admin.orders'); // Admin orders list

    // Book Management
    Route::post('/admin/addBooks', [BookController::class, 'store'])->name('store'); // Add new book
    Route::get('/admin/books/{book}/edit', [BookController::class, 'edit'])->name('admin.editBooks'); // Edit book
    Route::put('/admin/books/{book}', [BookController::class, 'update'])->name('admin.books.update'); // Update book
    Route::delete('/admin/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy'); // Delete book

    // Order Management
    Route::get('/admin/orders/{order}', [AdminController::class, 'showOrder'])->name('admin.orders.show'); // View single order details
});

// Customer Routes (Protected by 'customer' middleware)
Route::middleware(['customer'])->group(function () {
    // Cart Management
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // View cart
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add'); // Add item to cart
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update'); // Update cart item
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Remove item from cart

    // Profile Routes
    Route::get('/customer/profile', [ProfileController::class, 'show'])->name('customer.profile'); // View customer profile
    Route::put('/customer/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile
    Route::delete('/customer/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile

    // Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index'); // Checkout page
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process'); // Process checkout

    // Order Confirmation Page
    Route::get('/order-confirmation', [OrderConfirmationController::class, 'showConfirmationPage'])->name('order.confirmation'); // Order confirmation
});

// Creating dynamic route for genres (No Middleware)
Route::get('/genre/{genre}', [GenreController::class, 'show'])->name('genre.show'); // Display books of a specific genre

// Contacts Routes (No Middleware)
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store'); // Store contact form data

// Search Route
Route::get('/search', [BookController::class, 'search'])->name('search'); // Search books
Route::get('/book/{book}', [BookController::class, 'show'])->name('book.show');


// Authentication Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register'); // Registration form
Route::post('/register', [RegisteredUserController::class, 'store']); // Store new user

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Login form
Route::post('/login', [AuthenticatedSessionController::class, 'store']); // Login user
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); // Logout user

// Password Reset Routes
Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request'); // Request password reset form
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email'); // Send password reset email

    // New Password (after clicking the reset link)
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset'); // New password form
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update'); // Store new password
});

// Email Verification Routes
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', EmailVerificationPromptController::class)->name('verification.notice'); // Show verification notice
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->name('verification.send'); // Resend verification email
    Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)->middleware('signed')->name('verification.verify'); // Verify email address
});

// Confirm Password Route
Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm'); // Confirm password form
Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']); // Store confirmed password


// Route for storing a review for a specific book
Route::post('/review/{bookId}', [ReviewController::class, 'store'])->name('review.store');







