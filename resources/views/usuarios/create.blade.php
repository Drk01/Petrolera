@section('Encabezado')
{{ $Accion }} usuario
@endsection

@include('layout.header')

@if ($Accion == 'Ver' || $Accion == 'Editar')
<center><button class="btn btn-lg btn-success" onclick="window.location.href='{{ route('usuarios.index') }}'">Regresar
        al menú</button></center>
@endif

@if($Accion == 'Crear')
<form action="{{ route('usuarios.store') }}" method="post" autocomplete="off">
    @elseif($Accion == 'Editar')
    <form action="{{ route('usuarios.update', $UserData->id) }}" method="post" autocomplete="off">
        @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="name">Nombre: </label>
            <input type="text" name="name" required id="name" class="form-control" @if ($Accion=='Crear' ) value=""
                @elseif($Accion=='Editar' ) value="{{ $UserData->name }}" @else value="{{ $UserData->name }}" disabled
                @endif>
        </div>
        <div class="form-group">
            <label for="lastname">Apellido paterno: </label>
            <input type="text" name="lastname" required id="lastname" class="form-control" @if ($Accion=='Ver' )
                value="{{ $UserData->lastname }}" disabled @elseif($Accion=='Editar' ) value="{{ $UserData->lastname }}"
                @endif>
        </div>
        <div class="form-group">
            <label for="motherLastname">Apellido materno: </label>
            <input type="text" name="motherLastname" id="motherLastname" class="form-control" @if ($Accion=='Ver' )
                value="{{ $UserData->motherLastname }}" disabled @elseif ($Accion=='Editar' )
                value="{{ $UserData->motherLastname }}" @endif>
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" class="form-control" @if ($Accion=='Ver' )
                value="{{ $UserData->email }}" disabled @elseif($Accion=='Editar' ) value="{{ $UserData->email }}"
                @endif>
        </div>
        <div class="form-group">
            <label for="Workarea">Area de trabajo: </label>
            <select name="Workarea" id="Workarea" autocomplete="off" class="form-control" required @if ($Accion=='Ver' )
                disabled @endif>
                @if ($Accion == 'Editar')
                @foreach ($Workareas as $workarea)
                @if ($workarea->name == $Puesto)
                <option selected value="{{ $workarea->id }}">{{ $workarea->name }}</option>
                @else
                <option value="{{ $workarea->id }}">{{ $workarea->name }}</option>
                @endif
                @endforeach
                @elseif($Accion == 'Ver')
                <option value="" disabled selected>{{ $Puesto }}</option>
                @else
                @foreach ($Workareas as $workarea)
                <option value="" hidden disabled selected></option>
                <option value="{{ $workarea->id }}">{{ $workarea->name }}</option>
                @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="userType">Tipo de usuario: </label>
            <select name="userType" id="userType" autocomplete="off" class="form-control" required @if($Accion=='Ver' )
                disabled @endif>
                @if ($Accion == 'Ver')
                <option value="" selected>{{ $Role }}</option>
                @elseif($Accion == 'Editar')
                @foreach ($Roles as $role)
                @if ($role->name == $Role)
                <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                @else
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endif
                @endforeach
                @else
                @foreach ($Roles as $role)
                <option value="" hidden disabled selected></option>
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
                @endif>
            </select>
        </div>
        <div class="form-group">
            <label for="user">Usuario: </label>
            <input type="text" name="user" id="user" class="form-control" @if ($Accion=='Editar' )
                value="{{ $UserData->user }}" @elseif($Accion=='Ver' ) value="{{ $UserData->user }}" disabled @else
                value="" @endif>
        </div>

        <div class="form-group" @if($Accion=='Ver' || $Accion=='Editar' ) hidden @endif>
            <label for="password">Contraseña: </label>
            <input type="text" name="password" id="password" class="form-control"
                value="La contraseña por defecto es: 12345" disabled>
        </div>


        @if ($Accion == 'Crear')
        <button style="float:right" class="btn btn-success btn-lg" type="submit">Enviar</button>
        @elseif($Accion == 'Editar')
        <button style="float:right" class="btn btn-success btn-lg" type="submit">Editar</button>
        @else

        @endif

    </form>

    <script>
        $(document).ready(function () {
            $('#userType').select2({
                theme: 'bootstrap4'
            });
            $('#Workarea').select2({
                theme: 'bootstrap4'
            });
        });

    </script>
    @include('layout.footer')
