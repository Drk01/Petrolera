<div class="container-fluid espacio_contenido_encuesta">
  <div class="row">
      <div class="col-2 pl-0 pr-0 colormenu_encuesta" >
        <div class="hidden-sm-down colormenu_encuesta">
          <center><img src="img/logo_sin_fondo.png" id="logo3"/></center>
          <div class="card-block" style="padding-top:0px;border-top:0px;margin-top:0px;">
            <center><h4 class="card-title letra_blanca" ><i class="fa fa-user-circle-o menu_usuario" aria-hidden="true"></i> {{ $user }}</h4></center>
          </div>
        </div>
        <div class="sidebar">
          <div class="list-group border-0 text-center text-md-left">
            <a href="home" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-home fa-2x"></i><span class="d-none d-md-inline nav_encuesta">Inicio</span></a>
            <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-users fa-lg"></i> <span class="d-none d-md-inline nav_encuesta">Clientes</span> </a>
            <div class="collapse" id="menu1">
                <a href="objetos" class="list-group-item" data-parent="#menu1">Objetos</a>
                <a href="empresa" class="list-group-item" data-parent="#menu1">Empresa</a>
                <a href="tipo_contrato" class="list-group-item" data-parent="#menu1">Tipos de contrato</a>
                <a href="cliente" class="list-group-item" data-parent="#menu1">Nuevo cliente</a>
                <a href="tabla_cliente" class="list-group-item" data-parent="#menu1">Tabla de clientes</a>
            </div>
            <a href="#menu2" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-clipboard fa-lg"></i><span class="d-none d-md-inline nav_encuesta">Encuestas</span> </a>
            <div class="collapse" id="menu2">
                <a href="secciones" class="list-group-item" data-parent="#menu2">Secciones</a>
                <a href="preguntas" class="list-group-item" data-parent="#menu2">Preguntas</a>
                <a href="tablaP" class="list-group-item" data-parent="#menu2">Tabla Preguntas</a>
                <a href="crear" class="list-group-item" data-parent="#menu2">Registrar Encuesta</a>
                <a href="tablaE" class="list-group-item" data-parent="#menu2">Tabla de encuestas</a>
            </div>
            <a href="enviar" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-paper-plane fa-lg"></i><span class="d-none d-md-inline nav_encuesta">Envíar Encuesta</span></a>
            <a href="respuesta" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-check-square-o fa-lg"></i> <span class="d-none d-md-inline nav_encuesta">Respuestas</span></a>
            <a href="reportes" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-pie-chart fa-lg"></i> <span class="d-none d-md-inline nav_encuesta">Reportes</span></a>
            <a href="configuracion" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-cogs fa-lg"></i> <span class="d-none d-md-inline nav_encuesta">Configuración</span></a>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <span class="d-none d-md-inline nav_encuesta">
                    <button type="submit" class="list-group-item d-inline-block collapsed"><i class="fa fa-power-off fa-lg"></i> Cerrar Sesión</button>
                </span>
            </form>
            <a href="{{ route('logout') }}" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-power-off fa-lg"></i> <span class="d-none d-md-inline nav_encuesta">Cerrar Sesión</span></a>
          </div>
        </div>
      </div>
