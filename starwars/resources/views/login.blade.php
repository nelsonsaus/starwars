<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <title>Inicio</title>

    <link href="{{ asset('css/index3.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>

        @if($text=Session::get('mensaje'))
            <div style="background-color: #549e68; color:white; text-align:center; width:300px; height:80px; position:absolute; z-index:999999; bottom:0%; left:7%;">
                <p style="color:white; padding-top:7%; font-weight:bold;">{{ $text }}</p>
            </div>
        @elseif($text=Session::get('error'))
            <div style="background-color: #a84545; color:white; text-align:center; width:300px; height:80px; position:absolute; z-index:999999; bottom:0%; left:7%;">
                <p style="color:white; padding-top:7%; font-weight:bold;">{{ $text }}</p>
            </div>
        @endif

    <div id="contenedor">



        <img src="{{asset('img/naves/unafoto.png')}}" style="width:550px; height:1100px; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto; opacity:0.7">




        <div style="border-left: 2px solid white; border-top:2px solid white; width:25%; height:30%; position:absolute; top:3%; left:3%;"></div>

        <div style="border-right: 2px solid white; border-bottom:2px solid white; width:25%; height:30%; position:absolute; bottom:3%; right:3%;"></div>



        <div id="capa" style="width:100%; height:100%; background-color:black; opacity:0.3;"></div>

        <div style="width:95%; height:97%; position:absolute; top:3%; left:0%; right:0%; margin:auto;">

        <button type="button" data-toggle="modal" data-target="#borrar-confirm" style="width:2.5%; height:2.5%; float:right; outline:none"><i class="fa fa-question-circle" style="color:white; font-size:25px;"></i></button>


            <div id="centro" style="padding:0; margin:0; width:50%; height:50%; position:absolute; top:0%; left:0%; right:0%; bottom:0%; margin:auto;">
                <p style="font-weight:bold; margin-top:18%; font-size:60px;">STAR WARS</p>
                <p style="font-style:italic; font-size:20px; opacity:0.7;">Aplicacion sobre Star Wars Naves y Pilotos</p>


                <button id="btnLogin" onclick="loguear()" type="button" style="width:200px; border:2px solid white; text-decoration:none; color:white; font-size:20px; padding:10px; display:block; margin:auto; margin-top:70px; text-align:center;">INICIAR SESION</button>
                <button id="btnRegister" onclick="registrar()" type="button" style="width:160px; border:2px solid white; text-decoration:none; color:white; font-size:20px; padding:10px; display:block; margin:auto; margin-top:20px; text-align:center; background-color:#CB2940">Registrarte</button>

            </div>

        </div>



        <form name="form1" action="{{route('usuarios.login')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="cardLogin" style="height:40%; display:none;">

                <div style="margin:0 auto; margin-top:8%; background-color:white; width:90%; height:100%; border-radius:20px; padding-top:10px;">

                    <div class="form-group row" style="height:22%;">
                        <label class="col-sm-3 control-label" style="margin-top:20px;" for="email">Email</label>
                            <div class="col-sm-8" style="margin:0 auto;">
                                <input type="text" name="correo" required style="color:white; height:100%;background-image: linear-gradient(to left, rgb(75, 75, 75), #141414);" id="iemail" class="form-control" placeholder="Ej. ejemplo@gmail.com">
                            </div>
                    </div>

                    <div class="form-group row" style="height:22%;">
                        <label class="col-sm-3 control-label" style="margin-top:20px" for="pass">Password</label>
                            <div class="col-sm-8" style="margin:0 auto;">
                                <input type="password" name="password" required style="color:white; height:100%;background-image: linear-gradient(to left, rgb(75, 75, 75), #141414);" id="ipass" class="form-control" placeholder="Escribe su contraseña">
                            </div>
                    </div>


                    <div class="row text-center mt-5">
                        <div class="col-md-6">
                            <button class="btn" type="submit" style="width:80%; height:100%; border:3px solid #CB2940;">INICIAR SESION</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn" type="button" onclick="registrar2()" style="color:white; width: 80%; height:100%; background-color: #CB2940;">REGISTRARSE</button>
                        </diV>
                    </div>


                </div>
        </form>


        </div>


        <form name="form2" action="{{route('usuarios.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="cardRegister" style="height:60%; display:none;">

            <div style="margin:0 auto; margin-top:8%; background-color:white; width:90%; height:100%; border-radius:20px; padding-top:50px;">

                <div class="form-group row" style="height:22%;">
                        <label class="col-sm-3 control-label" style="margin-top:20px" for="nombre">Nombre</label>
                            <div class="col-sm-8" style="margin:0 auto;">
                                <input type="text" name="nombre" style="color:white; height:100%;background-image: linear-gradient(to left, rgb(75, 75, 75), #141414);" id="inombre" class="form-control" placeholder="Escribe su Nombre">
                            </div>
                    </div>

                    <div class="form-group row" style="height:22%;">
                        <label class="col-sm-3 control-label" style="margin-top:20px;" for="email">Email</label>
                            <div class="col-sm-8" style="margin:0 auto;">
                                <input type="text" name="correo" style="color:white; height:100%;background-image: linear-gradient(to left, rgb(75, 75, 75), #141414);" id="iemail" class="form-control" placeholder="Ej. ejemplo@gmail.com">
                            </div>
                    </div>

                    <div class="form-group row" style="height:22%;">
                        <label class="col-sm-3 control-label" style="margin-top:20px; margin-bottom:0; padding-bottom:0;" for="pass">Password</label>
                            <div class="col-sm-8" style="margin:0 auto;">
                                <input type="password" name="password" style="color:white; height:100%;background-image: linear-gradient(to left, rgb(75, 75, 75), #141414);" id="ipass" class="form-control" placeholder="Escribe su contraseña">
                            </div>
                    </div>

                    <div class="row text-center mt-5">
                        <div class="col-md-6">
                            <button class="btn" type="button" onclick="loguear2()" style="width:50%; height:100%; border:3px solid #CB2940;">INICIAR SESION</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn" type="submit" style="color:white; width: 50%; height:100%; background-color: #CB2940;">REGISTRARSE</button>
                        </diV>
                    </div>

                </div>


                <div id="divImagen" class="rounded-circle" style="background-color:white; padding:0; position:absolute; top:0%; left:0%; right:0%; margin:auto; width:100px; height:100px">

                        <img src="img/naves/otro3.png" style="margin:0 auto; border-radius:100px; object-fit:fill; width:80px; height:80px"/>

                </div>



            </div>

        </form>


    </div>













    <div class="modal fade" id="borrar-confirm">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content" style="background-color: #212121">

                    <div class="modal-header" style="background-color:#141414">
                        <div class="modal-title text-white">
                            <h3 style="color:white">Informacion</h3>
                        </div>
                        <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>


                    <div class="modal-body">
                        <h4 style="color:white;margin-bottom:35px;">Nuestra Web</h4>
                        <p style="text-align:left; width:90%; padding:10px;">Esta web se trata por un proyecto realizado por Nelson Sanchez Usero. Si quieres entrar en la pagina deberás de Iniciar Sesion si tienes una cuenta o Registrarte en el caso de que aun no la tengas. Gracias.</p>
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
    $('#borrar-confirm').on('show.bs.modal', function (event) {
           $(this).find('.btn-ok').attr('href', $(event.relatedTarget).data('href'));
         })
