<?php 
    session_start(); 
    include('../Funcionalidad/cargar_usuario.php'); //Cargar el objeto usuario

    if ($usuario->getTipo() == "admin") { //Si se loguea como admin mándalo a la página de admin
        header("Location: administrador.php");
        exit;
    }
?>

<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link href="../css/general.css" type="text/css" rel="stylesheet" />
    <link href="../css/configuracion.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
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

            <form class="contacto" id="settings" enctype="multipart/form-data" action="../Funcionalidad/procesar_configuracion.php" method="post">
                <div>
                    <label> Nombre completo:</label>
                    <input type='text' name="nombre">
                </div>

                <div>
                    <label> Género musical favorito:</label>
                    <select name="genero" form="settings">
                        <option value="none"></option>
                        <?php //Sé que no debeían haber queries en las vistas, pero parecía mas eficiente así
                            include ('../Funcionalidad/conectar.php');

                            //Coge la enum de los géneros musicales existentes
                            $type = $mysqli->query("SHOW COLUMNS FROM usuarios WHERE Field = 'genero_musical'")->fetch_array(MYSQLI_ASSOC)['Type'];
                            preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
                            $enum = explode("','", $matches[1]);

                            //Muestra un alista de los géneros musicales
                            foreach ($enum as $field) {
                                echo '<option value="'.$field.'">'.$field.'</option>';
                            }

                            $mysqli->close();
                        ?>
                    </select>
                </div>

                <div>
                    <label> Fecha de nacimiento:</label>
                    <input type='date' name="fecha_de_nacimiento">
                </div>

                <div>
                    <label> Imagen de perfil:</label>
                    <input type="file" name="foto" accept="image/*">
                </div>

                <div>
                    <label> Descipción:</label>
                    <textarea name="descripcion" rows='3'></textarea>
                </div>

                <input class="myButton" type="submit" value="Cambiar">
           </form>
       </div>
    </div>

</body>
</html>
