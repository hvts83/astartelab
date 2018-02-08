<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/biopsia')); ?>">Ver biopsias</a></li>
  <li class="active">
      <strong><?php echo e($page_title); ?></strong>
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="wrapper wrapper-content animated fadeInRight">
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
        <form role="form" method="post" action="<?php echo e(url('/biopsia')); ?>">
             <?php echo e(csrf_field()); ?>

             <legend>Datos generales</legend>
             <div class="form-group col-md-12" id="fecha_nacimiento">
                 <label class="font-normal">Recibido</label>
                 <div class="input-group date">
                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="recibido" class="form-control" value="01-01-2018">
                 </div>
             </div>
             <div class="form-group col-md-6">
               <label class="control-label">Doctor</label>
               <select class="chosen-select"  tabindex="2" name="doctor_id">
                 <option>Seleccione doctor</option>
                 <?php $__currentLoopData = $doctores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($doctor->id); ?>"> <?php echo e($doctor->nombre); ?> </option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div>
             <div class="form-group col-md-6">
               <label class="control-label">Grupo</label>
               <select class="chosen-select"  tabindex="2" name="grupo_id">
                 <option>Seleccione grupo</option>
                 <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($grupo->id); ?>"> <?php echo e($grupo->nombre); ?> </option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div>
             <div class="form-group col-md-12">
               <label class="control-label">Paciente</label>
               <select class="chosen-select"  tabindex="2" name="paciente_id">
                 <option>Seleccione paciente</option>
                 <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($paciente->id); ?>"> <?php echo e($paciente->name); ?> </option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div>
             <div class="form-group col-md-12">
               <label class="control-label">Diagnóstico</label>
               <select class="chosen-select"  tabindex="2" name="diagnostico_id">
                 <option>Seleccione diagnóstico</option>
                 <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($diagnostico->id); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div>
             <legend>Pago </legend>
             <div class="form-group col-md-4">
               <label class="control-label">Precio</label>
               <div class="input-group m-b">
                 <span class="input-group-addon">$</span>
                 <select class="chosen-select"  tabindex="2" name="precio_id">
                   <option>Seleccione precio</option>
                    <?php $__currentLoopData = $precios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $precio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($precio->id); ?>"> <?php echo e($precio->monto); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
               </div>
             </div>
             <div class="form-group col-md-4">
               <label class="control-label">Condición de pago</label>
               <select class="form-control m-b" name="estado_pago">
                 <option>Seleccione condición</option>
                 <?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($pago['value']); ?>"> <?php echo e($pago['text']); ?> </option>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
             </div>
             <div class="form-group col-md-4">
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
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(asset('css/chosen/bootstrap-chosen.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/iCheck/custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/datepicker/datepicker3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>\
  <script src="<?php echo e(asset('js/chosen/chosen.jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('js/datepicker/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('js/iCheck/icheck.min.js')); ?>"></script>
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
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>