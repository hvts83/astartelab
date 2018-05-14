<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li class="active">Reportes de Biopsias</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">
        <div class="panel-body">
        <form role="form" method="post" action="<?php echo e(url('/biopsia')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-group col-md-5">
                <label class="control-label">Parametro</label>
                <select class="chosen-select" id="categoria">
                    <option>Seleccione parametro</option>
                    <option value="date">Fecha</option>
                    <option value="paciente">Paciente</option>
                    <option value="doctor">Doctor</option>
                </select>
            </div>
            <div class="form-group col-md-5">
                <label for="control-label">-</label>
                <select class="chosen-select" id="opcion" disabled>
                    <option>Seleccione opcion</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <button class="btn btn-primary">Enviar</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('css/chosen/bootstrap-chosen.css')); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/dataTables/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/chosen/chosen.jquery.js')); ?>"></script>
	<script src="<?php echo e(asset('js/dataTables/datatables.min.js')); ?>"></script>
	<script>
    //Datatable
    var tabla = $('#tblbiopsia').DataTable({
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
    $('.chosen-select').chosen({
      width: "100%",
      no_results_text: "No se encontró resultados"
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>