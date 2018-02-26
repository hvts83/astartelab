@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Citologías</li>
@endsection

@section('actions')
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
      <div class="table-responsive">
        <table id="tblcitologia" class="table table-bordered table-striped">
          <thead>
            <tr>
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
                <td>{{ $citologia->informe }}</td>
                <td>{{ $citologia->paciente_name }}</td>
                <td>{{ $citologia->doctor_name}}</td>
                <td>{{ $citologia->recibido }}</td>
                <td>{{ $citologia->entregado }}</td>
                <td>
                  <a class="btn btn-default" href="{{ url('/citologia/' .  $citologia->id . "/edit" ) }}">Ver detalle</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="div-btn">
        <a href="{{ url('/citologia/create') }}" class="btn btn-primary pull-right">Nueva Citología</a>
      </div>
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
