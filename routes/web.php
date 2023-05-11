<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermisssionController;
use App\Http\Controllers\ProductsController;
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

    Route::prefix('categorias')/* ->middleware('can:ver-categorias') */->group(function () {
        Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
        Route::get('/buscar-categorias', [CategoriaController::class, 'Buscar'])->name('buscar-categorias');
        Route::post('/modal-info-categoria', [CategoriaController::class, 'ShowModal'])->name('category-modal');
        Route::post('/save-category', [CategoriaController::class, 'SaveInfo'])->name('save-category');
    });

    Route::prefix('productos')/* ->middleware('can:ver-productos') */->group(function () {
        Route::get('/', [ProductsController::class, 'ListaProductos'])->name('productos.listado');
        Route::get('/buscar-productos', [ProductsController::class, 'Buscar'])->name('buscar-productos');
        Route::post('/modal-info-product', [ProductsController::class, 'ShowModal'])->name('product-modal');
        Route::post('/save-product', [ProductsController::class, 'SaveProduct'])->name('save-product');
        Route::post('/cambiar-estado', [ProductsController::class, 'ChangeStatus'])->name('cambiar-estado-producto');
        Route::post('/modal-asignacion', [ProductsController::class, 'CategoriasAsignadas'])->name('modal-asignacion');
        Route::post('/asignar-categoria', [ProductsController::class, 'AsignarCategoria'])->name('asignar-categoria');
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
