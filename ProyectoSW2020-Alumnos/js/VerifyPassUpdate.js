$(document).ready(function (){

    $("#password").blur(function (){
        verifyPass();

    });

    
});


function verifyPass(){
    var fd = new FormData();
    fd.append('pass', $("#password").val());

    $.ajax({

        url: '../php/ClientVerifyPass.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            var es_valida = data;
            if (es_valida == "INVALIDA")
                $('#resPass').html("<p style='color:red'>La contraseña no es valida.</p>");
            else 
                $('#resPass').html("<p style='color:green'>La contraseña es valida.</p>");
        }
    
    
    });
}