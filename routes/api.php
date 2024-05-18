<?php

use App\Http\Controllers\api\SeasonController as ApiSeasonController;
use App\Http\Controllers\api\YearController as ApiYearController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\YearController;

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

    // Years السنوات الدراسية
    Route::post('/logout', [AuthController::class, 'logout']);
});
