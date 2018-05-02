<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/precios')); ?>">Ver precios</a></li>
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
        <form role="form" method="post" action="<?php echo e(url('precios/'. $precio->id )); ?>">
            <?php echo e(csrf_field()); ?>

            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" value="<?php echo e($tipo); ?>" name="tipo">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="nombre" value="<?php echo e($precio->nombre); ?>">
            </div>
            <div class="form-group">
              <label>Monto</label>
              <div class="input-group m-b">
                <span class="input-group-addon">$</span>
                <input type="number" placeholder="$" class="form-control" name="monto" step="0.01" min="0.01" value="<?php echo e($precio->monto); ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Tipo</label>
              <select class="form-control m-b" name="tipo_consulta">
                <option>Seleccione tipo</option>
                <?php $__currentLoopData = $tipos_consulta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($tipo_c['id'] == $precio->tipo_id ): ?>
                    <option value="<?php echo e($tipo_c['id']); ?>" selected> <?php echo e($tipo_c['nombre']); ?> </option>
                  <?php else: ?>
                    <option value="<?php echo e($tipo_c['id']); ?>"> <?php echo e($tipo_c['nombre']); ?> </option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="<?php echo e(url('precios/')); ?>" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
            </div>
        </form>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>