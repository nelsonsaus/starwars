<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <title>Naves</title>

    <link href="{{ asset('css/index2.css') }}" rel="stylesheet" type="text/css" >


</head>
<body>

    <div id="contenedor" style="width:100%; height:100%; scroll-behavior: smooth; position:relative;">





    <div style="width:30px; height:300px; position:fixed; right:3%; top:25%; z-index:2000;">

        <div style="width:100%; height:100%; position:relative; text-align:center;">

            <div style="width:5px; height:100%; background-color:white; position:absolute; left:0%; right:0%; margin:auto;">


            </div>


            <!--PUNTOS TIMELINE-->
            <div style="width:25px; height:25px; border-radius:50px; background-color:#CB2940; position:absolute; top:20%; right:0%; left:0; margin:auto;"></div>
            <div id="bola2" style="width:25px; height:25px; border-radius:50px; background-color:white; position:absolute; top:100%; right:0%; left:0; margin:auto;"></div>
            <!--LINEA ROJA-->
            <div id="lineaRoja" style="width:5px; height:20%; background-color:#CB2940; position:absolute; left:0; right:0; margin:auto;"></div>





        </div>

    </div>



    <!--EN EL CASO DE QUE NO HAYA INICIADO SESION SE VERA INICIAR SESION-->

    <header style="z-index:200;height:80px; position:sticky; top:0; display:inline-block; width:100%;">

        <div class="dropdown" style="display:inline;padding: 20px;">


            <!--CUANDO SEA ADMIN QUE SE VEA EL [ADMIN] EN ROJO-->


            <button class="dropdown-toggle" style="padding-left:20px; padding-top:20px; outline:none" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a href="{{route('pdf.naves')}}" class="btn dropdown-item" style="color:white; padding-top:10px; padding-bottom:10px">Informes Naves</a>
                <a href="{{route('pdf.pilotos')}}" class="btn dropdown-item" style="color:white; padding-top:10px; padding-bottom:10px">Informes Pilotos</a>
                <a href="{{route('usuarios.logout')}}" class="btn dropdown-item" style="border-top:1px solid white;color:white; padding-top:10px; padding-bottom:10px">Cerrar Sesion</a>
            </div>

        </div>

        <ul style="display:inline-block; float:right; padding-top:20px;">
            <a href="{{route('inicio')}}" ><li style="border-bottom:1px solid white;">HOME</li></a>
            <a href="{{route('peliculas')}}"><li>PELICULAS</li></a>
            <a href="{{route('naves.index')}}"><li>NAVES</li></a>
        </ul>
    </header>


    <div id="contenido" style="width:100%; height:100%; position:absolute; top:0; z-index:2;">




        <div id="primero" style="width:100%; height:100%;">



        <a id="abajo" href="#segundo" style="position:absolute; bottom:3%; left:5%; background-color: #CB2940; width:100px; height:100px; border-radius:50px; text-align:center; cursor:pointer; text-decoration:none; color:white; box-shadow:10px 5px 20px black"><i class="fas fa-arrow-down" style="font-size:5em;padding-top:20px;"></i></a>



            <!--box-shadow:-25px -10px 25px black; puedes añadirselo o no-->
            <div id="divImagen" style="background-image: url('{{asset('img/naves/d2.png')}}');"></div>







            <div id="textos">



                <div id="bloqueContenido">



                    <p style="position:absolute; font-size:30px; font-weight:lighter; margin-left:30px;">HERE AND NOW</p>
                    <p style="position:absolute; font-size:70px; font-weight:bold; margin-left:30px; margin-top:30px;">STAR WARS</p>
                    <p style="position:absolute; font-size:15px; margin-left:30px; margin-top:200px; width:75%;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p></p>
                    <div style="z-index:2; position:absolute; top:0%; left:0%; background-color: #CB2940; width:65px; height:150px;"></div>


                </div>

                <div id="comentarios" class="row" style="margin-top:60px;">
                <div class="col-md-6" style="text-align:left; width:400px; height:150px; margin-bottom:50px;">
                    <p style="position:absolute; margin-top:20px; font-weight:bold">Quienes somos</p>
                    <p style="position:absolute; margin-top:50px; width:380px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                    <div style="width:400px; height:150px; border: 1px solid rgba(255, 255, 255, 0.3); background: rgba(255, 255, 255, 0.2); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); opacity:0.4; position:relative;">

                        <div style="margin-left:30px; margin-top:30px; width:60px; height:60px; border: 1px solid rgba(255, 255, 255, 0.3); background: rgba(255, 255, 255, 0.3); clip-path: polygon(0 50%, 100% 50%, 50% 100%); position:absolute; left:40%; bottom:-21%;"></div>


                    </div>
                </div>



                <div class="col-md-6" style="text-align:left; width:400px; height:150px; margin-bottom:100px;">
                    <p style="position:absolute; margin-top:20px; font-weight:bold">Administra tus naves</p>
                    <p style="position:absolute; margin-top:50px; width:380px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                    <div style="width:400px; height:150px; border: 1px solid rgba(255, 255, 255, 0.3); background: rgba(255, 255, 255, 0.2); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); opacity:0.4; position:relative;">

                        <div style="margin-left:30px; margin-top:30px; width:60px; height:60px; border: 1px solid rgba(255, 255, 255, 0.3); background: rgba(255, 255, 255, 0.3); clip-path: polygon(0 50%, 100% 50%, 50% 100%); position:absolute; left:40%; bottom:-21%;"></div>


                    </div>
                </div>
            </div>
            </div>






        </div>







        <div id="segundo" style="z-index:3; width:100%; height:100%; background-color:#141414;">



            <div class="row" style="width:100%; height:100%; position:relative;">


                <a id="arriba" href="#primero" style="z-index:30; position:absolute; top:12%; left:5%; background-color: #CB2940; width:100px; height:100px; border-radius:50px; text-align:center; cursor:pointer; text-decoration:none; color:white; box-shadow:10px 5px 20px black"><i class="fas fa-arrow-up" style="font-size:5em;padding-top:20px;"></i></a>



                <div class="col-md-6" style="position:relative;">

                    <div style="width:100%; height:40%; position:absolute; top:0; bottom:0; left:0; right:0; margin:auto;">

                        <p style="font-size:60px; font-weight:bold; margin-top:20px;">STAR WARS NAVES Y PILOTOS [ SWAPI ]</p>

                        <p style="font-size:22px; color:gray;">REGISTRATE EN NUESTRA PAGINA DE STAR WARS Y CREA TUS NAVES, PILOTOS, Y ADMINISTRALAS INSERTANDO NUEVOS PILOTOS Y NAVES Y ELIMINANDO.</p>

                        <div style="height:50px; width:100%; margin-top:150px; padding-left:40px;">
                            <a href="https://www.instagram.com/starwars/?hl=es"><i class="fa fa-instagram" style="font-size:30px; color:#CA3A9C; font-weight:bold"></i></a>
                            <a href="https://twitter.com/starwarsspain?lang=es" style="padding-left:30px;"><i class="fa fa-twitter" style="font-size:30px; color:#1D9BF0; font-weight:bold"></i></a>
                            <a href="https://es-es.facebook.com/StarWars/" style="padding-left:30px;"><i class="fa fa-facebook" style="font-size:30px; color:#33579F; font-weight:bold"></i></a>

                        </div>

                    </div>

                </div>

                <div id="bloqueNave" class="col-md-6" style="position:relative;">

                    <img src="img/naves/nave.png" style="position:absolute; top:0; right:10%; bottom:0; margin:auto;"/>

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
        $('.dropdown-toggle').dropdown()
    </script>


    <script>


        var despAux = -1;
        var bola2 = document.getElementById("bola2");
        var bola3 = document.getElementById("bola3");
        var lineaRoja = document.getElementById("lineaRoja");
        var header = document.getElementsByTagName("header")[0];

        $('#abajo').on("click", function(){



            header.style="z-index:13; background-color:#37343B; height:80px; position:sticky; top:0; display:inline-block; width:100%;";
            console.log(header);

            let enlace = document.createElement("a");

            enlace.style.display="none";

            document.body.appendChild(enlace);

            enlace.href="#segundo";
            enlace.click();


            document.body.removeChild(enlace);

            lineaRoja.classList="";


            lineaRoja.classList.add("animacion");

            lineaRoja.style="width:5px; height:100%; background-color:#CB2940; position:absolute; left:0; right:0; margin:auto;";

            setTimeout(() => {
                bola2.style="width:25px; height:25px; border-radius:50px; background-color:#CB2940; position:absolute; top:100%; right:0%; left:0; margin:auto;";
            }, 1000);



        });



        $('#arriba').on("click", function(){



            header.style="z-index:3;height:80px; position:sticky; top:0; display:inline-block; width:100%;";
            console.log(header);

            let enlace = document.createElement("a");

            enlace.style.display="none";

            document.body.appendChild(enlace);

            enlace.href="#primero";
            enlace.click();


            document.body.removeChild(enlace);

            lineaRoja.classList="";


            bola2.style="width:25px; height:25px; border-radius:50px; background-color:white; position:absolute; top:100%; right:0%; left:0; margin:auto;";


            lineaRoja.classList.add("animacionBack");



            setTimeout(() => {

                lineaRoja.style="width:5px; height:20%; background-color:#CB2940; position:absolute; left:0; right:0; margin:auto;";

            }, 1000);




        });

    </script>








</body>
</html>
