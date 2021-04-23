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

Route::get('/email-verify', [App\Http\Controllers\EmailEmpresaController::class, 'index'])->name('email-verify');

Route::get('/empresa/verifyUser', [App\Http\Controllers\EmpresaController::class, 'verifyUser'])->name('empresa.verifyUser');

//rutas publicas
Route::get('/', function () {
  return view('auth.login');
});

Route::get('/tipoRegistro', [App\Http\Controllers\TipoRegistroController::class, 'index'])->name('tipoRegistro');

//user
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::post('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');

//TipodeCambio
Route::get('/tipoCambio', [App\Http\Controllers\TipoCambioController::class, 'index'])->name('tipoCambio');
Route::post('/tipoCambio/getTipoCambio', [App\Http\Controllers\TipoCambioController::class, 'getTipoCambio'])->name('tipoCambio.getTipoCambio');

//Empresa 
Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa');
Route::post('/empresa/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.create');

//inversionista - GUTI
Route::get('/inversionista', [App\Http\Controllers\InversionistaController::class, 'index'])->name('inversionista');

//CuentaBancaria - GUTI
Route::get('/cuentaBancaria', [App\Http\Controllers\CuentaBancariaController::class, 'index'])->name('cuentaBancaria');
Route::post('/cuentaBancaria/create', [App\Http\Controllers\CuentaBancariaController::class, 'create'])->name('cuentaBancaria.create');

//EstadoCuenta - GUTI
Route::get('/estadoCuenta', [App\Http\Controllers\EstadoCuentaController::class, 'index'])->name('estadoCuenta');

//Financiamiento - GUTI
Route::get('/financiamiento', [App\Http\Controllers\FinanciamientoController::class, 'index'])->name('financiamiento');

//MisDatos - GUTI
Route::get('/misDatos', [App\Http\Controllers\MisDatosController::class, 'index'])->name('misDatos');
Route::post('/misDatos/{usuarioId}/actualizar', [App\Http\Controllers\MisDatosController::class, 'actualizar'])->name('misDatos.actualizar');


//CambioTipo - GUTI
Route::get('/cambioTipo', [App\Http\Controllers\CambioTipoController::class, 'index'])->name('cambioTipo');

//Operaciones
Route::get('/operacion', [App\Http\Controllers\OperacionController::class, 'index'])->name('operacion');
Route::post('/operacion/createCuentaBancaria', [App\Http\Controllers\OperacionController::class, 'createCuentaBancaria'])->name('operacion.createCuentaBancaria');
Route::post('/operacion/createOperacion', [App\Http\Controllers\OperacionController::class, 'createOperacion'])->name('operacion.createOperacion');
Route::get('/operacion/{cuentaId}/getCuentaBancariaSelected', [App\Http\Controllers\OperacionController::class, 'getCuentaBancariaSelected'])->name('operacion.getCuentaBancariaSelected');

//Cambiar Contraseña
Route::get('change-password', 'CambiarContraseñaController@index');
Route::post('change-password', 'CambiarContraseñaController@store')->name('change.password');


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


