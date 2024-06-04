<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * HTTP Method:
 * 1. Get   : untuk menampilkan
 * 2. Post  : untuk mengirim data
 * 3. Put   : untuk meng-update data
 * 4. Delete: untuk menghapus data
 */

// Route untuk menampilkan teks salam
Route::get('/salam', function(){
    return "ASSALAMUALAIKUM...";
});

Route::get('/profile', function(){
    return view('profile');
});

Route::get('admin/dashboard', [DasboardController::class, 'index']);

// untuk menampilkan alamat student
Route::get('admin/student', [StudentController::class, 'index']);

// untuk menampilkan alamat courses
Route::get('admin/courses', [CoursesController::class, 'index']);


// STUDENT
// route untuk menampilkan form data student
Route::get('admin/student/create', [StudentController::class, 'create']);

// route untuk mengirim data student
Route::post('admin/student/store', [StudentController::class, 'store']);


// Route untuk menampilkan halaman edit
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

// route untuk menyimpan update student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

// route untuk menghapus data
Route::DELETE('admin/student/delete/{id}', [StudentController::class, 'destroy']);

// COURSES
// route untuk menampilkan form data student
Route::get('admin/courses/create', [CoursesController::class, 'create']);

// route untuk mengirim data student
Route::post('admin/courses/store', [CoursesController::class, 'store']);


// Route untuk menampilkan halaman edit
Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit']);

// route untuk menyimpan update student
Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

// route untuk menghapus data
Route::DELETE('admin/courses/delete/{id}', [CoursesController::class, 'destroy']);
