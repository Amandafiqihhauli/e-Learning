<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\StudentController;




/**
 * HTTP Method:
 * 1. Get   : untuk menampilkan
 * 2. Post  : untuk mengirim data
 * 3. Put   : untuk meng-update data
 * 4. Delete: untuk menghapus data
 */

// Route untuk menampilkan teks salam
Route::get('/salam', function () {
    return "ASSALAMUALAIKUM...";
});

Route::get('/profile', function () {
    return view('profile');
});









Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DasboardController::class, 'index'])->name('dashboard');

    // untuk menampilkan alamat student
    Route::get('admin/student', [StudentController::class, 'index']);

    // untuk menampilkan alamat courses
    Route::get('admin/courses', [CoursesController::class, 'index']);


    // STUDENT
    // route untuk menampilkan form data student
    Route::get('admin/student/create', [StudentController::class, 'create'])->middleware('admin');

    // route untuk mengirim data student
    Route::post('admin/student/store', [StudentController::class, 'store']);


    // Route untuk menampilkan halaman edit
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->middleware('admin');

    // route untuk menyimpan update student
    Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

    // route untuk menghapus data
    Route::DELETE('admin/student/delete/{id}', [StudentController::class, 'destroy'])->middleware('admin');

    // COURSES
    // route untuk menampilkan form data student
    Route::get('admin/courses/create', [CoursesController::class, 'create'])->middleware('admin');

    // route untuk mengirim data student
    Route::post('admin/courses/store', [CoursesController::class, 'store']);


    // Route untuk menampilkan halaman edit
    Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit'])->middleware('admin');

    // route untuk menyimpan update student
    Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

    // route untuk menghapus data
    Route::DELETE('admin/courses/delete/{id}', [CoursesController::class, 'destroy'])->middleware('admin');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
