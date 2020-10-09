
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