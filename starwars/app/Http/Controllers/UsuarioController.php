<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'nombre' => ['required'],
            'correo' => ['required', 'unique:usuarios,correo'],
            'pass' => ['required'],
        ]);


        $user = new Usuario();
        $user->nombre=ucwords($request->nombre);
        $user->correo=($request->correo);
        $user->pass=$request->pass;

        //PERFIL POR DEFECTO USUARIO NORMAL:
        $user->perfil = 0;



        $user->save();
        return redirect()->route('login')->with('mensaje', 'Usuario creado Correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }





    //*************************************************************
    //OTROS METODOS:
    //*************************************************************



    public function login(Request $request){

        //COMPROBAMOS SI EXISTE O NO EXISTE:

        $use = Usuario::all()->where('correo', $request->correo);
        if(count($use)>0){
            return view('inicio');
            
        }else{

            return redirect()->route('login')->with('error', 'ERROR: El usuario no existe...');

        }


        
    }
}