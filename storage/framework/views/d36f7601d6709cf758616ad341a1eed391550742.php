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
                <th>Notas</th>
                <th>Fecha</th>
                <th>Opciones</th>
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
                  <td><?php echo e($trans->notas); ?></td>
                  <td><?php echo e($trans->created_at); ?></td>
                  <td>
                    <?php if($trans->tipo == "I"): ?>
                      <button class="btn btn-danger delete" value="<?php echo e($trans->id); ?>">
                        <i class="fa fa-times"></i>
                      </button>
                      <form action="<?php echo e(url('/doctor-account/delete/' . $trans->id )); ?>" method="post" id="<?php echo e('del' . $trans->id); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input name="_method" type="hidden" value="DELETE">
                      </form>
                    <?php endif; ?>
                  </td>
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
            <div class="form-group">
                <label>Notas</label>
                <input type="text" placeholder="Notas" class="form-control" name="notas">
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
  <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(asset('js/dataTables/datatables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/sweetalert/sweetalert.min.js')); ?>"></script>
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

    $('.delete').click(function (e) {
        swal({
            title: "¿Desea eliminar la información?",
            text: "Al realizar la acción no podrás recuperar los datos",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: false },
        function (isConfirm) {
            if (isConfirm) {
              swal("Eliminado", "Eliminado con exíto.", "success");
              setTimeout(function () {
                $('#del'+ e.currentTarget.value).submit()
              }, 500);
            } else {
                swal("Cancelado", "Eliminación cancelada", "error");
            }
        });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>