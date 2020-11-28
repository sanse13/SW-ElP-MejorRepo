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