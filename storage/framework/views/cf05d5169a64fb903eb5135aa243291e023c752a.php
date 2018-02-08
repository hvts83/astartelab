<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li class="active">Citologías</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="tblcitologia" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Informe</th>
              <th>Paciente</th>
              <th>Doctor</th>
              <th>Recibido</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $citologias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $citologia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($citologia->informe); ?></td>
                <td><?php echo e($citologia->paciente_name); ?></td>
                <td><?php echo e($citologia->doctor_name); ?></td>
                <td><?php echo e($citologia->recibido); ?></td>
                <td>
                  <a class="btn btn-default" href="<?php echo e(url('/citologia/' .  $citologia->id . "/edit" )); ?>">Ver detalle</a>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <a href="<?php echo e(url('/citologia/create')); ?>" class="btn btn-default">Nueva citología</a>
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
    var tabla = $('#tblcitologia').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>