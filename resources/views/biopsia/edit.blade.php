@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/biopsia') }}">Ver biopsias</a></li>
  <li class="active">
      <strong>{{ $page_title }}</strong>
  </li>
@endsection

@section('actions')
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"> Enviar correo</button>
@endsection

@section ('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-medkit fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Detalle de informe </span>
                    <h2 class="font-bold"> {{$biopsia->informe}} </h2>
                </div>
            </div>
        </div>
    </div>
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

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab-1">Datos de consulta</a></li>
            <li class=""><a data-toggle="tab" href="#tab-2">Pago</a></li>
            <li class=""><a data-toggle="tab" href="#tab-3">Reporte Macro</a></li>
            <li class=""><a data-toggle="tab" href="#tab-4">Reporte Micro</a></li>
            <li class=""><a data-toggle="tab" href="#tab-5">Reporte Informe preliminar y Dx</a></li>
            <li class=""><a data-toggle="tab" href="#tab-6">Inmunohistoquimica</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body">
                  <form role="form" method="post" action="{{ url('/biopsia/'. $biopsia->id ) }}">
                       {{ csrf_field() }}
                       <input name="_method" type="hidden" value="PUT">
                       <div class="form-group col-md-12">
                          <label class="font-normal">Codigo de Informe</label>
                          <input type="text" name="informe" class="form-control" value="{{$biopsia->informe}}">
                      </div>
                       <div class="form-group col-md-6" id="fecha_nacimiento">
                           <label class="font-normal">Recibido</label>
                           <div class="input-group date">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="recibido" class="form-control" value="{{ $biopsia->recibido }}">
                           </div>
                       </div>
                       <div class="form-group col-md-6" id="fecha_nacimiento">
                           <label class="font-normal">Entregado</label>
                           <div class="input-group date">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="entregado" class="form-control" value="{{ $biopsia->entregado }}">
                           </div>
                       </div>
                       <div class="form-group col-md-6">
                          <label class="control-label">Doctor</label>
                          <input type="text" class="form-control" readonly value="{{$biopsia->doctor}}">
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Grupo</label>
                         <input type="text" class="form-control" readonly value="{{$biopsia->grupo}}">
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Paciente</label>
                         <input type="text" class="form-control" readonly value="{{$biopsia->paciente}}">
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Diagnóstico</label>
                         <select class="chosen-select"  tabindex="2" name="diagnostico_id">
                           <option>Seleccione diagnóstico</option>
                           @foreach ($diagnosticos as $diagnostico)
                             @if ($diagnostico->id == $biopsia->diagnostico_id)
                               <option value="{{ $diagnostico->id }}" selected> {{  $diagnostico->nombre }} </option>
                             @else
                              <option value="{{ $diagnostico->id }}"> {{  $diagnostico->nombre }} </option>
                             @endif
                           @endforeach
                         </select>
                       </div>
                      <div class="col-md-12">
                          <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                      </div>
                  </form>
                </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body">
                @if($biopsia->precio_id != null)
                  <div class="row">
                    @php
                      foreach ($precios as $precio) {
                        if ($precio->id == $biopsia->precio_id) {
                          $totalPagar = $precio->monto;
                        }
                      }
                    @endphp
                    <table class="table">
                      <tr>
                        <td><strong>Total</strong></td>
                        <td>{{ $totalPagar  }}</td>
                      </tr>
                    </table>
                  </div>
                  <div class="row">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Fecha pago</th>
                          <th>Facturación</th>
                          <th>Monto pagado</th>
                          <th>Saldo</th>
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
                            <td>{{ $detp->saldo }}</td>
                          </tr>
                        @endforeach
                      <tbody>
                    </table>
                  </div>

                  @if ($biopsia->estado_pago == 'AP' || $biopsia->estado_pago == 'PE')
                    <form role="form" method="post" action="{{ url('/biopsia-details/abono/'. $biopsia->id ) }}">
                    {{ csrf_field() }}
                    <label class="control-label"> Abono </label>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="number" placeholder="Abono" required class="form-control" name="monto" step="0.01" min="0.01" max="{{ $detalle_pago[0]->saldo }}">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Facturación</label>
                      <select class="form-control m-b" name="facturacion">
                        <option>Seleccione facturación</option>
                        @foreach ($facturacion as $factu)
                          <option value="{{ $factu['value'] }}"> {{  $factu['text'] }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                  </form>
                  @endif
                  @else
                  <form role="form" method="post" action="{{ url('/biopsia-details/primer_pago/'. $biopsia->id ) }}">
                    {{ csrf_field() }}
                      <div class="form-group col-md-4">
                          <label class="control-label">Precio</label>
                          <div class="input-group m-b">
                            <span class="input-group-addon">$</span>
                            <select  class="form-control"  name="precio_id">
                              <option disabled selected>Seleccione precio</option>
                              @foreach ($precios as $precio)
                                <option value="{{ $precio->id }}"> {{ $precio->nombre . ' - $' . $precio->monto }} </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Condición de pago</label>
                          <select class="form-control m-b" name="estado_pago">
                            <option disabled selected>Seleccione condición</option>
                            @foreach ($pagos as $pago)
                              <option value="{{ $pago['value'] }}"> {{  $pago['text'] }} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Facturación</label>
                          <select class="form-control m-b" name="facturacion">
                            <option disabled selected>Seleccione facturación</option>
                            @foreach ($facturacion as $factu)
                              <option value="{{ $factu['value'] }}"> {{  $factu['text'] }} </option>
                            @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pagar</button>
                  </form>
                  @endif
              </div>
            </div>
            <div id="tab-3" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="{{ url('/biopsia-details/macro/'. $macro->id ) }}">
                     {{ csrf_field() }}
                     <div class="form-group">
                        <label class="control-label">Frases</label>
                        <div class="input-group">
                          <select class="chosen-select" data-placeholder="Selecciondiagnosticoses" id="select_macro" style="height: 24pt">
                            @foreach ($frases as $frase)
                              <option value="{{ $frase->nombre }}" style="height: 24pt"> {{  $frase->nombre }} </option>
                            @endforeach
                          </select>
                          <span class="input-group-btn"> <button type="button" id="add_macro" class="btn btn-primary">Agregar</button></span>
                        </div>
                      </div>
                      <div class="form-group">
                      <textarea class="form-control" rows="5" id="macro" name="macro">{{ $macro->detalle }}</textarea>
                      </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-4" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="{{ url('/biopsia-details/micro/'. $micro->id ) }}">
                     {{ csrf_field() }}
                     <div class="form-group">
                        <label class="control-label">Frases</label>
                        <div class="input-group">
                          <select class="chosen-select" data-placeholder="Seleccione frases" id="select_micro">
                            @foreach ($frases as $frase)
                              <option value="{{ $frase->nombre }}"> {{  $frase->nombre }} </option>
                            @endforeach
                          </select>
                          <span class="input-group-btn"> <button type="button" id="add_micro" class="btn btn-primary">Agregar</button></span>
                        </div>
                      </div>
                      <div class="form-group">
                      <textarea class="form-control" rows="5" id="micro" name="micro">{{ $micro->detalle }}</textarea>
                      </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-5" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="{{ url('/biopsia-details/preliminar/'. $preliminar->id ) }}">
                     {{ csrf_field() }}
                     <div class="form-group">
                        <label class="control-label">Diagnóstico</label>
                        <div class="input-group">
                          <select class="chosen-select" data-placeholder="Seleccione frases" id="select_preliminar">
                            @foreach ($diagnosticos as $diagnostico)
                              <option value="{{ $diagnostico->nombre }}"> {{  $diagnostico->nombre }} </option>
                            @endforeach
                          </select>
                          <span class="input-group-btn"> <button type="button" id="add_preliminar" class="btn btn-primary">Agregar</button></span>
                        </div>
                      </div>
                      <div class="form-group">
                      <textarea class="form-control" rows="5" id="preliminar" name="preliminar">{{ $preliminar->detalle }}</textarea>
                      </div>
                     <div class="form-group">
                        <label class="control-label">¿Es diagnóstico preeliminar?</label>
                        <br>
                        @if($biopsia->informe_preliminar == '1')
                        <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="dpreliminar" checked>Si</label>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="dpreliminar">No</label>
                        @else
                        <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="dpreliminar">Si</label>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="dpreliminar" checked>No</label>
                        @endIf
                      </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-6" class="tab-pane">
              <div class="panel-body">
                <div class="row">
                  <form role="form" method="post" action="{{ url('/biopsia-details/inmunohistoquimica/'. $inmunohistoquimica->id ) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label">Diagnóstico</label>
                        <div class="input-group">
                          <select class="chosen-select" data-placeholder="Seleccione frases" id="select_inmuno">
                            @foreach ($diagnosticos as $diagnostico)
                              <option value="{{ $diagnostico->nombre }}"> {{  $diagnostico->nombre }} </option>
                            @endforeach
                          </select>
                          <span class="input-group-btn"> <button type="button" id="add_inmuno" class="btn btn-primary">Agregar</button></span>
                        </div>
                      </div>
                      <div class="form-group">
                      <textarea class="form-control" rows="5" id="inmuno" name="inmuno">{{ $inmunohistoquimica->detalle }}</textarea>
                      </div>

                    <div>
                      <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                  </form>
                </div>
                <br>
                <div class="row">
                  <fieldset>
                    <legend>Imágenes</legend>
                    <form action="{{ url('/biopsia-details/imagen/'. $biopsia->id ) }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label>Imagen</label>
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                          <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                            <span class="fileinput-filename"></span>
                          </div>
                          <span class="input-group-addon btn btn-default btn-file">
                            <span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="imagen"/>
                          </span>
                          <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                      </div>
                      <div>
                          <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                      </div>
                    </form>
                  </fieldset>
                </div>
                @if (!$imagenes->isEmpty())
                  <div class="lightBoxGallery">
                      <div id="list_images">
                            @foreach ($imagenes as $key => $img)
                              <a href="{{ asset($img->url) }}" ><img src="{{ asset($img->url) }}" style="height=auto;width: 200px;"/></a>
                            @endforeach

                      </div>
                      <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                  </div>
                @endif
              </div>
            </div>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enviar correo</h4>
      </div>
      <div class="modal-body">
        Se enviará un correo al paciente: {{ $pacienteConsulta->name }} al correo {{ $pacienteConsulta->email }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="{{ url('/biopsia-details/send/'. $biopsia->id ) }}" class="btn btn-primary">Enviar correo</a>
      </div>
    </div>
  </div>
</div>

<div id="blueimp-gallery" class="blueimp-gallery">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
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
    <script>
        $('#add_macro').on('click', function(){
          $('#macro').append( $('#select_macro').val() );
        });
        $('#add_micro').on('click', function(){
          $('#micro').append( $('#select_micro').val() );
        });
        $('#add_preliminar').on('click', function(){
          $('#preliminar').append( $('#select_preliminar').val() );
        });
        $('#add_inmuno').on('click', function(){
          $('#inmuno').append( $('#select_inmuno').val() );
        });
      </script>
@endsection
