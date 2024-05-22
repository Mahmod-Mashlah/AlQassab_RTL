<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\api\YearController as ApiYearController;
use App\Http\Controllers\api\SeasonController as ApiSeasonController;
use App\Http\Controllers\api\ProtestController as ApiProtestController;
use App\Http\Controllers\api\AdvertController as ApiAdvertController;
use App\Http\Controllers\api\ChatController as ApiChatController;
use App\Http\Controllers\api\DailyScheduleController as ApiDailyScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// public Routes

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// protected Routes (With Auth)

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('/years', ApiYearController::class)->only(['index', 'show']);
    Route::resource('/seasons', ApiSeasonController::class)->only(['index', 'show']);
    Route::resource('/protests', ApiProtestController::class);
    Route::resource('/adverts', ApiAdvertController::class);
    Route::get('/admin-adverts', [ApiAdvertController::class, 'adminIndex']);
    Route::resource('/chats', ApiChatController::class);
    Route::get('/admin-chats', [ApiChatController::class, 'adminIndex']);
    // Route::resource('/daily-schedules', ApiDailyScheduleController::class)->only(['show']);

    // Years السنوات الدراسية
    Route::post('/logout', [AuthController::class, 'logout']);
});
