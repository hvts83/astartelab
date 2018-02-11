@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Citologías</li>
@endsection

@section('actions')
    <a href="{{ url('/citologia/create') }}" class="btn btn-default">Nueva citología</a>
@endsection

@section ('content')

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
                <td>
                  <a class="btn btn-default" href="{{ url('/citologia/' .  $citologia->id . "/edit" ) }}">Ver detalle</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
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
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  </script>
@endsection
