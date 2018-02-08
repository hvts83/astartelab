<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/citologias')); ?>">Ver citologías</a></li>
  <li class="active">
      <strong><?php echo e($page_title); ?></strong>
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-heartbeat fa-5x"></i>
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
            <li class=""><a data-toggle="tab" href="#tab-2">Reporte Micro</a></li>
            <li class=""><a data-toggle="tab" href="#tab-3">Imágenes</a></li>
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
                         <select class="form-control m-b" name="doctor_id">
                           <option>Seleccione doctor</option>
                           <?php $__currentLoopData = $doctores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($doctor->id == $citologia->doctor_id): ?>
                               <option value="<?php echo e($doctor->id); ?>" selected> <?php echo e($doctor->nombre); ?> </option>
                             <?php else: ?>
                              <option value="<?php echo e($doctor->id); ?>"> <?php echo e($doctor->nombre); ?> </option>
                             <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Grupo</label>
                         <select class="form-control m-b" name="grupo_id">
                           <option>Seleccione grupo</option>
                           <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($grupo->id == $citologia->grupo_id): ?>
                               <option value="<?php echo e($grupo->id); ?>" selected> <?php echo e($grupo->nombre); ?> </option>
                             <?php else: ?>
                              <option value="<?php echo e($grupo->id); ?>"> <?php echo e($grupo->nombre); ?> </option>
                             <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Paciente</label>
                         <select class="form-control m-b" name="paciente_id">
                           <option>Seleccione paciente</option>
                           <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($paciente->id == $citologia->paciente_id): ?>
                               <option value="<?php echo e($paciente->id); ?>" selected> <?php echo e($paciente->name); ?> </option>
                             <?php else: ?>
                              <option value="<?php echo e($paciente->id); ?>"> <?php echo e($paciente->name); ?> </option>
                             <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                       </div>
                       <div class="form-group col-md-6">
                         <label class="control-label">Precio</label>
                         <div class="input-group m-b">
                           <span class="input-group-addon">$</span>
                           <select class="form-control m-b" name="precio_id">
                             <option>Seleccione precio</option>
                             <?php $__currentLoopData = $precios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $precio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php if($precio->id == $citologia->precio_id): ?>
                                 <option value="<?php echo e($precio->id); ?>" selected> <?php echo e($precio->monto); ?> </option>
                               <?php else: ?>
                                <option value="<?php echo e($precio->id); ?>"> <?php echo e($precio->monto); ?> </option>
                               <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label">Diagnóstico</label>
                         <select class="form-control m-b" name="diagnostico_id">
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
                      <div>
                          <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                      </div>
                  </form>
                </div>
            </div>
            <div id="tab-2" class="tab-pane">
              <div class="panel-body">
                <form role="form" method="post" action="<?php echo e(url('/citologia-details/micro/'. $citologia->id )); ?>">
                     <?php echo e(csrf_field()); ?>

                     <div class="form-group">
                       <label class="control-label">Frases</label>
                       <select class="form-control m-b" name="frase_id">
                         <option>Seleccione Frase</option>
                         <?php $__currentLoopData = $frases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php if($micro != null): ?>
                             <?php if($frase->id == $micro->frase_id): ?>
                               <option value="<?php echo e($frase->id); ?>" selected> <?php echo e($frase->nombre); ?> </option>
                             <?php else: ?>
                               <option value="<?php echo e($frase->id); ?>"> <?php echo e($frase->nombre); ?> </option>
                             <?php endif; ?>
                           <?php else: ?>
                             <option value="<?php echo e($frase->id); ?>"> <?php echo e($frase->nombre); ?> </option>
                           <?php endif; ?>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>
                     </div>
                     <div class="form-group">
                         <label class="control-label">Detalle</label>
                         <textarea name="detalle" class="form-control"><?php if($micro != null): ?><?php echo e($micro->detalle); ?><?php endif; ?></textarea>
                     </div>
                    <div>
                        <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
                    </div>
                </form>
              </div>
            </div>
            <div id="tab-3" class="tab-pane">
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
                          <a href="<?php echo e(asset($img->url)); ?>" ><img src="<?php echo e(asset($img->url)); ?>" style="height=auto;width: 200px;"></a>
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
  <link href="<?php echo e(asset('css/iCheck/custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/datepicker/datepicker3.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/blueimp/css/blueimp-gallery.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(asset('js/datepicker/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('js/iCheck/icheck.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/blueimp/jquery.blueimp-gallery.min.js')); ?>"></script>
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
    document.getElementById('list_images').onclick = function (event) {
      event = event || window.event;
      var target = event.target || event.srcElement,
      link = target.src ? target.parentNode : target,
      options = {index: link, event: event},
      links = this.getElementsByTagName('a');
      blueimp.Gallery(links, options);
    };
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>