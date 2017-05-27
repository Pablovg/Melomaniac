<?php 

	if (isset($_SESSION['login']) && $_SESSION['login']) {
    	
    	include('../Modelos/mensaje.php');
    	include('conectar.php');

    	$correo = $usuario->getCorreo();
		$grupo = $usuario->getGrupo();

		/*---------------------------------------------------------------------------*/

		$query = "SELECT * FROM mensajes WHERE Receptor Like '$correo' OR Receptor Like 'TODOS' ORDER BY Fecha DESC";
		$resultado = $mysqli->query($query) or die($mysqli->error);

		while ($fila = $resultado->fetch_row()) {
			$recibidos[] = new Mensaje($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
		}

		/*---------------------------------------------------------------------------*/
		
		$query = "SELECT * FROM mensajes WHERE Emisor Like '$correo' ORDER BY Fecha DESC";
		$resultado = $mysqli->query($query) or die($mysqli->error);

		while ($fila = $resultado->fetch_row()) {
			$enviados[] = new Mensaje($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
		}

		/*---------------------------------------------------------------------------*/

		$query = "SELECT * FROM mensajes WHERE Grupo Like '$grupo' ORDER BY Fecha DESC";
		$resultado = $mysqli->query($query) or die($mysqli->error);

		while ($fila = $resultado->fetch_row()) {
			$grupos[] = new Mensaje($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
		}

		$mysqli->close();
	}
 ?>