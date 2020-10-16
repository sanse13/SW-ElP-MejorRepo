
<?php include "DbConfig.php"?>
<?php 
    

    /* establece conexion con la BD */

    function setConnection(){
     
      /*$dbLink = "localhost";
      $dbUser = "id14922465_quizdbsw12";
      $dbPass = "mejordbSW12!";
      $dbName = "id14922465_quizdb";*/
      
      $mysqli = mysqli_connect($dbLink , $dbUser, $dbPass, $dbName);
      //$mysqli = mysqli_connect($server , $user, $pass, $basededatos);

      if (!$mysqli){
        die("Fallo al conectar a MySQL: ".mysqli_connect_error());
        //echo 'Fallo al conectar';
      }

      $test = "Conexion establecida";
      //echo $test;
      return $mysqli;
    }

    /* inserta la tupla en la tabla Preguntas */

    function insertData(){
      $link = setConnection();

      /* INSERTAMOS TUPLA */

      /* probando sin el isset funciona */
      //if (isset($_POST['submit'])){

        $sql = "INSERT INTO Preguntas(correo, enunciado, resOK, resF1, resF2, resF3, tema, complejidad) VALUES ('$_POST[email]', 
        '$_POST[pregunta]', '$_POST[resCorrecta]', '$_POST[resIncorrecta1]', '$_POST[resIncorrecta2]', '$_POST[resIncorrecta3]', 
        '$_POST[tema]', '$_POST[complejidad]')";
        
        /* compruebo si ha habido error de insercion en la BD */

        if (!mysqli_query($link, $sql)){
            die('Error '.mysqli_error($link));
        } else echo "Pregunta añadida a la Base de Datos con éxito !";

        mysqli_close($link);
      //} else echo 'Ha fallado';
    }


    /* obtiene en un array los datos de la tabla Preguntas de nuestra BD */

    function showDataTable(){

        $link = setConnection();
        $query = "SELECT * FROM Preguntas";

        /* el objeto res contiene los datos de la tabla Preguntas */ 
        $res = mysqli_query($link, $query);

        echo '<table border=1><tr> <th> AUTOR </th> <th> ENUNCIADO </th> <th> RESPUESTA </th> </tr>';
        
        /* en este bucle recorro la info mientras lo inserto en una tabla */
        while ($row = mysqli_fetch_array($res))
          echo '<tr> <td>' .$row['correo'].'</td> <td>' .$row['enunciado'].'</td> <td>' .$row['resOK'] .'</td></tr>';
        
        echo '</table>';
        mysqli_close($link);
    }

?>

