<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <form id='fquestion' name='fquestion'  method="post" enctype="multipart/form-data">

      <label> Id de Pregunta </label>
      <input type='text' id='idPregunta' name='idPregunta'/>
      <input type='button' id='verDatos' value='Mostrar Pregunta' onclick="obtenerDatos()"/><br>
      <label id='datos'></label>


    </form>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>

<script>
    function obtenerDatos(){
        var fd = new FormData();
        fd.append( 'idPregunta', $("#idPregunta").val());

            $.ajax({

                url: 'ClientGetQuestion.php',
                data: fd,
                processData: false,
                contentType: false,
                cache: false,
                type: 'POST',
                success: function(data){
                    console.log(data);
                    $("#datos").html(data);
                }
            });
    }
</script>