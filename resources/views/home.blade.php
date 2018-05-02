@extends('layouts.app')

@section ('title') {{ $page_title }} @stop

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">

  <div class="row">

    <div class="col-md-8">

      <div class="row">
          <div class="col-md-6">
              <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <span class="label label-info pull-right">Mensual</span>
                      <h5>Biopsias</h5>
                  </div>
                  <div class="ibox-content">
                      <h1 class="no-margins">{{ $biopsias }}</h1>
                      <small>Biopsias del mes</small>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <span class="label label-primary pull-right">Mensual</span>
                      <h5>Citologías</h5>
                  </div>
                  <div class="ibox-content">
                      <h1 class="no-margins">{{ $citologias }}</h1>
                      <small>Citologías del mes</small>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Accesos directos
            </div>
            <div class="list-group">
              <a href="{{ url('biopsia/create') }}" class="list-group-item">Crear Biopsia</a>
              <a href="{{ url('citologia/create') }}" class="list-group-item">Crear Citología</a>
            </div>           
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Exámenes del mes</h5>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="tblmeses" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tipo</th>
                  <th>Informe</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($meses as $mes)
                  <tr>
                    <td>
                      @if ($mes->tipo == "B")
                        Biopsia
                      @else
                        Citología
                      @endif
                    </td>
                    <td>{{ $mes->informe }}</td>
                    <td>
                      @foreach ($pagos as $pago)
                        @if ($pago['value'] == $mes->estado_pago)
                          {{  $pago['text'] }}
                        @endif
                      @endforeach
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
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
    var tabla = $('#tblmeses').DataTable({
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
