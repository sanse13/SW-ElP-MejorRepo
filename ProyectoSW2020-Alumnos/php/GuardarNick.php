<?php
    session_start();

    include 'DbConfig.php';
    $nick = $_POST['nick'];
    $correctas = $_SESSION['correctas'];
    $incorrectas = $_SESSION['incorrectas'];
    $acierto = $correctas/($correctas+$incorrectas);

    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
    $query = "INSERT INTO Nicks
            VALUES ('$nick','$correctas','$incorrectas','$acierto');";

    $res = mysqli_query($mysqli, $query);
    if (!$res) echo "No Ok";
    else echo "OK";
    
                

    


?>