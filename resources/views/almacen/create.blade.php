@section('Encabezado')
{{ $Accion }} producto
@endsection

@include('layout.header')

<center><button type="button" onclick="window.location.href='{{ route('almacen.index') }}'" class="btn btn-success btn-lg">Regresar al menú anterior</button></center>

@if ($Accion == 'Crear')
  <form action="{{ route('almacen.store') }}" method="post" autocomplete="off">
      @csrf
      <div class="form-group">
          <label for="productName">Nombre del producto: </label>
          <input required type="text" name="productName" class="form-control" id="productName"
              placeholder="Inserte el nombre del producto">
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
                  <select required class="form-control" name="trademark" id="trademark">
                      <option value="" selected disabled></option>
                      @foreach ($trademarks as $key => $trademark)
                      <option value="{{ $trademark->id }}">{{ $trademark->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col">
                  <label for="driveType">Categoría: </label>
                  <select required multiple class="form-control" name="driveType[]" id="driveType">
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
                  <label for="cunit">Contenido: </label>
                  <input required class="form-control" type="number" min="1" name="cunit" id="cunit">
              </div>
              <div class="col">
                  <label for="units">Unidad de medida: </label>
                  <select required class="custom-select form-control" name="units" id="units">
                      <option value="" selected hidden disabled></option>
                      @foreach ($units as $unit)
                      <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
      </div>
      <div class="form-group">
          <label for="enviroment">Precauciones ambientales: </label>
          <select required name="enviroment[]" id="enviroment" class="form-control" multiple>
              @foreach ($enviroments as $enviroment)
              <option value="{{ $enviroment->id }}">{{ $enviroment->name }}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group">
          <div class="form-row">
              <div class="col">
                  <label for="usage">Usos: </label>
                  <select required class="form-control" multiple name="uses" id="uses">
                      @foreach ($usages as $usage)
                      <option value="{{ $usage->id }}">{{ $usage->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col">
                  <label for="trashtype">Tipo de residuo: </label>
                      <select required class="form-control" name="trashtype" multiple id="trashtype">
                      @foreach ($trashes as $trash)
                      <option value="{{ $trash->id }}">{{ $trash->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
      </div>

      <div class="form-group footer">
          <button type="submit" class="btn btn-success btn-lg" style="float:right;">Agregar</button>
      </div>
  </form>
@endif

@if ($Accion == 'Mostrar')

      <div class="form-group">
          <label for="productName">Nombre del producto: </label>
          <input disabled required type="text" name="productName" class="form-control" id="productName"
              placeholder="Inserte el nombre del producto" value="{{ $storage->name }}">
      </div>
      <div class="form-group">
          <label for="description">Descripción del producto: </label>
          <textarea disabled required class="form-control" name="description" id="description" rows="3"
              placeholder="Inserte una descripción sobre el producto">{{ $storage->description }}</textarea>
      </div>
      <div class="form-group">
          <label for="observations">Observaciones: </label>
          <textarea disabled placeholder="Este producto no tiene observaciones" class="form-control" name="observations"
              id="observations" rows="3">{{ $storage->observations }}</textarea>
      </div>

      <div class="form-group">
          <div class="form-row">
              <div class="col">
                  <label for="trademark">Marca: </label>
                  <select disabled required class="form-control" name="trademark" id="trademark">
                    @foreach ($storage->trademarks as $element)
                      <option selected>{{ $element->name }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="col">
                  <label for="driveType">Categoría: </label>
                  <select disabled required multiple class="form-control" name="driveType[]" id="driveType">
                    @foreach ($storage->driveTypes as $element)
                      <option selected>{{ $element->name }}</option>
                    @endforeach
                  </select>
              </div>
          </div>
      </div>
      <div class="form-group">
          <div class="form-row">
              <div class="col">
                  <label for="cunit">Contenido: </label>
                  <input disabled required class="form-control" type="number" min="1" name="cunit" id="cunit" value="{{ $storage->units->first()->pivot->size }}">
              </div>
              <div class="col">
                  <label for="units">Unidad de medida: </label>
                  <select disabled required class="custom-select form-control" name="units" id="units">
                    @foreach ($storage->units as $element)
                      <option selected>{{ $element->name }}</option>
                    @endforeach
                  </select>
              </div>
          </div>
      </div>
      <div class="form-group">
          <label for="enviroment">Precauciones ambientales: </label>
          <select disabled required name="enviroment[]" id="enviroment" class="form-control" multiple>
            @foreach ($storage->environments as $element)
              <option selected>{{ $element->name }}</option>
            @endforeach
          </select>
      </div>
      <div class="form-group">
          <div class="form-row">
              <div class="col">
                  <label for="usage">Usos: </label>
                  <select disabled required class="form-control" multiple name="uses" id="uses">
                    @foreach ($storage->usages as $element)
                      <option selected>{{ $element->name }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="col">
                  <label for="trashtype">Tipo de residuo: </label>
                      <select disabled required class="form-control" name="trashtype" multiple id="trashtype">
                        @foreach ($storage->trashTypes as $element)
                          <option selected>{{ $element->name }}</option>
                        @endforeach
                  </select>
              </div>
          </div>
      </div>

@endif

<script type="text/javascript">
    $(document).ready(function () {
        $('#trademark').select2({
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
        $('#trashtype').select2({
            theme: 'bootstrap4'
        });
    });

</script>


@include('layout.footer')
