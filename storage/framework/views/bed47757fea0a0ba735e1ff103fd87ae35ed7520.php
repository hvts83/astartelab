<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li class="active">Precios</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions'); ?>
    <a href="<?php echo e(url('/precios/create/B')); ?>" class="btn btn-primary">Nuevo Precio de Biopsia</a>
    <a href="<?php echo e(url('/precios/create/C')); ?>" class="btn btn-primary">Nuevo Precio de Citología</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <?php if(session('status')): ?>
      <div class="alert alert-success">
          <?php echo e(session('status')); ?>

      </div>
  <?php endif; ?>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="tblprecio" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Monto</th>
              <th>Consulta</th>
              <th>Tipo Consulta</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $precios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $precio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($precio->id); ?></td>
                <td><?php echo e($precio->nombre); ?></td>
                <td>$ <?php echo e($precio->monto); ?></td>
                <td>
                  <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($tipo['value'] == $precio->tipo): ?>
                      <?php echo e($tipo['text']); ?>

                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                  <?php if($precio->tipo === 'c'): ?>
                    <?php $__currentLoopData = $tipo_citologia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($tipo_c->id == $precio->tipo_id): ?>
                        <?php echo e($tipo_c->nombre); ?>

                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                    <?php $__currentLoopData = $tipo_biopsia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($tipo_b->id == $precio->tipo_id): ?>
                        <?php echo e($tipo_b->nombre); ?>

                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </td>
                <td>
                  <a class="btn btn-default" href="<?php echo e(url('/precios/' .  $precio->id . "/edit" )); ?>">Editar</a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div class="div-btn">
          <a href="<?php echo e(url('/precios/create/B')); ?>" class="btn btn-primary pull-right">Nuevo Precio de Biopsia</a>
          <a href="<?php echo e(url('/precios/create/C')); ?>" class="btn btn-primary pull-right">Nuevo Precio de Citología</a>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('css/dataTables/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(asset('js/dataTables/datatables.min.js')); ?>"></script>
	<script>
    //Datatable
    var tabla = $('#tblprecio').DataTable({
      "paging": true,"language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      },
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>