<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\LogicalOr;

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
    return view('index');
})->name('inicio');

Route::get('conocenos', function () {
    return view('conocenos');
})->name('conocenos');

Route::get('contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('membresia', function () {
    return view('auth.membresia');
})->name('membresia')->middleware('auth', 'verified');

Route::group(['usuario' => 'usuario', 'as' => 'usuario.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/perfil', [UsuarioController::class, 'homeUser'])->name('userHome');
    Route::post('cargarImagen', [UsuarioController::class, 'cargarImagenUsuario'])->name('cargarImagen');
    Route::post('actualizarDatosPersonales', [UsuarioController::class, 'actualizarDatosPersonales'])->name('actualizarDatosPersonales');
    Route::post('actualizarContraseña', [UsuarioController::class, 'cambiarContraseña'])->name('actualizarContraseña');
    Route::get('comprar/{tipo}', [UsuarioController::class, 'socio'])->name('comprar');
    Route::get('baja', [UsuarioController::class, 'bajaSocio'])->name('baja');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
