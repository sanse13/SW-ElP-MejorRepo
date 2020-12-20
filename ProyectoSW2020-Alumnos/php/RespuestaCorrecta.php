<?php 
session_start();

$respuesta_correcta = $_POST['respuesta_correcta'];
$respuesta_elegida = $_POST['respuesta_je'];

if ($respuesta_correcta != $respuesta_elegida){
    echo "INCORRECTO";
    $_SESSION['incorrectas'] = $_SESSION['incorrectas']+1; 
}
else {
    echo "CORRECTO";
    $_SESSION['correctas'] = $_SESSION['correctas']+1;
}
?>