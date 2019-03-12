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
        <label for="productName">Nombre del producto: </label>
        <input required type="text" name="productName" class="form-control" id="productName" placeholder="Inserte el nombre del producto">
    </div>
    <div class="form-group">
        <label for="description">Descripción del producto: </label>
        <textarea required class="form-control" name="description" id="description" rows="3" placeholder="Inserte una descripción sobre el producto"></textarea>
    </div>
    <div class="form-group">
        <label for="quantityItems" class="form-control">Cantidad: </label>
        <input required type="number" name="quantityItems" id="quantityItems" class="form-control">
    </div>
    <div class="form-group">
        <label for="types" class="form-control">Precauciones: </label>
        <select id="types" name="types[]" multiple class="form-control" required>
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group footer">
        <button type="submit" class="btn btn-dark btn-lg" style="float:right;">Agregar</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('#types').select2();
    });

</script>


@include('layout.footer')
