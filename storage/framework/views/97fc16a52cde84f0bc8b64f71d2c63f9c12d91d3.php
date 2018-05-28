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
            <legend>Busqueda por fecha</legend>
            <?php echo e(csrf_field()); ?>

            <div class="col-md-4 form-group" id="data_3">
                <label class="font-normal">Rango:</label>
                <div class="input-daterange input-group">
                    <input type="text" name="inicio" class="input-sm form-control">
                    <span class="input-group-addon">Hasta</span>
                    <input type="text" name="fin" class="input-sm form-control">
                </div>
            </div>
            <div class=" col-md-4 form-group" id="data_2">
                <label class="font-normal">Mes:</label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="mes">
                </div>
            </div>
            <div class=" col-md-4 form-group" id="data_1">
                <label class="font-normal">Año:</label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="annio">
                </div>
            </div>
            <legend>Pacientes</legend>
            <div class="form-group col-md-12">
                <label class="control-label">Paciente</label>
                <select class="chosen-select"  name="paciente">
                    <option value="0">Seleccione paciente</option>
                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($paciente->id); ?>"> <?php echo e($paciente->name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <legend>Doctores</legend>
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
                        <td><?php echo e($citologia->entregado); ?></td>
                        <td>
                            <a class="btn btn-default" href="<?php echo e(url('/citologia/' .  $citologia->id . "/edit" )); ?>">Ver detalle</a>
                        </td>
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
    <link rel="stylesheet" href="<?php echo e(asset('css/dataTables/buttons.dataTables.min.css')); ?>">
    <link href="<?php echo e(asset('css/datepicker/datepicker3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/chosen/chosen.jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/dataTables/vfs_fonts.js')); ?>"></script>
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
      "autoWidth": false,
      'dom': 'Bfrtip',
      'buttons': [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

     $('#data_1 .input-group.date').datepicker({
        minViewMode: 2,
        keyboardNavigation: false,
        forceParse: false,
        forceParse: false,
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy"
    });

    $('#data_2 .input-group.date').datepicker({
        minViewMode: 1,
        keyboardNavigation: false,
        forceParse: false,
        forceParse: false,
        autoclose: true,
        todayHighlight: true,
        format: "dd-mm-yyyy"
    });

    $('#data_3 .input-daterange').datepicker({
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