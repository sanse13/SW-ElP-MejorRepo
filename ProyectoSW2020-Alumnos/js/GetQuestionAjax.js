$(document).ready(function(){
   $("#verDatos").click(function(){
    var fd = new FormData();
    fd.append( 'idPregunta', $("#idPregunta").val());
        $.ajax({

            url: 'ClientGetQuestion.php',
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            type: 'POST',
            success: function(data){
                //console.log(data);
                $("#datos").html(data);
            }
        });
   });

});