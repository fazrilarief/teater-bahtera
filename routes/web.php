<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\CalculateController;
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
        'create' => 'data-kriteria.form',
    ]);

Route::resource('data-sub-criteria', SubCriteriaController::class)
    ->names([
        'index' => 'data-sub-kriteria.sub-criteria',
    ]);

Route::resource('penilaian-alternatif/assessment', AssessmentController::class)
    ->names([
        'index' => 'penilaian-alternatif.assessment',
    ]);

Route::get('perhitungan', [CalculateController::class, 'index'])->name('perhitungan.value-calculation');
// Rute untuk melakukan perhitungan hasil akhir
Route::post('perhitungan/hitung-nilai-akhir', [CalculateController::class, 'calculateResult'])->name('perhitungan.calculate-result');
// Rute untuk melakukan perhitungan utility
Route::get('/hitung-utility', [CalculateController::class, 'calculateUtility'])->name('hitung.utility');

Route::get('perankingan', [RankController::class, 'index'])->name('perankingan.rank');


Route::get('tools/create-announcement', function () {
    return view('pages.admin.tools.create-announcement');
})->name('tools.create-announcement');

Route::get('login', function () {
    return view('pages.auth.login');
});

Route::get('sign-up', function () {
    return view('pages.auth.signup');
});
