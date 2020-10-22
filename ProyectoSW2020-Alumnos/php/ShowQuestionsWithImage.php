<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php

        include "DbConfig.php";
                      
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          die("Fallo al conectar a MySQL: ".mysqli_connect_error());
          //echo 'Fallo al conectar';
        }

        echo 'Conexion establecida';

        $query = "SELECT correo, enunciado, resOK, imagen  FROM Preguntas";

        /* el objeto res contiene los datos de la tabla Preguntas */
        $res = mysqli_query($mysqli, $query);

        echo '<table border=1><tr> <th> AUTOR </th> <th> ENUNCIADO </th> <th> RESPUESTA </th> <th> IMAGEN </th> </tr>';

        /* en este bucle recorro la info mientras lo inserto en una tabla */
        while ($row = mysqli_fetch_array($res))
          echo '<tr>
                    <td>' .$row['correo'].'</td>
                    <td>' .$row['enunciado'].'</td>
                    <td>' .$row['resOK'] .'</td>
                    <td> <img width="100px" height="100px" src="'.$row['imagen'].'" </td>
                </tr>';
  
        echo '</table>';


        mysqli_close($mysqli);


      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
