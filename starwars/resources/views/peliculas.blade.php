<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <title>Naves</title>

    <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css" >


</head>
<body>

    <div style="width:100%; height:100%; position:relative;">


        <header style="z-index:200; border:1px solid black; z-index:13; background-color:#37343B; height:80px; position:sticky; top:0; display:inline-block; width:100%;">

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
                <a href="{{route('pdf.naves')}}" class="btn dropdown-item" style="color:white; padding-top:10px; padding-bottom:10px">Informes Naves</a>
                <a href="{{route('pdf.pilotos')}}" class="btn dropdown-item" style="color:white; padding-top:10px; padding-bottom:10px">Informes Pilotos</a>
                <a href="{{route('usuarios.logout')}}" class="btn dropdown-item" style="border-top:1px solid white;color:white; padding-top:10px; padding-bottom:10px">Cerrar Sesion</a>
            </div>

            </div>

            <ul style="display:inline-block; float:right; padding-top:20px;">
                <a href="{{route('inicio')}}" ><li class="linav">HOME</li></a>
                <a href="{{route('peliculas')}}"><li class="linav" style="border-bottom:1px solid white;">PELICULAS</li></a>
                <a href="{{route('naves.index')}}"><li class="linav">NAVES</li></a>
            </ul>

        </header>


        <div id="carouselExampleIndicators" class="carousel" style="width:100%; height:93%;">

            <div class="carousel-inner" style="width:100%; height:100%;">
                <div id="panel1" class="carousel-item active">
                    <img class="imagenes" src='img/naves/dos.jpg'/>
                    <div class="div1" style="width:85%; height:76%; border:8px solid black; border-radius:7px; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; background-image: url('img/naves/dos.jpg'); background-size:cover;">
                        <div class="div2">
                            <div class="div3"></div>
                        </div>





                        <button id="btn1" onclick="btn1()">VER INFO</button>


                        <div id="bloqueBtn1" style="visibility:hidden; width:50%; height:100%; float:right;position:relative">


                                <p class="titulo">STAR WARS LOS ULTIMOS JEDI</p>
                                <p id="textoLargo">Los Últimos Jedi comienza inmediatamente después de los acontecimientos de Star Wars: Episodio VII El Despertar de la Fuerza, establecida treinta años después de la conclusión de la trilogía original de Star Wars. Continúa la historia de Rey y su descubrimiento del exiliado Maestro Jedi Luke Skywalker, junto con la historia de la guerra entre la Resistencia de la General Leia Organa y la Primera Orden. </p>

                                <button id="btnOcultar" onclick="btnOcultar()">OCULTAR INFO</button>

                        </div>


                        <div id="capa1" style="visibility:hidden; background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;"></div>



                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>


                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>

                    </div>
                </div>


                <div class="carousel-item" style="width:100%; height:100%;">
                    <img class="imagenes" src='img/naves/uno.jpg' />
                    <div class="div1" style="width:85%; height:76%; border:8px solid black; border-radius:7px; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; background-image: url('img/naves/uno.jpg'); background-size:cover;">
                        <div class="div2">
                            <div class="div3"></div>
                        </div>



                        <button id="btn2" onclick="btn2()">VER INFO</button>

                        <div id="bloqueBtn2" style="visibility:hidden; width:50%; height:100%; float:right;position:relative">


                                <p class="titulo">STAR WARS EL DESPERTAR DE LA FUERZA</p>
                                <p>La historia comienza treinta años después de los acontecimientos de Star Wars: Episodio VI El Retorno del Jedi. La Primera Orden ha surgido de las cenizas del Imperio Galáctico y se le opone la General Leia Organa y la Resistencia, quienes buscan encontrar al desaparecido Maestro Jedi Luke Skywalker. En medio de esta búsqueda, surgen nuevos héroes en forma de Rey, una carroñera sensible a la Fuerza de Jakku; Finn, un soldado de asalto que deserta de la Primera Orden; y Poe Dameron, el mejor piloto de la Resistencia. Han Solo los ayuda en su búsqueda por Skywalker y en su misión por destruir la nueva superarma de la Primera Orden, la Base Starkiller, que apunta a la Nueva República y a la Resistencia para destruirlas. </p>

                                <button id="btnOcultar2" onclick="btnOcultar()">OCULTAR INFO</button>

                        </div>


                        <div id="capa2" style="visibility:hidden; background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;"></div>


                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>



                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>

                    </div>
                </div>





                <div class="carousel-item" style="width:100%; height:100%;">
                    <img class="imagenes" src='img/naves/tres.jpg' />
                    <div class="div1" style="width:85%; height:76%; border:8px solid black; border-radius:7px; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; background-image: url('img/naves/tres.jpg'); background-size:cover;">
                        <div class="div2">
                            <div class="div3"></div>
                        </div>



                        <button id="btn3" onclick="btn3()">VER INFO</button>

                        <div id="bloqueBtn3" style="visibility:hidden; width:50%; height:100%; float:right;position:relative">


                                <p class="titulo">STAR WARS EL ASCENSO DE SKYWALKER</p>
                                <p>Un año después de los sucesos de Los últimos Jedi , una transmisión usando la voz del presunta fallecido Emperador Galáctico Palpatine se transmite a través de la galaxia, que amenaza con venganza. El Líder Supremo Kylo Ren lidera un asalto vicioso contra colonos alazmec en un Mustafar en curación, buscando un orientador Sith propiedad del abuelo de Ren, Darth Vader. Ren quiere usar el dispositivo como guía en su búsqueda de la fuente de la transmisión, que percibe como una amenaza para su poder.</p>

                                <button id="btnOcultar3" onclick="btnOcultar()">OCULTAR INFO</button>

                        </div>


                        <div id="capa3" style="visibility:hidden; background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;"></div>



                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>



                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                        </ol>

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


