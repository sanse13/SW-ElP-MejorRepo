<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="../js/ValidateFieldsQuestion.js"></script>
  <script src="../js/ShowImageInForm.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DataBaseConnection.php' ?>
  <section class="main" id="s1">
    <form id='fquestion' name='fquestion' action='AddQuestion.php' method="post">

      <p><label for="email"> Direccion de correo:</label>
      <input type="text" size="50" id="email" name="email"></p>

      <p><label for="pregunta"> Enunciado de la Pregunta:</label>
      <input type="text" size="44" id="pregunta" name="pregunta"></p>

      <p><label for="resCorrecta"> Respuesta Correcta: </label>
      <input type="text" size="50" id="resCorrecta" name="resCorrecta"></p>

      <p><label for="resIncorrecta1"> Respuesta Incorrecta: </label>
      <input type="text" size="48" id="resIncorrecta1" name="resIncorrecta1"></p>

      <p><label for="resIncorrecta2"> Respuesta Incorrecta:</label>
      <input type="text" size="48"id="resIncorrecta2" name="resIncorrecta2"></p>

      <p><label for="resIncorrecta3"> Respuesta Incorrecta: </label>
      <input type="text" size="48" id="resIncorrecta3" name="resIncorrecta3"></p>

      <p><label for="tema"> Tema: </label>
      <input type="text" size="64" id="tema" name="tema"></p>

      <p><label for="complejidad"> Complejidad: </label>
      <input type="text" size="20" id="complejidad" name="complejidad"></p>

      <br><input type="file" name="imagenPregunta" id="subirImagen" accept=".jpeg,.jpg,.png" onChange="showImage()"/>


      <br><br><input type="submit" name="submit" value="Enviar Pregunta" id="enviar" onClick="return validarFormulario();"><br><br>

    </form>
  </section>
 
  <?php include '../html/Footer.html' ?>
</body>
</html>
