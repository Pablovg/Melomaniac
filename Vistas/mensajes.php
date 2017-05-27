<?php 
    session_start();
    include('../Funcionalidad/cargar_usuario.php');
    include('../Funcionalidad/cargar_mensajes.php');
?>


<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link href="../css/general.css" type="text/css" rel="stylesheet" />
    <link href="../css/mensajes.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script>
        var currentPage = 'mensajes';

        function showDiv(opt) {

            switch(opt) {
                case 1:
                    $("#nuevo_mensaje").show();
                    $("#bandeja_de_entrada").hide();
                    $("#enviados").hide();
                    $("#grupo").hide();
                    $("#leer").hide();
                    $("#nav1").addClass("current");
                    $("#nav2").removeClass("current");
                    $("#nav3").removeClass("current");
                    $("#nav4").removeClass("current");
                    break;
                
                case 2:
                    $("#nuevo_mensaje").hide();
                    $("#bandeja_de_entrada").show();
                    $("#enviados").hide();
                    $("#grupo").hide();
                    $("#leer").hide();
                    $("#nav1").removeClass("current");
                    $("#nav2").addClass("current");
                    $("#nav3").removeClass("current");
                    $("#nav4").removeClass("current");
                    break;

                case 3:
                    $("#nuevo_mensaje").hide();
                    $("#bandeja_de_entrada").hide();
                    $("#enviados").show();
                    $("#grupo").hide();
                    $("#leer").hide();
                    $("#nav1").removeClass("current");
                    $("#nav2").removeClass("current");
                    $("#nav3").addClass("current");
                    $("#nav4").removeClass("current");
                    break;

                case 4:
                    $("#nuevo_mensaje").hide();
                    $("#bandeja_de_entrada").hide();
                    $("#enviados").hide();
                    $("#grupo").show();
                    $("#leer").hide();
                    $("#nav1").removeClass("current");
                    $("#nav2").removeClass("current");
                    $("#nav3").removeClass("current");
                    $("#nav4").addClass("current");
                    break;
            }
        }

        function sendAll(opt) {

            switch(opt) {
                case 1:
                    $("#para").val("TODOS");
                    break;

                case 2:
                    $("#para").val("GRUPO");
                    break;
            }
        }
    </script>
    <title>Mensajes</title>
</head>

