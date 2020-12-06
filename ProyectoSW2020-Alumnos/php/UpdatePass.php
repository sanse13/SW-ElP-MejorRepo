<?php
    session_start();
    include 'DbConfig.php';

    $codigo = $_POST['codigo'];
    $password = $_POST['pass'];
    $repPassword = $_POST['repPassword'];
    $resPass = $_POST['resPass'];

    if ($codigo == $_SESSION['codigo']){

        //echo '<p style="color:green">El codigo introducido es valido<p>';
        if ($password != $repPassword) echo '<p style="color:red">Las contraseñas no coinciden</p>';

        elseif($resPass == "La contraseña es valida.") {
            //echo '<p style="color:green">Todo correcto</p>';
            //UPDATEAR LA CONTRASEÑA EN LA BD
            $email = $_SESSION['mailRecover'];
            $hashPass = password_hash($password, PASSWORD_DEFAULT);

            $mysqli = new mysqli($server, $user, $pass, $basededatos);
            $stmt = $mysqli->prepare("UPDATE Usuarios SET Pass = ? WHERE Email = ?");
            $stmt->bind_param('ss', $hashPass, $email);
            $stmt->execute();

            echo '<p style="color:green">Contraseña actualizada con éxito.<p>';
            session_unset();
            session_destroy();
            echo 'Puedes volver a la página de login';
            echo '<br><a href="LogIn.php">Log In</a>';

        }

        else echo '<p style="color:red">La contraseña no es valida</p>';

    } 
    
    else echo '<p style="color:red">El codigo introducido no es valido<p>';

?>