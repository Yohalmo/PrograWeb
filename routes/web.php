<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisssionController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/registro', [UserController::class, 'Registro'])->name('usuario.registro');

Route::group(['middleware' => ['auth']], function(){

    Route::get('/permisos', [PermisssionController::class, 'index'])->name('permissions.index');
    Route::get('/buscar-privilegios', [PermisssionController::class, 'Buscar'])->name('buscar-privilegios');
    Route::post('/modal-info-permiso', [PermisssionController::class, 'ShowModal'])->name('permission-modal');

});

Route::get('/', [HomeController::class, 'LandingPage'])->name('home');

Route::get('/carrito', [ShoppingController::class, 'index'])->name('shopping-car');
Route::get('/agregar-producto', [ShoppingController::class, 'AddProductModal'])->name('modal-shopping');
