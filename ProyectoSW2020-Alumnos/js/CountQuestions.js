$(document).ready(function(){
    console.log("HOLA");
    countQuestions();
    setInterval(countQuestions,3000);


});


function countQuestions(){
    $.ajax({

        url: '../xml/Questions.xml',
        processData: false,
        contentType: false,
        cache: false,
        type: 'GET',
        success: function(xml){
            printNumberQuestions(xml);
        }


    });
}


function printNumberQuestions(xml){
    var email = $("#email").val();
    var nQuestions = 0;
    var totalQuestions = 0;
    var assessmentItem = xml.getElementsByTagName("assessmentItem");
    for (i = 0; i < assessmentItem.length; i++){
        if( assessmentItem[i].getAttribute('author') == email){
            nQuestions++;
        }
        totalQuestions++;
    }
    var textQuestions  = "Has insertado " + nQuestions+" / "+totalQuestions + " preguntas";
    $("#contadorQuestions").text(textQuestions);


}