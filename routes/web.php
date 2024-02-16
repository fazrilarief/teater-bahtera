<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\CalculateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Auth::route();

// Authenticate
Route::middleware(['guest'])->group(function () {
    // Login
    Route::namespace('App\Http\Controllers\Auth')->group(function () {
        // Login Index
        Route::get('/', 'LoginController@show')->name('auth.login.show');
        // Login Authenticate
        Route::post('login', 'LoginController@login')->name('auth.login.login');
    });
});
// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('auth.login.logout');

// Sign-Up
Route::get('sign-up', function () {
    return view('pages.auth.signup');
});

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('dashboard', function () {
        return view('pages.admin.index');
    })->name('dashboard');

    // Perankingan
    Route::get('perankingan', [RankController::class, 'index'])->name('perankingan.rank');


    // Middleware Admin and Coach
    Route::group(['middleware' => ['isAdminAndCoach']], function () {
        // Data Anggota
        Route::resource('data-anggota', MemberController::class)
            ->names([
                'index' => 'data-anggota.member',
                'create' => 'data-anggota.form',
            ]);

        // Export & Import Excel
        Route::get('export/excel/', [MemberController::class, 'export'])->name('data-anggota.export');

        // Tools
        Route::get('tools/create-announcement', function () {
            return view('pages.admin.tools.create-announcement');
        })->name('tools.create-announcement');
    });


    // MiddleWare Coach
    Route::group(['middleware' => ['isCoach']], function () {
        // Assessment
        Route::resource('penilaian-alternatif/assessment', AssessmentController::class)
            ->names([
                'index' => 'penilaian-alternatif.assessment',
            ]);

        // Data Krtieria
        Route::resource('data-kriteria', CriteriaController::class)
            ->names([
                'index' => 'data-kriteria.criteria',
                'create' => 'data-kriteria.form',
            ]);

        // Data Sub Krtieria
        Route::resource('data-sub-criteria', SubCriteriaController::class)
            ->names([
                'index' => 'data-sub-kriteria.sub-criteria',
            ]);

        // Perhitungan
        Route::get('perhitungan', [CalculateController::class, 'index'])->name('perhitungan.value-calculation');
        // Perhitungan Result
        Route::post('perhitungan/hitung-nilai-akhir', [CalculateController::class, 'calculateResult'])->name('perhitungan.calculate-result');
        // Perhitungan Utility
        Route::get('/hitung-utility', [CalculateController::class, 'calculateUtility'])->name('hitung.utility');
    });

    Route::namespace('App\Http\Controllers\user')->group(function () {
        Route::get('admin', 'AdminController@index')->name('user.admin');
        Route::post('admin/store', 'AdminController@store')->name('user.admin.store');
        Route::put('admin/update/{id}', 'AdminController@update')->name('user.admin.update');
        Route::delete('admin/destroy/{id}', 'AdminController@destroy')->name('user.admin.destroy');

        Route::get('member', 'MemberController@index')->name('user.member');
    });
});
