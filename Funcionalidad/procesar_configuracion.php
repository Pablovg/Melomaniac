<?php session_start();

    include('conectar.php');
    $correo = $_SESSION['correo'];

     if (isset($_FILES['foto']) && $_FILES['foto']['name'] != '') {
        $foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $ruta = '../img/Fotos/'.$foto;

        move_uploaded_file($tmp_foto, $ruta);

        $sql = "UPDATE usuarios SET foto='$foto' WHERE correo='$correo'";
        $mysqli->query($sql) or die($mysqli->error);
    }

    if (!empty($_REQUEST['nombre'])) {
        $nombre = $_REQUEST['nombre'];
        $sql = "UPDATE usuarios SET nombre='$nombre' WHERE correo='$correo'";
        $mysqli->query($sql) or die($mysqli->error);
    }

    if (!empty($_REQUEST['genero']) && $_REQUEST['genero'] != 'none') {
        $genero = $_REQUEST["genero"];
        $sql = "UPDATE usuarios SET genero_musical='$genero' WHERE correo='$correo'";
        $mysqli->query($sql) or die($mysqli->error);
    }

    if (!empty($_REQUEST['fecha_de_nacimiento'])) {
		$fecha = $_REQUEST['fecha_de_nacimiento'];
        $sql = "UPDATE usuarios SET fecha_de_nacimiento='$fecha' WHERE correo='$correo'";
        $mysqli->query($sql) or die($mysqli->error);
    }

    if (!empty($_REQUEST['descripcion'])) {
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

    if (!is_null($genero) && !is_null($fecha)) {
        

        //Obtener edad a partir de la fecha de nacimiento
        $fecha_format = explode("-", $fecha[0]);
        $edad = (date("md", date("U", mktime(0, 0, 0, $fecha_format[2], $fecha_format[1], $fecha_format[0]))) > date("md") ? ((date("Y") - $fecha_format[0]) - 1) : (date("Y") - $fecha_format[0]));


        if ($edad < 30) {

            switch ($genero[0]) {
                case 'Rock':
                    $grupo_edad = 'Rock_Junior';
                break;
                
                case 'Rap':
                    $grupo_edad = 'Rap_Junior';
                break;
                
                case 'Pop':
                    $grupo_edad = 'Pop_Junior';
                break;
                
                case 'Electronica':
                    $grupo_edad = 'Electronica_Junior';
                break;
                
                case 'Jazz':
                    $grupo_edad = 'Jazz_Junior';
                break;
                
                case 'Heavy':
                    $grupo_edad = 'Heavy_Junior';
                break;
                
                case 'Punk':
                    $grupo_edad = 'Punk_Junior';
                break;
                
                case 'Techno':
                    $grupo_edad = 'Techno_Junior';
                break;
                
                case 'Trap':
                    $grupo_edad = 'Trap_Junior';
                break;
                
                case 'Indie':
                    $grupo_edad = 'Indie_Junior';
                break;
            }

        }

        else {

            switch ($genero[0]) {
                case 'Rock':
                    $grupo_edad = 'Rock_Senior';
                break;
                
                case 'Rap':
                    $grupo_edad = 'Rap_Senior';
                break;
                
                case 'Pop':
                    $grupo_edad = 'Pop_Senior';
                break;
                
                case 'Electronica':
                    $grupo_edad = 'Electronica_Senior';
                break;
                
                case 'Jazz':
                    $grupo_edad = 'Jazz_Senior';
                break;
                
                case 'Heavy':
                    $grupo_edad = 'Heavy_Senior';
                break;
                
                case 'Punk':
                    $grupo_edad = 'Punk_Senior';
                break;
                
                case 'Techno':
                    $grupo_edad = 'Techno_Senior';
                break;
                
                case 'Trap':
                    $grupo_edad = 'Trap_Senior';
                break;
                
                case 'Indie':
                    $grupo_edad = 'Indie_Senior';
                break;
            }
            
        }

        $sql = "UPDATE usuarios SET grupo='$grupo_edad' WHERE correo='$correo'";
        $mysqli->query($sql) or die($mysqli->error);
    }

    $mysqli->close();
    header("Location: ../Vistas/perfil.php");
    exit;
?>
