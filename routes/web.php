<?php

use App\Http\Controllers\AdminController;
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

Route::get('cre', function () {
    return view('ejemplares.create');
})->name('cre');

Route::post('gu', [EjemplarController::class, 'crear'])->name('gu');

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
    Route::get('usuario/mis-libros', [UsuarioController::class, 'showMisLibros'])->name('libros');
    Route::get('libro/{ejemplar}', [UsuarioController::class, 'showLibro'])->name('libro');
    Route::post('admin/cambiar-rol/{usuario}', [UsuarioController::class, 'cambiarRol'])->name('cambiar');
});

Route::group(['rol' => 'rol', 'as' => 'rol.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('admin/roles', [RolController::class, 'roles'])->name('roles');
    Route::post('admin/crear-rol', [RolController::class, 'crearRol'])->name('crear');
});

Route::group(['ejemplar' => 'ejemplar', 'as' => 'ejemplar.'], function () {
    Route::get('ejemplares', [EjemplarController::class, 'ejemplares'])->name('ejemplares');
    Route::get('ejemplar/{ejemplar}', [EjemplarController::class, 'showDetallesEjemplar'])->name('ejemplar');
    Route::get('puntuar/{ejemplar}/{puntuacion}', [EjemplarController::class, 'puntuar'])->middleware('auth', 'verified')->name('puntuar');
    Route::get('ejemplares/ordenar/{tipo}', [EjemplarController::class, 'ordenarEjemplares'])->name('ordenar');
    Route::post('ejemplar/buscar', [EjemplarController::class, 'buscarEjemplar'])->name('buscar');
    Route::post('alquilar/{ejemplar}', [EjemplarController::class, 'alquilarEjemplar'])->middleware('auth', 'verified')->name('alquilar');

    Route::get('admin/ejemplares', [EjemplarController::class, 'ejemplaresAdmin'])->name('admin-ejemplares');
    Route::post('admin/ejemplar', [EjemplarController::class, 'buscarEjemplarAdmin'])->name('admin-buscar');
    Route::get('admin/eliminar/ejemplar/{ejemplar}', [EjemplarController::class, 'eliminarEjemplar'])->name('admin-eliminar');
    Route::get('admin/editar/ejemplar/{ejemplar}', [EjemplarController::class, 'showEditView'])->name('admin-editar');
    Route::post('admin/actualizar/ejemplar/{ejemplar}', [EjemplarController::class, 'updateEjemplar'])->name('admin-actualizar');
});

Route::group(['editorial' => 'editorial', 'as' => 'editorial.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('editoriales', [EditorialController::class, 'editoriales'])->name('editoriales');
    Route::post('admin/editorial/buscar', [EditorialController::class, 'buscarEditorial'])->name('buscar');
    Route::post('admin/editorial/crear', [EditorialController::class, 'crearEditorial'])->name('crear');
    Route::get('admin/editorial/eliminar/{editorial}', [EditorialController::class, 'eliminarEditorial'])->name('eliminar');
    Route::post('admin/actualizar/editorial/{editorial}', [EditorialController::class, 'actualizarEditorial'])->name('actualizar');
});

Route::group(['coleccion' => 'coleccion', 'as' => 'coleccion.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('colecciones', [ColeccionController::class, 'colecciones'])->name('colecciones');
    Route::post('admin/coleccion/buscar', [ColeccionController::class, 'buscarColeccion'])->name('buscar');
    Route::post('admin/coleccion/crear', [ColeccionController::class, 'crearColeccion'])->name('crear');
    Route::get('admin/coleccion/eliminar/{coleccion}', [ColeccionController::class, 'eliminarColeccion'])->name('eliminar');
    Route::post('admin/actualizar/coleccion/{coleccion}', [ColeccionController::class, 'actualizarColeccion'])->name('actualizar');
});

Route::group(['autor' => 'autor', 'as' => 'autor.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('autores', [AutorController::class, 'autores'])->name('autores');
    Route::post('admin/autor/buscar', [AutorController::class, 'buscarAutor'])->name('buscar');
    Route::post('admin/autor/crear', [AutorController::class, 'crearAutor'])->name('crear');
    Route::get('admin/autor/eliminar/{autor}', [AutorController::class, 'eliminarAutor'])->name('eliminar');
    Route::post('admin/actualizar/autor/nombre/{autor}', [AutorController::class, 'actualizarNombreAutor'])->name('actualizar-nombre');
    Route::post('admin/actualizar/autor/apellido1/{autor}', [AutorController::class, 'actualizarApe1Autor'])->name('actualizar-ape1');
    Route::post('admin/actualizar/autor/apellido2/{autor}', [AutorController::class, 'actualizarApe2Autor'])->name('actualizar-ape2');
});

Route::group(['alquiler' => 'alquiler', 'as' => 'alquiler.', 'middleware' => ['auth', 'verified']], function () {
    // Route::get('alquileres', [AlquilerController::class, 'alquileres'])->name('alquileres');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/inico', [AdminController::class, 'chartUsuario'])->name('admin');
