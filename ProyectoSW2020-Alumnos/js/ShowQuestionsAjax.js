function showQuestions(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            printQuestions(this);

        }
    }
    xhttp.open("GET", "../xml/Questions.xml?_" + new Date().getTime());
    xhttp.send();

}


function printQuestions(xml){
    var i;
    var xmlQuestions = xml.responseXML;
    var table = "<tr><th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th</tr>";
    var assessmentItem = xmlQuestions.getElementsByTagName("assessmentItem");
    var itemBody = xmlQuestions.getElementsByTagName('itemBody');
    var correctResponse = xmlQuestions.getElementsByTagName('correctResponse');


    for (i = 0; i < assessmentItem.length; i++){
        table += "<tr><td>" +
        assessmentItem[i].getAttribute('author') +
        "</td><td>"+
        itemBody[i].getElementsByTagName('p')[0].childNodes[0].nodeValue +
        "</td><td>" +
        correctResponse[i].getElementsByTagName("response")[0].childNodes[0].nodeValue +
        "</td><tr>";
    }

    document.getElementsByClassName("questionsTable")[0].innerHTML = table;


}

function formReset(){
    document.getElementsByClassName("questionsTable")[0].innerHTML = "";
    $("#pregunta").val("");
    $("#resCorrecta").val("");
    $("#resIncorrecta1").val("");
    $("#resIncorrecta2").val("");
    $("#resIncorrecta3").val("");
    $("#tema").val("");
    $("#complejidad").val("");
    $("#subirImagen").val("");
    $("#imgSubir").remove();
    $("#res").empty();

}