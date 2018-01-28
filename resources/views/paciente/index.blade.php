@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Marcas</li>
@endsection

@section ('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="tblpaciente" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pacientes as $key => $paciente)
              <tr>
                <td>{{ $paciente->name }}</td>
                <td>{{ $paciente->email }}</td>
                <td>{{ $paciente->telefono }}</td>
                <td>
                  <a class="btn btn-default" href="{{ url('/pacientes/' .  $paciente->id . "/edit" ) }}">Editar</a>
                  <a class="btn btn-default" href="{{ url('/paciente-biopsias/' .  $paciente->id ) }}">Biopsias</a>
                  <a class="btn btn-default" href="{{ url('/paciente-citologia/' .  $paciente->id ) }}">Citologias</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <a href="{{ url('/pacientes/create') }}" class="btn btn-default">Nuevo paciente</a>
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
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  </script>
@endsection
