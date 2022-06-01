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

    <link href="{{ asset('css/usuarios.css') }}" rel="stylesheet" type="text/css" >
    <title>Usuarios</title>
</head>
<body style="background-color:#233854">

    <header style="z-index:200; border:1px solid black; background-color:#37343B; height:80px; position:sticky; top:0; display:inline-block; width:100%;">

        <div class="dropdown" style="display:inline;padding: 20px;">



            <button class="dropdown-toggle" style="color:white; padding-left:20px; padding-top:20px; outline:none" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="font-weight:bold">{{ auth()->user()->nombre }}
                    @if(auth()->user()->perfil==1)
                        <span style="color:#CB2940">[ ADMINISTRADOR ]</span>
                    @else
                        <span style="color:gray">[USER]</span>
                    @endif

                </span>
            </button>



            <div class="dropdown-menu" style="background-color:#28242D; padding-top:0; padding-bottom:0;" aria-labelledby="dropdownMenu2">
                <a href="{{route('usuarios.usuarios')}}" class="btn dropdown-item" style="color:white; padding-top:10px; padding-bottom:10px">Perfil</a>
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



    <img src="img/naves/otro3.png" style="width:180px; height:200px; display:block; margin:auto; margin-top:20px;"/>

    <div class="row" style="background-color:white; width:60%; height:30%; border-radius:30px; margin:0 auto; margin-top:70px;">

        <div class="col-md-4" style="margin:10px; margin-top:15px; margin-left:15%;">
            <h5 class="text-center">Servicio</h5>
            <select id="idfiltro-nombre" name="filtro-nombre" class="form-control" style="margin:auto; border-radius: 30px; width:100%;">
                <option value="">Todos</option>
                    @foreach($usuarios as $usu)
                        <option name="{{$usu->nombre}}" value="{{$usu->nombre}}">{{$usu->nombre}}</option>
                    @endforeach
            </select>
        </div>


        <div class="col-md-4" style="margin:10px; margin-top:15px;">
            <h5 class="text-center">Servicio Evalua</h5>
            <select id="idfiltro-perfil" name="filtro-perfil" class="form-control" style="margin:auto; border-radius: 30px; width:100%;">
                <option value="">Todos</option>
                    @foreach($usuarios as $usu)
                        @if($usu->perfil == 0)
                            <option name="{{$usu->perfil}}" value="{{$usu->perfil}}">Usuarios Normales</option>
                        @elseif($usu->perfil == 1)
                            <option name="{{$usu->perfil}}" value="{{$usu->perfil}}">Usuarios Admin</option>
                        @endif
                    @endforeach
            </select>
        </div>

    </div>








    <div id="tablacontenedor" class="table-responsive" style="overflow:auto; height:600px;background-color: #fafafa; width:80%; margin:auto; margin-top:50px; margin-bottom:80px; border-radius:15px;" class="shadow-lg">
            <form name="frm-usuarios" id="frm-usuarios" method="post">
                <table id="edit-usuarios" class="display">
                    <thead style="background-color:#172640; padding:0;height:40px; width:100%;">
                        <tr style="height:70px;color:white; font-size:17px;">
                            <th scope="col" style="padding-bottom:25px; padding-left:25px">Nombre</th>
                            <th scope="col" style="padding-bottom:25px;">Correo</th>
                            <th scope="col" style="padding-bottom:25px;">Perfil</th>
                            <th scope="col" style="padding-bottom:25px;">Imagen</th>
                            <th width="8%">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($usuarios as $usu) {

                            <tr>

                            <td>{{ $usu->nombre }}</td>
                            <td>{{ $usu->correo }}</td>
                            <td style="background-color:#85144B;color:white;">{{ $usu->perfil }}</td>
                            @if($usu->imagen==null)
                                <td>NO EXISTE</td>
                            @else
                                <td>{{ $usu->imagen }}</td>
                            @endif


                            <td>

                                @if(auth()->user()->perfil == 1)

                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#borrar-confirm" ><i class="fas fa-trash"></i></button>
                                    <a class="btn btn-success btn-xs"><i class="fas fa-pencil-alt"></i></a>

                                @else

                                    <button type="button" class="btn btn-danger btn-xs disabled" disabled data-toggle="modal" data-target="#borrar-confirm" ><i class="fas fa-trash"></i></button>
                                    <a class="btn btn-success btn-xs disabled" disabled><i class="fas fa-pencil-alt"></i></a>

                                @endif
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Perfil</th>
                            <th>Imagen</th>
                        </tr>
                    </tfoot>
                </table>
            </form>

        </div>









    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="view/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous">
    </script>


<script>
        $('.dropdown-toggle').dropdown()
    </script>

    <script>
         $(document).ready(function() {
          var table = $('#edit-usuarios').DataTable({
              "bAutoWidth": false,
              "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            "paging": true,
            "pageLength": 30,
            "ordering": true,
            "orderMulti": false,
            // "order": [[ 1, "asc" ], [ 3, "asc" ]],
            "order": [[1, "asc"]],


         });



          $('#idfiltro-nombre').on('change', function () {
               table.columns(1).search( this.value ).draw();
                } );
          $('#idfiltro-perfil').on('change', function () {
               table.columns(2).search( this.value ).draw();
                } );






         } );






      </script>


</body>
</html>
