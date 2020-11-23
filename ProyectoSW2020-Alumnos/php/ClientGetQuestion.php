<?php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    $url = 'http://localhost/SW-ElP-MejorRepo/ProyectoSW2020-Alumnos/php/GetQuestionWS.php?wsdl';

    $soapclient = new nusoap_client($url ,true);
    
    $id = $_POST['idPregunta'];

    $datos = $soapclient->call('ObtenerPregunta', array('id'=>$id));

    if ($datos == '') print_r("Introduce un id");

    else print_r($datos);


?>