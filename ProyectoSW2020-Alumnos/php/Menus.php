
<?php

    if(isset($_GET['email'])){


      include "DbConfig.php";

        $urlEmail = "?email=" . $_GET['email'];
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        $query = "SELECT Imagen FROM Usuarios WHERE Email = '$_GET[email]'";
        $res = mysqli_query($mysqli, $query);
        $path = mysqli_fetch_array($res);

        echo("
          <div id='page-wrap'>
          <header class='main' id='h1'>
              <span class='right'><a href='LogOut.php'>Logout</a></span>
              <span class='right'>". $_GET['email']."</span>
              <img src='" . $path['Imagen'] . "' width='50px' height='50px'>

          </header>

          <nav class='main' id='n1' role='navigation'>
            <span><a href='Layout.php".$urlEmail. "'>Inicio</a></span>
            <span><a href='QuestionFormWithImage.php".$urlEmail. "'> Insertar Pregunta</a></span>
            <span><a href='ShowQuestionsWithImage.php".$urlEmail. "'> Ver Preguntas</a></span>
            <span><a href='ShowXmlQuestions.php".$urlEmail. "'> Ver Preguntas XML</a></span>
            <span><a href='Credits.php".$urlEmail. "'>Creditos</a></span>
          </nav> ");




    }else{


      echo("
      <div id='page-wrap'>
      <header class='main' id='h1'>
        <span class='right'><a href='SignUp.php'>Registro</a></span>
          <span class='right'><a href='LogIn.php'>Login</a></span>
          <span class='right'>Anonimo</span>
          <span class='right' style='display:none;'><a href='/logout'>Logout</a></span>
          <img src='../images/usuarios/anonimo.png' width='50px' height='50px'>


      </header>

      <nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php'>Inicio</a></span>
        <span><a href='Credits.php'>Creditos</a></span>
      </nav> ");

    }


?>