<?php  
	//Destruimos la sesión y borramos sus datos
	session_start();
	session_unset();
	session_destroy();
    header("Location:../Vistas/login.php");
    exit();
?>
