@section('Encabezado')
Areas de trabajo
@endsection

@include('layout.header')

<center>
    <div class="btn-group" role="group" aria-label="Basic example" @if (!$IsAdmin) disabled hidden @endif>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
            data-whatever="@fat">Crear nueva</button>
    </div>
</center>

<table class="table table-bordered table-hover" id="tablaObjeto">
    <thead class="thead-inverse">
        <tr>
            <th>Area</th>
            <th>Cantidad de usuarios</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Workspaces as $key => $Workarea)
        <tr>
            <td>{{ $Workarea->name }}</td>
            <td>{{ $Workspaces[$key]->Trabajadores }}</td>
            <form action="{{ route('workspaces.destroy',$Workarea->id) }}" method="post">
                @csrf
                @method('DELETE')
            <td><button @if (!$IsAdmin) disabled @endif
                    onclick="window.location.href='/workspaces/{{ $Workarea->id }}/edit'" type="button"
                    class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">Editar</i></button>
                <button @if (!$IsAdmin) disabled @endif type="submit" class="btn btn-danger btn-sm"><i
                        class="fa fa-trash" aria-hidden="true">Eliminar</i></button></td>
                    </form>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('workspaces.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nombre:</label>
                        <input required name="name" type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Descripción:</label>
                        <textarea name="description" required class="form-control" id="description"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Añadir</button>
            </div>
            </form>
        </div>
    </div>
</div>
@include('layout.footer')
