@section('Encabezado')
    Editar area
@endsection
@include('layout.header')

<form action="{{ route('workspaces.update',$id)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre: </label>
        <input requiered type="text" value="{{ $name }}" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
      <label for="description">Descripción: </label>
      <textarea required name="description" class="form-control" id="description" rows="5">{{ $description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
  </form>


@include('layout.footer')
