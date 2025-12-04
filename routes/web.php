<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// ================== AUTH ==================
Route::get('/login',  [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('loginProses');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');


// ================== AREA LOGIN ==================
Route::middleware('checkLogin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // ================== USER ==================
    Route::get('/user',                 [UserController::class, 'index'])->name('user');
    Route::get('/user/create',          [UserController::class, 'create'])->name('userCreate');
    Route::post('/user/store',          [UserController::class, 'store'])->name('userStore');
    Route::get('/user/edit/{id}',       [UserController::class, 'edit'])->name('userEdit');
    Route::put('/user/update/{id}',     [UserController::class, 'update'])->name('userUpdate');
    Route::delete('/user/delete/{id}',  [UserController::class, 'destroy'])->name('userDestroy');


    // ================== TUGAS (ADMIN) ==================
    Route::get('/tugas',                [TugasController::class, 'index'])->name('tugas');
    Route::get('/tugas/show/{id}',      [TugasController::class, 'show'])->name('tugasShow');
    Route::get('/tugas/create',         [TugasController::class, 'create'])->name('tugasCreate');
    Route::post('/tugas/store',         [TugasController::class, 'store'])->name('tugasStore');
    Route::get('/tugas/edit/{id}',      [TugasController::class, 'edit'])->name('tugasEdit');
    Route::put('/tugas/{id}',           [TugasController::class, 'update'])->name('tugasUpdate');
    Route::delete('/tugas/{id}',        [TugasController::class, 'destroy'])->name('tugasDestroy');


    // ================== MENU KARYAWAN ==================
    Route::get('/karyawan/dashboard',      [KaryawanController::class, 'dashboard'])
        ->name('karyawanDashboard');

    Route::get('/karyawan/tugas',          [KaryawanController::class, 'tugas'])
        ->name('karyawanTugas');                // <-- INI ROUTE UTAMA HALAMAN KARYAWAN

    Route::get('/karyawan/tugas/pdf',      [KaryawanController::class, 'tugasPdf'])
        ->name('karyawanTugasPdf');             // <-- INI ROUTE DOWNLOAD PDF
});