</script>



<script>

    var btnLogin = document.getElementById("btnLogin");
    var btnRegister = document.getElementById("btnRegister");
    var cardLogin = document.getElementById("cardLogin");
    var cardRegister = document.getElementById("cardRegister");
    var centro = document.getElementById("centro");
    var img = document.getElementsByTagName("img");


    function loguear(){



        centro.classList.add("animacionCentro");
        setTimeout(() => {
            img[0].classList.add("animacionCentroImg");
        }, 300);

        setTimeout(() => {
            centro.style="display:none";
        img[0].style="display:none";
        }, 1500);





        setTimeout(() => {

            cardLogin.style="height:50%;";

            cardLogin.classList.add("animacionLogin");


            cardLogin.style="height:40%; width:45%; position: absolute; top:20%; left:0%; right:0%; margin:auto;";

        }, 1500);



    }


    function registrar(){


        centro.classList.add("animacionCentro");
        setTimeout(() => {
            img[0].classList.add("animacionCentroImg");
        }, 300);

        setTimeout(() => {
            centro.style="display:none";
        img[0].style="display:none";
        }, 1500);





        setTimeout(() => {

            cardRegister.style="height:40%;";

            cardRegister.classList.add("animacionRegister");


            cardRegister.style="height:65%; width:45%; position: absolute; top:20%; left:0%; right:0%; margin:auto;";

        }, 1500);

    }


    function registrar2(){

        cardRegister.classList="";
        cardLogin.classList="";
        cardLogin.classList.add("animacionLoginVuelta");

        setTimeout(() => {

            cardLogin.style="display:none";

            cardRegister.style="height:40%;";

            cardRegister.classList.add("animacionRegister");


            cardRegister.style="height:65%; width:45%; position: absolute; top:20%; left:0%; right:0%; margin:auto;";

        }, 1500);


    }


    function loguear2(){

        cardRegister.classList="";
        cardLogin.classList="";
        cardRegister.classList.add("animacionRegisterVuelta");

        setTimeout(() => {

            cardRegister.style="display:none";

            cardLogin.style="height:50%;";

            cardLogin.classList.add("animacionLogin");


            cardLogin.style="height:40%; width:45%; position: absolute; top:20%; left:0%; right:0%; margin:auto;";

        }, 1500);


    }

</script>


</body>
</html>
