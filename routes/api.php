<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\ChatController as ApiChatController;
use App\Http\Controllers\api\ExamController as ApiExamController;
use App\Http\Controllers\api\TestController as ApiTestController;
use App\Http\Controllers\api\YearController as ApiYearController;
use App\Http\Controllers\api\AdvertController as ApiAdvertController;
use App\Http\Controllers\api\SeasonController as ApiSeasonController;
use App\Http\Controllers\api\ProtestController as ApiProtestController;
use App\Http\Controllers\api\SectionController as ApiSectionController;
use App\Http\Controllers\api\SubjectController as ApiSubjectController;
use App\Http\Controllers\api\HomeworkController as ApiHomeworkController;
use App\Http\Controllers\api\MarkRecordController as ApiMarkRecordController;
use App\Http\Controllers\api\SchoolClassController as ApiSchoolClassController;
use App\Http\Controllers\api\LessonController as ApiLessonController;
use App\Http\Controllers\api\RatingController as ApiRatingController;
use App\Http\Controllers\api\CommentController as ApiCommentController;
use App\Http\Controllers\api\ReplyController as ApiReplyController;
use App\Http\Controllers\api\FileLessonController as ApiFileLessonController;
use App\Http\Controllers\api\NoteController as ApiNoteController;
use App\Http\Controllers\api\FileNoteController as ApiFileNoteController;
use App\Http\Controllers\api\DayScheduleController as ApiDayScheduleController;
use App\Http\Controllers\api\TestScheduleController as ApiTestScheduleController;
use App\Http\Controllers\api\ExamScheduleController as ApiExamScheduleController;


use App\Http\Controllers\api\DailyScheduleController as ApiDailyScheduleController;


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

    Route::resource('/years', ApiYearController::class)/*->only(['index', 'show'])*/;
    Route::resource('/seasons', ApiSeasonController::class)->only(['index', 'show']);
    Route::resource('/protests', ApiProtestController::class);
    Route::resource('/adverts', ApiAdvertController::class);
    Route::get('/admin-adverts', [ApiAdvertController::class, 'adminIndex']);
    Route::resource('/chats', ApiChatController::class);
    Route::get('/admin-chats', [ApiChatController::class, 'adminIndex']);
    Route::resource('/classes', ApiSchoolClassController::class);
    Route::resource('/sections', ApiSectionController::class);
    Route::resource('/subjects', ApiSubjectController::class);
    Route::get('/subjects/teacher/{teacher_id}', [ApiSubjectController::class, 'showByTeacher']);
    Route::get('/students-by-subject-id/{subject_id}', [ApiSubjectController::class, 'showStudents']);
    Route::resource('/homeworks', ApiHomeworkController::class);
    Route::resource('/tests', ApiTestController::class);
    Route::resource('/exams', ApiExamController::class);
    Route::resource('/marks', ApiMarkRecordController::class);
    Route::get('/marks/year-student/{year_id}/{student_id}', [ApiMarkRecordController::class, 'showByYear_Student']);
    Route::get('/marks/year-student-subject/{year_id}/{student_id}/{subject_id}', [ApiMarkRecordController::class, 'showByYear_Student_subject']);
    Route::resource('/lessons', ApiLessonController::class);
    Route::get('/lessons/subject/{subject_id}', [ApiLessonController::class, 'showBySubject']);
    Route::resource('/ratings', ApiRatingController::class);
    Route::resource('/comments', ApiCommentController::class);
    Route::resource('/replies', ApiReplyController::class);
    Route::resource('/lesson-files', ApiFileLessonController::class); //😁😁
    Route::get('/get-lesson-files/{lesson_id}', [ApiFileLessonController::class, 'showFiles']);
    Route::get('/download-lesson-file/{file_name}', [ApiFileLessonController::class, 'downloadFile']);
    Route::delete('/delete-lesson-file/{file_name}', [ApiFileLessonController::class, 'deleteFile']);
    Route::resource('/notes', ApiNoteController::class);
    Route::resource('/note-files', ApiFileNoteController::class); //😁😁
    Route::get('/get-note-files/{note_id}', [ApiFileNoteController::class, 'showFiles']);
    Route::get('/download-note-file/{file_name}', [ApiFileNoteController::class, 'downloadFile']);

    // Route::resource('/day-schedules', ApiDayScheduleController::class); //😁😁
    Route::get('/download-day-schedule-file/{file_name}', [ApiDayScheduleController::class, 'downloadFile']);
    Route::get('/get-day-schedule-file/{season_id}', [ApiDayScheduleController::class, 'showFiles']);

    // Route::resource('/test-schedules', ApiTestScheduleController::class); //😁😁
    Route::get('/download-test-schedule-file/{file_name}', [ApiTestScheduleController::class, 'downloadFile']);
    Route::get('/get-test-schedule-file/{season_id}', [ApiTestScheduleController::class, 'showFiles']);

    // Route::resource('/exam-schedules', ApiExamScheduleController::class); //😁😁
    Route::get('/download-exam-schedule-file/{file_name}', [ApiExamScheduleController::class, 'downloadFile']);
    Route::get('/get-exam-schedule-file/{season_id}', [ApiExamScheduleController::class, 'showFiles']);

    // Route::resource('/daily-schedules', ApiDailyScheduleController::class)->only(['show']);

    // Years السنوات الدراسية
    Route::post('/logout', [AuthController::class, 'logout']);
});
