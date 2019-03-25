@section('Encabezado')
Añadir producto
@endsection

@include('layout.header')

@if ($errors->all())
<div class="alert alert-danger">
    @foreach ($errors->all() as $Error)
    {{ $Error }}<br>
    @endforeach
</div>
@endif

<form action="{{ route('almacen.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="form-group">
        <label for="partNumber">Numero de parte: </label>
        <input type="text" name="partNumber" id="partNumber" required class="form-control" placeholder="Inserte el código de la pieza">
    </div>
    <div class="form-group">
        <label for="productName">Nombre del producto: </label>
        <input required type="text" name="productName" class="form-control" id="productName" placeholder="Inserte el nombre del producto">
    </div>
    <div class="form-group">
        <label for="description">Descripción del producto: </label>
        <textarea required class="form-control" name="description" id="description" rows="3" placeholder="Inserte una descripción sobre el producto"></textarea>
    </div>

    <div class="form-group">
        <label for="type">Tipo: </label>
        <select name="type" id="type" class="form-control">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="trademark">Marca: </label>
        <select class="form-control" name="trademark" id="trademark">
            @foreach ($trademarks as $key => $trademark)
            <option>{{ $trademark->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
            <label for="ubication">Ubicación: </label>
            <select class="form-control" name="ubication" id="ubication">
                @foreach ($ubications as $key => $ubication)
                <option>{{ $ubication->name }}</option>
                @endforeach
            </select>
        </div>
    <div class="form-group" hidden disabled>
        <label for="enviroment">Precauciones ambientales: </label>
        <select name="enviroment" id="enviroment" class="form-control" multiple>
            @foreach ($enviroments as $enviroment)
                <option>{{ $enviroment->name }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group footer">
        <button type="submit" class="btn btn-dark btn-lg" style="float:right;">Agregar</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('#trademark').select2({
            tags: true
        });
        $('#ubication').select2({
            tags: true
        });
        $('#type').select2();

        $('#enviroment').select2({
            tags: true
        });
    });
</script>


@include('layout.footer')
