@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
<li><a href="{{ url('/biopsia') }}">Ver biopsias</a></li>
<li class="active"> <strong>{{ $page_title }}</strong> </li>
@endsection

@section ('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content"> @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form role="form" method="post" action="{{ url('/biopsia') }}">
        {{ csrf_field() }}
        <hr>
        <h2>Datos Generales</h2>
        <hr>
        <div class="form-group col-md-6" id="fecha_nacimiento">
          <label class="font-normal">Recibido</label>
          <div class="input-group date"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
            <input type="text" name="recibido" class="form-control" value="{{ DATE("d-m-Y") }}">
          </div>
        </div>
        <div class="form-group col-md-6" id="fecha_nacimiento">
          <label class="font-normal">Entregado</label>
          <div class="input-group date"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
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
        <hr>
        <h2>Reporte Macro</h2>
        <hr>
        <div class="form-group">
          <label class="control-label">Frases</label>
          <select class="chosen-select form-control" data-placeholder="Seleccione Frase" id="select_macro">
            
            @foreach ($frases as $frase)
              @if($frase->tipo == "B" )
                
            <option value="{{ $frase->nombre }}"> {{  $frase->nombre }} </option>
            
              @endif
            @endforeach
        
          </select>
        </div>
        <button type="button" id="add_macro" class="btn btn-primary">Agregar</button>
        <div class="form-group">
          <textarea class="form-control" rows="5" id="macro" name="macro"></textarea>
        </div>
        <hr>
        <h2>Reporte Micro</h2>
        <hr>
        <div class="form-group">
          <label class="control-label">Frases</label>
          <select class="chosen-select form-control" data-placeholder="Seleccione Frase" id="select_micro">
            
            @foreach ($frases as $frase)
              @if($frase->tipo == "M")
                
            <option value="{{ $frase->nombre }}"> {{  $frase->nombre }} </option>
            
              @endif
            @endforeach
        
          </select>
        </div>
        <button type="button" id="add_micro" class="btn btn-primary">Agregar</button>
        <div class="form-group">
          <textarea class="form-control" rows="5" id="micro" name="micro"></textarea>
        </div>
        <hr>
        <h2>Diagnostico Lab</h2>
        <hr>
        <div class="form-group">
          <label class="control-label">Diagnóstico Lab</label>
          <select class="chosen-select" data-placeholder="Seleccione Diagnostico" id="select_dxlab">
            
            @foreach ($diagnosticos as $diagnostico)
              
            <option value="{{ $diagnostico->nombre }}"> {{  $diagnostico->nombre }} </option>
            
            @endforeach
        
          </select>
        </div>
        <button type="button" id="add_dxlab" class="btn btn-primary">Agregar</button>
        <div class="form-group">
          <textarea class="form-control" rows="5" id="dxlab" name="dxlab"></textarea>
        </div>
        <hr>
        <h2>Informe Preliminar</h2>
        <hr>
        <div class="form-group">
          <label class="control-label">Diagnóstico</label>
          <select class="chosen-select" data-placeholder="Seleccione frases" id="select_inmuno">
            
            @foreach ($diagnosticos as $diagnostico)
              
            <option value="{{ $diagnostico->nombre }}"> {{  $diagnostico->nombre }} </option>
            
            @endforeach
        
          </select>
        </div>
        <button type="button" id="add_inmuno" class="btn btn-primary">Agregar</button>
        <div class="form-group">
          <textarea class="form-control" rows="5" id="inmuno" name="inmuno"></textarea>
        </div>
        <div class="div-btn">
          <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
          <a href="{{ url('biopsias/') }}" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a> </div>
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
     $('#add_macro').on('click', function(){
      $('#macro').append( $('#select_macro').val() );   
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
    $('#add_inmuno').on('click', function(){
      $('#inmuno').append( $('#select_inmuno').val() );   
    });
  </script> 
@endsection 