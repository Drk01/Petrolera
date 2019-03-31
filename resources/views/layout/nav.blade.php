<div class="container-fluid espacio_contenido_encuesta">
    <div class="row">
        <div class="col-2 pl-0 pr-0 colormenu_encuesta">
            <div class="hidden-sm-down colormenu_encuesta">
                <center><img src="{{ asset('img/logo_sin_fondo.png') }}" id="logo3" /></center>
                <div class="card-block" style="padding-top:0px;border-top:0px;margin-top:0px;">
                    <center>
                        <h4 class="card-title letra_blanca"><i class="fa fa-user-circle-o menu_usuario"
                                aria-hidden="true"></i>
                            {{ Auth()->user()->user }}</h4>
                        <small>{{-- $role --}}</small>
                    </center>
                </div>
            </div>
            <div class="sidebar">
                <div class="list-group border-0 text-center text-md-left">
                    <a href="{{ route('dashboard') }}" class="list-group-item d-inline-block collapsed"
                        data-parent="#sidebar"><i class="fa fa-home fa-2x"></i><span
                            class="d-none d-md-inline nav_encuesta">Inicio</span></a>
                    <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse"
                        data-parent="#sidebar" aria-expanded="false"><i class="fa fa-clipboard fa-lg"></i> <span
                            class="d-none d-md-inline nav_encuesta">Almacén</span>
                    </a>
                    <div class="collapse" id="menu1">
                        <a href="{{ route('almacen.create') }}" class="list-group-item" data-parent="#menu1">Añadir
                            producto</a>
                        <a href="{{ route('almacen.index') }}" class="list-group-item" data-parent="#menu1">Listado
                            productos</a>
                        <a href="{{ route('marcas.index') }}" class="list-group-item" data-parent="#menu1">Marcas</a>
                        <a href="{{ route('ubicaciones.index') }}" class="list-group-item"
                            data-parent="#menu1">Ubicaciones</a>
                        <a href="{{ route('categorias.index') }}" class="list-group-item"
                            data-parent="#menu1">Categorias</a>
                    </div>
                    <a href="#menu2" class="list-group-item d-inline-block collapsed" data-toggle="collapse"
                        data-parent="#sidebar" aria-expanded="false"><i class="fa fa-clipboard fa-lg"></i><span
                            class="d-none d-md-inline nav_encuesta">Préstamos</span>
                    </a>
                    <div class="collapse" id="menu2">
                        <a href="preguntas" class="list-group-item" data-parent="#menu2">Listado de préstamos</a>
                        <a href="secciones" class="list-group-item" data-parent="#menu2">Añadir préstamo</a>
                    </div>

                    <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse"
                        data-parent="#sidebar" aria-expanded="false"><i class="fa fa-users fa-lg"></i><span
                            class="d-none d-md-inline nav_encuesta">Usuarios</span>
                    </a>
                    <div class="collapse" id="menu3">
                        <a href="{{ route('usuarios.create') }}" class="list-group-item" data-parent="#menu3">Añadir
                            usuario</a>
                        <a href="{{ route('usuarios.index') }}" class="list-group-item" data-parent="#menu3">Listado de
                            usuarios</a>
                        <a href="{{ route('workspaces.index') }}" class="list-group-item" data-parent="#menu3">Areas de
                            trabajo</a>
                    </div>
                    {{-- <a href="enviar" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i
                            class="fa fa-paper-plane fa-lg"></i><span class="d-none d-md-inline nav_encuesta">Envíar
                            Encuesta</span></a>
                    <a href="respuesta" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i
                            class="fa fa-check-square-o fa-lg"></i> <span class="d-none d-md-inline nav_encuesta">Respuestas</span></a>
                    <a href="reportes" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-pie-chart fa-lg"></i>
                        <span class="d-none d-md-inline nav_encuesta">Reportes</span></a>
                    <a href="configuracion" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i
                            class="fa fa-cogs fa-lg"></i> <span class="d-none d-md-inline nav_encuesta">Configuración</span></a>
                    --}}
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button data-parent="#sidebar" type="submit"
                            class=" list-group-item d-inline-block collapsed d-none d-md-inline nav_encuesta"><i
                                class="fa fa-power-off fa-lg"></i>
                            Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
