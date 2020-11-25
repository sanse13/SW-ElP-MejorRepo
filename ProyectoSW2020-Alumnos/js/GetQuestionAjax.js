$(document).ready(function(){
   $("#verDatos").click(function(){
    if($("#idPregunta").val() == ""){
        $("#datos").html( "<p style='color:red'> Tienes que introducir un id </p>");

    }else{
        var fd = new FormData();
        fd.append( 'idPregunta', $("#idPregunta").val());
        $.ajax({

            url: 'ClientGetQuestion.php',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            cache: false,
            type: 'POST',
            success: function(data){
                dataOut = "";
                $.each(data, function (i, item) {
                    dataOut +=
                    "<p style='color:blue;'> "+ i +" : " + item + "<br>";
                });
                dataOut += "</p>";
                console.log(dataOut);

                $("#datos").html(dataOut);
            }
        });
    }

   });

});