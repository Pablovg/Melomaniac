<?php
    $hostmane = "localhost";
    $user = "adminMelo";
    $pass = "adminMelo";
    $bd = "melomaniac";

    $mysqli = new mysqli($hostmane, $user, $pass, $bd);
    $mysqli->set_charset("utf8");

    if ($mysqli->connect_error) {
    	die("Connection failed: " . $mysqli->connect_error);
    }
?>
