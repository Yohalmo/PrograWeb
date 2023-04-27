<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', [HomeController::class, 'LandingPage'])->name('home');
Route::post('/', [HomeController::class, 'LandingPage'])->name('home');

Route::get('/login', [UserController::class, 'Login'])->name('login');
Route::get('/registro', [UserController::class, 'Registro'])->name('usuario.registro');

Route::get('/carrito', [ShoppingController::class, 'index'])->name('shopping-car');
Route::get('/agregar-producto', [ShoppingController::class, 'AddProductModal'])->name('modal-shopping');


Route::get('/producto',[ProductsController::class,'Producto'])->name('Products-purchase');
