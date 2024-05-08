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

// Years السنوات الدراسية
    // index
    Route::get('/years', function () {
        return view('years.index');
    });
    // add
    Route::get('/years/add', function () {
        return view('years.add');
    });

// Dashboard لوحة التحكم

    Route::get('/dashboard/{year}', function () {
        return view('dashboard');
    });

//Protests الشكاوى

    Route::get('/protests', function () {
        return view('protests.index');
    });

// Exit-Permissions طلبات الإذن

    // index
    Route::get('/exit-permissions', function () {
        return view('exit-permissions.index');
    })->name('exit-permissions');

    // add
    Route::get('/exit-permissions/add', function () {
        return view('exit-permissions.add');
    })->name('exit-permissions-add');

    // edit
    Route::get('/exit-permissions/edit', function () {
        return view('exit-permissions.edit');
    })->name('exit-permissions-edit');

    // delete
    Route::get('/exit-permissions/delete', function () {
        return view('exit-permissions.index');
    })->name('exit-permissions-delete');

// Behavioral-Notes الملاحظات السلوكية

    // index
    Route::get('/behavioral-notes', function () {
        return view('behavioral-notes.index');
    })->name('behavioral-notes');

    // add
    Route::get('/behavioral-notes/add', function () {
        return view('behavioral-notes.add');
    })->name('behavioral-notes-add');

    //edit
    Route::get('/behavioral-notes/edit', function () {
        return view('behavioral-notes.edit');
    })->name('behavioral-notes-edit');

    // delete
    Route::get('/behavioral-notes/delete', function () {
        return view('behavioral-notes.index');
    })->name('behavioral-notes-delete');

// Behavioral-Notes Types أنواع الملاحظات السلوكية

    // add

    Route::get('/behavioral-notes/types/add', function () {
        return view('behavioral-notes.index');
    })->name('behavioral-notes-types-add');

    // delete

    Route::get('/behavioral-notes/types/delete', function () {
        return view('behavioral-notes.index');
    })->name('behavioral-notes-types-delete');

// Adverts الإعلانات
    // index
    Route::get('/adverts', function () {
        return view('adverts.index');
    })->name('adverts');

    // add
    Route::get('/adverts/add', function () {
        return view('adverts.add');
    })->name('adverts-add');

    // edit
    Route::get('/adverts/edit', function () {
        return view('adverts.edit');
    })->name('adverts-edit');

    // delete
    Route::get('/adverts/delete', function () {
        return view('adverts.index');
    })->name('adverts-delete');
