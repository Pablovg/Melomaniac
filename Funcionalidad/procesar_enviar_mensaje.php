<?php 

	session_start();
	include('cargar_usuario.php');
	include('conectar.php');
    $correo = $_SESSION['correo'];
	
	if (isset($_SESSION['login']) && $_SESSION['login']) {

		if (!empty($_REQUEST['para']) && !empty($_REQUEST['asunto']) && !empty($_REQUEST['mensaje'])) {

			/*-------------------------------------------------------------------------------*/

			$sql = "SELECT ID FROM mensajes ORDER BY ID DESC LIMIT 1";
	        $resultado = $mysqli->query($sql) or die($mysqli->error);
    		$id_temp = $resultado->fetch_row();

    		$id = $id_temp[0] + 1;

    		/*-------------------------------------------------------------------------------*/

    		$asunto = $_REQUEST['asunto'];
    		$mensaje = $_REQUEST['mensaje'];

    		/*-------------------------------------------------------------------------------*/

 		 	date_default_timezone_set('Europe/Madrid');  
			$fecha = date('Y-m-d', time()); 

	        /*-------------------------------------------------------------------------------*/

	        $emisor = $correo;

	        /*-------------------------------------------------------------------------------*/
	        
	        $para = $_REQUEST['para'];

	        if ($para == 'TODOS') {
	        	$receptor = "TODOS";
	        }

	        else if ($para == 'GRUPO') {
	        	$receptor = "GRUPO";
	        }

	        else {
	        	$receptor = $para;
	        }

	        /*-------------------------------------------------------------------------------*/

	        if ($receptor == 'GRUPO') {
	        	$grupo_mensaje = $usuario->getGrupo();
	        }
	       

	        $sql = "INSERT INTO mensajes (ID, Asunto, Mensaje, Fecha, Emisor, Receptor, Grupo) VALUES ('$id','$asunto', '$mensaje', '$fecha', '$emisor', '$receptor', '$grupo_mensaje')";
	        $mysqli->query($sql) or die(mysql_error());
	    }
	}

	$mysqli->close();
    header("Location: ../Vistas/mensajes.php");
    exit;

 ?>