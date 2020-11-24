<?php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');


    if (isset($_POST['pass'])){

        $password = $_POST['pass'];
        $url = 'https://lab0adri.000webhostapp.com/ProyectoSW2020-Alumnos/php/VerifyPassWS.php?wsdl';
        $soapclient = new nusoap_client($url ,true);
        echo $soapclient->call('validatePass', array('pass'=>$password, 'ticket'=>'1010'));
        
    }
        

    //print_r($esValida);


    /*if ($esValida == 'VALIDA')
        echo '<script> 
        document.getElementById("passValida").innerHTML = "La contraseña es valida"; 
        document.getElementById("validPass").value = "VALIDA"; 
        document.getElementById("passValida").style.color="green";</script>';
    else
        echo '<script>
        document.getElementById("passValida").innerHTML = "La contraseña no es valida";
        document.getElementById("validPass").value = "INVALIDA";  
        document.getElementById("passValida").style.color="red";</script>';*/




?>