<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/citologia')); ?>">Ver citologías</a></li>
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
                    <h2 class="font-bold"> <?php echo e($citologia->informe); ?> </h2>
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
            <li class=""><a data-toggle="tab" href="#tab-5">Reporte Informe preliminar</a></li>
            <li class=""><a data-toggle="tab" href="#tab-6">Imagenes</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body">
                  <form role="form" method="post" action="<?php echo e(url('/citologia/'. $citologia->id )); ?>">
                       <?php echo e(csrf_field()); ?>

                       <input name="_method" type="hidden" value="PUT">
                       <div class="form-group col-md-6" id="fecha_nacimiento">
                           <label class="font-normal">Recibido</label>
                           <div class="input-group date">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="recibido" class="form-control" value="<?php echo e($citologia->recibido); ?>">
                           </div>
                       </div>
                       <div class="form-group col-md-6" id="fecha_nacimiento">
                           <label class="font-normal">Entregado</label>
                           <div class="input-group date">
                               <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="entregado" class="form-control" value="<?php echo e($citologia->entregado); ?>">
                           </div>
                       </div>
                       <div class="form-group col-md-6">
                          <label class="control-label">Doctor</label>
                          <input type="text" class="form-control" readonly value="<?php echo e($citologia->doctor); ?>">
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Grupo</label>
                         <input type="text" class="form-control" readonly value="<?php echo e($citologia->grupo); ?>">
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Paciente</label>
                         <input type="text" class="form-control" readonly value="<?php echo e($citologia->paciente); ?>">
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Diagnóstico</label>
                         <select class="chosen-select"  tabindex="2" name="diagnostico_id">
                           <option>Seleccione diagnóstico</option>
                           <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($diagnostico->id == $citologia->diagnostico_id): ?>
                               <option value="<?php echo e($diagnostico->id); ?>" selected> <?php echo e($diagnostico->nombre); ?> </option>
                             <?php else: ?>
                              <option value="<?php echo e($diagnostico->id); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                             <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <div class="row">
                  <?php
                    foreach ($precios as $precio) {
                      if ($precio->id == $citologia->precio_id) {
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
                        <th>Facturación</th>
                        <th>Monto pagado</th>
                        <th>Saldo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $detalle_pago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($detp->created_at); ?></td>
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

                <?php if($citologia->estado_pago == 'AP' || $citologia->estado_pago == 'PE'): ?>
                  <form role="form" method="post" action="<?php echo e(url('/citologia-details/abono/'. $citologia->id )); ?>">
                  <?php echo e(csrf_field()); ?>

                  <label class="control-label"> Abono </label>
                  <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="number" placeholder="Abono" required class="form-control" name="monto" step="0.01" min="0.01" max="<?php echo e($detalle_pago[0]->saldo); ?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Facturación</label>
                    <select class="form-control m-b" name="facturacion">
                      <option>Seleccione facturación</option>
                      <?php $__currentLoopData = $facturacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($factu['value']); ?>"> <?php echo e($factu['text']); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div>
                      <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                  </div>
                </form>
                <?php endif; ?>

              </div>
            </div>
            <div id="tab-3" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="<?php echo e(url('/citologia-details/macro/'. $citologia->id )); ?>">
                     <?php echo e(csrf_field()); ?>

                     <div class="form-group">
                       <label class="control-label">Frases</label>
                       <select class="chosen-select" data-placeholder="Seleccione frases" multiple name="macro_id[]">
                         <option>Seleccione Frase</option>
                         <?php $__currentLoopData = $frases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($macro != null): ?>
                            <?php $__currentLoopData = $macro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($frase->id == $mac->opcion_id): ?>
                                <option value="<?php echo e($frase->id); ?>" selected> <?php echo e($frase->nombre); ?> </option>
                              <?php else: ?>
                                <option value="<?php echo e($frase->id); ?>"> <?php echo e($frase->nombre); ?> </option>
                              <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php else: ?>
                             <option value="<?php echo e($frase->id); ?>"> <?php echo e($frase->nombre); ?> </option>
                           <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                     </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-4" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="<?php echo e(url('/citologia-details/micro/'. $citologia->id )); ?>">
                     <?php echo e(csrf_field()); ?>

                     <div class="form-group">
                       <label class="control-label">Frases</label>
                       <select class="chosen-select" data-placeholder="Seleccione frases" multiple name="micro_id[]">
                         <option>Seleccione Frase</option>
                         <?php $__currentLoopData = $frases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($micro != null): ?>
                            <?php $__currentLoopData = $micro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($frase->id == $mic->opcion_id): ?>
                               <option value="<?php echo e($frase->id); ?>" selected> <?php echo e($frase->nombre); ?> </option>
                             <?php else: ?>
                               <option value="<?php echo e($frase->id); ?>"> <?php echo e($frase->nombre); ?> </option>
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php else: ?>
                             <option value="<?php echo e($frase->id); ?>"> <?php echo e($frase->nombre); ?> </option>
                           <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                     </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-5" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="<?php echo e(url('/citologia-details/preliminar/'. $citologia->id )); ?>">
                     <?php echo e(csrf_field()); ?>

                     <div class="form-group">
                       <label class="control-label">Diagnóstico</label>
                       <select class="chosen-select" data-placeholder="Seleccione diagnóstico" multiple name="preliminar_id[]">
                         <option>Seleccione diagnóstico</option>
                         <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($preliminar != null): ?>
                            <?php $__currentLoopData = $preliminar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($diagnostico->id == $pre->opcion_id): ?>
                               <option value="<?php echo e($diagnostico->id); ?>" selected> <?php echo e($diagnostico->nombre); ?> </option>
                             <?php else: ?>
                               <option value="<?php echo e($diagnostico->id); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                             <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php else: ?>
                             <option value="<?php echo e($diagnostico->id); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                           <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                     </div>
                     <div class="form-group">
                        <label class="control-label">¿Es diagnóstico preeliminar?</label>
                        <br>
                        <?php if($citologia->informe_preliminar == '1'): ?>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="preliminar" checked>Si</label>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="preliminar">No</label>
                        <?php else: ?>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="preliminar">Si</label>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="preliminar" checked>No</label>
                        <?php endif; ?>
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
                  <fieldset>
                    <legend>Imágenes</legend>
                    <form action="<?php echo e(url('/citologia-details/imagen/'. $citologia->id )); ?>" method="post" enctype="multipart/form-data">
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
        <a href="<?php echo e(url('/citologia-details/send/'. $citologia->id )); ?>" class="btn btn-primary">Enviar correo</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>