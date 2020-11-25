$(document).ready(function(){
    $("#password").blur(function() {
        verifyPass();
    });

    $("#enviar").click(function (){
        if ($("#passMsg").text() == 'La contraseña es valida'){
            console.log("hoalaaa");
            return true;
        }
        else{
            return false;
        }

    });

});

function verifyPass(){
    var fd = new FormData();
    fd.append('pass',  $("#password").val());
    $.ajax({

        url: '../php/ClientVerifyPass.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(res){
            $('#passMsg').remove();
            if(res == "VALIDA"){
                $('#password').after('<p id ="passMsg" style="color: green;">La contraseña es valida</p>');
            }else if (res == "INVALIDA" || res =='') {
                $('#password').after('<p id ="passMsg" style="color: red;"> La contraseña no es valida </p>');

            }else{
                $('#password').after('<p id ="passMsg" style="color: orange;"> SIN SERVICIO </p>');
            }
        }


    });
}
