<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Auth ::check()
    ? redirect()->route('dashboard')
    : redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class,'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::resource('candidates', CandidateController::class);

    });

});


Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::resource('students', StudentController::class);

});

Route::get('/students/export/pdf', [StudentController::class, 'exportPdf'])
    ->name('students.export.pdf');


Route::middleware(['auth'])->group(function () {

    Route::resource('students', StudentController::class);

    Route::resource('candidates', CandidateController::class);

});


Route::middleware('auth')->group(function () {

    Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');

    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');

    Route::get('/vote/success', [VoteController::class, 'success'])->name('vote.success');

});
require __DIR__.'/auth.php';