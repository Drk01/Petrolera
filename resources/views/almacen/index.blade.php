@section('Encabezado')
Listado de artículos
@endsection

@include('layout.header')
<div class="btn-group" role="group" aria-label="Basic example">
    <center><button class="btn btn-info">Generar Excel</button></center>
</div>

<table class="table table-bordered table-hover" id="tablaObjeto">
    <thead class="thead-inverse">
        <tr>
            <th>Nombre del artículo </th>
            <th>Descripción</th>
            <th>Existencias</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($storages as $l1 => $articulo)
        <tr>
            <td>{{ $articulo->name }}</td>
            <td>{{ $articulo->description }}</td>
            <td>
                {{ $articulo->stocks->count() }}
            </td>
            <td>
                <center>
                    <div class="col">
                      <button type="button" onclick="document.getElementById('almacen{{ $articulo->id }}').submit()" class="btn btn-outline-info btn-block">Mostrar mas...</button>
                    </div>
                    @if (auth()->user()->roles()->find(1))
                      <div class="col">
                        <button type="button" onclick="document.getElementById('almacen{{ $articulo->id }}_edit').submit()" style="margin-top: 2px" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button onclick="document.getElementById('almacen{{ $articulo->id }}_destroy').submit()" type="button" style="margin-top: 2px; margin-left: 5px" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                    @endif
                </center>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($storages as $item)
    <form id="almacen{{ $item->id }}" action="{{ route('almacen.show',$item->id) }}" method="get">@csrf</form>
    @if (auth()->user()->roles()->find(1))
      <form id="almacen{{ $item->id }}_edit" action="{{ route('almacen.edit',$item->id) }}" method="get">@csrf</form>
      <form id="almacen{{ $item->id }}_destroy" action="{{ route('almacen.destroy',$item->id) }}" method="post">@method('DELETE') @csrf</form>
    @endif
@endforeach




@include('layout.footer')
