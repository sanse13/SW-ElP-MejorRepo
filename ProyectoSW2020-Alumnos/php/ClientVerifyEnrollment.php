<?php


    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    $url = 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl';

    $soapclient = new nusoap_client($url ,true);
    echo $soapclient->call('comprobar',array('x'=>$_POST['email']));
    
    
    
	
?>