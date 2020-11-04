<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div >
      <?php

        $questions_path = "../xml/Questions.xml";
        $xml = simplexml_load_file($questions_path) or die("Error: No se puede abrir el xml ");
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

        /*

        echo '<table border=1 id="showQuestionTable"><tr> <th> AUTOR </th> <th> ENUNCIADO </th> <th> RESPUESTA </th> <th> IMAGEN </th> </tr>';

        while ($row = mysqli_fetch_array($res))
          echo '<tr>
                    <td>' .$row['correo'].'</td>
                    <td>' .$row['enunciado'].'</td>
                    <td>' .$row['resOK'] .'</td>
                    <td> <img width="80px" height="80px" src="'.$row['imagen'].'" </td>
                </tr>';

        echo '</table>'; */

      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
