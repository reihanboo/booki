<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index']);

Route::get('/courses', [CourseController::class, 'index']);

Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/calendar/deadlines', [CalendarController::class, 'deadlines']);
Route::get('/calendar/events', [CalendarController::class, 'events']);

Route::get('/note', [NoteController::class, 'index']);
