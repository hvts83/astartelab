@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Reportes de Citologías</li>
@endsection

@section ('content')


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">
        <div class="panel-body">
        <form role="form" method="get" action="{{ url('/reportes/citologia') }}">
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
            <legend>Cliente </legend>
            <div class="form-group col-md-12">
                <label class="control-label">Paciente</label>
                <select class="chosen-select"  name="paciente">
                    <option value="0">Seleccione paciente</option>
                    @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}"> {{  $paciente->name }} </option>
                    @endforeach
                </select>
            </div>
            <legend>Doctor </legend>
            <div class="form-group col-md-6">
                <label class="control-label">Doctor</label>
                <select class="chosen-select"  name="doctor">
                    <option value="0">Seleccione doctor</option>
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}"> {{  $doctor->nombre }} </option>
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

    @if( isset($citologias))
    <div class="row">
        <div class="ibox-content">
            <div class="table-responsive">
            <table id="tblcitologia" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Informe</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                    <th>Recibido</th>
                    <th>Entregado</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($citologias as $key => $citologia)
                    <tr>
                        <td>{{ $citologia->informe }}</td>
                        <td>{{ $citologia->paciente_name }}</td>
                        <td>{{ $citologia->doctor_name}}</td>
                        <td>{{ $citologia->recibido }}</td>
                        <td>{{ $citologia->entregado }}</td>
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
    var tabla = $('#tblcitologia').DataTable({
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
