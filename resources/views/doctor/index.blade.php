@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Doctores</li>
@endsection

@section ('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="tbldoctor" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($doctores as $key => $doctor)
              <tr>
                <td>{{ $doctor->nombre }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->telefono }}</td>
                <td>
                  <a class="btn btn-default" href="{{ url('/doctores/' .  $doctor->id . "/edit" ) }}">Editar</a>
                  <a class="btn btn-default" href="{{ url('/doctor-biopsias/' .  $doctor->id ) }}">Biopsias</a>
                  <a class="btn btn-default" href="{{ url('/doctor-citologia/' .  $doctor->id ) }}">Citologias</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <a href="{{ url('/doctores/create') }}" class="btn btn-default">Nuevo doctor</a>
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
    var tabla = $('#tbldoctor').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  </script>
@endsection
