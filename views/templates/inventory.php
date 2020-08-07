<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    # Barra de navegacion
    include "navbar.php";
?>
    <script>
        document.getElementById('cuerpo').style.cssText = 'overflow-y: hidden;';
        document.getElementById("loginIcon").style.display = "none";
        document.getElementById("carIcon").style.display = "none";
        document.getElementById("exitIcon").style.display = "block";
        $('#nombreUsuarioNav').empty();
        $('#nombreUsuarioNav').append("Admin");
        $('#correoUsuarioNav').empty();
        $('#correoUsuarioNav').append("admin@admin");
    </script>

    <!-- Modal Agregar Inventario -->
    <div id="modalInventario" class="modal">
        <form id="formInventario">
            <div class="modal-content">
                <div class="row">
                    <h4 id="tituloModalInventario" class="center grey-text"></h4>
                    <input type="text" id="idProducto" name="idProducto" style="display: none;">
                    <input type="text" id="accion" name="accion" style="display: none;">
                    <div class="input-field col s6">
                        <input id="nombreProducto" name="nombreProducto" type="text" class="validate" required>
                        <label for="nombreProducto">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="marcaProducto" name="marcaProducto" type="text" class="validate" required>
                        <label for="marcaProducto">Marca</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="precioProducto" name="precioProducto" type="number" class="validate" required>
                        <label for="precioProducto">Precio</label>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="btn-small red lighten-2 waves-effect waves-light">
                            <span>Imagen</span>
                            <input type="file" id="imagenProducto" name="imagenProducto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Elige una imagen">
                        </div>
                    </div>
                    <div class="input-field col s6" style="display: none;">
                        <input id="categoriaProducto" type="text" class="validate" required>
                        <input type="text" id="idCategoria" name="idCategoria">
                    </div>
                    <div class="input-field col s12">
                        <textarea id="descripcionProducto" name="descripcionProducto" class="materialize-textarea" required></textarea>
                        <label for="descripcionProducto">Descripción</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <button type="submit" class="waves-effect waves-green btn-flat">Guardar</button>
            </div>
        </form>
    </div>

    <!-- Modal Editar Inventario -->
    <div id="modalEditarInventario" class="modal">
        <form id="formEditarInventario">
            <div class="modal-content">
                <div class="row valign-wrapper">
                    <div class="col s8 left-align">
                        <h4 id="tituloModalEditarInventario" class="grey-text"></h4>
                    </div>
                    <div class="col s4 right-align">
                        <img src="" id="vizualizadorImagen" style="height: 60px;padding-left: 2vh;">
                    </div>
                </div>
                <div class="row">
                    <input type="text" id="idProductoE" name="idProductoE" style="display: none;">
                    <input type="text" id="accionE" name="accion" value="editar" style="display: none;">
                    <input type="text" id="categoriaProductoE" name="categoriaProductoE" style="display: none;">
                    <input type="text" id="idCategoriaE" name="idCategoriaE" style="display: none;">
                    <div class="input-field col s6">
                        <input id="nombreProductoE" name="nombreProductoE" type="text" class="validate" required>
                    </div>
                    <div class="input-field col s6">
                        <input id="marcaProductoE" name="marcaProductoE" type="text" class="validate" required>
                    </div>
                    <div class="input-field col s6">
                        <input id="precioProductoE" name="precioProductoE" type="number" class="validate" required>
                    </div>
                    <div class="file-field input-field col s6">
                        <div class="btn-small red lighten-2 waves-effect waves-light">
                            <span>Cambiar imagen</span>
                            <input type="file" id="imagenProductoE" name="imagenProductoE">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Elige una imagen">
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="descripcionProductoE" name="descripcionProductoE" class="materialize-textarea" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                <button type="submit" class="waves-effect waves-green btn-flat">Guardar</button>
            </div>
        </form>
    </div>

    <div class="row">
        <!-- CONTENIDO -->
        <div class="col s12 m9 l10" style="overflow-y: hidden; height: 92vh">
            <div id="seccionAudio" class="section" style="padding-left: 5vh;">
                <div class="row">
                    <br>
                    <div class="col l4 offset-l4">
                        <div class="row valign-wrapper">
                            <div class="col l6">
                                <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Audio</h4>
                            </div>
                            <div class="col l6" style="padding-top: 3vh;">
                                <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalInventario" onclick="insertarCategoria('Audio')">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div id="contenedorAudio" class="col l12"></div>
                </div>
            </div>
            <div id="seccionCableado" class="section" style="padding-left: 5vh;">
                <div class="row">
                    <br>
                    <div class="col l4 offset-l4">
                        <div class="row valign-wrapper">
                            <div class="col l6">
                                <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Cableado</h4>
                            </div>
                            <div class="col l6" style="padding-top: 3vh;">
                                <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalInventario" onclick="insertarCategoria('Cableado')">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div id="contenedorCableado" class="col l12"></div>
                </div>
            </div>
            <div id="seccionIluminación" class="section" style="padding-left: 5vh;">
                <div class="row">
                    <br>
                    <div class="col l5 offset-l4">
                        <div class="row valign-wrapper">
                            <div class="col l6">
                                <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Iluminación</h4>
                            </div>
                            <div class="col l6" style="padding-top: 3vh;">
                                <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalInventario" onclick="insertarCategoria('Iluminacion')">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div id="contenedorIluminacion" class="col l12"></div>
                </div>
            </div>
            <div id="seccionComponentes" class="section" style="padding-left: 5vh;">
                <div class="row">
                    <br>
                    <div class="col l6 offset-l4">
                        <div class="row valign-wrapper">
                            <div class="col l6">
                                <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Componentes</h4>
                            </div>
                            <div class="col l6" style="padding-top: 3vh;">
                                <button class="btn-small red lighten-2 waves-effect waves-light btn modal-trigger" href="#modalInventario" onclick="insertarCategoria('Componentes')">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div id="contenedorComponentes" class="col l12"></div>
                </div>
            </div>
            <div id="seccionVentas" class="section" style="padding-left: 5vh;">
                <div class="row">
                    <br>
                    <div class="col l2 offset-l5">
                        <h4 style="border-left: 5px solid #e57373; padding-left: 3vh;">Ventas</h4>
                    </div>
                    <div id="contenedorVentas" class="col l12"></div>
                </div>
            </div>
        </div>
        <!-- SCROLLSPY -->
        <div class="col hide-on-small-only m3 l2" style="padding-left: 7vh; padding-top: 20vh;">
            <ul class="section table-of-contents">
                <li><a id="linkSeccionInventario"><strong class="red-text text-lighten-2">INVENTARIO</strong></a></li>
                <li><a id="linkSeccionAudio" class="active">Audio</a></li>
                <li><a id="linkSeccionCableado">Cableado</a></li>
                <li><a id="linkSeccionIluminación">Iluminación</a></li>
                <li><a id="linkSeccionComponentes">Componentes</a></li>
                <br>
                <li><a id="linkSeccionVentas"><strong class="red-text text-lighten-2">VENTAS</strong></a></li>
                <li><a id="linkSeccionVentasGeneral">General</a></li>
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            mostrarAudio();
            mostrarCableado();
            mostrarIluminacion();
            mostrarComponentes();
            mostrarVentas();
        });
    </script>

<?php
} else {
    echo "<script>window.location.href = '/Electroline';</script>";
}
?>