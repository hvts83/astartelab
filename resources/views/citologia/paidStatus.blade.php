@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
<li><a href="{{ url('pagos/citologia/lista-pago') }}">Ver citologias</a></li>
<li class="active"> <strong>{{ $page_title }}</strong> </li>
@endsection

@section ('content')
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
  <div class="widget style1 navy-bg">
    <div class="row">
      <div class="col-xs-4"> <i class="fa fa-medkit fa-5x"></i> </div>
      <div class="col-xs-8 text-right"> <span> Detalle de informe </span>
        <h2 class="font-bold"> {{$citologia->informe}} </h2>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="ibox-content"> @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
            <div class="panel-body">
              @if($citologia->precio_id != null)
              <div class="row">
                @php
                  foreach ($precios as $precio) {
                    if ($precio->id == $citologia->precio_id) {
                      $totalPagar = $precio->monto;
                    }
                  }
                @endphp
              </div>
              <div class="row">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Fecha pago</th>
                      <th>Facturación</th>
                      <th>Monto pagado</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($detalle_pago as $detp)
                      <tr>
                        <td>{{ $detp->created_at }}</td>
                        <td>
                          @foreach ($facturacion as $factu)
                            @if ($factu['value'] == $detp->facturacion)
                              {{  $factu['text'] }}
                            @endif
                          @endforeach
                        </td>
                        <td>{{ $detp->monto }}</td>
                      </tr>
                    @endforeach
                  <tbody>
                </table>
              </div>
              @endIf
              @if ($citologia->estado_pago == 'PE')
              <form role="form" method="post" action="{{ url('/citologia-details/primer_pago/'. $citologia->id ) }}">
                {{ csrf_field() }}
                <div class="form-group col-md-6">
                    <label class="control-label">Precio estimado</label>
                    <div class="input-group m-b">
                      <span class="input-group-addon">$</span>
                      <select  class="form-control"  name="precio_id">
                        <option disabled selected>Seleccione precio estimado</option>
                        @foreach ($precios as $precio)
                          <option value="{{ $precio->id }}"> {{ $precio->nombre . ' - $' . $precio->monto }} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Precio</label>
                    <div class="input-group m-b">
                      <span class="input-group-addon">$</span>
                      <input type="number" placeholder="$" class="form-control" name="precio" step="0.01" min="0.01">
                    </div>
                  </div>
                    <div class="form-group col-md-6">
                      <label class="control-label">Condición de pago</label>
                      <select class="form-control m-b" name="estado_pago">
                        <option disabled selected>Seleccione condición</option>
                        @foreach ($pagos as $pago)
                          @if($pago['value'] !== 'PE') 
                          <option value="{{ $pago['value'] }}"> {{  $pago['text'] }} </option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label">Facturación</label>
                      <select class="form-control m-b" name="facturacion">
                        <option disabled selected>Seleccione facturación</option>
                        @foreach ($facturacion as $factu)
                          <option value="{{ $factu['value'] }}"> {{  $factu['text'] }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Pagar</button>
                    </div>
              </form>
              @endif
          </div>

  </div>
</div>
@endsection

@section('css')
<link href="{{ asset('css/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
<link href="{{ asset('css/iCheck/custom.css')}}" rel="stylesheet">
<link href="{{ asset('css/datepicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{ asset('css/blueimp/css/blueimp-gallery.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/sweetalert/sweetalert.css')}}">
@endsection

@section('scripts') 
<script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script> 
<script src="{{ asset('js/datepicker/bootstrap-datepicker.js')}}"></script> 
<script src="{{ asset('js/iCheck/icheck.min.js')}}"></script> 
<script src="{{ asset('js/blueimp/jquery.blueimp-gallery.min.js')}}"></script> 
<script src="{{ asset('js/sweetalert/sweetalert.min.js')}}"></script> 
<script>
      $(document).ready(function () {
          $('.i-checks').iCheck({
              radioClass: 'iradio_square-green',
          });
      });

    $('#fecha_nacimiento .input-group.date').datepicker({
        startView: 1,
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "dd-mm-yyyy"
    });
    $('.chosen-select').chosen({width: "100%"});
    document.getElementById('list_images').onclick = function (event) {
      event = event || window.event;
      var target = event.target || event.srcElement,
      link = target.src ? target.parentNode : target,
      options = {index: link, event: event},
      links = this.getElementsByTagName('a');
      blueimp.Gallery(links, options);
    };

    $('.delete').click(function (e) {
        swal({
            title: "¿Desea eliminar la información?",
            text: "Al realizar la acción no podrás recuperar los datos",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: false },
        function (isConfirm) {
            if (isConfirm) {
              swal("Eliminado", "Eliminado con exíto.", "success");
              setTimeout(function () {
                $('#del'+ e.currentTarget.value).submit()
              }, 500);
            } else {
                swal("Cancelado", "Eliminación cancelada", "error");
            }
        });
    });
  </script> 
@endsection 