<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CalculateController;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\RankController;

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
// Route::get('sign-up', function () {
//     return view('pages.auth.signup');
// });


/* MiddleWare Global Scope */
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Perankingan
    Route::namespace('App\Http\Controllers')->group(function () {
        // View Rank
        Route::get('perankingan', 'RankController@index')->name('perankingan.rank');
        // Download PDF
        Route::post('results/pdf', 'RankController@downloadPdf')->name('download.pdf');
    });


    /* MiddleWare Admin and Coach Scope */
    Route::group(['middleware' => ['isAdminAndCoach']], function () {
        // Data Anggota
        Route::resource('data-anggota', MemberController::class)
            ->names([
                'index' => 'data-anggota.member',
                'create' => 'data-anggota.form',
            ]);

        // Export & Import Excel
        Route::get('export/excel/', [MemberController::class, 'export'])->name('data-anggota.export');
        Route::post('import/excel/', [MemberController::class, 'import'])->name('data-anggota.import');

        // Tools
        Route::namespace('App\Http\Controllers\Telegram')->group(function () {
            Route::get('tools/create-announcement', 'TelegramBotController@index')->name('tools.create-announcement');
            Route::post('tools/create-announcement/send-message', 'TelegramBotController@sendMessage')->name('sendMessage');
        });

        // Member Access
        Route::namespace('App\Http\Controllers\User')->group(function () {
            Route::get('member', 'MemberController@index')->name('user.member');
            Route::post('member/create', 'MemberController@store')->name('user.member.store');
            Route::put('member/update/{id}', 'MemberController@update')->name('user.member.update');
            Route::delete('member/delete/{id}', 'MemberController@destroy')->name('user.member.destroy');
        });
    });


    /* MiddleWare Coach Scope */
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

        // Data Periode
        Route::namespace('App\Http\Controllers')->group(function () {
            // Show Periode
            Route::get('periode', 'PeriodController@index')->name('period.index');
            // Create Periode
            Route::post('periode/store', 'PeriodController@store')->name('period.store');
            // Delete Periode
            Route::delete('periode/destroy', 'PeriodController@destroy')->name('period.destroy');
        });

        // Data Periode Perhitungan
        Route::resource('periode', PeriodController::class)
            ->names([
                'index' => 'data-periode',
            ]);

        // Perhitungan SMART
        Route::namespace('App\Http\Controllers')->group(function () {
            // Perhitungan
            Route::get('perhitungan', 'CalculateController@index')->name('perhitungan.value-calculation');
            // Perhitungan Utility
            Route::get('perhitungan/nilai-utility', 'CalculateController@calculateUtility')->name('hitung.utility');
            // Perhitungan Result
            Route::post('perhitungan/nilai-akhir', 'CalculateController@calculateResult')->name('perhitungan.calculate-result');
        });

        // Akses Admin
        Route::namespace('App\Http\Controllers\User')->group(function () {
            // Show Admin
            Route::get('admin', 'AdminController@index')->name('user.admin');
            // Create Admin
            Route::post('admin/create', 'AdminController@store')->name('user.admin.store');
            // Edit Admin
            Route::put('admin/update/{id}', 'AdminController@update')->name('user.admin.update');
            // Destroy Admin
            Route::delete('admin/destroy/{id}', 'AdminController@destroy')->name('user.admin.destroy');
        });
    });
});
