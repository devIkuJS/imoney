<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas publicas
Route::get('/', function () {
  return view('auth.login');
});

Route::get('/tipoRegistro', [App\Http\Controllers\TipoRegistroController::class, 'index'])->name('tipoRegistro');

//user
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::post('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');


//Empresa
Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa');
Route::post('/empresa/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.create');

//inversionista
Route::get('/inversionista', [App\Http\Controllers\InversionistaController::class, 'index'])->name('inversionista');
Route::post('/empresa/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.create');
//Admin
Route::get('/admin/empresas', [App\Http\Controllers\Admin\EmpresaController::class, 'index'])->name('admin.empresas');
Route::get('/admin/usuarios', [App\Http\Controllers\Admin\UsuarioController::class, 'index'])->name('admin.usuarios');
Route::post('/admin/usuarios/registro', [App\Http\Controllers\Admin\UsuarioController::class, 'registro'])->name('admin.usuarios.registro');
Route::post('/admin/usuarios/{usuarioId}/actualizar', [App\Http\Controllers\Admin\UsuarioController::class, 'actualizar'])->name('admin.usuarios.actualizar');
Route::delete('/admin/usuarios/{usuarioId}/eliminar', [App\Http\Controllers\Admin\UsuarioController::class, 'eliminar'])->name('admin.usuarios.eliminar');

Route::get('/admin/tipocambio', [App\Http\Controllers\Admin\TipoCambioController::class, 'index'])->name('admin.tipocambio');
Route::post('/admin/tipocambio/registro', [App\Http\Controllers\Admin\TipoCambioController::class, 'registro'])->name('admin.tipocambio.registro');
Route::post('/admin/tipocambio/{tipocambioId}/actualizar', [App\Http\Controllers\Admin\TipoCambioController::class, 'actualizar'])->name('admin.tipocambio.actualizar');
Route::delete('/admin/tipocambio/{tipocambioId}/eliminar', [App\Http\Controllers\Admin\TipoCambioController::class, 'eliminar'])->name('admin.tipocambio.eliminar');

Auth::routes(['verify' => true]);


