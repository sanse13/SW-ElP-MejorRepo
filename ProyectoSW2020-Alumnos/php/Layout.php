<?php
  session_start();
 
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="../js/GoogleUserInfo.js"></script>
<meta name="google-signin-client_id" content="841174584082-uaggu8g2ogooj7fjemo2tuk9tkn1su6h.apps.googleusercontent.com">
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">

  <div id='google' class='g-signin2' data-onsuccess='onSignIn'></div>  

    <div>

      <h2>Quiz: el juego de las preguntas</h2>

      
      
      

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<?php

  if(isset($_SESSION['email'])){
   /*echo("
      <script>
        window.location.href='Layout.php';
      </script>
    ");*/

  }


?>




