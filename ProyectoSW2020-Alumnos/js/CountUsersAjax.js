$(document).ready(function(){
    countUsers();
    setInterval(countUsers,5000);

});

function countUsers(){
    $.ajax({

        url: '../xml/UserCounter.xml',
        processData: false,
        contentType: false,
        cache: false,
        type: 'GET',
        success: function(xml){
            printNumberUsers(xml);
        }


    });
}

function printNumberUsers(xml){
    var numUsuarios = "Hay " + xml.getElementsByTagName("usuario").length + " usuarios conectados";
    $("#contadorUsuarios").text(numUsuarios);


}