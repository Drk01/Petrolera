@section('Encabezado')
Listado de préstamos
@endsection

@include('layout.header')
<table class="table table-bordered table-hover" id="tablaObjeto">
    <thead class="thead-inverse">
        <tr>
            <th>Nombre del artículo </th>
            <th>Descripción</th>

    </thead>
    <tbody>
        @foreach ($loans as $l1 => $articulo)
        <tr>
            <td>{{ $articulo->productName }}</td>
            <td>{{ $articulo->description }}</td>
        </tr>
      @endforeach
    </tbody>
</table>

@include('layout.footer')
