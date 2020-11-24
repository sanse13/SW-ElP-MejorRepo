<?php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    $ns="http://localhost/nusoap-0.9.5/samples";
    $server = new soap_server;
    $server->configureWSDL('ObtenerPregunta',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;
    
    $server->register('ObtenerPregunta',
    array('id'=>'xsd:string'),
    array('a'=>'xsd:string'),
    $ns);
    
    function ObtenerPregunta ($id){
    	
        include "DbConfig.php";
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        $query = "SELECT id, correo, enunciado, resOK FROM Preguntas WHERE id = $id";
        $res = mysqli_query($mysqli, $query);

        while ($row = mysqli_fetch_array($res))
            return '<p style="color:blue"> AUTOR: '.$row['correo'].'<br> ID: '.$row['id'].'<br> ENUNCIADO: '.$row['enunciado'].'<br> Respuesta correcta: '.$row['resOK'].'</p>';

        return '<p style="color:blue"> AUTOR: <br> ID: <br> ENUNCIADO: <br> Respuesta correcta: </p>';
        
    }
    
    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);

?>