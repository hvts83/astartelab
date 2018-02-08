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
        <form role="form" method="post" action="{{ url('usuarios/'. $usuario->id ) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="name" value="{{ $usuario->name}}">
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="email" placeholder="Correo" class="form-control" name="email" value="{{ $usuario->email}}">
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
                @foreach ($tipos as $tipo)
                  @if ($tipo['value'] == $usuario->rol )
                    <option value="{{ $tipo['value'] }}" selected> {{  $tipo['text'] }} </option>
                  @else
                    <option value="{{ $tipo['value'] }}"> {{  $tipo['text'] }} </option>
                  @endif
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
