<?php

use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController; */

use App\Http\Controllers\FighterSelectorController;
use App\Http\Controllers\LocalizationController;

/* Route::get('/battle', 'BattleController@index')->name('battle'); */

//ROUTES PATCH NOTES
Route::get('/patchnotes','PatchnotesController@index' )->name('notesIndex');
Route::get('/patchnotesCreate','PatchnotesController@create' )->name('notesCreate');
Route::post('/patchnotesStore','PatchnotesController@Store' )->name('notesStore');
Route::get('/patchnotesEdit/{id}','PatchnotesController@edit' )->name('notesEdit');
Route::put('/patchnotesUpdate/{id}','PatchnotesController@update' )->name('notesUpdate');
Route::get('/patchnotesShow/{id}','PatchnotesController@show' )->name('notesShow');
Route::delete('/patchnotesDelete/{id}','PatchnotesController@Delete' )->name('notesDelete');

Route::get('/statistics', function () {
    return view('statistics');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/menu', function () {
    return view('template');
});

//ROUTES LOGIN
Auth::routes();

/* Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

Route::get('/support','SupportController@create' )->name('supportCreate');
Route::post('/support','SupportController@store' )->name('supportStore');

Route::get('/fighters','FightersController@index' )->name('FightersIndex');
Route::get('/fighters/{id}','FightersController@edit' )->name('fightersEdit');
Route::put('/fighters/{id}','FightersController@update' )->name('fightersUpdate');
//FIGHTERS
/* Route::get('/patchnotes','PatchnotesController@index' )->name('notesIndex');
Route::get('/patchnotesCreate','PatchnotesController@create' )->name('notesCreate');
Route::post('/patchnotesStore','PatchnotesController@Store' )->name('notesStore');
Route::get('/patchnotesEdit/{id}','PatchnotesController@edit' )->name('notesEdit');
Route::put('/patchnotesUpdate/{id}','PatchnotesController@update' )->name('notesUpdate');
Route::get('/patchnotesShow/{id}','PatchnotesController@show' )->name('notesShow');
Route::delete('/patchnotesDelete/{id}','PatchnotesController@Delete' )->name('notesDelete'); */

Route::get('/','FighterSelectorController@index' )->name('battle');
/* Route::get('/selector_fighters/{id}', [FighterSelectorController::class, 'show'])->name('fighters.show'); */

//Localization rute
Route::get("locale/{lange}", [LocalizationController::class,'setLang']);
/* Route::get('/selector', function () {
    return view('game/selectorFighter');
}); */

