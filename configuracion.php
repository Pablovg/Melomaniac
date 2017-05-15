<?php session_start(); ?>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link href="css/general.css" type="text/css" rel="stylesheet" />
    <link href="css/configuracion.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>
    <script>
        var currentPage = 'perfil';
    </script>
    <title>Configuración</title>
</head>
<body>

    <?php include('nav.php'); ?>

    <div class="container">
        <div class="content">

            <h1 class="text-center"><i class="fa fa-cog"></i>Configuración</h1>

            <form class="contacto" enctype="multipart/form-data" action="process_settings.php" method="post">
                <div>
                    <label> Nombre completo:</label>
                    <input type='text' name="nombre">
                </div>

                <div>
                    <label> Grupo:</label>
                    <input type='' name="grupo">
                </div>

                <div>
                    <label> Fecha de nacimiento:</label>
                    <input type='date' name="fecha">
                </div>

                <div>
                    <label>Imagen de perfil:</label>
                    <input type="file" name="foto" accept="image/*">
                </div>

                <div>
                    <label>Descipción:</label>
                    <textarea name="descripcion" rows='3'></textarea>
                </div>

                <input class="myButton" type="submit" value="Cambiar">
           </form>
       </div>
    </div>

</body>
</html>
