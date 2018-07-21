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
        <form role="form" method="post" action="<?php echo e(url('pacientes/'. $paciente->id )); ?>">
            <?php echo e(csrf_field()); ?>

            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="name" value="<?php echo e($paciente->name); ?>">
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="email" placeholder="Correo" class="form-control" name="email" value="<?php echo e($paciente->email); ?>">
            </div>
            <div class="form-group">
              <label>Télefono</label>
              <input type="text" placeholder="Télefono"  class="form-control" data-mask="(999)-9999-9999" name="telefono" value="<?php echo e($paciente->telefono); ?>">
            </div>
            <div class="form-group">
              <label>Documento</label>
              <input type="text" placeholder="Documento"  class="form-control" name="documento" value="<?php echo e($paciente->documento); ?>">
            </div>
            <div class="form-group"><label class="control-label">Sexo</label>
              <br>
              <?php if($paciente->sexo == 1): ?>
                <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="sexo" checked="checked">Masculino</label>
                <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="sexo">Femenino</label>
              <?php else: ?>
                <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="sexo">Masculino</label>
                <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="sexo" checked="checked">Femenino</label>
              <?php endif; ?>
            </div>
            <div class="form-group" id="edad">
                <label class="font-normal">Fecha nacimiento</label>
                <div class="input-group">
                    <span class="input-group-addon">
                    <input type="text" name="edad" class="form-control" value="<?php echo e($paciente->edad); ?>">
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