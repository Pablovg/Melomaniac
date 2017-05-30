<?php session_start();
	if (!empty($_REQUEST["recuperar_contraseña"])) { //Si se ha introducido un correo para recuperar la contraseña...

		include('conectar.php');

		$email     = $_REQUEST["recuperar_contraseña"];
		
		$query     = "SELECT contraseña FROM usuarios WHERE correo LIKE '$email'"; //Coge la contraseña de ese usuario
		$resultado = $mysqli->query($query) or die($mysqli->error);
		$numRows   = $resultado->num_rows;

        if ($numRows == 0 ) { //Si no se encuentra es porque no se ha registrado aún
            die('No te hemos encontrado, regístrate para acceder');
    	}

    	else { //Si se encuentra te manda un mensaje al correo introducido
			$arr        = $resultado->fetch_array(MYSQLI_ASSOC);
			$contraseña = $arr["contraseña"];
			$asunto     = "Recuperar contraseña";
			$mensaje    = "Tu contraseña es: ".$contraseña;

     		mail($email, $asunto, $mensaje);

     		//El envío del correo no funcionan no por el código sino por la configuración del servidor que no deja que pase :S
   			//Lo deje para el final pero me quedé sin tiempo :(
    	}

    	$mysqli->close();
	}

	header("Location: ../Vistas/login.php");
    exit();
?>


