<!-- Barra de navegacion -->
<div class="navbar-fixed">
    <nav class="blue lighten-2" style="padding-right: 2vh;">
        <div class="nav-wrapper">
            <a href="/Electroline" class="brand-logo left" style="padding-left: 5vh;"><i class="fab fa-accusoft"></i> Electronline</a>
            <ul class="right">
                <li id="loginIcon">
                    <a id="inicioSesion" class="tooltipped btn btn-floating blue lighten-2" data-position="bottom" data-tooltip="Iniciar sesión" onclick="$('.tap-target').tapTarget('open')">
                        <i class="fas fa-user-alt"></i>
                    </a>
                </li>
                <li id="carIcon">
                    <a id="btnCarrito" class="tooltipped btn btn-floating blue lighten-2 modal-trigger" href="#modalCarrito" data-position="bottom" data-tooltip="Carrito">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
                <li id="exitIcon">
                    <a class="dropdown-trigger tooltipped btn btn-floating blue lighten-2" data-position="bottom" data-tooltip="Usuario" data-target="infoUser">
                        <i class="fas fa-user-alt"></i>
                    </a>
                    <ul id="infoUser" class="dropdown-content" style="min-width: 40vh;">
                        <li>
                            <a class="grey-text text-darken-2">
                                <h6 id="nombreUsuarioNav"></h6>
                                <small id="correoUsuarioNav"></small>
                            </a>
                        </li>
                        <li class="divider" tabindex="-1"></li>
                        <li id="salir"><a class="blue-text"><i class="fas fa-power-off"></i> Salir</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Input para buscar -->
            <div class="input-field right" style="width: 55vh;">
                <input id="search" type="search" placeholder="Buscar productos, marcas y más...">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons" onclick="vaciarBuscador();">close</i>
            </div>
        </div>
    </nav>
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
                                <input id="domicilioRegistroUsuario" type="text" class="validate" required>
                                <label for="domicilioRegistroUsuario">Domicilio</label>
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