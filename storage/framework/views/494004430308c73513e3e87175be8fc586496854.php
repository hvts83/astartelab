<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="wrapper wrapper-content animated fadeInRight">

  <div class="row">

    <div class="col-md-8">

      <div class="row">
          <div class="col-md-6">
              <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <span class="label label-info pull-right">Mensual</span>
                      <h5>Biopsias</h5>
                  </div>
                  <div class="ibox-content">
                      <h1 class="no-margins"><?php echo e($biopsias); ?></h1>
                      <small>Biopsias del mes</small>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <span class="label label-primary pull-right">Mensual</span>
                      <h5>Citologías</h5>
                  </div>
                  <div class="ibox-content">
                      <h1 class="no-margins"><?php echo e($citologias); ?></h1>
                      <small>Citologías del mes</small>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Accesos directos
            </div>
            <div class="list-group">
              <a href="<?php echo e(url('biopsia/create')); ?>" class="list-group-item">Crear Biopsia</a>
              <a href="<?php echo e(url('citologia/create')); ?>" class="list-group-item">Crear Citología</a>
            </div>           
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Exámenes del mes</h5>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="tblmeses" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tipo</th>
                  <th>Informe</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <?php if($mes->tipo == "B"): ?>
                        Biopsia
                      <?php else: ?>
                        Citología
                      <?php endif; ?>
                    </td>
                    <td><?php echo e($mes->informe); ?></td>
                    <td>
                      <?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($pago['value'] == $mes->estado_pago): ?>
                          <?php echo e($pago['text']); ?>

                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
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
    var tabla = $('#tblmeses').DataTable({
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>