@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/pacientes') }}">Ver Pacientes</a></li>
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
        <form role="form" method="post" action="{{ url('/pacientes') }}">
             {{ csrf_field() }}
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="name">
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="email" placeholder="Correo" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label>Télefono</label>
              <input type="text" placeholder="Télefono"  class="form-control" data-mask="9999-9999" name="telefono">
            </div>
            <div class="form-group">
                <label>Documento</label>
                <input type="text" placeholder="Documento"  class="form-control" name="documento">
              </div>
            <div class="form-group"><label class="control-label">Sexo</label>
              <br>
              <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="sexo">Masculino</label>
              <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="sexo">Femenino</label>
            </div>
            <div class="form-group" id="edad">
                <label class="font-normal">Edad</label>
                <div class="input-group">
                    <span class="input-group-addon"><input type="text" name="edad" class="form-control">
                </div>
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="{{ url('pacientes/') }}" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
            </div>
        </form>
      </div>
  </div>
</div>
@endsection

@section('css')
  <link href="{{ asset('css/iCheck/custom.css')}}" rel="stylesheet">
  
@endsection

@section('scripts')
  <script src="{{ asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('js/iCheck/icheck.min.js')}}"></script>
  <script>
      $(document).ready(function () {
          $('.i-checks').iCheck({
              radioClass: 'iradio_square-green',
          });
      });
      
  </script>
@endsection
