@section('Encabezado')
Ubicaciones
@endsection

@include('layout.header')

<center>

    <div class="btn-group" role="group" aria-label="Basic example">
        <button class="btn btn-success" onclick="window.location.href='{{route('ubicaciones.create')}}'"> Crear ubicacion
        </button>
    </div>
</center>

<table class="table table-bordered table-hover" id="tablaObjeto">
    <thead class="thead-inverse">
        <tr>
            <th>Nombre</th>
            <th></th>
            <th>Acciones</th>
        </tr>
    </thead>
    @foreach ($ubicaciones as $key => $ubicacion)
    <tr>
        <td>
            {{ $ubicacion->name }}
        </td>
        <td>
            <form action="{{ route('ubicaciones.show',$ubicacion->id) }}" method="get">
                @csrf
                <center><button type="submit" class="btn btn-outline-info">Mostrar detalles...</button></center>
            </form>
        </td>

        <td>
            <center>
                <form action="{{ route('ubicaciones.edit',$ubicacion->id) }}" method="get" style="display: inline-block">
                    @csrf
                    <button style="display: inline-block; margin-left: 1px;" type="submit"
                        class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
                <form action="{{ route('ubicaciones.destroy',$ubicacion->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                            aria-hidden="true"></i></button>
                </form>
            </center>
        </td>

    </tr>
    <tr>
    </tr>
    @endforeach
    <tbody>

    </tbody>
</table>




@include('layout.footer')
