@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/cuentas') }}">Ver cuentas</a></li>
  <li><a href="{{ url('/cuentas/' . $cuenta->id . '/edit') }}"> {{ $cuenta->nombre }}</a></li>
  <li class="active">
      <strong>{{ $page_title }}</strong>
  </li>
@endsection

@section ('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">
          <h5>Fondos de {{ $cuenta->nombre }}</h5>
          <h1 class="no-margins">$ {{ $cuenta->fondo }}</h1>
          <small>Saldo actual</small>
      </div>
    </div>
    @if ($transacciones->isEmpty() == false  )
      <div class="row">
        <div class="table-responsive">
          <table id="tblcuenta" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Cheque</th>
                <th>Concepto</th>
                <th>Ingreso</th>
                <th>Egreso</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transacciones as $key => $trans)
                <tr>
                  <td>{{ $trans->created_at }}</td>
                  <td>{{ $trans->cheque }}</td>
                  <td>{{ $trans->concepto}} </td>
                  <td>
                    @if ($trans->tipo == "I")
                      $ {{ $trans->monto }}
                    @else
                      -
                    @endif
                  </td>
                  <td>
                    @if ($trans->tipo == "E")
                       -$({{ $trans->monto }})
                    @else
                      -
                    @endif
                  </td>
                  <td>{{ $trans->actual }}</td>
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
      <form role="form" method="post" action="{{ url('/cuenta-account/'. $cuenta->id ) }}">
          <legend>Cheque</legend>
           {{ csrf_field() }}
           <div class="row">
             <div class="form-group col-md-4">
               <label>Número</label>
               <input type="number" class="form-control" name="numero">
             </div>
             <div class="form-group col-md-4" id="fecha_realizacion">
               <label class="font-normal">Fecha realización</label>
               <div class="input-group date">
                 <span class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                 </span>
                 <input type="text" name="fecha_realizacion" class="form-control" value="01-01-2018">
               </div>
             </div>
             <div class="form-group col-md-4">
               <label>Lugar</label>
               <input type="text" placeholder="Lugar" class="form-control" name="lugar">
             </div>
             <div class="form-group col-md-12">
               <label>Concepto</label>
               <input type="text" placeholder="concepto" class="form-control" name="concepto">
             </div>
             <div class="form-group col-md-6">
               <label>Monto</label>
               <div class="input-group m-b">
                 <span class="input-group-addon">$</span>
                 <input type="number" placeholder="$" class="form-control" name="monto" step="0.01" min="0.01">
               </div>
             </div>
             <div class="form-group col-md-6">
               <label class="control-label">Tipo</label>
               <br>
               <label class="checkbox-inline i-checks"> <input type="radio" value="E" name="tipo">Egreso</label>
               <label class="checkbox-inline i-checks"> <input type="radio" value="I" name="tipo">Ingreso</label>
             </div>
             <div class="form-group col-md-12">
               <label>Paguese a</label>
               <input type="text" placeholder="Paguese a" class="form-control" name="paguese">
             </div>
             <div class="col-md-12">
               <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
             </div>

           </div>
      </form>
    </div>
  </div>
  </div>


@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('css/dataTables/datatables.min.css')}}">
  <link href="{{ asset('css/iCheck/custom.css')}}" rel="stylesheet">
  <link href="{{ asset('css/datepicker/datepicker3.css')}}" rel="stylesheet">
@endsection

@section('scripts')
	<script src="{{ asset('js/dataTables/datatables.min.js')}}"></script>
  <script src="{{ asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('js/iCheck/icheck.min.js')}}"></script>
	<script>
    //Datatable
    var tabla = $('#tblcuenta').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $(document).ready(function () {
      $('.i-checks').iCheck({
        radioClass: 'iradio_square-green',
      });
    });

    $('#fecha_realizacion .input-group.date').datepicker({
      startView: 1,
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true,
      format: "dd-mm-yyyy"
    });
  </script>
@endsection
