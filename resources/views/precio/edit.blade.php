@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/precios') }}">Ver precios</a></li>
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
        <form role="form" method="post" action="{{ url('precios/'. $precio->id ) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" value="{{ $tipo }}" name="tipo">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="nombre" value="{{ $precio->nombre }}">
            </div>
            <div class="form-group">
              <label>Monto</label>
              <div class="input-group m-b">
                <span class="input-group-addon">$</span>
                <input type="number" placeholder="$" class="form-control" name="monto" step="0.01" min="0.01" value="{{ $precio->monto }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Tipo</label>
              <select class="form-control m-b" name="tipo_consulta">
                <option>Seleccione tipo</option>
                @foreach ($tipos_consulta as $tipo_c)
                @if ($tipo_c['id'] == $precio->tipo_id )
                    <option value="{{ $tipo_c['id'] }}" selected> {{  $tipo_c['nombre'] }} </option>
                  @else
                    <option value="{{ $tipo_c['id'] }}"> {{  $tipo_c['nombre'] }} </option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="{{ url('precios/') }}" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
            </div>
        </form>
      </div>
  </div>
</div>
@endsection
