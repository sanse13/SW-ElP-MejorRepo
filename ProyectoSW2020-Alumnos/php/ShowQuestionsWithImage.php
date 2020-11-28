<?php
  echo "<script>
        window.location.href='Layout.php';
      </script>";
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div >
      <?php

        include "DbConfig.php";

        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        $query = "SELECT correo, enunciado, resOK, imagen  FROM Preguntas";

        $res = mysqli_query($mysqli, $query);

        if(!$res){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
        }

        echo '<table border=1 id="showQuestionTable"><tr> <th> AUTOR </th> <th> ENUNCIADO </th> <th> RESPUESTA </th> <th> IMAGEN </th> </tr>';

        while ($row = mysqli_fetch_array($res))
          echo '<tr>
                    <td>' .$row['correo'].'</td>
                    <td>' .$row['enunciado'].'</td>
                    <td>' .$row['resOK'] .'</td>
                    <td> <img width="80px" height="80px" src="'.$row['imagen'].'" </td>
                </tr>';

        echo '</table>';


        mysqli_close($mysqli);


      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
