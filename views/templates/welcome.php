<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: /Electroline/inventory");
}
if (isset($_SESSION['user_id'])) {
    header("Location: /Electroline/home");
}

# Barra de navegacion
include "navbar.php";
?>
<script>
    document.getElementById("loginIcon").style.display = "block";
    document.getElementById("carIcon").style.display = "none";
    document.getElementById("exitIcon").style.display = "none";
</script>

<div style="overflow-y: scroll; height: 90vh;">
    <!-- Cuerpo de la bienvenida -->
    <div id="welcomeContainer">
        <div style="height: 92vh;">
            <div class="row center-align valign-wrapper">
                <div class="col s8 offset-s2">
                    <h4> <strong class="grey-text text-darken-3"> MUCHO MAS QUE UN SITIO DE COMERCIO ELECTRÓNICO </strong> </h4>
                    <h6 class="header"><button id="creaTuCuentaAhora" class="btn-small red lighten-2 pulse" onclick="$('.tap-target').tapTarget('open')">Crea tu cuenta ahora</button> y disfruta de una experiencia completa</h6>
                </div>
            </div>
            <div class="carousel carousel-slider parallax-container" style="max-height: 65vh;">
                <div class="carousel-fixed-item center-align row">
                    <div class="col l2 offset-l3">
                        <a class="btn-small waves-effect red lighten-2" id="loMasNuevo">Lo más nuevo</a>
                    </div>
                    <div class="col l2">
                        <a class="btn-small waves-effect red lighten-2" id="quienesSomos">¿Quienes somos?</a>
                    </div>
                    <div class="col l2">
                        <a class="btn-small waves-effect red lighten-2" id="contactanos">Contáctanos</a>
                    </div>
                </div>
                <a class="carousel-item parallax"><img src="views/static/img/12.jpg"></a>
                <a class="carousel-item parallax"><img src="views/static/img/10.jpg"></a>
                <a class="carousel-item parallax"><img src="views/static/img/9.jpg"></a>
                <a class="carousel-item parallax"><img src="views/static/img/11.jpg"></a>
                <a class="carousel-item parallax"><img src="views/static/img/13.jpg"></a>
            </div>
        </div>
        <div id="seccionLoMasNuevo" class="section white valign-wrapper" style="padding-left: 10vh; padding-right: 10vh; height: 100%;padding-top: 1vh;">
            <div class="row">
                <h4 class="center"> <strong class="grey-text text-darken-3"> LO MÁS NUEVO </strong> </h4>
                <div id="contenedorLoMasNuevo"></div>
            </div>
        </div>
        <br>
        <div id="seccionQuienesSomos" class="parallax-container oscurecer valign-wrapper" style="height: 91vh;">
            <div class="parallax"><img src="views/static/img/19.jpg"></div>
            <div class="row" style="padding: 5vh;">
                <div class="col l6 offset-l6 s12 center-align white-text" style="border: 2px solid white;">
                    <h3> <strong> ¿ QUIENES SOMOS ? </strong> </h3>
                    <p style="text-align: justify;">
                        Somos una empresa orgullosamente mexicana, forjada con el trabajo de nuestro equipo que puso los cimientos y preparó a nuevos miebros de esta familia con los principios de trabajo, compromiso, responsabilidad y visión, valores que hoy nos distinguen.
                    </p>
                    <br>
                    <div class="row">
                        <div class="col s10 offset-s1" style="text-align: justify;">
                            <p><i class="fas fa-certificate fa-spin"></i> Nuestro objetivo es tener clientes contentos y satisfechos, para ello buscamos certificar nuestros procesos.</p>
                        </div>
                        <div class="col s10 offset-s1" style="text-align: justify;">
                            <p><i class="fas fa-certificate fa-spin"></i> Nuestra misión es mejorar la vida de las personas mediante soluciones en electrónica y tecnología.</p>
                        </div>
                        <div class="col s10 offset-s1" style="text-align: justify;">
                            <p><i class="fas fa-certificate fa-spin"></i> Nuestra visión es ser una marca multicanal que integre los puntos de venta y la plataforma digital garantizando el valor agregado a nuestros clientes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="seccionContactanos" class="page-footer white">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h4> <strong class="red-text text-lighten-2"> CONTÁCTANOS </strong> </h4>
                    <div class="row">
                        <form action="" method="post">
                            <div class="input-field col s12">
                                <i class="material-icons prefix red-text text-lighten-2">account_circle</i>
                                <input id="name" type="text" class="validate">
                                <label for="name" class="">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix red-text text-lighten-2">mail</i>
                                <input id="email" type="email" class="validate">
                                <label for="email" class="">Email</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix red-text text-lighten-2">mail</i>
                                <textarea id="issueContact" class="materialize-textarea"></textarea>
                                <label for="issueContact" class="">Textarea</label>
                            </div>
                            <div class="input-field col s12 right-align">
                                <button class="btn waves-effect waves-light red lighten-2" type="submit" name="action">Enviar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col l4 offset-l1 s12 center-align" style="padding-top: 15vh;">
                    <a class="brand-logo red-text text-lighten-2 waves-effect pulse"><i class="fab fa-9x fa-accusoft"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright red lighten-2">
            <div class="container">
                © 2020 Copyright | Electroline - Todos los derechos reservados
                <a class="grey-text text-lighten-4 right" href="#!">Nombres del equipo</a>
            </div>
        </div>
    </footer>
</div>