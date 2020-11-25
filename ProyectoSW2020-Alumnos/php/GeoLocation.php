<?php

  $ip = @$_SERVER['REMOTE_ADDR'];
  $ipdat = json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip='.$ip));

  echo '<p> Ubicacion del cliente: '.$ipdat->geoplugin_latitude.'º, '.$ipdat->geoplugin_longitude.'º<br>'
        . 'Ciudad: '.$ipdat->geoplugin_city.'<br>' . 'Region: '.$ipdat->geoplugin_region.'<br>'
        . 'Pais: '.$ipdat->geoplugin_countryName.', '.$ipdat->geoplugin_countryCode.'<br>'
        . 'Continente: '.$ipdat->geoplugin_continentName.', '.$ipdat->geoplugin_continentCode.'<br></p>';




?>