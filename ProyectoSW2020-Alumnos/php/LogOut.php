<?php

    if(isset($_GET['email'])){
        $urlLogout = "?logout=".$_GET['email'];
        header("Location: Layout.php".$urlLogout);

    }


?>