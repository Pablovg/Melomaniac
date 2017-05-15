<?php  session_start();
	if (!empty($_REQUEST['email']) && !empty($_REQUEST['contraseña'])) {
		$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
		$contraseña = htmlspecialchars(trim(strip_tags($_REQUEST["contraseña"])));

        include('connect.php');

        $query = "SELECT correo FROM usuarios WHERE correo LIKE '$email' AND contraseña LIKE '$contraseña'";
    	$resultado = $mysqli->query($query);
    	$numRows = $resultado->num_rows;

        if ($numRows == 0 ) {
    		$_SESSION['login'] = false;
            die('No te hemos encontrado ' . $mysqli->error);
    	}

    	else {
        	$_SESSION['login'] = true;
			$query = "SELECT * FROM usuarios WHERE correo Like '$email'" or die(mysql_error());
            $resultado = $mysqli->query($query);
            $arr = $resultado->fetch_array(MYSQLI_ASSOC);
            $_SESSION['correo'] = $arr["correo"];
            $_SESSION['contraseña'] = $arr["contraseña"];
            $_SESSION['nombre'] = $arr["nombre"];
            $_SESSION['fecha'] = $arr["fecha"];
            $_SESSION['foto'] = $arr["foto"];
			$_SESSION['grupo'] = $arr["grupo"];
            $_SESSION['descripcion'] = $arr["descripcion"];
            $_SESSION['tipo'] = $arr["tipo"];
            $_SESSION['db'] = $mysqli;

			if (!isset($_SESSION['foto'])) {
				$_SESSION['foto'] = "noimage.jpg";
			}
    	}

    	$mysqli->close();
	}

    header("Location: inicio.php");
    exit;
?>
