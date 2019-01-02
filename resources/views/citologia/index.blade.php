@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Citologías</li>
@endsection

@section('actions')
    <a href="{{ url('/doctores/create') }}" class="btn btn-primary">Nuevo Doctor</a>
    <a href="{{ url('/pacientes/create') }}" class="btn btn-primary">Nuevo Paciente</a>
    <a href="{{ url('/citologia/create') }}" class="btn btn-primary">Nueva Citología</a>
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
      <form role="form" method="get" action="{{ url('/citologia/show') }}">
      <div class="table-responsive">
        <table id="tblcitologia" class="table table-bordered table-striped">
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
            @foreach ($citologias as $key => $citologia)
              <tr>
                <th><input type="checkbox" name="id[]" value="{{ $citologia->id }}" ></th> 
                <td>{{ $citologia->informe }}</td>
                <td>{{ $citologia->paciente_name }}</td>
                <td>{{ $citologia->doctor_name}}</td>
                <td>{{ date('d-m-Y', strtotime($citologia->recibido)) }}</td>
                <td>{{ date('d-m-Y', strtotime($citologia->recibido)) }}</td>
                <td>
                  <a class="btn btn-default" href="{{ url('/citologia/' .  $citologia->id . "/edit" ) }}">Ver detalle</a>
                  <a class="btn btn-default" href="{{ url('/citologia/' .  $citologia->id . "/pdf" ) }}">PDF</a>
                  <a class="btn btn-default" href="{{ url('/citologia/' .  $citologia->id . "/print" ) }}" target="_blank">Imprimir</a>
                  <a class="btn btn-default" href="{{ url('/citologia/' .  $citologia->id . "/envelope" ) }}" target="_blank">Sobre</a>
                  <a class="btn btn-default" href="{{ url('/citologia/' .  $citologia->id . "/sm" ) }}" target="_blank">Sin Membrete</a>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="div-btn">
        <button type="submit" class="btn btn-primary"> Imprimir Reportes</button>
        <a href="{{ url('/citologia/create') }}" class="btn btn-primary pull-right">Nueva Citología</a>
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
  </script>
@endsection
