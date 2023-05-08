<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisssionController;
use App\Http\Controllers\RoleController;
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


    Route::prefix('permisos')/* ->middleware('can:ver-permisos') */->group(function () {
        Route::get('/', [PermisssionController::class, 'index'])->name('permissions.index');
        Route::get('/buscar-privilegios', [PermisssionController::class, 'Buscar'])->name('buscar-privilegios');
        Route::post('/modal-info-permiso', [PermisssionController::class, 'ShowModal'])->name('permission-modal');
        Route::post('/save-permissions', [PermisssionController::class, 'SaveInfo'])->name('save-permission');
    });

    Route::prefix('usuarios')/* ->middleware('can:ver-usuarios') */->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('update-user-info', [UserController::class, 'SaveUserInfo'])->name('user.update');
        Route::get('buscar-usuarios/{palabra?}', [UserController::class, 'Buscar'])->name('buscar-usuarios');
        Route::post('cambiar-estado-usuario', [UserController::class, 'DesahabilitarUsuario'])->name('user-estado');
    });

    Route::prefix('roles')/* ->middleware('can:ver-roles') */->group(function () {
        Route::get('buscar-roles/{palabra?}', [RoleController::class, 'Buscar'])->name('buscar-roles');
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('/detalle-role/{role}', [RoleController::class, 'show'])->name('role.show');
        Route::get('/vista-nuevo-role', [RoleController::class, 'create'])->name('role.create');
        Route::get('/editar-roles/{role}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/eliminar-role', [RoleController::class, 'destroy'])->name('role.destroy');
        Route::put('/actualizar-role/{role}', [RoleController::class, 'update'])->name('role.update');
        Route::post('/guardar-role', [RoleController::class, 'store'])->name('role.store');
    });
});

Route::get('/', [HomeController::class, 'LandingPage'])->name('home');

Route::get('/carrito', [ShoppingController::class, 'index'])->name('shopping-car');
Route::get('/agregar-producto', [ShoppingController::class, 'AddProductModal'])->name('modal-shopping');
