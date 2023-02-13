<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherGradeController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);
//Route::get('/student', [StudentController::class, 'index']);
//Route::get('/student/{student:slug}/edit', [StudentController::class, 'edit']);
//Route::put('/student/{student:slug}/update', [StudentController::class, 'update']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->middleware('CheckRole:admin');

//Route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//route signup
Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store']);

//route admin.student
Route::resource('/admin/student', StudentController::class)->middleware(['auth', 'CheckRole:admin']);
Route::put('/admin/student/up/{student:id}', [StudentController::class, 'up'])->middleware(['auth', 'CheckRole:admin']);

//route admin.teacher
Route::resource('/admin/teacher', TeacherController::class)->middleware(['auth', 'CheckRole:admin']);
Route::put('/admin/teacher/up/{teacher:id}', [TeacherController::class, 'up'])->middleware(['auth', 'CheckRole:admin']);

//route class
Route::resource('/admin/grade', GradeController::class)->middleware(['auth', 'CheckRole:admin']);

//route print
Route::get('/student/{student:id}/profile.php', [StudentController::class, 'print'])->middleware(['auth', 'CheckRole:admin,teacher,student']);
Route::get('/teacher/{teacher:id}/profile.php', [TeacherController::class, 'print'])->middleware(['auth', 'CheckRole:admin,teacher,student']);
Route::get('/teacher/teachers.php', [TeacherController::class, 'printAll'])->middleware(['auth', 'CheckRole:admin']);
