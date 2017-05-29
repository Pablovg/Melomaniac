<?php session_start(); ?>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link href="../css/general.css" type="text/css" rel="stylesheet" />
    <link href="../css/form.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <title>Administrador</title>
</head>

<body>
    <div class="card">

        <h1>Añadir grupo</h1>

        <form id="admin" action="../Funcionalidad/procesar_añadir_grupo.php" method="post">
            <input type="text" placeholder="Nuevo grupo" name="nuevo_grupo"/>
            <input type="submit" value="Añadir"/>
            <a id="añadir" class="myButton" href="../Funcionalidad/logout.php">Cerrar Sesión</a>
        </form>

    </div>
</body>

</html>
