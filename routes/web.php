<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoggedController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('project.index');

Route::get('/show/{id}', [LoggedController::class, 'show'])
    ->middleware(['auth'])
    ->name('project.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
});

require __DIR__.'/auth.php';
