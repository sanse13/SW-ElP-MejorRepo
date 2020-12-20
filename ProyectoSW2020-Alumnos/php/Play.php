<?php
    session_start();
    $_SESSION['correctas'] = 0;
    $_SESSION['incorrectas'] = 0;
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
        <h2> Let's Play ! </h2><br>
        <h3> Elige uno de los siguientes temas para jugar: </h3><br>

        <?php
            $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

            /* comprobar la conexión */
            if (!$mysqli) {
                exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>');
            }

            $query = "SELECT DISTINCT tema FROM Preguntas";
            $res = mysqli_query($mysqli, $query);
            
            while ($row = mysqli_fetch_array($res))
                echo "
                
                    <input type='radio' id='tema' name='tema' value='".$row['tema']."' onclick='activar()'>
                    <label id='tema' for='".$row['tema']."'>".$row['tema']."</label><br><br>
                
                ";


            mysqli_close($mysqli);

        ?>

        <input type="submit" id="jugar" value="A jugar" disabled>
            

        </form>

        </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<script>

function activar(){
    var bt = document.getElementById('jugar');
    bt.disabled = false;
}

</script>