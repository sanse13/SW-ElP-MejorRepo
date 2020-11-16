/*$(document).ready(function(){

    $(window).on("beforeunload", function() {
        unloadUser();
    })



});


function unloadUser(){
    var url_string = window.location.href;
    var url = new URL(url_string);
    var email = url.searchParams.get("email");
    alert("holaaa");
    decreaseCounter(email);
}*/



function decreaseCounter(email){
    var fd = new FormData();
    fd.append('email', email);
    $.ajax({
        url: '../php/DecreaseGlobalCounter.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            window.location.href='LogOut.php';
        }


    });
}