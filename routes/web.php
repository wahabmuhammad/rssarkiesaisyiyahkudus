<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/contact', function () {
    return view('public.contact');
});

Route::get('/pain-center', function () {
    return view('coe.pain-center');
})->name('pain-center');

Route::get('/orthopedic-center', function () {
    return view('coe.orthopedic-center');
})->name('orthopedic-center');

Route::get('/klinik-kandungan', function () {
    return view('coe.klinik-kandungan');
})->name('klinik-kandungan');

// Diagnostic Center
Route::get('/diagnostic-center', function () {
    return view('fasilitas.diagnostic-center');
})->name('diagnostic-center');

// Intensive Care
Route::get('/intensive-care', function () {
    return view('fasilitas.intensive-care');
})->name('intensive-care');

// Rawat Inap
Route::get('/rawat-inap', function () {
    return view('fasilitas.rawat-inap');
})->name('rawat-inap');

// Rehabilitasi Medik & Fisioterapi
Route::get('/rehabilitasi', function () {
    return view('fasilitas.rehabilitasi');
})->name('rehabilitasi');

// Farmasi
Route::get('/farmasi', function () {
    return view('fasilitas.farmasi');
})->name('farmasi');

// Emergency
Route::get('/emergency', function () {
    return view('fasilitas.emergency');
})->name('emergency');

