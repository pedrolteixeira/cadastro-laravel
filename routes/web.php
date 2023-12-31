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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
Route::post('/salvar-endereco', [App\Http\Controllers\EnderecoController::class, 'salvarEndereco'])->middleware('auth');
Route::post('/salvar-foto', [App\Http\Controllers\FotoController::class, 'salvarFoto'])->middleware('auth');
Route::post('/remover-foto', [App\Http\Controllers\FotoController::class, 'removerFoto'])->middleware('auth');
