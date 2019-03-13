@section('Encabezado')
Listado de artículos
@endsection

@include('layout.header')


<table class="table table-bordered table-hover" id="tablaObjeto">
    <thead class="thead-inverse">
        <tr>
            <th>Nombre del artículo </th>
            <th>Descripción</th>
            <th>Cantidad en existencia</th>
            <th>Cantidad en préstamo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($storage as $articulo)
        <tr>
            <td>{{ $articulo->productName }}</td>
            <td>{{ $articulo->description }}</td>
            <td>{{ $articulo->quantityItems }}</td>
            <td>Working...</td>
        </tr>
        @endforeach
    </tbody>
</table>


@include('layout.footer')
