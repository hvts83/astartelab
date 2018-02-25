@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/usuarios') }}">Ver usuarios</a></li>
  <li class="active">
      <strong>{{ $page_title }}</strong>
  </li>
@endsection

@section ('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form role="form" method="post" action="{{ url('/usuarios') }}">
             {{ csrf_field() }}
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="nombre">
            </div>
            <div class="form-group">
              <label>Apellido</label>
              <input type="text" placeholder="Apellido" class="form-control" name="apellido">
            </div>
            <div class="form-group">
              <label>Nombre de usuario</label>
              <input type="text" placeholder="Nombre de usuario" class="form-control" name="usuario">
            </div>
            <div class="form-group">
              <label>Clave</label>
              <input type="password" placeholder="Clave" class="form-control" name="password">
            </div>
            <div class="form-group">
              <label>Repetir clave</label>
              <input type="password" placeholder="Clave" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
              <label class="control-label">Rol</label>
              <select class="form-control m-b" name="rol">
                <option>Seleccione tipo</option>
                @foreach ($tipos as $tipo)
                  <option value="{{ $tipo['value'] }}"> {{  $tipo['text'] }} </option>
                @endforeach
              </select>
            </div>
            <div>
                <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
            </div>
        </form>
      </div>
  </div>
</div>
@endsection
