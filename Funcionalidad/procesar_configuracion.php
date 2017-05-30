<?php session_start();

    include('conectar.php');
    $correo = $_SESSION['correo'];

     if (isset($_FILES['foto']) && $_FILES['foto']['name'] != '') { //Si se ha subido una en el formulario...
        $foto = $_FILES['foto']['name']; //Nombre de la imagen subida
        $tmp_foto = $_FILES['foto']['tmp_name']; //Nombre temporal que le da php
        $ruta = '../img/Fotos/'.$foto; //Ruta en la que guardar la foto

        move_uploaded_file($tmp_foto, $ruta); //Guarda la foto en la ruta indicada

        $sql = "UPDATE usuarios SET foto='$foto' WHERE correo='$correo'"; //Solo guardamos el nombre de la imagen en la BD
        $mysqli->query($sql) or die($mysqli->error); //Ejecuta la query
    }

    if (!empty($_REQUEST['nombre'])) { //Si se ha escrito un nombre en el formulario...
        $nombre = $_REQUEST['nombre'];
        $sql = "UPDATE usuarios SET nombre='$nombre' WHERE correo='$correo'"; //Cambia el nombre por el nuevo
        $mysqli->query($sql) or die($mysqli->error);
    }

    if (!empty($_REQUEST['genero']) && $_REQUEST['genero'] != 'none') { //Si se ha seleccionado un género musical...
        $genero = $_REQUEST["genero"];
        $sql = "UPDATE usuarios SET genero_musical='$genero' WHERE correo='$correo'"; //Cambia el género musical
        $mysqli->query($sql) or die($mysqli->error);
    }

    if (!empty($_REQUEST['fecha_de_nacimiento'])) { //Lo mismo con la fecha de nacimiento
		$fecha = $_REQUEST['fecha_de_nacimiento'];
        $sql = "UPDATE usuarios SET fecha_de_nacimiento='$fecha' WHERE correo='$correo'";
        $mysqli->query($sql) or die($mysqli->error);
    }

    if (!empty($_REQUEST['descripcion'])) { //Y con la descripción también
		$descripcion = $_REQUEST["descripcion"];
        $sql = "UPDATE usuarios SET descripcion='$descripcion' WHERE correo='$correo'";
        $mysqli->query($sql) or die($mysqli->error);
    }

    $sql = "SELECT genero_musical FROM usuarios WHERE correo Like '$correo'";
    $resultado = $mysqli->query($sql) or die($mysqli->error);
    $genero = $resultado->fetch_row();
    
    $sql = "SELECT fecha_de_nacimiento FROM usuarios WHERE correo Like '$correo'";
    $resultado = $mysqli->query($sql) or die($mysqli->error);
    $fecha = $resultado->fetch_row();

    if (!is_null($genero) && !is_null($fecha)) { //Si el usuario tiene configurado el género musical y la edad dale un grupo

        //Obtener edad a partir de la fecha de nacimiento
        $fecha_format = explode("-", $fecha[0]);
        $edad = (date("md", date("U", mktime(0, 0, 0, $fecha_format[2], $fecha_format[1], $fecha_format[0]))) > date("md") ? ((date("Y") - $fecha_format[0]) - 1) : (date("Y") - $fecha_format[0]));


        //Coge la enum de los grupos existentes
        $type = $mysqli->query("SHOW COLUMNS FROM usuarios WHERE Field = 'grupo'")->fetch_array(MYSQLI_ASSOC)['Type'];
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);

        if ($edad < 30) { //Si es menor de 30 años, entonces eres Junior
            $grupo_edad = $genero[0]." Junior";
        }

        else { //Si no eres Senior
            $grupo_edad = $genero[0]." Senior";
        }

        $sql = "UPDATE usuarios SET grupo='$grupo_edad' WHERE correo='$correo'"; //Cambia el grupo
        $mysqli->query($sql) or die($mysqli->error);
    }

    $mysqli->close();
    header("Location: ../Vistas/perfil.php");
    exit();
?>
