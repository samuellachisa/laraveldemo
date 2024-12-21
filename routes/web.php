<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Show the login form (GET route)
Route::get('/', function () {
    return redirect()->route('login.form');
});


Route::get('/login', function () {
    return view('login');
})->name('login.form');

// Show the register form (GET route)
Route::get('/register', function () {
    return view('register');
})->name('register.form');

// Registration route (POST)
Route::post('/register', [UserController::class, 'register'])->name('register');

// Login route (POST)
Route::post('/login', [UserController::class, 'login'])->name('login');

// Logout route (POST)
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Route to display posts list
Route::get('/posts', [PostController::class, 'index']);  // Display all posts
