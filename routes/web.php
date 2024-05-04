<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebLoginController;


Route::get('/data-table', function () {
    return view('datatable-example');
});

Route::get('/new', function () {
    return view('new');
});

# Public Routes :

// Display login form
Route::get('/login', [WebLoginController::class, 'showLoginForm']);

// Handle login form submission
Route::post('/login', [WebLoginController::class, 'processLogin'])->name('login');


# Private  Routes :

// Dashboard لوحة التحكم

    Route::get('/', function () {
        return view('dashboard');
    });

//Protests الشكاوى

    Route::get('/protests', function () {
        return view('protests.index');
    });

// Exit-Permissions طلبات الإذن

    Route::get('/exit-permissions', function () {
        return view('exit-permissions.index');
    })->name('exit-permissions');
    Route::get('/exit-permissions/add', function () {
        return view('exit-permissions.add');
    })->name('exit-permissions-add');
