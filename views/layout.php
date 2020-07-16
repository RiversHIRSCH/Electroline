<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- jQuery -->
    <script src="views/static/js/jquery-3.5.1.min.js"></script>
    <!-- Materialize-v1.0.0 -->
    <link type="text/css" rel="stylesheet" href="views/static/materialize/css/materialize.min.css" media="screen,projection">
    <script type="text/javascript" src="views/static/materialize/js/materialize.min.js"></script>
    <!-- fontawesome-free-5.13.1-web -->
    <link rel="stylesheet" href="views/static/fontawesome/css/all.css">
    <script src="views/static/fontawesome/js/all.js"></script>
    <!-- init JS -->
    <script src="views/static/js/init.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="views/static/css/main.css">
    <!-- Custom JS -->
    <script src="views/static/js/main.js"></script>
</head>

<body id="cuerpo">
    <!-- Barra de navegacion -->
    <?php include "templates/navbar.php"; ?>

    <!-- Formulario oculto para paso de datos -->
    <form id="infoForm" action="./home" method="post" style="display: none;">
        <input type="text" id="info" name="info" value="">
    </form>

    <?php
    require_once "./drivers/viewsDriver.php";
    $vt = new viewsDriver();
    $vistasR = $vt->obtenerVistasControlador();

    if ($vistasR == "welcome") {
        require_once "./views/templates/welcome.php";
    ?>
        <script>
            var scr = document.getElementById('cuerpo');
            scr.style.cssText = 'overflow-y: scroll;';
        </script>
    <?php
    } else {
    ?>
        <script>
            var scr = document.getElementById('cuerpo');
            scr.style.cssText = 'overflow-y: hidden;';
        </script>

        <!-- Vista solicitada -->
        <?php require_once $vistasR; ?>
    <?php
    }
    ?>

    <!-- Flotante de redes sociales -->
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons tooltipped" data-position="bottom" data-tooltip="Redes">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating blue"><i class="fab fa-facebook-f"></i></a></li>
            <li><a class="btn-floating grey"><i class="fab fa-discord"></i></a></li>
            <li><a class="btn-floating green"><i class="fab fa-whatsapp"></i></a></li>
            <li><a class="btn-floating blue"><i class="fab fa-twitter"></i></a></li>
        </ul>
    </div>
</body>

</html>