<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\ChangeTimeController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
//Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/times', [TimeController::class, 'show']);
Route::get('/change-times', [ChangeTimeController::class, 'show']);
Route::get('/groups/{group}', [GroupController::class, 'show']);
Route::get('/courses/{group}/groups', [GroupController::class, 'courseGroups']);
Route::get('/dates', [DateController::class, 'show']);

// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/password', [AuthController::class, 'password']);

    Route::get('/groups', [GroupController::class, 'index']);
    Route::post('/groups', [GroupController::class, 'store']);
    Route::put('/groups/fresh-changes', [GroupController::class, 'fresh']);
    Route::put('/groups/{group}', [GroupController::class, 'update']);
    Route::delete('/groups/{group}', [GroupController::class, 'destroy']);

    Route::put('/lessons/{id}', [LessonController::class, 'update']);
    Route::put('/changes/{id}', [ChangeController::class, 'update']);

    Route::put('/dates', [DateController::class, 'update']);

    Route::put('/times', [TimeController::class, 'update']);
    Route::put('/change-times', [ChangeTimeController::class, 'update']);

    Route::get('/cabinets/pagen', [CabinetController::class, 'pagen']);
    Route::resource('cabinets', CabinetController::class)->except(['show']);
    Route::get('/teachers/pagen', [TeacherController::class, 'pagen']);
    Route::resource('teachers', TeacherController::class)->except(['show']);
    Route::get('/disciplines/pagen', [DisciplineController::class, 'pagen']);
    Route::resource('disciplines', DisciplineController::class)->except(['show']);
});
