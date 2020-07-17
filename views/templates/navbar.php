<!-- Barra de navegacion -->
<div class="navbar-fixed">
    <nav style="padding-right: 2vh;">
        <div class="nav-wrapper">
            <a href="/Electroline" class="brand-logo"><i class="fab fa-accusoft"></i> Electroline</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li id="loginIcon">
                    <a id="inicioSesion" class="tooltipped btn btn-floating red lighten-2" data-position="bottom" data-tooltip="Iniciar sesión" onclick="$('.tap-target').tapTarget('open')">
                        <i class="fas fa-user-alt"></i>
                    </a>
                </li>
                <li id="carIcon">
                    <a href="#" class="tooltipped btn btn-floating red lighten-2" data-position="bottom" data-tooltip="Carrito">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
                <li id="exitIcon">
                    <a href="#" class="tooltipped btn btn-floating red lighten-2" data-position="bottom" data-tooltip="Salir">
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>
            </ul>
            <!-- Input para buscar -->
            <div class="input-field right hide-on-med-and-down" style="width: 55vh;">
                <input id="search" type="search" placeholder="Buscar productos, marcas y más...">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i class="material-icons" onclick="vaciarBuscador();">close</i>
            </div>
        </div>
    </nav>
</div>

<!-- Menu en tamaño sm -->
<ul class="sidenav" id="mobile-demo">
    <!-- Input para buscar -->
    <nav>
        <div class="nav-wrapper">
            <div class="input-field">
                <input id="searchInMenu" type="search" placeholder="Buscar productos y más...">
                <label class="label-icon" for="searchInMenu"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </div>
    </nav>
    <br>
    <!-- Inputs para rango de precio -->
    <div class="row center-align red-text text-lighten-2">
        <div class="col s8 offset-s2">
            <h6>Rango de precio</h6>
        </div>
        <div class="col s3 offset-s2">
            <div class="input-field">
                <input id="minimoInMenu" type="text" class="validate">
                <label for="minimoInMenu">Mínimo</label>
            </div>
        </div>
        <div class="col s2" style="padding-top: 2vh;">
            <div class="input-field">
                <i class="fas fa-minus"></i>
            </div>
        </div>
        <div class="col s3">
            <div class="input-field">
                <input id="maximoInMenu" type="text" class="validate">
                <label for="maximoInMenu">Máximo</label>
            </div>
        </div>
    </div>
    <!-- Lista de categorias en el menu vertical -->
    <div class="row center-align">
        <!-- Dropdown Trigger -->
        <a class='dropdown-trigger btn red lighten-2' href='#' data-target='dropdownInMenu'>Categorías<i class="material-icons right">arrow_drop_down</i></a>
        <!-- Dropdown Structure -->
        <ul id='dropdownInMenu' class='dropdown-content'>
            <li><a class="red-text text-lighten-2" href="#!">Audio</a></li>
            <li><a class="red-text text-lighten-2" href="#!">Cableado</a></li>
            <li><a class="red-text text-lighten-2" href="#!">Iluminación</a></li>
            <li><a class="red-text text-lighten-2" href="#!">Componentes</a></li>
        </ul>
    </div>
    <br>
    <!-- Controles de la navegación principal -->
    <div style="width:100%; position: absolute; bottom: 12vh;">
        <hr>
        <li class="center-align"><a href="#"><i class="fas fa-shopping-cart"></i> Carrito de compras</a></li>
        <li class="center-align"><a href="#"><i class="fas fa-power-off"></i> Cerrar sesión</a></li>
    </div>
</ul>

<!-- Tap Target Structure USUARIO -->
<div class="tap-target red lighten-3" data-target="inicioSesion">
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
                        <form>
                            <div class="input-field col s12">
                                <input id="nombreUsuario" type="text" class="validate" required>
                                <label for="nombreUsuario">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="domicilioUsuario" type="text" class="validate" required>
                                <label for="domicilioUsuario">Domicilio</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="emailUsuario" type="email" class="validate" required>
                                <label for="emailUsuario">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="telefonoUsuario" type="number" class="validate" pattern="[0-9]{10}" required>
                                <label for="telefonoUsuario">Teléfono</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="contraseniaUsuario" type="password" class="validate" required>
                                <label for="contraseniaUsuario">Contraseña</label>
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
                        <form>
                            <div class="input-field col s12">
                                <input id="aliasUsuario" type="text" class="validate" required>
                                <label for="aliasUsuario">Usuario</label>
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