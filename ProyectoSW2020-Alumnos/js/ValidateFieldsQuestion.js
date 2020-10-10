
$(document).ready(function(){

    $('#pregunta').blur(function (){
        if( $('#pregunta').val() == "") $('#pregunta').after('<p id="ErrorMsgs"> Este campo no puede estar vacio </p>');
        else if(!validarLongitudPregunta())  $('#pregunta').after('<p id="ErrorMsgs"> La pregunta es muy corta </p>');
    })
    $('#pregunta').focus(function(){
        $('#pregunta').next("p").remove();

    })

    $('#email').blur(function (){
        if( $('#email').val() == "") $('#email').after('<p id="ErrorMsgs"> Este campo no puede estar vacio </p>');
        else if(!validarEmail()) $('#email').after('<p id="ErrorMsgs"> El email no es valido </p>');
    })
    $('#email').focus(function(){
        $('#email').next("p").remove();
    })

    $('#resCorrecta').blur(function (){
        if( $('#resCorrecta').val() == "") $('#resCorrecta').after('<p id="ErrorMsgs"> Este campo no puede estar vacio </p>');
    })
    $('#resCorrecta').focus(function(){
        $('#resCorrecta').next("p").remove();
    })

    $('#resIncorrecta1').blur(function (){
        if( $('#resIncorrecta1').val() == "") $('#resIncorrecta1').after('<p id="ErrorMsgs"> Este campo no puede estar vacio </p>');
    })
    $('#resIncorrecta1').focus(function(){
        $('#resIncorrecta1').next("p").remove();
    })

    $('#resIncorrecta2').blur(function (){
        if( $('#resIncorrecta2').val() == "") $('#resIncorrecta2').after('<p id="ErrorMsgs"> Este campo no puede estar vacio </p>');
    })
    $('#resIncorrecta2').focus(function(){
        $('#resIncorrecta2').next("p").remove();
    })

    $('#resIncorrecta3').blur(function (){
        if( $('#resIncorrecta3').val() == "") $('#resIncorrecta3').after('<p id="ErrorMsgs"> Este campo no puede estar vacio </p>');
    })
    $('#resIncorrecta3').focus(function(){
        $('#resIncorrecta3').next("p").remove();
    })

    $('#tema').blur(function (){
        if( $('#tema').val() == "") $('#tema').after('<p id="ErrorMsgs"> Este campo no puede estar vacio </p>');
    })
    $('#tema').focus(function(){
        $('#tema').next("p").remove();
    })

    $('#complejidad').blur(function (){
        if( $('#complejidad').val() == "") $('#complejidad').after('<p id="ErrorMsgs"> Este campo no puede estar vacio </p>');
        else if (!validarComplejidad()) $('#complejidad').after('<p id="ErrorMsgs"> Tiene que ser un numero del 1 al 3 </p>');
    })
    $('#complejidad').focus(function(){
        $('#complejidad').next("p").remove();
    })


})

function validarFormulario(){

    /*var vacios = validarCamposVacios() ;
    var email =  validarEmail() ;
    var complejidad =  validarComplejidad() ;
    var longitudPreg = validarLongitudPregunta();

    console.log(" vacios= "+vacios+" email: "+ email +" complejidad: " + complejidad +" longitud: " + longitudPreg);*/

    return validarCamposVacios() && validarEmail() && validarComplejidad() && validarLongitudPregunta();
}

function validarEmail(){

    var expRegAlum = new RegExp('^[a-z]+\\d{3}@ikasle\.ehu\.(eus|es)$');
    var expRegProf = new RegExp('^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$');

    var email = $('#email').val();



    return expRegAlum.test(email) || expRegProf.test(email);
}

function validarCamposVacios(){

    var email = $('#email').val();
    var pregunta = $('#pregunta').val();
    var resCorrecta = $('#resCorrecta').val();
    var resIncorrecta1 = $('#resIncorrecta1').val();
    var resIncorrecta2 = $('#resIncorrecta2').val();
    var resIncorrecta3 = $('#resIncorrecta3').val();
    var resIncorrecta4 = $('#resIncorrecta4').val();
    var tema = $('#tema').val();

    return !(email=="" || pregunta=="" || resCorrecta=="" || resIncorrecta1=="" || resIncorrecta2=="" || resIncorrecta3=="" || resIncorrecta4=="" || tema=="");
}

function validarComplejidad (){
    var expNumComplejidad = new RegExp('^[123]$');
    var complejidad = $('#complejidad').val();
    return expNumComplejidad.test(complejidad);
}

function validarLongitudPregunta(){
    var pregunta = $('#pregunta').val();
    console.log(pregunta.length);
    return pregunta.length >= 10;
}
