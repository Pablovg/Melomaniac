<?php session_start();
	include('cargar_usuario.php'); //Cogemos el objeto $usuario con todos sus valores
	include('conectar.php');

    $correo = $_SESSION['correo'];
	
	if (isset($_SESSION['login']) && $_SESSION['login']) { //Si el usuario está logueado...

		//Si se han rellenado los 3 campos del mensaje...
		if (!empty($_REQUEST['para']) && !empty($_REQUEST['asunto']) && !empty($_REQUEST['mensaje'])) {

			
			/*-------------------------------------------------------------------------------*/
			//Coge el último Id, súmale uno para darle ese Id al nuevo mensaje
			
			$sql = "SELECT ID FROM mensajes ORDER BY ID DESC LIMIT 1";
	        $resultado = $mysqli->query($sql) or die($mysqli->error);
    		$id_temp = $resultado->fetch_row();

    		$id = $id_temp[0] + 1;

    		/*-------------------------------------------------------------------------------*/

    		$asunto = $_REQUEST['asunto']; //Asunto que el usuario ha escrito
    		$mensaje = $_REQUEST['mensaje']; //Y lo mismo con el mensaje

 		 	date_default_timezone_set('Europe/Madrid'); //Coge la hora actual (Fecha del mensaje)
			$fecha = date('Y-m-d', time()); //Y dale el formato adecuado

	        $emisor = $correo; //El emisor es el usuario actual obviamente

	        /*-------------------------------------------------------------------------------*/
	        
	        $para = $_REQUEST['para']; //$para es el receptor

	        if ($para == 'TODOS') { //Para todos lod usuarios
	        	$receptor = "TODOS";
	        }

	        else if ($para == 'GRUPO') { //Para todos los usuarios del grupo actual del emisor
	        	$receptor = "GRUPO";
	        }

	        else { //Par un usuario concreto
	        	$receptor = $para;
	        }

	        /*-------------------------------------------------------------------------------*/

	        if ($receptor == 'GRUPO') { //Si es un mensaje grupal añade el grupo correspondiente, si no se queda en null
	        	$grupo_mensaje = $usuario->getGrupo();
	        }
	       
	        /*-------------------------------------------------------------------------------*/
	        //Añade el nuevo mensaje en la BD
	        $sql = "INSERT INTO mensajes (ID, Asunto, Mensaje, Fecha, Emisor, Receptor, Grupo) VALUES ('$id','$asunto', '$mensaje', '$fecha', '$emisor', '$receptor', '$grupo_mensaje')";
	        $mysqli->query($sql) or die(mysql_error());
	    }
	}

	$mysqli->close();
    header("Location: ../Vistas/mensajes.php");
    exit;

 ?>