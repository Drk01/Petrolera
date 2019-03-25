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
            <th>Marca</th>
            <th>Ubicación</th>
            <th>Resposable</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($storage as $articulo)
        <tr>
            <td>{{ $articulo->productName }}</td>
            <td>{{ $articulo->description }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>


@include('layout.footer')
