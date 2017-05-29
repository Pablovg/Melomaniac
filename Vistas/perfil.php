<?php 
    session_start();
    include('../Funcionalidad/cargar_usuario.php');

    if ($usuario->getTipo() == "admin") {
        header("Location: administrador.php");
        exit;
    }
?>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link href="../css/general.css" type="text/css" rel="stylesheet" />
    <link href="../css/perfil.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script>
        var currentPage = 'perfil';
    </script>
    <title>Perfil</title>
</head>
<body>

    <?php
        include('nav.php'); 
    ?>

    <div class="container">
        <div class="content">
            <img alt="foto" src="../img/Fotos/<?php
            if (!is_null($usuario->getFoto())) {
                echo $usuario->getFoto();
            }

            else {
                echo 'noimage.jpg';
            }
            ?>">
            <a class="ajustes" href="configuracion.php"><i class="fa fa-cogs"></i></a>
            <h1><?php
                if (!is_null($usuario->getNombre())) {
                    echo $usuario->getNombre();
                }

                else {
                    echo 'Nombre de usuario';
                }
             ?></h1>
            <ul>
                <li><i class="fa fa-envelope"></i><?php echo $usuario->getCorreo(); ?></li>
                <li><i class="fa fa-birthday-cake"></i><?php
                    if (!is_null($usuario->getFecha())) {
                        echo $usuario->getFecha();
                    }

                    else {
                        echo 'Fecha de nacimiento';
                    }
                 ?></li>
                 <li><i class="fa fa-music"></i><?php
                    if (!is_null($usuario->getGenero())) {
                        echo $usuario->getGenero();
                    }

                    else {
                        echo 'Elige tu género musical favorito';
                    }
                 ?></li>
                 <li><i class="fa fa-users"></i><?php
                    if (!is_null($usuario->getGrupo())) {
                        echo $usuario->getGrupo();
                    }

                    else {
                        echo 'Tu grupo se define con el género musical y tu edad';
                    }
                 ?></li>
                <li><i class="fa fa-drivers-license"></i><?php
                    if (!is_null($usuario->getDescripcion())) {
                        echo $usuario->getDescripcion();
                    }

                    else {
                        echo 'Descripción';
                    }
                ?></li>
            </ul>
            <a class="myButton" href="../Funcionalidad/logout.php">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
