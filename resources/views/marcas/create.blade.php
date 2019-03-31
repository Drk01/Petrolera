@section('Encabezado')
{{$Accion}} marca
@endsection

@include('layout.header')
<center>
<div class="btn-group">
    <button class="btn btn-success" onclick="window.location.href='{{ route('marcas.index') }}'">Regresar al menú</button>
</div>
</center>

@if ($Accion != 'Mostrar')
@if ($Accion == 'Editar')
<form action="{{ route('marcas.update',$Marca->id) }}" method="post" autocomplete="off">
    @method('PUT')
@else
<form action="{{ route('marcas.store') }}" method="post" autocomplete="off">

@endif
@csrf
    @endif

    <div class="form-group">
        <label for="name">Nombre: </label>
        <input required type="text" name="name" id="name" class="form-control" @if ($Accion !='Crear' )
            value="{{ $Marca->name }}" @if ($Accion=='Mostrar' ) disabled @endif @endif>
    </div>
    <div class="form-group">
        <label for="description">Descripción: </label>
        <textarea required class="form-control" name="description" id="description" rows="3" @if ($Accion=='Mostrar' )
            disabled @endif>@if ($Accion != 'Crear'){{ $Marca->description }}@endif</textarea>
    </div>

    @if ($Accion != 'Mostrar')
    @if ($Accion == 'Editar')
    <button type="submit" class="btn btn-success btn-lg" style="float:right">Editar</button>
    @else
    <button type="submit" class="btn btn-success btn-lg" style="float:right">Crear</button>
    @endif
</form>
@endif









@include('layout.footer')
