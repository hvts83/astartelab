@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Biopsias</li>
@endsection

@section('actions')
  <a href="{{ url('/doctores/create') }}" class="btn btn-primary">Nuevo Doctor</a>
  <a href="{{ url('/pacientes/create') }}" class="btn btn-primary">Nuevo Paciente</a>
  <a href="{{ url('/biopsia/create') }}" class="btn btn-primary">Nueva Biopsia</a>
@endsection

@section ('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <form role="form" method="get" action="{{ url('/biopsia/show2') }}">
      <div class="table-responsive">
          <table id="tblbiopsia" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Seleccionar</th>
                <th>Informe</th>
                <th>Paciente</th>
                <th>Doctor</th>
                <th>Recibido</th>
                <th>Entregado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($biopsias as $key => $biopsia)
                <tr>
                  <th><input type="checkbox" name="id[]" value="{{ $biopsia->id }}" ></th>
                  <td>{{ $biopsia->informe }}</td>
                  <td>{{ $biopsia->paciente_name }}</td>
                  <td>{{ $biopsia->doctor_name}}</td>
                  <td>{{ date('d-m-Y', strtotime($biopsia->recibido)) }} </td>
                  <td>{{ date('d-m-Y', strtotime($biopsia->entregado)) }}</td>
                  <td>
                    <a class="btn btn-default" href="{{ url('/biopsia/' .  $biopsia->id . "/edit" ) }}">Ver detalle</a>
                    <a class="btn btn-default" href="{{ url('/biopsia/' .  $biopsia->id . "/pdf" ) }}">PDF</a>
                    <a class="btn btn-default" href="{{ url('/biopsia/' .  $biopsia->id . "/print" ) }}" target="_blank">Imprimir</a>
                    <a class="btn btn-default" href="{{ url('/biopsia/' .  $biopsia->id . "/envelope" ) }}" target="_blank">Sobre</a>
                    <a class="btn btn-default" href="{{ url('/biopsia/' .  $biopsia->id . "/sm" ) }}" target="_blank">Sin Membrete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="div-btn">
          <button type="submit" class="btn btn-primary" target="_blank"> Imprimir Reportes </button>
          <a href="{{ url('/biopsia/create') }}" class="btn btn-primary pull-right">Nueva Biopsia</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('css/dataTables/datatables.min.css')}}">
@endsection

@section('scripts')
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
  </script>
@endsection
