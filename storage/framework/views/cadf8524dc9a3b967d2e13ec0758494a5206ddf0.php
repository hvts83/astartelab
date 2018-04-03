<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li class="active">Cuentas</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions'); ?>
    <a href="<?php echo e(url('/cuentas/create')); ?>" class="btn btn-primary">Nueva Cuenta</a>
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
        <table id="tblcuenta" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nombre</th>
              <th>Fondos</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $cuentas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cuenta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($cuenta->codigo); ?></td>
                <td><?php echo e($cuenta->nombre); ?></td>
                <td> $<?php echo e($cuenta->fondo); ?></td>
                <td>
                  <a class="btn btn-default" href="<?php echo e(url('/cuentas/' .  $cuenta->id . "/edit" )); ?>">Editar</a>
                  <a class="btn btn-default" href="<?php echo e(url('/cuenta-account/' .  $cuenta->id )); ?>">Detalle</a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div class="div-btn">
        <a href="<?php echo e(url('/cuentas/create')); ?>" class="btn btn-primary pull-right">Nueva Cuenta</a>
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
    var tabla = $('#tblcuenta').DataTable({
      "paging": true,
      "language": {
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