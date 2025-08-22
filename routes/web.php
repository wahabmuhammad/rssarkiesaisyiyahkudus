<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/', [App\Http\Controllers\indexController::class, 'index'])->name('home');

Route::get('/contact', [App\Http\Controllers\indexController::class, 'contact'])->name('contact'); 

Route::get('/cari-dokter', [App\Http\Controllers\indexController::class, 'cari-dokter'])->name('cari-dokter');

Route::get('/karir', [App\Http\Controllers\indexController::class, 'karir'])->name('karir');

Route::get('/jadwal-dokter', [App\Http\Controllers\indexController::class, 'jadwalDokter'])->name('jadwal-dokter');

Route::get('/pain-center', [App\Http\Controllers\indexController::class, 'painCenter'])->name('pain-center');

Route::get('/orthopedic-center', [App\Http\Controllers\indexController::class, 'orthopedicCenter'])->name('orthopedic-center');

Route::get('/klinik-kandungan', [App\Http\Controllers\indexController::class, 'klinikKandungan'])->name('klinik-kandungan');

Route::get('/diagnostic-center', [App\Http\Controllers\indexController::class, 'diagnosticCenter'])->name('diagnostic-center');

Route::get('/intensive-care', [App\Http\Controllers\indexController::class, 'intensiveCare'])->name('intensive-care');

Route::get('/rawat-inap', [App\Http\Controllers\indexController::class, 'rawatInap'])->name('rawat-inap');

Route::get('/rehabilitasi', [App\Http\Controllers\indexController::class, 'rehabilitasi'])->name('rehabilitasi');

Route::get('/farmasi', [App\Http\Controllers\indexController::class, 'farmasi'])->name('farmasi');

Route::get('/emergency', [App\Http\Controllers\indexController::class, 'emergency'])->name('emergency');

Route::get('/fasilitas', [App\Http\Controllers\indexController::class, 'fasilitas'])->name('fasilitas');

Route::get('/kamar', [App\Http\Controllers\indexController::class, 'kamar'])->name('kamar');

Route::get('/auth-modal', [App\Http\Controllers\indexController::class, 'authModal'])->name('auth-modal');

Route::post('/login',    [IndexController::class, 'authLogin'])->name('login');
Route::post('/register', [IndexController::class, 'authRegister'])->name('register');
Route::post('/logout',   [IndexController::class, 'logout'])->name('logout');

Route::view('/register', 'auth.register')->name('register.page'); // halaman form register (GET)
