<script src="../js/DecreaseCounterAjax.js"></script>
<script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../js/ShowImageInForm.js"></script>
<script src="../js/ShowQuestionsAjax.js"></script>
<script src="../js/AddQuestionsAjax.js"></script>
<script src="../js/CountQuestions.js"></script>
<script src="../js/CountUsersAjax.js"></script>
<?php
    error_reporting(0);
    if(isset($_SESSION['email'])){

        $emailString = '"'.$_SESSION['email'].'"';
        $email = $_SESSION['email'];
        $tipoUser = $_SESSION['tipo'];
        $imagen =  $_SESSION['imagen'];

        echo "<div id='page-wrap'>
                <header class='main' id='h1'>
                    <span class='right'><a href='#' onclick='decreaseCounter($emailString)'>Logout</a></span>
                    <span class='right'> $email</span>
                    <img src='$imagen' width='50px' height='50px'>

                </header>";

        echo " <nav class='main' id='n1' role='navigation'>
                  <span><a href='Layout.php'>Inicio</a></span>";


        if($tipoUser == "profesor"){
          echo "<span><a href='HandlingQuizesAjax.php'> Gestionar preguntas </a></span>
                <span><a href='GetQuestionData.php'> Obtener Datos Pregunta </a></span>";
        }

        if($tipoUser == "alumno"){
          echo "<span><a href='HandlingQuizesAjax.php'> Gestionar preguntas </a></span>";
        }


        if($tipoUser == "administrador"){
          echo " <span><a href='HandlingAccounts.php'> Gestionar cuentas </a></span>";
        }


        echo "<span><a href='Credits.php'>Creditos</a></span>
              </nav>";



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