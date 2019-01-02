<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li class="active">Citologías</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions'); ?>
    <a href="<?php echo e(url('/doctores/create')); ?>" class="btn btn-primary">Nuevo Doctor</a>
    <a href="<?php echo e(url('/pacientes/create')); ?>" class="btn btn-primary">Nuevo Paciente</a>
    <a href="<?php echo e(url('/citologia/create')); ?>" class="btn btn-primary">Nueva Citología</a>
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
      <form role="form" method="get" action="<?php echo e(url('/citologia/show')); ?>">
      <div class="table-responsive">
        <table id="tblcitologia" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Seleccionar</th>
              <th>Informe</th>
              <th>Paciente</th>
              <th>Doctor</th>
              <th>Recibido</th>
              <th>Entregado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $citologias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $citologia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th><input type="checkbox" name="id[]" value="<?php echo e($citologia->id); ?>" ></th> 
                <td><?php echo e($citologia->informe); ?></td>
                <td><?php echo e($citologia->paciente_name); ?></td>
                <td><?php echo e($citologia->doctor_name); ?></td>
                <td><?php echo e(date('d-m-Y', strtotime($citologia->recibido))); ?></td>
                <td><?php echo e(date('d-m-Y', strtotime($citologia->recibido))); ?></td>
                <td>
                  <a class="btn btn-default" href="<?php echo e(url('/citologia/' .  $citologia->id . "/edit" )); ?>">Ver detalle</a>
                  <a class="btn btn-default" href="<?php echo e(url('/citologia/' .  $citologia->id . "/pdf" )); ?>">PDF</a>
                  <a class="btn btn-default" href="<?php echo e(url('/citologia/' .  $citologia->id . "/print" )); ?>" target="_blank">Imprimir</a>
                  <a class="btn btn-default" href="<?php echo e(url('/citologia/' .  $citologia->id . "/envelope" )); ?>" target="_blank">Sobre</a>
                  <a class="btn btn-default" href="<?php echo e(url('/citologia/' .  $citologia->id . "/sm" )); ?>" target="_blank">Sin Membrete</a>

                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div class="div-btn">
        <button type="submit" class="btn btn-primary"> Imprimir Reportes</button>
        <a href="<?php echo e(url('/citologia/create')); ?>" class="btn btn-primary pull-right">Nueva Citología</a>
      </div>
      </form>
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