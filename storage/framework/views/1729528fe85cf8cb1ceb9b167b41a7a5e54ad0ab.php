<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/usuarios')); ?>">Ver usuarios</a></li>
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
        <form role="form" method="post" action="<?php echo e(url('/usuarios')); ?>">
             <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="nombre">
            </div>
            <div class="form-group">
              <label>Apellido</label>
              <input type="text" placeholder="Apellido" class="form-control" name="apellido">
            </div>
            <div class="form-group">
              <label>Nombre de usuario</label>
              <input type="text" placeholder="Nombre de usuario" class="form-control" name="usuario">
            </div>
            <div class="form-group">
              <label>Clave</label>
              <input type="password" placeholder="Clave" class="form-control" name="password">
            </div>
            <div class="form-group">
              <label>Repetir clave</label>
              <input type="password" placeholder="Clave" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
              <label class="control-label">Rol</label>
              <select class="form-control m-b" name="rol">
                <option>Seleccione tipo</option>
                <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($tipo['value']); ?>"> <?php echo e($tipo['text']); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="<?php echo e(url('usuarios/')); ?>" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
            </div>
        </form>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>