<?php

    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    $ns="http://localhost/nusoap-0.9.5/samples";
    $server = new soap_server;
    $server->configureWSDL('validatePass',$ns);
    $server->wsdl->schemaTargetNamespace=$ns;
    
    $server->register('validatePass',
    array('pass'=>'xsd:string','ticket'=>'xsd:string'),
    array('z'=>'xsd:string'),
    $ns);
    
    function validatePass ($pass, $ticket){
    	
    	if($ticket != '1010') return 'SIN SERVICIO';
    	
    	else{
    		$sourceFile = file_get_contents('../txt/toppasswords.txt');
    		
    		if (!strpos($sourceFile, $pass)) return 'VALIDA';
            
            return 'INVALIDA';
    	}
    }
    
    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);

?>