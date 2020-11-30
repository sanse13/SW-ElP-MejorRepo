<?php
    session_start();
    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'profesor'){
        require_once('../lib/nusoap.php');
        require_once('../lib/class.wsdlcache.php');

        if(isset( $_POST['idPregunta'])){

            $url = 'https://lab0adri.000webhostapp.com/ProyectoSW2020-Alumnos/php/GetQuestionWS.php?wsdl';

            $soapclient = new nusoap_client($url ,true);

            $id = $_POST['idPregunta'];

            $datos = $soapclient->call('ObtenerPregunta', array('id'=>$id));

            echo json_encode($datos);

            //print_r($datos);

        }else{
        // print_r("Introduce un id");
        }
    }else{
        echo "<script>
              window.location.href='Layout.php';
            </script>";
    }



?>