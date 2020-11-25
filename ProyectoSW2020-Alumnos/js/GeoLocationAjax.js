$(document).ready(function(){

    $.ajax({
        url: '../php/GeoLocation.php',
        processData: false,
        contentType: false,
        cache: false,
        type: 'GET',
        success: function(data){
            $("#infoGeo").html(data);
        }


    });

});
