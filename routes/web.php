<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Utiliza uma função de callback.
Route::group(['Middleware' => 'web'], function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
     
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/usuarios/deletar/{id}', [App\Http\Controllers\UsuariosController::class, 'deletar'])->name('usuarios.deletar')->middleware('auth');
Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios.index')->middleware('auth');
Route::get('/usuarios/new', [App\Http\Controllers\UsuariosController::class, 'new'])->name('usuarios.new')->middleware('auth');
Route::post('/usuarios/add', [App\Http\Controllers\UsuariosController::class, 'add'])->name('usuarios.add')->middleware('auth');
Route::get('/usuarios/edit/{id}', [App\Http\Controllers\UsuariosController::class, 'edit'])->name('usuarios.edit')->middleware('auth');
Route::put('/usuarios/update/{id}', [App\Http\Controllers\UsuariosController::class, 'update'])->name('usuarios.update')->middleware('auth');