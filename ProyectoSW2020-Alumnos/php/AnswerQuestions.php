<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">

  <div>

        <form method="post" action="AnswerQuestions.php">

            <?php

            
                $cont = $_POST['contador'];
                if ($cont != "" && $cont == 0){
                    echo '<script>window.location.href="ResultadoJuego.php"</script>';
                }

                $tema = $_POST['tema'];

                echo '<input type="hidden" id="tema" name="tema" value="'.$tema.'">';

                $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

                /* comprobar la conexión */
                if (!$mysqli) {
                    exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
                }

                $query = "SELECT enunciado FROM Preguntas WHERE tema='".$tema."'";
                $res = mysqli_query($mysqli, $query);

                /* guardar los enunciados en una lista */
                /* sacar enunciado random de esa lista */
                $array_enunciados = unserialize($_POST['array_enunciados']);
                
                if (empty($array_enunciados)){
                    while ($row = mysqli_fetch_array($res))
                        $array_enunciados[] = $row['enunciado'];
                    
                    $cont = sizeof($array_enunciados);
                } 

                
                
                /* ------------------------------------------------------------------------------------------*/

                $enunciado = $array_enunciados[array_rand($array_enunciados)];
                $array_enunciados = array_diff($array_enunciados, array($enunciado));
                $cont = $cont - 1;
                echo '<input type="hidden" name="contador" value="'.$cont.'">';                


                echo "<h2>".$enunciado."</h2><br><br>";
                echo '<input type="hidden" id="enunciado_usado" name="enunciado_usado" value="'.$enunciado.'">';


                $query = "SELECT DISTINCT resOK, resF1, resF2, resF3, imagen FROM Preguntas WHERE tema='".$tema."' AND enunciado='".$enunciado."'";
                $res = mysqli_query($mysqli, $query);

                $row = mysqli_fetch_array($res);
                $respuesta_correcta = $row['resOK'];
                $respuesta_incorrecta1 = $row['resF1'];
                $respuesta_incorrecta2 = $row['resF2'];
                $respuesta_incorrecta3 = $row['resF3'];
                $path = $row['imagen'];


                $array_respuestas = array($respuesta_correcta, $respuesta_incorrecta1, $respuesta_incorrecta2, 
                $respuesta_incorrecta3);
                
                shuffle($array_respuestas);
                foreach($array_respuestas as $respuestas){
                    echo "
                    <input type='radio' id='respuesta_je' name='respuesta_je' value='".$respuestas."' onclick='activar()'>
                    <label id='respuesta' for='".$respuestas."'>".$respuestas."</label><br><br>                    
                    ";
                }

                if ($path != "../images/noimage.png"){
                    echo '<img width="150px" height="150px" src="'.$path.'"><br>';
                }
                    
                    


                echo '<input type="hidden" id="respuesta_correcta" name="respuesta_correcta" value="'.$respuesta_correcta.'">';

                mysqli_close($mysqli);


            ?>

            <input type="hidden" name="array_enunciados" value='<?php echo serialize($array_enunciados);?>'>
            
            <input type="button" id="calificar" name='calificar' value="Ver respuesta" disabled onclick="respuestaCorrecta()">
            <div id='es_correcta'></div>
            <input type="button" id="abandonar" value="Abandonar">
            <input type="submit" id="otra_pregunta" value="Siguiente pregunta"><br>
            <img id="dislike" name="dislike" width="30px" height="30px" src="../images/dislike.png">
            <img id="like" name="like" width="30px" height="30px" src="../images/likebutton.png">
            <label id="calificacion_pregunta"></label>

            

        </form>

    
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<script>

$(document).ready(function (){

    var boton_abandonar = document.getElementById('abandonar');
    boton_abandonar.style.visibility = "hidden";

    var boton_siguiente = document.getElementById('otra_pregunta');
    boton_siguiente.style.visibility = "hidden";

    $("#dislike").click(function(){
        document.getElementById('calificacion_pregunta').innerHTML = "<p style='color:red'>La pregunta ha sido valorada negativamente.</p>";
    });

    $("#like").click(function(){
        document.getElementById('calificacion_pregunta').innerHTML = "<p style='color:green'>La pregunta ha sido valorada positivamente.</p>";
    });

    $("#abandonar").click(function(){
        window.location.href="ResultadoJuego.php";
    });


});

function activar(){

    var bt = document.getElementById('calificar');
    bt.disabled = false;
}

function respuestaCorrecta(){

    var ele = document.getElementsByName('respuesta_je');
    var respuesta_elegida = "";
    for(i = 0; i < ele.length; i++) { 
        if (ele[i].checked)
            respuesta_elegida = ele[i].value;
    
    }
    
    var fd = new FormData();
    fd.append('respuesta_correcta', $('#respuesta_correcta').val());
    fd.append('respuesta_je', respuesta_elegida);

    $.ajax({

        url: 'RespuestaCorrecta.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            if (data == "CORRECTO"){
                $('#calificar').remove();
                document.getElementById('es_correcta').innerHTML = "<p style='color:green'>La respuesta es correcta</p>";
            } else {
                $('#calificar').remove();
                document.getElementById('es_correcta').innerHTML = "<p style='color:red'>La respuesta no es correcta</p>";
            }

            var boton_abandonar = document.getElementById('abandonar');
            boton_abandonar.style.visibility = "visible";

            var boton_siguiente = document.getElementById('otra_pregunta');
            boton_siguiente.style.visibility = "visible";
            


        }
    });

}



</script>