<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UsuarioController extends Controller
{



    public function index()
    {

        $usuarios = User::all();
        return view('usuarios.usuarios', compact('usuarios'));
    }


    public function create()
    {
        //
    }




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


    public function show(User $usuario)
    {
        //
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {






        //El email pues obviamente tendra que ser unico.

        //si todo esta bien pues actualizamos los campos:

        $usuario->update([
            'nombre' => ucwords($request->nombre),
            'correo' => $request->correo,
            'perfil' => $request->perfil
        ]);



        //Ahora si ha puesto foto validamos la foto y la metemos

        if($request->has('foto')){

            $request->validate(['foto'=>['image']]);

            $fileImagen=$request->file('foto');
            $nombre="img/usuarios/".uniqid()."_".$fileImagen->getClientOriginalName();


            if($usuario->imagen!=null){
                unlink($usuario->imagen);
            }

            Storage::Disk("public")->put($nombre, \File::get($fileImagen));
            $usuario->update(['imagen'=>"storage/".$nombre]);
        }


        if($request->has('telefono')){
            $usuario->update(['telefono'=>$request->telefono]);
        }




        $usuario->save();
        return redirect()->route('usuarios.usuarios')->with('mensaje', "Usuario Actualizado");


    }

    public function destroy(User $usuario)
    {


        if($usuario->imagen!=null){
            unlink($usuario->imagen);
        }




        $usuario->delete();
        return redirect()->route('usuarios.usuarios')->with('mensaje', "El usuario se ha borrado correctamente.");
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
