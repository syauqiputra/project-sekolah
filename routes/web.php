<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::resource('/dashboard/student', StudentController::class)->middleware('auth');

route::resource('/dashboard/kelas', KelasController::class)->middleware('auth');

route::resource('/dashboard/teacher', TeacherController::class)->middleware('auth');

route::resource('/dashboard/study', StudyController::class)->middleware('auth');
