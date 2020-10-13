
function showImage (){
    var img = $('#subirImagen').prop("files")[0];
    var reader = new FileReader();

    if (img) {
        reader.readAsDataURL(img);
    }

    reader.onloadend = function() {
        if($("#imgSubir").length){
            $('#imgSubir').next('br').remove();
            $('#imgSubir').remove();
        }
        $('#enviar').before('<img src="'+reader.result+'"width="250" height="250" id="imgSubir" ><br>');
    }


}