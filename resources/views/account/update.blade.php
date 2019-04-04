@section('Encabezado')
    Actualizar mis datos
@endsection

@include('layout.header')

<form action="{{ route('cuenta.update',Auth()->user()->id) }}" method="post">
    @csrf
    @method('PUT')
<div class="form-group">
  <label for="name">Nombre: </label>
<input required type="text" value="{{Auth()->user()->name}}" name="name" id="name" class="form-control" placeholder="" aria-describedby="name">
  <small id="name" class="text-muted"></small>
</div>

<div class="form-group">
  <label for="lastname">Apellido paterno: </label>
  <input required type="text" value="{{Auth()->user()->lastname}}" name="lastname" id="lastname" class="form-control" placeholder="" aria-describedby="lastname">
  <small id="lastname" class="text-muted"></small>
</div>

<div class="form-group">
  <label for="motherLastname">Apellido materno: </label>
  <input required type="text" value="{{Auth()->user()->motherLastname}}" name="motherLastname" id="motherLastname" class="form-control" placeholder="" aria-describedby="motherLastname">
  <small id="motherLastname" class="text-muted"></small>
</div>

<div class="form-group">
  <label for="email">Email: </label>
  <input required type="email" value="{{Auth()->user()->email}}" name="email" id="email" class="form-control" placeholder="" aria-describedby="emailhelp">
  <small id="emailhelp" class="text-muted"></small>
</div>

<div class="form-group">
  <label for="user">Usuario: </label>
  <input required type="text" value="{{Auth()->user()->user}}" name="user" id="user" class="form-control" placeholder="" aria-describedby="userdesc">
  <small id="userdesc" class="text-muted"></small>
</div>

<div class="form-group">
  <label for="password">Contraseña</label>
  <input type="text" name="password" id="password" class="form-control" placeholder="" aria-describedby="password">
  <small id="password" class="text-muted">No coloque nada si no desea cambiarla</small>
</div>
<button style="float:right" type="submit" class="btn btn-success btn-lg">Actualizar</button>
</form>
@include('layout.footer');
