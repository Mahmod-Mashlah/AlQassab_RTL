<?php

use App\Models\Year;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\ExamScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WebLoginController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\DayScheduleController;
use App\Http\Controllers\ExitPermissionController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProtestController;
use App\Http\Controllers\TestScheduleController;

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
        Route::get('/students/search/{user_id}', [StudentController::class, 'students_search'])->name("students.search");

        // Adverts الإعلانات
        Route::get('/adverts/add', [AdvertController::class, 'create'])->name("adverts.create");
        Route::post('/adverts/add', [AdvertController::class, 'store'])->name("adverts.add");
        Route::get('/adverts', [AdvertController::class, 'index'])->name("adverts");
        Route::get('/adverts/{advert_id}', [AdvertController::class, 'show'])->name("adverts.show");
        Route::delete('/adverts/delete/{advert_id}', [AdvertController::class, 'destroy'])->name("adverts.delete");
        Route::get('/adverts/edit/{advert_id}', [AdvertController::class, 'edit'])->name("adverts.edit");
        Route::put('/adverts/update/{advert_id}', [AdvertController::class, 'update'])->name("adverts.update");

        // Schedules البرامج
        Route::group(['prefix' => '/schedules'], function () {
            Route::get('', [SchedulesController::class, 'index'])->name("schedules");
            // Daily Schedules برنامج الحصص اليومي:

            Route::get('/daily/add', [DayScheduleController::class, 'create'])->name("daily.create");
            Route::post('/daily/add', [DayScheduleController::class, 'store'])->name("daily.add");
            Route::get('/daily', [DayScheduleController::class, 'index'])->name("daily");
            // Route::get('/daily/{advert_id}', [DayScheduleController::class, 'show'])->name("daily.show");
            Route::get('/daily/download/{file_name}', [DayScheduleController::class, 'downloadFile'])->name("daily.download");
            Route::delete('/daily/delete/{day_schedule_id}', [DayScheduleController::class, 'destroy'])->name("daily.delete");
            // Route::get('/daily/edit/{advert_id}', [DayScheduleController::class, 'edit'])->name("daily.edit");
            // Route::put('/daily/update/{advert_id}', [DayScheduleController::class, 'update'])->name("daily.update");

            // Test Schedules برنامج المذاكرات:

            Route::get('/tests/add', [TestScheduleController::class, 'create'])->name("schedules.tests.create");
            Route::post('/tests/add', [TestScheduleController::class, 'store'])->name("schedules.tests.add");
            Route::get('/tests', [TestScheduleController::class, 'index'])->name("schedules.tests");
            // Route::get('/tests/{advert_id}', [TestScheduleController::class, 'show'])->name("tests.show");
            Route::get('/tests/download/{file_name}', [TestScheduleController::class, 'downloadFile'])->name("schedules.tests.download");
            Route::delete('/tests/delete/{test_schedule_id}', [TestScheduleController::class, 'destroy'])->name("schedules.tests.delete");
            // Route::get('/tests/edit/{advert_id}', [TestScheduleController::class, 'edit'])->name("tests.edit");
            // Route::put('/tests/update/{advert_id}', [TestScheduleController::class, 'update'])->name("tests.update");

            // Exam Schedules برنامج الامتحانات:

            Route::get('/exams/add', [ExamScheduleController::class, 'create'])->name("schedules.exams.create");
            Route::post('/exams/add', [ExamScheduleController::class, 'store'])->name("schedules.exams.add");
            Route::get('/exams', [ExamScheduleController::class, 'index'])->name("schedules.exams");
            // Route::get('/exams/{advert_id}', [ExamScheduleController::class, 'show'])->name("schedules.exams.show");
            Route::get('/exams/download/{file_name}', [ExamScheduleController::class, 'downloadFile'])->name("schedules.exams.download");
            Route::delete('/exams/delete/{exam_schedule_id}', [ExamScheduleController::class, 'destroy'])->name("schedules.exams.delete");
            // Route::get('/exams/edit/{advert_id}', [ExamScheduleController::class, 'edit'])->name("schedules.exams.edit");
            // Route::put('/exams/update/{advert_id}', [ExamScheduleController::class, 'update'])->name("schedules.exams.update");
        });

        // ExitPermissions طلبات الإذن :
        Route::get('/exit-permissions/add', [ExitPermissionController::class, 'create'])->name("exit-permissions.create");
        Route::post('/exit-permissions/add', [ExitPermissionController::class, 'store'])->name("exit-permissions.add");
        Route::get('/exit-permissions', [ExitPermissionController::class, 'index'])->name("exit-permissions");
        Route::get('/exit-permissions/{exit_permission_id}', [ExitPermissionController::class, 'show'])->name("exit-permissions.show");
        Route::delete('/exit-permissions/delete/{exit_permission_id}', [ExitPermissionController::class, 'destroy'])->name("exit-permissions.delete");
        Route::get('/exit-permissions/edit/{exit_permission_id}', [ExitPermissionController::class, 'edit'])->name("exit-permissions.edit");
        Route::put('/exit-permissions/update/{exit_permission_id}', [ExitPermissionController::class, 'update'])->name("exit-permissions.update");

        // Protests الشكاوى :

        // Route::get('/protests/add', [ProtestController::class, 'create'])->name("protests.create");
        // Route::post('/protests/add', [ProtestController::class, 'store'])->name("protests.add");
        Route::get('/protests', [ProtestController::class, 'index'])->name("protests");
        // Route::get('/protests/{protest_id}', [ProtestController::class, 'show'])->name("protests.show");
        Route::delete('/protests/delete/{protest_id}', [ProtestController::class, 'destroy'])->name("protests.delete");
        // Route::get('/protests/edit/{protest_id}', [ProtestController::class, 'edit'])->name("protests.edit");
        // Route::put('/protests/update/{protest_id}', [ProtestController::class, 'update'])->name("protests.update");

        // Behavioral-Notes الملاحظات السلوكية

        Route::get('/behavioral-notes/add', [NoteController::class, 'create'])->name("behavioral-notes.create");
        Route::post('/behavioral-notes/add', [NoteController::class, 'store'])->name("behavioral-notes.add");
        Route::get('/behavioral-notes', [NoteController::class, 'index'])->name("behavioral-notes");
        Route::get('/behavioral-notes/{behavioral_note_id}', [NoteController::class, 'show'])->name("behavioral-notes.show");
        Route::delete('/behavioral-notes/delete/{behavioral_note_id}', [NoteController::class, 'destroy'])->name("behavioral-notes.delete");
        Route::get('/behavioral-notes/edit/{behavioral_note_id}', [NoteController::class, 'edit'])->name("behavioral-notes.edit");
        Route::put('/behavioral-notes/update/{behavioral_note_id}', [NoteController::class, 'update'])->name("behavioral-notes.update");
        //note_types :
        Route::post('/behavioral-notes-types/add', [NoteController::class, 'store_note_type'])->name("behavioral-notes-types.add");
        Route::post('/behavioral-notes-types/delete/{note_type_id}', [NoteController::class, 'delete_note_type'])->name("behavioral-notes-types.delete");

        Route::get('/behavioral-notes-files/download/{file_name}', [NoteController::class, 'downloadFile'])->name("behavioral-notes-files.download");
        Route::delete('/behavioral-notes-files/delete/{file_name}/{note_id}', [NoteController::class, 'deleteNoteFile'])->name("behavioral-notes-files.delete");
    });

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
