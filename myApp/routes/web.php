<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\ComportementController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ListAbsenceController;
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

Route::controller(InscriptionController::class)->group(function(){
    Route::get('/inscription','index')->name('inscription.index');
    Route::post('/inscription','store')->name('inscription.store');
});

Route::controller(AbsenceController::class)->group(function(){

    Route::get('/absences','index')->name('absences.index');
    Route::get('/absences/create', 'create')->name('absences.create');
    Route::post('/absences', 'store')->name('absences.store');
    Route::get('/absences/{id}/edit', 'edit')->name('absences.edit');
    Route::put('/absences/{id}', 'update')->name('absences.update');
});

Route::controller(ComportementController::class)->group(function(){

    Route::get('/comportement','index')->name('comportement.index');
    Route::get('/comportement/create', 'create')->name('comportement.create');
    Route::post('/comportement', 'store')->name('comportement.store');
    
});

Route::controller(ListAbsenceController::class)->group(function(){
    Route::get('/listAbsences','index')->name('listAbsences.index');
    Route::post('/listAbsences','store')->name('listAbsences.store');
});

require __DIR__.'/auth.php';
