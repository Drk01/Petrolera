@section('Encabezado')
Lista de usuarios
@endsection

@include('layout.header')

<table class="table table-bordered table-hover" id="tablaObjeto">
    <thead class="thead-inverse">
        <tr>
            <th>Nombre</th>
            <th></th>
            <th>Acciones</th>
        </tr>
    </thead>
    @foreach ($Usuarios as $key => $Usuario)
    <tr>
        <td>
            {{ $Usuario->name }} {{ $Usuario->lastname }} {{ $Usuario->motherLastname }}
        </td>
        <form action="{{ route('usuarios.show',$Usuario->id) }}" method="get">
            @csrf
            <td>
                <center><button type="submit" class="btn btn-outline-info">Mostrar detalles...</button></center>
            </td>
            <td><center>
                <form action="{{ route('usuarios.destroy',$Usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                            aria-hidden="true"></i></button>
                </form>
                <form action="{{ route('usuarios.edit',$Usuario->id) }}" method="get" style="display: inline-block">
                    <button style="display: inline-block; margin-left: 1px;" type="submit" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </form>
            </center></td>
        </form>
    </tr>
    <tr>
        {{--  <form action="{{route()}}" method="get"></form> --}}
    </tr>
    @endforeach
    <tbody>

    </tbody>
</table>

@include('layout.footer')
