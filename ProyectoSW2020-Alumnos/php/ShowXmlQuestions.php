<?php
  echo "<script>
        window.location.href='Layout.php';
      </script>";
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <?php
    $errorShowQuestions = showQuestions();
    if ($errorShowQuestions != "") {
      echo($errorShowQuestions);
    }
    ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
<?php
  function showQuestions(){

        $questions_path = "../xml/Questions.xml";
        if(!file_exists($questions_path)){
          return "<p style='color:red;'>Error: No se puede insertar en el xml </p> <br>";

        }
        $xml = simplexml_load_file($questions_path);
        // crear una tabla con el autor, enunciado y la respuesta correcta

        echo '<table border=1 id="showQuestionTable"><tr> <th> AUTOR </th> <th> ENUNCIADO </th> <th> RESPUESTA CORRECTA</th> </tr>';

        foreach ($xml->children() as $assessmentItem) {
            $email = $assessmentItem['author'];
            foreach ($assessmentItem->children() as $child) {
              if ($child->getName() == 'itemBody'){
                //echo $child->p . '<br>';
                $enunciado = $child->p;
              }
              if ($child->getName() == 'correctResponse'){
                  $resCorrecta = $child->response;
              }
            }

            echo '<tr>
                    <td>' .$email .'</td>
                    <td>' .$enunciado . '</td>
                    <td>' .$resCorrecta . '</td>

                </tr>';
          }


        echo '</table>';

        return "";

  }
?>
