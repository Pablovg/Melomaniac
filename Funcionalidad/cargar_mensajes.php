<?php 
	if (isset($_SESSION['login']) && $_SESSION['login']) { //Carga los mensajes solo si el usuario está logeado
    	
    	include('../Modelos/mensaje.php'); //Esto es un objeto de un mensaje con sus valores y funciones
    	include('conectar.php'); //Conexión a la BD

    	$correo = $usuario->getCorreo(); 
		$grupo = $usuario->getGrupo();

		//Creamos 3 arrays de mensajes (recibidos, enviados y grupales) y cargamos todos los mensajes del usuario en ellos

		/*------------------------------------------- MENSAJES RECIBIDOS -------------------------------------------*/
		$query = "SELECT * FROM mensajes WHERE Receptor Like '$correo' OR Receptor Like 'TODOS' ORDER BY Fecha DESC";
		$resultado = $mysqli->query($query) or die($mysqli->error);

		while ($fila = $resultado->fetch_row()) {
			$recibidos[] = new Mensaje($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
		}
		/*----------------------------------------------------------------------------------------------------------*/

		/*------------------------------------------- MENSAJES ENVIADOS -------------------------------------------*/
		$query = "SELECT * FROM mensajes WHERE Emisor Like '$correo' ORDER BY Fecha DESC";
		$resultado = $mysqli->query($query) or die($mysqli->error);

		while ($fila = $resultado->fetch_row()) {
			$enviados[] = new Mensaje($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
		}
		/*---------------------------------------------------------------------------------------------------------*/

		/*------------------------------------------- MENSAJES GRUPALES -------------------------------------------*/
		$query = "SELECT * FROM mensajes WHERE Grupo Like '$grupo' ORDER BY Fecha DESC";
		$resultado = $mysqli->query($query) or die($mysqli->error);

		while ($fila = $resultado->fetch_row()) {
			$grupos[] = new Mensaje($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
		}
		/*---------------------------------------------------------------------------------------------------------*/

		$mysqli->close(); //Cerramos la conexión a la BD
	}
 ?>