<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">

  <div>

        <form method="post">
        
        <?php 


            echo "<p style='color:blue'>El resultado obtenido es: ".$_SESSION['correctas']." correctas y ".$_SESSION['incorrectas']." incorrectas</p>";
             
        
        ?>

        <br><br><p>Introduce un nick para guardar tus resultados:</p> 
        <input type="text" id="nick" name="nick"><br><br>
        <input type="button" id="nick_button" name="nick_button" value="Guardar nick" onclick="guardarNick()">
        <input type="button" id="inicio" name="inicio" value="Volver a la página principal">
        <br><label id="nick_guardado"></label>
            

        </form>

        </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

<script>
    $(document).ready(function (){
        $("#inicio").click(function(){
            window.location.href="Layout.php";
        });

    
    });


    function guardarNick(){
        var fd = new FormData();
            fd.append('nick', $("#nick").val());
            $.ajax({
                url: '../php/GuardarNick.php',
                data: fd,
                processData: false,
                contentType: false,
                cache: false,
                type: 'POST',
                success: function(data){
                    console.log(data);
                    if (data == "OK"){
                        document.getElementById('nick_guardado').innerHTML = "<p style='color:green'>Nick guardado correctamente.</p>";
                    } else {
                        document.getElementById('nick_guardado').innerHTML = "<p style='color:red'>Nick repetido, introduce otro.</p>";
                    }
                }
            });
    }
    
</script>

