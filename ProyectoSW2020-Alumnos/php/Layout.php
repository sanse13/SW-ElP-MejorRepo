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

  if(isset($_GET['logout'])){
    echo("
      <script>
        alert('Hasta la proxima:".$_GET['logout']."');
        window.load = 'Layout.php';
      </script>
    ");

  }

  if(isset($_GET['nombre'])){
    echo("
      <script>
        alert('Bienvenido:".$_GET['nombre']."');
      </script>
    ");

  }


?>