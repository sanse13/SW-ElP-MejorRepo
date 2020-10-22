<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DataBaseConnection.php' ?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

			<?php


        include "DbConfig.php";
              
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        if (!$mysqli){
          die("Fallo al conectar a MySQL: ".mysqli_connect_error());
          //echo 'Fallo al conectar';
        }
    
        echo 'Conexion establecida <br>';


        if(!empty($_FILES['imagenPregunta']['tmp_name'])){
          $path = "../images/preguntas/" . strtotime('now') . "_" . $_FILES['imagenPregunta']['name'];

          if(move_uploaded_file($_FILES['imagenPregunta']['tmp_name'], $path)) {
            echo "The file ".  basename( $_FILES['imagenPregunta']['name']).
            " has been uploaded <br>";
          } else{
              echo "There was an error uploading the file, please try again!";
          }

        }else{
          $path = "../images/foto2.png";
        }

        $email = $_POST['email'];
        $pregunta = $_POST['pregunta'];
        $resCorrecta = $_POST['resCorrecta'];
        $resIncorrecta1 = $_POST['resIncorrecta1'];
        $resIncorrecta2 = $_POST['resIncorrecta2'];
        $resIncorrecta3 = $_POST['resIncorrecta3'];
        $tema = $_POST['tema'];
        $complejidad = $_POST['complejidad'];

        $query = "INSERT INTO Preguntas(correo, enunciado, resOK, resF1, resF2, resF3, tema, complejidad, imagen)
                VALUES ('$email', '$pregunta', '$resCorrecta', '$resIncorrecta1', '$resIncorrecta2', '$resIncorrecta3', '$tema', '$complejidad', '$path')";

        if(!mysqli_query($mysqli, $query)){
          die('Error: ' . mysqli_error($mysqli));
        }

        echo "OK";

        mysqli_close($mysqli);


      ?>
      <br>
  <a href="ShowQuestionsWithImage.php">Ver preguntas de la DataBase</a> 


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
