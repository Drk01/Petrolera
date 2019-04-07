@section('Encabezado')
Añadir producto
@endsection

@include('layout.header')

<form action="{{ route('almacen.store') }}" method="post" autocomplete="off">
    @csrf
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="partNumber">Numero de parte: </label>
                <input type="text" name="partNumber" id="partNumber" required class="form-control"
                    placeholder="Inserte el código de la pieza">
            </div>
            <div class="col">
                <label for="productName">Nombre del producto: </label>
                <input required type="text" name="productName" class="form-control" id="productName"
                    placeholder="Inserte el nombre del producto">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="description">Descripción del producto: </label>
        <textarea required class="form-control" name="description" id="description" rows="3"
            placeholder="Inserte una descripción sobre el producto"></textarea>
    </div>

    <div class="form-group">
        <label for="observations">Observaciones: </label>
        <textarea placeholder="Inserte observaciones que presenta el producto" class="form-control" name="observations"
            id="observations" rows="3"></textarea>
    </div>

    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="trademark">Marca: </label>
                <select class="form-control" name="trademark" id="trademark">
                    <option value="" selected disabled></option>
                    @foreach ($trademarks as $key => $trademark)
                    <option>{{ $trademark->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="driveType">Categoría: </label>
                <select multiple class="form-control" name="driveType" id="driveType">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="cunit">Cantidad: </label>
                <input class="form-control" type="number" min="1" name="cunit" id="cunit">
            </div>
            <div class="col">
                <label for="units">Unidad de medida: </label>
                <select class="custom-select form-control" name="units" id="units">
                    @foreach ($units as $unit)
                    <option value="" selected hidden disabled></option>
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="enviroment">Precauciones ambientales: </label>
                <select name="enviroment" id="enviroment" class="form-control" multiple>
                    @foreach ($enviroments as $enviroment)
                    <option>{{ $enviroment->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="ubication">Ubicación: </label>
                <select class="form-control" name="ubication" id="ubication">
                    <option value="" selected hidden disabled></option>
                    @foreach ($ubications as $key => $ubication)
                    <option>{{ $ubication->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class="col">
                <label for="usage">Usos: </label>
                <select class="form-control" name="uses" id="uses">
                    @foreach ($usages as $usage)
                    <option value="" selected hidden disabled></option>
                    <option value="{{ $usage->id }}">{{ $usage->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="trash">Tipo de resíduo: </label>
                    <select class="form-control" name="trash" id="trash">
                        <option value="" selected hidden disabled></option>
                        @foreach ($trashes as $trash)
                        <option value="{{ $trash->id }}">{{ $trash->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="responsable">Responsable: </label>
        <select class="form-control" name="responsable" id="responsable">
            <option value="" selected hidden disabled></option>
            @foreach ($responsables as $responsable)
            <option value="{{ $responsable->id }}">{{ $responsable->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group footer">
        <button type="submit" class="btn btn-success btn-lg" style="float:right;">Agregar</button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('#trademark').select2({
            theme: 'bootstrap4'
        });
        $('#ubication').select2({
            theme: 'bootstrap4'
        });
        $('#type').select2({
            theme: 'bootstrap4'
        });

        $('#enviroment').select2({
            theme: 'bootstrap4'
        });
        $('#units').select2({
            theme: 'bootstrap4'
        });
        $('#driveType').select2({
            theme: 'bootstrap4'
        });
        $('#uses').select2({
            theme: 'bootstrap4'
        });
        $('#trash').select2({
            theme: 'bootstrap4'
        });
        $('#responsable').select2({
            theme: 'bootstrap4'
        });
    });

</script>


@include('layout.footer')
