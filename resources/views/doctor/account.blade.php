@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/doctores') }}">Ver doctores</a></li>
  <li><a href="{{ url('/doctores/' . $doctor->id . '/edit') }}"> {{ $doctor->nombre }}</a></li>
  <li class="active">
      <strong>{{ $page_title }}</strong>
  </li>
@endsection

@section ('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">
          <h5>Fondos de {{ $doctor->nombre }}</h5>
          <h1 class="no-margins">$ {{ $doctor->saldo }}</h1>
          <small>Saldo actual</small>
      </div>
    </div>
    @if ($transacciones->isEmpty() == false  )
      <div class="row">
        <div class="table-responsive">
          <table id="tbldoctor" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tipo transacción</th>
                <th>Monto</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transacciones as $key => $trans)
                <tr>
                  <td>
                    @if ($trans->tipo == "I")
                      Ingreso
                    @else
                      Egreso
                    @endif
                  </td>
                  <td>{{ $trans->monto }}</td>
                  <td>{{ $trans->created_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @endif
    <div class="row">
      <div class="ibox-content">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form role="form" method="post" action="{{ url('/doctor-account/'. $doctor->id ) }}">
             {{ csrf_field() }}
            <div class="form-group">
              <label>Monto a agregar</label>
              <div class="input-group m-b">
                <span class="input-group-addon">$</span>
                <input type="number" placeholder="$" class="form-control" name="monto" step="0.01" min="0.01">
              </div>
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="{{ url('/doctores/' . $doctor->id . '/edit') }}" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
            </div>
        </form>
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
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  </script>
@endsection
