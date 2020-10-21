<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DataBaseConnection.php' ?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

			<?php


      insertDataWithImage();


      ?>
      <br>
  <a href="ShowQuestionsWithImage.php">Ver preguntas de la DataBase</a> 


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
