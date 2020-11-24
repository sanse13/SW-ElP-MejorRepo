$(document).ready(function(){
    $("#email").blur(function() {

        verifyEmail();
    });

    $("#enviar").click(function (){

        if ($("#vipMsg").text() == 'El email es VIP'){
            return true;
        } 
        else{
            return false;
        } 

    });

});

function verifyEmail(){
    var fd = new FormData();
    fd.append('email',  $("#email").val());
    $.ajax({

        url: '../php/ClientVerifyEnrollment.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(res){
            $('#vipMsg').remove();
            if(res == "SI"){
                $('#email').after('<p id ="vipMsg" style="color: green;">El email es VIP</p>');
            }else{
                $('#email').after('<p id ="vipMsg" style="color: red;"> El email no es VIP </p>');
            }
        }


    });
}
