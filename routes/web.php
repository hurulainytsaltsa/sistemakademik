<?php

use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardProdiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::fallback(function(){
    return view('notfound');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})-> middleware('auth');

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::resource('/dashboard-mahasiswa', DashboardMahasiswaController::class)-> middleware('auth');

Route::get('/dosen', [DosenController::class, 'index']);
Route::resource('/dashboard-dosen', DashboardDosenController::class)-> middleware('auth');

Route::get('/prodi', [ProdiController::class, 'index']);
Route::resource('/dashboard-prodi', DashboardProdiController::class)-> middleware('auth');
Route::resource('/dashboard-user', UserController::class)-> middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [LoginController::class, 'index']);
Route::resource('/register', RegisterController::class);
// -> middleware('auth');

Route::get('/cetak-pdf/mahasiswa', [DashboardMahasiswaController::class, 'cetakPdf']);
Route::get('/cetak-pdf/dosen', [DashboardDosenController::class, 'cetakPdf']);
Route::get('/cetak-pdf/user', [UserController::class, 'cetakPdf']);
Route::get('/cetak-pdf/prodi', [DashboardProdiController::class, 'cetakPdf']);


Route::resource('/dashboard-matakuliah', MatakuliahController::class)-> middleware('auth');


