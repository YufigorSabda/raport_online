<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataSekolah\KepalaSekolahController;
use App\Http\Controllers\DataSekolah\SekolahController;
use App\Http\Controllers\ManajemenKelas\AbsensiController;
use App\Http\Controllers\ManajemenKelas\CatatanController;
use App\Http\Controllers\ManajemenKelas\PesertaDidikController;
use App\Http\Controllers\ManajemenKelas\WaliKelasController;
use App\Http\Controllers\Pengguna\GuruController;
use App\Http\Controllers\Pengguna\OperatorController;
use App\Http\Controllers\Pengguna\SiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login.index');
});

Route::resource('login', AuthController::class)->only(['index', 'store'])->middleware('guest');

Route::group(['middleware' => 'auth'], function () {
    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('sekolah', SekolahController::class)->only(['index', 'update']);
    Route::resource('kepala-sekolah', KepalaSekolahController::class)->only(['index', 'update']);

    Route::resource('student', SiswaController::class)->only(['index', 'destroy', 'update', 'store']);
    Route::get('student/{id?}/edit', [SiswaController::class, 'edit'])->name('student.edit');

    Route::resource('teacher', GuruController::class)->only(['index', 'store', 'destroy']);
    Route::put('teacher/{id}', [GuruController::class, 'reset_password'])->name('teacher.reset');

    Route::resource('operator', OperatorController::class)->only(['index', 'store', 'destroy']);

    Route::resource('walikelas', WaliKelasController::class)->only(['index', 'update', 'edit']);

    Route::resource('pesertadidik', PesertaDidikController::class);

    Route::resource('absensi', AbsensiController::class)->only(['index']);

    Route::resource('catatan', CatatanController::class)->only(['index']);

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.index');
        Route::post('/profile/save', 'save')->name('profile.save');
        Route::get('/change-password', 'password')->name('profile.password');
        Route::post('/change-password/save', 'saveNewPassword')->name('profile.savePassword');
    });
});
