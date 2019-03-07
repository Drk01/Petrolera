@include('layout.header');

<div class="container" id="login">
    <div class="row">
        <div class="col-12">
            <p>
                <center>
                    <h2>Sistema de inventario</h2>
                </center>
            </p><br>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col col-xs-6 col-sm-8 col-md-6 col-xl-6 col-xl-6">
            <div class="card">
                <h3 class="card-header special-color-dark text-center" id="cabecera-card">Iniciar Sesión</h3>
                <div class="card-body">
                    <div class="card-block">
                        <div class="text-center"><img src="img/Logo_APISAL.jpg" id="logo_comercializacion"
                                alt=""></div>
                        <br><!-- Form login -->
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            @method("POST")
                            <div class="row">
                                <div class="form-group col cabecera-contenido">
                                    <input type="text" class="form-control cabecera-contenido" placeholder="Usuario"
                                        name="user" autofocus autocomplete="off" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-group col ">
                                    <input id="pass-2" type="password" placeholder="Contraseña" name="password" class="form-control cabecera-contenido"
                                        autocomplete="off" />
                                    <span class="input-group-btn show-password">
                                        <button class="btn btn-default" type="button" id="show-pass">
                                            <div class="fa fa-eye prefix grey-text"></div>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <p>
                                <div class="text-center">
                                    <input type="submit" class="btn boton_negro" name="login" id="btn_login" value="Iniciar">
                                </div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
      $(document).ready(function () {
        $('#show-pass').click(function () {
        if ($('#pass-2').attr('type') === 'text') {
         $('#pass-2').attr('type', 'password');
        } else {
         $('#pass-2').attr('type', 'text');
        }
         });
        });
      </script>


@include('layout.footer');
