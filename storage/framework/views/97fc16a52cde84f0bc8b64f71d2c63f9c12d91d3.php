<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li class="active">Reportes de Citologías</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">
        <div class="panel-body">
        <form role="form" method="get" action="<?php echo e(url('/reportes/citologia')); ?>">
            <legend>Fecha</legend>
            <?php echo e(csrf_field()); ?>

            <div class="form-group col-md-6" id="fecha_nacimiento">
                <label class="font-normal">Fecha inicio</label>
                <div class="input-group date">
                    <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" name="inicio" class="form-control">
                </div>
            </div>
            <div class="form-group col-md-6" id="fecha_nacimiento">
                <label class="font-normal">Fecha fin</label>
                <div class="input-group date">
                    <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" name="fin" class="form-control">
                </div>
            </div>
            <legend>Cliente </legend>
            <div class="form-group col-md-12">
                <label class="control-label">Paciente</label>
                <select class="chosen-select"  name="paciente">
                    <option value="0">Seleccione paciente</option>
                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($paciente->id); ?>"> <?php echo e($paciente->name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <legend>Doctor </legend>
            <div class="form-group col-md-6">
                <label class="control-label">Doctor</label>
                <select class="chosen-select"  name="doctor">
                    <option value="0">Seleccione doctor</option>
                    <?php $__currentLoopData = $doctores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($doctor->id); ?>"> <?php echo e($doctor->nombre); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-primary">Enviar</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <?php if( isset($citologias)): ?>
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
                    <th>Entregado</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $citologias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $citologia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($citologia->informe); ?></td>
                        <td><?php echo e($citologia->paciente_name); ?></td>
                        <td><?php echo e($citologia->doctor_name); ?></td>
                        <td><?php echo e($citologia->recibido); ?></td>
                        <td><?php echo e($citologia->entregado); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('css/chosen/bootstrap-chosen.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/dataTables/datatables.min.css')); ?>">
    <link href="<?php echo e(asset('css/datepicker/datepicker3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/chosen/chosen.jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datepicker/bootstrap-datepicker.js')); ?>"></script>
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

     $('#fecha_nacimiento .input-group.date').datepicker({
        startView: 1,
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $('.chosen-select').chosen({
      width: "100%",
      no_results_text: "No se encontró resultados"
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>