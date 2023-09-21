<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReservacionController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('users');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('/categorias', CategoriaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('categorias');
Route::resource('/menus', MenuController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('menus');
Route::resource('/mesas', MesaController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('mesas');
Route::resource('/reservaciones', ReservacionController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])->names('reservaciones');
Route::resource('/proveedores', ProveedorController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('proveedores');
Route::resource('/productos', ProductoController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->names('productos');