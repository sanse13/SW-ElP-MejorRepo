<?php
    session_start();
    if($_SESSION['tipo']!='profesor' && $_SESSION['tipo']!='alumno'){
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
  <section class="main" id="s1">
    <form id='fquestion' name='fquestion'>

      <p style="background-color:#ff763a;" id="contadorUsuarios"></p>
      <p style="background-color:#62a2ff;" id="contadorQuestions"></p><br>


      <p><label for="email"> Direccion de correo:</label>
      <input type="text" size="50" id="email" name="email" value=<?=$email?> ></p>

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


      <br><br><input type="button" name="submit" value="Insertar Pregunta" id="enviar" onClick="addQuestion()">
      <input type="button" name="verPreguntas" value="Ver Preguntas" id="verPreguntas" onClick="showQuestions()">
      <input type="button" name="resetForm" value="Reset Form" id="resetForm" onClick="formReset()"><br><br>
      <div id="res"></div><br>
      <table class="questionsTable"></table><br><br>


    </form>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>