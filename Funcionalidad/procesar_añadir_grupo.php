<?php session_start();
	include ('conectar.php'); //Conexión a la BD

	//Coge los valores de una enum y les da el formato correcto quitando comas, comillas, etc... y lo guarda en $enum
	function get_enum_values($mysqli, $table, $field ) {
	    $type = $mysqli->query("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'")->fetch_array(MYSQLI_ASSOC)['Type'];
	    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
	    $enum = explode("','", $matches[1]);
	    return $enum;
	}

	//Crea un string con los valores de la enum y el nuevo introducido dándoles el formato de mysql
	function alter_enum($mysqli, $table, $column, $opt) {
		$arr = get_enum_values($mysqli, $table, $column); //Coge los valores de la enum

		$genero = $_REQUEST['nuevo_grupo'];

		$equal = false;

		foreach ($arr as $field) { //Comprueba que el nuevo grupo no exista ya
			if ($field == $genero || $field == "$genero Junior" || $field == "$genero Senior") {
				$equal = true;
			}
		}

		if (!$equal) { //Si el grupo no existe ya lo añade, si no no
			$string = "";
			foreach ($arr as $field) { //Añade al string los valores de la enum
				$string .= "'$field', ";
			}

			//Añade el nuevo grupo/género introducido
			if ($opt == 1) { //Opción 1 para grupos
				$string .= "'$genero Junior', '$genero Senior'";
			}

			else if ($opt == 2) { //Opción 2 para género musical
				$string .= "'$genero'";
			} 

			//Modifica la enum sobreescribiendo los valores que ya existen mas el nuevo introducido
			$sql = "ALTER TABLE ".$table." CHANGE ".$column." ".$column." ENUM(".$string.")";
			$mysqli->query($sql) or die($mysqli->error);
		}
	}

	//Si el campo de añadir grupo no esta vacío, añade el género musical y grupos (Junior y Senior) a usuarios y mensajes
	if (!empty($_REQUEST['nuevo_grupo'])) {
		alter_enum($mysqli, "usuarios", "grupo", 1);
		alter_enum($mysqli, "mensajes", "Grupo", 1);
		alter_enum($mysqli, "usuarios", "genero_musical", 2);
    }

    $mysqli->close(); //Cerramos la conexión con la BD
    header("Location: ../Vistas/administrador.php"); //Vuelve a la vista de administrador 
    //(Aquí un poco de ajax para comprobar si se ha añadido o no el grupo hubiera estado bien)
    exit;
 ?>