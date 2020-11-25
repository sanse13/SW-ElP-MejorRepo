$(document).ready(function(){

    $.ajax({
        url: '../php/GeoLocation.php',
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        type: 'GET',
        success: function(data){
            console.log("hola" + data);
            dataOut = "";
            $.each(data, function (i, item) {
                dataOut +=
                "<p style='color:blue;'> "+ i +" : " + item + "<br>";
            });
            dataOut += "</p>";


            $("#infoGeo").html(dataOut);
        }


    });

});
