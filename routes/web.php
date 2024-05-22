<?php

use App\Http\Controllers\DasboardController;
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
