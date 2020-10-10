<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="../js/ShowImageInForm.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <form id='fquestion' name='fquestion' action=’AddQuestion.php’ method="GET">

      <label for="email"> Direccion de correo:</label>
      <input type="email" pattern='^([a-z]+\d{3}@ikasle\.ehu\.(eus|es))|(([a-z]+\.)?[a-z]+@ehu\.(eus|es))$' size="50" id="email" name="email" required ><br><br>

      <label for="pregunta"> Enunciado de la Pregunta:</label>
      <input type="text" size="44" id="pregunta" name="pregunta" minlength="10" required><br><br>

      <label for="resCorrecta"> Respuesta Correcta: </label>
      <input type="text" size="50" id="resCorrecta" name="resCorrecta" required><br><br>

      <label for="resIncorrecta1"> Respuesta Incorrecta: </label>
      <input type="text" size="48" id="resIncorrecta1" name="resIncorrecta1" required><br><br>

      <label for="resIncorrecta2"> Respuesta Incorrecta:</label>
      <input type="text" size="48"id="resIncorrecta2" name="resIncorrecta2" required><br><br>

      <label for="resIncorrecta1"> Respuesta Incorrecta: </label>
      <input type="text" size="48" id="resIncorrecta3" name="resIncorrecta3" required><br><br>

      <label for="tema"> Tema: </label>
      <input type="text" size="64" id="tema" name="tema" required><br><br>

      <label for="complejidad"> Complejidad: </label>
      <input type="number" size="20" id="complejidad" name="complejidad" min="1" max="3" required><br><br>

      <input type="file" name="imagenPregunta" id="subirImagen" accept=".jpeg,.jpg,.png" onChange="showImage()"/><br><br>

      <input type="submit" value="Enviar Pregunta" id="enviar"><br><br>

    </form>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
