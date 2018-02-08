@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Biopsias</li>
@endsection

@section ('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="tblbiopsia" class="table table-bordered table-striped">
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
            @foreach ($biopsias as $key => $biopsia)
              <tr>
                <td>{{ $biopsia->informe }}</td>
                <td>{{ $biopsia->paciente_name }}</td>
                <td>{{ $biopsia->doctor_name}}</td>
                <td>{{ $biopsia->recibido }}</td>
                <td>
                  <a class="btn btn-default" href="{{ url('/biopsia/' .  $biopsia->id . "/edit" ) }}">Ver detalle</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <a href="{{ url('/biopsia/create') }}" class="btn btn-default">Nueva biopsia</a>
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
    var tabla = $('#tblbiopsia').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  </script>
@endsection
