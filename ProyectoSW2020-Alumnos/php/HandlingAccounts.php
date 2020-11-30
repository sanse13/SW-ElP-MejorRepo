<?php
    session_start();
    if(!isset($_SESSION['tipo']) || $_SESSION['tipo']!='administrador'){
      echo "<script>
              window.location.href='Layout.php';
            </script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <script src="../js/RemoveUserAjax.js"></script>
  <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <section class="main" id="s1">
  <?php
        include "DbConfig.php";

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $query = "SELECT Email, Pass, Imagen, Estado  FROM Usuarios WHERE Email != 'admin@ehu.es' ";

        $res = mysqli_query($mysqli, $query);

        if(!$res){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        echo '<table border=1 class="questionsTable"><tr> <th> Email </th> <th> Pass </th> <th> Imagen </th> <th> Cambiar Estado </th> <th> Borrar </th><th> Estado </th></tr>';

        while ($row = mysqli_fetch_array($res)){
            $confirmBorrar = "'Estas seguro que quieres borrar a:".$row['Email']."'";
            $confirmEstado = "'Estas seguro que cambiar el estado de ".$row['Email']."'";

             echo '<tr>
                    <td>' .$row['Email'].'</td>
                    <td>' .$row['Pass'].'</td>
                    <td> <img width="80px" height="80px" src="'.$row['Imagen'].'" ></td>
                    <td><form method="POST" action="ChangeUserState.php">
                        <input type="hidden" name="email" value="'.$row['Email'].'">
                        <input type="hidden" name="estado" value="'.$row['Estado'].'">
                        <input type="submit" value ="Cambiar Estado" onClick="return confirm('.$confirmEstado.')">
                    </form></td>
                    <td><form method="POST" action="RemoveUser.php">
                        <input type="hidden" name="email" value="'.$row['Email'].'">
                        <input type="submit" value ="Borrar" onClick="return confirm('.$confirmBorrar.')">
                    </form></td>
                    <td>' .$row['Estado'].'</td>
                </tr>';
        }

        echo '</table>';


        mysqli_close($mysqli);


?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
