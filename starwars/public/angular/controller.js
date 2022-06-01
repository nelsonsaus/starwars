var app = angular.module('starwars', [
    'Controlador'
    ]
    , ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);

angular.module('Controlador', []).controller('Controlador', ['$scope', '$http', function ($scope, $http) {


    $scope.nombre = "CF";

    var data = $scope.data = {};

    data.options = [];





    var conn=0;


    var digitoSacado=0;


    var url1 = "http://localhost/starwars/api/naves";
    var url2 = "http://localhost/starwars/api/pilotos";


    var xhr1 = null;
    var xhr2 = null;

    //DATOSTOTAL COGE LOS DATOS QUE LE LLEGAN AL LLAMAR A LAS URLS
    var datosTotal = null;

    //EN DATOSMI GUARDAREMOS LOS DATOS DE LA RELACION NAVEPILOTOS
    var datosmi = null;

    //SEPARAREMOS LOS DATOS EN UN ARRAY PARA LAS NAVES Y OTRA PARA LOS PILOTOS:
    var datosNaves = [];
    var datosPeople = [];


    //PILOTOSNA COGE LOS PILOTOS QUE TIENE ESA NAVE EN CONCRETO
    var pilotosna = [];


    var contarAux = [];


    //ARRR GUARDA LOS ID DE LOS BOTONES DEL BORRAR QUE SON btnBor1, btnBor2, etc. estos tienen un numerito al final que identifica cada boton
    var arrr = [];


    var contador=0;


    var primeraVez = 0;








let dax = new Promise((resolve, reject) => {

    $http({
        method: 'GET',
        url: "http://localhost/starwars/api/navepiloto"
    }).then(function successCallback(response) {
        datosmi=response;
        resolve(datosmi);
    }, function errorCallback(response) {

    });

});



Promise.all([dax]).then(datosmi => llamada(datosmi, url1, url2));



function llamada(datosmi, url1, url2){

        console.log(datosmi);

        if(url1!=null){
            xhr1 = new Promise((resolve, reject) => {

                $http({
                    method: 'GET',
                    url: url1
                }).then(function successCallback(response) {
                    resolve(response);
                }, function errorCallback(response) {

                });

            });
        }else{
            xhr1 = null;
        }




        if(url2 != null){
            xhr2 = new Promise((resolve, reject) => {
                $http({
                    method: 'GET',
                    url: url2
                }).then(function successCallback(response) {
                    data.options=response.data;
                    data.selected = data.options[0];
                    resolve(response);
                }, function errorCallback(response) {

                });
            });
        }else{
            xhr2 = null;
        }


        if(xhr1==null){
            Promise.all([xhr1, xhr2]).then(exito, errorHandler);
        }else if(xhr2==null){
            Promise.all([xhr1, xhr2]).then(exito, errorHandler);
        }else{
            Promise.all([xhr1, xhr2]).then(exito, errorHandler);
        }
    }





    //SI HEMOS TENIDO EXITO AL LLAMAR:
    function exito(datos){

        datosTotal = datos;



        datosNaves = datosTotal[0].data;
        datosPeople = datosTotal[1].data;




        //datos[0] => recurso naves

        //datos[1] => recurso people






        // var ur = "";
        // for(let b = 0; b < datosPeople.length; b++){
        //     urlPilotos.push(datosPeople[b].url);
        // }







        let array = [];

        let primeraVez = true;

        for(let y = 0; y < datosNaves.length; y++){
                let item = procesarDatos(datosNaves[y], datosPeople);
                array.push(datosNaves[y].nombre);
        }


        //LLAMAMOS A ESTE METODO PARA ASIGNAR A LOS BOTONES BORRAR LO DE ELIMINAR Y ELIMINAR BLOQUE....
        botonesBorrar();

    }



    function procesarDatos(datosDeNave, datosDePilotos) {







        let nom = document.getElementById("nave"+datosDeNave.id);
        nom.textContent=datosDeNave.nombre;



        let pre = document.getElementById("precio"+datosDeNave.id);
        pre.textContent="$ "+base15(datosDeNave.precio);






        var item = document.createElement('div');

        let cadena = [];


        let nombreBoton = "";


        item.style="width:750px; height:400px; display:flex; justify-content:center; align-items:center; position:relative;margin-bottom:270px;";
        item.classList.add("col-md-6");








    var botonAnnadir = document.getElementById("btnEnviar"+datosDeNave.id);
    botonAnnadir.addEventListener('click',function(){
        postApi(datosDeNave, id, data.selected.nombre);
    });










    var pilotosNave = [];








    var pilotosporNave = [];
    pilotosna = [];
    var cont = 0;


    for(let k = 0; k<datosmi.data.length; k++){
        // console.log(datosmi.data[k].nave_id);
        if(datosmi.data[k].nave_id==datosDeNave.id){
            // console.log(datosmi.data[k].piloto_id);

            //lOS PILOTOS DE ESA NAVE EN CONCRETO:
            pilotosna.push("http://localhost/starwars/api/pilotos/"+datosmi.data[k].piloto_id);
        }
    }





    var contar=[];
    var pilotosTo = [];
    var ids = [];
    var co = 0;
    var arrayids = [];

    var cun = 0;


    contarAux = [];

        //item.innerHTML="Nombre Nave: " + enllac.textContent + " | PILOTOS => ";

        //SI LA NAVE TIENE PILOTOS:
            if(pilotosna.length!=0){
                // console.log(pilotosna);
                // console.log("--------------------");

                if(datosmi!=null){


                    let newarr=[];


                    for(let a = 0; a<datosmi.data.length; a++){
                                            if(datosmi.data[a].nave_id==datosDeNave.id){
                                                contar.push(a);
                                                contarAux.push(datosmi.data[a].id);
                                                ids.push(datosmi.data[a].id);
                                                newarr.push(datosmi.data[a]);

                                                // let par = document.getElementById("piloto"+datosmi.data[a].id);
                                                // if(!par.textContent.includes(dada2[b].nombre)){
                                                //     let aux = par.textContent;
                                                //     par.textContent=dada2[b].nombre+aux;
                                                // }

                                            }
                                        }
                                        console.log("contar:");
                                                console.log(contarAux);



                    // console.log(pilotosna);




                    for(let i = 0; i<newarr.length; i++){



                                for(let b = 0; b < datosDePilotos.length; b++){
                                    nombreBoton = datosDePilotos[b].nombre.replace(/ /g, "_");
                                    if(newarr[i].piloto_id == datosDePilotos[b].id){


                                        


                                        //item.innerHTML+=dada2[b].results[l].name+"<button type='submit' name='btnDel"+ nombreBoton +"' style='margin:10px;margin-left:60p;' class='btn btn-danger'><i class='fas fa-trash'></i></button><br>";
                                        //nombrePiloto.textContent+=dada2[b].nombre;




                                        let no = datosDePilotos[b].nombre.replace(/ /g, "_");


                                        pilotosTo.push(datosDePilotos[b].nombre);

                                        let par = document.getElementById("piloto"+datosmi.data[contar[0]].id);
                                        if(!par.textContent.includes(datosDePilotos[b].nombre)){
                                            let aux = par.innerHTML;
                                            par.innerHTML=datosDePilotos[b].nombre+aux;
                                        }





                                        var divNavPil = document.getElementById("divPilotosNav"+datosDeNave.id);

                                        var bloque = null;

                                        for(let ind = 0; ind<divNavPil.childNodes.length; ind++){
                                            if(divNavPil.childNodes[ind].tagName=="DIV"){
                                                if(!divNavPil.childNodes[ind].hasAttribute("id")){
                                                    bloque = divNavPil.childNodes[ind];
                                                    var botonBor = bloque.childNodes[1].childNodes[1];
                                                    botonBor.id="btnBor"+(contarAux[cun]);
                                                    cun++;
                                                    botonBor.name="NaveBut"+datosDeNave.id;
                                                    arrr.push(botonBor.id);
                                                    co++;

                                                    bloque.id="bloque"+no;
                                                    bloque.value=co;
                                                    ind=99999;


                                                }
                                            }
                                        }


                                        contar.splice(0, 1);




                                        var chaar = botonBor.id.indexOf('/');
                                        chaar+=1;
                                        var ide = botonBor.id.substr(chaar);
                                        parseInt(ide);
                                        arrayids.push(ide);
                                        //ide es posicion de los bloques


                                        // console.log(dada.id);



                                        //console.log(nombreBoton);
                                        pilotosNave.push(datosDePilotos[b].nombre);






                                    }
                                }


                        


                    }
                }


            }else{
                //item.innerHTML+="NO HAY PILOTOS";
                let divPi = document.getElementById("divPilotosNav"+datosDeNave.id);
                divPi.innerHTML+=`<h3 style="color:gray">NO HAY PILOTOS</h3>`;
            }






            for(let b = 0; b<datosDePilotos.length; b++){
                var encontrado = false;
                for(let o = 0; o<pilotosNave.length; o++){
                    if(datosDePilotos[b].nombre==pilotosNave[o]){
                        encontrado=true;
                    }
                }
                if(!encontrado){
                        pilotosporNave.push(datosDePilotos[b].nombre);
                    }
            }






            var sel = document.getElementById("seleccion"+datosDeNave.id);
            id=1;

            sel.addEventListener('change',function(){
                var seleccionado = this.options[sel.selectedIndex].text;
                // console.log(seleccionado);
                for(let i = 0; i<datosDePilotos.length; i++){
                    if(seleccionado==datosDePilotos[i].nombre){
                        id = datosDePilotos[i].id;
                        // console.log("id => " + id);
                    }
                }
            });






        //divPiloto.appendChild(nombrePiloto);
        //divPiloto.appendChild(botonDel);













        //--------------------------------------------------------------------------------------------
        //ESTO LO HAGO PARA QUE EN EL SELECT NO APAREZCAN LOS PILOTOS QUE YA ESTÁN EN ESA NAVE:
        //--------------------------------------------------------------------------------------------






        let arrn = [];

        for(let da = 0; da<data.options.length; da++){

            if(pilotosTo.includes(data.options[da].nombre)){
                arrn.push(data.options[da].nombre);
            }

        }


        for(let hi = 0; hi<arrn.length; hi++){

            for(let ne = 0; ne<sel.childNodes.length; ne++){

                if(sel.childNodes[ne].text==arrn[hi]){
                    sel.removeChild(sel.childNodes[ne]);
                }

            }

        }






        return item;

    }

    function errorHandler(){
        console.log("error");
    }

    function botonesBorrar(){




        if(conn == 0 && arrr.length>0){
            for(let x = 0; x<arrr.length; x++){
                let zo = document.getElementById(arrr[x]);
                let divBloque = zo.parentNode.parentNode;
                zo.addEventListener("click", function(){
                    let idre = parseInt(zo.id.substr(6));
                    eliminar(idre);
                    eliminarBloque(divBloque);
                    conn++;
                });

            }



        }

    }



    function postApi(datosDeNave, pilotoid, nombre){


        // console.log(naveid);


        console.log("a");
        console.log(datosmi);


        //SACAMOS EL ULTIMO DIGITO Y LE SUMAMOS UNO. ESTO LO HAGO TAMBIÉN PORQUE EN LA BASE DE DATOS SI TU BORRAS UNO
        //Y LUEGO VUELVES A METER OTRO, POR EJEMPLO BORRAS EL 25 Y METES OTRO EN VEZ DE SUSTITUIRSE EL ID SE PASA AL 26. POR LO CUAL
        //QUEDARIA DESPUES DEL ID 24 EL 26.

        //POR LO QUE ESTO LO QUE HACE ES QUE RESPETE ESE ORDEN Y SE PONGA EN EL ID 25

        if(primeraVez==0){


            digitoSacado = 0;
            let numer1 = 1;
            let contarEspacios = 1;
            let encon = datosmi.data[datosmi.data.length-1].id;
            if(encon==""){
                while(encon == ""){
                    numer1++;
                    encon = datosmi.data[datosmi.data.length-1].id+1;
                    contarEspacios++;
                }
                digitoSacado = parseInt(encon.substr(6));
                digitoSacado+=contarEspacios;
            }else{

                digitoSacado = datosmi.data[datosmi.data.length-1].id+1;


            }


            $http.post("http://localhost/starwars/api/navepiloto",{
                id: digitoSacado,
                nave_id: datosDeNave.id,
                piloto_id: pilotoid
            });


            primeraVez+=1;


        }





        console.log("el digito:");
        console.log(digitoSacado);






        $http({
            method: 'GET',
            url: "http://localhost/starwars/api/navepiloto"
        }).then(function successCallback(response) {
            datosmi=response
            console.log(response);

        }, function errorCallback(response) {

        });


        let arrAuxi = arrr;
        arrr=[];


        $http({
            method: 'GET',
            url: "http://localhost/starwars/api/navepiloto"
        }).then(function successCallback(response) {
            console.log(response);
            datosmi=response;
        }, function errorCallback(response) {

        });



        if(primeraVez>=2){
            console.log(datosmi);
            digitoSacado+=1;


            $http.post("http://localhost/starwars/api/navepiloto",{
                id: digitoSacado,
                nave_id: datosDeNave.id,
                piloto_id: pilotoid
            });

            console.log("El digito: " + digitoSacado);

            //arrr.push("btnBor"+digitoSacado);



        }







        primeraVez+=1;


        let repetido = true;
        let encontrado=0;
        for(let a = 0; a<datosmi.data.length; a++){
            for(let b = 0; b<arrAuxi.length; b++){
                if(("btnBor"+(datosmi.data[a].id+1)) != arrAuxi[b]){
                    repetido=false;
                }

                if(arrAuxi[b]==""){
                    encontrado=b;
                }else{
                    encontrado=0;
                }





            }



            if(!repetido){

                arrr.push("btnBor"+(datosmi.data[a].id));
                console.log(datosmi.data[a].id);

            }



        }


        arrr.push("btnBor"+digitoSacado);


        if(encontrado!=0){
            arrr.push("");
            let auri = arrr[arrr.length-2];
            let digito = parseInt(auri.substr(6));
            arrr[arrr.length-2] = arrr[arrr.length-1];
            arrr[arrr.length-1] = "btnBor"+(digito);
        }






        let no = nombre.replace(/ /g, "_");


        var divpil2 = document.getElementById("divPilotosNav"+datosDeNave.id);

        if(divpil2.innerHTML.includes("NO HAY PILOTOS"))
            divpil2.innerHTML="";

        var divpi2 = document.createElement("div");
        divpi2.style="border-bottom:1px solid white;";
        divpi2.id="bloque"+no;


        var ppi2 = document.createElement("p");
        ppi2.style="position:relative;margin-bottom:50px;";
        ppi2.textContent=nombre;










        console.log(datosmi.data);

        var butpi2 = document.createElement("button");
        butpi2.type="submit";
        butpi2.style="position:absolute;right:10%;top:0%";
        butpi2.id="btnBor"+parseInt(arrr[arrr.length-1].substr(6));
        butpi2.name="NaveBut"+datosDeNave.id;
        butpi2.classList.add("btn", "btn-danger");



        var ipi2 = document.createElement("i");
        ipi2.classList.add("fas", "fa-trash");



        butpi2.appendChild(ipi2);
        ppi2.appendChild(butpi2);
        divpi2.appendChild(ppi2);


        divpil2.appendChild(divpi2);






        let idre2 = parseInt(butpi2.id.substr(6));


            let divBloque = butpi2.parentNode.parentNode;
            butpi2.addEventListener("click", function(){
                //let idre = arrr[idre2--];
                //console.log(idre);
                //idre = idre.substr(6);
                //console.log("IDRE2 => " + arrr[idre2--]);
                //console.log(console.log("IDRE => " + idre));
                //idre = parseInt(idre.substr(6));
                //console.log("IDRE => " + idre);
                eliminar(idre2);
                eliminarBloque(divBloque);
            });













        //location.reload();

        // var xsrf = $.param({naveid: "nave_id"}, {pilotoid: "piloto_id"});
        // $http({
        //     method: 'POST',
        //     url: 'http://localhost/starwars/api/navepiloto',
        //     headers: {
        //         'Content-Type': 'multipart/form-data'
        //     },
        //     data: {
        //         nave_id: naveid,
        //         piloto_id: pilotoid
        //     }
        // });



        //volvemos a llamar a esto que llamamos al inicio para que coja los nuevos cambios:




}


    function postApi2(dataa, datosDeNave, pilotoid, nombre){



        let arrAuxi = arrr;
        arrr=[];


        $http({
            method: 'GET',
            url: "http://localhost/starwars/api/navepiloto"
        }).then(function successCallback(response) {
            console.log(response);

        }, function errorCallback(response) {

        });




        let repetido = true;
        let encontrado=0;
        for(let a = 0; a<datosmi.data.length; a++){
            for(let b = 0; b<arrAuxi.length; b++){
                if(("btnBor"+(datosmi.data[a].id+1)) != arrAuxi[b]){
                    repetido=false;
                }

                if(arrAuxi[b]==""){
                    encontrado=b;
                }else{
                    encontrado=0;
                }


            }



            if(!repetido){

                arrr.push("btnBor"+(datosmi.data[a].id));
                console.log(datosmi.data[a].id);

            }



        }




        //RECORDEMOS QUE LOS BOTONES LOS IDENTIFICAMOS CON EL BTNBOR + EL ID DE LA RELACION NAVEPILOTO ES DECIR EL PILOTO EN ESA NAVE


        if(encontrado!=0){
            arrr.push("");
            let auri = arrr[arrr.length-2];
            let digito = parseInt(auri.substr(6));
            arrr[arrr.length-2] = arrr[arrr.length-1];
            arrr[arrr.length-1] = "btnBor"+(digito+1);
        }






        let no = nombre.replace(/ /g, "_");


        var divpil2 = document.getElementById("divPilotosNav"+datosDeNave.id);

        if(divpil2.innerHTML.includes("NO HAY PILOTOS"))
            divpil2.innerHTML="";

        var divpi2 = document.createElement("div");
        divpi2.style="border-bottom:1px solid white;";
        divpi2.id="bloque"+no;


        var ppi2 = document.createElement("p");
        ppi2.style="position:relative;margin-bottom:50px;";
        ppi2.textContent=nombre;







        console.log(datosmi.data);

        var butpi2 = document.createElement("button");
        butpi2.type="submit";
        butpi2.style="position:absolute;right:10%;top:0%";
        butpi2.id="btnBor"+datosmi.data[datosmi.data.length-1].id;
        butpi2.name="NaveBut"+datosDeNave.id;
        butpi2.classList.add("btn", "btn-danger");



        var ipi2 = document.createElement("i");
        ipi2.classList.add("fas", "fa-trash");



        butpi2.appendChild(ipi2);
        ppi2.appendChild(butpi2);
        divpi2.appendChild(ppi2);


        divpil2.appendChild(divpi2);






        let idre2 = parseInt(butpi2.id.substr(6));


            let divBloque = butpi2.parentNode.parentNode;
            butpi2.addEventListener("click", function(){
                //let idre = arrr[idre2--];
                //console.log(idre);
                //idre = idre.substr(6);
                //console.log("IDRE2 => " + arrr[idre2--]);
                //console.log(console.log("IDRE => " + idre));
                //idre = parseInt(idre.substr(6));
                //console.log("IDRE => " + idre);
                eliminar(idre2);
                eliminarBloque(divBloque);
            });

    }




    function eliminar(id){




        // console.log("id relacion => " + id);


        var urle = "http://localhost/starwars/api/navepiloto/"+id;
        // console.log(urle);
        $http({
            method: 'DELETE',
            url: urle
        //     data: {
        //         user: userId
        //     },
        //     headers: {
        //         'Content-type': 'application/json;charset=utf-8'
        //     }
        // })
        // .then(function(response) {
        //     console.log(response.data);
        // }, function(rejection) {
        //     console.log(rejection.data);
        });



        let posi = arrr.indexOf("btnBor"+id);
        // console.log(posi);
        arrr[posi] = "";





        let dax = new Promise((resolve, reject) => {

            $http({
                method: 'GET',
                url: "http://localhost/starwars/api/navepiloto"
            }).then(function successCallback(response) {
                datosmi=response;
                resolve(response);
            }, function errorCallback(response) {

            });

            });

            Promise.all([dax]).then(respons => eliminar2(respons));





    }


    function eliminar2(resp){





        let arrAuxi = arrr;
        arrr=[];

        console.log(datosmi);

        let repetido = true;
        let encontrado=[];
        for(let a = 0; a<datosmi.data.length; a++){

                    arrr.push("btnBor"+(datosmi.data[a].id--));




        }

        arrr.push("");







        let arrr2 = [];
        for(let co = 0; co<arrr.length; co++){

            if(arrr[co]==""){
                co++;
            }

            if(co<arrr.length){
                arrr2.push(parseInt(arrr[co].substr(6)));
            }

        }






        let auxi = 0;
        let elpeque=0;
        for(let cor = 0; cor<arrr2.length; cor++){

            if(arrr)

            elgrande=cor;

            for(let cor2 = 0; cor2<arrr2.length; cor2++){


                if(arrr2[elgrande]<arrr2[cor2]){

                    elgrande = cor2;

                    //4 3 2
                    //3 4 2
                    //3 2 4

                }

                // if(arrr[cor]>arrr[cor2]){

                //     auxi = arrr[cor2];
                //     arrr.push("");

                //     arrr[cor2] = arrr[cor];

                // }


                auxi = arrr2[cor];

                arrr2[cor] = arrr2[elgrande];


                arrr2[elgrande] = auxi;

            }







        }



        let coa1=0;

        for(let co2 = 0; co2<arrr2.length; co2++){


            if(arrr[co2]==""){
                arrr[co2]="";
                coa1++;
            }else{
                arrr[co2] = "btnBor"+arrr2[coa1];
            }

            coa1++;
        }




        



    }




    function eliminarBloque(bloque){


        console.log(bloque.parentNode);

        var divpil2 = bloque.parentNode;


        bloque.remove();


        
        if(!divpil2.innerHTML.includes("div"))
            divpil2.innerHTML+=`<h3 style="color:gray">NO HAY PILOTOS</h3>`;
        


    }





    function base15(num){

        //0, 1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E
        //console.log("\u00B6");

        //SE DIVIDE EL NUMERO ENTRE 15 HASTA QUE EL COCIENTE SEA MENOR QUE 15.
        //Y AL FINAL SE COGE ESE COCIENTE Y DEL ULTIMO RESTO AL PRIMERO.
        //RECUERDA LOS NUMEROS SI ES 12 CORRESPONDE A C => 1 2 3 4 5 6 8 9 A B C(C=12)
        //20 => 1A.     30=> 2A





        var car = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "\u00DF", "\u00DE", "\u00A2", "\u00B5", "\u00B6"];

        var cociente=0;
        var cadena = "";



        var otrosDigitos = [];

        var num2e = 1;
        if(num==150000000)
            num2e=2;


        do{

            otrosDigitos.unshift(parseInt(num%15));
            num/=15;


            if(num<15){
                cociente=num;
            }


        }while(num>15);


        if(num2e==2)
            console.log(cociente);







        var ultimoNum = cociente%10;




        cadena+=""+car[parseInt(cociente)];





        for(let i=0; i < otrosDigitos.length; i++){

            if(otrosDigitos[i]>9){

                switch(otrosDigitos[i]){

                    case 10:
                        cadena+=""+car[10];
                        break;

                    case 11:
                        cadena+=""+car[11];
                        break;

                    case 12:
                        cadena+=""+car[12];
                        break;


                    case 13:
                        cadena+=""+car[13];
                        break;


                    case 14:
                        cadena+=""+car[14];
                        break;

                }
            }else{

                if(!otrosDigitos[0]==0){
                    cadena+=""+otrosDigitos[i];
                }

            }


        }







        return cadena;




    }




}]);