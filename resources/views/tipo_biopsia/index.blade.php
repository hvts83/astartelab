@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Tipo de Biopsia</li>
@endsection

@section('actions')
    <a href="{{ url('/tipo-biopsia/create') }}" class="btn btn-primary">Nuevo Tipo</a>
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
        <table id="tbltipo" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tipo_biopsias as $key => $tipo_biopsia)
              <tr>
                <td>{{ $tipo_biopsia->id }}</td>
                <td>{{ $tipo_biopsia->nombre }}</td>
                <td>
                  <a class="btn btn-default" href="{{ url('/tipo-biopsia/' .  $tipo_biopsia->id . "/edit" ) }}">Editar</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="div-btn">
        <a href="{{ url('/tipo-biopsia/create') }}" class="btn btn-primary pull-right">Nuevo tipo</a>
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
    var tabla = $('#tbltipo').DataTable({
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
