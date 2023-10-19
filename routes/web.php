<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('stats/generatePDF',[App\Http\Controllers\StatsController::class, 'generatePDF'])->name('stats.generatePDF');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('alumnos', App\Http\Controllers\AlumnoController::class);
Route::resource('materias', App\Http\Controllers\MateriaController::class);
Route::resource('calificaciones', App\Http\Controllers\CalificacioneController::class);
Route::resource('stats',App\Http\Controllers\StatsController::class);


