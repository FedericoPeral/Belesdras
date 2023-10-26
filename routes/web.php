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

//Rutas Profesional

Route::get('profesionales/index_profesionales', [App\Http\Controllers\ProfesionalController::class, 'index'])->name('index_profesionales');
Route::post('Profesionales/index_profesionales', [App\Http\Controllers\ProfesionalController::class, 'store'])->name('index_profesionales.store');
Route::get('profesionales/{id}/edit', [ProfesionalController::class, 'edit'])->name('profesionales.edit');
Route::put('profesionales/{id}', [ProfesionalController::class, 'update'])->name('profesionales.update');
Route::delete('profesionales/{id}', [ProfesionalController::class, 'destroy'])->name('profesionales.delete');

//Rutas clientes

Route::get('clientes/indexclientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('indexclientes');
Route::post('clientes/indexclientes', [App\Http\Controllers\ClientesController::class, 'store'])->name('indexclientes.store');
Route::get('clientes/{id}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{id}', [ClientesController::class, 'update'])->name('clientes.update');
Route::delete('clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.delete');


Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

