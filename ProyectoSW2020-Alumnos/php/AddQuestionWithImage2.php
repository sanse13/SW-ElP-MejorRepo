<?php
    session_start();
    if(isset($_SESSION['tipo']) && ($_SESSION['tipo'] == 'alumno' || $_SESSION['tipo'] == 'profesor')){
      header("Cache-Control: no-store");
      $mensajeInsertarEnBD = insertarPreguntaBD();
      $mensajeInsertarEnXML = insertarPreguntaXML();

      echo($mensajeInsertarEnBD);
      echo($mensajeInsertarEnXML);
    }else{
        echo "<script>
              window.location.href='Layout.php';
            </script>";

    }
?>
<?php


    function insertarPreguntaBD(){
      include "DbConfig.php";
      $mysqli = new mysqli($server, $user, $pass, $basededatos);

      if (!$mysqli){
        return "<p id='msgBD' style='color:red;'> Ha ocurrido un error inesperado </p>";
      }


      $email = $_POST['email'];
      $pregunta = $_POST['pregunta'];
      $resCorrecta = $_POST['resCorrecta'];
      $resIncorrecta1 = $_POST['resIncorrecta1'];
      $resIncorrecta2 = $_POST['resIncorrecta2'];
      $resIncorrecta3 = $_POST['resIncorrecta3'];
      $tema = $_POST['tema'];
      $complejidad = $_POST['complejidad'];

      $emailS = $mysqli->real_escape_string($email);
      $preguntaS = $mysqli->real_escape_string($pregunta);
      $resCorrectaS =$mysqli->real_escape_string($resCorrecta);
      $resIncorrecta1S = $mysqli->real_escape_string($resIncorrecta1);
      $resIncorrecta2S = $mysqli->real_escape_string($resIncorrecta2);
      $resIncorrecta3S = $mysqli->real_escape_string($resIncorrecta3);
      $temaS = $mysqli->real_escape_string($tema);
      $complejidadS = $mysqli->real_escape_string($complejidad);

      if($emailS!=$email || $preguntaS!=$pregunta || $resCorrectaS!=$resCorrecta || $resIncorrecta1S != $resIncorrecta1 || $resIncorrecta2S != $resIncorrecta2 || $resIncorrecta3S != $resIncorrecta3 || $temaS!=$tema || $complejidadS!=$complejidad){
        return "<p id='msgBD' style='color:red;'> El formulario contiene caracteres no validos </p>";
      }



      // Validacion de tipo de usuario
      $esAlumno = preg_match("/^[a-z]+\\d{3}@ikasle\.ehu\.(eus|es)$/", $email);
      $esProfesor = preg_match("/^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/", $email);
      if(!($esAlumno || $esProfesor)){
        return "<p id='msgBD' style='color:red;'> El email no es valido </p>";
      }

      //Validacion campos vacios
      if($email=="" || $pregunta=="" || $resCorrecta=="" || $resIncorrecta1=="" || $resIncorrecta2=="" || $resIncorrecta3=="" || $tema==""){
        return "<p id='msgBD' style='color:red;'> No puedes haber ningun campo vacio </p>";
      }

      if(!empty($_FILES['imagenPregunta']['tmp_name'])){

        $path = "../images/preguntas/" . strtotime('now') . "_" . $_FILES['imagenPregunta']['name'];

        if(!move_uploaded_file($_FILES['imagenPregunta']['tmp_name'], $path)) {
          return "<p id='msgBD' style='color:red;'>Error al subir la imagen, porfavor introduzca la pregunta de nuevo </p>";

        }

      }else{
        $path = "../images/noimage.png";
      }

      $query = "INSERT INTO Preguntas(correo, enunciado, resOK, resF1, resF2, resF3, tema, complejidad, imagen)
              VALUES (?,?,?,?,?,?,?,?,?)";


      $stmt = $mysqli->prepare($query);

      $stmt->bind_param('sssssssss', $emailS, $preguntaS, $resCorrectaS, $resIncorrecta1S, $resIncorrecta2S, $resIncorrecta3S, $temaS, $complejidadS, $path);

      if(!$stmt->execute()){
        return "<p id='msgBD' style='color:red'>  Ha ocurrido un error inesperado </p>";
      }

      $mysqli->close();

      return "<p id='msgBD'> La pregunta se guarda correctamente en la Base de Datos</p><br>";

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
      $urlBack = "?email=".$email;

      if($email=="" || $pregunta=="" || $resCorrecta=="" || $resIncorrecta1=="" || $resIncorrecta2=="" || $resIncorrecta3=="" || $tema==""){
        return "";;
      }

      /* cargar fichero Questions.xml y leerlo */
      $questions_path = "../xml/Questions.xml";
      if(!file_exists($questions_path)){
        return "<p id='msgXML'style='color:red;'>Error: No se puede insertar en el xml </p> <br>";

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

      return "<p id='msgXML'> La pregunta se ha guardado correctamente en el fichero XML  </p> <br>";


    }


?>