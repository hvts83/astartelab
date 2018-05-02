<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/doctores')); ?>">Ver doctores</a></li>
  <li><a href="<?php echo e(url('/doctores/' . $doctor->id . '/edit')); ?>"> <?php echo e($doctor->nombre); ?></a></li>
  <li class="active">
      <strong><?php echo e($page_title); ?></strong>
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">
          <h5>Fondos de <?php echo e($doctor->nombre); ?></h5>
          <h1 class="no-margins">$ <?php echo e($doctor->saldo); ?></h1>
          <small>Saldo actual</small>
      </div>
    </div>
    <?php if($transacciones->isEmpty() == false  ): ?>
      <div class="row">
        <div class="table-responsive">
          <table id="tbldoctor" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tipo transacción</th>
                <th>Monto</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td>
                    <?php if($trans->tipo == "I"): ?>
                      Ingreso
                    <?php else: ?>
                      Egreso
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($trans->monto); ?></td>
                  <td><?php echo e($trans->created_at); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>
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
        <form role="form" method="post" action="<?php echo e(url('/doctor-account/'. $doctor->id )); ?>">
             <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label>Monto a agregar</label>
              <div class="input-group m-b">
                <span class="input-group-addon">$</span>
                <input type="number" placeholder="$" class="form-control" name="monto" step="0.01" min="0.01">
              </div>
            </div>
            <div class="div-btn">
                <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
                <a href="<?php echo e(url('/doctores/' . $doctor->id . '/edit')); ?>" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
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
    var tabla = $('#tbldoctor').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>