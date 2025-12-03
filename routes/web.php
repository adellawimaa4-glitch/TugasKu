<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//login
Route::get('login',[AuthController::class,'login'])->name ('login');
Route::post('login',[AuthController::class,'loginProses'])->name ('loginProses');

//Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('checkLogin')->group(function(){
    //dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    // USER
    Route::get('/user',              [UserController::class, 'index'])->name('user');
    Route::get('/user/create',       [UserController::class, 'create'])->name('userCreate');
    Route::post('/user/store',       [UserController::class, 'store'])->name('userStore');

    Route::get('/user/edit/{id}',    [UserController::class, 'edit'])->name('userEdit');
    Route::put('/user/update/{id}',  [UserController::class, 'update'])->name('userUpdate');

    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('userDestroy');



    // //user
    // Route::get('/user', [UserController::class, 'index'])->name('user');      // daftar user
    // Route::get('/user/create', [UserController::class, 'create'])->name('userCreate'); // form
    // Route::post('/user/store', [UserController::class, 'store'])->name('userStore'); // submit form
    // Route::get('/user/edit/{$id}', [UserController::class, 'edit'])->name('userEdit'); // form

    //tugas
    // Route::get('tugas',[TugasController::class,'index'])->name ('tugas');
    // TUGAS
    Route::get('/tugas', [TugasController::class, 'index'])->name('tugas');                 // daftar tugas
    Route::get('/tugas/create', [TugasController::class, 'create'])->name('tugasCreate');   // form tambah
    Route::post('/tugas/store', [TugasController::class, 'store'])->name('tugasStore');     // simpan data baru
    Route::get('/tugas/edit/{id}', [TugasController::class, 'edit'])->name('tugasEdit');    // form edit
    Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('tugasUpdate');     // update data
    Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugasDestroy');// hapus data

});



