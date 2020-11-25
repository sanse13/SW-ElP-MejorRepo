<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');


    if (isset($_POST['pass'])){

        $password = $_POST['pass'];

        $url = 'https://lab0adri.000webhostapp.com/ProyectoSW2020-Alumnos/php/VerifyPassWS.php?wsdl';

        $method = 'validatePass';

        $parameters = array (
            'pass'=>$password,
            'ticket'=>'1010'
        );

        $soapclient = new nusoap_client($url ,true);
        $res =  $soapclient->call($method, $parameters);

        echo $res;

    }

?>