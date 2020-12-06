$(document).ready(function (){

    $("#restablecer").click(function (){
        emailValido();
        $("#restablecer").attr("disabled", true);
    });

    $("#reset").click(function (){
        $("#restablecer").attr("disabled", false);
        

    });
    
    
});


function emailValido(){

    var fd = new FormData();
    fd.append("email", $("#email").val());
    $.ajax({

        url: '../php/ComprobarEmail.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            $('#emailValido').html(data);
            
        }
    
    
    });

}

