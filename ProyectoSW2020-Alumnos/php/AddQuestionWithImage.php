<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

			<?php
        include "DbConfig.php";

        $email = $_POST['email'];
        $pregunta = $_POST['pregunta'];
        $resCorrecta = $_POST['resCorrecta'];
        $resIncorrecta1 = $_POST['resIncorrecta1'];
        $resIncorrecta2 = $_POST['resIncorrecta2'];
        $resIncorrecta3 = $_POST['resIncorrecta3'];
        $tema = $_POST['tema'];
        $complejidad = $_POST['complejidad'];
        $urlBack = '?email='.$_GET['email'];

        // Validacion de datos
        $esAlumno = preg_match("/^[a-z]+\\d{3}@ikasle\.ehu\.(eus|es)$/", $email);
        $esProfesor = preg_match("/^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/", $email);
        if(!($esAlumno || $esProfesor)){
          exit('<p style="color:red;"> El email no es valido </p> <br> <a href="Layout.php"'.$urlBack.'> Volver a la pagina principal </a>');
        }

        if($email=="" || $pregunta=="" || $resCorrecta=="" || $resIncorrecta1=="" || $resIncorrecta2=="" || $resIncorrecta3=="" || $tema==""){
          echo($urlBack);
          echo("<p style='color:red;'> No puedes haber ningun campo vacio </p> <br>
           <a href='Layout.php'".$urlBack."> Volver a la pagina principal </a>");
        }


        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"'.$urlBack.'> Volver a la pagina principal </a>');
        }

        if(!empty($_FILES['imagenPregunta']['tmp_name'])){

          $path = "../images/preguntas/" . strtotime('now') . "_" . $_FILES['imagenPregunta']['name'];

          if(!move_uploaded_file($_FILES['imagenPregunta']['tmp_name'], $path)) {
              exit('<p style="color:red;"> Error al subir la imagen, porfavor introduzca la pregunta de nuevo </p> <br> <a href="QuestionFormWithImage.php"'.$urlBack.'> Insertar pregunta </a>');
          }

        }else{
          $path = "../images/noimage.png";
        }

        $query = "INSERT INTO Preguntas(correo, enunciado, resOK, resF1, resF2, resF3, tema, complejidad, imagen)
                VALUES ('$email', '$pregunta', '$resCorrecta', '$resIncorrecta1', '$resIncorrecta2', '$resIncorrecta3', '$tema', '$complejidad', '$path')";

        if(!mysqli_query($mysqli, $query)){
          exit('<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"'.'?email='.$urlBack.'> Volver a la pagina principal </a>');
        }

        mysqli_close($mysqli);

        echo "La pregunta se guarda correctamente <br>";

      ?>
      <br>

    <a href=<?='ShowQuestionsWithImage.php?email='.$_GET['email'] ?>>Ver preguntas de la DataBase</a>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
