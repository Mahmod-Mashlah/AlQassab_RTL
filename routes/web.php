<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebLoginController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/data-table', function () {
    return view('datatable-example');
});

Route::get('/new', function () {
    return view('new');
});

// Public Routes :

// Display login form
Route::get('/login', [WebLoginController::class, 'showLoginForm']);

// Handle login form submission
Route::post('/login', [WebLoginController::class, 'processLogin'])->name('login');
