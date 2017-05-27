<?php  session_start();
	if (!empty($_REQUEST['email']) && !empty($_REQUEST['contraseña'])) {
		$email = $_REQUEST['email'];
		$contraseña = $_REQUEST['contraseña'];

        include('conectar.php');

        $query = "SELECT correo FROM usuarios WHERE correo LIKE '$email' AND contraseña LIKE '$contraseña'";
    	$resultado = $mysqli->query($query) or die($mysqli->error);
    	$numRows = $resultado->num_rows;

        if ($numRows == 0 ) {
    		$_SESSION['login'] = false;
            die('No te hemos encontrado ' . $mysqli->error);
    	}

    	else {
        	$_SESSION['login'] = true;
            $_SESSION['correo'] = $email;
    	}

    	$mysqli->close();
	}

    header("Location: ../Vistas/inicio.php");
    exit;
?>
