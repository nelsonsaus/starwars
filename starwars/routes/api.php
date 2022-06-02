<?php

use App\Http\Controllers\NaveController;
use App\Models\Nave;
use App\Models\Piloto;
use App\Models\NavePilotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/naves', function(){
//     return Nave::all();
// });

Route::get('/naves', function(){
    return Nave::all();
});
Route::get('/navepiloto', function(){
    return NavePilotos::all();
});

Route::post('/navepiloto', function(){

    request()->validate([
        'id' => 'required',
        'nave_id' => 'required',
        'piloto_id' => 'required',
    ]);

    return NavePilotos::create([
        'id' => request('id'),
        'nave_id' => request('nave_id'),
        'piloto_id' => request('piloto_id'),
    ]);

});

Route::post('/naves', [NaveController::class, 'storePilotado']);

Route::get('/pilotos', function(){
    return Piloto::all();
});


Route::get('/pilotos/{piloto}', function(Piloto $piloto){
    return Piloto::all()->where('id', $piloto->id);
});
// Route::post('/naves', function(){

//     request()->validate([
//         'nombre' => 'required',
//         'pilotos' => 'required',
//         'precio' => 'required',
//     ]);

//     return Nave::create([

//         'nombre' => request('nombre'),
//         'pilotos' => request('pilotos'),
//         'precio' => request('precio'),

//     ]);
// });


//Route::put('/naves/{nave}', [NaveController::class, 'update']);


// Route::put('/naves/{nave}', function(Nave $nave){

//     request()->validate([
//         'nombre' => 'required',
//         'pilotos' => 'required',
//         'precio' => 'required',
//     ]);

//     $success = $nave->update([

//         'nombre' => request('nombre'),
//         'pilotos' => request('pilotos'),
//         'precio' => request('precio'),
//         'logo' => request('logo'),

//     ]);


//     return [
//         'success' => $success
//     ];

// });


Route::delete('/naves/{nave}', [NaveController::class, 'borrarPilotado']);

Route::delete('/navepiloto/{navepi}', function(NavePilotos $navepi){
    $success = $navepi->delete();

    return [
        'success' => $success
    ];
});

// Route::delete('/naves/{nave}', function(Nave $nave){
//     $success = $nave->delete();

//     return [
//         'success' => $success
//     ];
// });
