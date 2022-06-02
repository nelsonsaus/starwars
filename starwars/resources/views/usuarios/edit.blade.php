<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/plugins/fontawesome-free/css/all.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="view/plugins/icheck-bootstrap/icheck-bootstrap.min.css">


      <title>Editar Usuario</title>



      <style>

          html{
              height:100%;
          }


body{
    width:100%;
    height:100%;
    margin:0;
    padding:0;
  }


  .linav{

    display:inline;
    padding:35px;

}



a{
    text-decoration: none;
    color:white;
    font-size:12px;
    font-weight: bold;
}

a:hover{
  color: white;
}

.linav:hover{
  background-color: #211E28;
}

p{
    margin-left:30px;
    z-index:30;
}

.dropdown-item{
  color:white;
}
.dropdown-item:hover{
  background-color:#15131D;
}

        .cr{
            position: relative;
            width: 100%;
        }


        .cosa2{
            position:absolute;
            top:0%;
            left:8%;
            width: 100%;
            z-index: 21;
        }

        #img1{
            position:relative;
            width:250px;
            height:250px;
            border: 4px solid black;
            border-radius:150px;
            object-fit: cover;
            display:block;
            margin:0 auto;
        }

        .cosa3{
            position:absolute;
            top:3%;
            left:7%;
            width: 100%;
        }


        .elementoside:hover {
            background-color: black;
        }


        .enlacesside:hover {
            background-color: #2b2b2b;
        }




        

       

    


      </style>
</head>
<body style="background-image: url('{{asset('img/naves/planet.jpg')}}'); background-size:cover;">


<header style="z-index:200; border:1px solid black; background-color:#37343B; height:80px; position:sticky; top:0; display:inline-block; width:100%;">

<div class="dropdown" style="display:inline;padding: 20px;">



    <button class="dropdown-toggle" style="color:white; padding-left:20px; padding-top:20px; outline:none" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span style="font-weight:bold">{{ auth()->user()->nombre }} 
            @if(auth()->user()->perfil==1)
                <span style="color:#CB2940">[ ADMINISTRADOR ]</span>
            @else
                <span style="color:gray">[ USER ]</span>
            @endif

        </span>
    </button>

    

    <div class="dropdown-menu" style="background-color:#28242D; padding-top:0; padding-bottom:0;" aria-labelledby="dropdownMenu2">
        <a href="{{route('usuarios.edit', auth()->user()->id)}}" class="btn dropdown-item" style="color:white; padding-top:10px; padding-bottom:10px">Perfil</a>
        <a href="{{route('usuarios.usuarios')}}" class="btn dropdown-item" style="color:white; padding-top:10px; padding-bottom:10px">Usuarios</a>
        <a href="{{route('usuarios.logout')}}" class="btn dropdown-item" style="border-top:1px solid white;color:white; padding-top:10px; padding-bottom:10px">Cerrar Sesion</a>
    </div>

</div>

<ul style="display:inline-block; float:right; padding-top:20px;">
    <a href="{{route('inicio')}}" ><li class="linav">HOME</li></a>
    <a href="{{route('peliculas')}}"><li class="linav">PELICULAS</li></a>
    <a href="{{route('naves.index')}}"><li class="linav">NAVES</li></a>
</ul>

</header>

<div id="contenedortodo" style="width:90%; padding-top:60px;">

