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
    <title>Registrarse</title>
</head>
<body>
    <div class="card">

        <h1>Registrarse</h1>

        <form id="signup" action="process_signup.php" method="post">
            <input type="email" placeholder="Email" name="correo"/>
            <input type="password" placeholder="Contraseña" name="contraseña"/>
            <input type="password" placeholder="Confirmar contraseña" name="confirmar_contraseña"/>
            <input type="submit" value="Registrarse" />
        </form>

    </div>
</body>
</html>
