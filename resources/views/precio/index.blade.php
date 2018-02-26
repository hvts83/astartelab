
@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Precios</li>
@endsection

@section('actions')
    <a href="{{ url('/precios/create') }}" class="btn btn-primary">Nueva precio</a>
@endsection

@section ('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="tblprecio" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Monto</th>
              <th>Tipo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($precios as $key => $precio)
              <tr>
                <td>{{ $precios->id }}</td>
                <td>{{ $precio->nombre }}</td>
                <td>$ {{ $precio->monto }}</td>
                <td>
                  @foreach ($tipos as $tipo)
                    @if ($tipo['value'] == $precio->tipo)
                      {{ $tipo['text'] }}
                    @endif
                  @endforeach
                </td>
                <td>
                  <a class="btn btn-default" href="{{ url('/precios/' .  $precio->id . "/edit" ) }}">Editar</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="div-btn">
          <a href="{{ url('/precios/create') }}" class="btn btn-primary pull-right">Nueva precio</a>
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
    var tabla = $('#tblprecio').DataTable({
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
