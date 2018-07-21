@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Pacientes</li>
@endsection

@section('actions')
  <a href="{{ url('/pacientes/create') }}" class="btn btn-primary">Nuevo Paciente</a>
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
        <table id="tblpaciente" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Edad</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pacientes as $key => $paciente)
              <tr>
                <th>{{ $paciente->id }}</th>
                <td>{{ $paciente->name }}</td>
                <td>{{ $paciente->email }}</td>
                <td>{{ $paciente->telefono }}</td>
                <td>{{ $paciente->edad }} a&ntilde;os</td>
                <td>
                  <a class="btn btn-default" href="{{ url('/pacientes/' .  $paciente->id . "/edit" ) }}">Editar</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="div-btn">
          <a href="{{ url('/pacientes/create') }}" class="btn btn-primary pull-right">Nuevo Paciente</a>
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
    var tabla = $('#tblpaciente').DataTable({
      "paging": true,"language": {
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
