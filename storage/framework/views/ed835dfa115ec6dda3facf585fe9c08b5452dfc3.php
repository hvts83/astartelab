<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li class="active">Usuarios</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('actions'); ?>
  <a href="<?php echo e(url('/usuarios/create')); ?>" class="btn btn-primary">Nuevo Usuario</a>
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
        <table id="tblusuario" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Rol</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($usuario->id); ?></td>
                <td><?php echo e($usuario->usuario); ?></td>
                <td><?php echo e($usuario->nombre); ?></td>
                <td><?php echo e($usuario->apellido); ?></td>
                <td>
                  <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($tipo['value'] == $usuario->rol): ?>
                      <?php echo e($tipo['text']); ?>

                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                  <a class="btn btn-default" href="<?php echo e(url('/usuarios/' .  $usuario->id . "/edit" )); ?>">Editar</a>
                  <button class="btn btn-danger delete" value="<?php echo e($usuario->id); ?>">
                    <i class="fa fa-times"></i>
                  </button>
                  <form action="<?php echo e(url('usuarios/' . $usuario->id )); ?>" method="post" id="<?php echo e('del' . $usuario->id); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input name="_method" type="hidden" value="DELETE">
                  </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div class="div-btn">
        <a href="<?php echo e(url('/usuarios/create')); ?>" class="btn btn-primary pull-right">Nuevo Usuario</a>
      </div>
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
    var tabla = $('#tblusuario').DataTable({
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