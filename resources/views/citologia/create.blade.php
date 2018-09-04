@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/citologia') }}">Ver citología</a></li>
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
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1">Datos de consulta</a></li>
            <li class=""><a data-toggle="tab" href="#tab-4">Reporte Micro</a></li>
            <li class=""><a data-toggle="tab" href="#tab-5">Diagnostico Lab</a></li>
            <li class=""><a data-toggle="tab" href="#tab-6">Informe preliminar</a></li>
        </ul>
        <form role="form" method="post" action="{{ url('/citologia') }}">
          {{ csrf_field() }}
        <div class="tab-content">

          <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
              <div class="form-group col-md-6" id="fecha_nacimiento">
                  <label class="font-normal">Recibido</label>
                  <div class="input-group date">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" name="recibido" class="form-control" value="{{ DATE("d-m-Y") }}">
                  </div>
              </div>
              <div class="form-group col-md-6" id="fecha_nacimiento">
                  <label class="font-normal">Entregado</label>
                  <div class="input-group date">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" name="entregado" class="form-control" value="{{ DATE("d-m-Y") }}">
                  </div>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Doctor</label>
                <select class="chosen-select"  name="doctor_id">
                  <option disabled selected>Seleccione doctor</option>
                  @foreach ($doctores as $doctor)
                      <option value="{{ $doctor->id }}"> {{  $doctor->nombre }} </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Grupo</label>
                <select class="chosen-select"  name="grupo_id">
                  <option disabled selected>Seleccione grupo</option>
                  @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}"> {{  $grupo->nombre }} </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Paciente</label>
                <select class="chosen-select"  name="paciente_id">
                  <option disabled selected>Seleccione paciente</option>
                  @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}"> {{  $paciente->name }} </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label">Diagnóstico</label>
                  <select class="chosen-select form-control" data-placeholder="Seleccione diagnóstico" id="select_diagnostico_id">
                    @foreach ($diagnosticos as $diagnostico)
                      <option value="{{ $diagnostico->nombre }}"> {{  $diagnostico->nombre }} </option>
                    @endforeach
                  </select>
                </div>
                <button type="button" id="add_diagnostico_id" class="btn btn-primary">Agregar</button>
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="diagnostico_id" name="diagnostico"></textarea>
                </div>
            </div>
            </div>
          </div>
          <div id="tab-4" class="tab-pane">
            <div class="panel-body">
                <div class="form-group">
                  <label class="control-label">Frases</label>
                  <select class="chosen-select" data-placeholder="Seleccione frases" id="select_micro">
                      @foreach ($frases as $frase)
                        <option value="{{ $frase->nombre }}"> {{  $frase->nombre }} </option>
                      @endforeach
                    </select>
                  </div>
                  <button type="button" id="add_micro" class="btn btn-primary">Agregar</button>
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="micro" name="micro"></textarea>
                </div>
            </div>
          </div>


          <div id="tab-5" class="tab-pane">
              <div class="panel-body">
                <div class="form-group">
                  <label class="control-label">Diagnóstico Lab</label>
                  <select class="chosen-select" data-placeholder="Seleccione frases" id="select_dxlab">
                      @foreach ($diagnosticos as $diagnostico)
                        <option value="{{ $diagnostico->nombre }}"> {{  $diagnostico->nombre }} </option>
                      @endforeach
                  </select>
                </div>
                <button type="button" id="add_dxlab" class="btn btn-primary">Agregar</button>
                <div class="form-group">
                  <textarea class="form-control" rows="5" id="dxlab" name="dxlab"></textarea>
                </div>
              </div>
            </div>

         

          <div id="tab-6" class="tab-pane">
            <div class="panel-body">
              <div class="form-group">
                <label class="control-label">Diagnóstico Preliminar</label>
                <select class="chosen-select" data-placeholder="Seleccione frases" id="select_preliminar">
                    @foreach ($diagnosticos as $diagnostico)
                      <option value="{{ $diagnostico->nombre }}"> {{  $diagnostico->nombre }} </option>
                    @endforeach
                </select>
              </div>
              <button type="button" id="add_preliminar" class="btn btn-primary">Agregar</button>
              <div class="form-group">
                <textarea class="form-control" rows="5" id="preliminar" name="preliminar"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="div-btn">
            <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
            <a href="{{ url('citologia/') }}" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('css')
  <link href="{{ asset('css/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
  <link href="{{ asset('css/iCheck/custom.css')}}" rel="stylesheet">
  <link href="{{ asset('css/datepicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('scripts')
  <script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script>
  <script src="{{ asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('js/iCheck/icheck.min.js')}}"></script>
  <script>
      $(document).ready(function () {
          $('.i-checks').iCheck({
              radioClass: 'iradio_square-green',
          });
      });

    $('#fecha_nacimiento .input-group.date').datepicker({
        startView: 1,
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "dd-mm-yyyy"
    });
    $('.chosen-select').chosen({
      width: "100%",
      no_results_text: "No se encontró resultados"
    });
  </script>
  <script>
    $('#add_diagnostico_id').on('click', function(){
      $('#diagnostico_id').append( $('#select_diagnostico_id').val() );   
    });
    $('#add_micro').on('click', function(){
      $('#micro').append( $('#select_micro').val() );   
    });
    $('#add_dxlab').on('click', function(){
      $('#dxlab').append( $('#select_dxlab').val() );   
    });
    $('#add_preliminar').on('click', function(){
      $('#preliminar').append( $('#select_preliminar').val() );   
    });
  </script>
@endsection
