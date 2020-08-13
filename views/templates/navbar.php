<!-- Barra de navegacion -->
<div class="navbar-fixed">
    <nav class="blue lighten-2" style="padding-right: 2vh;">
        <div class="nav-wrapper">
            <a href="/Electroline" class="brand-logo left hide-on-small-only" style="padding-left: 5vh;"><i><img src="views\static\img\logo.png" style="height: 30px;"></i> Electronline</a>
            <ul class="right">
                <li id="loginIcon">
                    <a id="inicioSesion" class="tooltipped btn btn-floating blue lighten-2" data-position="bottom" data-tooltip="Iniciar sesión" onclick="$('.tap-target').tapTarget('open')">
                        <i class="material-icons">person</i>
                    </a>
                </li>
                <li id="carIcon">
                    <a id="btnCarrito" class="tooltipped btn btn-floating blue lighten-2 modal-trigger" href="#modalCarrito" data-position="bottom" data-tooltip="Carrito">
                        <i class="material-icons">shopping_cart</i>
                    </a>
                </li>
                <li id="exitIcon">
                    <a class="dropdown-trigger tooltipped btn btn-floating blue lighten-2" data-position="bottom" data-tooltip="Usuario" data-target="infoUser">
                        <i class="material-icons">person</i>
                    </a>
                    <ul id="infoUser" class="dropdown-content" style="min-width: 40vh;">
                        <li>
                            <a class="grey-text text-darken-2">
                                <h6 id="nombreUsuarioNav"></h6>
                                <div class="divider"></div>
                                <small id="correoUsuarioNav"></small>
                            </a>
                        </li>
                        <li class="divider" tabindex="-1"></li>
                        <div id="paraAbrirModalEditarPerfil">
                            <li>
                                <a class="blue-text modal-trigger" href="#modalPerfil"><i class="material-icons">edit</i> Editar información</a>
                            </li>
                            <li class="divider" tabindex="-1"></li>
                        </div>
                        <li id="salir"><a class="red-text"><i class="material-icons">settings_power</i> Salir</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Input para buscar -->
            <div id="contenedorBuscador" class="input-field right">
                <input id="search" type="search" placeholder="Buscar productos, marcas y más...">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons" onclick="vaciarBuscador();">close</i>
            </div>
        </div>
    </nav>
</div>

<!-- Modal Structure PERFIL -->
<div id="modalPerfil" class="modal">
    <nav class="yellow accent-4">
        <div class="nav-wrapper">
            <div class="col s12">
                <a class="breadcrumb" style="padding-left: 5vh;"><small class="grey-text text-darken-2">Deberás iniciar sesión nuevamente para guardar tu información de perfil !</small></a>
            </div>
        </div>
    </nav>
    <div class="modal-content">
        <div class="row">
            <form id="formPerfil" class="col s12">
                <input type="text" id="idPerfilUsuario" style="display: none;" required>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="nombre" id="nombrePerfilUsuario" type="text" class="validate" required>
                        <label for="nombrePerfilUsuario">Nombre de usuario</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="correo" id="correoPerfilUsuario" type="email" class="validate" required>
                        <label for="correoPerfilUsuario">Correo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="teléfono" id="telefonoPerfilUsuario" type="text" class="validate" required>
                        <label for="telefonoPerfilUsuario">Telefono</label>
                    </div>
                    <div class="input-field col s6" id="contenedorInputContrasenia" style="display: none;">
                        <i class="material-icons prefix" id="btnParaOcultarNuevaContrasenia">cancel</i>
                        <input placeholder="nueva contraseña" id="passPerfilUsuario" type="password" class="validate">
                        <label for="passPerfilUsuario">Contraseña</label>
                    </div>
                    <div class="input-field col s6" id="contenedorBotonVerContrasenia">
                        <button id="btnParaNuevaContrasenia" class="btn-small waves-effect waves-light grey" type="button">Nueva contraseña</button>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect blue lighten-2 waves-light right" type="submit">Actualizar información
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Structure CARRITO -->
<div id="modalCarrito" class="modal bottom-sheet">
    <div class="modal-content">
        <div class="row">
            <div class="col s11 left-align">
                <h4 class="blue-text text-lighten-2">Carrito de Compras</h4>
                <p>Agrega tus productos al carrito y se vizualizarán aquí</p>
            </div>
            <div class="col s1 right-align">
                <i class="material-icons small modal-close waves-effect waves-blue blue-text">close</i>
            </div>
            <div id="contenedorCarrito"></div>
        </div>
    </div>
</div>

<!-- Tap Target Structure USUARIO -->
<div class="tap-target blue lighten-3" data-target="inicioSesion">
    <div class="tap-target-content white-text">
        <div class="row">
            <div id="eleccionInicio" class="card" style="display: block;">
                <div class="card-content">
                    <div class="row">
                        <h5 class="center grey-text"><strong>BIENVENIDO</strong></h5>
                        <div class="input-field col s6">
                            <button id="btnIngresar" class="btn grey waves-effect waves-light left">
                                Ingresar
                            </button>
                        </div>
                        <div class="input-field col s6">
                            <button id="btnRegistrarme" class="btn grey waves-effect waves-light right">
                                Registrarme
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="eleccionRegistro" class="card" style="display: none;">
                <div class="card-content">
                    <div class="row">
                        <h5 class="center grey-text"><strong>REGISTRO</strong></h5>
                        <form id="formRegistrarUsuario">
                            <div class="input-field col s12">
                                <input id="nombreRegistroUsuario" type="text" class="validate" required>
                                <label for="nombreRegistroUsuario">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="emailRegistroUsuario" type="email" class="validate" required>
                                <label for="emailRegistroUsuario">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="telefonoRegistroUsuario" type="number" class="validate" pattern="[0-9]{10}" required>
                                <label for="telefonoRegistroUsuario">Teléfono</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="contraseniaRegistroUsuario" type="password" class="validate" required>
                                <label for="contraseniaRegistroUsuario">Contraseña</label>
                            </div>
                            <div class="input-field col s2">
                                <button id="regresarDeRegistro" class="btn-small btn-floating grey waves-effect waves-light left tooltipped" data-position="bottom" data-tooltip="Atrás">
                                    <i class="material-icons right">arrow_back</i>
                                </button>
                            </div>
                            <div class="input-field col s10">
                                <button class="btn-small grey waves-effect waves-light right" type="submit">Registrarme
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="eleccionIngresar" class="card" style="display: none;">
                <div class="card-content">
                    <div class="row">
                        <h5 class="center grey-text"><strong>INICIAR SESIÓN</strong></h5>
                        <form id="formIdentificarUsuario">
                            <div class="input-field col s12">
                                <input id="correoUsuario" type="email" class="validate" required>
                                <label for="correoUsuario">Correo</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="contraseniaUsuario" type="password" class="validate" required>
                                <label for="contraseniaUsuario">Contraseña</label>
                            </div>
                            <div class="input-field col s2">
                                <button id="regresarDeIngresar" class="btn-small btn-floating grey waves-effect waves-light left tooltipped" data-position="bottom" data-tooltip="Atrás">
                                    <i class="material-icons right">arrow_back</i>
                                </button>
                            </div>
                            <div class="input-field col s10">
                                <button class="btn-small grey waves-effect waves-light right" type="submit">Ingresar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>