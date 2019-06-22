@section('Encabezado')
{{ $Accion }} producto
@endsection

@include('layout.header')

<center><button type="button" onclick="window.location.href='{{ route('almacen.index') }}'" class="btn btn-success btn-lg">Regresar al menú anterior</button></center>

                    @endforeach
                    @endforeach
                    @endforeach
            @endforeach
                    @endforeach

<script type="text/javascript">
    $(document).ready(function () {
        $('#trademark').select2({
            theme: 'bootstrap4'
        });
        $('#enviroment').select2({
            theme: 'bootstrap4'
        });
        $('#units').select2({
            theme: 'bootstrap4'
        });
        $('#driveType').select2({
            theme: 'bootstrap4'
        });
        $('#uses').select2({
            theme: 'bootstrap4'
        });
        $('#trashtype').select2({
            theme: 'bootstrap4'
        });
    });

</script>


@include('layout.footer')
