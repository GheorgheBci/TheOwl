<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EjemplarController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\ColeccionController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\AlquilerController;
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

    Route::get('usuarios', [UsuarioController::class, 'usuarios'])->name('usuarios');
    Route::get('eliminar/{usuario}', [UsuarioController::class, 'eliminarCuenta'])->name('eliminar');
    Route::post('buscarUsuario', [UsuarioController::class, 'buscarUsuario'])->name('buscar');
});

Route::group(['rol' => 'rol', 'as' => 'rol.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('roles', [RolController::class, 'roles'])->name('roles');
});

Route::group(['ejemplar' => 'ejemplar', 'as' => 'ejemplar.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('ejemplares', [EjemplarController::class, 'ejemplares'])->name('ejemplares');
    Route::post('buscar', [EjemplarController::class, 'buscarEjemplar'])->name('buscar');
});

Route::group(['editorial' => 'editorial', 'as' => 'editorial.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('editoriales', [EditorialController::class, 'editoriales'])->name('editoriales');
});

Route::group(['coleccion' => 'coleccion', 'as' => 'coleccion.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('colecciones', [ColeccionController::class, 'colecciones'])->name('colecciones');
});

Route::group(['autor' => 'autor', 'as' => 'autor.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('autores', [AutorController::class, 'autores'])->name('autores');
});

Route::group(['alquiler' => 'alquiler', 'as' => 'alquiler.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('alquileres', [AlquilerController::class, 'alquileres'])->name('alquileres');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', function () {
    return view('admin.index');
})->name('admin');
