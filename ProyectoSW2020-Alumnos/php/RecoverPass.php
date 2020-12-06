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
  <script src="../js/RecoverPass.js"></script>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <section class="main" id="s1">
    <div>
    

        <form method="post" id="form" name="form">
        <h2>Restablecimiento de contraseña </h2><br>
        <h3>El restablecimiento debe efectuarse desde el mismo dispositivo</h3><br>
            <p>Introduce tu email: <input type="text" id="email" name="email" size="28"/></p><br>
            <input type="button" id ="restablecer" name="restablecer" value="Enviar solicitud">
            <input type="reset" id="reset" name="reset" value="Reset"><br><br>
            <label id="emailValido"></label>

        </form>
        





    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>