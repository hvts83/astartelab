@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Diagnóstico</li>
@endsection

@section ('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="tbldiagnostico" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Tipo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($diagnosticos as $key => $diagnostico)
              <tr>
                <td>{{ $diagnostico->nombre }}</td>
                <td>
                  @foreach ($tipos as $tipo)
                    @if ($tipo['value'] == $diagnostico->tipo)
                      {{ $tipo['text'] }}
                    @endif
                  @endforeach
                </td>
                <td>
                  <a class="btn btn-default" href="{{ url('/diagnosticos/' .  $diagnostico->id . "/edit" ) }}">Editar</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <a href="{{ url('/diagnosticos/create') }}" class="btn btn-default">Nuevo diagnóstico</a>
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
    var tabla = $('#tbldiagnostico').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  </script>
@endsection
