<?php
  session_start();
  if($_SESSION['tipo']!='profesor'){
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
  <script src="../js/GetQuestionAjax.js"></script>
  <section class="main" id="s1">
    <form id='fquestion' name='fquestion'  method="post" enctype="multipart/form-data">

      <label> Id de Pregunta </label>
      <input type='text' id='idPregunta' name='idPregunta'/>
      <input type='button' id='verDatos' value='Mostrar Pregunta'/><br>
      <label id='datos'></label>

    </form>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>