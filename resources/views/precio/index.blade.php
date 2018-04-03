
@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li class="active">Precios</li>
@endsection

@section('actions')
    <a href="{{ url('/precios/create/B') }}" class="btn btn-primary">Nuevo Precio de Biopsia</a>
    <a href="{{ url('/precios/create/C') }}" class="btn btn-primary">Nuevo Precio de Citología</a>
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
        <table id="tblprecio" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Monto</th>
              <th>Consulta</th>
              <th>Tipo Consulta</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($precios as $key => $precio)
              <tr>
                <td>{{ $precio->id }}</td>
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
                  @if($precio->tipo === 'c')
                    @foreach ($tipo_citologia as $tipo_c)
                      @if ($tipo_c->id == $precio->tipo_id)
                        {{ $tipo_c->nombre }}
                      @endif
                    @endforeach
                  @else
                    @foreach ($tipo_biopsia as $tipo_b)
                      @if ($tipo_b->id == $precio->tipo_id)
                        {{ $tipo_b->nombre }}
                      @endif
                    @endforeach
                  @endif
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
          <a href="{{ url('/precios/create') }}" class="btn btn-primary pull-right">Nuevo Precio</a>
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
