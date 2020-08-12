<?php
session_start();

# CONEXION
require_once './models/conexion.php';
# NAVBAR
include "navbar.php";

if (isset($_POST['info'])) {
    echo '
    <script>
        $("#search").val("' . $_POST['info'] . '");
        obtenerDatosGenerales();
    </script>
    ';
}

if (isset($_SESSION['user_id'])) {
    $idUsuario = $_SESSION['user_id'];
    $stmt = Conexion::conectar()->prepare("SELECT id, nombre, correo FROM usuarios WHERE id='$idUsuario';");
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $usuario = null;
    if (count($resultado) > 0) {
        $usuario = $resultado;
        $stmt = null;
    }
?>
    <script>
        document.getElementById("contenedorBuscador").style.display = "block";
        document.getElementById("loginIcon").style.display = "none";
        document.getElementById("carIcon").style.display = "block";
        document.getElementById("exitIcon").style.display = "block";
        $('#nombreUsuarioNav').empty();
        $('#nombreUsuarioNav').append("<?= $usuario['nombre'] ?>");
        $('#correoUsuarioNav').empty();
        $('#correoUsuarioNav').append("<?= $usuario['correo'] ?>");
        $('#btnCarrito').on('click', function() {
            obtenerCarrito("<?= $usuario['id'] ?>");
        });
        let idUsuarioGlobal = "<?= $usuario['id'] ?>";
    </script>
<?php
} else {
?>
    <script>
        document.getElementById("contenedorBuscador").style.display = "block";
        document.getElementById("loginIcon").style.display = "block";
        document.getElementById("carIcon").style.display = "none";
        document.getElementById("exitIcon").style.display = "none";
        let idUsuarioGlobal = 0;
    </script>
<?php
}
?>
<div class="row">
    <!-- Menu -->
    <div class="col l3 m4 s12 white" style="min-height: 90vh; border-right: 5px solid #64b5f6;">
        <!-- Inputs para rango de precio -->
        <div class="row center-align">
            <br>
            <div class="col l8 offset-l2">
                <h6>Busqueda por rango de precio</h6>
            </div>
            <div class="col l3 offset-l1">
                <div class="input-field-small">
                    <input id="minimo" type="number" min="1" class="validate center-align">
                    <label for="minimo">Mínimo</label>
                </div>
            </div>
            <div class="col l1">
                <div class="input-field">
                    <i class="fas fa-minus"></i>
                </div>
            </div>
            <div class="col l3">
                <div class="input-field-small">
                    <input id="maximo" type="number" min="1" class="validate center-align">
                    <label for="maximo">Máximo</label>
                </div>
            </div>
            <div class="col l2" style="padding-top: 1vh;">
                <button class="btn-small blue lighten-2" onclick="busquedaPorRangoDePrecio();">Buscar</button>
            </div>
        </div>
        <br><br>
        <!-- Lista de categorias en el menu vertical -->
        <div class="row center-align">
            <div class="col l8 offset-l2">
                <h6>Busqueda por categoría</h6>
            </div>
            <br><br>
            <!-- Dropdown Trigger -->
            <a class='dropdown-trigger btn blue lighten-2' href='#' data-target='dropdown'>Categorías<i class="material-icons right">arrow_drop_down</i></a>
            <!-- Dropdown Structure -->
            <ul id='dropdown' class='dropdown-content'>
                <li><a class="blue-text text-lighten-2" onclick="buscarPorCategoria('audio');">Audio</a></li>
                <li><a class="blue-text text-lighten-2" onclick="buscarPorCategoria('cableado');">Cableado</a></li>
                <li><a class="blue-text text-lighten-2" onclick="buscarPorCategoria('iluminación');">Iluminación</a></li>
                <li><a class="blue-text text-lighten-2" onclick="buscarPorCategoria('componentes');">Componentes</a></li>
            </ul>
        </div>
    </div>
    <!-- Dashboard -->
    <div class="col l9 m8 s12 white">
        <div class="row">
            <h6 id="tituloDashboard" class="center-align">Resultados de busqueda...</h6>
            <div id="cardVacio" class="col s12 center-align" style="display: none;">
                <div class="row">
                    <div class="col s6 offset-s3">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Atención!</span>
                                <p style="text-align: justify;">No existen resultados con los parámetros seleccionados anteriormente</p>
                                <hr>
                                <p class="center-align"><small><i class="fas fa-spin fa-sync-alt"></i> Intente restablecer los parámetros de busqueda</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="busqueda"></div>
        </div>
    </div>
</div>

<!-- Modal Structure PEDIDO -->
<div id="modalPedido" class="modal">
    <div class="modal-content">
        <h4>Pedido Guardado</h4>
        <p style="text-align: justify;">Tu pedido ha sido guardado. Podrás recogerlo en nuestra sucursal en nuestros horarios de atención.</p>
        <br>
        <small class="blue-text">NOTA</small>
        <br>
        <small class="blue-text">No podrás hacer un nuevo pedido hasta recoger o cancelar el pedido actual.</small>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-teal btn-flat">Aceptar</a>
    </div>
</div>