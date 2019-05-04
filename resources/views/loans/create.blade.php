@section('Encabezado')
{{ $Accion }} préstamo
@endsection

@include('layout.header')

<form action="{{ route('prestamos.store') }}" method="post" autocomplete="off">
    <div class="form-group">
        <label for="product">Seleccione el producto que entrará en préstamo: </label>
        <select class="form-control" name="product">
            <option selected disabled hidden></option>
        </select>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="user">Seleccione el usuario al que se le otorgará el préstamo: </label>
                <select class="form-control" name="user">
                    <option selected disabled hidden></option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="emisor">Seleccione el usuario que realiza la entrega: </label>
                <select class="form-control" name="emisor" id="emisor">
                    <option hidden selected disabled></option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <div class="form-group">
                <label for="date">Fecha de devolución: </label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="loantype">Tipo de préstamo: </label>
                <select name="loantype" id="loantype" class="form-control">
                    <option selected hidden disabled></option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-footer">
     <button type="submit" class="btn btn-success btn-lg" style="float:right;">Crear</button>
    </div>
</form>

@include('layout.footer')
