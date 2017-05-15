<?php session_start();

    include('connect.php');

    $correo = $_SESSION['correo'];

    if (!empty($_REQUEST['fecha'])) {
		$fecha = $_REQUEST["fecha"];

        $sql = "UPDATE usuarios SET fecha='$fecha' WHERE correo='$correo'";

        if ($mysqli->query($sql) !== TRUE) {
            die("Error: " . $sql . "<br>" . $mysqli->error);
        }

         $_SESSION['fecha'] = $fecha;
    }

    if (!empty($_REQUEST['descripcion'])) {
		$descripcion = $_REQUEST["descripcion"];

        $sql = "UPDATE usuarios SET descripcion='$descripcion' WHERE correo='$correo'";

        if ($mysqli->query($sql) !== TRUE) {
           die("Error: " . $sql . "<br>" . $mysqli->error);
        }

         $_SESSION['descripcion'] = $descripcion;
    }

    if (isset($_FILES['foto']) && $_FILES['foto']['name'] != '') {
        $foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $ruta = 'img/Fotos/'.$foto;

        move_uploaded_file($tmp_foto, $ruta);

        $sql = "UPDATE usuarios SET foto='$foto' WHERE correo='$correo'";

        if ($mysqli->query($sql) !== TRUE) {
           die("Error: " . $sql . "<br>" . $mysqli->error);
        }

         $_SESSION['foto'] = $foto;
    }

    if (!empty($_REQUEST['nombre'])) {
		$nombre = $_REQUEST['nombre'];

        $sql = "UPDATE usuarios SET nombre='$nombre' WHERE correo='$correo'";

        if ($mysqli->query($sql) !== TRUE) {
            die("Error: " . $sql . "<br>" . $mysqli->error);
        }

         $_SESSION['nombre'] = $nombre;
    }

    if (!empty($_REQUEST['grupo'])) {
		$grupo = $_REQUEST["grupo"];

        $sql = "UPDATE usuarios SET grupo='$grupo' WHERE correo='$correo'";

        if ($mysqli->query($sql) !== TRUE) {
            die("Error: " . $sql . "<br>" . $mysqli->error);
        }

        $_SESSION['grupo'] = $grupo;
    }

    $mysqli->close();
    header("Location:perfil.php");
    exit;
?>
