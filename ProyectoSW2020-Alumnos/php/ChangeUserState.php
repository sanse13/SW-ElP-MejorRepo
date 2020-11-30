<?php
    session_start();
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "administrador"){

        include "DbConfig.php";

        $email = $_POST['email'];
        $estado = $_POST['estado'];

        if ($estado == 'activo'){
            $newEstado = "bloqueado";
        }else{
            $newEstado = "activo";
        }


        if ($email == "admin@ehu.es"){
            exit();
        }

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $query = "UPDATE Usuarios SET Estado='$newEstado' WHERE Email='$email'";

        $res = mysqli_query($mysqli, $query);

        if(!$res){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        mysqli_close($mysqli);

        echo "<script>
            window.location.href='HandlingAccounts.php';
            </script>";

    }else{

        echo "<script>
              window.location.href='Layout.php';
            </script>";
    }


?>