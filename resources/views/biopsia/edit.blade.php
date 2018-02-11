@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/biopsia') }}">Ver biopsias</a></li>
  <li class="active">
      <strong>{{ $page_title }}</strong>
  </li>
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
                         <select class="chosen-select"  tabindex="2" name="doctor_id">
                           <option>Seleccione doctor</option>
                           @foreach ($doctores as $doctor)
                             @if ($doctor->id == $biopsia->doctor_id)
                               <option value="{{ $doctor->id }}" selected> {{  $doctor->nombre }} </option>
                             @else
                              <option value="{{ $doctor->id }}"> {{  $doctor->nombre }} </option>
                             @endif
                           @endforeach
                         </select>
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Grupo</label>
                         <select class="chosen-select"  tabindex="2" name="grupo_id">
                           <option>Seleccione grupo</option>
                           @foreach ($grupos as $grupo)
                             @if ($grupo->id == $biopsia->grupo_id)
                               <option value="{{ $grupo->id }}" selected> {{  $grupo->nombre }} </option>
                             @else
                              <option value="{{ $grupo->id }}"> {{  $grupo->nombre }} </option>
                             @endif
                           @endforeach
                         </select>
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Paciente</label>
                         <select class="chosen-select"  tabindex="2" name="paciente_id">
                           <option>Seleccione paciente</option>
                           @foreach ($pacientes as $paciente)
                             @if ($paciente->id == $biopsia->paciente_id)
                               <option value="{{ $paciente->id }}" selected> {{  $paciente->name }} </option>
                             @else
                              <option value="{{ $paciente->id }}"> {{  $paciente->name }} </option>
                             @endif
                           @endforeach
                         </select>
                       </div>
                       <div class="form-group">
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
                      <div>
                          <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                      </div>
                  </form>
                </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body">
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

              </div>
            </div>
            <div id="tab-3" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="{{ url('/biopsia-details/macro/'. $biopsia->id ) }}">
                     {{ csrf_field() }}
                     <div class="form-group">
                       <label class="control-label">Frases</label>
                       <select class="chosen-select"  tabindex="2" name="frase_id">
                         <option>Seleccione Frase</option>
                         @foreach ($frases as $frase)
                           @if ($macro != null)
                             @if ($frase->id == $macro->frase_id)
                               <option value="{{ $frase->id }}" selected> {{  $frase->nombre }} </option>
                             @else
                               <option value="{{ $frase->id }}"> {{  $frase->nombre }} </option>
                             @endif
                           @else
                             <option value="{{ $frase->id }}"> {{  $frase->nombre }} </option>
                           @endif
                         @endforeach
                       </select>
                     </div>
                     <div class="form-group">
                         <label class="control-label">Detalle</label>
                         <textarea name="detalle" class="form-control">@if ($macro != null){{ $macro->detalle }}@endif</textarea>
                     </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-4" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="{{ url('/biopsia-details/micro/'. $biopsia->id ) }}">
                     {{ csrf_field() }}
                     <div class="form-group">
                       <label class="control-label">Frases</label>
                       <select class="chosen-select"  tabindex="2" name="frase_id">
                         <option>Seleccione Frase</option>
                         @foreach ($frases as $frase)
                           @if ($micro != null)
                             @if ($frase->id == $micro->frase_id)
                               <option value="{{ $frase->id }}" selected> {{  $frase->nombre }} </option>
                             @else
                               <option value="{{ $frase->id }}"> {{  $frase->nombre }} </option>
                             @endif
                           @else
                             <option value="{{ $frase->id }}"> {{  $frase->nombre }} </option>
                           @endif
                         @endforeach
                       </select>
                     </div>
                     <div class="form-group">
                         <label class="control-label">Detalle</label>
                         <textarea name="detalle" class="form-control">@if ($micro != null){{ $micro->detalle }}@endif</textarea>
                     </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-5" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="{{ url('/biopsia-details/preliminar/'. $biopsia->id ) }}">
                     {{ csrf_field() }}
                     <div class="form-group">
                       <label class="control-label">Diagnóstico</label>
                       <select class="chosen-select"  tabindex="2" name="diagnostico_id">
                         <option>Seleccione diagnóstico</option>
                         @foreach ($diagnosticos as $diagnostico)
                           @if ($preliminar != null)
                             @if ($diagnostico->id == $preliminar->diagnostico_id)
                               <option value="{{ $diagnostico->id }}" selected> {{  $diagnostico->nombre }} </option>
                             @else
                               <option value="{{ $diagnostico->id }}"> {{  $diagnostico->nombre }} </option>
                             @endif
                           @else
                             <option value="{{ $diagnostico->id }}"> {{  $diagnostico->nombre }} </option>
                           @endif
                         @endforeach
                       </select>
                     </div>
                     <div class="form-group">
                         <label class="control-label">Detalle</label>
                         <textarea name="detalle" class="form-control">@if ($preliminar != null){{ $preliminar->detalle }}@endif</textarea>
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
                  <form role="form" method="post" action="{{ url('/biopsia-details/inmunohistoquimica/'. $biopsia->id ) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label">Resultado</label>
                      <input class="form-control" placeholder="Resultado" type="text" name="resultado" value="@if($inmunohistoquimica != null){{ $inmunohistoquimica->resultado }}@endif">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Detalle</label>
                      <textarea name="detalle" class="form-control">@if ($inmunohistoquimica != null){{ $inmunohistoquimica->detalle }}@endif</textarea>
                    </div>
                    <div>
                      <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                  </form>
                </div>
                <br>
                @if ($inmunohistoquimica != null)
                  <div class="row">
                    <fieldset>
                      <legend>Imágenes</legend>
                      <form action="{{ url('/biopsia-details/inmunohistoquimica_imagen/'. $biopsia->id ) }}" method="post" enctype="multipart/form-data">
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
                @endif
                @if (!$inmunohistoquimica_imagenes->isEmpty())
                  <div class="lightBoxGallery">
                      <div id="list_images">
                        @foreach ($inmunohistoquimica_imagenes as $key => $img)
                          <a href="{{ asset($img->url) }}" ><img src="{{ asset($img->url) }}" style="height=auto;width: 200px;"></a>
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
@endsection

@section('scripts')
  <script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script>
  <script src="{{ asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('js/iCheck/icheck.min.js')}}"></script>
  <script src="{{ asset('js/blueimp/jquery.blueimp-gallery.min.js')}}"></script>
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
  </script>
@endsection
