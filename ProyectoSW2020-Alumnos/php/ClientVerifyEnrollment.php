<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    if(isset($_POST['email'])){

        $url = 'http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl';
        $email = $_POST['email'];
        $method = 'comprobar';
        $parameters = array(
            'x'=>$email
        );

        $soapclient = new nusoap_client($url ,true);
        $res =  $soapclient->call($method,$parameters);

        echo $res;
    }


?>