<body>

    <?php 
        include('nav.php');
    ?>

    <div class="content">
        <nav id="mensajes">
            <ul>
                <li><a id="nav1" onclick="showDiv(1)"><i class="fa fa-commenting-o"></i>Nuevo mensaje</a></li>
                <li><a id="nav2" onclick="showDiv(2)"><i class="fa fa-comments-o"></i>Bandeja de entrada</a></li>
                <li><a id="nav3" onclick="showDiv(3)"><i class="fa fa-comment-o"></i>Enviados</a></li>
                <li><a id="nav4" onclick="showDiv(4)"><i class="fa fa-comments"></i>Grupo</a></li>
            </ul>
        </nav>

        <div id="cuerpo">
            <div class="show" id="nuevo_mensaje">
                <form action="../Funcionalidad/procesar_enviar_mensaje.php" method="post">
                    <div>
                        <label for="para">Para: </label>
                        <input type="text" placeholder="Email" id="para" name="para"/>
                        <a class="sendAll" title="Enviar a todos" onclick="sendAll(1)"><i class="fa fa-reply-all"></i></a>
                        <a class="sendAll" title="Enviar a todo el grupo" onclick="sendAll(2)"><i class="fa fa-users"></i></a>
                    </div>

                    <div>
                        <label for="asunto">Asunto: </label>
                        <input type="text" placeholder="Ej: Trabajo, vaciones, cumpleaños..." id="asunto" name="asunto"/>
                    </div>

                    <div>
                        <label for="mensaje">Mensaje: </label>
                        <textarea name="mensaje"></textarea>
                    </div>

                    <div>
                        <input type="submit" value="Enviar" class="myButton"/>
                    </div>
                </form>
            </div>

            <div class="show" id="bandeja_de_entrada">
                <?php 
                    if (isset($recibidos) && count($recibidos) > 0) { ?>

                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th class="border-right">Asunto</th>
                                <th class="border-right">Enviado por</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($recibidos as $recibido) {
                                    echo '
                                        <tr>
                                            <td class="border-right"><a href="mensajes.php?tipo=recibidos&id='.$recibido->getId().'"">'.$recibido->getAsunto().'</a></td>
                                            <td class="border-right">'.$recibido->getEmisor().'</td>
                                            <td>'.$recibido->getFecha().'</td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>

                <?php 
                    }

                    else {
                        echo 'No has recibido ningún mensaje :(';
                    }
                ?>
            </div>

            <div class="show" id="enviados">
                <?php 
                    if (isset($enviados) && count($enviados) > 0) { ?>

                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th class="border-right">Asunto</th>
                                <th class="border-right">Enviado a</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($enviados as $enviado) {
                                    echo '
                                        <tr>
                                            <td class="border-right"><a href="mensajes.php?tipo=enviados&id='.$enviado->getId().'">'.$enviado->getAsunto().'</a></td>
                                            <td class="border-right">'.$enviado->getReceptor().'</td>
                                            <td>'.$enviado->getFecha().'</td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>

                <?php 
                    }

                    else {
                        echo 'No has enviado ningún mensaje :O';
                    }
                ?>
            </div>

            <div class="show" id="grupo">
                <?php 
                    if (isset($grupos) && count($grupos) > 0) { ?>

                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th class="border-right">Asunto</th>
                                <th class="border-right">Enviado por</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($grupos as $group) {
                                    echo '
                                        <tr>
                                            <td class="border-right"><a href="mensajes.php?tipo=grupos&id='.$group->getId().'">'.$group->getAsunto().'</a></td>
                                            <td class="border-right">'.$group->getEmisor().'</td>
                                            <td>'.$group->getFecha().'</td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>

                <?php 
                    }

                    else {
                        echo 'No has recibido ningún mensaje grupal :s';
                    }
                ?>
            </div>

            <?php
                if (isset($_REQUEST["tipo"])) {
                    echo '<div id="leer">';
                    if ($_REQUEST["tipo"] == "recibidos") {
                        foreach ($recibidos as $recibido) {
                            if ($recibido->getId() == $_REQUEST["id"]) {
                                echo '
                                    <div>
                                        <label>De: </label>'.$recibido->getEmisor().'
                                    </div>
                                    <div>
                                        <label>Asunto: </label>'.$recibido->getAsunto().'
                                    </div>
                                    <div>
                                        <label>Mensaje: </label>
                                        <div id="mensaje">
                                            '.$recibido->getMensaje().'
                                        </div>
                                    </div>
                                    ';
                            }
                        }
                    }

                    else if ($_REQUEST["tipo"] == "enviados") {
                         foreach ($enviados as $enviado) {
                            if ($enviado->getId() == $_REQUEST["id"]) {
                                echo '
                                    <div>
                                        <label>Para: </label>'.$enviado->getReceptor().'
                                    </div>
                                    <div>
                                        <label>Asunto: </label>'.$enviado->getAsunto().'
                                    </div>
                                    <div>
                                        <label>Mensaje: </label>
                                        <div id="mensaje">
                                            '.$enviado->getMensaje().'
                                        </div>
                                    </div>
                                    ';
                            }
                        }
                    }

                    else if ($_REQUEST["tipo"] == "grupos") {
                         foreach ($grupos as $group) {
                            if ($group->getId() == $_REQUEST["id"]) {
                                echo '
                                    <div>
                                        <label>De: </label>'.$group->getEmisor().'
                                    </div>
                                    <div>
                                        <label>Asunto: </label>'.$group->getAsunto().'
                                    </div>
                                    <div>
                                        <label>Mensaje: </label>
                                        <div id="mensaje">
                                            '.$group->getMensaje().'
                                        </div>
                                    </div>
                                    ';
                            }
                        }
                    }
                }
                echo '</div>';
            ?>
        </div>
    </div>
</body>

</html>
