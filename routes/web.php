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
//email-verify
Route::get('/email-verify', [App\Http\Controllers\EmailEmpresaController::class, 'index'])->name('email-verify');
Route::get('/empresa/verifyUser', [App\Http\Controllers\EmpresaController::class, 'verifyUser'])->name('empresa.verifyUser');
//transaccion-verify
Route::get('/transaccion/email-transaccion-verify/{nroTransaccion}', [App\Http\Controllers\EmailTransaccionController::class, 'index'])->name('email-transaccion-verify');
Route::get('/email-transaccion', [App\Http\Controllers\EmailTransaccionController::class, 'index'])->name('email-transaccion');
Route::get('/email-transaccion-finalizada', [App\Http\Controllers\EmailTransaccionController::class, 'index'])->name('email-transaccion-finalizada');

//inversion-verify
Route::get('/inversionistaTransaccion/email-inversion-verify/{nroTransaccion}', [App\Http\Controllers\EmailInversionController::class, 'index'])->name('email-inversion-verify');
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
Route::get('/tipoCambio/getTipoCambioTimeReal', [App\Http\Controllers\TipoCambioController::class, 'getTipoCambioTimeReal'])->name('tipoCambio.getTipoCambioTimeReal');
Route::post('/tipoCambio/sendTipoCambio', [App\Http\Controllers\TipoCambioController::class, 'sendTipoCambio'])->name('tipoCambio.sendTipoCambio');

