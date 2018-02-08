@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/citologia') }}">Ver citologías</a></li>
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
        <form role="form" method="post" action="{{ url('/citologia') }}">
             {{ csrf_field() }}
             <legend>Datos generales</legend>
             <div class="form-group col-md-12" id="fecha_nacimiento">
                 <label class="font-normal">Recibido</label>
                 <div class="input-group date">
                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="recibido" class="form-control" value="01-01-2018">
                 </div>
             </div>
             <div class="form-group col-md-6">
               <label class="control-label">Doctor</label>
               <select class="chosen-select"  tabindex="2" name="doctor_id">
                 <option>Seleccione doctor</option>
                 @foreach ($doctores as $doctor)
                   <option value="{{ $doctor->id }}"> {{  $doctor->nombre }} </option>
                 @endforeach
               </select>
             </div>
             <div class="form-group col-md-6">
               <label class="control-label">Grupo</label>
               <select class="chosen-select"  tabindex="2" name="grupo_id">
                 <option>Seleccione grupo</option>
                 @foreach ($grupos as $grupo)
                   <option value="{{ $grupo->id }}"> {{  $grupo->nombre }} </option>
                 @endforeach
               </select>
             </div>
             <div class="form-group col-md-12">
               <label class="control-label">Paciente</label>
               <select class="chosen-select"  tabindex="2" name="paciente_id">
                 <option>Seleccione paciente</option>
                 @foreach ($pacientes as $paciente)
                   <option value="{{ $paciente->id }}"> {{  $paciente->name }} </option>
                 @endforeach
               </select>
             </div>
             <div class="form-group col-md-12">
               <label class="control-label">Diagnóstico</label>
               <select class="chosen-select"  tabindex="2" name="diagnostico_id">
                 <option>Seleccione diagnóstico</option>
                 @foreach ($diagnosticos as $diagnostico)
                   <option value="{{ $diagnostico->id }}"> {{  $diagnostico->nombre }} </option>
                 @endforeach
               </select>
             </div>
             <legend>Pago </legend>
             <div class="form-group col-md-4">
               <label class="control-label">Precio</label>
               <div class="input-group m-b">
                 <span class="input-group-addon">$</span>
                 <select class="chosen-select"  tabindex="2" name="precio_id">
                   <option>Seleccione precio</option>
                    @foreach ($precios as $precio)
                      <option value="{{ $precio->id }}"> {{  $precio->monto }} </option>
                    @endforeach
                 </select>
               </div>
             </div>
             <div class="form-group col-md-4">
               <label class="control-label">Condición de pago</label>
               <select class="form-control m-b" name="estado_pago">
                 <option>Seleccione condición</option>
                 @foreach ($pagos as $pago)
                   <option value="{{ $pago['value'] }}"> {{  $pago['text'] }} </option>
                 @endforeach
               </select>
             </div>
             <div class="form-group col-md-4">
               <label class="control-label">Facturación</label>
               <select class="form-control m-b" name="facturacion">
                 <option>Seleccione facturación</option>
                 @foreach ($facturacion as $factu)
                   <option value="{{ $factu['value'] }}"> {{  $factu['text'] }} </option>
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

@section('css')
  <link href="{{ asset('css/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
  <link href="{{ asset('css/iCheck/custom.css')}}" rel="stylesheet">
  <link href="{{ asset('css/datepicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('scripts')\
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
    $('.chosen-select').chosen({width: "100%"});
  </script>
@endsection
