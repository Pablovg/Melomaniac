<?php session_start(); ?>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link href="css/general.css" type="text/css" rel="stylesheet" />
    <link href="css/perfil.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>
    <script>
        var currentPage = 'perfil';
    </script>
    <title>Perfil</title>
</head>
<body>

    <?php include('nav.php'); ?>

    <div class="container">
        <div class="content">
            <img alt="foto" src="img/Fotos/<?php
            if (isset($_SESSION['foto'])) {
                echo $_SESSION['foto'];
            }

            else {
                echo 'noimage.jpg';
            }
            ?>">
            <a class="ajustes" href="configuracion.php"><i class="fa fa-cogs"></i></a>
            <h1><?php
                    if (isset($_SESSION['nombre'])) {
                        echo $_SESSION['nombre'];
                    }

                    else {
                        echo 'Nombre de usuario';
                    }
             ?></h1>
            <ul>
                <li><i class="fa fa-envelope"></i><?php echo $_SESSION['correo']; ?></li>
                <li><i class="fa fa-users"></i><?php
                    if (isset($_SESSION['grupo'])) {
                        echo $_SESSION['grupo'];
                    }

                    else {
                        echo 'Elige un grupo';
                    }
                 ?></li>
                <li><i class="fa fa-birthday-cake"></i><?php
                        if (isset($_SESSION['fecha'])) {
                            echo $_SESSION['fecha'];
                        }

                        else {
                            echo 'Fecha de nacimiento';
                        }
                 ?></li>
                <li><i class="fa fa-drivers-license"></i><?php
                    if (isset($_SESSION['descripcion'])) {
                        echo $_SESSION['descripcion'];
                    }

                    else {
                        echo 'Descripción';
                    }
                ?></li>
            </ul>
            <a class="myButton" href="logout.php">Cerrar Sesión</a>
        </div>
    </div>

</body>
</html>
