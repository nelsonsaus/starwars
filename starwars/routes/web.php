<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


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






Route::get('/', function () {
    return view('login');
})->name('login');

Route::resource('usuarios', UsuarioController::class);


Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio')->middleware('auth');



Route::get('/peliculas', function () {
    return view('peliculas');
})->name('peliculas')->middleware('auth');





Route::get('/naves', 'App\Http\Controllers\NaveController@index')
    ->name('naves.index')->middleware('auth');

// Route::delete('pilotado/{x}{y}', 'App\Http\Controllers\NaveController@borrarPilotado')
//     ->name('pilotado.borrar');

// Route::post('pilotado', 'App\Http\Controllers\NaveController@storePilotado')
//     ->name('pilotado.store');


// Route::post('', 'App\Http\Controllers\UsuarioController@store')
//     ->name('usuarios.store');


Route::post('login', 'App\Http\Controllers\UsuarioController@login')
    ->name('usuarios.login');

Route::get('logout', 'App\Http\Controllers\UsuarioController@logout')
    ->name('usuarios.logout')->middleware('auth');
