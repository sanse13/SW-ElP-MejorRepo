$(document).ready(function (){

    $("#button").click(function (){

        rellenarDatos();

    });


});

function rellenarDatos(){

    $.get('../xml/Users.xml', function(d){
        var email = $('#email').val();
        var listaCorreos = $(d).find('email');
        var listaNombres = $(d).find('nombre');
        var listaApellidos1 = $(d).find('apellido1');
        var listaApellidos2 = $(d).find('apellido2');
        var listaTelefonos = $(d).find('telefono');
        for (var i = 0; i < listaCorreos.length; i++){
            if (email == listaCorreos[i].childNodes[0].nodeValue){
                $("#tel").val(listaTelefonos[i].childNodes[0].nodeValue);
                $("#nombre").val(listaNombres[i].childNodes[0].nodeValue);
                $("#apellidos").val(listaApellidos1[i].childNodes[0].nodeValue+
                    " "+listaApellidos2[i].childNodes[0].nodeValue);
                return;
            }
        }
        $("#tel").val("");
        $("#nombre").val("");
        $("#apellidos").val("");
        alert("Este correo no esta registrado en la UPV/EHU. Introduzca otro");
    });

}
