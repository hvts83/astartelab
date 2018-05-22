@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Reportes de Grupo</li>
@endsection

@section ('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="ibox-content">
        <div class="panel-body">
        <form role="form" method="get" action="{{ url('/reportes/grupo') }}">
            <legend>Fecha</legend>
            {{ csrf_field() }}
            <div class="form-group col-md-6" id="fecha_nacimiento">
                <label class="font-normal">Fecha inicio</label>
                <div class="input-group date">
                    <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" name="inicio" class="form-control">
                </div>
            </div>
            <div class="form-group col-md-6" id="fecha_nacimiento">
                <label class="font-normal">Fecha fin</label>
                <div class="input-group date">
                    <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" name="fin" class="form-control">
                </div>
            </div>
            <legend>Grupo</legend>
            <div class="form-group col-md-12">
                <label class="control-label">Grupo</label>
                <select class="chosen-select"  name="grupo">
                    <option value="0">Seleccione grupo</option>
                    @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}"> {{  $grupo->nombre }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary">Enviar</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    
    @if( isset($cgrupos))
    <div class="row">
        <div class="ibox-content">
            <div class="table-responsive">
            <table id="tblcgrupo" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Informe</th>
                    <th>Doctor</th>
                    <th>Grupo</th>
                    <th>Recibido</th>
                    <th>Entregado</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cgrupos as $key => $cgrupo)
                    <tr>
                        <td>{{ $cgrupo->informe }}</td>
                        <td>{{ $cgrupo->paciente_name }}</td>
                        <td>{{ $cgrupo->doctor_name}}</td>
                        <td>{{ $cgrupo->recibido }}</td>
                        <td>{{ $cgrupo->entregado }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    @endIf
    
</div>
@endsection

@section('css')
    <link href="{{ asset('css/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dataTables/datatables.min.css')}}">
    <link href="{{ asset('css/datepicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script>
    <script src="{{ asset('js/dataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
	<script>
    //Datatable
    var tabla = $('#tblcgrupo').DataTable({
      "paging": true,
      "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      },
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
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
@endsection