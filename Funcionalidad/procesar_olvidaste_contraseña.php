<?php 
	if (!empty($_REQUEST["recuperar_contraseña"])) {

		include('conectar.php');

		$email     = $_REQUEST["recuperar_contraseña"];
		
		$query     = "SELECT contraseña FROM usuarios WHERE correo LIKE '$email'";
		$resultado = $mysqli->query($query) or die($mysqli->error);
		$numRows   = $resultado->num_rows;

        if ($numRows == 0 ) {
            die('No te hemos encontrado, regístrate para acceder');
    	}

    	else {
			$arr        = $resultado->fetch_array(MYSQLI_ASSOC);
			$contraseña = $arr["contraseña"];
			$asunto     = "Recuperar contraseña";
			$mensaje    = "Tu contraseña es: ".$contraseña;

     		mail($email, $asunto, $mensaje);
    	}

    	$mysqli->close();
	}

	header("Location: ../Vistas/login.php");
    exit;
?>