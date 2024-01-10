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

Route::get('/', function () {
    return view('pages.admin.index');
})->name('dashboard');

Route::get('data-anggota/anggota', function () {
    return view('pages.admin.data-anggota.member');
})->name('data-anggota.member');

Route::get('data-anggota/tambah', function () {
    return view('pages.admin.data-anggota.form');
})->name('data-anggota.form');