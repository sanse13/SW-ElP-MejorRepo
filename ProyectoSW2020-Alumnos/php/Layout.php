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
  <section class="main" id="s1">


    <div>

      <h2>Quiz: el juego de las preguntas</h2>

      
      
      

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




