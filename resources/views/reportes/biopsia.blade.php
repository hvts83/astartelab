@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Reportes de Biopsias</li>
@endsection

@section ('content')


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">
        <div class="panel-body">
        <form role="form" method="post" action="{{ url('/biopsia') }}">
            {{ csrf_field() }}
            <div class="form-group col-md-5">
                <label class="control-label">Parametro</label>
                <select class="chosen-select" id="categoria">
                    <option>Seleccione parametro</option>
                    <option value="date">Fecha</option>
                    <option value="paciente">Paciente</option>
                    <option value="doctor">Doctor</option>
                </select>
            </div>
            <div class="form-group col-md-5">
                <label for="control-label">-</label>
                <select class="chosen-select" id="opcion" disabled>
                    <option>Seleccione opcion</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <button class="btn btn-primary">Enviar</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>

@endsection

@section('css')
    <link href="{{ asset('css/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/dataTables/datatables.min.css')}}">
@endsection

@section('scripts')
    <script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script>
	<script src="{{ asset('js/dataTables/datatables.min.js')}}"></script>
	<script>
    //Datatable
    var tabla = $('#tblbiopsia').DataTable({
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
    $('.chosen-select').chosen({
      width: "100%",
      no_results_text: "No se encontró resultados"
    });
  </script>
@endsection
