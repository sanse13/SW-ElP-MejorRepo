<?php
session_start();
/* el email tiene que estar registrado */
    include "DbConfig.php";

    $email = $_POST['email'];
        
    $mysqli = new mysqli($server, $user, $pass, $basededatos);

    if(!$mysqli) {
        exit ('<p style="color:red;"> Error inesperado </p> <br>');
    }

    $stmt = $mysqli->prepare("SELECT Email FROM Usuarios WHERE Email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $checkEmail = $stmt->get_result();
    
    /* si el email está registrado, procedemos a enviar el mail */
    if ($checkEmail->num_rows > 0){
        $codigo = rand(1000, 9999);
        $_SESSION['mailRecover'] = $email;
        $_SESSION['codigo'] = $codigo;

        $msg = "<h1>Has solicitado el restablecimiento de contraseña.</h1>
        <p>Pulse a continuacion en el siguiente link para proceder al restablecimiento de la contraseña.</p>
        <p>El codigo que obtiene a continuacion debe introducirlo en la pagina a la que se le redirecciona.</p> 
        <p>El codigo es:</p>"
        .$codigo."
        <p><a href='https://lab0adri.000webhostapp.com/ProyectoSW2020-Alumnos/php/UpdatePassPage.php'>Link</a>";

        $to = $email;
        $subject = 'Restablecimiento de contraseña';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From:<adrisanse@sender.com>';

        $retval = mail($to, $subject, $msg, $headers);
        if ($retval) echo 'Sending mail...';
        else echo 'Error sending email...';
        
        echo "<p style='color:green'>El email es valido.</p>";
        echo '<p>Consulte su bandeja de entrada para continuar.</p>';

    
        
    } 

    else echo "<p style='color:red'>El email no es valido. No esta registrado en nuestra Base de Datos.</p>";
        

    

?>