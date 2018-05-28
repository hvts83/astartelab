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
            {{ csrf_field() }}
            <legend>Busqueda por fecha</legend>
            <div class="col-md-4 form-group" id="data_3">
                <label class="font-normal">Rango:</label>
                <div class="input-daterange input-group">
                    <input type="text" name="inicio" class="input-sm form-control">
                    <span class="input-group-addon">Hasta</span>
                    <input type="text" name="fin" class="input-sm form-control">
                </div>
            </div>
            <div class=" col-md-4 form-group" id="data_2">
                <label class="font-normal">Mes:</label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="mes">
                </div>
            </div>
            <div class=" col-md-4 form-group" id="data_1">
                <label class="font-normal">Año:</label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="annio">
                </div>
            </div>
            <legend>Grupo</legend>
            <div class="form-group col-md-12">
                <label class="control-label">Grupo</label>
                <select class="chosen-select"  name="grupo">
                    <option selected disabled>Seleccione grupo</option>
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
                        <td>{{ $cgrupo->doctor_name}}</td>
                        <td>{{ $cgrupo->grupo_name }}</td>
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
    <link rel="stylesheet" href="{{ asset('css/dataTables/buttons.dataTables.min.css')}}">
    <link href="{{ asset('css/datepicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script>
    <script src="{{ asset('js/dataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('js/dataTables/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('js/dataTables/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('js/dataTables/buttons.print.min.js')}}"></script>
    <script src="{{ asset('js/dataTables/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('js/dataTables/jszip.min.js')}}"></script>
    <script src="{{ asset('js/dataTables/pdfmake.min.js')}}"></script>
    <script src="{{ asset('js/dataTables/vfs_fonts.js')}}"></script>
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
      "autoWidth": false,
      'dom': 'Bfrtip',
      'buttons': [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

     $('#data_1 .input-group.date').datepicker({
        minViewMode: 2,
        keyboardNavigation: false,
        forceParse: false,
        forceParse: false,
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy"
    });

    $('#data_2 .input-group.date').datepicker({
        minViewMode: 1,
        keyboardNavigation: false,
        forceParse: false,
        forceParse: false,
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy"
    });

    $('#data_3 .input-daterange').datepicker({
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