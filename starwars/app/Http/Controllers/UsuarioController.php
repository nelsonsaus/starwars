<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = User::all();
        return view('usuarios.usuarios', compact('usuarios'));
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
            'correo' => ['required', 'unique:users,correo'],
            'password' => ['required'],
        ]);


        $user = new User();
        $user->nombre=ucwords($request->nombre);
        $user->correo=$request->correo;
        $user->password=Hash::make($request->password);

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

        $use = User::all()->where('correo', $request->correo);
        if(count($use)>0){

            $credenciales = request()->only('correo', 'password');
            // echo $credenciales["correo"];
            // die();
            if(Auth::attempt($credenciales)){
                return view('inicio');

            }
            // return view('inicio');

            return redirect()->route('login')->with('error', 'ERROR: El usuario no existe...');
        }else{

            return redirect()->route('login')->with('error', 'ERROR: El usuario no existe...');

        }

    }




    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
