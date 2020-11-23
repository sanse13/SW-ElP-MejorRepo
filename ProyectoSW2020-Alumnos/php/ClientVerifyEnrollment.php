<?php


    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    $url = 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl';

    $soapclient = new nusoap_client($url ,true);
    $esVIP = $soapclient->call('comprobar',array('x'=>$_POST['email']));
    
    if ($esVIP == 'SI')
        echo '<script> 
        document.getElementById("vipEmail").innerHTML = "El email es VIP"; 
        document.getElementById("emailVip").value = "SI";
        document.getElementById("vipEmail").style.color="green";</script>';
    else
        echo '<script> document.getElementById("vipEmail").innerHTML = "El email no es VIP"; 
        document.getElementById("emailVip").value = "NO";
        document.getElementById("vipEmail").style.color="red";</script>';

    
	
?>