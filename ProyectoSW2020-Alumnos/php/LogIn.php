<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <meta name="google-signin-client_id" content="841174584082-uaggu8g2ogooj7fjemo2tuk9tkn1su6h.apps.googleusercontent.com">

  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="../js/GoogleUserInfo.js"></script>
  <section class="main" id="s1">

    <div>

        <form method="post">
        <h2>Identificación de usuario </h2>
            <p> Email   : <input type="email"  name="email" size="21" value="" />
            <p> Password: <input type="password"  name="pass" size="21" value="" />
            <p> <input id="input_2" type="submit" name="submit" value="Login" /><br><br>
            <p> <a href="RecoverPass.php">Restablecer contraseña</a></p><br><br>
            <div align='center' id='google' class='g-signin2' data-onsuccess='onSignIn'></div>  

        </form>

        <?php
                include "DbConfig.php";
                include "IncreaseGlobalCounter.php";
                include "ComprobarUsuario.php";


                if(isset($_POST['submit'])){

                    if(esUsuarioLogeado($_POST['email'])){
                        exit ('<p style="color:red;"> El usuario ya esta logeado</p> <br>');
                    }

                    $mysqli = new mysqli($server, $user, $pass, $basededatos);

                    if(!$mysqli) {
                        exit ('<p style="color:red;"> Error inesperado </p> <br>');
                    }

                    $pass = $_POST['pass'];
                    $email = $mysqli->real_escape_string($_POST['email']);

                    $stmt = $mysqli->prepare("SELECT * FROM Usuarios WHERE Email = ?");

                    $stmt->bind_param('s', $email);

                    $stmt->execute();

                    $res = $stmt->get_result();
                    if(!$res) {
                        exit ('<p style="color:red;"> Error inesperado </p> <br>');
                    }

                    $row =  $res->fetch_assoc();

                    if(!password_verify($pass, $row['Pass'])){
                        exit ('<p style="color:red;"> Usuario o contraseña incorrecto </p> <br>');
                    }

                    if(!$row){
                        echo('<p style="color:red;"> Los datos son incorrectos </p> <br>');
                    }else{
                        if($row['Estado'] != 'activo'){
                            exit ('<p style="color:red;"> El usuario esta bloqueado </p> <br>');
                        }
                        increaseGlobalCounter();
                        $_SESSION["email"] = $row['Email'];
                        $_SESSION["imagen"] = $row['Imagen'];
                        $_SESSION["nombre"] = $row['NombreApellidos'];
                        if($row['Email'] == 'admin@ehu.es' ){
                            $_SESSION["tipo"] = 'administrador';
                        }else{
                            $_SESSION["tipo"] = $row['TipoUser'];
                        }

                        echo "<script>window.location='Layout.php'</script>";
                    }

                    $mysqli->close();






            }

        ?>



    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>