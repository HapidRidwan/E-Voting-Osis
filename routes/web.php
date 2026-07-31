<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {

        Route::resource('students', StudentController::class);

        Route::resource('candidates', CandidateController::class);

        Route::get('students/export/pdf', [StudentController::class, 'exportPdf'])
            ->name('students.export.pdf');
    });

        Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
        Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
        Route::get('/vote/success', [VoteController::class, 'success'])->name('vote.success');
    });

    Route::post('/setting/toggle', [SettingController::class, 'toggle'])
    ->name('setting.toggle');

require __DIR__.'/auth.php';