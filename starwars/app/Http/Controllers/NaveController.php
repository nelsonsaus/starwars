<?php

namespace App\Http\Controllers;

use App\Models\Nave;
use App\Models\NavePilotos;
use App\Models\Piloto;
use Illuminate\Http\Request;

class NaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naves = Nave::all();
        $navespi = NavePilotos::all();
        return view('naves', compact('naves', 'navespi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'pilotos' => 'required',
            'precio' => 'required',
        ]);

        return Nave::create([

            'nombre' => request('nombre'),
            'pilotos' => request('pilotos'),
            'precio' => request('precio'),

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nave  $nave
     * @return \Illuminate\Http\Response
     */
    public function show(Nave $nave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nave  $nave
     * @return \Illuminate\Http\Response
     */
    public function edit(Nave $nave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nave  $nave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nave $nave)
    {

        request()->validate([
            'nombre' => 'required',
            'pilotos' => 'required',
            'precio' => 'required',
        ]);

        $success = $nave->update([

            'nombre' => request('nombre'),
            'pilotos' => request('pilotos'),
            'precio' => request('precio'),
            'logo' => request('logo'),

        ]);


        return [
            'success' => $success
        ];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nave  $nave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nave $nave)
    {
        $success = $nave->delete();

        return [
            'success' => $success
        ];
    }




    //OTROS METODOS:

    public function borrarPilotado(Nave $nave, Piloto $piloto){

        $nave->asignaturas()->detach($piloto->id);
        return redirect()->back()->with('mensaje', "Piloto Borrado de esta Nave Correctamente");

    }

    public function storePilotado(Request $request){

        $nave=Nave::find($request->piloto_id);
        //lo del select:
        $id = $request->idPiloto;
        $nave->pilotos()->attach($id);
        return redirect()->back()->with('mensaje', "Piloto Insertado en la Nave Correctamente");
        //return redirect()->route('matriculas.asignaturasalumno', $nave)->with('mensaje', 'Piloto Insertado Correctamente');

    }
}
