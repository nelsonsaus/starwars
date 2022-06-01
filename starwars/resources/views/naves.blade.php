<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-resource.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{secure_asset('angular/controller.js')}}" defer></script>
    <script src="{{secure_asset('wow/wow.min.js')}}"></script>
    <title>Naves</title>

    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" type="text/css" >





    </style>


</head>
<body ng-app="starwars">
    <div ng-controller="Controlador">



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
            <a href="{{route('naves.index')}}"><li class="linav" style="border-bottom:1px solid white;">NAVES</li></a>
        </ul>

    </header>

        <!--<input type="text" ng-model = "nombre">
        @{{"Hola " + nombre}}-->

         <!--AQUI PONDREMOS EL VIDEO DE STAR WARS CON UNA CAPA ENCIMA QUE OSCURECE Y EN EL CENTRO EL LOGO STARWARS-->

        <!--Y ABAJO LO DE NAVES STAR WARS-->

        <div id="contenedor">
            <!--aqui pon lo de los divs esos de lineas-->


            <div style="position:relative;margin-bottom:100px">


                <div id = "portada">




                    <!--ESTO MEJOR PARA EL LOGO DE LA OTRA PAGINA:-->
                    <!-- <img class="textoPortada" src="storage/img/naves/logo.png" style="position:absolute;bottom:50%; left:10%; height:200px; width:400px;"/> -->

                    <div class="textoPortada" id="lineaPortada1"></div>
                    <p id = "titulo" class="wow animate__animated animate__backInLeft">STAR WARS</p>
                    <p class="textoPortada wow animate__animated animate__backInLeft" id = "subtitulo">NAVES & PILOTOS</p>
                    <p id="texto">ADMINISTRA TUS NAVES Y PILOTOS, ELIGE DEL SELECCIONABLE EL PILOTO QUE DESEAS, CLICKEALO E INTRODUCELO EN LA NAVE CORRESPONDIENTE
                        PARA QUE ESE PERSONAJE SEA PILOTO DE ESA NAVE
                    </p>
                    <div class="textoPortada" id="lineaPortada2"></div>


                    <div style="position:absolute;bottom:0%;margin:0;width:100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319">
                            <path fill="#121212" fill-opacity="1" d="M0,64L48,106.7C96,149,192,235,288,240C384,245,480,171,576,154.7C672,139,768,181,864,181.3C960,181,1056,139,1152,106.7C1248,75,1344,53,1392,42.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>


                    <div id="sombrasvg"></div>
                </div>

                <div id="sombraImagen"></div>



                <div id = "bloque2">
                    <div>
                        <p class="textoPortada">ADMINISTRA TUS NAVES Y PILOTOS</p>
                    </div>

                    <div></div>
                    <div></div>
                    <div>
                        <div>
                            <video src="img/naves/pasos2.mp4" autoplay muted loop></video>
                            <h2 style="color:white; margin-top:30px;">INSERTE Y BORRE <br>PILOTOS PARA CADA NAVE</h2>
                        </div>
                    </div>


                </div>

            </div>





                <div id="carouselExampleIndicators" class="carousel">
                    <div></div>
            <div class="carousel-inner" style="width:100%; height:100%;padding-top:200px;">



                    <div class="carousel-item active" style="width:100%; height:100%;">

                        <div class="row">




                    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

                    <!--EN EL FOREACH LAS NAVES HAN DE RECORRERSE DE DOS EN 2 POR LO QUE TAMBIÉN DEBES METER DOS DIV DE ESTOS:-->

                    <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->




                        <div class="contenedor2" class="col-md-6">

                                    <img class="primero" src="{{asset('img/naves/default.png')}}">
                                    <img src="{{asset('img/naves/default.png')}}"">

                            <div id="shadowTarjeta">
                                <div id="tarjeta">

                                <div id="backgroundTarj"></div>

                                    <h5 id="nave{{$naves[0]->id}}"></h5>


                                    <p class="precio" id="precio{{$naves[0]->id}}">
                                    </p>



                                </div>

                            </div>

                            <div id="triangulo"></div>





                            <div class="bloquePilotos">

                                <div style="background-color:#242424;">
                                    <h3 style="padding-top:20px; margin-bottom:10px;">PILOTOS</h3>

                                    <hr style="height:2px; background-color:white" />
                                </div>

                                <div class="bloquePorPiloto" id="divPilotosNav{{$naves[0]->id}}">

                                    @foreach ($navespi as $navespil)

                                        @if ($naves[0]->id == $navespil->nave_id)
                                            <div style="border-bottom:1px solid white; background-color:242424">
                                                <p id="piloto{{$navespil->id}}" style="position:relative;margin-bottom:50px;">

                                                    <button id="btnBor{{$navespil->nave_id}}_{{$navespil->piloto_id}}" type="submit" style="position:absolute;right:10%;top:0%" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i></button>

                                                </p>


                                            </div>


                                        @endif


                                    @endforeach




                                    <div>



                                    </div>

                                </div>

                                <div style="margin-top:3%; height:100%;">
                                    <select id="seleccion{{$naves[0]->id}}" ng-options="option as option.nombre for option in data.options track by option.id"
                                                ng-model="data.selected" class="form-control" style="color:white; width:60%;margin-left:30px;display:inline-block; border:2px solid #a32133; background-color:#242424">
                                            </select>

                                            <button class="enviar" type="submit" id="btnEnviar{{$naves[0]->id}}" name="enviar">AÑADIR</button>
                                            <!--LO DEL ONCLICK SE LO PONEMOS CON LO DE JAVASCRIPT-->
                                </div>




                            </div>

                        </div>

                    </div>


                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="color:black"></span>
                            <span class="sr-only" style="color:black">Previous</span>

                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="color:black"></i>
                            <span class="sr-only" style="color:black">Next</span>
                        </a>
                    </div>

                    @foreach($naves as $nave)
                    @if($nave!=$naves[0])
                    <div class="carousel-item" style="width:100%; height:100%;">


                <div class="row">




                <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->

                <!--EN EL FOREACH LAS NAVES HAN DE RECORRERSE DE DOS EN 2 POR LO QUE TAMBIÉN DEBES METER DOS DIV DE ESTOS:-->

                <!--!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->




                    <div class="contenedor2" class="col-md-6">

                                <img class="primero" src="{{asset('img/naves/default.png')}}">
                                <img src="{{asset('img/naves/default.png')}}">

                        <div id="shadowTarjeta">
                            <div id="tarjeta">

                            <div id="backgroundTarj"></div>

                                <h5 id="nave{{$nave->id}}"></h5>


                                <p class="precio" id="precio{{$nave->id}}">
                                </p>



                            </div>

                        </div>

                        <div style="z-index:50;background-color: #000000; position:absolute; bottom:3.2%; left:1.3%; height:0; width:0; border-right:60px solid #242424; border-top:60px solid #242424; border-bottom:60px solid transparent; border-left:60px solid transparent;"></div>





                        <div class="bloquePilotos">

                            <div style="background-color:#242424;">
                                <h3 style="padding-top:20px; margin-bottom:10px;">PILOTOS</h3>

                                <hr style="height:2px; background-color:white" />
                            </div>

                            <div class="bloquePorPiloto" id="divPilotosNav{{$nave->id}}">

                                @foreach ($navespi as $navespil)

                                    @if ($nave->id == $navespil->nave_id)
                                        <div style="border-bottom:1px solid white; background-color:242424">
                                            <p id="piloto{{$navespil->id}}" style="position:relative;margin-bottom:50px;">

                                                <button id="btnBor{{$navespil->nave_id}}_{{$navespil->piloto_id}}" type="submit" style="position:absolute;right:10%;top:0%" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i></button>

                                            </p>


                                        </div>


                                    @endif


                                @endforeach




                                <div>



                                </div>

                            </div>

                            <div style="margin-top:3%; height:100%;">
                                <select id="seleccion{{$nave->id}}" ng-options="option as option.nombre for option in data.options track by option.id"
                                            ng-model="data.selected" class="form-control" style="color:white; width:60%;margin-left:30px;display:inline-block; border:2px solid #a32133; background-color:#242424">
                                        </select>

                                        <button type="submit" id="btnEnviar{{$nave->id}}" name="enviar" style="width:30%; height:10%; border-radius:20px; background-color:#CB2940; color:white; font-weight:bold; box-shadow: 0px 17px 15px -8px #CB2940">AÑADIR</button>
                                        <!--LO DEL ONCLICK SE LO PONEMOS CON LO DE JAVASCRIPT-->
                            </div>




                        </div>

                    </div>

                </div>


                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>


                        </div>
                        @endif
                @endforeach









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

        $(function(){
			new WOW().init();
		});


        $(".carousel").carousel({
        interval: false,
        });


    </script>

</body>
</html>
