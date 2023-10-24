<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesionalController;


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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('profesionales/index_profesionales', [App\Http\Controllers\ProfesionalController::class, 'index'])->name('index_profesionales');
Route::post('Profesionales/index_profesionales', [App\Http\Controllers\ProfesionalController::class, 'store'])->name('index_profesionales.store');
Route::get('profesionales/{id}/edit', [ProfesionalController::class, 'edit'])->name('profesionales.edit');
Route::put('profesionales/{id}', [ProfesionalController::class, 'update'])->name('profesionales.update');



Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

