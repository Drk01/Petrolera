<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!--Importante-->
    <link rel="stylesheet" href="{{ asset('css/Bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Bootstrap4/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo_gob.css') }}">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo_formularios.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contenido.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select2-bootstrap4.min.css') }}" rel="stylesheet" />
</head>

<body>
    <header>
        <div class="fixed-top">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded navegacion_gob">
                <div class="container">
                    <a target="_blank" class="navbar-brand" href="https://www.gob.mx"><img
                            src="{{ asset('img/gobmxlogo.svg') }}" id="logo" /></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbargob" aria-controls="navbargob" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-bars toggler_gob" aria-hidden="true"></i>
                    </button>
                    <div style="border-bottom: 2px solid #404343;"></div>
                    <div class="collapse navbar-collapse" id="navbargob">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a target="_blank" class="nav-link hover_gob"
                                    href="https://www.gob.mx/tramites" title="Trámites">
                                    <h5 class="colorlgob7">Trámites</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" class="nav-link hover_gob"
                                    href="https://www.gob.mx/gobierno" title="Gobierno">
                                    <h5 class="colorlgob7">Gobierno</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" class="nav-link hover_gob"
                                    href="https://www.gob.mx/participa" title="Participación Ciudadana">
                                    <h5 class="colorlgob7">Participa</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" class="nav-link hover_gob"
                                    href="http://datos.gob.mx" title="Datos Abiertos">
                                    <h5 class="colorlgob7">Datos</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" target="_blank" class="nav-link hover_gob"
                                    href="https://www.gob.mx/busqueda"><span class="sr-only">
                                        <h5 class="colorlgob7">Búsqueda</h5>
                                    </span><i class="fa fa-search buscar"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded navegacion_api sub-navbar">
                <div class="container">
                    <a target="_blank" target="_blank" class="navbar-brand "
                        href="http://www.puertosalinacruz.com.mx/espi/0000001/inicio"><span class="colorltapi7">API
                            Salina Cruz</span></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarapi" aria-controls="navbarapi" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-bars toggler_gob" aria-hidden="true"></i>
                    </button>
                    <div style="border-bottom: 2px solid #404343;"></div>
                    <div class="collapse navbar-collapse" id="navbarapi">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a target="_blank" target="_blank" class="nav-link hover_gob"
                                    href="http://www.puertosalinacruz.com.mx/esps/0000201/quienes-somos">
                                    <h5 class="colorlapi7">Quiénes Somos</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" target="_blank" class="nav-link hover_gob"
                                    href="http://www.puertosalinacruz.com.mx/esps/0000202/acerca-del-puerto">
                                    <h5 class="colorlapi7">Acerca del Puerto</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" target="_blank" class="nav-link hover_gob"
                                    href="http://www.puertosalinacruz.com.mx/esps/0000203/infraestructura">
                                    <h5 class="colorlapi7">Infraestructura</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" target="_blank" class="nav-link hover_gob"
                                    href="http://www.puertosalinacruz.com.mx/esps/0000205/oportunidades-de-negocios">
                                    <h5 class="colorlapi7">Oportunidades de Negocios</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" target="_blank" class="nav-link hover_gob"
                                    href="http://www.puertosalinacruz.com.mx/esps/0000207/tarifas">
                                    <h5 class="colorlapi7">Tarifas</h5>
                                </a></li>
                            <li class="nav-item active"><a target="_blank" target="_blank" class="nav-link hover_gob"
                                    href="http://www.puertosalinacruz.com.mx/esps/2110211/transparencia">
                                    <h5 class="colorlapi7">Transparencia</h5>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    @if(Auth::user())
    @include('layout.nav')
    <div class="col-8 titulo_contenido" style="margin-top: 20px">
        <div class="well" style="padding: 10px 10px">
            <center>
                <h2 style="margin-top: -2px;">@yield('Encabezado')</h2>
            </center>
        </div>
        <div style="padding-top:30px;padding-bottom:100px;">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @endif
