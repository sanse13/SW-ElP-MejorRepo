<?php
  session_start();
    unset($_SESSION['correctas']);
    unset($_SESSION['incorrectas']);
 
?>
<!DOCTYPE html>
<style>

table.center {
  margin-left: auto; 
  margin-right: auto;
}
</style>

<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">


    <div>

      <h2>Quiz: el juego de las preguntas</h2><br>
      <h3> Top 10 Quizers </h3>
      <br>
      

      <?php
        /* mostrar los top 10 quizers en base al porcentaje de acierto*/
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        $query = "SELECT * FROM Nicks ORDER BY Acierto DESC LIMIT 10";
        $res = mysqli_query($mysqli, $query);

        echo "<table class='center' border=1> <tr> <th> Nick </th> <th> Acertadas </th> <th> Falladas </th> </tr>";

        while ($row = mysqli_fetch_array($res)){
          
          echo "
          
          <tr>
            <td>".$row['Nick']."</td>
            <td>".$row['Acertadas']."</td>
            <td>".$row['Falladas']."</td>


          </tr>
          
          ";

        }

        echo "</table>";

      ?>

      
      
      

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php

  if(isset($_SESSION['email'])){
   /*echo("
      <script>
        window.location.href='Layout.php';
      </script>
    ");*/

  }


?>




