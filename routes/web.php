<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\SubCriteriaController;
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

Route::resource('data-anggota', MemberController::class)
    ->names([
        'index' => 'data-anggota.member',
        'create' => 'data-anggota.form',
    ]);
Route::get('export/excel/', [MemberController::class, 'export'])->name('data-anggota.export');

Route::resource('data-kriteria', CriteriaController::class)
    ->names([
        'index' => 'data-kriteria.criteria',
        // 'create' => 'data-kriteria.form',
    ]);

Route::resource('data-sub-criteria', SubCriteriaController::class)
    ->names([
        'index' => 'data-sub-kriteria.sub-criteria',
    ]);


    
// Route::get('data-anggota', function () {
//     return view('pages.admin.data-anggota.member');
// })->name('data-anggota.member');

// Route::get('data-anggota/tambah-anggota', function () {
//     return view('pages.admin.data-anggota.form');
// })->name('data-anggota.form');

// Route::get('data-kriteria', function () {
//     return view('pages.admin.data-kriteria.criteria');
// })->name('data-kriteria.criteria');

// Route::get('data-kriteria/tambah-kriteria', function () {
//     return view('pages.admin.data-kriteria.form');
// })->name('data-kriteria.form');

// Route::get('data-sub-kriteria', function () {
//     return view('pages.admin.data-sub-kriteria.sub-criteria');
// })->name('data-sub-kriteria.sub-criteria');

Route::get('data-alternatif', function () {
    return view('pages.admin.data-alternatif.alternatif');
})->name('data-alternatif.alternatif');

Route::get('penilaian-alternatif/assessment', function () {
    return view('pages.admin.penilaian-alternatif.assessment');
})->name('penilaian-alternatif.assessment');

Route::get('perhitungan', function () {
    return view('pages.admin.perhitungan.value-calculation');
})->name('perhitungan.value-calculation');

Route::get('perankingan', function () {
    return view('pages.admin.perankingan.rank');
})->name('perankingan.rank');
