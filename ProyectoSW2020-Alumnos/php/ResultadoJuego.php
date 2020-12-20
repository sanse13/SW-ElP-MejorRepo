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

        <form method="post">
        
        <?php 


            echo "<p style='color:blue'>El resultado obtenido es: ".$_SESSION['correctas']." correctas y ".$_SESSION['incorrectas']." incorrectas</p>";
            session_unset();
            session_destroy(); 
        
        ?>

        <input type="button" id="inicio" name="inicio" value="Volver a la página principal">
            

        </form>

        </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<script>
    $(document).ready(function (){
        $("#inicio").click(function(){
            window.location.href="Layout.php";
        });

    });
</script>