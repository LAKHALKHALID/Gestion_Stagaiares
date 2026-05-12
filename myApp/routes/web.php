<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\BacController;
use App\Http\Controllers\ComportementController;
use App\Http\Controllers\DeperditionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ListAbsenceController;
use App\Http\Controllers\FiliersController;
use App\Http\Controllers\GroupesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StagiaireController;
use App\Models\Engagement;
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
    // Route::resource('filiers', FiliersController::class);
    // Route::resource('groupes', GroupesController::class);
});

Route::middleware(['auth'])->controller(FiliersController::class)->group(function(){
    Route::get('/filiers','index')->name('filiers.index');
    Route::get('/filiers/create','create')->name('filiers.create');
    Route::post('/filiers', 'store')->name('filiers.store');
    Route::get('/filiers/{code_f}/show', 'show')->name('filiers.show');

    Route::get('/filiers/{code_f}/edit', 'edit')->name('filiers.edit');
    Route::put('/filiers/{code_f}', 'update')->name('filiers.update');
    Route::delete('/filiers/{code_f}', 'destroy')->name('filiers.destroy');
});

Route::middleware(['auth'])->controller(GroupesController::class)->group(function () {
    Route::get('/groupes', 'index')->name('groupes.index');
    Route::get('/groupes/create', 'create')->name('groupes.create');
    Route::post('/groupes', 'store')->name('groupes.store');
    Route::get('/groupes/{code_g}/show', 'show')->name('groupes.show');

    Route::get('/groupes/{code_g}/edit', 'edit')->name('groupes.edit');
    Route::put('/groupes/{code_g}', 'update')->name('groupes.update');
    Route::delete('/groupes/{code_g}', 'destroy')->name('groupes.destroy');
});

Route::middleware(['auth'])->controller(StagiaireController::class)->group(function(){
    Route::get('/stagiaires','index')->name('stagiaires.index');
    Route::get('/stagiaires/badges', 'badge')->name('stagiaires.badge');
    Route::get('/stagiaires/create', 'create')->name('stagiaires.create');
    Route::post('/stagiaires','store')->name('stagiaires.store');
    Route::get('/stagiaires/{cef}', 'show')->name('stagiaires.show');
    Route::get('/stagiaires/{cef}/edit', 'edit')->name('stagiaires.edit');
    Route::put('/stagiaires/{cef}', 'update')->name('stagiaires.update');
    Route::delete('/stagiaires/{cef}', 'destroy')->name('stagiaires.destroy');

});

Route::middleware(['auth'])->controller(InscriptionController::class)->group(function(){
    Route::get('/inscription','index')->name('inscription.index');
    Route::post('/inscription','store')->name('inscription.store');
});

Route::middleware(['auth'])->controller(AbsenceController::class)->group(function(){

    Route::get('/absences','index')->name('absences.index');
    Route::get('/absences/create', 'create')->name('absences.create');
    Route::post('/absences', 'store')->name('absences.store');
    Route::get('/absences/{id}/edit', 'edit')->name('absences.edit');
    Route::put('/absences/{id}', 'update')->name('absences.update');
    Route::delete('/absences/{id}', 'destroy')->name('absences.destroy');
});

Route::middleware(['auth'])->controller(ComportementController::class)->group(function(){

    Route::get('/comportements','index')->name('comportements.index');
    Route::get('/comportements/create', 'create')->name('comportements.create');
    Route::post('/comportements', 'store')->name('comportements.store');
    Route::get('/comportements/{id}/edit','edit')->name('comportements.edit');
    Route::put('/comportements/{id}', 'update')->name('comportements.update');
});

Route::middleware(['auth'])->controller(ListAbsenceController::class)->group(function(){
    Route::get('/listAbsences','index')->name('listAbsences.index');
    // Route::get('/listAbsences', 'newIndex')->name('listAbsences.newIndex');

    Route::post('/listAbsences','store')->name('listAbsences.store');
    Route::get('/listAbsences/modifie','modifie')->name('listAbsences.edit');
});

Route::middleware(['auth'])->controller(BacController::class)->group(function(){

    Route::get('/retraitBac','index')->name('retraitBac.index');
    Route::get('/retraitBac/create', 'create')->name('retraitBac.create');
    Route::post('/retraitBac', 'store')->name('retraitBac.store');
    Route::get('/retraitBac/{id}/edit', 'edit')->name('retraitBac.edit');
    Route::put('/retraitBac/{id}', 'update')->name('retraitBac.update');
    Route::delete('/retraitBac/{id}', 'destroy')->name('retraitBac.destroy');
    
});

Route::middleware(['auth'])->controller(DeperditionController::class)->group(function(){
    Route::get('/deperditions','index')->name('deperditions.index');
    Route::get('/deperditions/create', 'create')->name('deperditions.create');
    Route::get('/deperditions/{id}/edit', 'edit')->name('deperditions.edit');
    Route::post('/deperditions','store')->name('deperditions.store');
    Route::put('/deperditions/{id}', 'update')->name('deperditions.update');
});

Route::middleware(['auth'])->controller(EngagementController::class)->group(function(){
    Route::get('/engagements','index')->name('engagements.index');
    Route::get('/engagements/create', 'create')->name('engagements.create');
    Route::post('/engagements', 'store')->name('engagements.store');
    Route::get('/engagements/{id}/edit', 'edit')->name('engagements.edit');
    Route::put('/engagements/{id}', 'update')->name('engagements.update');
    Route::delete('/engagements/{id}', 'destroy')->name('engagements.destroy');
});

Route::controller(DocumentController::class)->group(function(){
    Route::get('/document','index')->name('document.index');
    Route::get('/dashboard', 'dashboard')->name('document.dashboard');
});

require __DIR__.'/auth.php';
