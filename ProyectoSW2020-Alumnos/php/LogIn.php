
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <form method="post">
        <h2>Identificación de usuario </h2>
            <p> Email   : <input type="email"  name="email" size="21" value="" />
            <p> Password: <input type="password"  name="pass" size="21" value="" />
            <p> <input id="input_2" type="submit" name="submit" value="Login" />
        </form>

        <?php
                include "DbConfig.php";
                include "IncreaseGlobalCounter.php";
                include "ComprobarUsuario.php";



                if(isset($_POST['submit'])){

                    if(esUsuarioLogeado($_POST['email'])){
                        exit ('<p style="color:red;"> El usuario ya esta logeado</p> <br>');
                    }

                    $mysqli = @mysqli_connect($server, $user, $pass, $basededatos);

                    if(!$mysqli) {
                        exit ('<p style="color:red;"> Error inesperado </p> <br>');
                    }

                    $checkUserQuery = "SELECT * FROM Usuarios WHERE Email = '$_POST[email]' AND Pass='$_POST[pass]'";

                    $res = @mysqli_query($mysqli, $checkUserQuery);
                    if(!$res) {
                        exit ('<p style="color:red;"> Error inesperado </p> <br>');
                    }

                    $row =  @mysqli_fetch_array($res);

                    if(!$row){
                        echo('<p style="color:red;"> Los datos son incorrectos </p> <br>');
                    }else{
                        //echo("<script> alert('Bienvenido: ". $row['NombreApellidos']."'); window.location.replace = 'adgasdfas'</script>");
                        $urlUser = "?nombre=".$row['NombreApellidos']."&email=".$row['Email'];
                        increaseGlobalCounter();
                        echo $urlUser;
                        echo "<script>window.location='Layout.php".$urlUser."'</script>";
                    }

                    mysqli_close($mysqli);






            }

        ?>



    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>