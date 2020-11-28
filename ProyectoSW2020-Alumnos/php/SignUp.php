<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php';

  require_once('../lib/nusoap.php');
  require_once('../lib/class.wsdlcache.php');


  ?>
  <section class="main" id="s1">
    <div>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../js/ShowImageInForm.js"></script>
    <script src="../js/ClientVerifyEnrollmentAjax.js"></script>
    <script src="../js/ClientVerifyPassAjax.js"></script>

        <form id='fquestion' name='login' action='' method="post" enctype="multipart/form-data">

            <span>
                <input type="radio" id="rdbProfesor" name="tipoUser" value="profesor">
                <label for="rdbProfesor">Profesor</label>
                <input type="radio" id="rbtAlumno" name="tipoUser" value="alumno" checked>
                <label for="rbtAlumno">Alumno</label>
            </span><br><br>


            <p><label for="email"> Direccion de correo:</label>
            <input type="text" size="50" id="email" name="email" ></p>



            <p><label for="nombeYApellidos"> Nombre y Apellidos:</label>
            <input type="text" size="44" id="nombeYApellidos" name="nombeYApellidos"></p>

            <p><label for="password"> Password: </label>
            <input type="password" size="50" id="password" name="password" ></p>






            <p><label for="repPassword"> Repetir Password: </label>
            <input type="password" size="50" id="repPassword" name="repPassword"></p><br>

            <br><input type="file" name="imagenUser" id="subirImagen" accept=".jpeg,.jpg,.png" onChange="showImage()"/>

            <br><br><input type="submit" name="submit" value="Registrar" id="enviar" ><br><br>

        </form>



        <?php

            if(isset($_POST['submit'])){


                $error = registrar();

                if($error == ""){
                    echo "<script>window.location.href='LogIn.php'</script>";
                }else{
                    echo ('<p style="color:red;">'. $error .'</p> <br>');
                }


            }

        ?>


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
<?php
    function registrar(){

        include "DbConfig.php";

        foreach($_POST as $nombre_campo => $valor){

            $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";

            if($nombre_campo != "submit" && $valor=="") return('<p style="color:red;"> No puede haber campos vacios </p> <br>');
            eval($asignacion);
        }

        //Validacion del email
        $esProfesor = preg_match("/^([a-z]+\.)?[a-z]+@ehu\.(eus|es)$/", $email);
        $esAlumno = preg_match("/^[a-z]+\\d{3}@ikasle\.ehu\.(eus|es)$/",$email);

        //Validacion de profesor
        if($tipoUser == "profesor" &&  !$esProfesor){
            return '<p style="color:red;"> El email no tiene formato profesor</p> <br>';
        }

        //Validacion de alumno
        if($tipoUser == "alumno" &&  !$esAlumno){
            return'<p style="color:red;"> El email no tiene formato alumno</p> <br>';
        }

        //Validacion de nombre y apellidos
        if(str_word_count($nombeYApellidos) < 2) return'<p style="color:red;"> El nombre y apellido son incorrectos </p> <br>';

        //Validacion de password
        if($password != $repPassword) return '<p style="color:red;"> El password debe coincidir </p> <br>';

        //Validacion de long de password
        if(strlen($password) < 6) return '<p style="color:red;"> La longitud del password debe ser mayor que 5 </p> <br>';



        $mysqli = new mysqli($server, $user, $pass, $basededatos);

        if (!$mysqli){
            return '<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>';
        }

        $email = $mysqli->real_escape_string($email);

        $stmt = $mysqli->prepare("SELECT Email FROM Usuarios WHERE Email = ?");

        $stmt->bind_param('s', $email);

        $stmt->execute();

        $checkEmail = $stmt->get_result();

        if ($checkEmail->num_rows > 0)  exit('<p style="color:red;">Este email ya esta registrado</p> <br>');

        if(!empty($_FILES['imagenUser']['tmp_name'])){

            $path = "../images/usuarios/" . strtotime('now') . "_" . $_FILES['imagenUser']['name'];

            if(!move_uploaded_file($_FILES['imagenUser']['tmp_name'], $path)) {
                return '<p style="color:red;"> Error al subir la imagen</p> <br>';
            }

        }else{
            $path = "../images/noimage.png";
        }


        $hashPass = password_hash($password, PASSWORD_DEFAULT);

        $email = $mysqli->real_escape_string($email);
        $tipoUser = $mysqli->real_escape_string($tipoUser);
        $nombeYApellidos = $mysqli->real_escape_string($nombeYApellidos);
        $path = $mysqli->real_escape_string($path);


        $query = "INSERT INTO Usuarios(Email, TipoUser, NombreApellidos, Pass, Imagen, Estado)
                VALUES (?,?,?,?,?,'activo')";

        $stmt = $mysqli->prepare($query);

        $stmt->bind_param('sssss', $email, $tipoUser, $nombeYApellidos, $hashPass, $path);



        if(!$stmt->execute()){
            return '<p style="color:red;"> Ha ocurrido un error inesperado </p> <br> <a href="Layout.php"> Volver a la pagina principal </a>';
        }



        $mysqli->close();

        return "";

    }

?>