<div class="row">
   <div class="col-md-12">
       <div class="container-fluid mt-5">
           <div class="cr">
               <br>
               <div class="cosa1" style="width: 100%">
                   <div class="row">
                       <div class="col-12" style="background-color: #242424; height:300px;">
                           <p class="float-right mr-5 mt-5" style="font-family: 'Crimson Text', serif; color:white; font-size:60px">NAME: {{$usuario->nombre}}</p>
                           @if($usuario->perfil==1)
                            <p style="position: absolute; color:orange; top:50%; right:28%; font: small-caps bold 16px/30px Georgia, serif; font-size:20px;">USUARIO ADMINISTRADOR</p>
                           @else
                            <p style="position: absolute; color:orange; top:50%; right:28%; font: small-caps bold 16px/30px Georgia, serif; font-size:20px">USUARIO NORMAL</p>
                           @endif
                        </div>
                   </div>
               </div>
               <div class="cosa2" style="width: 95%">
                   <div class="row">
                       <div id="divpeque" class="col-md-3 text-center" style="background-color: rgb(201, 201, 201); height:800px">
                           <img id="img1" src="{{asset('img/naves/user.png')}}" alt="foto trabajador" class="mt-3 mb-5">
                           <hr>
                           <p><i class="far fa-envelope float-left ml-3 rounded-circle" style="background-color: black; font-size: 30px; color: #e6e4e3"></i><b>{{$usuario->correo}}</b></p>
                           <br>
                           @if($usuario->telefono!=null)
                            <p><i class="fas fa-phone float-left ml-3 rounded-circle" style="background-color: black; font-size: 30px; color: #e6e4e3"></i><b>{{$usuario->telefono}}</b></p>
                           @else
                            <p><i class="fas fa-phone float-left ml-3 rounded-circle" style="background-color: black; font-size: 30px; color: #e6e4e3"></i><b>No tiene telefono</b></p>

                           @endif
                            <hr style="border:2px solid black; border-top: none" class="my-5">
            <div class="alert alert-success alert-dismissible">
               <h5><i class="icon fas fa-check"></i> Activo</h5>
                El usuario esta activo.
            </div>
            
                       </div>
                   </div>
               </div>
               <div class="cosa3" style="width: 88%">
                   <div class="row">
                       <div id="divdetras" class="col-md-3" style="background-color: darkgray; height:800px"></div>
                   </div>
               </div>
           </div>
       </div>
   <div id="divgrande" class="col-md-11 float-right">

      <div class="card mt-3 text-center" style="background-color: rgb(201, 201, 201);">
         <div class="card-header" style="background-color: darkgray">
            <h3 class="card-title">
               <h5 style="color:white">DATOS PERSONALES</h5>
            </h3>
         </div> 

         <div class="card-body" style="position:relative; height:100%; width:100%; background-color:#242424; text-align:right;color:white;">
            <form action="{{route('usuarios.update', $usuario)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="row" style="padding-top:30px;">
                <label class="col-sm-5 control-label" for="foto" style="font-size:30px; margin-bottom:30px;">FOTO:</label>
               <div class="col-sm-5"><input type="file" id="foto" name="foto" class="form-control" style="position:absolute;z-index:200"></div>
               <label class="col-sm-5" style="font-size:30px; margin-bottom:30px;">NOMBRE:</label>
               <div class="col-sm-5"><input type="text" name="nombre" value="{{$usuario->nombre}}" class="form-control" style="position:absolute;z-index:200;"></div>
               <label class="col-sm-5" style="font-size:30px; margin-bottom:30px;">CORREO:</label>
               <div class="col-sm-5" style="font-size:30px;"><input type="text" name="correo" value="{{$usuario->correo}}" class="form-control" style="position:absolute;z-index:200"></div>
               <label class="col-sm-5" style="font-size:30px; margin-bottom:30px;">PERFIL:</label>
               @if(auth()->user()->perfil==1 && $usuario->correo!=auth()->user()->correo)
                <div class="col-sm-5" style="font-size:30px;"><input type="text" name="perfil" value="{{$usuario->perfil}}" class="form-control" style="position:absolute;z-index:200"></div>
               @else
                <div class="col-sm-5" style="font-size:30px;"><input type="text" name="perfil" value="{{$usuario->perfil}}" class="form-control" style="position:absolute;z-index:200"></div>
               @endif
               <label class="col-sm-5" style="font-size:30px; margin-bottom:30px;">TELEFONO</label>
               @if($usuario->telefono!=null)
                <div class="col-sm-5" style="font-size:30px;"><input type="text" name="telefono" value="{{$usuario->telefono}}" class="form-control" style="position:absolute;z-index:200"></div>
               @else
                <div class="col-sm-5" style="font-size:30px;"><input type="text" name="telefono" value="" class="form-control" style="position:absolute;z-index:200"></div>
               @endif

            <div style="width:40%; height:7%; z-index:30; margin:0 auto; margin-top:100px;">
                <button type="submit" href="{{route('usuarios.update', $usuario)}}" class="btn btn-primary" style="width:100%; font-size:25px; font-weight:bold;">Modificar</button>
                <a href="{{route('usuarios.usuarios')}}" class="btn btn-danger" style="width:100%; height:50%; margin-top:30px; font-size:25px; font-weight:bold;">Volver</a>
            </div>
         </div>
        </form>

      </div>

   </div>

</div>

</div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous">
    </script>


<script>
        function myFunction(x) {
            if (x.matches) {

                let divpeque = document.getElementById("divpeque");

                let divgrande = document.getElementById("divgrande");

                let divdetras = document.getElementById("divdetras");

                let cabecera = document.getElementsByClassName("cosa1");


                divdetras.style="background-color: darkgray; height:800px; width:100%;";
                divdetras.classList='';

                cabecera[0].style="display:none";

                divpeque.classList='';
                divpeque.classList='col-md-12 text-center';
                divpeque.style="background-color: rgb(201, 201, 201); height:800px; width:100%;";


                divgrande.style="margin-top:800px;";

                var x = window.matchMedia("(min-width: 1036px)")
                myFunction2(x) 
                x.addListener(myFunction2)
                
            }
        }

        
        function myFunction2(x) {
            if (x.matches) {

                let divpeque = document.getElementById("divpeque");

                let divgrande = document.getElementById("divgrande");

                let divdetras = document.getElementById("divdetras");

                let cabecera = document.getElementsByClassName("cosa1");


                divdetras.style="background-color: darkgray; height:800px;";
                divdetras.classList='col-md-3';

                cabecera[0].style="display:inline-block;width:100%;";

                divpeque.classList='';
                divpeque.classList="col-md-3 text-center";
                divpeque.style="background-color: rgb(201, 201, 201); height:800px;";


                divgrande.style="";


                
            }
        }


        var x = window.matchMedia("(max-width: 1035px)")
        myFunction(x) 
        x.addListener(myFunction)
      </script>
    
</body>
</html>