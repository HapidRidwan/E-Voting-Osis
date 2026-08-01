<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;

Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect()->route('dashboard')
            : redirect()->route('student.dashboard');
    }

    return redirect()->route('login');
});



/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Buka / Tutup Voting
    Route::post('/setting/toggle', [SettingController::class, 'toggle'])
        ->name('setting.toggle');

    // Menu Admin
    Route::prefix('admin')->group(function () {

        Route::resource('students', StudentController::class);

        Route::resource('candidates', CandidateController::class);

        Route::get('/students/export/pdf', [StudentController::class, 'exportPdf'])
            ->name('students.export.pdf');
    });

});



/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'siswa'])
    ->prefix('student')
    ->group(function () {

        Route::get('/dashboard', [StudentDashboardController::class, 'index'])
            ->name('student.dashboard');

        Route::get('/candidates', [StudentDashboardController::class, 'candidates'])
            ->name('student.candidates');

        Route::get('/vision', [StudentDashboardController::class, 'vision'])
            ->name('student.vision');

        Route::get('/status', [StudentDashboardController::class, 'status'])
            ->name('student.status');

        Route::get('/vote', [VoteController::class, 'index'])
            ->name('vote.index');

        Route::post('/vote', [VoteController::class, 'store'])
            ->name('vote.store');

        Route::get('/vote/success', [VoteController::class, 'success'])
            ->name('vote.success');
});



require __DIR__.'/auth.php';