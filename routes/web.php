<?php

use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacanteController::class, 'index'])
    ->name('vacantes.index')
    ->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');

    Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
});

Route::get('/notificaciones', NotificationController::class)
    ->name('notificaciones')
    ->middleware(['auth', 'verified', 'rol.reclutador']);

Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

Route::get('/candidatos/{vacante}', [CandidatosController::class, 'index'])
    ->middleware(['auth', 'verified', 'rol.reclutador'])
    ->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */


Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacanteController::class, 'index'])
    ->name('vacantes.index')
    ->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');

    Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
});

Route::get('/notificaciones', NotificationController::class)
    ->name('notificaciones')
    ->middleware(['auth', 'rol.reclutador']);

Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

Route::get('/candidatos/{vacante}', [CandidatosController::class, 'index'])
    ->middleware(['auth', 'rol.reclutador'])
    ->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
