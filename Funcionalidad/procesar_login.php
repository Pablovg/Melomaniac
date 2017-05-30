<?php  session_start();
	if (!empty($_REQUEST['email']) && !empty($_REQUEST['contraseña'])) { //Si se ha introducido el correo y contraseña
		$email = $_REQUEST['email'];
		$contraseña = $_REQUEST['contraseña'];

        include('conectar.php');

        //Selecciona un usuario que corresponda con ese correo y contraseña
        $query = "SELECT correo FROM usuarios WHERE correo LIKE '$email' AND contraseña LIKE '$contraseña'";
    	$resultado = $mysqli->query($query) or die($mysqli->error);
    	$numRows = $resultado->num_rows;

        if ($numRows == 0 ) { //Si no se encuentra entonces el login falla
    		$_SESSION['login'] = false;
            die('No te hemos encontrado ' . $mysqli->error);
    	}

    	else { //Si se encuentra entonces se loguea y guarda el correo en session para otras cosillas
        	$_SESSION['login'] = true;
            $_SESSION['correo'] = $email;
    	}

    	$mysqli->close();
	}

    header("Location: ../Vistas/inicio.php");
    exit();
?>
