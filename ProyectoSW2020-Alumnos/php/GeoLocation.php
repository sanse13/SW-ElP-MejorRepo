<?php

  $ip = @$_SERVER['REMOTE_ADDR'];
  $ipdat = json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip='.$ip));

  /*echo '<p> Ubicacion del cliente: '.$ipdat->geoplugin_latitude.'º, '.$ipdat->geoplugin_longitude.'º<br>'
        . 'Ciudad: '.$ipdat->geoplugin_city.'<br>' . 'Region: '.$ipdat->geoplugin_region.'<br>'
        . 'Pais: '.$ipdat->geoplugin_countryName.', '.$ipdat->geoplugin_countryCode.'<br>'
        . 'Continente: '.$ipdat->geoplugin_continentName.', '.$ipdat->geoplugin_continentCode.'<br></p>'*/


  $ipDataRefactor = array(

    'Latitud' => $ipdat->geoplugin_latitude,
    'Longitud' => $ipdat->geoplugin_longitude,
    'Ciudad' => $ipdat->geoplugin_city,
    'Region' => $ipdat->geoplugin_region,
    'Pais' => $ipdat->geoplugin_countryName,
    'Cod. Pais' => $ipdat->geoplugin_countryCode,
    'Continente' => $ipdat->geoplugin_continentName,
    'Cod. Continente' => $ipdat->geoplugin_continentCode

    );

    echo json_encode($ipDataRefactor);


?>