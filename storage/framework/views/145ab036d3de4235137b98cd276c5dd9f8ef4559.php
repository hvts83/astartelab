<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/biopsia')); ?>">Ver biopsias</a></li>
  <li class="active">
      <strong><?php echo e($page_title); ?></strong>
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions'); ?>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"> Enviar correo</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-medkit fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Detalle de informe </span>
                    <h2 class="font-bold"> <?php echo e($biopsia->informe); ?> </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="ibox-content">

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

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
                  <form role="form" method="post" action="<?php echo e(url('/biopsia/'. $biopsia->id )); ?>">
                       <?php echo e(csrf_field()); ?>

                       <input name="_method" type="hidden" value="PUT">
                       <div class="form-group col-md-6">
                          <label class="font-normal">Codigo de Informe</label>
                          <input type="text" name="informe" class="form-control" value="<?php echo e($biopsia->informe); ?>">
                      </div>
                       <div class="form-group col-md-6" id="fecha_nacimiento">
                           <label class="font-normal">Recibido</label>
                           <div class="input-group date">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="recibido" class="form-control" value="<?php echo e($biopsia->recibido); ?>">
                           </div>
                       </div>
                       <div class="form-group col-md-6" id="fecha_nacimiento">
                           <label class="font-normal">Entregado</label>
                           <div class="input-group date">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="entregado" class="form-control" value="<?php echo e($biopsia->entregado); ?>">
                           </div>
                       </div>
                       <div class="form-group col-md-6">
                          <label class="control-label">Doctor</label>
                          <input type="text" class="form-control" readonly value="<?php echo e($biopsia->doctor); ?>">
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Grupo</label>
                         <input type="text" class="form-control" readonly value="<?php echo e($biopsia->grupo); ?>">
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Paciente</label>
                         <input type="text" class="form-control" readonly value="<?php echo e($biopsia->paciente); ?>">
                       </div>
                       <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Diagnóstico</label>
                            <select class="chosen-select form-control" data-placeholder="Seleccione diagnóstico" id="select_diagnostico_id">
                              <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($diagnostico->nombre); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <button type="button" id="add_diagnostico_id" class="btn btn-primary">Agregar</button>
                          <div class="form-group">
                              <textarea class="form-control" rows="5" id="diagnostico_id" name="diagnostico"> <?php echo e($biopsia->diagnostico); ?> </textarea>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                      </div>
                  </form>
                </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body">
                <?php if($biopsia->precio_id != null): ?>
                  <div class="row">
                    <?php
                      foreach ($precios as $precio) {
                        if ($precio->id == $biopsia->precio_id) {
                          $totalPagar = $precio->monto;
                        }
                      }
                    ?>
                    <table class="table">
                      <tr>
                        <td><strong>Total</strong></td>
                        <td><?php echo e($totalPagar); ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="row">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Fecha pago</th>
                          <th>Tipo</th>
                          <th>Facturación</th>
                          <th>Monto pagado</th>
                          <th>Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $detalle_pago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($detp->created_at); ?></td>
                            <td><?php echo e($detp->estado_pago); ?></td>
                            <td>
                              <?php $__currentLoopData = $facturacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($factu['value'] == $detp->facturacion): ?>
                                  <?php echo e($factu['text']); ?>

                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo e($detp->monto); ?></td>
                            <td><?php echo e($detp->saldo); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <tbody>
                    </table>
                  </div>
                  <?php endif; ?>
                  <?php if($biopsia->estado_pago == 'PE'): ?>
                    <form role="form" method="post" action="<?php echo e(url('/biopsia-details/primer_pago/'. $biopsia->id )); ?>">
                      <?php echo e(csrf_field()); ?>

                        <div class="form-group col-md-4">
                            <label class="control-label">Precio</label>
                            <div class="input-group m-b">
                              <span class="input-group-addon">$</span>
                              <select  class="form-control"  name="precio_id">
                                <option disabled selected>Seleccione precio</option>
                                <?php $__currentLoopData = $precios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $precio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($precio->id); ?>"> <?php echo e($precio->nombre . ' - $' . $precio->monto); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group col-md-4">
                            <label class="control-label">Condición de pago</label>
                            <select class="form-control m-b" name="estado_pago">
                              <option disabled selected>Seleccione condición</option>
                              <?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($pago['value'] !== 'PE'): ?> 
                                <option value="<?php echo e($pago['value']); ?>"> <?php echo e($pago['text']); ?> </option>
                                <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label class="control-label">Facturación</label>
                            <select class="form-control m-b" name="facturacion">
                              <option disabled selected>Seleccione facturación</option>
                              <?php $__currentLoopData = $facturacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($factu['value']); ?>"> <?php echo e($factu['text']); ?> </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Pagar</button>
                    </form>
                  <?php endif; ?>
              </div>
            </div>
            <div id="tab-3" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="<?php echo e(url('/biopsia-details/macro/'. $biopsia->id )); ?>">
                     <?php echo e(csrf_field()); ?>

                     <div class="form-group">
                        <label class="control-label">Frases</label>
                        <select class="chosen-select" data-placeholder="Selecciondiagnosticoses" id="select_macro" style="height: 24pt">
                          <?php $__currentLoopData = $frases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($frase->nombre); ?>" style="height: 24pt"> <?php echo e($frase->nombre); ?> </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <button type="button" id="add_macro" class="btn btn-primary">Agregar</button>
                      <div class="form-group">
                        <textarea class="form-control" rows="5" id="macro" name="macro"><?php echo e($biopsia->macro); ?></textarea>
                      </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-4" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="<?php echo e(url('/biopsia-details/micro/'. $biopsia->id )); ?>">
                     <?php echo e(csrf_field()); ?>

                     <div class="form-group">
                        <label class="control-label">Frases</label>
                        <select class="chosen-select" data-placeholder="Seleccione frases" id="select_micro">
                          <?php $__currentLoopData = $frases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($frase->nombre); ?>"> <?php echo e($frase->nombre); ?> </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <button type="button" id="add_micro" class="btn btn-primary">Agregar</button>
                      <div class="form-group">
                        <textarea class="form-control" rows="5" id="micro" name="micro"><?php echo e($biopsia->micro); ?></textarea>
                      </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-5" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="<?php echo e(url('/biopsia-details/preliminar/'. $biopsia->id )); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                      <label class="control-label">Diagnóstico</label>
                      <div class="input-group">
                        <select class="chosen-select" data-placeholder="Seleccione frases" id="select_preliminar">
                          <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($diagnostico->nombre); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                    <button type="button" id="add_preliminar" class="btn btn-primary">Agregar</button>
                    <div class="form-group">
                      <textarea class="form-control" rows="5" id="preliminar" name="preliminar"><?php echo e($biopsia->preliminar); ?></textarea>
                    </div>
                    <div><button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button></div>
                </form>
              </div>
            </div>
            <div id="tab-6" class="tab-pane">
              <div class="panel-body">
                <div class="row">
                  <form role="form" method="post" action="<?php echo e(url('/biopsia-details/inmunohistoquimica/'. $biopsia->id )); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                      <label class="control-label">Diagnóstico</label>
                      <select class="chosen-select" data-placeholder="Seleccione frases" id="select_inmuno">
                        <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($diagnostico->nombre); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <button type="button" id="add_inmuno" class="btn btn-primary">Agregar</button>
                    <div class="form-group">
                      <textarea class="form-control" rows="5" id="inmuno" name="inmuno"><?php echo e($biopsia->inmuno); ?></textarea>
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
                    <form action="<?php echo e(url('/biopsia-details/imagen/'. $biopsia->id )); ?>" method="post" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

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
                <?php if(!$imagenes->isEmpty()): ?>
                  <div class="lightBoxGallery">
                      <div id="list_images">
                            <?php $__currentLoopData = $imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <a href="<?php echo e(asset($img->url)); ?>" ><img src="<?php echo e(asset($img->url)); ?>" style="height=auto;width: 200px;"/></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </div>
                      <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                  </div>
                <?php endif; ?>
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
        Se enviará un correo al paciente: <?php echo e($pacienteConsulta->name); ?> al correo <?php echo e($pacienteConsulta->email); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?php echo e(url('/biopsia-details/send/'. $biopsia->id )); ?>" class="btn btn-primary">Enviar correo</a>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(asset('css/chosen/bootstrap-chosen.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/iCheck/custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/datepicker/datepicker3.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/blueimp/css/blueimp-gallery.min.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(asset('js/chosen/chosen.jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('js/datepicker/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('js/iCheck/icheck.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/blueimp/jquery.blueimp-gallery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/sweetalert/sweetalert.min.js')); ?>"></script>
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
        $('#add_diagnostico_id').on('click', function(){
          $('#diagnostico_id').append( $('#select_diagnostico_id').val() );   
        });
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>