@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/cuentas') }}">Ver cuentas</a></li>
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
        <form role="form" method="post" action="{{ url('cuentas/'. $cuenta->id ) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
              <label>Código</label>
              <input type="text" placeholder="Código" class="form-control" name="codigo" value="{{ $cuenta->codigo }}">
            </div>
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="nombre" value="{{ $cuenta->nombre }}">
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="{{ url('cuentas/') }}" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
            </div>
        </form>
      </div>
  </div>
</div>
@endsection
