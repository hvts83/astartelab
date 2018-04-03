<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/pacientes')); ?>">Ver Pacientes</a></li>
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
        <form role="form" method="post" action="<?php echo e(url('/pacientes')); ?>">
             <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="name">
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="email" placeholder="Correo" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label>Télefono</label>
              <input type="text" placeholder="Télefono"  class="form-control" data-mask="(999)-9999-9999" name="telefono">
            </div>
            <div class="form-group"><label class="control-label">Sexo</label>
              <br>
              <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="sexo">Masculino</label>
              <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="sexo">Femenino</label>
            </div>
            <div class="form-group" id="fecha_nacimiento">
                <label class="font-normal">Fecha nacimiento</label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="fecha_nacimiento" class="form-control" value="01-01-2000">
                </div>
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="<?php echo e(url('pacientes/')); ?>" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
            </div>
        </form>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(asset('css/iCheck/custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/datepicker/datepicker3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>