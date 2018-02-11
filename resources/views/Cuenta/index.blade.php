@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Cuentas</li>
@endsection

@section('actions')
    <a href="{{ url('/cuentas/create') }}" class="btn btn-default">Nueva Cuenta</a>
@endsection

@section ('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="tblcuenta" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nombre</th>
              <th>Fondos</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cuentas as $key => $cuenta)
              <tr>
                <td>{{ $cuenta->codigo }}</td>
                <td>{{ $cuenta->nombre }}</td>
                <td> ${{ $cuenta->fondo }}</td>
                <td>
                  <a class="btn btn-default" href="{{ url('/cuentas/' .  $cuenta->id . "/edit" ) }}">Editar</a>
                  <a class="btn btn-default" href="{{ url('/cuenta-account/' .  $cuenta->id ) }}">Detalle</a>
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
    var tabla = $('#tblcuenta').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  </script>
@endsection