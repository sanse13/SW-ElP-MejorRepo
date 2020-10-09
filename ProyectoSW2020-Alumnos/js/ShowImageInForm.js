
function showImage (){
    var img = $('#subirImagen').prop("files")[0];
    var reader = new FileReader();
    console.log("HOLA");

    if (img) {
        reader.readAsDataURL(img);
    }

    reader.onloadend = function() {
        $('#enviar').before('<img src="'+reader.result+'"width="250" height="250" ><br>');
    }


}