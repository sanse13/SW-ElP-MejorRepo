$(document).ready(function(){

    $("#actualizar").click(function (){

        updatePass();

    });


});


function updatePass(){

    var fd = new FormData();
    fd.append('codigo', $("#codigo").val());
    fd.append('pass', $("#password").val());
    fd.append('repPassword', $("#repPassword").val());
    fd.append('resPass', $("#resPass").text());

    $.ajax({

        url: '../php/UpdatePass.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            $('#res').html(data);
            
        }
    
    
    });

}