<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <?php
    $mensajeInsertarEnBD = insertarPreguntaBD();
    $mensajeInsertarEnXML = insertarPreguntaXML();

    echo($mensajeInsertarEnBD);
    echo($mensajeInsertarEnXML);

    ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
<?php


    function insertarPreguntaBD(){
      include "DbConfig.php";

      $email = $_POST['email'];
      $pregunta = $_POST['pregunta'];
      $resCorrecta = $_POST['resCorrecta'];
      $resIncorrecta1 = $_POST['resIncorrecta1'];
      $resIncorrecta2 = $_POST['resIncorrecta2'];
      $resIncorrecta3 = $_POST['resIncorrecta3'];
      $tema = $_POST['tema'];
      $complejidad = $_POST['complejidad'];
      $urlBack = "?email=".$_GET['email'];


      // Validacion de tipo de usuario
      $esAlumno = preg_match("/^[a-z]+\\d{3}@ikasle\.ehu\.(eus|es)$/", $email);
      $esProfesor = preg_match("/^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/", $email);
      if(!($esAlumno || $esProfesor)){
        return "<p style='color:red;'> El email no es valido </p> <br> <a href='QuestionFormWithImage.php".$urlBack."'> Volver a la pagina principal </a>";
      }

      //Validacion campos vacios
      if($email=="" || $pregunta=="" || $resCorrecta=="" || $resIncorrecta1=="" || $resIncorrecta2=="" || $resIncorrecta3=="" || $tema==""){
        return "<p style='color:red;'> No puedes haber ningun campo vacio </p> <br> <a href='QuestionFormWithImage.php".$urlBack."'> Volver a la pagina principal </a>";
      }


      $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

      if (!$mysqli){
        return "<p style='color:red;'> Ha ocurrido un error inesperado </p> <br> <a href='QuestionFormWithImage.php".$urlBack."'> Volver a la pagina principal </a>";
      }

      if(!empty($_FILES['imagenPregunta']['tmp_name'])){

        $path = "../images/preguntas/" . strtotime('now') . "_" . $_FILES['imagenPregunta']['name'];

        if(!move_uploaded_file($_FILES['imagenPregunta']['tmp_name'], $path)) {
          return "<p style='color:red;'>Error al subir la imagen, porfavor introduzca la pregunta de nuevo </p> <br> <a href='QuestionFormWithImage.php".$urlBack."'> Insertar pregunta </a>";

        }

      }else{
        $path = "../images/noimage.png";
      }

      $query = "INSERT INTO Preguntas(correo, enunciado, resOK, resF1, resF2, resF3, tema, complejidad, imagen)
              VALUES ('$email', '$pregunta', '$resCorrecta', '$resIncorrecta1', '$resIncorrecta2', '$resIncorrecta3', '$tema', '$complejidad', '$path')";

      if(!mysqli_query($mysqli, $query)){
        return "<p style='color:red;'>  Ha ocurrido un error inesperado </p> <br> <a href='QuestionFormWithImage.php".$urlBack."'> Volver a la pagina principal </a>";
      }

      mysqli_close($mysqli);

      return "<p> La pregunta se guarda correctamente en la Base de Datos</p><br>";

    }

    function insertarPreguntaXML(){

      $email = $_POST['email'];
      $pregunta = $_POST['pregunta'];
      $resCorrecta = $_POST['resCorrecta'];
      $resIncorrecta1 = $_POST['resIncorrecta1'];
      $resIncorrecta2 = $_POST['resIncorrecta2'];
      $resIncorrecta3 = $_POST['resIncorrecta3'];
      $tema = $_POST['tema'];
      $complejidad = $_POST['complejidad'];
      $urlBack = "?email=".$_GET['email'];


      /* cargar fichero Questions.xml y leerlo */
      $questions_path = "../xml/Questions.xml";
      if(!file_exists($questions_path)){
        return "<p style='color:red;'>Error: No se puede insertar en el xml </p> <br>";

      }
      $xml = simplexml_load_file($questions_path);

      $new_assesment = $xml->addChild('assessmentItem');
      $new_assesment -> addAttribute('subject', $tema);
      $new_assesment -> addAttribute('author', $email);
      $nueva_pregunta = $new_assesment -> addChild('itemBody');
      $nueva_pregunta -> addChild('p', $pregunta);
      $correct_response = $new_assesment -> addChild('correctResponse');
      $correct_response -> addChild('response', $resCorrecta);
      $respuestas_incorrectas = $new_assesment -> addChild('incorrectResponses');
      $respuestas_incorrectas -> addChild('response', $resIncorrecta1);
      $respuestas_incorrectas -> addChild('response', $resIncorrecta2);
      $respuestas_incorrectas -> addChild('response', $resIncorrecta3);

      $xml->asXML('../xml/Questions.xml');

      return 'La pregunta se ha guardado correctamente en el fichero XML <br>';

    }


?>