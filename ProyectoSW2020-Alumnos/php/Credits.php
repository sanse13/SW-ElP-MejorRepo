<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <h2>DATOS DEL AUTOR/AUTORES</h2>
      <ul>
        <li>Nombre y apellidos: Ander Alonso García y Adrián San Segundo Moya</li>
        <li>Especialidad cursada en el grado: Ambos cursamos la rama de Computación</li>
        <li>Foto o avatar:</li>
        <img align="center" src="../images/foto2.png" height="403" width="227" title="licencia de php"/>
        <li>Email de la UPV/EHU: asansegundo002@ikasle.ehu.eus | aalonso213@ikasle.ehu.eus</li>
      </ul>

      <br>
      
      <?php geolocation(); ?>


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php


function geolocation(){

  $ip = @$_SERVER['HTTP_CLIENT_IP'];
  $ipdat = json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip='.$ip));
  echo 'Ubicacion del cliente: '.$ipdat->geoplugin_latitude.'º, '.$ipdat->geoplugin_longitude.'º<br>';
  echo 'Ciudad: '.$ipdat->geoplugin_city.'<br>';
  echo 'Region: '.$ipdat->geoplugin_region.'<br>';
  echo 'Pais: '.$ipdat->geoplugin_countryName.', '.$ipdat->geoplugin_countryCode.'<br>';
  echo 'Continente: '.$ipdat->geoplugin_continentName.', '.$ipdat->geoplugin_continentCode.'<br>';


}


?>