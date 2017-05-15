<?php session_start();
    include('connect.php');

    if (!empty($_REQUEST['correo']) && !empty($_REQUEST['contraseña']) && !empty($_REQUEST['confirmar_contraseña'])) {
        if ($_REQUEST['contraseña'] === $_REQUEST['confirmar_contraseña']) {
            $correo = $_REQUEST['correo'];
            $sql = "SELECT correo FROM usuarios WHERE correo='$correo'";
            $resultado = $mysqli->query($sql);
    	    $numRows = $resultado->num_rows;

            if ($numRows == 0 ) {
                $contraseña = $_REQUEST['contraseña'];
                $_SESSION['correo'] = $correo;

                $sql = "INSERT INTO usuarios (correo, contraseña) VALUES ('$correo','$contraseña')";

                if ($mysqli->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
    	    }

            else {
                die('Error: El correo '.$correo.' ya esta registrado ' . $mysqli->error);
            }
        }

        else {
            die('Error: Las contraseñas no coinciden ' . $mysqli->error);
        }
    }

    $mysqli->close();
    header("Location: inicio.php");
    exit;
?>
