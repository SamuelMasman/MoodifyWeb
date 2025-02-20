<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CallChatController;

// Home Page - Accessible to all
Route::get('/', [BlogController::class, 'showWelcome'])->name('home');

// Guest Login Route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Authentication Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Service Routes
Route::get('/services', [ServiceController::class, 'showServices'])->name('services');

// Psychologist Selection Route
Route::get('/choose-psychologist', function () {
    return view('choose_psychologist');
})->name('choose.psychologist');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// Profile Route
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

// CallChat Route
Route::get('/callchat', [CallChatController::class, 'show'])->name('callchat');

// Checkout Payment Processing Route
Route::post('/checkout', [PaymentController::class, 'processPayment'])->name('payment.process');

// Blog-related Routes
Route::get('/blog', [BlogController::class, 'showBlog'])->name('blog'); // List of blog posts
Route::get('/articles/{id}', [BlogController::class, 'show'])->name('articles.show'); // Single article view

// Welcome Page Route
Route::get('/welcome', [LoginController::class, 'showWelcome'])->name('welcome');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/booking', function () {
        return view('booking');
    })->name('booking');

    Route::get('/forum', function () {
        return view('forum');
    })->name('forum');
});