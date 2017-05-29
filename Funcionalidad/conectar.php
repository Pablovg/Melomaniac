<?php
	//Esto es una forma sencilla de conectarse a la BD sin repetir el código
	//Se debe crear un usuario en phpmyadmin ocon estos 4 campos
    $hostmane = "localhost";
    $user = "adminMelo";
    $pass = "adminMelo";
    $bd = "melomaniac";

    $mysqli = new mysqli($hostmane, $user, $pass, $bd); //Nueva conexión a la BD
    $mysqli->set_charset("utf8"); //Esto es para los acentos y eñes al hacer echo con php

    if ($mysqli->connect_error) {
    	die("Connection failed: " . $mysqli->connect_error);
    }
?>
