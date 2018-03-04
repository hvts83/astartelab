@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/diagnosticos') }}">Ver diagnósticos</a></li>
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
        <form role="form" method="post" action="{{ url('diagnosticos/'. $diagnostico->id ) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="nombre" value="{{ $diagnostico->nombre }}">
            </div>
            <div class="form-group">
              <label class="control-label">Tipo</label>
              <select class="form-control m-b" name="tipo">
                <option>Seleccione tipo</option>
                @foreach ($tipos as $tipo)
                  @if ($tipo['value'] == $diagnostico->tipo )
                    <option value="{{ $tipo['value'] }}" selected> {{  $tipo['text'] }} </option>
                  @else
                    <option value="{{ $tipo['value'] }}"> {{  $tipo['text'] }} </option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <label class="control-label">Detalle</label>
                  <textarea class="form-control" name="detalle">{{ $diagnostico->detalle }}</textarea>
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="{{ url('diagnosticos/') }}" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
            </div>
        </form>
      </div>
  </div>
</div>
@endsection
