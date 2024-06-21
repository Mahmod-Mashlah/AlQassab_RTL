<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebLoginController;
use App\Http\Controllers\YearController;
use App\Models\Year;

Route::get('/data-table', function () {
    return view('datatable-example');
});

Route::get('/new', function () {
    return view('new');
});

# Public Routes :

// Display login form
// Route::get('/login', [WebLoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [WebLoginController::class, 'showLoginForm'])->name('login');

// Handle login form submission
// Route::post('/login', [WebLoginController::class, 'processLogin'])->name('login.post');
Route::post('/login', [WebLoginController::class, 'login'])->name('login.post');

# Private  Routes :

Route::middleware(['web-login'])->group(function () {
    // Route::group(['prefix' => 'post'], function () {
    // Route::prefix('/years')->group(function () {
    // });


    // Years السنوات الدراسية
    // index
    Route::get('/years', [YearController::class, 'index'])->name('years');
    // add
    Route::post('/years', [YearController::class, 'store'])->name('years.add');

    // Dashboard لوحة التحكم

    Route::group(['prefix' => '/dashboard/{yearname}'], function () {
        Route::get('/', [YearController::class, 'dashboard'])->name("dashboard");

        // Students الطلاب
        Route::get('/students', [UserController::class, 'students_index'])->name("students");
        Route::get('/students/add', [UserController::class, 'students_create'])->name("students.create");
        Route::post('/students/add', [UserController::class, 'students_add'])->name("students.add");
        Route::get('/students/{user_id}', [StudentController::class, 'show'])->name("students.show");
        Route::delete('/students/delete/{user_id}', [StudentController::class, 'destroy'])->name("students.delete");
        Route::get('/students/edit/{user_id}', [StudentController::class, 'edit'])->name("students.edit");
        Route::put('/students/update/{user_id}', [StudentController::class, 'update'])->name("students.update");
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


    // Employees_Records  الموظفين
    // يتضمن الشهادات والصلاحيات Permissions & Certifications

    // index
    Route::get('/employees', function () {
        return view('employees.index');
    })->name('employees');

    // add
    Route::get('/employees/add', function () {
        return view('employees.add');
    })->name('employees-add');
    // add-post
    Route::post('/employees/add', function () {
        return view('employees');
    })->name('employees-add-post');

    // show
    Route::get('/employees/{name}/show', function () {
        return view('employees.show');
    })->name('employees-show');

    // edit
    Route::get('/employees/{name}/edit', function () {
        return view('employees.edit');
    })->name('employees-edit');

    // delete
    Route::get('/employees/delete/{id}', function () {
        return view('employees.index');
    })->name('employees-delete');

    // Certifications الشهادات :

    // index
    Route::get('/employees/{name}/certifications', function () {
        return view('certifications.index');
    })->name('certifications');

    // add
    Route::get('/employees/{name}/certifications/add', function () {
        return view('certifications.add');
    })->name('certifications-add');

    // // show
    // Route::get('/employees/{name}/certifications/{name}/show', function () {
    //     return view('certifications.show');
    // })->name('certifications-show');

    // // edit
    // Route::get('/employees/{name}/certifications/{name}/edit', function () {
    //     return view('certifications.edit');
    // })->name('certifications-edit');

    // delete
    Route::get('/employees/{name}/certifications/delete/{id}', function () {
        return view('employees.edit');
    })->name('certifications-delete');
    // }); //end of weblogin middleware
});