//Empresa 
Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa');
Route::post('/empresa/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('empresa.create');

//Inversionista - cliente
Route::get('/inversionista', [App\Http\Controllers\InversionistaController::class, 'index'])->name('inversionista');
Route::post('/inversionista/gestion', [App\Http\Controllers\InversionistaController::class, 'gestion'])->name('inversionista.gestion');

//Inversionista - operacion - cliente 
Route::get('/inversionistaOperacion', [App\Http\Controllers\InversionistaOperacionController::class, 'index'])->name('inversionistaOperacion');
Route::post('/inversionistaOperacion/createCuentaBancaria', [App\Http\Controllers\InversionistaOperacionController::class, 'createCuentaBancaria'])->name('inversionistaOperacion.createCuentaBancaria');
Route::get('/inversionistaOperacion/{cuentaId}/getCuentaBancariaSelected', [App\Http\Controllers\InversionistaOperacionController::class, 'getCuentaBancariaSelected'])->name('inversionistaOperacion.getCuentaBancariaSelected');
Route::post('/inversionistaOperacion/createOperacion', [App\Http\Controllers\InversionistaOperacionController::class, 'createOperacion'])->name('inversionistaOperacion.createOperacion');

//Inversionista - transaccion - cliente
Route::get('/inversionistaTransaccion/{nroTransaccion}', [App\Http\Controllers\InversionistaTransaccionController::class, 'index'])->name('inversionistaTransaccion');
Route::post('/inversionistaTransaccion/enviarOperacion', [App\Http\Controllers\InversionistaTransaccionController::class, 'enviarOperacion'])->name('inversionistaTransaccion.enviarOperacion');

//CuentaBancaria - cliente
Route::get('/cuentaBancaria', [App\Http\Controllers\CuentaBancariaController::class, 'index'])->name('cuentaBancaria');
Route::post('/cuentaBancaria/registro', [App\Http\Controllers\CuentaBancariaController::class, 'registro'])->name('cuentaBancaria.registro');
Route::post('/cuentaBancaria/{cuentaBancariaId}/actualizar', [App\Http\Controllers\CuentaBancariaController::class, 'actualizar'])->name('cuentaBancaria.actualizar');
Route::post('/cuentaBancaria/{cuentaBancariaId}/cambiarEstado', [App\Http\Controllers\CuentaBancariaController::class, 'cambiarEstado'])->name('cuentaBancaria.cambiarEstado');

//EstadoCuenta - GUTI
Route::get('/estadoCuenta', [App\Http\Controllers\EstadoCuentaController::class, 'index'])->name('estadoCuenta');

//Financiamiento - GUTI
Route::get('/financiamiento', [App\Http\Controllers\FinanciamientoController::class, 'index'])->name('financiamiento');

//MisDatos - GUTI
Route::get('/misDatos', [App\Http\Controllers\MisDatosController::class, 'index'])->name('misDatos');
Route::post('/misDatos/{usuarioId}/actualizar', [App\Http\Controllers\MisDatosController::class, 'actualizar'])->name('misDatos.actualizar');
Route::post('/misDatos/{usuarioId}/cambiarContrasena', [App\Http\Controllers\MisDatosController::class, 'cambiarContrasena'])->name('misDatos.cambiarContrasena');

//CambioTipo - GUTI
Route::get('/cambioTipo', [App\Http\Controllers\CambioTipoController::class, 'index'])->name('cambioTipo');

//Operaciones
Route::get('/operacion', [App\Http\Controllers\OperacionController::class, 'index'])->name('operacion');
Route::post('/operacion/createCuentaBancaria', [App\Http\Controllers\OperacionController::class, 'createCuentaBancaria'])->name('operacion.createCuentaBancaria');
Route::post('/operacion/createOperacion', [App\Http\Controllers\OperacionController::class, 'createOperacion'])->name('operacion.createOperacion');
Route::get('/operacion/{cuentaId}/getCuentaBancariaSelected', [App\Http\Controllers\OperacionController::class, 'getCuentaBancariaSelected'])->name('operacion.getCuentaBancariaSelected');

//transaccion
Route::get('/transaccion/{nroTransaccion}', [App\Http\Controllers\TransaccionController::class, 'index'])->name('transaccion');
Route::post('/transaccion/enviarOperacion', [App\Http\Controllers\TransaccionController::class, 'enviarOperacion'])->name('transaccion.enviarOperacion');



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

Route::get('/admin/inversiones', [App\Http\Controllers\Admin\InversionController::class, 'index'])->name('admin.inversiones');
Route::post('/admin/inversiones/registro', [App\Http\Controllers\Admin\InversionController::class, 'registro'])->name('admin.inversiones.registro');
Route::post('/admin/inversiones/{inversionesId}/actualizar', [App\Http\Controllers\Admin\InversionController::class, 'actualizar'])->name('admin.inversiones.actualizar');
Route::delete('/admin/inversiones/{inversionesId}/eliminar', [App\Http\Controllers\Admin\InversionController::class, 'eliminar'])->name('admin.inversiones.eliminar');

//REPUESTO
Route::get('/admin/empresasInversionistas', [App\Http\Controllers\Admin\EmpresaInversionistaController::class, 'index'])->name('admin.empresasInversionistas');
Route::post('/admin/empresasInversionistas/registro', [App\Http\Controllers\Admin\EmpresaInversionistaController::class, 'registro'])->name('admin.empresasInversionistas.registro');
Route::post('/admin/empresasInversionistas/{empresasInversionistasId}/actualizar', [App\Http\Controllers\Admin\EmpresaInversionistaController::class, 'actualizar'])->name('admin.empresasInversionistas.actualizar');
Route::delete('/admin/empresasInversionistas/{empresasInversionistasId}/eliminar', [App\Http\Controllers\Admin\EmpresaInversionistaController::class, 'eliminar'])->name('admin.empresasInversionistas.eliminar');


Route::get('/admin/operaciones', [App\Http\Controllers\Admin\OperacionController::class, 'index'])->name('admin.operaciones');
Route::post('/admin/operaciones/{operacionId}/actualizar', [App\Http\Controllers\Admin\OperacionController::class, 'actualizar'])->name('admin.operaciones.actualizar');

Route::get('/admin/cuentabancaria', [App\Http\Controllers\Admin\CuentaBancariaController::class, 'index'])->name('admin.cuentabancaria');


Route::get('/admin/operaciones-inversion', [App\Http\Controllers\Admin\InversionOperacionController::class, 'index'])->name('admin.operaciones-inversion');

Auth::routes(['verify' => true]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
