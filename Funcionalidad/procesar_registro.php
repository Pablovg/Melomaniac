<?php
    include('conectar.php');

    //Si se ha introducido un correo, contraseña y confirmación de la contraseña...
    if (!empty($_REQUEST['correo']) && !empty($_REQUEST['contraseña']) && !empty($_REQUEST['confirmar_contraseña'])) {
        if ($_REQUEST['contraseña'] === $_REQUEST['confirmar_contraseña']) { //Si las dos contraseñas son iguales...
            $correo = $_REQUEST['correo'];
            $sql = "SELECT correo FROM usuarios WHERE correo='$correo'"; //Coge un usuario con ese correo
            $resultado = $mysqli->query($sql) or die($mysqli->error);
    	    $numRows = $resultado->num_rows;

            if ($numRows == 0 ) { //Si no se encuentra el usuario se añade a la BD
                $contraseña = $_REQUEST['contraseña'];
                $_SESSION['correo'] = $correo;

                $sql = "INSERT INTO usuarios (correo, contraseña) VALUES ('$correo','$contraseña')";

                if ($mysqli->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }

                $_SESSION['login'] = true;
    	    }

            else { //Si se encuentra no se añade porque ya existe
                die('Error: El correo '.$correo.' ya esta registrado ' . $mysqli->error);
            }
        }

        else { //Esto es por si se escriben mal las dos contraseñas
            die('Error: Las contraseñas no coinciden ' . $mysqli->error);
        }
    }

    $mysqli->close();
    header("Location: ../Vistas/configuracion.php");
    exit;
?>