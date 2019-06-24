@section('Encabezado')
    {{ $Accion }} existencias
@endsection

@include('layout.header')
    @if ($Accion == 'Crear')
        <form action="{{ route('existencias.store') }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
              <label for="stockKey">Identificador: </label>
              <input required autofocus type="text" name="stockKey" id="stockKey" class="form-control" placeholder="" aria-describedby="stockKeyHelp">
              <small id="stockKeyHelp" class="text-muted">Identificador del producto</small>
            </div>
            <div class="form-group form-row">
                <div class="col">
                    <label for="ubication">Ubicación: </label>
                    <select required class="form-control" name="ubication" id="ubication">
                        <option selected disabled hidden></option>
                    @foreach ($ubications as $ubication)
                        <option value="{{ $ubication->id }}">{{ $ubication->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                      <label for="product">Producto: </label>
                      <select required class="form-control" name="product" id="product">
                          <option selected disabled hidden></option>
                        @foreach ($storages as $storage)
                            <option value="{{ $storage->id }}">{{ $storage->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label for="responsible">Responsable: </label>
              <select required class="form-control" name="responsible" id="responsible">
                  <option selected disabled hidden></option>
                @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }} {{ $user->motherLastname }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" name="enviar" id="enviar" class="btn btn-success btn-block btn-lg">Crear</button>
        </form>
    @endif


    <script>
        $(document).ready(function () {
            $('#product').select2({
                theme: 'bootstrap4'
            });
            $('#ubication').select2({
                theme: 'bootstrap4'
            });
            $('#responsible').select2({
                theme: 'bootstrap4'
            });
        });

    </script>
@include('layout.footer')
