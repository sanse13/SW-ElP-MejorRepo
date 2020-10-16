<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DataBaseConnection.php' ?>
  <section class="main" id="s1">
    <div>

      <?php

        showDataTable();

      ?>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>