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
                    <button type="button" onclick="document.getElementById('almacen{{ $articulo->id }}').submit()" class="btn btn-outline-info btn-block">Mostrar mas...</button>
                </center>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($storages as $item)
    <form id="almacen{{ $item->id }}" action="{{ route('almacen.show',$item->id) }}" method="get">@csrf</form>
@endforeach




@include('layout.footer')
