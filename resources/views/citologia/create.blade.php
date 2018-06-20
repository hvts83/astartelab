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
            <li class=""><a data-toggle="tab" href="#tab-2">Pago</a></li>
            <li class=""><a data-toggle="tab" href="#tab-3">Reporte Macro</a></li>
            <li class=""><a data-toggle="tab" href="#tab-4">Reporte Micro</a></li>
            <li class=""><a data-toggle="tab" href="#tab-5">Reporte Informe preliminar</a></li>
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
              <div class="form-group col-md-6">
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
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label class="control-label">Diagnóstico</label>
                  <select class="chosen-select"  name="diagnostico_id">
                    <option disabled selected>Seleccione diagnóstico</option>
                    @foreach ($diagnosticos as $diagnostico)
                        <option value="{{ $diagnostico->id }}"> {{  $diagnostico->nombre }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div id="tab-2" class="tab-pane">
            <div class="panel-body">  
              <div class="form-group col-md-4">
                  <label class="control-label">Precio</label>
                  <div class="input-group m-b">
                    <span class="input-group-addon">$</span>
                    <select  class="form-control"  name="precio_id">
                      <option disabled selected>Seleccione precio</option>
                      @foreach ($precios as $precio)
                        <option value="{{ $precio->id }}"> {{ $precio->nombre . ' - $' . $precio->monto }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Condición de pago</label>
                  <select class="form-control m-b" name="estado_pago">
                    <option disabled selected>Seleccione condición</option>
                    @foreach ($pagos as $pago)
                      <option value="{{ $pago['value'] }}"> {{  $pago['text'] }} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Facturación</label>
                  <select class="form-control m-b" name="facturacion">
                    <option disabled selected>Seleccione facturación</option>
                    @foreach ($facturacion as $factu)
                      <option value="{{ $factu['value'] }}"> {{  $factu['text'] }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
          </div>
          <div id="tab-3" class="tab-pane">
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Frases</label>
                    <div class="input-group">
                      <select class="chosen-select" data-placeholder="Selecciondiagnosticoses" id="select_macro">
                        @foreach ($frases as $frase)
                          <option value="{{ $frase->nombre }}"> {{  $frase->nombre }} </option>
                        @endforeach
                      </select>
                      <span class="input-group-btn"> <button type="button" id="add_macro" class="btn btn-primary">Agregar</button></span>
                    </div>
                  </div>
                  <div class="form-group">
                      <textarea class="form-control" rows="5" id="macro" name="macro"></textarea>
                  </div>
            </div>
          </div>
          <div id="tab-4" class="tab-pane">
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Frases</label>
                    <div class="input-group">
                      <select class="chosen-select" data-placeholder="Seleccione frases" id="select_micro">
                        @foreach ($frases as $frase)
                          <option value="{{ $frase->nombre }}"> {{  $frase->nombre }} </option>
                        @endforeach
                      </select>
                      <span class="input-group-btn"> <button type="button" id="add_micro" class="btn btn-primary">Agregar</button></span>
                    </div>
                  </div>
                  <div class="form-group">
                      <textarea class="form-control" rows="5" id="micro" name="micro"></textarea>
                  </div>
            </div>
          </div>
          <div id="tab-5" class="tab-pane">
              <div class="panel-body">
                  <div class="form-group">
                    <label class="control-label">Diagnóstico</label>
                    <div class="input-group">
                      <select class="chosen-select" data-placeholder="Seleccione frases" id="select_preliminar">
                        @foreach ($diagnosticos as $diagnostico)
                          <option value="{{ $diagnostico->nombre }}"> {{  $diagnostico->nombre }} </option>
                        @endforeach
                      </select>
                      <span class="input-group-btn"> <button type="button" id="add_preliminar" class="btn btn-primary">Agregar</button></span>
                    </div>
                  </div>
                  <div class="form-group">
                      <textarea class="form-control" rows="5" id="preliminar" name="preliminar"></textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label">¿Es diagnóstico preeliminar?</label>
                    <br>
                    <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="dpreliminar">Si</label>
                    <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="dpreliminar">No</label>
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
      $('#add_macro').on('click', function(){
        $('#macro').append( $('#select_macro').val() );   
      });
      $('#add_micro').on('click', function(){
        $('#micro').append( $('#select_micro').val() );   
      });
      $('#add_preliminar').on('click', function(){
        $('#preliminar').append( $('#select_preliminar').val() );   
      });
      $('#add_inmuno').on('click', function(){
        $('#inmuno').append( $('#select_inmuno').val() );   
      });
    </script>
@endsection
