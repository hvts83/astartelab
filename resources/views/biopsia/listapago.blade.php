@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Biopsias</li>
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
          <table id="tblbiopsia" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Informe</th>
                <th>Estado</th>
                <th>Recibido</th>
                <th>Entregado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($biopsias as $key => $biopsia)
                <tr>
                  <td>{{ $biopsia->informe }}</td>
                  <td>{{ $biopsia->estado_pago }}</td>
                  <td>{{ date('d-m-Y', strtotime($biopsia->recibido)) }} </td>
                  <td>{{ date('d-m-Y', strtotime($biopsia->entregado)) }}</td>
                  <td>
                      <a class="btn btn-default" href="{{ url('/biopsia/' .  $biopsia->id . "/edit" ) }}">Ver detalle</a>
                    <a class="btn btn-default" href="{{ url('/pagos/biopsia/' .  $biopsia->id . "/estado-pago" ) }}">Ver pagos</a>
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
