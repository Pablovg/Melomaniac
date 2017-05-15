<?php session_start(); ?>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link href="css/general.css" type="text/css" rel="stylesheet" />
    <link href="css/form.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>
    <title>Nueva Contraseña</title>
</head>
<body>
    <div class="card">

        <h1>Contraseña</h1>

        <form id="forgotpass" action="process_forgotpass.php" method="post">
            <input type="email" placeholder="Email" name="correo"/>
            <input type="submit" value="Enviar email" />
        </form>

        <div class="help">
          <p>Recibe un email para cambiar tu contraseña</p>
        </div>

    </div>
</body>
</html>
