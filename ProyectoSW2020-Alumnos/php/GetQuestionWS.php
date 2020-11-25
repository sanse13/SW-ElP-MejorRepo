<?php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    $ns="http://localhost/nusoap-0.9.5/samples";
    $server = new soap_server;
    $server->configureWSDL('ObtenerPregunta',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;
    $outParameters = array(
        "id" => "xsd:string",
        "correo" => "xsd:string",
        "enunciado" => "xsd:string",
        "respuesta" => "xsd:string"
    );

    $server->register('ObtenerPregunta',
        array('id'=>'xsd:string'),
        array('return'=>'xsd:Array'),
    $ns);

    function ObtenerPregunta ($id){

        include "DbConfig.php";
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);

        $query = "SELECT id, correo, enunciado, resOK FROM Preguntas WHERE id = $id";

        $res = mysqli_query($mysqli, $query);

        $row = mysqli_fetch_array($res);

        if($row){

            $resArray = array(
                "id" => $row['id'],
                "correo" => $row['correo'],
                "enunciado" => $row['enunciado'],
                "respuesta" => $row['resOK']
            );
        }else{
            $resArray = array(
                "id" => "",
                "correo" => "",
                "enunciado" => "",
                "respuesta" => ""
            );
        }



        return $resArray;


    }

    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);

?>