<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(StagiaireController::class)->group(function(){
    Route::get('/stagiaires','index')->name('stagiaires.index');
    Route::get('/stagiaires/create', 'create')->name('stagiaires.create');
    Route::post('/stagiaires','store')->name('stagiaires.store');
    Route::get('/stagiaires/{cef}', 'show')->name('stagiaires.show');
    Route::get('/stagiaires/{cef}/edit', 'edit')->name('stagiaires.edit');
    Route::put('/stagiaires/{cef}', 'update')->name('stagiaires.update');
    Route::delete('/stagiaires/{cef}', 'destroy')->name('stagiaires.destroy');
});

require __DIR__.'/auth.php';
