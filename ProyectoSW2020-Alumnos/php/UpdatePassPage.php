<?php
    session_start();
    if (!isset($_SESSION['codigo']) || !isset($_SESSION['mailRecover'])){
        echo '<script>alert("No se puede acceder al contenido de esta pagina.");</script>';
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
  <script src="../js/UpdatePass.js"></script>
  <script src="../js/VerifyPassUpdate.js"></script>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <section class="main" id="s1">
    <div>
    

        <form method="post" id="form" name="form">
        <h2>Restablecimiento de contraseña </h2><br>
            <p>Codigo proporcionado: </p><input type="text" id="codigo" name="codigo"/><br><br>
            <p>Contraseña:</p><input type="password" id="password" name="password"/><br><br>
            <p>Repetir contraseña: </p><input type="password" id="repPassword" name="repPassword"/><br><br>
            <p><input type="button" id="actualizar" name="actualizar" value="Actualizar contraseña"/>
            <input type="reset" id="reset" name="reset" value="Reset"/></p>
            <label id="res"></label>
            <input type="hidden" id="resPass">


        </form>
        





    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>