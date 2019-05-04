@section('Encabezado'),
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
            <th>Ubicación</th>
            <th>Resposable</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($storage as $l1 => $articulo)
        <tr>
            <td>{{ $articulo->productName }}</td>
            <td>{{ $articulo->description }}</td>
            <td>
                @foreach ($storage_ubication as $l2 => $su)
                    @if($su->storage_id == $articulo->id)
                            @foreach ($ubications as $l3 => $ubication)
                                @if ($ubication->id == $su->ubication_id)
                                    {{ $ubication->name }}
                                    @break
                                @endif
                            @endforeach
                        @break
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($responsibles as $l2 => $r)
                    @if($r->storage_id == $articulo->id)
                            @foreach ($users as $l3 => $user)
                                @if ($user->id == $r->user_id)
                                    {{ $user->name }}
                                    @break
                                @endif
                            @endforeach
                        @break
                    @endif
                @endforeach
            </td>
            <td>
                <center>
                    <form style="display: inline-block" action="{{ route('almacen.show',$articulo->id) }}" method="get">
                        @csrf

                        <button type="submit" class="btn btn-outline-info btn-block">Mostrar mas...</button>
                </center>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@include('layout.footer')