var car = document.getElementById("carouselExampleIndicators");

var bloqueBtn1 = document.getElementById("bloqueBtn1");
var bloqueBtn2 = document.getElementById("bloqueBtn2");
var bloqueBtn3 = document.getElementById("bloqueBtn3");

var capa1 = document.getElementById("capa1");
var capa2 = document.getElementById("capa2");
var capa3 = document.getElementById("capa3");

var btnn1 = document.getElementById("btn1");
var btnn2 = document.getElementById("btn2");
var btnn3 = document.getElementById("btn3");






function btn1(){


    btnn1.style="visibility:hidden; color:white; font-weight:bold; width:170px; height:50px; background-color:black; opacity:0.5; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; z-index:50;";

    capa1.classList.add("animacion");

    capa1.style="background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;"



    setTimeout(() => {
        bloqueBtn1.style="width:50%; height:100%; float:right;position:relative";
    }, 2000);




}


function btn2(){

    btnn2.style="visibility:hidden; color:white; font-weight:bold; width:170px; height:50px; background-color:black; opacity:0.5; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; z-index:50;";

    capa2.classList.add("animacion");

    capa2.style="background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;"



    setTimeout(() => {
        bloqueBtn2.style="width:50%; height:100%; float:right;position:relative";
    }, 2000);

}



function btn3(){

    btnn3.style="visibility:hidden; color:white; font-weight:bold; width:170px; height:50px; background-color:black; opacity:0.5; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; z-index:50;";

    capa3.classList.add("animacion");

    capa3.style="background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;"



    setTimeout(() => {
        bloqueBtn3.style="width:50%; height:100%; float:right;position:relative";
    }, 2000);

}


function btnOcultar(){


    capa1.style="visibility:hidden; background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;";
    capa2.style="visibility:hidden; background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;";
    capa3.style="visibility:hidden; background-color:black; opacity:0.3; width:50%; height:100%; position:absolute; top:0%; right:0%; z-index:10;";

    bloqueBtn1.style="visibility:hidden; width:50%; height:100%; float:right;position:relative";
    bloqueBtn2.style="visibility:hidden; width:50%; height:100%; float:right;position:relative";
    bloqueBtn3.style="visibility:hidden; width:50%; height:100%; float:right;position:relative";

    capa1.classList="";
    capa2.classList="";
    capa3.classList="";

    btnn1.style="color:white; font-weight:bold; width:170px; height:50px; background-color:black; opacity:0.5; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; z-index:50;";
    btnn2.style="color:white; font-weight:bold; width:170px; height:50px; background-color:black; opacity:0.5; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; z-index:50;";
    btnn3.style="color:white; font-weight:bold; width:170px; height:50px; background-color:black; opacity:0.5; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; z-index:50;";






}


</script>


<script>
    $(".carousel").carousel({
    interval: false,
    });
</script>

</body>
</html>
