<?php
session_start();
$_SESSION["email"] = $_POST['email'];
$_SESSION["imagen"] = $_POST['imageUrl'];
$_SESSION["nombre"] = $_POST['name'];
$_SESSION["tipo"] = 'alumno';


?>