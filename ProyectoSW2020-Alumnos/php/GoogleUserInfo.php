<?php
session_start();
include "IncreaseGlobalCounter.php";
increaseGlobalCounter();
$_SESSION["email"] = $_POST['email'];
$_SESSION["imagen"] = $_POST['imageUrl'];
$_SESSION["nombre"] = $_POST['name'];
$_SESSION["tipo"] = 'alumno';


?>