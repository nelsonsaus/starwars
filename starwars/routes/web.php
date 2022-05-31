<?php

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

//Route::get('/', function () {
//    return view('naves/index');
//});

// Route::get('/', function () {
//      return view('welcome');
//  });

// Route::resource('/', 'App\Http\Controllers\NaveController');




Route::get('/', function () {
    return view('login');
})->name('login');


Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');



Route::get('/peliculas', function () {
    return view('peliculas');
})->name('peliculas');



Route::get('/naves', 'App\Http\Controllers\NaveController@index')
    ->name('naves.index');

Route::delete('pilotado/{alumno}{asignatura}', 'App\Http\Controllers\NaveController@borrarPilotado')
    ->name('pilotado.borrar');

Route::post('pilotado', 'App\Http\Controllers\NaveController@storePilotado')
    ->name('pilotado.store');


Route::post('usuarios', 'App\Http\Controllers\UsuarioController@store')
    ->name('usuarios.store');