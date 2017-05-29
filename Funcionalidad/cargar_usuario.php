<?php
	if (isset($_SESSION['login']) && $_SESSION['login']) { //Solo si el usuario esta logeado
    	
    	include('../Modelos/usuario.php'); //Esto es un objeto de un usuario con sus valores y funciones
    	include('conectar.php');

    	//Cargamos el usuario que correspnda con el correo al loguearse con todos sus valores

		$email     = $_SESSION['correo'];
		
		$query     = "SELECT * FROM usuarios WHERE correo Like '$email'";
		$resultado = $mysqli->query($query) or die($mysqli->error);
		$arr       = $resultado->fetch_array(MYSQLI_ASSOC);

		$usuario = new Usuario($arr["correo"], $arr["contraseña"], $arr["nombre"], $arr["fecha_de_nacimiento"], $arr["foto"], $arr["descripcion"], $arr["genero_musical"], $arr["grupo"], $arr["tipo"]);

		$mysqli->close();
	}
 ?>